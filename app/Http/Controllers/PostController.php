<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\User;
use App\Models\Category;
use Illuminate\View\View;
use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;

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

            try {
                Post::create([
                    'title' => $title,
                    'body' => $content,
                    'slug' => $slug
                ]);
            } catch (\ErrorException $error) {
                return view('posts.create', [
                    'title' => 'Create Post',
                    'error' => 'An error occurred. Please try again.'
                ]);
            }

            session()->flash('success', 'Post created successfully.');

            return redirect('/posts');
        }

        return view('posts.create', [
            'title' => 'Create Post'
        ]);
    }

    public function delete(Post $post): RedirectResponse
    {
        $post->delete();

        session()->flash('success', 'Post deleted successfully.');

        return redirect('/posts');
    }

    public function edit(Post $post, Request $request): View|RedirectResponse
    {
        if ($request->isMethod('put')) {
            Post::where('id', $post->id)->update([
                'title' => $request->input('title'),
                'body' => $request->input('content'),
                'author' => $request->input('author'),
                'slug' => Post::getSlug($request->input('title'))
            ]);

            session()->flash('success', 'Post updated successfully.');

            return redirect('/posts');
        }

        return view('posts.edit', [
            'title' => 'Edit Post',
            'post' => $post
        ]);
    }

    public function author(User $user): View
    {
        $posts = $user->posts;

        return view('posts.author', [
            'title' => $user->name . '\'s Articles',
            'posts' => $posts,
            'author' => $user->name,
        ]);
    }

    public function category(Category $category): View
    {
        $posts = $category->posts;

        return view('posts.category', [
            'title' => 'Articles in: ' . $category->name,
            'posts' => $posts
        ]);
    }
}
