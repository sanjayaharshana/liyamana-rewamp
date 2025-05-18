<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\BlogPosts;
use App\Models\BlogReaction;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class BlogReactionController extends Controller
{
    private function getSessionId()
    {
        if (!session()->has('visitor_id')) {
            session(['visitor_id' => Str::random(40)]);
        }
        return session('visitor_id');
    }

    public function getReaction($id)
    {
        try {
            $post = BlogPosts::findOrFail($id);
            $sessionId = $this->getSessionId();

            $reaction = BlogReaction::where('post_id', $id)
                ->where('session_id', $sessionId)
                ->first();

            return response()->json([
                'success' => true,
                'likes' => (int)($post->likes ?? 0),
                'dislikes' => (int)($post->dislikes ?? 0),
                'user_reaction' => $reaction ? $reaction->reaction_type : null
            ]);
        } catch (\Exception $e) {
            Log::error('Error getting reaction: ' . $e->getMessage());
            return response()->json([
                'success' => false, 
                'message' => 'Error getting reaction',
                'error' => $e->getMessage()
            ], 500);
        }
    }

    public function like($id)
    {
        return $this->handleReaction($id, 'like');
    }

    public function dislike($id)
    {
        return $this->handleReaction($id, 'dislike');
    }

    private function handleReaction($id, $type)
    {
        try {
            DB::beginTransaction();

            $post = BlogPosts::findOrFail($id);
            $sessionId = $this->getSessionId();

            // Get existing reaction
            $reaction = BlogReaction::where('post_id', $id)
                ->where('session_id', $sessionId)
                ->first();

            if ($reaction) {
                // If clicking the same reaction type, remove it
                if ($reaction->reaction_type === $type) {
                    $reaction->delete();
                    
                    // Decrement the count
                    if ($type === 'like') {
                        $post->decrement('likes');
                    } else {
                        $post->decrement('dislikes');
                    }
                    $userReaction = null;
                } else {
                    // If changing reaction type, update it
                    $oldType = $reaction->reaction_type;
                    $reaction->reaction_type = $type;
                    $reaction->save();

                    // Update counts
                    if ($oldType === 'like') {
                        $post->decrement('likes');
                        $post->increment('dislikes');
                    } else {
                        $post->decrement('dislikes');
                        $post->increment('likes');
                    }
                    $userReaction = $type;
                }
            } else {
                // Create new reaction
                BlogReaction::create([
                    'post_id' => $id,
                    'session_id' => $sessionId,
                    'reaction_type' => $type
                ]);

                // Increment the count
                if ($type === 'like') {
                    $post->increment('likes');
                } else {
                    $post->increment('dislikes');
                }
                $userReaction = $type;
            }

            // Refresh post to get updated counts
            $post->refresh();

            DB::commit();

            // Log successful reaction
            Log::info("Reaction processed successfully", [
                'post_id' => $id,
                'session_id' => $sessionId,
                'type' => $type,
                'likes' => $post->likes,
                'dislikes' => $post->dislikes
            ]);

            return response()->json([
                'success' => true,
                'likes' => (int)($post->likes ?? 0),
                'dislikes' => (int)($post->dislikes ?? 0),
                'user_reaction' => $userReaction
            ]);
        } catch (\Exception $e) {
            DB::rollBack();
            Log::error('Error handling reaction: ' . $e->getMessage(), [
                'post_id' => $id,
                'type' => $type,
                'error' => $e->getMessage()
            ]);
            return response()->json([
                'success' => false, 
                'message' => 'Error processing reaction',
                'error' => $e->getMessage()
            ], 500);
        }
    }
}
