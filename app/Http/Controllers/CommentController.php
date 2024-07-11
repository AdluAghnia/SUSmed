<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use Illuminate\Http\Request;

class CommentController extends Controller
{
    public function index($post_id)
    {
        $comments = Comment::where('post_id', $post_id)->orderBy('created_at', 'desc')->get() ?? collect();

        return view('comments.index', compact(['comments', 'post_id']));
    }

    public function create($post_id)
    {
        // Return Comment form
        return view('comments.create', compact('post_id'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request, $post_id)
    {
        $request->validate([
            'comment' => 'required|min:1',
        ]);

        try {
            Comment::create([
                'user_id' => auth()->id(),
                'post_id' => $post_id,
                'comment' => $request->comment,
            ]);
        } catch (\Throwable $th) {
            return back()->withErrors(['msg' => $th->getMessage()]);
        }

        $comments = Comment::where('post_id', $post_id)->orderBy('created_at', 'desc')->get() ?? collect();

        // Return newest comment from user
        return view('comments.showAll', compact('comments'))->with(['msg' => 'comment successfully added']);
    }
}
