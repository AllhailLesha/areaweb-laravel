@extends('layouts.app')

@section('body')
    <div class="card" style="width: 18rem;">
        @if(!is_null($article->preview_image))
         <img src="{{ $article->preview_image }}" class="card-img-top" alt="..." height="200">
        @endif
        <div class="card-body">
            <h4>{{ $article->title }}</h4>
            <p>{{ $article->body }}</p>
            <a href="{{ route('article.page.edit', ['article' => $article->id ]) }}" class="btn btn-primary">Редактировать</a>
        </div>
    </div>
@endsection
