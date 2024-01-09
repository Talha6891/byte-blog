@extends('admin.layouts.admin')

@section('title', 'Dashboard')

@section('content')

    <div class="row text-white fw-bolder">
        {{-- total users --}}
        <div class="card col-xl-3 col-sm-6 bg-success d-flex flex-column justify-content-between">
            <div class="card-body">
                <h3 class="card-title">{{ __('Users') }}</h3>
                <p class="card-text">{{ __('Total Registered Users: ') }}</p>
            </div>
            <a href="{{ route('users.index') }}" class="btn btn-primary mb-1">{{ __('Show users') }}</a>
        </div>

        {{-- total categories --}}
        <div class="card col-xl-3 col-sm-6 bg-secondary d-flex flex-column justify-content-between">
            <div class="card-body">
                <h3 class="card-title">{{ __('Categories') }}</h3>
                <p class="card-text">{{ __('Total categories: ') }}</p>
            </div>
            <a href="{{ route('categories.index') }}" class="btn btn-primary mb-1">{{ __('Show categories') }}</a>
        </div>

        {{-- total post --}}
        <div class="card col-xl-3 col-sm-6 bg-warning d-flex flex-column justify-content-between">
            <div class="card-body">
                <h3 class="card-title">{{ __('Posts') }}</h3>
                <p class="card-text">{{ __('Published posts: ') }}</p>
                <p class="card-text">{{ __('Draft posts: ') }}</p>
            </div>
            <a href="{{ route('posts.index') }}" class="btn btn-primary mb-1">{{ __('Show post') }}</a>
        </div>

        {{-- total tags --}}
        <div class="card col-xl-3 col-sm-6 bg-info d-flex flex-column justify-content-between">
            <div class="card-body">
                <h3 class="card-title">{{ __('Tags') }}</h3>
                <p class="card-text">{{ __('Total tags: ') }}</p>
            </div>
            <a href="{{ route('tags.index') }}" class="btn btn-primary mb-1">{{ __('Show tags') }}</a>
        </div>

    </div>

    {{-- Random Quotes --}}
    <div class="card mt-3">
        <div class="card-header">
            {{ __('Wise Words') }}
        </div>
        <div class="card-body">
            <blockquote class="blockquote mb-0 fw-bolder">
                <p id="random-quote">Loading...</p>
                <footer class="blockquote-footer" id="quote-author"><cite title="Source Title"></cite></footer>
            </blockquote>
        </div>
    </div>

    {{-- JavaScript to fetch and display random quotes every 5 seconds --}}
    <script>
        document.addEventListener("DOMContentLoaded", function () {
            function fetchRandomQuote() {
                fetch('https://api.quotable.io/random')
                    .then(response => response.json())
                    .then(data => {
                        document.getElementById('random-quote').innerHTML = data.content;
                        document.getElementById('quote-author').innerHTML = data.author;
                    })
                    .catch(error => console.error('Error fetching random quote:', error));
            }

            // Initial quote fetch
            fetchRandomQuote();

            // Fetch new quote every 5 seconds
            setInterval(fetchRandomQuote, 10000);
        });
    </script>

@endsection
