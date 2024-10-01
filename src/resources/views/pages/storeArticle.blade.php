@extends('layouts.app')

@section('body')
    <h1>Create article</h1>
    <form action="{{ route('articles.store') }}" method="post" enctype="multipart/form-data">
        @csrf
        <div class="mb-3">
            <label for="articleTitle" class="form-label">Article Title</label>
            <input type="text" class="form-control @error('title') is-invalid @enderror" id="articleTitle" name="title" value="{{ @old('title') }}">
            @error('title')
            <div id="validationServer03Feedback" class="invalid-feedback">
                {{ $message }}
            </div>
            @enderror
        </div>
        <div class="mb-3">
            <label for="articleText" class="form-label">Article Text</label>
            <input type="text" class="form-control @error('articleText') is-invalid @enderror" id="articleText" name="articleText" value="{{ @old('articleText') }}">
            @error('articleText')
            <div id="validationServer03Feedback" class="invalid-feedback">
                {{ $message }}
            </div>
            @enderror
        </div>
        <div class="mb-3">
            <label for="articleImg" class="form-label">Image for article</label>
            <input class="form-control @error('articleImg') is-invalid @enderror" type="file" id="articleImg" name="articleImg">
            @error('articleImg')
            <div id="validationServer03Feedback" class="invalid-feedback">
                {{ $message }}
            </div>
            @enderror
        </div>
        <button type="submit" class="btn btn-primary">Create</button>
    </form>
@endsection
