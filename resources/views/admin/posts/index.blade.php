@extends('admin.layouts.admin')

@section('title', 'Posts')

@section('content')
    {{-- flash message --}}
    @if(session()->has('message'))
        <x-message :message="session('message')"/>
    @endif

    {{-- Create button --}}
    @can('post create')
        <a href="{{ route('posts.create') }}" class="btn btn-primary mb-3">
            <i class="bi bi-plus"></i> {{ __('Create Post') }}
        </a>
    @endcan

    {{-- DataTable of users --}}
    <div class="card">
        <div class="card-header">
            <h2 class="fw-bold">{{ __('Posts') }}</h2>
        </div>
        <div class="card-body">
            <table class="table table-hover text-center">
                <thead>
                <tr>
                    <th>#{{ __('ID') }}</th>
                    <th>{{ __('Title') }}</th>
                    <th>{{ __('Slug') }}</th>
                    <th>{{ __('Category') }}</th>
                    <th>{{ __('Status') }}</th>
                    <th>{{ __('Post Views ') }}</th>
                    <th>{{ __('Published At ') }}</th>
                    <th>{{ __('Actions') }}</th>
                </tr>
                </thead>
                <tbody>

                @forelse ($posts as $post)
                    <tr>
                        {{-- id --}}
                        <th>{{ $post->id }}</th>

                        {{-- title --}}
                        <td>
                            {{ Str::limit($post->title, 10) }}
                        </td>

                        {{-- slug --}}
                        <td>{{ Str::limit($post->slug, 10) }}</td>

                        {{-- category --}}
                        <td>{{ $post->category->name }}</td>

                        {{-- status --}}
                        <td>{{ $post->status }}</td>

                        {{-- post views --}}
                        <td>{{ $post->views_count }}</td>

                        {{-- published at --}}
                        <td>{{ $post->published_at ?: 'NULL' }}</td>

                        <td class="d-flex justify-content-center">
                            {{-- show user --}}
                            @can('post show')
                                <a href="{{ route('posts.show', $post) }}" class="btn btn-success btn-sm">
                                    <i class="bi bi-eye"></i>
                                </a>
                            @endcan

                            {{-- edit user --}}
                            @can('post edit')
                                <a href="{{ route('posts.edit', $post) }}" class="btn btn-warning btn-sm mx-1">
                                    <i class="bi bi-pencil"></i>
                                </a>
                            @endcan

                            {{-- delete user --}}
                            @can('post delete')
                                <form method="POST" action="{{ route('posts.destroy', $post) }}"
                                      id="deleteForm{{ $post->id }}">
                                    @csrf
                                    @method('DELETE')
                                    <button type="button" class="btn btn-sm btn-danger"
                                            onclick="sweetAlertDelete('deleteForm{{ $post->id }}')">
                                        <i class="bi bi-trash"></i>
                                    </button>
                                </form>
                            @endcanany
                        </td>
                    </tr>
                @empty
                    <tr class="text-danger fw-bold">
                        <td colspan="8">{{ __('No User Available') }}</td>
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
