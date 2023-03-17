@extends('layouts.app')

@section('content')
<form method="POST" action="{{ route('auth.update_profile') }}">
    @csrf
    @method('PUT')

    <div class="form-group">
        <label for="name">Name</label>
        <input type="text" class="form-control" id="name" name="name" value="{{ old('name', $user->name) }}" required>
    </div>

    <div class="form-group">
        <label for="type">External or Internal Type</label>
        <input type="text" class="form-control" id="type" name="type" value="{{ old('type', $user->type) }}" required>
    </div>

    <div class="form-group">
        <label for="education">Education</label>
        <input type="text" class="form-control" id="education" name="education" value="{{ old('education', $user->education) }}">
    </div>

    <div class="form-group">
        <label for="working_place">Working Place</label>
        <input type="text" class="form-control" id="working_place" name="working_place" value="{{ old('working_place', $user->working_place) }}">
    </div>

    <div class="form-group">
        <label for="telephone">Telephone</label>
        <input type="text" class="form-control" id="telephone" name="telephone" value="{{ old('telephone', $user->telephone) }}">
    </div>

    <div class="form-group">
        <label for="email">Email address</label>
        <input type="email" class="form-control" id="email" name="email" value="{{ old('email', $user->email) }}" required>
    </div>

    <button type="submit" class="btn btn-primary">Update</button>
</form>
@endsection 

