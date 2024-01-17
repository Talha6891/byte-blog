<?php

namespace App\Http\Controllers;

use App\Http\Requests\StorePostRequest;
use App\Http\Requests\UpdatePostRequest;
use App\Models\Category;
use App\Models\Post;
use App\Models\Tag;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;

class PostController extends Controller
{
    public function __construct()
    {
        $this->authorizeResource(Post::class,'post');
    }
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $query = Post::query();

        $searchQuery = $request->input('search');

        if ($searchQuery) {
            $query->where('id', 'LIKE', "%$searchQuery%")
                ->orWhere('name', 'LIKE', "%$searchQuery%")
                ->orWhere('slug', 'LIKE', "%$searchQuery%")
                ->orWhere('category', 'LIKE', "%$searchQuery%")
                ->orWhere('tag', 'LIKE', "%$searchQuery%")
                ->orWhere('description', 'LIKE', "%$searchQuery%")
                ->orWhere('created_at', 'LIKE', "%$searchQuery%");
        }
        $posts = $query->paginate(10);

        return view('admin.posts.index', compact('posts'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $categories = Category::all();
        $tags = Tag::all();
        return view('admin.posts.create', compact('categories', 'tags'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StorePostRequest $request)
    {
        $validated = $request->validated();
        $validated['slug'] = Str::slug($request->title, '_', true);
        $validated['user_id'] = Auth::id();

        $post = Post::create($validated);

        // Attach tags to the post
        $tags = collect($validated['tags'])->map(function ($tagName) {
            return Tag::firstOrCreate(
                ['name' => $tagName],
                [
                    'slug' => Str::slug($tagName, '_', true),
                    'user_id' => Auth::id(),
                    'created_at' => now(),
                ]
            );
        });
        $post->tags()->sync($tags->pluck('id'));

        // storing image
        if ($request->hasFile('image') && $request->file('image')->isValid()) {

            $post->addMediaFromRequest('image')
                ->toMediaCollection('post');
        }
        session()->flash('message', 'Post created successfully');
        return to_route('posts.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(Post $post)
    {
        return view('admin.posts.show', compact('post'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Post $post)
    {
        $categories = Category::all();
        $tags = Tag::all();

        return view('admin.posts.edit', compact('post', 'categories', 'tags'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdatePostRequest $request, Post $post)
    {
        $validated = $request->validated();
        if ($post->title !== $request->title) {
            $validated['slug'] = Str::slug($request->title, '_', true);
        }
        $validated['user_id'] = Auth::id();
        $post->update($validated);

        // Attach tags to the post
        $tags = collect($validated['tags'])->map(function ($tagName) {
            return Tag::firstOrCreate(['name' => $tagName], [
                'slug' => Str::slug($tagName, '_'),
                'user_id' => Auth::id(),
                'created_at' => now(),
            ]);
        });
        $post->tags()->sync($tags->pluck('id'));

        // Handle file uploads
        if ($request->hasFile('image')) {
            $post->addMediaFromRequest('image')->toMediaCollection('post');
        }
        session()->flash('message', 'Post updated successfully');
        return to_route('posts.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Post $post)
    {
        $post->tags()->detach();
        $post->delete();

        session()->flash('message', 'Post updated successfully');
        return back();
    }
}
