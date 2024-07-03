<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\User;
use Illuminate\Http\Request;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $posts = Post::latest()->paginate(10);

        return view('post.index', compact('posts'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('post.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // Validate form
        $request->validate([
            'image' => 'image|mimes:jpeg,jpg,png|max:51200',
            'caption' => 'required|min:5',
        ]);

        if (! $request->hasFile('image')) {
            return back()->withErrors(['image' => 'Image not uploaded']);
        }

        $image = $request->file('image');

        try {
            $image->storeAs('public/posts', $image->hashName());

            Post::create([
                'image' => $image->hashName(),
                'caption' => $request->caption,
                'user_id' => auth()->id(),
            ]);

            return redirect('/')->with('success', 'Create Post Success');

        } catch (\Exception $e) {
            return back()->withErrors(['image' => $e->getMessage()]);
        }
    }

    // Show Post By Auth User ID
    public function showPostByID()
    {
        $user = User::findOrFail(auth()->id());
        $posts = $user->posts()->latest()->paginate(10);

        return view('dashboard', compact('posts'));
    }

    /**
     * Display the specified resource.
     */
    public function show(Post $post)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Post $post)
    {
        return view('post.edit', compact('post'));
    }

    public function update(Request $request, Post $post)
    {
        $request->validate([
            'caption' => 'required|min:5',
            'image' => 'image|mimes:jpeg,jpg,png|max:51200',
        ]);

        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $image->storeAs('public/posts', $image->hashName());
            $post->image = $image->hashName();
        }

        $post->caption = $request->caption;
        $post->save();

        return redirect()->route('dashboard')->with('success', 'Post updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Post $post)
    {
        //
    }
}
