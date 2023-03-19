@extends('Layoutss.master')
@section('content')
@if ($errors->any())
        <div class="alert alert-danger">
            <strong>Whoops!</strong> There were some problems with your input!
            <br>
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <div class="container-fluid">
        <div class="row">
            <div class="col-xs-12 col-md-5 col-lg-5">
                <div class="panel panel-primary">
                    <div class="panel-body">
                        <form action="{{ route('staff.trainee.add') }}" method="POST" role="form"
                            enctype="multipart/form-data">
                            @csrf
                            <fieldset>
                                <div>
                                    @csrf
                                    <label>Username:</label>
                                    <input type="text" class="form-control" name="username" value="{{ old('username') }}"
                                        placeholder="Username">
                                    <br>
                                    <label>Password:</label>
                                    <input type="password" class="form-control" name="password" placeholder="Password">
                                    <br>
                                    <label>Nanme:</label>
                                    <input type="text" class="form-control" name="name" value="{{ old('name') }}"
                                        placeholder="Full Name">
                                    <br>
                                    
                                    <label>email:</label>
                                    <input type="text" class="form-control" name="email" value="{{ old('email') }}"
                                        placeholder="email">
                                    <br>
                                    <label>Phone:</label>
                                    <input type="text" class="form-control" name="phone" value="{{ old('phone') }}"
                                        placeholder="phone">
                                    <br>
                                    <label>Age:</label>
                                    <input type="text" class="form-control" name="age" value="{{ old('age') }}"
                                        placeholder="Age">
                                    <br>
                                    <label>Date of Birth:</label>
                                    <input type="text" class="form-control" name="date_of_birth" value="{{ old('date_of_birth') }}"
                                        placeholder="Date of Birth">
                                    <br>
                                    <label>Address:</label>
                                    <input type="text" class="form-control" name="address" value="{{ old('address') }}"
                                        placeholder="Address">
                                    <br>
                                    <label>Type:</label>
                                    <input type="text" class="form-control" name="type" value="{{ old('type') }}"
                                        placeholder="Type">
                                    <br>
                                    <label>Department:</label>
                                    <input type="text" class="form-control" name="department" value="{{ old('department') }}"
                                        placeholder="Department">
                                    <br>
                                    
                                    <label>Academic Standard:</label>
                                    <input type="text" class="form-control" name="academic_standard" 
                                        value="{{ old('academic_standard') }}" placeholder="Academic Standard">
                                    <br>
                                    <label>CERF level:</label>
                                    <input type="text" class="form-control" name="CERF_level" 
                                        value="{{ old('CERF_level') }}" placeholder="CERF level">
                                    <br>
                                    <label>Proficient language:</label>
                                    <input type="text" class="form-control" name="proficient_language" value="{{ old('proficient_language') }}"
                                        placeholder="Proficient language">
                                    <br>
                                </div>
                            </fieldset>
                            <button class="btn btn-primary btn-block text-uppercase mb-3" type="submit">
                                Add Trainee Account
                            </button>
                            <a href="{{ route('staff.trainee.index') }}" class="btn btn-danger btn-icon-split">
                                 Back to List Account
                                 </a>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection