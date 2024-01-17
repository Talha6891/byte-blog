@extends('site.layouts.app')

@section('title', Str::title($tag->name))

@section('content')
    <div class="section search-result-wrap">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="heading fw-bold"> {{ __('Tag: ') }} {{ Str::title($tag->name) }}</div>
                </div>
            </div>
            <div class="row posts-entry">
                @forelse($tagPosts as $post)
                    <div class="col-lg-12">
                        <div class="blog-entry d-flex">
                            <a href="{{ route('post.show', $post->slug) }}" class="img-link me-4" style="max-width: 200px; max-height: 200px;">
                                <img src="{{ $post->getFirstMediaUrl('post') }}" alt="Image" class="img-fluid">
                            </a>
                            <div>
                                <span class="date">{{ $post->created_at->format('F j, Y') }}  <a href="">{{ Str::title($post->category->name) }}</a></span>
                                <h2><a href="{{ route('post.show', $post->slug) }}">{{ Str::title(Str::limit($post->title,100)) }}</a></h2>
                                <p>{{ Str::limit(strip_tags($post->content), 100) }}</p>
                                <p><a href="{{ route('post.show', $post->slug) }}" class="btn btn-sm btn-outline-primary">{{ __('Read More') }}</a></p>
                            </div>
                        </div>

                    </div>
                @empty
                    <p class="text-center text-danger fw-bold">{{ __('No Tag Found') }}</p>
                @endforelse
            </div>
        </div>
    </div>
@endsection
