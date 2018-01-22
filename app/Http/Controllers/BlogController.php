<?php

namespace App\Http\Controllers;

use App\Models\Post;

class BlogController extends Controller
{
    public function index()
    {
        $posts = Post::all();
        return view('blog.index', compact('posts'));
    }

    public function show($pk, $slug)
    {
        $post = Post::findOrFail($pk);
        if ($slug != $post->slug) {
            return redirect($post->absoluteUrl);
        }
        return view('blog.show', compact('post'));
    }
}