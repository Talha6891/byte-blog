@extends('admin.layouts.admin')

@section('title', 'Show Category')

@section('content')
    <form>
        <fieldset disabled>
            {{-- name --}}
            <div class="form-group">
                <label for="name">{{ __('Name') }}</label>
                <input type="text" id="name" class="form-control"  value="{{ $tag->name }}" disabled>
            </div>

            {{-- slug --}}
            <div class="form-group">
                <label for="slug">{{ __('Slug') }}</label>
                <input type="text" id="slug" class="form-control" value="{{ $tag->slug }}" disabled>
            </div>

            {{-- description --}}
            <div class="form-group">
                <label for="description">{{ __('Description') }}</label>
                <input type="text" id="description" class="form-control" value="{{ $tag->description ?: '' }}" disabled>
            </div>

            {{-- created by --}}
            <div class="form-group">
                <label for="created_by">{{ __('Created By') }}</label>
                <input type="text" id="created_by" class="form-control" value="{{ $tag->user->first()->name }}" disabled>
            </div>

            {{-- created at --}}
            <div class="form-group">
                <label for="created_at">{{ __('Created At') }}</label>
                <input type="text" id="created_at" class="form-control" value="{{ $tag->created_at->format('d M Y h:i:s') }}" disabled>
            </div>

        </fieldset>
    </form>
@endsection
