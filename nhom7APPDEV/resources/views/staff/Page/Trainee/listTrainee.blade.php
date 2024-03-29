@extends('Layoutss.master')
@section('content')
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
                        <h4 class="m-0 font-weight-bold text-primary">Trainee List
                            <!-- Topbar Search -->
                            <form action="{{ route('staff.trainee.search') }}" method="GET"
                                class="d-none d-sm-inline-block form-inline mr-auto ml-md-3 my-2 my-md-0 mw-100 navbar-search">
                                <div class="input-group">
                                    <input type="text" class="form-control bg-light border-0 small"
                                        placeholder="Search for..." aria-label="Search" aria-describedby="basic-addon2"
                                        name="search" required>
                                    <div class="input-group-append">
                                        <button class="btn btn-primary" type="submit">
                                            <i class="fas fa-search fa-sm"></i>
                                        </button>
                                    </div>
                                </div>
                            </form>
                        </h4>
                    </div>
                    <div class="cpl-sm-12 col-md-6">
                        

                        <a href="{{ route('staff.index') }}" class="btn btn-danger btn-icon-split"
                            style="float: right;">
                            <span class="icon text-white-50">
                                <i class="fas fa-flag"></i>
                            </span>
                            <span class="text">Back</span>
                        </a>
                        <a href="{{ route('staff.trainee.add') }}" class="btn btn-primary bg-success"
                            style="float: right;">
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
                            <th>Username</th>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Phone</th>
                        <th>Department</th>
                        <th>Type</th>
                        <th>academic_standard</th>
                        <th>age</th>
                        <th>date_of_birth</th>
                        <th>address</th>
                        <th>CERF_level</th>
                        <th>proficient_language</th>                      
                        <th>Role</th>
                        <th>Option</th>
                            </tr>
                        </thead>
                        @foreach ($trainee as $key => $value)
                            <tbody>
                                <tr>
                            <td>{{ $value->username }}</td>
                            <td>{{ $value->name }}</td>
                            <td>{{ $value->email }}</td>
                            <td>{{ $value->phone }}</td>
                            <td>{{ $value->department }}</td>
                            <td>{{ $value->type }}</td>
                            <td>{{ $value->academic_standard }}</td>
                            <td>{{ $value->age }}</td>
                            <td>{{ $value->date_of_birth}}</td>
                            <td>{{ $value->address}}</td>
                            <td>{{ $value->CERF_level }}</td>
                            <td>{{ $value->proficient_language }}</td>
                            <td></td>
                            
                                    <td>
                                        <a href="{{ asset('Staff/trainee/update/'. $value->id) }}"
                                            class="btn btn-primary bg-success">
                                            <span class="icon text-white-10">
                                                <i class="fas fa-arrow-right"></i>
                                            </span>
                                            <span class="text">Update</span>
                                        </a>
                                        <a href="{{ asset('Staff/trainee/delete/' . $value->id) }}"
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
    <!-- /.container-fluid -->
@endsection