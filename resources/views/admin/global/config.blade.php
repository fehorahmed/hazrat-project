@extends('admin.app')
@section('title')
    {{ isset($pageTitle) ? $pageTitle : 'Global Config' }}
@endsection
@section('content')
    @include('admin.master.flash')
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="page-title-box">
                    <div class="page-title-right">
                        <ol class="breadcrumb m-0">
                            <li class="breadcrumb-item"><a href="javascript: void(0);">Global Config</a></li>

                        </ol>
                    </div>
                    <h4 class="page-title">Global Config</h4>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12 m-auto">
                <div class="card">
                    <div class="card-header bg-secondary">
                        <h4 class="text-white">Global Config</h4>
                    </div>
                    <div class="card-body">
                        <form id="campaign-form" class="form-horizontal" method="post"
                            action="{{ route('global.config.update') }}" enctype="multipart/form-data">
                            @csrf

                            <div class="row">
                                <div class="col-md-6">
                                    <div class="row mb-3">
                                        <label for="application_name" class="col-12 col-md-3 col-form-label">Application
                                            Name</label>
                                        <div class="col-12 col-md-9">
                                            <input type="text" name="application_name" id="application_name"
                                                value="{{ getGlobalConfig('application_name') }}" class="form-control"
                                                placeholder="Enter application name here">
                                            @error('application_name')
                                                <div class="help-block text-danger">{{ $message }} </div>
                                            @enderror
                                        </div>

                                    </div>

                                    <div class="row mb-3">
                                        <label for="application_email" class="col-12 col-md-3 col-form-label">E-Mail</label>
                                        <div class="col-12 col-md-9">
                                            <input type="application_email" name="application_email"
                                                value="{{ getGlobalConfig('application_email') }}" id="email"
                                                class="form-control" placeholder="Enter application email">
                                            @error('application_email')
                                                <div class="help-block text-danger">{{ $message }} </div>
                                            @enderror
                                        </div>

                                    </div>
                                    <div class="row mb-3">
                                        <label for="phone" class="col-12 col-md-3 col-form-label">Phone</label>
                                        <div class="col-12 col-md-9">
                                            <input type="phone" name="phone"
                                                value="{{ getGlobalConfig('phone') }}" id="phone"
                                                class="form-control" placeholder="Enter phone">
                                            @error('phone')
                                                <div class="help-block text-danger">{{ $message }} </div>
                                            @enderror
                                        </div>

                                    </div>

                                    <div class="row mb-3">
                                        <label for="address" class="col-12 col-md-3 col-form-label">Address</label>
                                        <div class="col-12 col-md-9">
                                            <textarea name="address" id="address" cols="5" class="form-control" rows="3"
                                                placeholder="Write address here">{{ getGlobalConfig('address') }}</textarea>
                                            @error('address')
                                                <div class="help-block text-danger">{{ $message }} </div>
                                            @enderror
                                        </div>

                                    </div>
                                    <div class="row mb-3">
                                        <label for="example-select" class="col-12 col-md-3 col-form-label">Application
                                            Logo</label>
                                        <div class="col-12 col-md-9">
                                            <input type="file" name="application_logo" id="file"
                                                class="form-control">

                                            @error('application_logo')
                                                <div class="help-block text-danger">{{ $message }} </div>
                                            @enderror
                                            @if (getGlobalConfig('application_logo'))
                                                <img src="{{ asset(getGlobalConfig('application_logo')) }}" alt="" class="mt-2"
                                                    height="100">
                                            @endif
                                        </div>

                                    </div>
                                </div>
                                <div class="col-md-6">

                                </div>
                            </div>
                            <div class="text-center mb-3">

                                <input type="submit" class="btn btn-primary  " value="Update Setting">
                            </div>
                        </form>
                    </div>

                </div>

            </div>
        </div>
    </div>
@endsection
@push('scripts')
@endpush
