<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\BlogComment;
use App\Models\BlogPosts;
use Illuminate\Support\Str;

class BlogCommentController extends Controller
{
    private function getSessionId()
    {
        if (!session()->has('visitor_id')) {
            session(['visitor_id' => Str::random(40)]);
        }
        return session('visitor_id');
    }

    public function store(Request $request)
    {
        // Validate the request
        $validated = $request->validate([
            'post_id' => 'required|exists:blog_posts,id',
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'content' => 'required|string'
        ]);

        try {
            // Create the comment
            $comment = BlogComment::create([
                'post_id' => $validated['post_id'],
                'name' => $validated['name'],
                'email' => $validated['email'],
                'content' => $validated['content'],
                'status' => 1,
                'session_id' => $this->getSessionId()
            ]);

            if ($request->wantsJson() || $request->ajax()) {
                return response()->json([
                    'success' => true,
                    'message' => 'Comment posted successfully',
                    'comment' => $comment
                ]);
            }

            return redirect()->back()->with('success', 'Comment posted successfully');
        } catch (\Exception $e) {
            \Log::error('Error posting comment: ' . $e->getMessage());

            if ($request->wantsJson() || $request->ajax()) {
                return response()->json(['success' => false], 500);
            }

            return redirect()->back()->with('error', 'Error posting comment');
        }
    }

    public function update(Request $request, $id)
    {
        try {
            $comment = BlogComment::findOrFail($id);
            
            // Check if the comment belongs to the current session
            if ($comment->session_id !== $this->getSessionId()) {
                return response()->json(['success' => false], 403);
            }

            $validated = $request->validate([
                'content' => 'required|string'
            ]);

            $comment->update([
                'content' => $validated['content']
            ]);

            return response()->json([
                'success' => true,
                'message' => 'Comment updated successfully',
                'comment' => $comment
            ]);
        } catch (\Exception $e) {
            \Log::error('Error updating comment: ' . $e->getMessage());
            return response()->json(['success' => false], 500);
        }
    }

    public function destroy($id)
    {
        try {
            $comment = BlogComment::findOrFail($id);
            
            // Check if the comment belongs to the current session
            if ($comment->session_id !== $this->getSessionId()) {
                return response()->json(['success' => false], 403);
            }

            $comment->delete();

            return response()->json([
                'success' => true,
                'message' => 'Comment deleted successfully'
            ]);
        } catch (\Exception $e) {
            \Log::error('Error deleting comment: ' . $e->getMessage());
            return response()->json(['success' => false], 500);
        }
    }
}
