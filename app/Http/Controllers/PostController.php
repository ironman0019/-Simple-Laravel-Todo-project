<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Post $post)
    {
        $id = auth()->id();

        return view('posts.index', [
            'posts' => Post::all()->where('user_id',null,$id),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('posts.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {

        $formFields = $request->validate([
            'title' => 'required',
        ]);

        $formFields['user_id'] = auth()->id();

        Post::create($formFields);
        return redirect(route('post.index'))->with('message', 'Todo created successfully!');
    }

    /**
     * Display the specified resource.
     */
    public function show(Post $post)
    {
        // make sure user is auth
        if ($post->user_id != auth()->id()) {
            abort('403', 'you are not logged in!');
        }
        
        return view('posts.show', ['post' => $post]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Post $post)
    {
        // make sure user is auth
        if ($post->user_id != auth()->id()) {
            abort('403', 'you are not logged in!');
        }

        return view('posts.edit', ['post' => $post]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Post $post)
    {
        // make sure user is auth
        if($post->user_id != auth()->id()) {
            abort('403', 'you are not logged in!');
        }

        $formFields = $request->validate([
            'title' => ''
        ]);
        $post->update($formFields);
        return redirect(route('post.index'))->with('message', 'Todo edited successfully!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Post $post)
    {
        // make sure user is auth
        if ($post->user_id != auth()->id()) {
            abort('403', 'you are not logged in!');
        }

        $post->delete();
        return redirect(route('post.index'))->with('message', 'Todo deleted successfully!');
    }
}
