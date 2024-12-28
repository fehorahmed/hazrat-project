@extends('admin.app')
@section('title')
    {{ isset($pageTitle) ? $pageTitle : 'Complain View' }}
@endsection

@push('styles')
    <link href="{{asset('/')}}assets/css/vendor/buttons.bootstrap5.css" rel="stylesheet" type="text/css"/>
@endpush

@section('content')

    <div class="container-fluid">

        <!-- start page title -->
        <div class="row">
            <div class="col-12">
                <div class="page-title-box">
                    <div class="page-title-right">
                        <div class="d-flex">

                            {{--                            <a href="" class="btn btn-primary ms-2 me-2">--}}
                            {{--                                Export--}}
                            {{--                            </a>--}}
                        </div>
                    </div>

                </div>
            </div>
        </div>
        <!-- end page title -->

        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class="page-title">Complain View</h4>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-6">
                                <table class="table table-bordered">
                                    <tr>
                                        <th width="20%">Application Date</th>
                                        <td>{{$complain->application_date}}</td>
                                    </tr>
                                    <tr>
                                        <th>Name</th>
                                        <td>{{$complain->name}}</td>
                                    </tr>

                                    <tr>
                                        <th>Father Name</th>
                                        <td>{{$complain->f_name}}</td>
                                    </tr>
                                    <tr>
                                        <th>Nid</th>
                                        <td>{{$complain->nid}}</td>
                                    </tr>
                                    <tr>
                                        <th>Email</th>
                                        <td>{{$complain->email}}</td>
                                    </tr>
                                    <tr>
                                        <th>Mobile</th>
                                        <td>{{$complain->mobile}}</td>
                                    </tr>
                                    <tr>
                                        <th>Subject</th>
                                        <td>{{$complain->subject}}</td>
                                    </tr>
                                    <tr>
                                        <th>NID</th>
                                        <td>{{$complain->nid}}</td>
                                    </tr>
                                    <tr>
                                        <th>Division</th>
                                        <td>{{$complain->division->name}}</td>
                                    </tr>
                                    <tr>
                                        <th>District</th>
                                        <td>{{$complain->district->name}}</td>
                                    </tr>
                                    <tr>
                                        <th>Upazila</th>
                                        <td>{{$complain->upazila->name}}</td>
                                    </tr>
                                    <tr>
                                        <th>Union</th>
                                        <td>{{$complain->union->name}}</td>
                                    </tr>
                                    <tr>
                                        <th>Village</th>
                                        <td>{{$complain->village}}</td>
                                    </tr>
                                    <tr>
                                        <th>Remark</th>
                                        <td>{{$complain->remark}}</td>
                                    </tr>

                                </table>
                            </div>
                            <div class="col-md-6">
                                <table class="table table-bordered">
                                    <tr>
                                        <th class="text-center">Complain Image</th>
                                    </tr>
                                    <tr>
                                        <td><a target="_blank" href="{{asset($complain->file)}}">
                                                <img src="{{asset($complain->file)}}" alt="" width="100%"></a></td>
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

