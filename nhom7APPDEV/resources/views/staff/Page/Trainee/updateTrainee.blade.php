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
                        <form action="" method="POST" role="form"
                            enctype="multipart/form-data">
                            @csrf
                            <fieldset>
                                <div>
                                    @csrf
                                    <label>Username:</label>
                                    <input type="text" class="form-control" name="username" value="{{ $trainee->username }}">
                                    <br>
                                    <label>Password:</label>
                                    <input type="password" class="form-control" name="password">
                                    <br>
                                    <label>Name:</label>
                                    <input type="text" class="form-control" name="name" value="{{ $trainee->name }}">
                                    <br>
                                    <label>email:</label>
                                    <input type="text" class="form-control" name="email" value="{{ old('email') }}">
                                    <label>Phone:</label>
                                    <input type="text" class="form-control" name="phone" value="{{ $trainee->phone }}">
                                    <br>
                                    <label>Age:</label>
                                    <input type="text" class="form-control" name="age" value="{{ $trainee->age }}">
                                    <br>
                                    <label>Date of Birth:</label>
                                    <input type="text" class="form-control" name="date_of_birth" value="{{ $trainee->date_of_birth }}">
                                    <br>
                                    <label>Address:</label>
                                    <input type="text" class="form-control" name="address" value="{{ $trainee->address }}">
                                    <br>
                                    <label>Type:</label>
                                    <input type="text" class="form-control" name="type" value="{{ $trainee->type }}"
                                      >
                                    <br>
                                    <label>Department:</label>
                                    <input type="text" class="form-control" name="department" value="{{ $trainee->department }}"
                                      >
                                    <br>
                                    
                                    <label>Academic Standard:</label>
                                    <input type="text" class="form-control" name="academic_standard" 
                                        value="{{ $trainee->academic_standard }}">
                                    <br>
                                    <label>CERF level:</label>
                                    <input type="text" class="form-control" name="CERF_level" 
                                        value="{{ $trainee->CERF_level }}" >
                                    <br>
                                    <label>Proficient language:</label>
                                    <input type="text" class="form-control" name="proficient_language" value="{{ $trainee->proficient_language }}"
                                       >
                                    <br>
                                </div>
                                </fieldset>
                            <button class="btn btn-primary btn-block text-uppercase mb-3" type="submit">
                                Update Trainee Account
                            </button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @endsection