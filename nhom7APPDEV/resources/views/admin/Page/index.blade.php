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
            <form method="POST" action="{{ route('auth.logout') }}">
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
      @if ($message = Session::get('success'))
        <div class="alert alert-success">
            <p>{{ $message }}</p>
        </div>
    @endif

    <div class="container-fluid">
        <div class="row">
            

            <div class="col-xl-3 col-md-6 mb-4">
                <div class="card border-left-primary shadow h-100 py-2">
                    <div class="card-body">
                        <div class="row no-gutters align-items-center">
                            <div class="col mr-2">
                                <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                                    <a href="{{ route('admin.account.index') }}">account Management</a>
                                </div>
                                <div class="h5 mb-0 font-weight-bold text-gray-800">List of Account</div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>
@endsection
  

