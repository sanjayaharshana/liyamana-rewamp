<?php
namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\BlogPosts;
use App\Models\TempleteCategories;
use Illuminate\Support\Facades\Storage;
use OpenAdmin\Admin\Auth\Database\Administrator;
use Illuminate\Support\Str;

class BlogController extends Controller
{
    public function index()
    {
        // Get featured posts
        $featuredPosts = BlogPosts::where('is_featured', 1)
            ->where('status', 1)
            ->orderBy('created_at', 'desc')
            ->take(3)
            ->get();

        // Get all blog posts
        $blogPosts = BlogPosts::where('status', 1)
            ->orderBy('created_at', 'desc')
            ->paginate(9);

        // Get all categories to use for mapping category IDs to names
        $categories = TempleteCategories::where('status', 1)->pluck('category_name', 'id')->toArray();

        // Get all users to map user IDs to names
        $users = Administrator::pluck('username', 'id')->toArray();

        // Process each post to prepare image paths and category names
        $this->processPostsData($featuredPosts, $categories, $users);
        $this->processPostsData($blogPosts, $categories, $users);

        return view('landing.blog', compact('blogPosts', 'featuredPosts', 'categories'));
    }

    /**
     * Process posts data to prepare image paths and category names
     */
    private function processPostsData($posts, $categories, $users)
    {
        foreach ($posts as $post) {
            // Fix image path - ensure it has the correct storage path
            if (!empty($post->featured_image)) {
                // Clean the path
                $imagePath = str_replace('\\', '/', $post->featured_image);
                $imagePath = ltrim($imagePath, '/');

                // If it's a full URL, keep it as is
                if (filter_var($imagePath, FILTER_VALIDATE_URL)) {
                    $post->featured_image = $imagePath;
                    continue;
                }

                // Check if file exists in storage
                $storagePath = storage_path('app/public/' . $imagePath);
                if (file_exists($storagePath)) {
                    $post->featured_image = $imagePath;
                    \Log::info('Blog post #' . $post->id . ': Using storage path: ' . $imagePath);
                    continue;
                }

                // Check if file exists in public storage
                $publicPath = public_path('storage/' . $imagePath);
                if (file_exists($publicPath)) {
                    $post->featured_image = $imagePath;
                    \Log::info('Blog post #' . $post->id . ': Using public storage path: ' . $imagePath);
                    continue;
                }

                // If file doesn't exist, try to find it in the files directory
                $filesPath = storage_path('app/public/files/' . basename($imagePath));
                if (file_exists($filesPath)) {
                    $post->featured_image = 'files/' . basename($imagePath);
                    \Log::info('Blog post #' . $post->id . ': Using files directory path: ' . $post->featured_image);
                    continue;
                }

                // If all else fails, log a warning
                \Log::warning('Blog post #' . $post->id . ': Image not found in any location. Original path: ' . $imagePath);
            }

            // Map category IDs to category names
            if (!empty($post->category_ids) && is_array($post->category_ids)) {
                $categoryNames = [];
                foreach ($post->category_ids as $categoryId) {
                    if (isset($categories[$categoryId])) {
                        $categoryNames[] = [
                            'id' => $categoryId,
                            'name' => $categories[$categoryId]
                        ];
                    }
                }
                $post->category_names = $categoryNames;
            }

            // Map user ID to user name
            if (!empty($post->user_id) && isset($users[$post->user_id])) {
                $post->user_name = $users[$post->user_id];
            }
        }
    }

    /**
     * Get correct image path regardless of how it was stored
     *
     * @param string $imagePath
     * @return string
     */
    private function getCorrectImagePath($imagePath)
    {
        // Remove any leading slashes
        $imagePath = ltrim($imagePath, '/');

        // Check if the path is already a full URL
        if (filter_var($imagePath, FILTER_VALIDATE_URL)) {
            return $imagePath;
        }

        // If the path starts with 'storage/', return as is
        if (strpos($imagePath, 'storage/') === 0) {
            return $imagePath;
        }

        // If the path contains 'files/' but doesn't start with 'storage/'
        if (strpos($imagePath, 'files/') === 0) {
            return 'storage/' . $imagePath;
        }

        // If it's just a filename, assume it's in the files directory
        return 'storage/files/' . basename($imagePath);
    }

