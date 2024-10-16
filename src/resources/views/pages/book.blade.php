@extends('layouts.app')

@section('body')
    <div class="card" style="width: 18rem;">
        @if(!is_null($book->image_url))
         <img src="{{ $book->image_url }}" class="card-img-top" alt="...">
        @endif
        <div class="card-body">
            <h5 class="card-title">{{ $book->title }}</h5>
            <p class="card-text">{{ $book->description }}</p>
            <p class="card-text"><small class="text-body-secondary">{{ $book->created_at }}</small></p>
            <a href="{{ route('book.page.edit', ['book' => $book->id]) }}" class="btn btn-primary">edit</a>
        </div>
    </div>
@endsection
