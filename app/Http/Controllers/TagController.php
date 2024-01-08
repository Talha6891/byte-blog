<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreTagRequest;
use App\Http\Requests\UpdateTagRequest;
use App\Models\Tag;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;

class TagController extends Controller
{
    public function __construct()
    {
        $this->authorizeResource(Tag::class,'tag');
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $tags = Tag::latest()->paginate(10);
        return view('admin.tags.index', compact('tags'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.tags.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreTagRequest $request)
    {
        $validated = $request->validated();
        $validated['slug'] = Str::slug($validated['name'], '_', true);
        $validated['user_id'] = Auth::id();

        $tag = Tag::create($validated);
        session()->flash('message', 'Successfully created the '.$validated['name'].' tag');

        return to_route('tags.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(Tag $tag)
    {
        try {
            return view('admin.tags.show', compact('tag'));
        } catch (\Exception $exception) {
            return view(404);
        }
    }


    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Tag $tag)
    {
        return view('admin.tags.edit',compact('tag'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateTagRequest $request, Tag $tag)
    {
        $validated = $request->validated();
        $validated['slug'] = Str::slug($validated['name'], '_', true);

        $tag->update($validated);
        session()->flash('message', 'Successfully updated the ' . $validated['name'] . ' category');

        return to_route('tags.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Tag $tag)
    {
        $tag->delete();
        session()->flash('message', 'Successfully deleted the tag');

        return back();
    }
}
