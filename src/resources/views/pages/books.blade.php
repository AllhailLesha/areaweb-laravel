@extends('layouts.app')

@section('body')
    <div class="article__wrapper d-flex flex-wrap gap-2">
        @foreach($books as $book)
            @include('components.book', [
                'id' => $book->id,
                'title' => $book->title ?? 'Анониманя статья',
                'description' => $book->description,
                'createdAt' => $book->created_at ?? 'До рождения христа'
            ])
        @endforeach
    </div>
@endsection
