@extends('frontend.app_without_slider')
@section('content')
    <!-- Start Appointment -->
    <section class="appointment">
        <div class="container">
            <div class="row">
                <div class="text-center w-75 m-auto">
                    @if (session()->has('error'))
                        <p class="text-danger mb-4">{{ session('error') }}</p>
                    @endif
                    <x-jet-validation-errors class="mb-4" />
                    @if (session('status'))
                        <div class="mb-4 font-medium text-sm text-green-600">
                            {{ session('status') }}
                        </div>
                    @endif
                    @if (session('success'))
                        <div class="mb-4 font-medium text-sm text-green-600">
                            {{ session('success') }}
                        </div>
                    @endif
                </div>
            </div>
            <div class="row">
                <div class=" col-md-12 col-12">
                    <h2>Dashboard</h2>
                </div>
                <div class="col-md-12">
                    <table class="table table-stripped">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Course Name</th>
                                <th>Batch</th>
                                <th>Email/Phone</th>
                                <th>Education</th>
                                <th>Status</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($applications as $application)
                                <tr>
                                    <td>
                                        {{ $loop->iteration }}
                                    </td>
                                    <td>
                                        {{ $application->course->name ?? '' }}
                                    </td>
                                    <td>
                                        @if (!$application->batch_id)
                                        @else
                                            {{ $application->batch->name ?? '' }}
                                        @endif

                                    </td>
                                    <td>
                                        <strong>Email :</strong> {{ $application->trainee->email ?? '' }} <br>
                                        <strong>Phone :</strong> {{ $application->trainee->phone ?? '' }}
                                    </td>
                                    <td>
                                        <strong> Versity :</strong> {{ $application->versity->name ?? '' }} <br>
                                        <strong> Department :</strong> {{ $application->department->name ?? '' }} <br>
                                        <strong> Semester :</strong> {{ getSemester($application->semester) }} <br>
                                        <strong> Session :</strong> {{ $application->session ?? '' }}
                                    </td>
                                    <td>{{ getApplicationStatus($application->status) }}</td>
                                    <td> <a href="" class="btn-info btn-sm text-light">Pay Details</a> </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </section>
    <!-- End Appointment -->
@endsection

@push('script')
@endpush
