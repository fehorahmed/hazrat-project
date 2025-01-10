@extends('admin.app')
@section('title')
    {{ isset($pageTitle) ? $pageTitle : 'Application View' }}
@endsection

@push('styles')
    <link href="{{ asset('/') }}assets/css/vendor/buttons.bootstrap5.css" rel="stylesheet" type="text/css" />
@endpush

@section('content')
    <div class="container-fluid">

        <!-- start page title -->
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
                                        <td>{{ $data->trainee->name ?? '' }}</td>
                                    </tr>

                                    <tr>
                                        <th>Applicant Father Name</th>
                                        <td>{{ $data->trainee->father_name ?? '' }}</td>
                                    </tr>
                                    <tr>
                                        <th>Applicant Mother Name</th>
                                        <td>{{ $data->trainee->mother_name ?? '' }}</td>
                                    </tr>
                                    <tr>
                                        <th>National ID number</th>
                                        <td>{{ $data->trainee->nid ?? '' }}</td>
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
                                        <td>{{ $data->trainee->phone ?? '' }}</td>
                                    </tr>

                                </table>
                            </div>
                            <div class="col-sm-4">
                                <div class="table-responsive">
                                    <table class="table table-borderless">
                                        <tr>
                                            @if ($data->trainee->photo)
                                                <td class="text-center"><img src="{{ asset($data->trainee->photo) }}" alt=""
                                                        width="150px" height="150px"></td>
                                            @else
                                                <td class="text-center"><img src="{{ asset('assets/img/avatar.png') }}"
                                                        alt="" width="150px" height="150px"></td>
                                            @endif
                                        </tr>
                                        <tr>
                                            @if ($data->trainee->signature)
                                                <td class="text-center"><img src="{{ asset($data->trainee->signature) }}" alt=""
                                                        width="150px" height="150px"></td>
                                            @else
                                                <td class="text-center"><img src="{{ asset('assets/img/avatar.png') }}"
                                                        alt="" width="300px" height="50px"></td>
                                            @endif
                                        </tr>
                                    </table>
                                </div>
                            </div>
                        </div>
                        {{-- <div class="row">
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

                        </div> --}}
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
                                        <th>Course Code</th>
                                        <td>{{ $data->course->course_code }}</td>
                                    </tr>
                                    <tr>
                                        <th>Start Date</th>
                                        <td>{{ $data->course->start_date }}</td>
                                    </tr>
                                    <tr>
                                        <th>End Date</th>
                                        <td>{{ $data->course->end_date }}</td>
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
@endsection

@push('scripts')
    <script !src="">
        $(function() {
            $('#print').click(function() {
                window.print()
            })
        })
    </script>
@endpush
