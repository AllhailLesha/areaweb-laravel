@extends('layouts.app')

@section('body')
    <h1>Create User</h1>
    <form action="{{ route('user.get') }}" method="post" enctype="multipart/form-data">
        @csrf
        <div class="mb-3">
            <label for="userName" class="form-label">Name</label>
            <input type="text" class="form-control @error('userName') is-invalid @enderror" id="userName" name="userName" value="{{ @old('userName') }}">
            @error('userName')
            <div id="validationServer03Feedback" class="invalid-feedback">
                {{ $message }}
            </div>
            @enderror
        </div>
        <div class="mb-3">
            <label for="userAge" class="form-label">Age</label>
            <input type="number" class="form-control @error('userAge') is-invalid @enderror" id="userAge" name="userAge" value="{{ @old('userAge') }}">
            @error('userAge')
            <div id="validationServer03Feedback" class="invalid-feedback">
                {{ $message }}
            </div>
            @enderror
        </div>
        <div class="mb-3">
            <label for="userCountry" class="form-label">Country</label>
            <input type="text" class="form-control @error('userCountry') is-invalid @enderror" id="userCountry" name="userCountry" value="{{ @old('userCountry') }}">
            @error('userCountry')
            <div id="validationServer03Feedback" class="invalid-feedback">
                {{ $message }}
            </div>
            @enderror
        </div>
        <div class="mb-3">
            <label for="userHobby" class="form-label">Hobby</label>
            <input type="text" class="form-control @error('userHobby') is-invalid @enderror" id="userHobby" name="userHobby" value="{{ @old('userHobby') }}">
            @error('userHobby')
            <div id="validationServer03Feedback" class="invalid-feedback">
                {{ $message }}
            </div>
            @enderror
        </div>
        <div class="mb-3">
            <label for="userAbout" class="form-label">About self</label>
            <input type="text" class="form-control @error('userAbout') is-invalid @enderror" id="userAbout" name="userAbout" value="{{ @old('userAbout') }}">
            @error('userAbout')
            <div id="validationServer03Feedback" class="invalid-feedback">
                {{ $message }}
            </div>
            @enderror
        </div>
        <div class="mb-3">
            <label for="userAvatar" class="form-label">Avatar</label>
            <input type="file" class="form-control @error('userAvatar') is-invalid @enderror" id="userAvatar" name="userAvatar">
            @error('userAvatar')
            <div id="validationServer03Feedback" class="invalid-feedback">
                {{ $message }}
            </div>
            @enderror
        </div>
        <div class="mb-3">
            <label for="userResume" class="form-label">Resume</label>
            <input type="file" class="form-control @error('userResume') is-invalid @enderror" id="userResume" name="userResume">
            @error('userResume')
            <div id="validationServer03Feedback" class="invalid-feedback">
                {{ $message }}
            </div>
            @enderror
        </div>
        <button type="submit" class="btn btn-primary">Create</button>
    </form>
@endsection
