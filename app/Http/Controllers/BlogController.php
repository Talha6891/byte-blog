<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\View\View;

class BlogController extends Controller
{
    public function index() : View
    {
        $posts = Post::where('status','published')
            ->latest()
            ->paginate(10);
        return view('site.home', compact('posts'));
    }

    public function showSinglePost($slug) : View
    {
        $post = Post::with('comments')->where('slug',$slug)->firstOrFail();
        $latest_posts = Post::inRandomOrder()->take(3)->get();
        $post->increment('views_count');

        return view('site.posts.show', compact('post', 'latest_posts'));
    }
}
