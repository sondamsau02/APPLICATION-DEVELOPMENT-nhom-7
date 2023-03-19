@extends('Layoutss.master')
@section('content')
<nav class="sidebar sidebar-offcanvas" id="sidebar">
        <ul class="nav">
          <li class="nav-item">
            <a class="nav-link" href="">
              <i class="typcn typcn-device-desktop menu-icon"></i>
              <span class="menu-title">Dashboard</span>
              
            </a>
          </li>
          <!--traineee-->
          <li class="nav-item">
            <a class="nav-link" data-toggle="collapse" href="#error" aria-expanded="false" aria-controls="error">
              <i class="typcn typcn-globe-outline menu-icon"></i>
              <span class="menu-title">Management Trainee</span>
              <i class="menu-arrow"></i>  
            </a>
            <div class="collapse" id="error">
              <ul class="nav flex-column sub-menu">
                <li class="nav-item"> <a class="nav-link" href="{{ route('staff.trainee.index') }}">Trainee List </a></li>
                <li class="nav-item"> <a class="nav-link" href="{{ route('staff.trainee.add') }}">Add new Trainee</a></li>
              </ul>
            </div>
         <!--logout-->
          <li class="nav-item">
            <form method="POST" action="{{ route('auth.logout') }}">
            @csrf
             <button type="submit" class="nav-link btn btn-link">
             <i class="typcn typcn-key-outline menu-icon"></i>
             <span class="menu-title">Logout</span>
             </button>
           </form>
           </li>
           

        </ul>
      </nav>

@if ($message = Session::get('success'))
        <div class="alert alert-success">
            <p>{{ $message }}</p>
        </div>
    @endif
    <div class="container">
		<header class="header">
			<h1>Welcome Staff</h1>
		</header>
	</div>
@endsection
