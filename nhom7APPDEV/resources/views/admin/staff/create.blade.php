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
          </li>
          
      </nav>
      <div class="container">      
<div class="main-panel">        
        <div class="content-wrapper">
          <div class="row">
            <div class="col-md-6 grid-margin stretch-card">
              <div class="card">
                <div class="card-body">
      <!-- partial -->
<form method="POST" action="{{ route('admin.staff.store') }}">
    @csrf
    <div class="form-group">
        <label for="name">Name</label>
        <input type="text" name="name" id="name" class="form-control" value="{{ old('name') }}" required>
    </div>

    <div class="form-group">
        <label for="email">Email</label>
        <input type="email" name="email" id="email" class="form-control" value="{{ old('email') }}" required>
    </div>

    <div class="form-group">
        <label for="password">password</label>
        <input type="password" name="password" id="password" class="form-control" required>
    </div>

    <button type="submit" class="btn btn-primary">Create</button>
    
            <a class="btn btn-primary" href="{{url('admin/staff/')}}"> Back</a>
</form>
</div>
</div>
</div>
@endsection