    public function show($slug)
    {
        try {
            \Log::info('Attempting to fetch blog post with slug: ' . $slug);
            
            // Get the post with its relationships
            $post = BlogPosts::where('slug', $slug)
                ->where('status', 1)
                ->first();

            if (!$post) {
                \Log::warning('Blog post not found with slug: ' . $slug);
                if (request()->wantsJson() || request()->ajax()) {
                    return response()->json(['error' => true, 'message' => 'Blog post not found'], 404);
                }
                throw new \Exception('Blog post not found');
            }

            \Log::info('Found blog post: ' . $post->id);

            // Get or create session ID
            if (!session()->has('visitor_id')) {
                session(['visitor_id' => Str::random(40)]);
            }
            $sessionId = session('visitor_id');

            // Get client IP address - handle both local and hosted environments
            $ipAddress = request()->header('X-Forwarded-For') ?? 
                        request()->header('X-Real-IP') ?? 
                        request()->ip();
            
            // Get user agent
            $userAgent = request()->userAgent();

            // Record the view
            $viewRecorded = $post->recordView(
                $sessionId,
                $ipAddress,
                $userAgent
            );

            if (!$viewRecorded) {
                \Log::warning('Failed to record view for post #' . $post->id);
            }

            // Get categories
            $categories = TempleteCategories::whereIn('id', $post->category_ids ?? [])
                ->where('status', 1)
                ->pluck('category_name', 'id')
                ->toArray();

            // Get author
            $author = Administrator::where('id', $post->user_id)->first();

            // Process the featured image
            $featuredImageUrl = $post->featured_image_url;

            // Get approved comments
            $comments = $post->approvedComments;

            // Get related posts
            $relatedPosts = BlogPosts::where('status', 1)
                ->where('id', '!=', $post->id)
                ->where(function($query) use ($post) {
                    $query->whereJsonContains('category_ids', $post->category_ids)
                        ->orWhereJsonContains('tags', $post->tags);
                })
                ->orderBy('created_at', 'desc')
                ->take(3)
                ->get();

            // Format the response data
            $response = [
                'id' => $post->id,
                'title' => $post->title,
                'slug' => $post->slug,
                'content' => $post->content,
                'featured_image_url' => $featuredImageUrl,
                'created_at' => $post->created_at,
                'updated_at' => $post->updated_at,
                'category_names' => $categories,
                'tags' => $post->tags ?? [],
                'author' => $author ? [
                    'name' => $author->username,
                    'email' => $author->email
                ] : null,
                'is_featured' => $post->is_featured,
                'views' => $post->views,
                'likes' => $post->likes,
                'dislikes' => $post->dislikes
            ];

            \Log::info('Prepared response data for blog post: ' . $post->id);

            // Check if it's an AJAX request or wants JSON
            if (request()->wantsJson() || request()->ajax()) {
                \Log::info('Returning JSON response for AJAX/JSON request');
                return response()->json($response);
            }

            // For regular web requests, return the view
            \Log::info('Returning view for regular request');
            return view('landing.blog-single', compact('post', 'categories', 'author', 'featuredImageUrl', 'comments', 'relatedPosts'));
        } catch (\Exception $e) {
            \Log::error('Blog post error: ' . $e->getMessage());
            \Log::error('Stack trace: ' . $e->getTraceAsString());
            if (request()->wantsJson() || request()->ajax()) {
                return response()->json([
                    'error' => true,
                    'message' => 'Blog post not found',
                    'debug' => config('app.debug') ? $e->getMessage() : null
                ], 404);
            }
            abort(404, 'Blog post not found');
        }
    }

}
