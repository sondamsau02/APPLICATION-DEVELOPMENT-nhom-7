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
                                        <select class="form-control" name="role_id" value="{{ old('role_id') }}">
                                           
                                            <option value="3">Trainer</option>
                                        </select>
                                        <br>
                                    </div>
                                </fieldset>
                                <button class="btn btn-primary btn-block text-uppercase mb-3" type="submit">
                                    Add Account
                                </button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
