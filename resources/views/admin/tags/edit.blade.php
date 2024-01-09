@extends('admin.layouts.admin')

@section('title', 'Edit Tag')

@section('content')
    <form method="POST" action="{{ route('tags.update', $tag) }}">
        @method('PUT')
        @csrf
        <div class="row">

            {{-- name --}}
            <div class="col-sm-6">
                <div class="form-group">
                    <label for="name">{{ __('Name') }}</label>
                    <input type="text" class="form-control" id="name" name="name" placeholder="Name"
                           value="{{ $tag->name }}">
                </div>
            </div>

            {{-- description --}}
            <div class="col-sm-6">
                <div class="form-group">
                    <label for="description">{{ __('Description') }}</label>
                    <input type="text" class="form-control" id="description" name="description"
                           placeholder="Description here..."
                           value="{{ $tag->description ?: '' }}">
                </div>
            </div>
        </div>
        @can('tag update')
            <button type="submit" class="btn btn-primary col-3">{{ __('Update Tag') }}</button>
        @endcan
    </form>
@endsection
