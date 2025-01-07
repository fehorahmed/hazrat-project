@extends('admin.app')
@section('title')
    {{ isset($pageTitle) ? $pageTitle : 'Course Versity' }}
@endsection
@section('content')
    @include('admin.master.flash')
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="page-title-box">
                    <div class="page-title-right">
                        <ol class="breadcrumb m-0">
                            <li class="breadcrumb-item"><a href="javascript: void(0);">Versity</a></li>
                            <li class="breadcrumb-item"><a href="javascript: void(0);">Create</a></li>
                        </ol>
                    </div>
                    <h4 class="page-title">Versity Create</h4>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-6 m-auto">
                <div class="card">
                    <div class="card-header bg-secondary">
                        <h4 class="text-white">Versity Create</h4>
                    </div>
                    <div class="card-body">
                        <form id="campaign-form" class="form-horizontal" method="post"
                              action="{{route('admin.config.versity.store')}}"
                              enctype="multipart/form-data">
                            @csrf

                            <div class="row">
                                <div class="col-md-12">
                                    <div class="row mb-3">
                                        <label for="name" class="col-12 col-md-3 col-form-label">Versity Name</label>
                                        <div class="col-12 col-md-9">
                                            <input type="text" name="name" id="name" value="{{old('name')}}"
                                                   class="form-control" placeholder="Enter versity name here">
                                            @error('name')
                                            <div class="help-block text-danger">{{ $message }} </div>
                                            @enderror
                                        </div>

                                    </div>

                                    <div class="row mb-3">
                                        <label for="example-select"
                                               class="col-12 col-md-3 col-form-label">Status</label>
                                        <div class="col-12 col-md-9">
                                            <input type="radio" name="status" id="status1" {{old('status')=="1"?'checked':''}} value="1"> <label for="status1">Active</label>
                                            <input type="radio" name="status" id="status2" {{old('status')=="0"?'checked':''}} value="0"> <label for="status2">Inactive</label>
                                            @error('status')
                                            <div class="help-block text-danger">{{ $message }} </div>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="text-center mb-3">
                                        <a href="{{route('admin.config.versity.index')}}" class="btn btn-danger">Back</a>
                                        <input type="submit" class="btn btn-primary  " value="Create Versity">
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

