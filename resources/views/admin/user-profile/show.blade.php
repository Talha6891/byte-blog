@extends('admin.layouts.admin')

@section('title', 'Show Profile')

@section('content')

    @if(session()->has('message'))
        <x-message :message="session('message')"/>
    @endif

    <div class="card card-default card-profile">

        <div class="card-body card-profile-body d-flex align-items-center justify-content-center">
            <div class="profile-avatar text-center">
                <img class="rounded-circle" src="{{ Avatar::create($user->name)->toBase64() }}" alt="Avatar Image">
                <h5 class="mt-3 mb-2">{{ __($user->name) }}</h5>
                <p>{{ $user->email }}</p>
            </div>
        </div>

        <div class="card-footer card-profile-footer">
            <ul class="nav nav-border-top justify-content-center">
                <li class="nav-item">
                    <a class="nav-link active" href="{{ route('profile.show') }}">Profile</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ url('user-activities') }}">Activities</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ url('user-profile-settings') }}">Settings</a>
                </li>
            </ul>
        </div>


        <div class="row">
            {{-- profile --}}
            <div class="col-6">
                {{-- Account Settings --}}
                <div class="card card-default">
                    <div class="card-header">
                        <h2 class="mb-3">{{ __('Account Settings') }}</h2>
                    </div>

                    <div class="card-body">
                        <form method="POST" action="{{ route('profile.update', $user->id)  }}">
                            @csrf
                            @method('PUT')
                            <div class="row mb-2">
                                {{-- name --}}
                                <div class="form-group col-lg-6">
                                    <label for="name">{{ __('Name') }}</label>
                                    <input type="text"  class="form-control @error('name') is-invalid @enderror" id="name" name="name" value="{{ $user->name }}">
                                @error('name')
                                    {{ $message }}
                                    @enderror
                                </div>

                                {{-- email --}}
                                <div class="form-group col-lg-6">
                                    <label for="email">{{ __('Email') }}</label>
                                    <input type="email" class="form-control" id="email" name="email"
                                           value="{{ $user->email }}" readonly>
                                    @error('email')
                                    {{ $message }}
                                    @enderror
                                </div>

                                <div class="form-group col-lg-6">
                                    <label for="password">{{ __('New password') }}</label>
                                    <div class="input-group">
                                        <input type="password" class="form-control @error('password') is-invalid @enderror" id="password" name="password" placeholder="Password">
                                        <div class="input-group-append">
                                            <button class="btn btn-outline-secondary" type="button" id="toggleNewPassword">
                                                <i class="bi bi-eye-fill"></i>
                                            </button>
                                        </div>
                                    </div>
                                </div>

                                <div class="form-group col-lg-6">
                                    <label for="password-confirm">Confirm password</label>
                                    <div class="input-group">
                                        <input type="password" class="form-control @error('password_confirmation') is-invalid @enderror" id="password-confirm" name="password_confirmation" placeholder="Confirm password">
                                        <div class="input-group-append">
                                            <button class="btn btn-outline-secondary" type="button" id="toggleConPassword">
                                                <i class="bi bi-eye-fill"></i>
                                            </button>
                                        </div>
                                    </div>
                                </div>

                                {{--user role--}}
                                <div class="form-group col-lg-6 ">
                                    <label for="role">{{ __('Role') }}</label>
                                    <input type="text" class="form-control" id="role"
                                           value="{{ $user->roles->first()->name }}" disabled>
                                </div>

                                {{--update button--}}
                                <div class="d-flex justify-content-end mt-6">
                                    <button type="submit" class="btn btn-primary mb-2 ml-3 btn-pill">
                                        {{ __('Update Profile') }}
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>


            </div>

            <div class="col-lg-6">
                <!-- Notification -->
                <div class="card card-default" data-scroll-height="530">
                    <div class="card-header">
                        <h2 class="mb-5">Notification</h2>
                    </div>

                    <div class="card-body slim-scroll">
                        <ul class="list-group">
                            {{--                        @foreach($notifications as $notification)--}}
                            {{--                            <li class="list-group-item list-group-item-action">--}}
                            {{--                                <div class="media media-sm mb-0">--}}
                            {{--                                    <div class="media-sm-wrapper">--}}
                            {{--                                        <img src="{{ $notification['image'] }}" alt="User Image">--}}
                            {{--                                    </div>--}}
                            {{--                                    <div class="media-body">--}}
                            {{--                                        <span class="title">{{ $notification['title'] }}</span>--}}
                            {{--                                        <p>{{ $notification['content'] }}</p>--}}
                            {{--                                    </div>--}}
                            {{--                                </div>--}}
                            {{--                            </li>--}}
                            {{--                        @endforeach--}}
                        </ul>
                    </div>
                </div>
            </div>

            <div class="col-lg-6">

    @push('scripts')
                    <script>
                        document.addEventListener('DOMContentLoaded', function () {
                            // Function to toggle password visibility
                            function togglePassword(inputId, buttonId) {
                                const passwordInput = document.getElementById(inputId);
                                const toggleButton = document.getElementById(buttonId);

                                toggleButton.addEventListener('click', function () {
                                    if (passwordInput.type === 'password') {
                                        passwordInput.type = 'text';
                                        toggleButton.innerHTML = '<i class="bi bi-eye-fill"></i>';
                                    } else {
                                        passwordInput.type = 'password';
                                        toggleButton.innerHTML = '<i class="bi bi-eye-slash-fill"></i>';
                                    }
                                });
                            }

                            // Toggle for new password
                            togglePassword('newPassword', 'toggleNewPassword');

                            // Toggle for confirm password
                            togglePassword('conPassword', 'toggleConPassword');
                        });
                    </script>
    @endpush
@endsection
