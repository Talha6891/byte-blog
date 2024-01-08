@extends('admin.layouts.admin')

@section('title', 'Tag')

@section('content')
    <div class="card">
        <div class="card-header">
            <h3 class="card-title">{{ __('Create Tag') }}</h3>
        </div>
        <div class="card-body">
            <form method="POST" action="{{ route('tags.store') }}">
                @csrf
                <div class="row">
                    {{-- name --}}
                    <div class="col-sm-6">
                        <div class="form-group">
                            <label for="name">{{ __('Name') }}</label>
                            <input type="text" class="form-control" id="name" name="name" placeholder="Tag Name">
                        </div>
                    </div>
                    {{-- description --}}
                    <div class="col-sm-6">
                        <div class="form-group">
                            <label for="description">{{ __('Description') }}</label>
                            <input type="text" class="form-control" id="description" name="description"
                                   placeholder="Enter Tag Description">
                        </div>
                    </div>
                </div>
                @can('tag create')
                    <div class="form-footer pt-5 border-top">
                        <button type="submit" class="btn btn-primary btn-pill">{{ __('Create') }}</button>
                    </div>
                @endcan
            </form>
        </div>
    </div>
@endsection
