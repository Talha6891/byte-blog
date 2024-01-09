<header class="main-header" id="header">
    <nav class="navbar navbar-expand-lg navbar-light" id="navbar">
        <!-- Sidebar toggle button -->
        <button id="sidebar-toggler" class="sidebar-toggle">
        </button>

        <span class="page-title">{{ __('Dashboard') }}</span>

        <div class="navbar-right ">

            <!-- search form -->
            <div class="search-form">
                <form action="" method="get">
                    <div class="input-group input-group-sm" id="input-group-search">
                        <input type="text" autocomplete="off" name="query" id="search-input" class="form-control"
                               placeholder="Search..."/>
                        <div class="input-group-append">
                            <button class="btn" type="button">/</button>
                        </div>
                    </div>
                </form>
                {{-- search result --}}
                <ul class="dropdown-menu dropdown-menu-search">
                    <li>
                        <a class="nav-link" href="index.html">Vestibulum at eros</a>
                    </li>
                </ul>
            </div>

            <ul class="nav navbar-nav">
                <!-- Offcanvas -->

                <li class="custom-dropdown">
                    <button class="notify-toggler custom-dropdown-toggler">
                        <i class="mdi mdi-bell-outline icon"></i>
                        <span class="badge badge-xs rounded-circle">21</span>
                    </button>
                    <div class="dropdown-notify">

                        <div class="" data-simplebar style="height: 150px;">
                            <div class="tab-content" id="myTabContent">

                                <div class="tab-pane fade show active" id="all" role="tabpanel" aria-labelledby="all-tabs">
                                    <div class="media media-sm p-4 mb-0">
                                        <div class="media-sm-wrapper bg-info">
                                            <a href="user-profile.html">
                                                <i class="mdi mdi-playlist-check"></i>
                                            </a>
                                        </div>
                                        <div class="media-body">
                                            <a href="user-profile.html">
                                                <span class="title mb-0">Task complete</span>
                                                <span class="discribe">Afraid at highly months do things on at.</span>
                                                <span class="time">
                            <time>1 hrs ago</time>...
                          </span>
                                            </a>
                                        </div>
                                    </div>

                                </div>

                            </div>
                        </div>

                        <footer class="border-top dropdown-notify-footer">
                            <div class="d-flex justify-content-between align-items-center py-2 px-4">
                                <span>Last updated 3 min ago</span>
                                <a id="refress-button" href="javascript:" class="btn mdi mdi-cached btn-refress"></a>
                            </div>
                        </footer>
                    </div>
                </li>
                <!-- User Account -->

                <li class="dropdown user-menu">
                    <button class="dropdown-toggle nav-link" data-toggle="dropdown">
                        <img src="{{ Avatar::create(Auth::user()->name)->toBase64() }}"
                             class="user-image rounded-circle" alt="User Image"/>
                        <span class="d-none d-lg-inline-block">{{ Str::limit(Auth::user()->name ,15) }}</span>
                    </button>
                    <ul class="dropdown-menu dropdown-menu-right">
                        {{-- show profile --}}
                        <li>
                            <a class="dropdown-link-item" href="{{ route('profile.show') }}">
                                <i class="mdi mdi-account-outline"></i>
                                <span class="nav-text">{{ __('My Profile') }}</span>
                            </a>
                        </li>
                        {{-- logout  --}}
                        <li class="dropdown-footer">
                            <a class="dropdown-link-item" href="{{ route('logout') }}" id="logoutButton">
                                <i class="mdi mdi-logout"></i> {{ __('Log Out') }}
                            </a>
                        </li>
                    </ul>
                    {{-- logout form --}}
                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                        @csrf
                    </form>
                </li>
            </ul>
        </div>
    </nav>

    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <script>

    document.addEventListener("DOMContentLoaded", function () {
            // Logout confirmation with SweetAlert
            document.getElementById("logoutButton").addEventListener("click", function (event) {
                event.preventDefault();
                Swal.fire({
                    title: 'Are you sure?',
                    text: 'You will be logged out!',
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'Yes, log me out!'
                }).then((result) => {
                    if (result.isConfirmed) {
                        document.getElementById('logout-form').submit();
                    }
                });
            });
        });
    </script>

</header>
