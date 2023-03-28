<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.bunny.net/css?family=Nunito" rel="stylesheet">

    <!-- Bootstrap -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.3/font/bootstrap-icons.css">
    <link rel="stylesheet" href="{{ asset('assets/bootstrap/css/bootstrap.min.css') }}">

    {{-- style --}}
    <style>
        /* Chrome, Safari, Edge, Opera */
        input::-webkit-outer-spin-button,
        input::-webkit-inner-spin-button {
            -webkit-appearance: none;
            margin: 0;
        }

        /* Firefox */
        input[type=number] {
            -moz-appearance: textfield;
        }

        .overflow-hidden {
            overflow: hidden;
        }

        .height-10-vh {
            height: 10vh;
        }

        .border-top-left-rounded {
            border-top-left-radius: 6%;
        }

        .border-rounded {
            border-radius: 6%
        }

        .dropdown-toggle::after {
            content: none;
        }
    </style>
</head>

<body>
    <div class="overflow-hidden" id="app">
        <nav class="navbar navbar-expand-sm navbar-light bg-white height-10-vh">
            <div class="container-fluid">
                <a class="navbar-brand" href="{{ url('/') }}">
                    {{ config('app.name', 'Laravel') }}
                </a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                    data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                    aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav me-auto">

                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ms-auto">
                        <!-- Authentication Links -->
                        @guest
                        @if (Route::has('login'))
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                        </li>
                        @endif

                        @if (Route::has('register'))
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                        </li>
                        @endif
                        @else
                        <li class="nav-item dropdown">
                            <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button"
                                data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                {{ Auth::user()->name }}
                            </a>

                            <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                                <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                    {{ __('Logout') }}
                                </a>

                                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                    @csrf
                                </form>
                            </div>
                        </li>
                        @endguest
                    </ul>
                </div>
            </div>
        </nav>

        <main class="row">
            <div class="col-md-2">
                <div class="d-flex flex-column flex-shrink-0 p-3 bg-white" style="height: 90vh;">
                    <ul class="nav nav-pills flex-column mb-auto">
                        <li class="nav-item">
                            <a href="{{ route('admin.dashboard') }}"
                                class="nav-link {{ Route::currentRouteName() == 'admin.dashboard' ? 'active' : 'link-dark' }}"
                                aria-current="page">
                                <svg class="bi pe-none me-2" width="16" height="16">
                                    <use xlink:href="#home"></use>
                                </svg>
                                Dashboard
                            </a>
                        </li>
                        <li>
                            <a href="{{ route('admin.member.list') }}"
                                class="nav-link {{ Route::currentRouteName() == 'admin.member.list' ? 'active' : 'link-dark' }}">
                                <svg class="bi pe-none me-2" width="16" height="16">
                                    <use xlink:href="#table"></use>
                                </svg>
                                Members
                            </a>
                        </li>
                        <li>
                            <a href="{{ route('admin.saving.list') }}" 
                                class="nav-link {{ Route::currentRouteName() == 'admin.saving.list' ? 'active' : 'link-dark' }}">
                                <svg class="bi pe-none me-2" width="16" height="16">
                                    <use xlink:href="#grid"></use>
                                </svg>
                                Saving
                            </a>
                        </li>
                        <li>
                            <a href="#" 
                                class="nav-link {{ Route::currentRouteName() == '' ? 'active' : 'link-dark' }}">
                                <svg class="bi pe-none me-2" width="16" height="16">
                                    <use xlink:href="#people-circle"></use>
                                </svg>
                                Loan
                            </a>
                        </li>
                        <li>
                            <a href="#" 
                                class="nav-link {{ Route::currentRouteName() == '' ? 'active' : 'link-dark' }}">
                                <svg class="bi pe-none me-2" width="16" height="16">
                                    <use xlink:href="#people-circle"></use>
                                </svg>
                                Installment
                            </a>
                        </li>
                    </ul>
                </div>
            </div>

            <div class="col-md-10 border border-dark bg-secondary border-top-left-rounded p-3" style="height: 90vh;">
                <div class="border-rounded bg-white m-4" style="height: 82vh;">
                    @yield('content')
                </div>
            </div>
        </main>
    </div>

    {{-- Bootstrap --}}
    <script src="{{ asset('assets/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('assets/Jquery/jquery-3.6.4.min.js') }}"></script>
    @yield('script')
</body>

</html>