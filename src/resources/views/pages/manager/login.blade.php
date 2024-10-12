@extends('layouts.app')

@section('body')
    <h1>Manager Auth</h1>
    <form action="{{ route('manager-login.action') }}" method="post">
        @csrf

        @if(session()->has('success'))
            <div class="alert alert-success" role="alert">
                {{ session()->get('success') }}
            </div>
        @endif

        @error('auth_error')
            <div class="alert alert-danger" role="alert">
                {{ $message }}
            </div>
        @enderror
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

        <button type="submit" class="btn btn-primary">Sign in</button>
    </form>
    <a class="link-info" href="{{ route('manager-register.form') }}">Don't have an account?</a>
@endsection
