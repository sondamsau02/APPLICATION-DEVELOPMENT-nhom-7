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
                                    <label>Name:</label>
                                    <input type="text" class="form-control" name="name" value="{{ $topic->name }}">
                                    <br>
                                    <label>Description:</label>
                                    <textarea class="form-control" name="description"
                                    style="width: 100%; height:100px;" placeholder="Descrption">{{ $topic->description }}</textarea>
                                    <br>
                                    <label>Course:</label>
                                    <select name="course_id" class="form-control">
                                        @foreach ($course as $courses)
                                            <option value="{{ $courses->id }}">{{ $courses->name }}
                                            </option>
                                        @endforeach
                                    </select>
                                    <br>
                                </div>
                            </fieldset>
                            <button class="btn btn-primary btn-block text-uppercase mb-3" type="submit">
                                Update Topic
                            </button>
                            <a href="{{ route('staff.topic.index') }}" class="btn btn-danger btn-icon-split">
                                 Back to List Account
                                 </a>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection