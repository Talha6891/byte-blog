
<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="shortcut icon" href="{{ asset('assets/site/images/byte-blog-logo.png"') }}">


    <link href="https://fonts.googleapis.com/css2?family=Work+Sans:wght@400;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.1/font/bootstrap-icons.css">

    <link rel="stylesheet" href="{{ asset('assets/site/fonts/icomoon/style.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/site/fonts/flaticon/font/flaticon.css') }}">

    <link rel="stylesheet" href="{{ asset('assets/site/css/tiny-slider.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/site/css/aos.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/site/css/glightbox.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/site/css/style.css') }}">

    <link rel="stylesheet" href="{{ asset('assets/site/css/flatpickr.min.css') }}">


    <title> @yield('title') | {{ config('app.name') }}</title>
</head>
<body>

{{--<div class="site-mobile-menu site-navbar-target">--}}
{{--    <div class="site-mobile-menu-header">--}}
{{--        <div class="site-mobile-menu-close">--}}
{{--            <span class="icofont-close js-menu-toggle"></span>--}}
{{--        </div>--}}
{{--    </div>--}}
{{--    <div class="site-mobile-menu-body"></div>--}}
{{--</div>--}}


{{-- header--}}
@include('site.includes.header')

{{-- content --}}
@yield('content')

{{-- footer --}}
@include('site.includes.footer')

<!-- Preloader -->
<div id="overlayer"></div>
<div class="loader">
    <div class="spinner-border text-primary" role="status">
        <span class="visually-hidden">Loading...</span>
    </div>
</div>

<script src="{{ asset('assets/site/js/bootstrap.bundle.min.js') }}"></script>
<script src="{{ asset('assets/site/js/tiny-slider.js') }}"></script>
<script src="{{ asset('assets/site/js/flatpickr.min.js') }}"></script>

<script src="{{ asset('assets/site/js/aos.js') }}"></script>
<script src="{{ asset('assets/site/js/glightbox.min.js') }}"></script>
<script src="{{ asset('assets/site/js/counter.js') }}"></script>
<script src="{{ asset('assets/site/js/custom.js') }}"></script>

@stack('scripts')

</body>
</html>
