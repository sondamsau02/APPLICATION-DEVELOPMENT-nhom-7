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
              <span class="menu-title">CRUD Trainee</span>
              <i class="menu-arrow"></i>  
            </a>
            <div class="collapse" id="error">
              <ul class="nav flex-column sub-menu">
                <li class="nav-item"> <a class="nav-link" href="{{ route('staff.trainee.index') }}">Trainee List </a></li>
                <li class="nav-item"> <a class="nav-link" href="{{ route('staff.trainee.add') }}">Add new Trainee</a></li>
              </ul>
            </div>
            <!--categories-->
            <li class="nav-item">
            <a class="nav-link" data-toggle="collapse" href="#error" aria-expanded="false" aria-controls="error">
              <i class="typcn typcn-globe-outline menu-icon"></i>
              <span class="menu-title">Manage Categories</span>
              <i class="menu-arrow"></i>  
            </a>
            <div class="collapse" id="error">
              <ul class="nav flex-column sub-menu">
                <li class="nav-item"> <a class="nav-link" href="{{ route('staff.category.index') }}">Category List </a></li>
              </ul>
            </div>
            <!--course-->
            <li class="nav-item">
            <a class="nav-link" data-toggle="collapse" href="#error" aria-expanded="false" aria-controls="error">
              <i class="typcn typcn-globe-outline menu-icon"></i>
              <span class="menu-title">Manage Courses</span>
              <i class="menu-arrow"></i>  
            </a>
            <div class="collapse" id="error">
              <ul class="nav flex-column sub-menu">
                <li class="nav-item"> <a class="nav-link" href="{{ route('staff.course.index') }}">Courses List </a></li>
              </ul>
            </div>
            <!--topic-->
            <li class="nav-item">
            <a class="nav-link" data-toggle="collapse" href="#error" aria-expanded="false" aria-controls="error">
              <i class="typcn typcn-globe-outline menu-icon"></i>
              <span class="menu-title">Manage Topic</span>
              <i class="menu-arrow"></i>  
            </a>
            <div class="collapse" id="error">
              <ul class="nav flex-column sub-menu">
                <li class="nav-item"> <a class="nav-link" href="{{ route('staff.topic.index') }}">Topic List </a></li>
              </ul>
            </div>
                <!--trainerc-->
            <li class="nav-item">
            <a class="nav-link" data-toggle="collapse" href="#error" aria-expanded="false" aria-controls="error">
              <i class="typcn typcn-globe-outline menu-icon"></i>
              <span class="menu-title">CRUD Trainer</span>
              <i class="menu-arrow"></i>  
            </a>
            <div class="collapse" id="error">
              <ul class="nav flex-column sub-menu">
                <li class="nav-item"> <a class="nav-link" href="{{ route('staff.trainer.index') }}">Trainer List </a></li>
              </ul> 
            </div>
            <!--trainee course-->
            <li class="nav-item">
            <a class="nav-link" data-toggle="collapse" href="#error" aria-expanded="false" aria-controls="error">
              <i class="typcn typcn-globe-outline menu-icon"></i>
              <span class="menu-title">Manage TraineeCourses</span>
              <i class="menu-arrow"></i>  
            </a>
            <div class="collapse" id="error">
              <ul class="nav flex-column sub-menu">
                <li class="nav-item"> <a class="nav-link" href="{{ route('staff.traineecourse.index') }}">TraineeCourse List </a></li>
              </ul> 
            </div>
            <!--topictrainer-->

            <li class="nav-item">
            <a class="nav-link" data-toggle="collapse" href="#error" aria-expanded="false" aria-controls="error">
              <i class="typcn typcn-globe-outline menu-icon"></i>
              <span class="menu-title">Manage TrainerTopic</span>
              <i class="menu-arrow"></i>  
            </a>
            <div class="collapse" id="error">
              <ul class="nav flex-column sub-menu">
                <li class="nav-item"> <a class="nav-link" href="{{ route('staff.trainertopic.index') }}">trainertopic List </a></li>
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
