@extends('frontend.app_without_slider')

@section('content')
    <!-- Start Why choose -->
    <section class="why-choose section">
        <div class="container">
            @if (session('success'))
                <div class="row">
                    <div class="col-lg-12">
                        <div class="mb-2 text-success">
                            <p class="alert alert-success">{{ session('success') }}</p>
                        </div>
                    </div>
                </div>
            @endif
            <div class="row">
                <div class="col-lg-12">
                    <div class="section-title mb-2">
                        <div>
                            <h2>{{ $data->name }}</h2>
                            <p>Course Fee : {{number_format($data->course_fee,2)}} TK</p>
                            <p>First Installment : {{number_format($data->first_installment,2)}} TK</p>
                        </div>

                        <img src="{{ asset('front-assets') }}/img/section-img.png" alt="#">
                        {{-- <p>Lorem ipsum dolor sit amet consectetur adipiscing elit praesent aliquet. pretiumts</p> --}}
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-12 col-12 my-2" style="display:grid;">
                    {!! $data->text !!}
                </div>
                <div class="col-lg-12 col-12 text-center mt-4">
                    <a href="{{ route('trainee.course.apply', $data->slug) }}"
                        class="btn btn-primary text-light">Apply On</a>
                </div>

            </div>
        </div>
    </section>
    <!--/ End Why choose -->
    <!-- Start Newsletter Area -->
    <section class="newsletter section">
        <div class="container">
            <div class="row ">
                <div class="col-lg-6  col-12">
                    <!-- Start Newsletter Form -->
                    <div class="subscribe-text ">
                        <h6>Sign up for newsletter</h6>
                        <p class="">Cu qui soleat partiendo urbanitas. Eum aperiri indoctum eu,<br> homero
                            alterum.</p>
                    </div>
                    <!-- End Newsletter Form -->
                </div>
                <div class="col-lg-6  col-12">
                    <!-- Start Newsletter Form -->
                    <div class="subscribe-form ">
                        <form action="mail/mail.php" method="get" target="_blank" class="newsletter-inner">
                            <input name="EMAIL" placeholder="Your email address" class="common-input"
                                onfocus="this.placeholder = ''" onblur="this.placeholder = 'Your email address'"
                                required="" type="email">
                            <button class="btn">Subscribe</button>
                        </form>
                    </div>
                    <!-- End Newsletter Form -->
                </div>
            </div>
        </div>
    </section>
    <!-- /End Newsletter Area -->
@endsection
