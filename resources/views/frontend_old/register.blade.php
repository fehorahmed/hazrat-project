{{-- <x-guest-layout> --}}
{{--    <x-jet-authentication-card> --}}
{{--        <x-slot name="logo"> --}}
{{--            <x-jet-authentication-card-logo /> --}}
{{--        </x-slot> --}}

{{--        <x-jet-validation-errors class="mb-4" /> --}}

{{--        @if (session('status')) --}}
{{--            <div class="mb-4 font-medium text-sm text-green-600"> --}}
{{--                {{ session('status') }} --}}
{{--            </div> --}}
{{--        @endif --}}

{{--        <form method="POST" action="{{ route('login') }}"> --}}
{{--            @csrf --}}

{{--            <div> --}}
{{--                <x-jet-label for="email" value="{{ __('Email') }}" /> --}}
{{--                <x-jet-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required autofocus /> --}}
{{--            </div> --}}

{{--            <div class="mt-4"> --}}
{{--                <x-jet-label for="password" value="{{ __('Password') }}" /> --}}
{{--                <x-jet-input id="password" class="block mt-1 w-full" type="password" name="password" required autocomplete="current-password" /> --}}
{{--            </div> --}}

{{--            <div class="block mt-4"> --}}
{{--                <label for="remember_me" class="flex items-center"> --}}
{{--                    <x-jet-checkbox id="remember_me" name="remember" /> --}}
{{--                    <span class="ml-2 text-sm text-gray-600">{{ __('Remember me') }}</span> --}}
{{--                </label> --}}
{{--            </div> --}}

{{--            <div class="flex items-center justify-end mt-4"> --}}
{{--                @if (Route::has('password.request')) --}}
{{--                    <a class="underline text-sm text-gray-600 hover:text-gray-900" href="{{ route('password.request') }}"> --}}
{{--                        {{ __('Forgot your password?') }} --}}
{{--                    </a> --}}
{{--                @endif --}}

{{--                <x-jet-button class="ml-4"> --}}
{{--                    {{ __('Log in') }} --}}
{{--                </x-jet-button> --}}
{{--            </div> --}}
{{--        </form> --}}
{{--    </x-jet-authentication-card> --}}
{{-- </x-guest-layout> --}}


<!DOCTYPE html>
<html lang="en">

