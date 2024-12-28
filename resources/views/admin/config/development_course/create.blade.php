@extends('admin.app')

@section('title')
    {{ isset($pageTitle) ? $pageTitle : 'Development Course Create' }}
@endsection
@push('styles')
@endpush
@section('content')
    @include('admin.master.flash')
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="page-title-box">
                    <div class="page-title-right">
                        <ol class="breadcrumb m-0">
                            <li class="breadcrumb-item"><a href="javascript: void(0);">Development Course</a></li>
                            <li class="breadcrumb-item"><a href="javascript: void(0);">Create</a></li>
                        </ol>
                    </div>
                    <h4 class="page-title">Development Course Create</h4>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12 m-auto">
                <div class="card">
                    <div class="card-header bg-secondary">
                        <h4 class="text-white">Development Course Create</h4>
                    </div>
                    <div class="card-body">
                        <form id="campaign-form" class="form-horizontal" method="post"
                            action="{{ route('admin.config.development-course.store') }}" enctype="multipart/form-data">
                            @csrf

                            <div class="row">
                                <div class="col-md-6">
                                    <div class="row mb-3">
                                        <label for="name" class="col-12 col-md-3 col-form-label">Course Name</label>
                                        <div class="col-12 col-md-9">
                                            <input type="text" name="name" id="name" value="{{ old('name') }}"
                                                class="form-control" placeholder="Enter course name here">
                                            @error('name')
                                                <div class="help-block text-danger">{{ $message }} </div>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="row mb-3">
                                        <label for="start_date" class="col-12 col-md-3 col-form-label">Start Date</label>
                                        <div class="col-12 col-md-5">
                                            <input type="date" name="start_date" id="start_date"
                                                value="{{ old('start_date') }}" class="form-control"
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
                                                value="{{ old('end_date') }}" class="form-control"
                                                placeholder="Enter course end date here">
                                            @error('end_date')
                                                <div class="help-block text-danger">{{ $message }} </div>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="row mb-3">
                                        <label for="course_code" class="col-12 col-md-3 col-form-label">Course Code</label>
                                        <div class="col-12 col-md-9">
                                            <input type="text" name="course_code" id="course_code"
                                                value="{{ old('course_code') }}" class="form-control"
                                                placeholder="Enter course code here">
                                            @error('course_code')
                                                <div class="help-block text-danger">{{ $message }} </div>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="row mb-3">
                                        <label for="course_code" class="col-12 col-md-3 col-form-label">Serial</label>
                                        <div class="col-12 col-md-9">
                                            <input type="number" name="serial" id="serial"
                                                value="{{ old('serial') }}" class="form-control"
                                                placeholder="Enter course code here">
                                            @error('serial')
                                                <div class="help-block text-danger">{{ $message }} </div>
                                            @enderror
                                        </div>
                                    </div>


                                    <div class="row mb-3">
                                        <label for="example-select" class="col-12 col-md-3 col-form-label">Status</label>
                                        <div class="col-12 col-md-9">
                                            <input type="radio" name="status" id="status1"
                                                {{ old('status') == '1' ? 'checked' : '' }} value="1"> <label for="status1">Active</label>
                                            <input type="radio" name="status" id="status2"
                                                {{ old('status') == '0' ? 'checked' : '' }} value="0"> <label for="status2">Inactive</label>
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
                                            <textarea name="text" id="summernote" cols="30" rows="10" class="">{{ old('text') }}</textarea>
                                            @error('text')
                                                <div class="help-block text-danger">{{ $message }} </div>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="text-center mb-3">
                                        <a href="{{ route('admin.config.development-course.index') }}" class="btn btn-danger">Back</a>
                                        <input type="submit" class="btn btn-primary  " value="Save Data">
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

@push('scripts')
    <script>
        // tinymce.init({
        //     selector: 'textarea',
        //     plugins: [
        //         // Core editing features
        //         'anchor', 'autolink', 'charmap', 'codesample', 'emoticons', 'image', 'link', 'lists', 'media',
        //         'searchreplace', 'table', 'visualblocks', 'wordcount',
        //         // Your account includes a free trial of TinyMCE premium features
        //         // Try the most popular premium features until Jan 10, 2025:
        //         'checklist', 'mediaembed', 'casechange', 'export', 'formatpainter', 'pageembed', 'a11ychecker',
        //         'tinymcespellchecker', 'permanentpen', 'powerpaste', 'advtable', 'advcode', 'editimage',
        //         'advtemplate', 'ai', 'mentions', 'tinycomments', 'tableofcontents', 'footnotes', 'mergetags',
        //         'autocorrect', 'typography', 'inlinecss', 'markdown', 'importword', 'exportword', 'exportpdf'
        //     ],
        //     toolbar: 'undo redo | blocks fontfamily fontsize | bold italic underline strikethrough | link image media table mergetags | addcomment showcomments | spellcheckdialog a11ycheck typography | align lineheight | checklist numlist bullist indent outdent | emoticons charmap | removeformat',
        //     tinycomments_mode: 'embedded',
        //     tinycomments_author: 'Author name',
        //     mergetags_list: [{
        //             value: 'First.Name',
        //             title: 'First Name'
        //         },
        //         {
        //             value: 'Email',
        //             title: 'Email'
        //         },
        //     ],
        //     ai_request: (request, respondWith) => respondWith.string(() => Promise.reject(
        //         'See docs to implement AI Assistant')),
        // });
    </script>
@endpush
