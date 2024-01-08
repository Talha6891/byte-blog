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
        @can('tag create')
            <div class="form-footer pt-5 border-top">
                <button type="submit" class="btn btn-primary btn-pill">{{ __('Update') }}</button>
            </div>
        @endcan
    </form>
@endsection
