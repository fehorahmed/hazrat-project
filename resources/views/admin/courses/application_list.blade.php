@extends('admin.app')
@section('title')
    {{ isset($pageTitle) ? $pageTitle : 'Applications' }}
@endsection

@push('styles')
    <link href="{{ asset('/') }}assets/css/vendor/buttons.bootstrap5.css" rel="stylesheet" type="text/css" />
@endpush

@section('content')
    <div class="container-fluid">

        <!-- start page title -->
        {{-- <div class="row">
            <div class="col-12">
                <div class="page-title-box">
                    <nav class="navbar navbar-expand-lg bg-dark">
                        <div class="container">
                            <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                                data-bs-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false"
                                aria-label="Toggle navigation">
                                <i class="mdi mdi-menu"></i>
                            </button>

                            <!-- menus -->
                            <div class="collapse navbar-collapse" id="navbarNavDropdown">

                                <!-- left menu -->
                                <ul class="navbar-nav me-auto align-items-center ">
                                    <li class="nav-item mx-lg-3">
                                        <a class="nav-link text-light {{ request()->routeIs('admin.application.index') ? 'active' : '' }}"
                                            href="{{ route('admin.application.index') }}">Applied Applications</a>
                                    </li>
                                    <li class="nav-item mx-lg-3">
                                        <a class="nav-link text-light {{ request()->routeIs('admin.application.approved') ? 'active' : '' }}"
                                            href="{{ route('admin.application.approved') }}">Approved Application</a>
                                    </li>
                                    <li class="nav-item mx-lg-3">
                                        <a class="nav-link text-light {{ request()->routeIs('admin.application.canceled') ? 'active' : '' }}"
                                            href="{{ route('admin.application.canceled') }}">Cancel Application</a>
                                    </li>

                                </ul>



                            </div>
                        </div>
                    </nav>
                </div>
            </div>
        </div> --}}
        <!-- end page title -->

        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-header">
                        <div class="row">
                            <div class="col-6">
                                <h4>Applications</h4>
                            </div>
                            <div class="col-4"></div>
                            <div class="col-2 content-end">

                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        {{-- <form action="">
                            <div class="row">

                                <div class="col-md-2">
                                    <div class="mb-3">
                                        <label for="example-select" class="form-label">Course Name</label>
                                        <select name="course" class="form-select" id="course">
                                            <option value="">Select One</option>
                                            @foreach ($courses as $course)
                                                <option {{ request('course') == $course->id ? 'selected' : '' }}
                                                    value="{{ $course->id }}">{{ $course->name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>

                                <div class="col-md-2">
                                    <div class="mb-3">
                                        <label for="example-select" class="form-label">Division</label>
                                        <select name="division" class="form-select" id="division">
                                            <option value="">Select One</option>
                                            @foreach ($divisions as $division)
                                                <option {{ request('division') == $division->id ? 'selected' : '' }}
                                                    value="{{ $division->id }}">{{ $division->name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-2">
                                    <div class="mb-3">
                                        <label for="example-select" class="form-label">District</label>
                                        <select name="district" class="form-select" id="district">
                                            <option value="">Select One</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-2">
                                    <div class="mb-3">
                                        <label for="example-select" class="form-label">Upazila</label>
                                        <select name="upazila" class="form-select" id="sub_district">
                                            <option value="">Select One</option>
                                        </select>
                                    </div>
                                </div>

                                <div class="col-md-2">
                                    <div class="mb-3">
                                        <label class="form-label">Date From</label>
                                        <input type="date" name="start_date" value="{{ request('start_date') }}"
                                            class="form-control">
                                    </div>
                                </div>
                                <div class="col-md-2">
                                    <div class="mb-3">
                                        <label class="form-label">Date To</label>
                                        <input type="date" name="end_date" value="{{ request('end_date') }}"
                                            class="form-control">
                                    </div>
                                </div>

                            </div>
                            <div class="row">
                                <div class="mb-3 text-end">
                                    <button type="submit" name="submit" value="search"
                                        class="btn btn-primary ps-3 pe-3">Search
                                    </button>
                                    <button type="submit" name="export" value="export"
                                        class="btn btn-warning ms-2 ps-3 pe-3">Preview
                                    </button>
                                </div>

                            </div>
                        </form> --}}
                        <div class="table-responsive">

                            <table id="datatable-buttons"
                                class="table table-striped table-bordered dt-responsive nowrap w-100">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Course Name</th>
                                        <th>Name</th>
                                        <th>Father Name</th>
                                        <th>Email/Phone</th>
                                        <th>NID/BR</th>
                                        <th>Address</th>
                                        <th>Status</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>

                                    @foreach ($applications as $data)
                                        <tr>
                                            <td>
                                                {{ $loop->iteration }}
                                            </td>
                                            <td>{{ $data->course->name ?? '' }}</td>
                                            <td>{{ $data->father_name ?? '' }}</td>
                                            <td>{{ $data->name ?? '' }}</td>
                                            <td>
                                                <strong>Email:</strong> {{ $data->trainee->email ?? '' }} <br>
                                                <strong>Phone:</strong> {{ $data->mobile ?? '' }}
                                            </td>
                                            <td>{{ $data->nid ?? '' }}</td>
                                            <td>
                                                <strong> Division:</strong> {{ $data->division->name ?? '' }},<br>
                                                <strong> District:</strong> {{ $data->district->name ?? '' }},<br>
                                                <strong>Upazila: </strong>{{ $data->upazila->name ?? '' }},
                                                <strong>Address: </strong>{{ $data->address ?? '' }}
                                            </td>
                                            <td>
                                                @if ($data->status == 0)
                                                    <span class="badge bg-danger ">Inactive</span>
                                                @elseif($data->status == 1)
                                                    <span class="badge bg-info ">Active</span>
                                                @elseif($data->status == 2)
                                                    <span class="badge bg-success ">Approved</span>
                                                @elseif($data->status == 3)
                                                    <span class="badge bg-success ">Enrolled</span>
                                                @elseif($data->status == 5)
                                                    <span class="badge bg-primary">Passed</span>
                                                @elseif($data->status == 6)
                                                    <span class="badge bg-danger">Failed</span>
                                                @else
                                                @endif
                                            </td>
                                            <td>
                                                <a href="{{ route('admin.application.view', $data->id) }}"
                                                    class="mt-1 btn btn-primary btn-sm">VIEW</a>
                                                @if ($data->status == 3)
                                                    <button role="button" data-id="{{ $data->id }}"
                                                        class="mt-1 btn btn-secondary btn-sm btn-passed">Course
                                                        Passed</button>
                                                    <button role="button" data-id="{{ $data->id }}"
                                                        class="mt-1 btn btn-warning btn-sm btn-failed">Course
                                                        Failed</button>
                                                @endif
                                                @if ($data->status == 5)
                                                    <a target="_blank"
                                                        href="{{ route('admin.application.certificate', $data->id) }}"
                                                        class="mt-1 btn btn-primary btn-sm"> Certificate</a>
                                                @endif
                                            </td>

                                        </tr>
                                    @endforeach
                                    {{-- <tr>
                                        <td colspan="9" class="text-end">
                                            @if (request()->routeIs('admin.application.index'))
                                                <input type="hidden" name="submit_type" value="Approved">
                                                <input type="submit" value="Approved" style="display: none;"
                                                    class="btn btn-primary" id="myButton">
                                            @elseif (request()->routeIs('admin.application.approved'))
                                                <input type="hidden" name="submit_type" value="Disapproved">
                                                <input type="submit" value="Disapproved" style="display: none;"
                                                    class="btn btn-danger" id="myButton">
                                            @endif

                                        </td>
                                    </tr> --}}
                                </tbody>
                            </table>

                        </div>

                    </div> <!-- end card-body-->
                </div> <!-- end card-->
            </div> <!-- end col-->

        </div>
        <!-- end row -->

    </div>
@endsection
@push('scripts')
    <script>
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        $(function() {

            // $('.btn-enroll').on('click', function(event) {
            //     event.preventDefault();
            //     var app_id = $(this).attr('data-id');
            //     Swal.fire({
            //         title: 'Are you sure?',
            //         text: "You won't be able to revert this!",
            //         icon: 'warning',
            //         showCancelButton: true,
            //         confirmButtonColor: '#3085d6',
            //         cancelButtonColor: '#d33',
            //         confirmButtonText: 'Yes, Enroll it!'
            //     }).then((result) => {
            //         if (result.isConfirmed) {
            //             $.ajax({
            //                 url: '{{ route('admin.application.enrolled') }}', // Replace with your endpoint URL
            //                 type: 'POST', // Replace with your desired HTTP method (e.g., POST, GET)
            //                 data: {
            //                     app_id: app_id
            //                 }, // Send serialized form data
            //                 success: function(response) {
            //                     if (response.success) {
            //                         Swal.fire({
            //                             title: 'Message',
            //                             text: response.message,
            //                             icon: 'success',
            //                             confirmButtonText: 'OK'
            //                         }).then(function() {
            //                             location.reload(); // Reload the page
            //                         });
            //                     } else {
            //                         Swal.fire({
            //                             icon: 'error',
            //                             title: 'Oops...',
            //                             text: response.message,

            //                         })
            //                     }

            //                 },
            //                 error: function(xhr, status, error) {
            //                     // Handle error response from the server
            //                     console.error(error);
            //                 }
            //             });
            //         }
            //     })
            // });

            $('.btn-passed').on('click', function(event) {
                event.preventDefault();
                var app_id = $(this).attr('data-id');
                Swal.fire({
                    title: 'Are you sure?',
                    text: "You won't be able to revert this!",
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'Yes, Passed it!'
                }).then((result) => {
                    if (result.isConfirmed) {
                        $.ajax({
                            url: '{{ route('admin.application.passed') }}', // Replace with your endpoint URL
                            type: 'POST', // Replace with your desired HTTP method (e.g., POST, GET)
                            data: {
                                app_id: app_id
                            }, // Send serialized form data
                            success: function(response) {
                                if (response.success) {
                                    Swal.fire({
                                        title: 'Message',
                                        text: response.message,
                                        icon: 'success',
                                        confirmButtonText: 'OK'
                                    }).then(function() {
                                        location.reload(); // Reload the page
                                    });
                                } else {
                                    Swal.fire({
                                        icon: 'error',
                                        title: 'Oops...',
                                        text: response.message,

                                    })
                                }

                            },
                            error: function(xhr, status, error) {
                                // Handle error response from the server
                                console.error(error);
                            }
                        });
                    }
                })
            });
            $('.btn-failed').on('click', function(event) {
                event.preventDefault();
                var app_id = $(this).attr('data-id');
                Swal.fire({
                    title: 'Are you sure?',
                    text: "You won't be able to revert this!",
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'Yes, Failed it!'
                }).then((result) => {
                    if (result.isConfirmed) {
                        $.ajax({
                            url: '{{ route('admin.application.failed') }}', // Replace with your endpoint URL
                            type: 'POST', // Replace with your desired HTTP method (e.g., POST, GET)
                            data: {
                                app_id: app_id
                            }, // Send serialized form data
                            success: function(response) {
                                if (response.success) {
                                    Swal.fire({
                                        title: 'Message',
                                        text: response.message,
                                        icon: 'success',
                                        confirmButtonText: 'OK'
                                    }).then(function() {
                                        location.reload(); // Reload the page
                                    });
                                } else {
                                    Swal.fire({
                                        icon: 'error',
                                        title: 'Oops...',
                                        text: response.message,

                                    })
                                }

                            },
                            error: function(xhr, status, error) {
                                // Handle error response from the server
                                console.error(error);
                            }
                        });
                    }
                })
            });
        });
    </script>
@endpush
