@extends('admin.layouts.admin')

@section('title', 'Édit User')

@section('content')
    <form method="POST" action="{{ route('users.update', $user) }}">
        @method('PUT')
        @csrf
        <div class="row">
            <div class="col-sm-6">
                <div class="form-group">
                    <label for="name">{{ __('Name') }}</label>
                    <input type="text" class="form-control" id="name" name="name" placeholder="Name"
                           value="{{ $user->name }}">
                </div>
            </div>
            <div class="col-sm-6">
                <div class="form-group">
                    <label for="email">{{ __('Email') }}</label>
                    <input type="text" class="form-control" id="email" name="email" placeholder="Email"
                           value="{{ $user->email }}">
                </div>
            </div>
            <div class="col-sm-6">
                <div class="form-group">
                    <label for="role">{{ __('Role') }}</label>
                    {{-- Use a select dropdown for roles --}}
                    <select class="form-control" id="role" name="role">
                        @foreach($roles as $role)
                            <option
                                value="{{ $role->id }}" {{ $user->roles->first()->id == $role->id ? 'selected' : '' }}>{{ $role->name }}</option>
                        @endforeach
                    </select>
                </div>
            </div>
            <div class="col-sm-6">
                <div class="form-group">
                    <label for="created_at">{{ __('Created At') }}</label>
                    <input type="text" class="form-control" id="created_at" name="created_at" placeholder="Created At"
                           value="{{ $user->created_at->format('d M Y H:i:s') }}" readonly>
                </div>
            </div>
        </div>
        @can('user edit')
            <button type="submit" class="btn btn-primary col-3">{{ __('Update User') }}</button>
        @endcan
    </form>
@endsection
