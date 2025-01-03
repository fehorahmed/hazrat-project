@extends('frontend.app_without_slider')
@section('content')
    <!-- Start Appointment -->
    <section class="appointment" style="padding-top: 30px;">
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
            <form class="form" action="{{ route('trainee.register.post') }}" method="POST" enctype="multipart/form-data">
                <div class="row">
                    <div class="col-lg-6 col-md-12 col-12">
                        @csrf
                        <div class="form-group">
                            <label for="">Name (English)</label>
                            <input name="name" type="text" value="{{ old('name') }}" placeholder="Name">
                            @error('name')
                                <p class="text-danger">{{ $message }}</p>
                            @enderror

                        </div>
                        <div class="form-group">
                            <label for="">Email</label>
                            <input name="email" type="text" value="{{ old('email') }}" placeholder="Email">
                            @error('email')
                                <p class="text-danger">{{ $message }}</p>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="">Password</label>
                            <input name="password" type="password" placeholder="Password">
                            @error('password')
                                <p class="text-danger">{{ $message }}</p>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="">Confirm Password</label>
                            <input name="password_confirmation" type="password" placeholder="Confirm Password">
                            @error('password_confirmation')
                                <p class="text-danger">{{ $message }}</p>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="">NID</label>
                            <input name="nid" type="text" value="{{ old('nid') }}" placeholder="NID">
                            @error('nid')
                                <p class="text-danger">{{ $message }}</p>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="">Phone</label>
                            <input name="phone" type="text" value="{{ old('phone') }}" placeholder="Phone">
                            @error('phone')
                                <p class="text-danger">{{ $message }}</p>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="">Father Name (English)</label>
                            <input name="father_name" type="text" value="{{ old('father_name') }}"
                                placeholder="Father Name">
                            @error('father_name')
                                <p class="text-danger">{{ $message }}</p>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="">Mother Name (English)</label>
                            <input name="mother_name" type="text" value="{{ old('mother_name') }}"
                                placeholder="Mother Name">
                            @error('mother_name')
                                <p class="text-danger">{{ $message }}</p>
                            @enderror
                        </div>
                    </div>
                    <div class="col-lg-6 col-md-12 col-12">

                        <div class="form-group">
                            <label for="">Name (Bangla)</label>
                            <input name="bn_name" type="text" placeholder="Name" value="{{ old('bn_name') }}">
                            @error('bn_name')
                                <p class="text-danger">{{ $message }}</p>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="">Father Name (Bangla)</label>
                            <input name="bn_father_name" type="text" placeholder="Father Name"
                                value="{{ old('bn_father_name') }}">
                            @error('bn_father_name')
                                <p class="text-danger">{{ $message }}</p>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="">Mother Name (Bangla)</label>
                            <input name="bn_mother_name" type="text" placeholder="Mother Name"
                                value="{{ old('bn_mother_name') }}">
                            @error('bn_mother_name')
                                <p class="text-danger">{{ $message }}</p>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="">Picture (300*300)</label>
                            <input name="photo" type="file" placeholder="Your Photo">
                            @error('photo')
                                <p class="text-danger">{{ $message }}</p>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="">Signature (300*80)</label>
                            <input name="signature" type="file" placeholder="Your Signature">
                            @error('signature')
                                <p class="text-danger">{{ $message }}</p>
                            @enderror
                        </div>
                    </div>

                    {{-- <div class="col-lg-12 col-md-12 ">
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
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label for="">Select Department</label>
                                    <select class="nice-select form-control wide" name="department" id="department">
                                        <option value="">Select Department</option>
                                    </select>
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
                                </div>
                            </div>
                        </div>
                    </div> --}}
                    <div class="col-lg-12 col-md-12 ">
                        <div class="form-group">
                            <div class="button">
                                <button type="submit" class="btn">Registration</button>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </section>
    <!-- End Appointment -->
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
