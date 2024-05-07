<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\View\View;
use Illuminate\Http\Request;

class PostController extends Controller
{
    public function index(): View
    {
        $posts = Post::all();

        return view('posts.index', [
            'title' => 'Blog Page',
            'posts' => $posts
        ]);
    }

    public function show(Post $post): View
    {
        return view('posts.show', [
            'title' => 'Singular Post',
            'post' => $post
        ]);
    }

    public function create(): View
    {
        if (request()->isMethod('post')) {
            $data = request()->validate([
                'title' => 'required',
                'body' => 'required',
                'author' => 'required'
            ]);

            Post::create($data);

            return redirect('/posts');
        }

        return view('posts.create', [
            'title' => 'Create Post'
        ]);
    }
}
