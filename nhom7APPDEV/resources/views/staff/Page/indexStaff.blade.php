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
            <li class="nav-item">
            <a class="nav-link" data-toggle="collapse" href="#error" aria-expanded="false" aria-controls="error">
              <i class="typcn typcn-globe-outline menu-icon"></i>
              <span class="menu-title">CRUD Trainer</span>
              <i class="menu-arrow"></i>  
            </a>
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
            <div class="collapse" id="error">
              <ul class="nav flex-column sub-menu">
                <li class="nav-item"> <a class="nav-link" href="{{ route('staff.trainer.index') }}">Trainer List </a></li>
              </ul> 
            </div>
            <!--trainee course-->
            <li class="nav-item">
            <a class="nav-link" data-toggle="collapse" href="#error" aria-expanded="false" aria-controls="error">
              <i class="typcn typcn-globe-outline menu-icon"></i>
              <span class="menu-title">TraineeCourses</span>
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
              <span class="menu-title">TrainerTopic</span>
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

      
    <div class="container-fluid">
      @if ($message = Session::get('success'))
        <div class="alert alert-success">
            <p>{{ $message }}</p>
        </div>
    @endif
        <ol class="breadcrumb mb-4">
            <li class="breadcrumb-item active">Staff Dashboard</li>
        </ol>
        
          <div class="row">
              
  
              <div class="col-xl-3 col-md-6 mb-4">
                  <div class="card border-left-primary shadow h-100 py-2">
                      <div class="card-body">
                          <div class="row no-gutters align-items-center">
                              <div class="col mr-2">
                                  <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                                      <a href="{{ route('staff.trainee.index') }}">Trainee Account Management</a>
                                  </div>
                                  <div class="h5 mb-0 font-weight-bold text-gray-800">List of Account</div>
                              </div>
                          </div>
                      </div>
                  </div>
              </div>
              <div class="col-xl-3 col-md-6 mb-4">
                <div class="card border-left-primary shadow h-100 py-2">
                    <div class="card-body">
                        <div class="row no-gutters align-items-center">
                            <div class="col mr-2">
                                <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                                    <a href="{{ route('staff.category.index') }}">Category Management</a>
                                </div>
                                <div class="h5 mb-0 font-weight-bold text-gray-800">List of Category</div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xl-3 col-md-6 mb-4">
              <div class="card border-left-primary shadow h-100 py-2">
                  <div class="card-body">
                      <div class="row no-gutters align-items-center">
                          <div class="col mr-2">
                              <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                                  <a href="{{ route('staff.course.index') }}">Course Management</a>
                              </div>
                              <div class="h5 mb-0 font-weight-bold text-gray-800">List of Course</div>
                          </div>
                      </div>
                  </div>
              </div>
          </div>
          <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-primary shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                                <a href="{{ route('staff.topic.index') }}">Topic Management</a>
                            </div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800">List of Topic</div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
          <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-primary shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                                <a href="{{ route('staff.traineecourse.index') }}">Assigned Course</a>
                            </div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800">List of Assigned Course</div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-xl-3 col-md-6 mb-4">
          <div class="card border-left-primary shadow h-100 py-2">
              <div class="card-body">
                  <div class="row no-gutters align-items-center">
                      <div class="col mr-2">
                          <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                              <a href="{{ route('staff.trainertopic.index') }}">Assigned Topic</a>
                          </div>
                          <div class="h5 mb-0 font-weight-bold text-gray-800">List of Assigned Topic</div>
                      </div>
                  </div>
              </div>
          </div>
      </div>
          </div>
        

            
    </div>
@endsection
@section('styles')
    <style>
        .card-link {
            text-decoration: none;
        }

        .card-link:hover {
            text-decoration: underline;
        }

        .card-footer {
            background-color: #f5f5f5;
            border-top: none;
        }
    </style>
@endsection

