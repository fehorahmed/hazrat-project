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
                            </div>
                        </form>
                        <div class="table-responsive">
                            <table id="datatable-buttons"
                                class="table table-striped table-bordered dt-responsive nowrap w-100">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Course Name</th>

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
                                                @if ($data->batch_id)
                                                    <br>
                                                    <strong> Batch :</strong> {{ $data->batch->name ?? '' }}
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
                                                <span
                                                    class="badge {{ getApplicationStatusBg($data->status) }} ">{{ getApplicationStatus($data->status) }}</span>
                                            </td>
                                            <td>
                                                <a href="{{ route('admin.application.view', $data->id) }}"
                                                    class="mt-1 btn btn-primary btn-sm">VIEW</a>
                                                @if ($data->status == 1)
                                                    <a href="{{ route('admin.application.edit', $data->id) }}"
                                                        class="mt-1 btn btn-warning btn-sm">Edit</a>
                                                @endif
                                                @if (!$data->batch_id)
                                                    <br>
                                                    <button type="button" data-bs-toggle="modal"
                                                        data-bs-target="#exampleModal{{ $data->id }}"
                                                        class="btn btn-info btn-sm mt-1">Assign Batch</button>
                                                @endif
                                            </td>
                                            <!-- Modal -->
                                            <div class="modal fade" id="exampleModal{{ $data->id }}" tabindex="-1"
                                                aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                <div class="modal-dialog">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h1 class="modal-title fs-5" id="exampleModalLabel">Assign
                                                                Batch</h1>
                                                            <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                                aria-label="Close"></button>
                                                        </div>
                                                        <form action="{{ route('admin.application.batch.update') }}"
                                                            method="post" enctype="multipart/form-data">
                                                            @csrf
                                                            <div class="modal-body">
                                                                <input type="hidden" name="application_id"
                                                                    value="{{ $data->id }}">
                                                                <div class="row mb-3">
                                                                    <label for="name"
                                                                        class="col-12 col-md-3 col-form-label">Trainee
                                                                        Name</label>
                                                                    <div class="col-12 col-md-9">
                                                                        <input type="text" name="name" id="name"
                                                                            value="{{ $data->trainee->name ?? '' }}"
                                                                            class="form-control" placeholder="" readonly>
                                                                        @error('name')
                                                                            <div class="help-block text-danger">
                                                                                {{ $message }} </div>
                                                                        @enderror
                                                                    </div>
                                                                </div>
                                                                <div class="row mb-3">
                                                                    <label for="batch_id"
                                                                        class="col-12 col-md-3 col-form-label">Select
                                                                        Batch</label>
                                                                    <div class="col-12 col-md-9">
                                                                        <select name="batch_id" id="batch_id"
                                                                            class="form-select">
                                                                            <option value="">Select One</option>
                                                                            @foreach ($data->course->batches as $batch)
                                                                                <option value="{{ $batch->id }}">
                                                                                    {{ $batch->name }}</option>
                                                                            @endforeach
                                                                        </select>
                                                                        @error('batch_id')
                                                                            <div class="help-block text-danger">
                                                                                {{ $message }} </div>
                                                                        @enderror
                                                                    </div>
                                                                </div>

                                                            </div>
                                                            <div class="modal-footer">
                                                                <button type="button" class="btn btn-secondary"
                                                                    data-bs-dismiss="modal">Close</button>
                                                                <button type="submit" class="btn btn-primary">Update
                                                                    Batch</button>
                                                            </div>
                                                        </form>
                                                    </div>
                                                </div>
                                            </div>
                                        </tr>
                                    @endforeach

                                </tbody>
                            </table>
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

        });
    </script>
@endpush
