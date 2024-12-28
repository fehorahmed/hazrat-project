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
                    <h2>This is Your dashboard</h2>
                </div>
            </div>

        </div>
    </section>
    <!-- End Appointment -->
@endsection

@push('script')
@endpush
