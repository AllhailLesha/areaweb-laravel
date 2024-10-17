@extends('layouts.app')

@section('body')
    <h1>Update {{ $article->title }}</h1>
    <form action="{{ route('articles.update', ['article' => $article->id]) }}" method="post" enctype="multipart/form-data">
        @csrf
        <div class="mb-3">
            <label for="articleTitle" class="form-label">Article Title</label>
            <input type="text" class="form-control @error('title') is-invalid @enderror" id="articleTitle" name="title" value="{{ @old('title', $article->title) }}">
            @error('title')
            <div id="validationServer03Feedback" class="invalid-feedback">
                {{ $message }}
            </div>
            @enderror
        </div>
        <div class="mb-3">
            <label for="body" class="form-label">Article Text</label>
            <input type="text" class="form-control @error('body') is-invalid @enderror" id="body" name="body" value="{{ @old('body', $article->body) }}">
            @error('body')
            <div id="validationServer03Feedback" class="invalid-feedback">
                {{ $message }}
            </div>
            @enderror
        </div>
        <div class="mb-3">
            @if(isset($article->preview_image))
                <img class="d-block mb-2" src="{{ $article->preview_image }}" alt="" height="150" width="200">
            @else
                <p class="card-text">Изображение для статьи не установлено</p>
            @endif
            <label for="preview_image" class="form-label">Image for article</label>
            <input class="form-control @error('preview_image') is-invalid @enderror" type="file" id="preview_image" name="preview_image">
            @error('preview_image')
            <div id="validationServer03Feedback" class="invalid-feedback">
                {{ $message }}
            </div>
            @enderror
        </div>
        <button type="submit" class="btn btn-primary">Update</button>
    </form>
@endsection
