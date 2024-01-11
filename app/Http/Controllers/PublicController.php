<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;

class PublicController extends Controller
{
    public function showPost($slug)
    {
        $post = Post::where('slug',$slug)->firstOrFail();
        if (!$post)
        {
            abort(404);
        }
        $post->increment('views_count');
        return view('site.posts.show', compact('post'));
    }
}
