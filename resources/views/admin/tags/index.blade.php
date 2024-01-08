@extends('admin.layouts.admin')

@section('title', 'Tag')

@section('content')
    {{-- flash message --}}
    @if(session()->has('message'))
        <x-message :message="session('message')"/>
    @endif

    {{-- Create button --}}
    @can('tag create')
        <a href="{{ route('tags.create') }}" class="btn btn-primary mb-3">
            <i class="bi bi-plus"></i> {{ __('Create Tag') }}
        </a>
    @endcan

    {{-- DataTable of categories --}}
    <div class="card">
        <div class="card-header">
            <h2 class="fw-bold">{{ __('Tags') }}</h2>
        </div>
        <div class="card-body">
            <table class="table table-hover text-center">
                <thead>
                <tr>
                    <th>#{{ __('ID') }}</th>
                    <th>{{ __('Name') }}</th>
                    <th>{{ __('Slug') }}</th>
                    <th>{{ __('Created By') }}</th>
                    <th>{{ __('Actions') }}</th>
                </tr>
                </thead>
                <tbody>

                @forelse ($tags as $tag)
                    <tr>
                        {{-- id --}}
                        <th>{{ $tag->id }}</th>

                        {{-- title --}}
                        <td>
                            {{ Str::limit($tag->name, 10) }}
                        </td>

                        {{-- slug --}}
                        <td>{{ Str::limit($tag->slug, 10) }}</td>

                        {{-- user --}}
                        <td>{{ $tag->user->name }}</td>

                        {{-- Actions --}}
                        <td class="d-flex justify-content-center">
                            {{-- show category --}}
                            @can('tag show')
                                <a href="{{ route('tags.show', $tag) }}" class="btn btn-sm btn-success">
                                    <i class="bi bi-eye"></i>
                                </a>
                            @endcan

                            {{-- edit category --}}
                            @can('tag edit')
                                <a href="{{ route('tags.edit', $tag) }}" class="btn btn-sm btn-warning mx-1">
                                    <i class="bi bi-pencil"></i>
                                </a>
                            @endcan

                            {{-- delete category --}}
                            @can('tag delete')
                                <form method="POST" action="{{ route('tags.destroy', $tag) }}"
                                      id="deleteForm{{ $tag->id }}">
                                    @csrf
                                    @method('DELETE')
                                    <button type="button" class="btn btn-sm btn-danger"
                                            onclick="sweetAlertDelete('deleteForm{{ $tag->id }}')">
                                        <i class="bi bi-trash"></i>
                                    </button>
                                </form>
                            @endcan
                        </td>
                    </tr>
                @empty
                    <tr class="text-danger fw-bold">
                        <td colspan="8">{{ __('No Categories Available') }}</td>
                    </tr>
                @endforelse
                </tbody>
            </table>
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
