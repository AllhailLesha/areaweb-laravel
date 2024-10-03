@extends('layouts.app')

@section('body')
    <div class="article__wrapper d-flex flex-wrap gap-2">
        @foreach($articles as $article)
            @include('components.article', [
                'id' => $article->id,
                'title' => $article->title ?? 'Анониманя статья',
                'text' => $article->body,
                'createdAt' => $article->created_at
            ])
        @endforeach
    </div>
@endsection
