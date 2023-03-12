@extends('layoutss.master')

@section('content')
      
      <!-- partial -->
      <!-- partial:partials/_sidebar.html -->
      <nav class="sidebar sidebar-offcanvas" id="sidebar">
        <ul class="nav">
          <li class="nav-item">
            <a class="nav-link" href="">
              <i class="typcn typcn-device-desktop menu-icon"></i>
              <span class="menu-title">Dashboard</span>
              
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
          </li>
          <li class="nav-item">
            <form method="POST" action="{{ route('admin.logout') }}">
            @csrf
             <button type="submit" class="nav-link btn btn-link">
             <i class="typcn typcn-key-outline menu-icon"></i>
             <span class="menu-title">Đăng xuất</span>
             </button>
           </form>
           </li>

        </ul>
      </nav>
      <!-- partial -->
      <div class="row">
            <div class="col-md-12">
              <div class="card">
                <div class="table-responsive pt-3">
                  <table class="table table-striped project-orders-table">
                    <thead>
                      <tr>
                        <th class="ml-5">ID</th>
                        <th>Project name</th>
                        <th>Customer</th>
                        <th>Deadline</th>
                        <th>Payouts	</th>
                        <th>Traffic</th>
                        <th>Actions</th>
                      </tr>
                    </thead>
                    <tbody>
                      <tr>
                        <td>#D1</td>
                        <td>Consectetur adipisicing elit </td>
                        <td>Beulah Cummings</td>
                        <td>03 Jan 2019</td>
                        <td>$ 5235</td>
                        <td>1.3K</td>
                        <td>
                          <div class="d-flex align-items-center">
                            <button type="button" class="btn btn-success btn-sm btn-icon-text mr-3">
                              Edit
                              <i class="typcn typcn-edit btn-icon-append"></i>                          
                            </button>
                            <button type="button" class="btn btn-danger btn-sm btn-icon-text">
                              Delete
                              <i class="typcn typcn-delete-outline btn-icon-append"></i>                          
                            </button>
                          </div>
                        </td>
                      </tr>
                     
@endsection
  

