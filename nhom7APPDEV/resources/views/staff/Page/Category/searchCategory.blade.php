@extends('Layoutss.master')
@section('content')
<!-- Begin Page Content -->
<div class="container-fluid">

@if ($message = Session::get('success'))
    <div class="alert alert-success">
        <p>{{ $message }}</p>
    </div>
@endif

@if ($message = Session::get('error'))
    <div class="alert alert-danger">
        <p>{{ $message }}</p>
    </div>
@endif

<!-- DataTales Example -->
<div class="card shadow mb-4">
    <div class="card-header py-3">
        <div class="row">
            <div class="cpl-sm-12 col-md-6">
                <h4 class="m-0 font-weight-bold text-primary">You searched for: {{ $search }}</h4>
            </div>
            <div class="cpl-sm-12 col-md-6">
                <a href="{{ route('staff.category.add') }}" 
                class="btn btn-primary btn-icon-split" style="float: right;">
                    <span class="icon text-white-50">
                        <i class="fas fa-flag"></i>
                    </span>
                    <span class="text">Add</span>
                </a>
            </div>
        </div>
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Name</th>
                        <th>Description</th>
                        <th></th>
                        <th></th>
                        <th>Option</th>
                    </tr>
                </thead>
                @foreach ($category as $key => $value)
                    <tbody>
                        <tr>
                            <td>{{ $value->id }}</td>
                            <td>{{ $value->name }}</td>
                            <td>{{ $value->description }}</td>
                            <td></td>
                            <td></td>
                            <td>
                                <a href="{{ asset('Staff/category/update/' . $value->id) }}" 
                                    class="btn btn-secondary btn-icon-split">
                                    <span class="icon text-white-10">
                                        <i class="fas fa-arrow-right"></i>
                                    </span>
                                    <span class="text">Update</span>
                                </a>
                                <a href="{{ asset('Staff/category/delete/' . $value->id) }}" 
                                    onclick="return confirm('You sure to delete it?')"
                                    class="btn btn-danger btn-icon-split">
                                    <span class="icon text-white-10">
                                        <i class="fas fa-trash"></i>
                                    </span>
                                    <span class="text">Delete</span>
                                </a>
                            </td>
                        </tr>
                    </tbody>
                @endforeach
            </table>
        </div>
    </div>
</div>
</div>
@endsection