@extends('Trainee.Layout.master')
@section('content')
    <!-- Begin Page Content -->
    <div class="container-fluid">
        <!-- DataTales Example -->
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <div class="row">
                    <div class="cpl-sm-12 col-md-6">
                        <h4 class="m-0 font-weight-bold text-primary">Assigned Course List
                            <!-- Topbar Search -->
                            <form action="" method="GET"
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
                </div>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                        <thead>
                            <tr>
                                
                                <th>Trainee</th>
                                <th>Course</th>
                                <th>Description</th>
                                
                            </tr>
                        </thead>
                        @foreach ($traineeCourses as $value)
                            <tbody>
                                <tr>
                                    <td>{{ $value->trainee_name }}</td>
                                    <td>{{ $value->course_name }}</td>
                                    <td>{{ $value->description }}</td>                                  
                                </tr>
                            </tbody>
                        @endforeach
                    </table>
                    <a class=" btn btn-danger btn-icon-split mb-3" href="{{ route('trainee.index') }}">
                                back to main page
                            </a>
                </div>
            </div>
        </div>
    </div>
    <!-- /.container-fluid -->
@endsection
