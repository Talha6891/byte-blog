@extends('admin.layouts.admin')

@section('title', 'Show Post')

@section('content')
    <form>
        <fieldset disabled>

            {{-- post image --}}
            <div class="mb-3 text-center">
                <img class="img-thumbnail" src="{{ $post->getFirstMediaUrl('post') ?? asset('assets/admin/images/fallback_image.jpg')  }}"
                     alt="Post Image" style="max-width: 100%; max-height: 70vh;">
            </div>


            {{-- name --}}
            <div class="form-group">
                <label for="title">{{ __('Post Title') }}</label>
                <input type="text" id="title" class="form-control" value="{{ $post->title }}" disabled>
            </div>

            {{-- slug --}}
            <div class="form-group">
                <label for="slug">{{ __('Slug') }}</label>
                <input type="text" id="slug" class="form-control" value="{{ $post->slug }}" disabled>
            </div>

            {{-- category --}}
            <div class="form-group">
                <label for="category_id">{{ __('Category') }}</label>
                <input type="text" id="category" class="form-control" value="{{ $post->category->name }}" disabled>
            </div>

            {{-- content --}}
            <div class="form-group">
                <label for="content">{{ __('Post Content') }}</label>
                <div class="post-content">
                    @if($post->content)
                        {!! nl2br($post->content) !!}
                    @else
                        <p class="empty-message">{{ __('No content available.') }}</p>
                    @endif
                </div>
            </div>

            {{-- tags --}}
            <div class="form-group">
                <label for="tags">{{ __('Tag(s)') }}</label>
                <select id="tags" name="tags[]"
                        class="form-control @error('tags') is-invalid @enderror" multiple>
                    @forelse($post->tags as $tag)
                        <option value="{{ $tag->id }}" disabled>{{ $tag->name }}</option>
                    @empty
                        <option>{{ __('No Tag Available') }}</option>
                    @endforelse
                </select>
            </div>

            {{-- status --}}
            <div class="form-group">
                <label for="status">{{ __('Status') }}</label>
                <input type="text" id="status" class="form-control" value="{{ $post->status }}" disabled>
            </div>

            {{-- published at --}}
            <div class="form-group">
                <label for="published_at">{{ __('Published At') }}</label>
                <input type="text" id="status" class="form-control"
                       value="{{ $post->published_at ?: 'Not Published Yet' }}" disabled>
            </div>

            {{-- views_count --}}
            <div class="form-group">
                <label for="views_count">{{ __('Post View') }}</label>
                <input type="text" id="views_count" class="form-control" value="{{ $post->views_count  }}" disabled>
            </div>

            {{-- comments_enabled --}}
            <div class="form-group">
                <label for="comments_enabled">{{ __('Comments Enabled ') }}</label>
                <input type="text" id="comments_enabled" class="form-control" value="{{ $post->comments_enabled }}"
                       disabled>
            </div>

            {{-- created by --}}
            <div class="form-group">
                <label for="created_by">{{ __('Created By') }}</label>
                <input type="text" id="created_by" class="form-control" value="{{ $post->user->first()->name }}"
                       disabled>
            </div>

            {{-- created at --}}
            <div class="form-group">
                <label for="created_at">{{ __('Created At') }}</label>
                <input type="text" id="created_at" class="form-control"
                       value="{{ $post->created_at->format('d M Y h:i:s') }}" disabled>
            </div>

        </fieldset>

    </form>
@endsection
