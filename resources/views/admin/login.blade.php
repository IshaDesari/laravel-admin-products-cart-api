<!doctype html>
<html class="no-js" lang="en" dir="ltr">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=Edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <title>@yield('title', env('APP_NAME'))</title>
    <meta name="csrf-token" id="csrf-token" content="{{ csrf_token() }}">

    <!-- project css file  -->
    <link rel="stylesheet" href="{{ asset('dist/css/vt_style.css') }}">
</head>

<body>

    <div id="mytask-layout" class="theme-navy">
        <!-- main body area -->
        <div class="main p-2 py-3 p-xl-5 ">
            <div class="body d-flex p-0 p-xl-5">
                <div class="container-xxl">

                    <div class="row g-0">
                        <div
                            class="col-lg-12 d-flex justify-content-center align-items-center border-0 rounded-lg auth-h100 mt-3">
                            <div class="w-100 p-3 p-md-5 card border-0 bg-dark text-light" style="max-width: 32rem;">

                                @include('admin.messages')

                                <!-- Form -->
                                <form class="row g-1 p-3 p-md-4" method="POST"class="form-horizontal"
                                    action="{{ route('admin.login.validate') }}" autocomplete="off">
                                    @csrf

                                    <div class="col-12 text-center mb-1 mb-lg-5">
                                        <h1>Sign in</h1>
                                        <span>Login to access your dashboard.</span>
                                    </div>

                                    <div class="col-12">
                                        <div class="mb-2">
                                            <label for="email" class="form-label">
                                                Email address
                                            </label>
                                            <input type="text"
                                                class="form-control @error('email') is-invalid @enderror"
                                                name="email" value="" required autofocus
                                                placeholder="Email address"
                                                autocomplete="off"
                                                style="width: 98.5%; min-height: calc(1.5em + 1rem );">
                                            @error('email')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-12">
                                        <div class="mb-2">
                                            <div class="form-label">
                                                <label class="form-label">Password</label>
                                                <input id="password" type="password" name="password"
                                                    class="form-control= form-control-lg @error('password') is-invalid @enderror"
                                                    placeholder="**********" required autocomplete="current-password"
                                                    style="border: 0px solid #f0f0f0; border-collapse: collapse; width: 98.5%; min-height: calc(1.5em + 1rem ); border-radius: 5px; padding: 0 10px; font-size: 16px">
                                                <i class="bi= bi-eye-slash= icofont-eye-blocked" id="togglePassword"
                                                    style="margin-left: -40px; cursor: pointer; color: #333; font-size: 18px"></i>
                                                @error('password')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </div>
                                        </div>
                                        <div align="right">
                                            @if (Route::has('password.request'))
                                                <a class="text-secondary"
                                                    href="{{ route('password.request') }}">{{ __('Forgot Your Password?') }}
                                                </a>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="col-12 text-center mt-4">
                                        <input type="submit" class="btn btn-lg btn-block btn-light lift text-uppercase"
                                            atl="signin" value="SIGN IN">
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Jquery Core Js -->
    <script src="{{ asset('dist/bundles/libscripts.bundle.js') }}"></script>

    <script>
        const togglePassword = document.querySelector('#togglePassword');
        const password = document.querySelector('#password');

        togglePassword.addEventListener('click', function(e) {
            // toggle the type attribute
            const type = password.getAttribute('type') === 'password' ? 'text' : 'password';
            password.setAttribute('type', type);
            // toggle the eye slash icon
            // this.classList.toggle('bi-eye');
            this.classList.toggle('icofont-eye');
        });
    </script>

    <script type="text/javascript">
        setTimeout(function() {
            $('.alert').alert('close');
        }, 7000);
    </script>

</body>

</html>
