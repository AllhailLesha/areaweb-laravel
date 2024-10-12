@extends('layouts.app')

@section('body')
    <h1>Create Manager Account</h1>
    <form action="{{ route('manager-register.action') }}" method="post">
        @csrf
        <div class="mb-3">
            <label for="lastname" class="form-label">Lastname</label>
            <input type="text" class="form-control @error('lastname') is-invalid @enderror" id="lastname" name="lastname" value="{{ @old('lastname') }}">
            @error('lastname')
            <div id="validationServer03Feedback" class="invalid-feedback">
                {{ $message }}
            </div>
            @enderror
        </div>
        <div class="mb-3">
            <label for="firstname" class="form-label">Firstname</label>
            <input type="text" class="form-control @error('firstname') is-invalid @enderror" id="firstname" name="firstname" value="{{ @old('firstname') }}">
            @error('firstname')
            <div id="validationServer03Feedback" class="invalid-feedback">
                {{ $message }}
            </div>
            @enderror
        </div>
        <div class="mb-3">
            <label for="surname" class="form-label">Surname</label>
            <input type="text" class="form-control @error('surname') is-invalid @enderror" id="surname" name="surname" value="{{ @old('surname') }}">
            @error('surname')
            <div id="validationServer03Feedback" class="invalid-feedback">
                {{ $message }}
            </div>
            @enderror
        </div>
        <div class="mb-3">
            <label for="phone" class="form-label">Phone</label>
            <input type="tel" class="form-control @error('phone') is-invalid @enderror" id="phone" name="phone" value="{{ @old('phone') }}">
            @error('phone')
            <div id="validationServer03Feedback" class="invalid-feedback">
                {{ $message }}
            </div>
            @enderror
        </div>
        <div class="mb-3">
            <label for="password" class="form-label">Password</label>
            <input class="form-control @error('password') is-invalid @enderror" type="password" id="password" name="password">
            @error('password')
            <div id="validationServer03Feedback" class="invalid-feedback">
                {{ $message }}
            </div>
            @enderror
        </div>

        <div class="mb-3">
            <label for="password_confirmation" class="form-label">Password confirmation</label>
            <input class="form-control @error('password_confirmation') is-invalid @enderror" type="password" id="password_confirmation" name="password_confirmation">
        </div>

        <div class="mb-3">
            <div class="mb-3 form-check">
                <input type="checkbox" class="form-check-input" id="is_active" name="is_active" checked>
                <label class="form-check-label" for="is_active">Активировать в системе</label>
            </div>
        </div>
        <button type="submit" class="btn btn-primary">Create account</button>
    </form>
    <a class="link-info" href="{{ route('manager-login.form') }}">Do you have account?</a>
@endsection
