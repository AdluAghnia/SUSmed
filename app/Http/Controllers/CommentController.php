<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class CommentController extends Controller
{
    public function index($post_id)
    {
        $comments = Comment::where('post_id', $post_id)->orderBy('created_at', 'desc')->get() ?? collect();
        $post = Post::where('id', $post_id)->first();

        return view('comments.index', compact(['comments', 'post_id', 'post']));
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
        $validator = Validator::make($request->all(), [
            'comment' => 'required|max:255',
        ]);

        $errors = null;
        if ($validator->fails()) {
            $errors = $validator->errors();

            $comments = Comment::where('post_id', $post_id)->orderBy('created_at', 'desc')->get() ?? collect();

            return view('comments.errors', compact(['comments', 'errors']));
        }

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
        return view('comments.showAll', compact(['comments', 'errors']))->render();
    }
}
