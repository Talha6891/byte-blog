<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Post;
use App\Models\Tag;
use Illuminate\View\View;

class BlogController extends Controller
{
    public function index(Request $request): View
    {
        $query = $request->input('query');

        if ($query) {
            $posts = Post::where('title', 'like', '%' . $query . '%')
                ->orWhere('content', 'like', '%' . $query . '%')
                ->where('status', 'published') // Filter only published posts
                ->latest()
                ->paginate(10);
        } else {
            $posts = Post::where('status', 'published')
                ->latest()
                ->paginate(10);
        }
        return view('site.home', compact('posts'));
    }
    public function showSinglePost($slug): View
    {
        $post = Post::with('comments')->where('slug', $slug)->firstOrFail();
        $latest_posts = Post::orderByRaw('RAND()')->take(5)->get();
        $post->increment('views_count');

        return view('site.posts.show', compact('post', 'latest_posts'));
    }

    public function showCategoryPosts($slug)
    {
        $category = Category::where('slug', $slug)->firstOrFail();
        $query = Post::where('category_id', $category->id)->with('comments');
        $categoryPosts = $query->latest()->paginate(10);

        return view('site.posts.category-post', compact('category', 'categoryPosts'));
    }
    public function showTagPosts($slug)
    {
        $tag = Tag::where('slug', $slug)->firstOrFail();
        $tagPosts = $tag->posts()->latest()->paginate(10);

        return view('site.posts.tag-post', compact('tag', 'tagPosts'));
    }
}
