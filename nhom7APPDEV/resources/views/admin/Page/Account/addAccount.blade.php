@extends('layoutss.master')

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
    @if(session('error'))
    <div class="alert alert-danger">
        {{ session('error') }}
    </div>
@endif


        <div class="container-fluid">
            <div class="row">
                <div class="col-xs-12 col-md-5 col-lg-5">
                    <div class="panel panel-primary">
                        <div class="panel-body">
                            <form action="{{ route('admin.account.add') }}" method="POST" role="form"
                                enctype="multipart/form-data">
                                @csrf
                                <fieldset>
                                    <div>
                                        @csrf
                                        <label>Username:</label>
                                        <input type="text" class="form-control" name="username" placeholder="Username">
                                        <br>
                                        <label>Password:</label>
                                        <input type="password" class="form-control" name="password" placeholder="Password">
                                        <br>
                                        <label>Role:</label>
                                        <br>
                                        <select name="role_id" class="form-control" required>
                                          <option value="">Select Role</option>
                                          <option value="2">Management Staff</option>
                                           <option value="3">Trainer</option>
                                           </select>

                                       
                                        <br>
                                    </div>
                                </fieldset>
                                <button class="btn btn-success text-uppercase mb-3" type="submit">
                                    Add Account
                                </button>
                                <a href="{{ route('admin.account.index') }}" class="btn btn-danger btn-icon-split">
                                 Back to List Account
                                 </a>

                                
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
