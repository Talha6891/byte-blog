<nav class="navbar navbar-expand-lg navbar-dark bg-dark border-bottom border-white">
    <div class="container">
        <a class="navbar-brand" href="#">
            <img src="{{ asset('assets/site/images/byte-blog-logo.png') }}" alt="logo" width="60px" height="60px">
            <span class="fw-bolder">{{ __('Byte Blog') }}</span>
        </a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav mx-auto">
                <li class="nav-item active">
                    <a class="nav-link" href="">{{ __('Home') }}</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="">{{ __('Category') }}</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="">{{ __('Articles') }}</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="">{{ __('Tags') }}</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="">{{ __('Contact us') }}</a>
                </li>
            </ul>
            <ul class="navbar-nav ms-auto"> <li class="nav-item">
                    @auth
                        <a class="btn btn-outline-warning me-3" href="{{ route('logout') }}"
                           onclick="event.preventDefault();
                           document.getElementById('logout-form').submit();">{{ __('Logout') }}</a>

                        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                            @csrf
                        </form>
                    @else
                        <a class="btn btn-outline-warning me-3" href="{{ route('login') }}">{{ __('Login') }}</a>
                        <a class="btn btn-outline-warning" href="{{ route('register') }}">{{ __('Sign up') }}</a>
                    @endauth
                </li>
            </ul>
        </div>
    </div>
</nav>
