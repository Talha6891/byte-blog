<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Show the application homepage.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index() : Renderable
    {
        $posts = Post::where('status','published')
                       ->latest()
                       ->paginate(10);
        return view('site.home', compact('posts'));
    }
}
