@extends('frontend.app_without_slider')
@section('content')
    <!-- Start Appointment -->
    <section class="appointment">
        <div class="container">

            <div class="row">
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
                    @if (session('success'))
                        <div class="mb-4 font-medium text-sm text-green-600">
                            {{ session('success') }}
                        </div>
                    @endif
                </div>
            </div>
            <div class="row">
                <div class="col-lg-6 col-md-12 col-12">
                    <form class="form" action="{{ route('trainee.login.post') }}" method="POST">

                        @csrf
                        <div class="form-group">
                            <input name="email" type="text" placeholder="Email">
                        </div>

                        <div class="form-group">
                            <input name="password" type="password" placeholder="Password">
                        </div>

                        <div class="form-group">
                            <div class="button">
                                <button type="submit" class="btn">Login</button>
                            </div>
                        </div>

                    </form>
                </div>
                <div class="col-lg-6 col-md-12 ">
                    <div class="appointment-image">
                        <img src="{{ asset('front-assets') }}/img/contact-img.png" alt="#">
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- End Appointment -->
@endsection
