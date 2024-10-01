@extends('layouts.app')

@section('body')
    <h1>User</h1>
    <table class="table">
        <thead>
        <tr>
            <th scope="col">#</th>
            <th scope="col">Name</th>
            <th scope="col">Age</th>
            <th scope="col">Country</th>
            <th scope="col">Hobby</th>
            <th scope="col">About</th>
        </tr>
        </thead>
        <tbody>
        <tr>
            <th scope="row">1</th>
            <td>{{ $name }}</td>
            <td>{{ $age }}</td>
            <td>{{ $country }}</td>
            <td>{{ $hobby }}</td>
            <td>{{ $about }}</td>
        </tr>
        </tbody>
    </table>
@endsection
