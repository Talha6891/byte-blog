@extends('admin.layouts.admin')

@section('title', 'Users')

@section('content')

    {{-- flash message --}}
    @if(session()->has('message'))
        <x-message :message="session('message')"/>
    @endif

    {{-- DataTable of users --}}
    <div class="card">
        <div class="card-header">
            <h2 class="fw-bold">{{ __('Users') }}</h2>
        </div>
        <div class="card-body">
            <table class="table table-hover text-center">
                <thead>
                <tr>
                    <th>{{ __('ID') }}</th>
                    <th>{{ __('Name') }}</th>
                    <th>{{ __('Email') }}</th>
                    <th>{{ __('Role') }}</th>
                    <th>{{ __('Email Verified') }}</th>
                    <th>{{ __('Created At') }}</th>
                    <th>{{ __('Actions') }}</th>
                </tr>
                </thead>
                <tbody>
                @forelse ($users as $user)
                    <tr>
                        <td>{{ $user->id }}</td>
                        <td>{{ $user->name }}</td>
                        <td>{{ $user->email }}</td>
                        <td>
                            @switch($user->roles->first()->name)
                                @case('admin')
                                    <span class="badge badge-danger">{{ $user->roles->first()->name }}</span>
                                    @break
                                @case('writer')
                                    <span class="badge badge-primary">{{ $user->roles->first()->name }}</span>
                                    @break
                                @default
                                    <span class="badge badge-success">{{ $user->roles->first()->name }}</span>
                            @endswitch
                        </td>
                        <td>
                            @if ($user->email_verified_at)
                                <span class="badge badge-success">{{ __('Verified') }}</span>
                            @else
                                <span class="badge badge-danger">{{ __('Unverified') }}</span>
                            @endif
                        </td>
                        <td>{{ $user->created_at->diffForHumans() }}</td>

                        <td class="d-flex justify-content-center">
                            {{-- show user --}}
                            @can('user show')
                                <a href="{{ route('users.show', $user) }}" class="btn btn-success btn-sm">
                                    <i class="bi bi-eye"></i>
                                </a>
                            @endcan

                            {{-- edit user --}}
                            @can('user edit')
                                <a href="{{ route('users.edit', $user) }}" class="btn btn-warning btn-sm mx-1">
                                    <i class="bi bi-pencil"></i>
                                </a>
                            @endcan

                            {{-- delete user --}}
                            @can('user delete')
                                <form method="POST" action="{{ route('users.destroy', $user) }}"
                                      id="deleteForm{{ $user->id }}">
                                    @csrf
                                    @method('DELETE')
                                    <button type="button" class="btn btn-sm btn-danger"
                                            onclick="sweetAlertDelete('deleteForm{{ $user->id }}')">
                                        <i class="bi bi-trash"></i>
                                    </button>
                                </form>
                            @endcan
                        </td>
                    </tr>
                @empty
                    <tr class="text-center text-danger fw-bold">
                        <td colspan="6">{{ __('No User Available') }}</td>
                    </tr>
                @endforelse
                </tbody>
            </table>
        </div>
    </div>

    {{-- Sweet Alert --}}
    @push('scripts')

        {{-- tinymice --}}


        {{-- sweet alert cdn --}}
        <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

        {{-- Delete confirmation message --}}
        <script>
            function sweetAlertDelete(formId) {
                let form = document.getElementById(formId);
                Swal.fire({
                    title: '@lang('Are you sure ? ')',
                    icon: 'question',
                    showDenyButton: true,
                    confirmButtonText: '@lang('Delete ')',
                    denyButtonText: '@lang('Cancel ')',
                }).then((result) => {
                    if (result.isConfirmed) {
                        form.submit();
                    }
                })
            }
        </script>
    @endpush
@endsection
