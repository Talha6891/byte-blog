@extends('site.layouts.app')

@section('title', 'Home')

@section('content')
    <section class="section bg-dark">
        <div class="container">

            {{-- search content form --}}
            <div class="row justify-content-center mb-5 ">

                <div class="col-md-8">
                    <form class="search-form">
                        <div class="input-group">
                            <input type="text" name="query" class="form-control form-control-lg" placeholder="Search here...">
                            <button class="btn btn-outline-danger" type="submit">Search</button>
                        </div>
                    </form>
                </div>
            </div>

            {{-- showing blogs  --}}
            <div class="row align-items-stretch retro-layout">
                @forelse($posts as $post)
                    <div class="col-md-4 mb-lg-4 mb-sm-2">
                        <a href="{{ route('post.show', $post->slug) }}" class="h-entry v-height gradient">
                            <div class="featured-img rounded"
                                 style="background-image: url('{{ $post->getFirstMediaUrl('post')  ?? asset('assets/admin/images/fallback_image.jpg') }}');">
                            </div>

                            <div class="text">
                                <span class="date">{{ $post->created_at->format('M. jS, Y') }}</span>
                                <h2>{{ Str::title(Str::limit($post->title, 40)) }}</h2>
                            </div>
                        </a>
                    </div>
                @empty
                    <div class="text-center text-danger fw-bolder">{{ __('No Post available') }}</div>
                @endforelse
            </div>

        </div>
    </section>
@endsection
