<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{
    public function index()
    {
        return Post::all();
    }

    public function show(Post $post)
    {
        return $post;
    }

    public function store(Request $request)
    {
        $post = Post::create($request->all());
        return $post;
    }

    public function update(Request $request, Post $post)
    {
        $post->update($request->all());
        return $post;
    }

    public function delete(Post $post)
    {
        return $post->delete();
    }

    public function postWithUser($post)
    {
        return $post = Post::query()
                    ->with('user')
                    ->first();        
    }
}
