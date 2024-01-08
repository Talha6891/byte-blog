@extends('admin.layouts.admin')

@section('title', 'Post')

@section('content')
    <div class="card">
        <div class="card-header">
            <h3 class="card-title">{{ __('Create Post') }}</h3>
        </div>

        <div class="card-body">
            <form method="POST" action="{{ route('posts.store') }}" enctype="multipart/form-data">
                @csrf
                <div class="row">

                    {{-- name --}}
                    <div class="col-sm-6">
                        <div class="form-group">
                            <label for="title">{{ __('Title') }}</label>
                            <input type="text" class="form-control @error('title') is-invalid @enderror"
                                   id="title" name="title" placeholder="Post title">
                        </div>
                    </div>

                    {{-- category --}}
                    <div class="col-sm-6">
                        <div class="form-group">
                            <label for="category_id">{{ __('Category') }}</label>
                            <select class="form-control @error('category_id') is-invalid @enderror" id="category_id"
                                    name="category_id"
                                    placeholder="Select Category">
                                <option value="" disabled selected>{{ __('Select Category') }}</option>
                                @forelse($categories as $category)
                                    <option value="{{ $category->id }}">{{ $category->name }}</option>
                                @empty
                                    <option disabled>{{ __('No Category Available') }}</option>
                                @endforelse
                            </select>
                        </div>
                    </div>

                    {{-- content --}}
                    <div class="col-sm-12">
                        <div class="form-group">
                            <label for="content">{{ __('Content') }}</label>
                            <textarea class="form-control @error('content') {{ $message }} @enderror" id="content"
                                      name="content" placeholder="Enter content here"
                                      rows="5"></textarea>
                        </div>
                    </div>

                    {{-- tags --}}
                    <div class="col-sm-6 col-lg-12">
                        <div class="form-group">
                            <label for="tags">{{ __('Tag(s)') }}</label>
                            <select id="tags" name="tags[]"
                                    class="form-control @error('tags') is-invalid @enderror" multiple>
                                @forelse($tags as $tag)
                                    <option value="{{ $tag->id }}">{{ $tag->name }}</option>
                                @empty
                                    <option disabled>{{ __('No Tag Available') }}</option>
                                @endforelse
                            </select>
                        </div>
                    </div>

                    {{-- status --}}
                    <div class="col-sm-6 col-lg-6">
                        <div class="form-group">
                            <label for="status">{{ __('Post Status') }}</label>
                            <select name="status" id="status"
                                    class="form-control @error('status') is-invalid @enderror">
                                <option value="draft" selected>{{ __('Draft') }}</option>
                                <option value="published">{{ __('Published') }}</option>
                            </select>
                        </div>
                    </div>

                    {{-- comments enabled --}}
                    <div class="col-6">
                        <div class="form-group">
                            <label for="comments_enabled">{{ __('Enable Comments') }}</label>
                            <select name="comments_enabled" id="comments_enabled"
                                    class="form-control @error('comments_enabled') is-invalid @enderror">
                                <option value="enabled" selected>{{ __('Enabled') }}</option>
                                <option value="disabled">{{ __('Disabled') }}</option>
                            </select>
                        </div>
                    </div>
                </div>

                {{-- image --}}
                <div class="col-6">
                    <div class="form-group">
                        <label for="image">{{ __('Post Image') }}</label>
                        <div class="custom-file">
                            <input type="file" class="custom-file-input" id="image" name="image">
                            <label class="custom-file-label" for="image">{{ __('Choose File') }}</label>
                        </div>
                    </div>
                </div>

                {{-- create button --}}
                @can('post create')
                    <div class="form-footer pt-5 border-top">
                        <button type="submit" class="btn btn-primary btn-pill">{{ __('Create') }}</button>
                    </div>
                @endcan
            </form>
        </div>
    </div>

    @push('scripts')
        {{-- tinymice component for content field --}}
        <x-tinymice/>

        {{-- select 2 library --}}
        <script>
            $(document).ready(function () {
                $('#tags').select2({
                    tags: true,
                    tokenSeparators: [',', ' ']
                });
            });
        </script>

    @endpush

@endsection
