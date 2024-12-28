@extends('frontend.app')

@section('content')
    <section class="py-5">
        <div class="container">
            {{-- <div class="row py-4">
                <div class="col-lg-12">
                    <h3 class="text-center">Give Your Feedback Here</h3>
                </div>
            </div> --}}

            <form action="{{ route('trainee.feedback.store') }}" method="POST" enctype="multipart/form-data">
                @csrf

                <div class="card">
                    <div class="card-header bg-info text-light">
                        <h4 class="card-title">Your Feedback</h4>
                    </div>
                    <div class="card-body">

                        <div class="row">
                            <div class="col-md-6">

                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="mb-3">
                                            <label class="form-label">Company Name</label>
                                            <input type="text" class="form-control" id="company_name"
                                                value="{{ old('company_name', $feedback->company_name ?? '') }}"
                                                name="company_name" placeholder="Company Name">
                                            @error('company_name')
                                                <div class="text-danger">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="mb-3">
                                            <label class="form-label">Company Address</label>
                                            <input type="text" class="form-control" id="company_address"
                                                value="{{ old('company_address', $feedback->company_address ?? '') }}"
                                                name="company_address" placeholder="Company Address">
                                            @error('company_address')
                                                <div class="text-danger">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="mb-3">
                                            <label class="form-label">Designation</label>
                                            <input type="text" class="form-control" id="designation"
                                                value="{{ old('designation', $feedback->designation ?? '') }}"
                                                name="designation" placeholder="designation">
                                            @error('designation')
                                                <div class="text-danger">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>

                                </div>


                            </div>
                            <div class="col-md-6">
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="mb-3">
                                            <label class="form-label">Joining Date</label>
                                            <input type="date" class="form-control" id="joining_date"
                                                value="{{ old('joining_date', $feedback->joining_date ?? '') }}"
                                                name="joining_date" placeholder="Joining date">
                                            @error('joining_date')
                                                <div class="text-danger">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="mb-3">
                                            <label class="form-label">Description</label>
                                            <textarea name="description" class="form-control" id="" cols="25" rows="5">{{ old('description', $feedback->description ?? '') }}</textarea>
                                            @error('description')
                                                <div class="text-danger">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>



                        <div class="row">
                            <div class="col-md-12 text-center">
                                <button type="submit" id="submit_btn" class="btn btn-primary">Submit
                                    Feedback</button>

                            </div>
                        </div>
                    </div>
                </div>
            </form>

        </div>
    </section>
@endsection
