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

        <!-- end page title -->

        <div class="row mt-2">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-header bg-secondary">

                        <b class="text-light font-22">Feedbacks</b>

                    </div>
                    <div class="card-body">

                        <div class="table-responsive">
                            <form id="myForm">
                                <table id="datatable-buttons"
                                    class="table table-striped table-bordered dt-responsive nowrap w-100">
                                    <thead>
                                        <tr class="bg-info text-white">
                                            <th>SL</th>
                                            <th>Trainee Name</th>
                                            <th>Company</th>
                                            <th>Address</th>
                                            <th>Designation</th>
                                            <th>Joining Date</th>
                                            <th>Description</th>

                                        </tr>
                                    </thead>
                                    <tbody>

                                        @foreach ($feedbacks as $data)
                                            <tr>
                                                <td>
                                                    {{ $loop->iteration }}
                                                </td>
                                                <td>{{ $data->trainee->name ?? '' }}</td>
                                                <td>{{ $data->company_name ?? '' }}</td>
                                                <td>{{ $data->company_address ?? '' }}</td>
                                                <td>{{ $data->designation ?? '' }}</td>
                                                <td>{{ $data->joining_date ?? '' }}</td>
                                                <td>{{ $data->description ?? '' }}</td>


                                            </tr>
                                        @endforeach

                                    </tbody>
                                </table>
                            </form>
                        </div>
                        {{ @$feedbacks->links('pagination::bootstrap-5') }}
                    </div> <!-- end card-body-->
                </div> <!-- end card-->
            </div> <!-- end col-->

        </div>
        <!-- end row -->

    </div>
@endsection
@push('scripts')
    <script></script>
@endpush
