<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use Illuminate\Http\Request;

class CommentController extends Controller
{
    public function index($post_id)
    {
        $comments = Comment::where('post_id', $post_id)->get();
    
        return view('partials.comments', compact('comments'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request, $post_id)
    {
        $request->validate([
            'comment' => 'required|min:5',
        ]);

        try {
            Comment::create([
                "user_id" => auth()->id(),
                "post_id" => $post_id,
                "comment" => $request->comment,
            ]);
        } catch (\Throwable $th) {
            return back()->withErrors(["msg" => $th->getMessage()]);
        }

        return back()->with('success', 'Comment added succesfully');
    }

}
