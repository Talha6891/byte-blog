@extends('admin.layouts.admin')

@section('title', 'Roles')

@section('content')
    <div class="card">
        <div class="card-header">
            <h3 class="card-title">{{ __('Create Role') }}</h3>
        </div>

        <div class="card-body">
            <form method="POST" action="{{ route('roles.store') }}">
                @csrf
                <div class="row">
                    <div class="col-12">
                        <div class="form-group">
                            <label for="name">{{ __('Name') }}</label>
                            <input type="text" class="form-control" id="name" name="name" placeholder="Role name">
                        </div>

                        <div class="form-group">
                            <label for="name">{{ __('Permissions') }}</label>
                            <div class="row mt-2">
                                @foreach ($permissions as $permission)
                                    <div class="col-md-3 col-6">
                                        <label class="d-flex align-items-center">
                                            {{ $permission->name }}
                                            <label class="switch switch-text switch-primary switch-pill ml-auto">
                                                <input type="checkbox" class="switch-input form-check-input"
                                                       name="permissions[]" value="{{ $permission->id }}">
                                                <span class="switch-label" data-on="On" data-off="Off"></span>
                                                <span class="switch-handle"></span>
                                            </label>
                                        </label>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    </div>
                    @can('role create')
                        <button type="submit" class="btn btn-primary col-3">{{ __('Create Role') }}</button>
                    @endcan
                </div>
            </form>
        </div>
    </div>
@endsection
