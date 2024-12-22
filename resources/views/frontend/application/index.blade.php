@extends('frontend.app')

@section('content')
    <section class="py-5">
        <div class="container">
            <div class="row py-3">
                <div class="col-lg-12 d-flex justify-content-between">
                    <b class="font-24">Applications</b>
                    @if (isset($data_date->date) && $data_date->date >= now())
                        <a href="{{ route('trainee.application.create') }}" class="btn btn-primary">Apply</a>
                    @else
                        <div class="alert alert-info">There are no applicaton available now.</div>
                    @endif
                </div>
            </div>

            <div class="row">
                <div class="col-lg-12 col-md-12">
                    <div class="text-center p-2 p-sm-3">
                        <table class="table table-border table-striped">
                            <tr>
                                <th>SL</th>
                                <th>Application No</th>
                                <th>Course Name</th>
                                <th>Status</th>
                                <th>Action</th>
                            </tr>
                            @foreach ($datas as $data)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $data->application_no ?? '' }}</td>
                                    <td>{{ $data->course->name ?? '' }}</td>
                                    <td>
                                        @if ($data->status == 1)
                                            Active
                                        @elseif($data->status == 2)
                                            Approved
                                        @elseif($data->status == 3)
                                            Enroll
                                        @elseif($data->status == 4)
                                            Rejected
                                        @elseif($data->status == 5)
                                            Passed
                                        @elseif($data->status == 6)
                                            Failed
                                        @endif
                                    </td>
                                    <td>
                                        <a href="{{route('trainee.application.view',$data->id)}}" class="btn btn-primary btn-sm">VIEW</a>
                                        @if ($data->status == 1)
                                            <a href="{{ route('trainee.application.edit', $data->id) }}"
                                                class="btn btn-warning btn-sm">Edit</a>
                                        @endif
                                        @if ($data->status == 5)
                                            <a href="{{ route('trainee.application.certificate', $data->id) }}"
                                                class="btn btn-success btn-sm">Certificate</a>
                                        @endif
                                    </td>
                                </tr>
                            @endforeach

                        </table>
                    </div>
                </div>
            </div>

        </div>
    </section>
@endsection
