@extends('layouts.app')

@section('body')
    <h1>Главная</h1>
    @if(auth()->user())
    <p>{{ auth()->user()->name }}</p>
    @endif
@endsection
