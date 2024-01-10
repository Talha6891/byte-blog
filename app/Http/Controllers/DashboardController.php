<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Post;
use App\Models\Tag;
use App\Models\User;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        $total_users = User::count();
        $total_categories = Category::count();
        $total_published_posts = Post::where('status','published')->count();
        $total_draft_posts = Post::where('status','draft')->count();
        $total_tags = Tag::count();

        return view('admin.dashboard', compact('total_users','total_categories',
                                            'total_published_posts','total_draft_posts','total_tags'));
    }
}
