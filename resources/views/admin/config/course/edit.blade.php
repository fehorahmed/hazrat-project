@extends('admin.app')
@section('title')
    {{ isset($pageTitle) ? $pageTitle : 'Course Edit' }}
@endsection
@section('content')
    @include('admin.master.flash')
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="page-title-box">
                    <div class="page-title-right">
                        <ol class="breadcrumb m-0">
                            <li class="breadcrumb-item"><a href="javascript: void(0);">Course</a></li>
                            <li class="breadcrumb-item"><a href="javascript: void(0);">Edit</a></li>
                        </ol>
                    </div>
                    <h4 class="page-title">Course Edit</h4>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12 m-auto">
                <div class="card">
                    <div class="card-header bg-secondary">
                        <h4 class="text-white">Course Edit</h4>
                    </div>
                    <div class="card-body">
                        <form id="campaign-form" class="form-horizontal" method="post"
                            action="{{ route('admin.config.course.update', $data->id) }}" enctype="multipart/form-data">
                            @csrf
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="row mb-3">
                                        <label for="name" class="col-12 col-md-3 col-form-label">Course Name</label>
                                        <div class="col-12 col-md-9">
                                            <input type="text" name="name" id="name" value="{{ old('name', $data->name) }}"
                                                class="form-control" placeholder="Enter course name here">
                                            @error('name')
                                                <div class="help-block text-danger">{{ $message }} </div>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="row mb-3">
                                        <label for="course_code" class="col-12 col-md-3 col-form-label">Course Code</label>
                                        <div class="col-12 col-md-9">
                                            <input type="text" name="course_code" id="course_code"
                                                value="{{ old('course_code', $data->course_code) }}" class="form-control"
                                                placeholder="Enter course code here">
                                            @error('course_code')
                                                <div class="help-block text-danger">{{ $message }} </div>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="row mb-3">
                                        <label for="start_date" class="col-12 col-md-3 col-form-label">Start Date</label>
                                        <div class="col-12 col-md-5">
                                            <input type="date" name="start_date" id="start_date"
                                                value="{{ old('start_date', $data->start_date) }}" class="form-control"
                                                placeholder="Enter course start date here">
                                            @error('start_date')
                                                <div class="help-block text-danger">{{ $message }} </div>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="row mb-3">
                                        <label for="end_date" class="col-12 col-md-3 col-form-label">End Date</label>
                                        <div class="col-12 col-md-5">
                                            <input type="date" name="end_date" id="end_date"
                                                value="{{ old('end_date', $data->end_date) }}" class="form-control"
                                                placeholder="Enter course end date here">
                                            @error('end_date')
                                                <div class="help-block text-danger">{{ $message }} </div>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">

                                    <div class="row mb-3">
                                        <label for="course_fee" class="col-12 col-md-3 col-form-label">Course Fee</label>
                                        <div class="col-12 col-md-9">
                                            <input type="number" name="course_fee" id="course_fee"
                                                value="{{ old('course_fee', $data->course_fee) }}" class="form-control"
                                                placeholder="Enter course fee">
                                            @error('course_fee')
                                                <div class="help-block text-danger">{{ $message }} </div>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="row mb-3">
                                        <label for="first_installment" class="col-12 col-md-3 col-form-label">First Installment</label>
                                        <div class="col-12 col-md-9">
                                            <input type="number" name="first_installment" id="first_installment"
                                                value="{{ old('first_installment', $data->first_installment) }}" class="form-control"
                                                placeholder="Enter First Installment">
                                            @error('first_installment')
                                                <div class="help-block text-danger">{{ $message }} </div>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="row mb-3">
                                        <label for="example-select" class="col-12 col-md-3 col-form-label">Course Type</label>
                                        <div class="col-12 col-md-9">
                                            <input type="radio" name="course_type" id="course_type1"
                                                {{ old('course_type', $data->course_type) == '1' ? 'checked' : '' }} value="1"> <label for="course_type1">General Course</label>
                                            <input type="radio" name="course_type" id="course_type2"
                                                {{ old('course_type', $data->course_type) == '2' ? 'checked' : '' }} value="2"> <label for="course_type2">Development Course</label>
                                            @error('course_type')
                                                <div class="help-block text-danger">{{ $message }} </div>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="row mb-3">
                                        <label for="example-select" class="col-12 col-md-3 col-form-label">Status</label>
                                        <div class="col-12 col-md-9">
                                            <input type="radio" name="status" id="status1"
                                                {{ old('status', $data->status) == '1' ? 'checked' : '' }} value="1"> <label for="status1">Active</label>
                                            <input type="radio" name="status" id="status2"
                                                {{ old('status', $data->status) == '0' ? 'checked' : '' }} value="0"> <label for="status2">Inactive</label>
                                            @error('status')
                                                <div class="help-block text-danger">{{ $message }} </div>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="row mb-3">
                                        <label for="name" class="form-label">Content Here</label>
                                        <div class="col-12 col-md-12">
                                            {{-- <input type="text" name="text" id="text" value="{{ old('text') }}"
                                                class="form-control" placeholder="Enter text here"> --}}
                                            <textarea name="text" id="summernote" cols="30" rows="10" class="">{{ old('text', $data->text) }}</textarea>
                                            @error('text')
                                                <div class="help-block text-danger">{{ $message }} </div>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="text-center mb-3">
                                        <a href="{{ route('admin.config.course.index') }}" class="btn btn-danger">Back</a>
                                        <input type="submit" class="btn btn-primary  " value="Update Application">
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
