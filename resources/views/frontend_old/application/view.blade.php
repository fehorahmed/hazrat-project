@extends('frontend.app')

@section('content')
    <section class="py-3">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="page-title-box">
                        <div class="page-title-right">
                            <div class="d-flex">

                                {{--                            <a href="" class="btn btn-primary ms-2 me-2"> --}}
                                {{--                                Export --}}
                                {{--                            </a> --}}
                            </div>
                        </div>

                    </div>
                </div>
            </div>
            <!-- end page title -->

            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header d-flex justify-content-between">
                            <h4 class="page-title">Application View</h4>
                            {{-- <button class="btn btn-info" id="print">Print</button> --}}
                        </div>
                        <div class="card-body">
                            <div class="row">
                                <col-md-12>
                                    <h5 class="bg-success p-2 text-white">Personal Information</h5>
                                </col-md-12>
                                <div class="col-sm-8">
                                    <table class="table table-bordered">
                                        <tr>
                                            <th width="35%"> Applicant Name</th>
                                            <td>{{ $data->name ?? '' }}</td>
                                        </tr>

                                        <tr>
                                            <th>Applicant Father Name</th>
                                            <td>{{ $data->father_name ?? '' }}</td>
                                        </tr>
                                        <tr>
                                            <th>Applicant Mother Name</th>
                                            <td>{{ $data->mother_name ?? '' }}</td>
                                        </tr>
                                        <tr>
                                            <th>National ID number</th>
                                            <td>{{ $data->nid ?? '' }}</td>
                                        </tr>
                                        <tr>
                                            <th>Date of Birth</th>
                                            <td>{{ $data->date_of_birth ?? '' }}</td>
                                        </tr>
                                        <tr>
                                            <th>Email</th>
                                            <td>{{ $data->trainee->email ?? '' }}</td>
                                        </tr>
                                        <tr>
                                            <th>Mobile</th>
                                            <td>{{ $data->mobile ?? '' }}</td>
                                        </tr>

                                    </table>
                                </div>
                                <div class="col-sm-4">
                                    <div class="table-responsive">
                                        <table class="table table-borderless">
                                            <tr>
                                                <td>Image</td>
                                                <td>NID</td>
                                            </tr>
                                            <tr>
                                                @if ($data->image)
                                                    <td class="text-center"><img src="{{ asset($data->image) }}"
                                                            alt="" width="150px" height="150px"></td>
                                                @else
                                                    <td class="text-center"><img src="{{ asset('assets/img/avatar.png') }}"
                                                            alt="" width="150px" height="150px"></td>
                                                @endif

                                                @if ($data->nid_image)
                                                    <td class="text-center"><img src="{{ asset($data->nid_image) }}"
                                                            alt="" width="150px" height="150px"></td>
                                                @endif

                                            </tr>
                                            <tr>
                                                <td>শিক্ষাগত সনদ</td>
                                                <td>বেসিস কোর্স সনদ</td>
                                            </tr>
                                            <tr>

                                                @if ($data->educational_certificate)
                                                    <td class="text-center"><img
                                                            src="{{ asset($data->educational_certificate) }}"
                                                            alt="" width="150px" height="150px"></td>
                                                @endif

                                                @if ($data->basis_institute_certificate)
                                                    <td class="text-center"><img
                                                            src="{{ asset($data->basis_institute_certificate) }}"
                                                            alt="" width="150px" height="150px"></td>
                                                @endif

                                            </tr>
                                        </table>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <col-sm-12>
                                    <h5 class="bg-success p-2 text-white">Contact Information</h5>
                                </col-sm-12>

                                <div class="col-sm-12">
                                    <table class="table table-bordered">
                                        <tr class="bg-info text-light">
                                            <th colspan="2" width="50%">Permanent Address</th>
                                            <th colspan="2" width="50%">Present Address</th>
                                        </tr>
                                        <tr>
                                            <th>Division</th>
                                            <td>{{ $data->division->name ?? '' }}</td>
                                            <td>Division</td>
                                            <td>{{ $data->present_division->name ?? '' }}</td>

                                        </tr>
                                        <tr>
                                            <th>District</th>
                                            <td>{{ $data->district->name ?? '' }}</td>
                                            <td>District</td>
                                            <td>{{ $data->present_district->name ?? '' }}</td>

                                        </tr>
                                        <tr>
                                            <th>Upazila</th>
                                            <td>{{ $data->upazila->name ?? '' }}</td>
                                            <td>Upazila</td>
                                            <td>{{ $data->present_upazila->name ?? '' }}</td>

                                        </tr>
                                        <tr>
                                            <th>Address</th>
                                            <td>{{ $data->address ?? '' }}</td>
                                            <td>Address</td>
                                            <td>{{ $data->present_address ?? '' }}</td>
                                        </tr>


                                    </table>
                                </div>

                            </div>
                            <div class="row">
                                <col-sm-12>
                                    <h5 class="bg-success p-2 text-white">Course Information</h5>
                                </col-sm-12>

                                <div class="col-sm-12">
                                    <table class="table table-borderless">
                                        <tr>
                                            <th width="60%">Course Name</th>
                                            <td>{{ $data->course->name ?? '' }}</td>
                                        </tr>
                                        <tr>
                                            <th>Application Date</th>
                                            <td>{{ $data->date }}</td>
                                        </tr>
                                        <tr>
                                            <th>শেখ হাসিনা জাতীয় যুব উন্নয়ন ইনস্টিটিউটে পূর্বে কোন কোর্স করেছেণ কিনা ?</th>
                                            <td> {{ $data->any_course_before == 1 ? 'Yes' : 'No' }}</td>
                                        </tr>
                                        <tr>
                                            <th>বর্তমানে কোথাও অধ্যয়নরত আছেন কিনা ?</th>
                                            <td> {{ $data->current_education_status == 1 ? 'Yes' : 'No' }}</td>
                                        </tr>
                                        <tr>
                                            <th>Training Program on Small Business and Entrepreneurship Development কোর্সে
                                                আবেদনকারীগণ বর্তমানে কোনো ব্যবসার সাথে যুক্ত না থাকলে পূর্বে কোন ব্যবসার
                                                সাথে
                                                যুক্ত ছিলেন কিনা ?</th>
                                            <td> {{ $data->business_status == 1 ? 'Yes' : 'No' }}</td>
                                        </tr>
                                        <tr>
                                            <th>সর্বশেষ শিক্ষাগত যোগ্যতা</th>
                                            <td> {{ $data->education->name ?? '' }}</td>
                                        </tr>
                                        <tr>
                                            <th>আপনার কম্পিউটার প্রশিক্ষনের কোর্সেও মেয়াদ কত মাসের ছিল ?</th>
                                            <td> {{ $data->courseDuration->name ?? '' }}</td>
                                        </tr>
                                        <tr>
                                            <th>বেসিস কোর্স সনদ প্রদানকারী প্রতিষ্ঠানের ধরন</th>
                                            <td> {{ $data->instituteType->name ?? '' }}</td>
                                        </tr>
                                        <tr>
                                        <tr>
                                            <th>বেসিস কোর্স সনদ</th>
                                            @if ($data->basis_institute_certificate)
                                                <th colspan="2" class="text-center">
                                                    <a class="btn btn-primary btn-sm" target="_blank"
                                                        href="{{ asset($data->basis_institute_certificate) }}">View
                                                        Certificate</a>

                                                </th>
                                            @endif

                                        </tr>
                                        </tr>

                                    </table>
                                </div>

                            </div>
                        </div>

                    </div> <!-- end card-->
                </div> <!-- end col-->

            </div>
            <!-- end row -->

        </div>
    </section>
@endsection
