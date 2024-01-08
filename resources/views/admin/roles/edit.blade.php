@extends('admin.layouts.admin')

@section('title', 'Edit Role')

@section('content')
    <form method="POST" action="{{ route('roles.update', $role) }}">
        @method('PUT')
        @csrf
        <div class="row">

            {{-- name --}}
            <div class="col-sm-6">
                <div class="form-group">
                    <label for="name">{{ __('Name') }}</label>
                    <input type="text" class="form-control" id="name" name="name[]" placeholder="Name"
                           value="{{ $role->name }}">
                </div>
            </div>

            {{-- permissions --}}
            <div class="form-group">
                <label for="name">{{ __('Permissions') }}</label>
                <div class="row mt-2">
                    @foreach ($permissions as $permission)
                        <div class="col-md-3 col-6">
                            <label class="d-flex align-items-center">
                                {{ $permission->name }}
                                <label class="switch switch-text switch-primary switch-pill ml-auto">
                                    <input type="checkbox" class="switch-input form-check-input" name="permissions[]"
                                           value="{{ $permission->id }}" @checked($role->hasPermissionTo($permission))>
                                    <span class="switch-label" data-on="On" data-off="Off"></span>
                                    <span class="switch-handle"></span>
                                </label>
                            </label>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
        @can('role edit')
            <div class="form-footer pt-5 border-top">
                <button type="submit" class="btn btn-primary btn-pill">{{ __('Update') }}</button>
            </div>
        @endcan
    </form>
@endsection
