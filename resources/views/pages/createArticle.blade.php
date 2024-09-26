@extends('layouts.app')

@section('body')
    <h1>Create article</h1>
    <form action="{{ route('articles.create') }}" method="post">
        @csrf
        <div class="mb-3">
            <label for="articleTitle" class="form-label">Article Title</label>
            <input type="text" class="form-control" id="articleTitle" name="title" value="Novostь">
        </div>
        <div class="mb-3">
            <label for="articleText" class="form-label">Article Text</label>
            <input type="text" class="form-control" id="articleText" name="text" value="Text novosty">
        </div>
        <button type="submit" class="btn btn-primary">Create</button>
    </form>
@endsection
