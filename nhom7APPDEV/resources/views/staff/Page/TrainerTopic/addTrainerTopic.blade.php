@extends('Layoutss.master')
@section('content')
    

    <div class="container-fluid">
        
        <div class="row">
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
            <div class="col-xs-12 col-md-5 col-lg-5">
                <div class="panel panel-primary">
                    <div class="panel-body">
                        <form action="{{ route('staff.trainertopic.add') }}" method="POST" role="form"
                            enctype="multipart/form-data">
                            @csrf
                            <fieldset>
                                <div>
                                    @csrf
                                    <label>Topic:</label>
                                    <select name="topic_id" class="form-control">
                                        @foreach ($topic as $topics)
                                            <option value="{{ $topics->id }}">{{ $topics->name }}
                                            </option>
                                        @endforeach
                                    </select>
                                    <br>
                                    <label>Trainer:</label>
                                    <select name="user_id" class="form-control">
                                        @foreach ($trainer as $trainers)
                                            <option value="{{ $trainers->id }}">{{ $trainers->name }}
                                            </option>
                                        @endforeach
                                    </select>
                                    <br>
                                </div>
                            </fieldset>
                            <button class="btn btn-primary btn-block text-uppercase mb-3" type="submit">
                                Assign Topic
                            </button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
