@extends('admin.layouts.admin')

@section('title', 'Category')

@section('content')
    <div class="card">
        <div class="card-header">
            <h3 class="card-title">Create Category</h3>
        </div>
        <div class="card-body">
            <form method="POST" action="{{ route('categories.store') }}">
                @csrf
                <div class="row">
                    <div class="col-sm-6">
                        <div class="form-group">
                            <label for="name">{{ __('Name') }}</label>
                            <input type="text" class="form-control" id="name" name="name" placeholder="Category Name">
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="form-group">
                            <label for="description">{{ __('Description') }}</label>
                            <input type="text" class="form-control" id="description" name="description" placeholder="Enter Category Description">
                        </div>
                    </div>
                </div>
                @can('category create')
                <div class="form-footer pt-5 border-top">
                    <button type="submit" class="btn btn-primary btn-pill">{{ __('Create') }}</button>
                </div>
                @endcan
            </form>
        </div>
    </div>
@endsection
