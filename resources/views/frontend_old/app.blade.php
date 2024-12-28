<!DOCTYPE html>
<html lang="en">


<!-- Mirrored from coderthemes.com/hyper/saas/landing.html by HTTrack Website Copier/3.x [XR&CO'2014], Tue, 16 Aug 2022 04:14:41 GMT -->

<head>
    <meta charset="utf-8" />
    <title>Sheikh Hasina National Institute of Youth Development ( শেখ হাসিনা জাতীয় যুব উন্নয়ন ইনস্টিটিউট )</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta content="A fully featured admin theme which can be used to build CRM, CMS, etc." name="description" />
    <meta content="Coderthemes" name="author" />
    <!-- App favicon -->
    <link rel="shortcut icon" href="{{ asset('/') }}assets/images/favicon.ico">

    <!-- App css -->
    <link href="{{ asset('/') }}assets/css/icons.min.css" rel="stylesheet" type="text/css" />
    <link href="{{ asset('/') }}assets/css/app.min.css" rel="stylesheet" type="text/css" id="app-style" />

    @stack('style')

</head>

<body class="loading" data-layout-config='{"darkMode":false}'>

    <!-- NAVBAR START -->
    @include('frontend.master.nav')
    <!-- NAVBAR END -->
    @yield('content')
    {{-- @include('frontend.landing') --}}
    <!-- END CONTACT -->

    <!-- START FOOTER -->
    @include('frontend.master.footer')
    <!-- END FOOTER -->

    <!-- bundle -->
    <script src="{{ asset('/') }}assets/js/vendor.min.js"></script>
    <script src="{{ asset('/') }}assets/js/app.min.js"></script>
    <script src="{{ asset('assets/js/sweetalert2.min.js') }}"></script>

    <script>
        @if (session()->has('success'))
            $.toast({
                heading: 'Success',
                text: '{{ session()->get('success') }}',
                showHideTransition: 'slide',
                position: 'bottom-right',
                icon: 'success',
                hideAfter: 5000
            })
        @endif



        @if (session()->has('error'))
            $.toast({
                heading: 'Error',
                text: '{{ session()->get('error') }}',
                showHideTransition: 'slide',
                position: 'bottom-right',
                icon: 'error',
                hideAfter: 5000
            })
        @endif

        @if (@$errors->any())
            @foreach ($errors->all() as $error)
                $.toast({
                    heading: 'Error',
                    text: '{{ $error }}',
                    showHideTransition: 'slide',
                    position: 'bottom-right',
                    icon: 'error',
                    hideAfter: 5000
                })
                {{-- toastr.error("{{ $error }}"); --}}
            @endforeach
        @endif
    </script>
    @stack('scripts')
</body>


<!-- Mirrored from coderthemes.com/hyper/saas/landing.html by HTTrack Website Copier/3.x [XR&CO'2014], Tue, 16 Aug 2022 04:14:44 GMT -->

</html>