<!-- Mirrored from coderthemes.com/hyper/saas/pages-login.html by HTTrack Website Copier/3.x [XR&CO'2014], Tue, 16 Aug 2022 04:14:40 GMT -->

<head>
    <meta charset="utf-8" />
    <title>Sheikh Hasina National Institute of Youth Development ( শেখ হাসিনা জাতীয় যুব উন্নয়ন ইনস্টিটিউট )</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta content="A fully featured admin theme which can be used to build CRM, CMS, etc." name="description" />
    <meta content="Coderthemes" name="author" />
    <!-- App favicon -->
    <link rel="shortcut icon" href="assets/images/favicon.ico">

    <!-- App css -->
    <link href="{{ asset('/') }}assets/css/icons.min.css" rel="stylesheet" type="text/css" />
    <link href="{{ asset('/') }}assets/css/app.min.css" rel="stylesheet" type="text/css" id="app-style" />

</head>

<body class="loading authentication-bg" data-layout-config='{"darkMode":false}'>
    <div class="account-pages pt-2 pt-sm-5 pb-4 pb-sm-5">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-xxl-4 col-lg-5">
                    <div class="card">
                        <!-- Logo -->
                        <div class="card-header pt-3 pb-3 text-center bg-primary">
                            <h4 class="text-white">Trainee Registration</h4>
                            {{--                        <a href="index.html"> --}}
                            {{--                            <span><img src="assets/images/logo.png" alt="" height="18"></span> --}}
                            {{--                        </a> --}}
                        </div>

                        <div class="card-body p-4">

                            <div class="text-center w-75 m-auto">
                                @if (session()->has('error'))
                                    <p class="text-danger mb-4">{{ session('error') }}</p>
                                @endif
                                <x-jet-validation-errors class="mb-4" />
                                @if (session('status'))
                                    <div class="mb-4 font-medium text-sm text-green-600">
                                        {{ session('status') }}
                                    </div>
                                @endif
                            </div>

                            <form method="POST" action="{{ route('trainee.register.post') }}">
                                @csrf
                                <div class="mb-1">
                                    <label for="name" class="form-label">Name</label>
                                    <input class="form-control" type="text" name="name" id="name"
                                        required="" value="{{ old('name') }}" placeholder="Enter your name">
                                </div>
                                <div class="mb-1">
                                    <label for="emailaddress" class="form-label">Email address</label>
                                    <input class="form-control" type="email" name="email"
                                        value="{{ old('email') }}" id="email" required=""
                                        placeholder="Enter your email">
                                </div>
                                <div class="mb-1">
                                    <label for="phone" class="form-label">Mobile Number</label>
                                    <input class="form-control" type="number" name="phone"
                                        value="{{ old('phone') }}" id="phone" required=""
                                        placeholder="Enter your phone number">
                                </div>

                                <div class="mb-1">
                                    {{--                                <a href="pages-recoverpw.html" class="text-muted float-end"><small>Forgot your password?</small></a> --}}
                                    <label for="password" class="form-label">Password</label>
                                    <div class="input-group input-group-merge">
                                        <input type="password" id="password" name="password" class="form-control"
                                            placeholder="Enter your password">
                                        <div class="input-group-text" data-password="false">
                                            <span class="password-eye"></span>
                                        </div>
                                    </div>
                                </div>
                                <div class="mb-2">
                                    {{--                                <a href="pages-recoverpw.html" class="text-muted float-end"><small>Forgot your password?</small></a> --}}
                                    <label for="password_confirmation" class="form-label">Confirm Password</label>
                                    <div class="input-group input-group-merge">
                                        <input type="password" id="password_confirmation" name="password_confirmation"
                                            class="form-control" placeholder="Enter your password again">
                                        <div class="input-group-text" data-password="false">
                                            <span class="password-eye"></span>
                                        </div>
                                    </div>
                                </div>

                                {{--                            <div class="mb-3 mb-3"> --}}
                                {{--                                <div class="form-check"> --}}
                                {{--                                    <input type="checkbox" class="form-check-input" name="remember" id="checkbox-signin" checked> --}}
                                {{--                                    <label class="form-check-label" for="checkbox-signin">Remember me</label> --}}
                                {{--                                </div> --}}
                                {{--                            </div> --}}

                                <div class="mb-1  text-center">
                                    <button class="btn btn-primary" type="submit"> Register </button>
                                </div>

                                @if (session()->has('success'))
                                    <div class="mb-1 mb-0 text-center">
                                        <h3>{{ session('success') }}</h3>
                                    </div>
                                @endif


                            </form>
                        </div> <!-- end card-body -->
                    </div>
                    <!-- end card -->

                    {{--                <div class="row mt-3"> --}}
                    {{--                    <div class="col-12 text-center"> --}}
                    {{--                        <p class="text-muted">Don't have an account? <a href="pages-register.html" class="text-muted ms-1"><b>Sign Up</b></a></p> --}}
                    {{--                    </div> <!-- end col --> --}}
                    {{--                </div> --}}
                    <!-- end row -->

                </div> <!-- end col -->
            </div>
            <!-- end row -->
        </div>
        <!-- end container -->
    </div>
    <!-- end page -->

    <footer class="footer footer-alt">

        2017 -
        <script>
            document.write(new Date().getFullYear())
        </script> © Designed and Developed by Freelancer Information Technology; Mobile: 01872788592 /
        01729724232
    </footer>

    <!-- bundle -->
    <script src="{{ asset('/') }}assets/js/vendor.min.js"></script>
    <script src="{{ asset('/') }}assets/js/app.min.js"></script>

</body>

<!-- Mirrored from coderthemes.com/hyper/saas/pages-login.html by HTTrack Website Copier/3.x [XR&CO'2014], Tue, 16 Aug 2022 04:14:40 GMT -->

</html>
