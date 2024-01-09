@extends('admin.layouts.admin')

@section('title', 'Role')

@section('content')
    {{-- flash message --}}
    @if(session()->has('message'))
        <x-message :message="session('message')"/>
    @endif

    {{-- Create button --}}
    @can('role create')
        <a href="{{ route('roles.create') }}" class="btn btn-primary mb-3">
            <i class="bi bi-plus"></i> {{ __('Create Role') }}
        </a>
    @endcan

    {{-- DataTable of categories --}}
    <div class="card">
        <div class="card-header">
            <div class="d-flex justify-content-between">

                <h2 class="fw-bold">{{ __('Roles') }}</h2>

                {{-- search record --}}
                <div class="input-group col-4">
                    <form action="{{ route('roles.index') }}" method="GET" class="form-inline">
                        <div class="input-group">
                            <input type="text" name="search" class="form-control"
                                   placeholder="{{ __('Search') }}">
                            <div class="input-group-append">
                                <button type="submit" class="btn btn-primary">
                                    <i class="bi bi-search"></i>
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <div class="card-body">
            <table class="table table-hover text-center">
                <thead>
                <tr>
                    <th>#{{ __('ID') }}</th>
                    <th>{{ __('Name') }}</th>
                    <th>{{ __('Created At') }}</th>
                    <th>{{ __('Actions') }}</th>
                </tr>
                </thead>
                <tbody>

                @forelse ($roles as $role)
                    <tr>
                        {{-- id --}}
                        <th>{{ $role->id }}</th>

                        {{-- title --}}
                        <td>
                            {{ Str::limit($role->name, 10) }}
                        </td>

                        {{-- created at --}}
                        <td>{{ $role->created_at->format('d M Y h:i:s') }}</td>

                        {{-- Actions --}}
                        <td class="d-flex justify-content-center">
                            {{-- show category --}}
                            @can('role show')
                                <a href="{{ route('roles.show', $role) }}" class="btn btn-sm btn-success">
                                    <i class="bi bi-eye"></i>
                                </a>
                            @endcan

                            {{-- edit category --}}
                            @can('role update')
                                <a href="{{ route('roles.edit', $role) }}" class="btn btn-sm btn-warning mx-1">
                                    <i class="bi bi-pencil"></i>
                                </a>
                            @endcan

                            {{-- delete category --}}
                            @can('role delete')
                                <form method="POST" action="{{ route('roles.destroy', $role) }}"
                                      id="deleteForm{{ $role->id }}">
                                    @csrf
                                    @method('DELETE')
                                    <button type="button" class="btn btn-sm btn-danger"
                                            onclick="sweetAlertDelete('deleteForm{{ $role->id }}')">
                                        <i class="bi bi-trash"></i>
                                    </button>
                                </form>
                            @endcan
                        </td>
                    </tr>
                @empty
                    <tr class="text-danger fw-bold">
                        <td colspan="8">{{ __('No roles Available') }}</td>
                    </tr>
                @endforelse
                </tbody>
            </table>
        </div>
        {{-- pagination --}}
        <div class="d-flex justify-content-center">
            {{ $roles->links('admin.pagination') }}
        </div>
    </div>

    {{-- Sweet Alert --}}
    @push('scripts')
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
