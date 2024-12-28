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
            <form class="form" action="{{ route('trainee.register.post') }}" method="POST">
                <div class="row">
                    <div class="col-lg-6 col-md-12 col-12">
                        @csrf
                        <div class="form-group">
                            <label for="">Name (English)</label>
                            <input name="name" type="text" placeholder="Name">
                        </div>
                        <div class="form-group">
                            <label for="">Email</label>
                            <input name="email" type="text" placeholder="Email">
                        </div>
                        <div class="form-group">
                            <label for="">Password</label>
                            <input name="password" type="password" placeholder="Password">
                        </div>
                        <div class="form-group">
                            <label for="">Confirm Password</label>
                            <input name="password_confirmed" type="password" placeholder="Confirm Password">
                        </div>
                        <div class="form-group">
                            <label for="">NID</label>
                            <input name="nid" type="text" placeholder="NID">
                        </div>
                        <div class="form-group">
                            <label for="">Phone</label>
                            <input name="phone" type="text" placeholder="Phone">
                        </div>
                        <div class="form-group">
                            <label for="">Father Name (English)</label>
                            <input name="father_name" type="text" placeholder="Father Name">
                        </div>
                        <div class="form-group">
                            <label for="">Mother Name (English)</label>
                            <input name="mother_name" type="text" placeholder="Mother Name">
                        </div>
                    </div>
                    <div class="col-lg-6 col-md-12 col-12">

                        <div class="form-group">
                            <label for="">Name (Bangla)</label>
                            <input name="bn_name" type="text" placeholder="Name">
                        </div>

                        <div class="form-group">
                            <label for="">Father Name (Bangla)</label>
                            <input name="bn_father_name" type="text" placeholder="Father Name">
                        </div>
                        <div class="form-group">
                            <label for="">Mother Name (Bangla)</label>
                            <input name="bn_mother_name" type="text" placeholder="Mother Name">
                        </div>
                        <div class="form-group">
                            <label for="">Picture (300*300)</label>
                            <input name="photo" type="file" placeholder="Your Photo">
                        </div>
                        <div class="form-group">
                            <label for="">Signature (300*80)</label>
                            <input name="signature" type="file" placeholder="Your Signature">
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
                                            <option value="{{ $versity->id }}">{{ $versity->name }}</option>
                                        @endforeach

                                    </select>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label for="">Select Session</label>
                                    <select class="nice-select form-control wide" name="department" id="department">
                                        <option value="">Select Session</option>
                                        <option value="1st">1st Semester</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label for="">Select Department</label>
                                    <select class="nice-select form-control wide" name="department" id="department">
                                        <option value="">Select Department</option>
                                        <option value="1st">1st Semester</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label for="">Select Semester</label>
                                    <select class="nice-select form-control wide" name="semester" id="semester">
                                        <option value="">Select Semester</option>
                                        <option value="1st">1st Semester</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                    </div>
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
