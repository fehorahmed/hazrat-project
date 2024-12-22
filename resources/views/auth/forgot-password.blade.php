{{-- <x-guest-layout>
    <x-jet-authentication-card>
        <x-slot name="logo">
            <x-jet-authentication-card-logo />
        </x-slot>

        <div class="mb-4 text-sm text-gray-600">
            {{ __('Forgot your password? No problem. Just let us know your email address and we will email you a password reset link that will allow you to choose a new one.') }}
        </div>

        @if (session('status'))
            <div class="mb-4 font-medium text-sm text-green-600">
                {{ session('status') }}
            </div>
        @endif

        <x-jet-validation-errors class="mb-4" />

        <form method="POST" action="{{ route('password.email') }}">
            @csrf

            <div class="block">
                <x-jet-label for="email" value="{{ __('Email') }}" />
                <x-jet-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required autofocus />
            </div>

            <div class="flex items-center justify-end mt-4">
                <x-jet-button>
                    {{ __('Email Password Reset Link') }}
                </x-jet-button>
            </div>
        </form>
    </x-jet-authentication-card>
</x-guest-layout> --}}


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
                            <h4 class="text-white">Forgot Password</h4>
                            {{--                        <a href="index.html"> --}}
                            {{--                            <span><img src="assets/images/logo.png" alt="" height="18"></span> --}}
                            {{--                        </a> --}}
                        </div>

                        <div class="card-body p-4">

                            <div class="text-center  m-auto">

                                <p class="text-muted mb-2">Forgot your password? No problem. Just let us know your email
                                    address and we will email you a password reset link that will allow you to choose a
                                    new one.
                                </p>
                                <x-jet-validation-errors class="mb-2" />
                                @if (session('status'))
                                    <div class="mb-2 alert alert-info">
                                        {{ session('status') }}
                                    </div>
                                @endif
                            </div>

                            <form method="POST" action="{{ route('password.email') }}">
                                @csrf
                                <div class="mb-3">
                                    <label for="emailaddress" class="form-label">Email address</label>
                                    <input class="form-control" type="email" name="email" id="email"
                                        required="" placeholder="Enter your email">
                                </div>

                                <div class="mb-3 mb-0 text-center">
                                    <button class="btn btn-primary" type="submit"> Email Password Reset Link </button>
                                </div>
                                <a class="underline text-sm text-gray-600 hover:text-gray-900"
                                    href="{{ route('login') }}">
                                    {{ __('Back to login') }}
                                </a>


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
