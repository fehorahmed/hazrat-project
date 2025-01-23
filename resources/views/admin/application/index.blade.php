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
        <div class="row">
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
        </div>
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
                        <form action="">
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
                                    <div class="mb-3 text-end">
                                        <button type="submit" name="submit" value="search"
                                            class="btn btn-primary ps-3 pe-3">Search
                                        </button>
                                        {{-- <button type="submit" name="export" value="export"
                                            class="btn btn-warning ms-2 ps-3 pe-3">Preview
                                        </button> --}}
                                    </div>
                                </div>

                                {{-- <div class="col-md-2">
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
                                </div> --}}

                            </div>
                            <div class="row">


                            </div>
                        </form>
                        <div class="table-responsive">
                            <form id="myForm">
                                <table id="datatable-buttons"
                                    class="table table-striped table-bordered dt-responsive nowrap w-100">
                                    <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>Course Name</th>
                                            <th>Batch</th>
                                            <th>Details</th>
                                            <th>Email/Phone</th>
                                            <th>Education</th>
                                            <th>NID/BR</th>
                                            <th>Status</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>

                                        @foreach ($datas as $data)
                                            <tr>
                                                <td>
                                                    {{ $loop->iteration }}
                                                </td>
                                                <td>
                                                    {{ $data->course->name ?? '' }}
                                                </td>
                                                <td>
                                                    @if (!$data->batch_id)
                                                        <button class="btn btn-info btn-sm">Assign</button>
                                                    @else
                                                        <strong> Batch :</strong> {{ $data->batch_id ?? '' }}
                                                    @endif
                                                </td>
                                                <td>
                                                    <strong>Name :</strong> {{ $data->trainee->name ?? '' }} <br>
                                                    <strong>Father Name :</strong> {{ $data->trainee->father_name ?? '' }}
                                                </td>
                                                <td>
                                                    <strong>Email :</strong> {{ $data->trainee->email ?? '' }} <br>
                                                    <strong>Phone :</strong> {{ $data->trainee->phone ?? '' }}
                                                </td>
                                                <td>
                                                    <strong> Versity :</strong> {{ $data->versity->name ?? '' }} <br>
                                                    <strong> Department :</strong> {{ $data->department->name ?? '' }} <br>
                                                    <strong> Semester :</strong> {{ getSemester($data->semester) }} <br>
                                                    <strong> Session :</strong> {{ $data->session ?? '' }}
                                                </td>
                                                <td>{{ $data->trainee->nid ?? '' }}</td>
                                                <td>

                                                        <span class="badge {{getApplicationStatusBg($data->status)}} ">{{getApplicationStatus($data->status)}}</span>

                                                </td>
                                                <td>
                                                    <a href="{{ route('admin.application.view', $data->id) }}"
                                                        class="mt-1 btn btn-primary btn-sm">VIEW</a>
                                                    @if ($data->status == 1)
                                                        <a href="{{ route('admin.application.edit', $data->id) }}"
                                                            class="mt-1 btn btn-warning btn-sm">Edit</a>
                                                    @endif
                                                </td>

                                            </tr>
                                        @endforeach

                                    </tbody>
                                </table>
                            </form>
                        </div>
                        {{ @$datas->links('pagination::bootstrap-5') }}
                    </div> <!-- end card-body-->
                </div> <!-- end card-->
            </div> <!-- end col-->

        </div>
        <!-- end row -->
    </div>
@endsection
@push('scripts')
    <script>
        $(function() {
            // var st_date = '1991/01/01'
            // var en_date = ''
            // $('input[name="date"]').daterangepicker({
            //     timePicker: true,
            //     startDate: st_date,
            //     endDate: new Date(),
            //     locale: {
            //         format: 'YYYY/MM/DD'
            //     }
            // });
        });
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        $(function() {

            $('.btn-approved').on('click', function(event) {
                event.preventDefault();
                var app_id = $(this).attr('data-id');
                var result = confirm('Are you sure to approve??')
                if (result) {
                    $.ajax({
                        method: "GET",
                        // url: '',
                        data: {
                            id: app_id
                        }
                    }).done(function(data) {
                        if (data.success) {
                            alert(data.message);
                            location.reload();
                        } else {
                            alert(data.message);
                        }
                    });
                }
            });
            $('.btn-enroll').on('click', function(event) {
                event.preventDefault();
                var app_id = $(this).attr('data-id');
                Swal.fire({
                    title: 'Are you sure?',
                    text: "You won't be able to revert this!",
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'Yes, Enroll it!'
                }).then((result) => {
                    if (result.isConfirmed) {
                        $.ajax({
                            url: '', // Replace with your endpoint URL
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

            $('.application_id').on('click', function() {
                var isChecked = $('.application_id:checked').length > 0;
                if (isChecked) {
                    $('#myButton').show();
                } else {
                    $('#myButton').hide();
                }
            });

            $('#myButton').on('click', function(event) {
                event.preventDefault(); // Prevent default form submission

                Swal.fire({
                    title: 'Are you sure?',
                    text: "You won't be able to revert this!",
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'Yes, do it!'
                }).then((result) => {
                    if (result.isConfirmed) {
                        var formData = $('#myForm').serialize(); // Serialize form data
                        console.log(formData);
                        $.ajax({
                            url: '', // Replace with your endpoint URL
                            type: 'POST', // Replace with your desired HTTP method (e.g., POST, GET)
                            data: formData, // Send serialized form data
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
                                        text: 'Something went wrong!',

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
