<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\RedirectResponse;
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

    public function create(Request $request): View|RedirectResponse
    {
        if ($request->isMethod('post')) {
            if (!$request->filled(['title', 'content', 'author'])) {
                return view('posts.create', [
                    'title' => 'Create Post',
                    'error' => 'Please fill in all fields.'
                ]);
            }

            $title = $request->input('title');
            $content = $request->input('content');
            $author = $request->input('author');
            $slug = Post::getSlug($title);

            if (strlen($title) < 10) {
                return view('posts.create', [
                    'title' => 'Create Post',
                    'error' => 'Title must be at least 10 characters.'
                ]);
            }

            if (Post::where('slug', $slug)->exists()) {
                return view('posts.create', [
                    'title' => 'Create Post',
                    'error' => 'Slug already exists. Please choose a different title.'
                ]);
            }

            Post::create([
                'title' => $title,
                'body' => $content,
                'author' => $author,
                'slug' => $slug
            ]);



            session()->flash('success', 'Post created successfully.');

            return view('posts.create', [
                'title' => 'Create Post'
            ]);
        }

        return view('posts.create', [
            'title' => 'Create Post'
        ]);
    }
}
