<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>@yield('title')</title>

    <!-- Jquery -->
    <script src="https://code.jquery.com/jquery-3.5.1.js"></script>

    <!-- Custom Css -->
    @include('includes.css')
    <!-- Scripts -->
    @vite(['resources/js/app.js', 'resources/sass/app.scss'])
</head>

<body class="font-sans antialiased">
    <div class="d-flex" id="wrapper">
        <!-- Sidebar-->
        <div class="border-end bg-white" id="sidebar-wrapper">
            <div class="sidebar-heading border-bottom bg-light">
                <x-application-logo style="width: 100px;" />
            </div>
            <div class="list-group list-group-flush">
                <a class="list-group-item list-group-item-action list-group-item-light p-3"
                    href="#!"><i class="bi bi-cpu-fill"></i> Dashboard</a>
                <a class="list-group-item list-group-item-action list-group-item-light p-3"
                    href="{{ route('pengguna.index') }}"><i class="bi bi-people-fill"></i> Data
                    Petugas</a>
                <a class="list-group-item list-group-item-action list-group-item-light p-3"
                    href="{{ route('data.index') }}"><i class="bi bi-card-list"></i> Data Masuk</a>
                <a class="list-group-item list-group-item-action list-group-item-light p-3"
                    href="#!"><i class="bi bi-card-checklist"></i> Entry Data</a>
                <a class="list-group-item list-group-item-action list-group-item-light p-3"
                    href="{{ route('profile.edit') }}"><i class="bi bi-person-badge"></i>
                    Profile</a>
                <a class="list-group-item list-group-item-action list-group-item-light p-3"
                    href="#!">Status</a>
            </div>
        </div>
        <!-- Page content wrapper-->
        <div id="page-content-wrapper">
            <!-- Top navigation-->
            <nav class="navbar navbar-expand-lg navbar-light bg-light border-bottom">
                <div class="container-fluid">
                    <button class="btn btn-primary" id="sidebarToggle"><i
                            class="bi bi-list"></i></button>
                    <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                        data-bs-target="#navbarSupportedContent"
                        aria-controls="navbarSupportedContent" aria-expanded="false"
                        aria-label="Toggle navigation"><span
                            class="navbar-toggler-icon"></span></button>
                    <div class="collapse navbar-collapse" id="navbarSupportedContent">
                        <ul class="navbar-nav ms-auto mt-2 mt-lg-0">
                            <li class="nav-item dropdown">
                                <a class="nav-link dropdown-toggle" id="navbarDropdown"
                                    href="#" role="button" data-bs-toggle="dropdown"
                                    aria-haspopup="true"
                                    aria-expanded="false">{{ Auth::user()->name }}</a>
                                <div class="dropdown-menu dropdown-menu-end"
                                    aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item"
                                        href="{{ route('profile.edit') }}">Profile</a>
                                    <div class="dropdown-divider"></div>
                                    <form method="POST" action="{{ route('logout') }}">
                                        @csrf

                                        <a class="dropdown-item" href="{{ route('logout') }}"
                                            onclick="event.preventDefault();
                                                this.closest('form').submit();">
                                            {{ __('Log Out') }}
                                        </a>
                                    </form>
                                    </a>
                                </div>
                            </li>
                        </ul>
                    </div>
                </div>
            </nav>
            <div class="container-fluid p-3">
                <div class="card p-4 shadow shadow-md">
                    <!-- Page Heading -->
                    <header>
                        <h2 class="fw-bold">
                            @yield('header')
                        </h2>
                    </header>
                    <hr>
                    <!-- Page content-->
                    @yield('content')
                </div>
            </div>
        </div>
    </div>
    @include('includes.scripts')
    @stack('scripts')
</body>

</html>
