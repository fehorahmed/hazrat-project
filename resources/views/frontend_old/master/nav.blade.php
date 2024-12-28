<nav class="navbar navbar-expand-lg py-lg-3 navbar-dark" style="background-color: #705cdf;">
    <div class="container">

        <!-- logo -->
        <a href="{{ url('/') }}" class="navbar-brand me-lg-5">

            <img src="{{ asset('assets/img/logo.png') }}" alt="" class="logo-dark" height="50" />
        </a>

        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown"
            aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
            <i class="mdi mdi-menu"></i>
        </button>

        <!-- menus -->
        <div class="collapse navbar-collapse" id="navbarNavDropdown">

            <!-- left menu -->
            <ul class="navbar-nav me-auto align-items-center">
                <li class="nav-item mx-lg-1">
                    <a class="nav-link " href="{{route('home')}}">Home</a>
                </li>
                @auth('trainee')
                    <li class="nav-item mx-lg-1">
                        <a class="nav-link {{ Route::currentRouteName() === 'trainee.feedback.create' ? 'active' : '' }}"
                            href="{{ route('trainee.feedback.create') }}">Feedback</a>
                    </li>
                @endauth


            </ul>

            <!-- right menu -->
            <ul class="navbar-nav ms-auto align-items-center">
                @auth('trainee')
                    <li class="nav-item me-0">
                        <a href="{{ route('trainee.application.index') }}" class="nav-link d-lg-none"> Applications</a>
                        <a href="{{ route('trainee.application.index') }}"
                            class="btn btn-sm btn-light rounded-pill d-none d-lg-inline-flex me-2">Applications
                        </a>
                    </li>
                    <li class="nav-item me-0">
                        <form action="{{ route('logout') }}" method="post">
                            @csrf
                            <input class=" d-lg-none" type="submit" value="Logout">
                            <button class="btn btn-sm btn-light rounded-pill d-none d-lg-inline-flex "
                                type="submit">Logout</button>
                        </form>
                    </li>
                @else
                    <li class="nav-item me-0">
                        <a href="{{ route('trainee.login') }}" class="nav-link d-lg-none"> Login</a>
                        <a href="{{ route('trainee.login') }}"
                            class="btn btn-sm btn-light rounded-pill d-none d-lg-inline-flex me-2">Login
                        </a>
                    </li>
                    <li class="nav-item me-0">
                        <a href="{{ route('trainee.register') }}" class="nav-link d-lg-none"> Register</a>
                        <a href="{{ route('trainee.register') }}"
                            class="btn btn-sm btn-light rounded-pill d-none d-lg-inline-flex">Register
                        </a>
                    </li>
                @endauth

                {{--                    @if (Route::has('login')) --}}
                {{--                        <div class="hidden fixed top-0 right-0 px-6 py-4 sm:block"> --}}
                {{--                            @auth --}}
                {{--                                <a href="{{ url('/dashboard') }}" class="text-sm text-gray-700 dark:text-gray-500 underline">Dashboard</a> --}}
                {{--                            @else --}}
                {{--                                <a href="{{ route('login') }}" class="text-white">Log in</a> --}}

                {{--                                @if (Route::has('register')) --}}
                {{--                                    <a href="{{ route('register') }}" class="ml-4 text-sm text-gray-700 dark:text-gray-500 underline">Register</a> --}}
                {{--                                @endif --}}
                {{--                            @endauth --}}
                {{--                        </div> --}}
                {{--                    @endif --}}


            </ul>

        </div>
    </div>
</nav>
