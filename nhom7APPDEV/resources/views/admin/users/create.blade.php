@extends('layoutss.master')

@section('content')

    <div class="container">
    @if(session('success'))
  <div class="alert alert-success alert-dismissible fade show mt-3" role="alert">
    {{ session('success') }}
    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
      <span aria-hidden="true">&times;</span>
    </button>
  </div>
@endif
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">Create Trainer</div>

                    <div class="card-body">
                        <form method="POST" action="{{ route('admin.users.store') }}">
                            @csrf

                            <div class="form-group">
                                <label for="name">Name</label>
                                <input type="text" name="name" class="form-control" id="name" required>
                            </div>

                            <div class="form-group">
                                <label for="email">Email</label>
                                <input type="email" name="email" class="form-control" id="email" required>
                            </div>

                            <div class="form-group">
                                <label for="password">Password</label>
                                <input type="password" name="password" class="form-control" id="password" required>
                            </div>

                            <button type="submit" class="btn btn-primary">Create</button>
                            <a class="btn btn-primary" href="{{url('admin/users/')}}"> Back</a>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
