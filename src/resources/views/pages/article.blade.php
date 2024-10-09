@extends('layouts.app')

@section('body')
    <div class="d-flex justify-content-between wrapper">
        <div class="card" style="width: 18rem;">
            @if(!is_null($article->preview_image))
             <img src="{{ $article->preview_image }}" class="card-img-top" alt="..." height="200">
            @endif
            <div class="card-body">
                <h4>{{ $article->title }}</h4>
                <p>{{ $article->body }}</p>
                <a href="{{ route('article.page.edit', ['article' => $article->id ]) }}" class="btn btn-primary">Редактировать</a>
                <form class="mt-2" action="{{ route('articles.delete', ['article' => $article->id]) }}" method="post">
                    @csrf
                    <button type="submit" class="btn btn-danger">Удалить</button>
                </form>
            </div>
        </div>

        <div class="d-flex flex-column gap-2 w-25">
            <h3>Add a comment</h3>
            <form action="{{ route('comment.add', ['article' => $article->id]) }}" method="post">
                @csrf
                <div class="mb-3">
                    <label for="body" class="form-label">Comment</label>
                    <input type="text" class="form-control @error('body') is-invalid @enderror" id="body" name="body">
                    @error('body')
                    <div id="validationServer03Feedback" class="invalid-feedback">
                        {{ $message }}
                    </div>
                    @enderror
                </div>
                <button type="submit" class="btn btn-primary">Submit</button>
            </form>
        </div>
    </div>

    <div class="d-flex flex-column gap-2 reviews mt-5">
        <h3>Comments</h3>
        <div class="d-flex flex-wrap gap-2">
        @foreach($article->comments as $comment)
            <div class="card" style="width: 18rem;">
                <div class="card-body">
                    <h5 class="card-title">{{ $comment->username }}</h5>
                    <p class="card-text">{{ $comment->body }}</p>
                </div>
            </div>
        @endforeach
        </div>
    </div>
@endsection
Ч
