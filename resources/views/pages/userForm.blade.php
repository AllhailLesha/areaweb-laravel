@extends('layouts.app')

@section('body')
    <h1>Create User</h1>
    <form action="{{ route('user.get') }}" method="post">
        @csrf
        <div class="mb-3">
            <label for="userName" class="form-label">Name</label>
            <input type="text" class="form-control" id="userName" name="userName" value="Lesha">
        </div>
        <div class="mb-3">
            <label for="userAge" class="form-label">Age</label>
            <input type="number" class="form-control" id="userAge" name="userAge" value="20">
        </div>
        <div class="mb-3">
            <label for="userCountry" class="form-label">Country</label>
            <input type="text" class="form-control" id="userCountry" name="userCountry" value="Russia">
        </div>
        <div class="mb-3">
            <label for="userHobby" class="form-label">Hobby</label>
            <input type="text" class="form-control" id="userHobby" name="userHobby" value="Dota">
        </div>
        <div class="mb-3">
            <label for="aboutUser" class="form-label">About self</label>
            <input type="text" class="form-control" id="aboutUser" name="userAbout" value="Hikan">
        </div>
        <button type="submit" class="btn btn-primary">Create</button>
    </form>
@endsection
