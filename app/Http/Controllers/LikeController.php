<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\Like;
use Illuminate\Http\Request;
use Auth;
class LikeController extends Controller
{
    public function likePost(Request $request, $postId)
    {
        $post = Post::findOrfail($postId); 
        Like::create([
            "user_id" => auth()->id(),
            "post_id"=> $post->id,
        ]);

        return view('partials.like', ['post' => $post]);
    }

    public function unlikePost (Request $request, $postId) 
    {
        $post = Post::findOrfail($postId);
        $like = Like::where('user_id', Auth::id())->where('post_id', $post->id)->first();

        if ($like) {
            $like->delete();
        }

        return view('partials.like', ['post'=> $post]);
    }
}