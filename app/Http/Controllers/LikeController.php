<?php

namespace App\Http\Controllers;

use App\Models\Like;
use App\Models\Post;

class LikeController extends Controller
{
    public function likePost($postId)
    {
        $post = Post::findOrfail($postId);
        Like::create([
            'user_id' => auth()->id(),
            'post_id' => $post->id,
        ]);

        return view('partials.like', ['post' => $post]);
    }

    public function unlikePost($postId)
    {
        $post = Post::findOrfail($postId);
        $like = Like::where('user_id', auth()->id())->where('post_id', $post->id)->first();

        if ($like) {
            $like->delete();
        }

        return view('partials.like', ['post' => $post]);
    }
}
