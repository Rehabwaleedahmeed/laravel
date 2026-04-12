<?php

namespace App\Http\Controllers;

use App\Http\Requests\StorepostsRequest;
use App\Http\Requests\UpdatepostsRequest;
use App\Models\posts;

class PostsController extends Controller
{
    public function index()
    {
    $posts = posts::all ();

    return view('posts.index', compact('posts'));
    }

    public function create()
    {
        return view('posts.create');
    }

    public function store(StorepostsRequest $request)
    {
        posts::create([
            'title' => $request->validated('title'),
            'content' => $request->validated('content'),
            'user_id' => auth()->id(),
        ]);

        return redirect()->route('posts.index')->with('success', 'Post created successfully.');
    }


    public function show(posts $post)
    {
        return view('posts.show', compact('post'));
    }

    public function edit(posts $post)
    {
        return view('posts.edit', compact('post'));
    }

    public function update(UpdatepostsRequest $request, posts $post)
    {
        $post->update($request->validated());
          
        return redirect()->route('posts.index')->with('success', 'Post updated successfully.');
    }

    public function destroy(posts $post)
    {
        $post->delete();

        return redirect()->route('posts.index')->with('success', 'Post deleted successfully.');
    }
}
