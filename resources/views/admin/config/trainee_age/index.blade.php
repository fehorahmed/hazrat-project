@extends('admin.app')
@section('title')
    {{ isset($pageTitle) ? $pageTitle : 'Course Create' }}
@endsection
@section('content')
    {{-- @include('admin.master.flash') --}}
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="page-title-box">
                    <div class="page-title-right">
                        <ol class="breadcrumb m-0">
                            <li class="breadcrumb-item"><a href="javascript: void(0);">Trainee Age</a></li>
                            <li class="breadcrumb-item"><a href="javascript: void(0);">Create</a></li>
                        </ol>
                    </div>
                    <h4 class="page-title">Trainee Age</h4>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-6 m-auto">
                <div class="card">
                    <div class="card-header bg-secondary">
                        <h4 class="text-white">Trainee Age Update</h4>
                    </div>
                    <div class="card-body">
                        <form id="campaign-form" class="form-horizontal" method="post"
                            action="{{ route('admin.config.trainee-age.store') }}" enctype="multipart/form-data">
                            @csrf

                            <div class="row">
                                <div class="col-md-12">
                                    <div class="row mb-3">
                                        <label for="max_age" class="col-12 col-md-3 col-form-label">Max Age</label>
                                        <div class="col-12 col-md-9">
                                            <input type="number" name="max_age" id="max_age"
                                                value="{{ $data->max_age ?? 0 }}" class="form-control"
                                                placeholder="Enter Max Age here">
                                            @error('max_age')
                                                <div class="help-block text-danger">{{ $message }} </div>
                                            @enderror
                                        </div>

                                    </div>
                                    <div class="row mb-3">
                                        <label for="min_age" class="col-12 col-md-3 col-form-label">Min Age</label>
                                        <div class="col-12 col-md-9">
                                            <input type="number" name="min_age" id="min_age"
                                                value="{{ $data->min_age ?? 0 }}" class="form-control"
                                                placeholder="Enter Min Age here">
                                            @error('min_age')
                                                <div class="help-block text-danger">{{ $message }} </div>
                                            @enderror
                                        </div>

                                    </div>

                                    <div class="text-center mb-3">
                                        <input type="submit" class="btn btn-primary  " value="Update">
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
