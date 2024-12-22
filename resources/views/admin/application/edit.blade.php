@extends('admin.app')
@section('title')
    {{ isset($pageTitle) ? $pageTitle : 'Application Update' }}
@endsection
@section('content')
    @include('admin.master.flash')
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="page-title-box">
                    <div class="page-title-right">
                        <ol class="breadcrumb m-0">
                            <li class="breadcrumb-item"><a href="javascript: void(0);">Application</a></li>
                            <li class="breadcrumb-item"><a href="javascript: void(0);">Update</a></li>
                        </ol>
                    </div>
                    <h4 class="page-title">Application Update</h4>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12 m-auto">
                <div class="card">
                    <div class="card-header bg-secondary">
                        <h4 class="text-white">Application Update</h4>
                    </div>
                    <div class="card-body">
                        <form action="{{ route('admin.application.update', $data->id) }}" method="POST">
                            @csrf
                            <div class="row">
                                <div class="col-lg-3 col-md-3">
                                    <div class="mb-3">
                                        <label class="form-label">কোর্সের নাম</label>
                                        <select class="form-control select2" data-toggle="select2" name="course"
                                            id="course">
                                            <option value="">Select</option>
                                            @foreach ($courses as $course)
                                                <option
                                                    {{ old('course', $data->course_id) == $course->id ? 'selected' : '' }}
                                                    value="{{ $course->id }}">{{ $course->name }}</option>
                                            @endforeach
                                        </select>
                                        @error('course')
                                            <div class="text-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-lg-3 col-md-3">
                                    <div class="mb-3">
                                        <label class="form-label">নাম</label>
                                        <input type="text" class="form-control" data-provide="typeahead" id="name"
                                            value="{{ old('name', $data->name) }}" name="name" placeholder="Name">
                                        @error('name')
                                            <div class="text-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-lg-3 col-md-3">
                                    <div class="mb-3">
                                        <label class="form-label">পিতার নাম</label>
                                        <input type="text" class="form-control" data-provide="typeahead"
                                            value="{{ old('father_name', $data->father_name) }}" name="father_name"
                                            id="father_name" placeholder="Father name">
                                        @error('father_name')
                                            <div class="text-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-lg-3 col-md-3">
                                    <div class="mb-3">
                                        <label class="form-label">মাতার নাম</label>
                                        <input type="text" class="form-control" data-provide="typeahead"
                                            value="{{ old('mother_name', $data->mother_name) }}" name="mother_name"
                                            id="mother_name" placeholder="Mother name">
                                        @error('mother_name')
                                            <div class="text-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-lg-3 col-md-3">
                                    <div class="mb-3">
                                        <label class="form-label">জাতীয় পরিচয় পত্রের নাম্বার</label>
                                        <input type="number" class="form-control" data-provide="typeahead" name="nid"
                                            value="{{ old('nid', $data->nid) }}" id="nid"
                                            placeholder="National card no">
                                        @error('nid')
                                            <div class="text-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-lg-3 col-md-3">
                                    <div class="mb-3">
                                        <label class="form-label">জন্ম তারিখ</label>
                                        <input type="date" class="form-control" data-provide="typeahead"
                                            value="{{ old('date_of_birth', $data->date_of_birth) }}" name="date_of_birth"
                                            id="date_of_birth" placeholder="Date of Birth">
                                        @error('date_of_birth')
                                            <div class="text-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-lg-3 col-md-3">
                                    <div class="mb-3">
                                        <label class="form-label">মোবাইল নাম্বার</label>
                                        <input type="number" class="form-control" data-provide="typeahead" name="mobile"
                                            value="{{ old('mobile', $data->mobile) }}" id="mobile"
                                            placeholder="Mobile no">
                                        @error('mobile')
                                            <div class="text-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>

                                <div class="col-lg-3 col-md-3">
                                    <div class="mb-3">
                                        <label class="form-label">আপনার রক্তের গ্রæপ</label>
                                        <select class="form-select" name="blood_group" id="blood_group">
                                            <option value="">Select Blood Group</option>
                                            <option {{ old('blood_group', $data->blood_group) == 'A+' ? 'selected' : '' }}
                                                value="A+">A+</option>
                                            <option {{ old('blood_group', $data->blood_group) == 'A-' ? 'selected' : '' }}
                                                value="A-">A-</option>
                                            <option {{ old('blood_group', $data->blood_group) == 'B+' ? 'selected' : '' }}
                                                value="B+">B+</option>
                                            <option {{ old('blood_group', $data->blood_group) == 'B-' ? 'selected' : '' }}
                                                value="B-">B-</option>
                                            <option {{ old('blood_group', $data->blood_group) == 'O+' ? 'selected' : '' }}
                                                value="O+">O+</option>
                                            <option {{ old('blood_group', $data->blood_group) == 'O-' ? 'selected' : '' }}
                                                value="O-">O-</option>
                                            <option {{ old('blood_group', $data->blood_group) == 'AB+' ? 'selected' : '' }}
                                                value="AB+">AB+</option>
                                            <option {{ old('blood_group', $data->blood_group) == 'AB-' ? 'selected' : '' }}
                                                value="AB-">AB-</option>
                                        </select>
                                        @error('blood_group')
                                            <div class="text-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-lg-3 col-md-3">
                                    <div class="mb-3">
                                        <label class="form-label">বিভাগ</label>
                                        <select class="form-control select2" name="division" id="division"
                                            data-toggle="select2">
                                            <option value="">Select Division</option>
                                            @foreach ($divisions as $division)
                                                <option
                                                    {{ old('division', $data->division_id) == $division->id ? 'selected' : '' }}
                                                    value="{{ $division->id }}">{{ $division->name }}</option>
                                            @endforeach
                                        </select>
                                        @error('division')
                                            <div class="text-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-lg-3 col-md-3">
                                    <div class="mb-3">
                                        <label class="form-label">জেলা</label>
                                        <select class="form-control select2" name="district" id="district"
                                            data-toggle="select2">
                                            <option value="">Select District</option>
                                        </select>
                                        @error('district')
                                            <div class="text-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-lg-3 col-md-3">
                                    <div class="mb-3">
                                        <label class="form-label">উপজেলা</label>
                                        <select class="form-control select2" name="upazila" id="upazila"
                                            data-toggle="select2">
                                            <option value="">Select Upazila</option>
                                        </select>
                                        @error('upazila')
                                            <div class="text-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-lg-3 col-md-3">
                                    <div class="mb-3">
                                        <label class="form-label">স্থায়ী ঠিকানা</label>
                                        <textarea data-toggle="maxlength" class="form-control" name="permanent_address" id="permanent_address"
                                            maxlength="225" rows="3" placeholder="Permanent Address">{{ old('permanent_address', $data->address) }}</textarea>
                                        @error('permanent_address')
                                            <div class="text-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>

                            </div>
                            <div class="row">
                                <div class="mb-3">
                                    <label class="form-label">শেখ হাসিনা জাতীয় যুব উন্নয়ন ইনস্টিটিউটে পূর্বে কোন কোর্স
                                        করেছেণ কিনা
                                        ?</label>
                                    <br>
                                    <input type="radio" data-provide="typeahead" value="1"
                                        {{ old('any_course_before', $data->any_course_before) == '1' ? 'checked' : '' }}
                                        name="any_course_before"> Yes
                                    <input type="radio" data-provide="typeahead" value="0"
                                        {{ old('any_course_before', $data->any_course_before) == '0' ? 'checked' : '' }}
                                        name="any_course_before"> No
                                    @error('any_course_before')
                                        <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            <div class="row">
                                <div class="mb-3">
                                    <label class="form-label">বর্তমানে কোথাও অধ্যয়নরত আছেন কিনা ?</label>
                                    <br>
                                    <input type="radio" data-provide="typeahead" value="1"
                                        name="current_education_status"
                                        {{ old('current_education_status', $data->current_education_status) == '1' ? 'checked' : '' }}>
                                    Yes
                                    <input type="radio" data-provide="typeahead" value="0"
                                        name="current_education_status"
                                        {{ old('current_education_status', $data->current_education_status) == '0' ? 'checked' : '' }}>
                                    No
                                    @error('current_education_status')
                                        <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            <div class="row">
                                <div class="mb-3">
                                    <label class="form-label">Training Program on Small Business and Entrepreneurship
                                        Development
                                        কোর্সে আবেদনকারীগণ বর্তমানে কোনো ব্যবসার সাথে যুক্ত না থাকলে পূর্বে কোন ব্যবসার সাথে
                                        যুক্ত
                                        ছিলেন কিনা ?</label>
                                    <br>
                                    <input type="radio" data-provide="typeahead" value="1" name="business_status"
                                        {{ old('business_status', $data->business_status) == '1' ? 'checked' : '' }}> Yes
                                    <input type="radio" data-provide="typeahead" value="0" name="business_status"
                                        {{ old('business_status', $data->business_status) == '0' ? 'checked' : '' }}> No
                                    @error('business_status')
                                        <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label class="form-label">সর্বশেষ শিক্ষাগত যোগ্যতা</label>
                                        <select class="form-select" name="last_education" id="last_education">
                                            <option value="">Select Last Education</option>
                                            @foreach ($educations as $education)
                                                <option
                                                    {{ old('last_education', $data->last_education_id) == $education->id ? 'selected' : '' }}
                                                    value="{{ $education->id }}">{{ $education->name }}</option>
                                            @endforeach
                                        </select>
                                        @error('last_education')
                                            <div class="text-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label class="form-label">আপনার কম্পিউটার প্রশিক্ষনের কোর্সেও মেয়াদ কত মাসের ছিল
                                            ?</label>
                                        <select class="form-select" name="computer_course_duration"
                                            id="computer_course_duration">
                                            <option value="">Select Computer Course Duration</option>

                                            @foreach ($course_durations as $course_duration)
                                                <option
                                                    {{ old('computer_course_duration', $data->computer_course_duration) == $course_duration->id ? 'selected' : '' }}
                                                    value="{{ $course_duration->id }}">{{ $course_duration->name }}
                                                </option>
                                            @endforeach
                                        </select>
                                        @error('computer_course_duration')
                                            <div class="text-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label class="form-label">বেসিত কোর্স সনদ প্রদানকারী প্রতিষ্ঠানের ধরন</label>
                                        <select class="form-select" name="basis_institute_type"
                                            id="basis_institute_type">
                                            <option value="">Select Basis Institute Type</option>
                                            @foreach ($institute_types as $institute_type)
                                                <option
                                                    {{ old('basis_institute_type', $data->institute_type_id) == $institute_type->id ? 'selected' : '' }}
                                                    value="{{ $institute_type->id }}">{{ $institute_type->name }}
                                                </option>
                                            @endforeach
                                        </select>
                                        @error('basis_institute_type')
                                            <div class="text-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label class="form-label">আপনার কোনা কোঠা আছে কিনা ?</label>
                                        <select class="form-select" name="quota" id="quota">
                                            <option value="">Select Quota</option>
                                            @foreach ($quotas as $quota)
                                                <option {{ old('quota', $data->quota_id) == $quota->id ? 'selected' : '' }}
                                                    value="{{ $quota->id }}">{{ $quota->name }}</option>
                                            @endforeach
                                        </select>
                                        @error('quota')
                                            <div class="text-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="mb-3">
                                        <label class="form-label">Image :</label> <br>
                                        <a href="{{ getFile($data->image) }}" target="_blank"> <img
                                                src="{{ getFile($data->image) }}" alt="" height="100"
                                                width="100"></a>

                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="mb-3">
                                        <label class="form-label">জাতীয় পরিচয় পত্র</label> <br>
                                        <a href="{{ getFile($data->nid_image) }}" target="_blank"> <img
                                                src="{{ getFile($data->nid_image) }}" alt=""
                                                height="100" width="100"></a>

                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="mb-3">
                                        <label class="form-label">শিক্ষাগত সনদ</label> <br>
                                        <a href="{{ getFile($data->educational_certificate) }}" target="_blank"> <img
                                                src="{{ getFile($data->educational_certificate) }}" alt=""
                                                height="100" width="100"></a>

                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="mb-3">
                                        <label class="form-label">বেসিত কোর্স সনদ</label> <br>
                                        <a href="{{ getFile($data->basis_institute_certificate) }}" target="_blank"> <img
                                                src="{{ getFile($data->basis_institute_certificate) }}" alt=""
                                                height="100" width="100"></a>

                                    </div>
                                </div>


                            </div>

                            <div class="row">
                                <div class="col-md-3 m-auto">
                                    <button type="submit" class="btn btn-primary">Update Application</button>
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
        $(function() {
            var districtSelected = '{{ old('district', $data->district_id) }}'
            $('#division').on('change', function() {
                var division_id = $(this).val();
                $('#district').html('<option value="">Select district</option>');

                $.ajax({
                    method: "GET",
                    url: '{{ route('get.district') }}',
                    data: {
                        division_id: division_id
                    }
                }).done(function(data) {
                    $.each(data, function(index, item) {
                        if (districtSelected == item.id) {
                            $('#district').append('<option selected value="' + item.id +
                                '" selected>' + item.name + '</option>');
                        } else {
                            $('#district').append('<option value="' + item.id + '">' + item
                                .name + '</option>');
                        }
                    });

                    $('#district').trigger('change');
                });

            });

            // personal address
            $('#division').trigger('change');
            var subDistrictSelected = '{{ old('upazila', $data->upazila_id) }}';
            $('#district').on('change', function() {
                var district_id = $(this).val();
                $('#upazila').html('<option value="">Select sub district</option>');
                if (district_id != '' && district_id != null) {
                    $.ajax({
                        method: "GET",
                        url: '{{ route('get.sub_district') }}',
                        data: {
                            district_id: district_id
                        }
                    }).done(function(data) {
                        $.each(data, function(index, item) {
                            if (subDistrictSelected == item.id) {
                                $('#upazila').append('<option selected value="' + item
                                    .id +
                                    '" selected>' + item.name + '</option>');
                            } else {
                                $('#upazila').append('<option value="' + item.id +
                                    '">' +
                                    item.name + '</option>');
                            }
                        });
                        $('#upazila').trigger('change');
                    });
                }
            });
            $('#district').trigger('change');
            {{-- var unionSelected = '{{ old('union') }}'; --}}
            {{-- $('#upazila').on('change', function() { --}}
            {{--    var sub_district_id = $(this).val(); --}}
            {{--    $('#union').html('<option value="">Select union</option>'); --}}
            {{--    if (sub_district_id != '' && sub_district_id != null) { --}}
            {{--        $.ajax({ --}}
            {{--            method: "GET", --}}
            {{--            url: '{{ route('get.unions') }}', --}}
            {{--            data: { --}}
            {{--                sub_district_id: sub_district_id --}}
            {{--            } --}}
            {{--        }).done(function(data) { --}}
            {{--            $.each(data, function(index, item) { --}}
            {{--                if (unionSelected == item.id) { --}}
            {{--                    $('#union').append('<option selected value="' + item --}}
            {{--                            .id + --}}
            {{--                        '" selected>' + item.name + '</option>'); --}}
            {{--                } else { --}}
            {{--                    $('#union').append('<option value="' + item.id + --}}
            {{--                        '">' + --}}
            {{--                        item.name + '</option>'); --}}
            {{--                } --}}
            {{--            }); --}}
            {{--        }); --}}
            {{--    } --}}
            {{-- }); --}}
            {{-- $('#sub_district').trigger('change'); --}}
        });
    </script>
@endpush
