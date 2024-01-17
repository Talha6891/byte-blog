@extends('admin.layouts.admin')

@section('title', 'Show Role')

@section('content')
    <form>
        <fieldset disabled>
            {{-- name --}}
            <div class="form-group">
                <label for="name">{{ __('Name') }}</label>
                <input type="text" id="name" class="form-control"  value="{{ $role->name }}" disabled>
            </div>

            {{-- description --}}
            <div class="form-group">
                <label for="permissions">{{ __('Permissions') }}</label>
                @forelse($role->permissions as $permission)
                <input type="text" id="permissions" class="form-control" value="{{ $permission->name ?: '' }}" disabled>
                @empty
                    <h5 class="text-center text-danger">{{ __('No permission granted.') }}</h5>
                @endforelse
            </div>

            {{-- created at --}}
            <div class="form-group">
                <label for="created_at">{{ __('Created At') }}</label>
                <input type="text" id="created_at" class="form-control" value="{{ $role->created_at->format('d M Y h:i:s') }}" disabled>
            </div>

        </fieldset>
    </form>
@endsection
