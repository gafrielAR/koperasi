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
    <link rel="stylesheet" href="{{ asset('assets/bootstrap/css/bootstrap.min.css') }}">

    <style>
        section {
            background: linear-gradient(to right, transparent 50%, #fff 50%),
                url('http://koperasi.webdev/assets/img/DSC_4856-1.png') no-repeat top left;
            background-size: 100vh contain;
            height: 100vh;
            overflow: hidden;
        }

        .h-100vh {
            height: 100vh;
        }

        .h-20 {
            height: 20vh;
        }

        .h-70 {
            height: 70vh;
        }

        .h-10 {
            height: 10vh;
        }
    </style>
</head>

<body>
    <section style="background: linear-gradient(to right, transparent 50%, #fff 50%),
                url({{ asset('assets/img/DSC_4856-1.png') }}) no-repeat top left;
            background-size: 100vh contain;
            height: 100vh;
            overflow: hidden;">
        <div class="row">
            <div class="col-md-6 offset-md-6 p-0 h-100vh">
                <div class="h-20 p-3">
                    <img src="{{ asset('assets/img/logo-login.png') }}" alt="">
                </div>
                <div class="h-70 d-flex align-items-center">
                    <div class="col-6 m-auto">
                        <div>
                            <h2 class="mb-2">Selamat Datang</h2>
                            <h6 class="text-secondary mt-2 mb-4">Log in di bawah untuk akses akun anda</h6>
                        </div>
                        <form method="POST" action="{{ route('login') }}">
                            @csrf
                            <div class="mb-3">
                                <label for="email" class="form-label">
                                    {{ __('Email')}}
                                </label>
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" placeholder="Masukkan alamat email" autofocus>

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <label for="password" class="form-label">{{ __('Password') }}</label>
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password"
                                    required placeholder="Masukan password" autocomplete="current-password">
                                
                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>

                            <div class="mb-3">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : ''
                                        }}>
                                
                                    <label class="form-check-label" for="remember">
                                        {{ __('Ingat saya') }}
                                    </label>
                                </div>
                            </div>

                            <input type="submit" value="Masuk" class="btn rounded-pill text-bg-primary col-12 ">
                        </form>
                    </div>
                </div>
                <div class="h-10 p-3 d-flex align-items-end justify-content-center">
                    <p class="text-body-secondary m-0">
                        ©2023 Koperasi KDH PENS. All rights reserved.
                    </p>
                </div>
            </div>
        </div>
    </section>

    {{-- Bootstrap --}}
    <script src="{{ asset('assets/bootstrap/js/bootstrap.min.js') }}"></script>
</body>

</html>