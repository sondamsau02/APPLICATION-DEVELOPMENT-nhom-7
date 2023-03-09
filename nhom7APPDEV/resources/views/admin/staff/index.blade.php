@extends('layoutss.master')

@section('content')
      
      <!-- partial -->
      <!-- partial:partials/_sidebar.html -->
      <nav class="sidebar sidebar-offcanvas" id="sidebar">
      @if(session('success'))
  <div class="alert alert-success alert-dismissible fade show mt-3" role="alert">
    {{ session('success') }}
    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
      <span aria-hidden="true">&times;</span>
    </button>
  </div>
@endif
        <ul class="nav">
          <li class="nav-item">
            <a class="nav-link" href="">
              <i class="typcn typcn-device-desktop menu-icon"></i>
              <span class="menu-title">Dashboard</span>
              <div class="badge badge-danger">new</div>
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" data-toggle="collapse" href="#ui-basic" aria-expanded="false" aria-controls="ui-basic">
              <i class="typcn typcn-document-text menu-icon"></i>
              <span class="menu-title">Staffs CRUD</span>
              <i class="menu-arrow"></i>
            </a>
            <div class="collapse" id="ui-basic">
              <ul class="nav flex-column sub-menu">
                <li class="nav-item"> <a class="nav-link" href="staff">View</a></li>
             
              </ul>
            </div>
          </li>
          
          
          <li class="nav-item">
            <a class="nav-link" data-toggle="collapse" href="#error" aria-expanded="false" aria-controls="error">
              <i class="typcn typcn-globe-outline menu-icon"></i>
              <span class="menu-title">Trainers CRUD</span>
              <i class="menu-arrow"></i>
            </a>
            <div class="collapse" id="error">
              <ul class="nav flex-column sub-menu">
                <li class="nav-item"> <a class="nav-link" href="users"> View  </a></li>
             
              </ul>
            </div>
          
        </ul>
      </nav>
      <div class="container">
      <div class="row">
  <div class="col-md-12">
    <div class="card">
      <h4> Account Staffs
        <a href="{{url('admin/staff/create')}}" class="btn btn-primary btn-sm float-right">Add Account </a>
      </h4>
      <div class="table-responsive pt-3">
        <table class="table table-striped project-orders-table">
          <thead>
            <tr>
              <th>ID</th>
              <th>Name</th>
              <th>Email</th>
              <th>Action</th>
            </tr>
          </thead>
          <tbody>
            @foreach ($staffList as $staff)
            <tr>
              <td>{{ $staff->id }}</td>
              <td>{{ $staff->name }}</td>
              <td>{{ $staff->email }}</td>
              <td>
                <div class="d-flex align-items-center">
                  <a href="{{ url ('admin/staff/edit/'.$staff->id) }}" class="btn btn-success btn-sm btn-icon-text mr-3">Edit</a>
                  <i class="typcn typcn-edit btn-icon-append"></i>                         
                  <a href="{{ url ('admin/staff/destroy/'.$staff->id) }}"class="btn btn-danger btn-sm btn-icon-text"> Delete</a>
                  <i class="typcn typcn-delete-outline btn-icon-append"></i>                          
                </div>
              </td>
            </tr>
            @endforeach
          </tbody>
        </table>
      </div>
    </div>
  </div>
</div>

                     
      
@endsection

