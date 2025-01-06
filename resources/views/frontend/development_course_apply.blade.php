@extends('frontend.app_without_slider')

@section('content')
    <!-- Start Why choose -->
    <section class="appointment">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="section-title mb-2">
                        <h2>{{ $data->name }}</h2>
                        <img src="{{ asset('front-assets') }}/img/section-img.png" alt="#">
                        {{-- <p>Lorem ipsum dolor sit amet consectetur adipiscing elit praesent aliquet. pretiumts</p> --}}
                    </div>
                </div>
            </div>
            <form class="form" action="{{ route('trainee.development-course.store', $data->slug) }}" method="POST"
                enctype="multipart/form-data">
                <div class="row">
                    <div class="col-lg-6 col-md-12 col-12">
                        @csrf
                        <div class="form-group">
                            <label for="">Name (English)</label>
                            <input name="name" type="text" value="{{ $user->name }}" placeholder="Name" readonly>
                            @error('name')
                                <p class="text-danger">{{ $message }}</p>
                            @enderror

                        </div>
                        <div class="form-group">
                            <label for="">Email</label>
                            <input name="email" type="text" value="{{ $user->email }}" readonly placeholder="Email">
                            @error('email')
                                <p class="text-danger">{{ $message }}</p>
                            @enderror
                        </div>


                        <div class="form-group">
                            <label for="">Father Name (English)</label>
                            <input name="father_name" type="text" value="{{ $user->father_name }}" readonly
                                placeholder="Father Name">
                            @error('father_name')
                                <p class="text-danger">{{ $message }}</p>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="">Mother Name (English)</label>
                            <input name="mother_name" type="text" value="{{ $user->mother_name }}" readonly
                                placeholder="Mother Name">
                            @error('mother_name')
                                <p class="text-danger">{{ $message }}</p>
                            @enderror
                        </div>
                    </div>
                    <div class="col-lg-6 col-md-12 col-12">

                        <div class="form-group">
                            <label for="">Name (Bangla)</label>
                            <input name="bn_name" type="text" readonly placeholder="Name" value="{{ $user->bn_name }}">
                            @error('bn_name')
                                <p class="text-danger">{{ $message }}</p>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="">Father Name (Bangla)</label>
                            <input name="bn_father_name" type="text" placeholder="Father Name" readonly
                                value="{{ $user->bn_father_name }}">
                            @error('bn_father_name')
                                <p class="text-danger">{{ $message }}</p>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="">Mother Name (Bangla)</label>
                            <input name="bn_mother_name" type="text" placeholder="Mother Name" readonly
                                value="{{ $user->bn_mother_name }}">
                            @error('bn_mother_name')
                                <p class="text-danger">{{ $message }}</p>
                            @enderror
                        </div>

                    </div>

                    <div class="col-lg-12 col-md-12 ">
                        <div class="row">
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label for="">Select Versity</label>
                                    <select class="nice-select form-control wide" name="versity" id="versity">
                                        <option value="">Select Versity</option>
                                        @foreach ($versities as $versity)
                                            <option {{ old('versity') == $versity->id ? 'selected' : '' }}
                                                value="{{ $versity->id }}">{{ $versity->name }}</option>
                                        @endforeach

                                    </select>
                                    @error('versity')
                                        <p class="text-danger">{{ $message }}</p>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label for="">Select Session</label>
                                    <select class="nice-select form-control wide" name="session" id="session">
                                        <option value="">Select Session</option>
                                        @foreach (getAllSessions() as $item)
                                            <option {{ old('session') == $item ? 'selected' : '' }}
                                                value="{{ $item }}">{{ $item }}</option>
                                        @endforeach
                                    </select>
                                    @error('session')
                                        <p class="text-danger">{{ $message }}</p>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label for="">Select Department</label>
                                    <select class="nice-select form-control wide" name="department" id="department">
                                        <option value="">Select Department</option>
                                    </select>
                                    @error('department')
                                        <p class="text-danger">{{ $message }}</p>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label for="">Select Semester</label>
                                    <select class="nice-select form-control wide" name="semester" id="semester">
                                        <option value="">Select Semester</option>
                                        @foreach (getAllSemesters() as $key => $item)
                                            <option {{ old('semester') == $key ? 'selected' : '' }}
                                                value="{{ $key }}">{{ $item }}</option>
                                        @endforeach
                                    </select>
                                    @error('semester')
                                        <p class="text-danger">{{ $message }}</p>
                                    @enderror
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-12 col-md-12 ">
                        <div class="form-group">
                            <div class="button">
                                <button type="submit" class="btn">Submit Application</button>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
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

@push('script')
    <script>
        $(function() {
            var oldDepartment = "{{ old('department') }}";
            $('#versity').change(function() {
                var versity = $(this).val();
                // console.log(versity);
                $('#department').html(`<option value="">Select Department</option>`);
                $.ajax({
                    url: "{{ route('get.department.by.versity') }}", // Laravel route
                    type: "GET", // Request method
                    data: {
                        versity_id: versity // CSRF token
                    },
                    success: function(response) {
                        // Handle success
                        $.each(response.datas, function(key, value) {
                            if (oldDepartment == value.id) {
                                $('#department').append(
                                    `<option selected value="${value.id}">${value.name}</option>`
                                );
                            } else {
                                $('#department').append(
                                    `<option value="${value.id}">${value.name}</option>`
                                );
                            }
                        });
                    },
                    error: function(xhr, status, error) {
                        // Handle error
                        console.error(error);
                    }
                });
            })
            $('#versity').trigger('change')
        })
    </script>
@endpush
