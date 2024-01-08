<aside class="left-sidebar sidebar-dark" id="left-sidebar">
    <div id="sidebar" class="sidebar sidebar-with-footer">

        <div class="app-brand">
            <a href="">
                <img src="{{ asset('assets/admin/images/logo.png') }}" alt="Mono">
                <span class="brand-name">{{ __('Admin') }}</span>
            </a>
        </div>
        <!-- begin sidebar scrollbar -->
        <div class="sidebar-left" data-simplebar style="height: 100%;">
            <!-- sidebar menu -->
            <ul class="nav sidebar-inner" id="sidebar-menu">

                {{-- dashboard --}}
                <li class="active">
                    <a class="sidenav-item-link" href="{{ route('dashboard') }}">
                        <i class="mdi mdi-briefcase-account-outline"></i>
                        <span class="nav-text">{{ __('Dashboard') }}</span>
                    </a>
                </li>

                {{-- roles --}}
                <li>
                    <a class="sidenav-item-link" href="{{ route('roles.index') }}">
                        <i class="bi bi-shield"></i>
                        <span class="nav-text">{{ __('Roles') }}</span>
                    </a>
                </li>

                {{-- users --}}
                <li>
                    <a class="sidenav-item-link" href="{{ route('users.index') }}">
                        <i class="mdi mdi-account-group"></i>
                        <span class="nav-text">{{ __('Users') }}</span>
                    </a>
                </li>

                {{-- category --}}
                <li>
                    <a class="sidenav-item-link" href="{{ route('categories.index') }}">
                        <i class="bi bi-folder-fill"></i>
                        <span class="nav-text">{{ __('Categories') }}</span>
                    </a>
                </li>

                {{-- posts --}}
                <li>
                    <a class="sidenav-item-link" href="{{ route('posts.index') }}">
                        <i class="bi bi-newspaper"></i>
                        <span class="nav-text">{{ __('Posts') }}</span>
                    </a>
                </li>

                {{-- tags --}}
                <li>
                    <a class="sidenav-item-link" href="{{ route('tags.index') }}">
                        <i class="bi bi-tags-fill"></i>
                        <span class="nav-text">{{ __('Tags') }}</span>
                    </a>
                </li>

            </ul>

        </div>

    </div>
</aside>
