@extends('admin.layouts.admin')

@section('title', 'Show User')

@section('content')
<form>
    <fieldset disabled>
        {{-- name --}}
      <div class="form-group">
        <label for="disabledTextInput">{{ __('Name') }}</label>
        <input type="text" id="disabledTextInput" class="form-control" placeholder="Disabled input" value="{{ $user->name }}">
      </div>

{{-- email --}}
<div class="form-group">
    <label for="disabledTextInput">{{ __('Email') }}</label>
    <input type="text" id="disabledTextInput" class="form-control" placeholder="Disabled input" value="{{ $user->email }}">
  </div>

  {{-- role --}}
<div class="form-group">
    <label for="disabledTextInput">{{ __('Role') }}</label>
    <input type="text" id="disabledTextInput" class="form-control" placeholder="Disabled input" value="{{ $user->roles->first()->name }}">
  </div>

  {{-- email verified at --}}
  <div class="form-group">
    <label for="disabledTextInput">{{ __('Email Verified At') }}</label>
    <input type="text" id="disabledTextInput" class="form-control" placeholder="Disabled input" value="{{ $user->email_verified_at }}">
  </div>

  {{-- created at --}}
  <div class="form-group">
    <label for="disabledTextInput">{{ __('Created At') }}</label>
    <input type="text" id="disabledTextInput" class="form-control" placeholder="Disabled input" value="{{ $user->created_at->format('d M Y H:i:s') }}">
  </div>


    </fieldset>
  </form>
@endsection
