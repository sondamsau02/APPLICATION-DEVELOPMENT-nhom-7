@extends('layoutss.master')

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
<div class="d-flex justify-content-between">
    <div>
        <a href="{{route('admin.account.add')}}" class="btn btn-success text-uppercase mb-3">
            Add Account
        </a>
    </div>
    <div class="d-flex justify-content-between">
    <div>
        
    </div>
    <div>
        <form class="form-inline" method="GET" action="{{ route('admin.account.index') }}">
            <div class="form-group mb-2">
                <input type="text" class="form-control" name="search" placeholder="Search">
            </div>
            <div class="form-group mx-sm-3 mb-2">
                <select class="form-control" name="role_id">
                    <option value="">--Select Role--</option>
                    <option value="2">Staff</option>
                    <option value="3">Trainer</option>
                </select>
            </div>
            <button type="submit" class="btn btn-primary mb-2">Search</button>
        </form>
    </div>
    <div>
        <a href="{{ route('admin.index') }}" class="btn btn-danger btn-icon-split">Back</a>
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
                @foreach ($account as $key => $value)
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
                            <td>{{ $value->CERF_level }}</td>
                            <td>{{ $value->proficient_language }}</td>
                            <td></td>

                           
                            <td>
                                @foreach ($role as $roles)
                                    @if ($roles->id == $value->role_id)
                                        <option value="{{ $roles->id }}" selected>{{ $roles->description }}
                                        </option>
                                    @endif
                                @endforeach
                            </td>
                            <td></td>
                            <td>
                                <a href="{{ asset('admin/account/update/' . $value->id) }}"
                                    class="btn btn-secondary btn-icon-split">
                                    <span class="icon text-white-10">
                                        <i class="fas fa-arrow-right"></i>
                                    </span>
                                    <span class="text">Update</span>
                                </a>
                                <a href="{{ asset('admin/account/delete/' . $value->id) }}"
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
<!-- /.container-fluid -->
@endsection