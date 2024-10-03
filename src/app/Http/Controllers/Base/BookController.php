<?php

namespace App\Http\Controllers\Base;

use App\Http\Controllers\Controller;
use App\Http\Requests\Book\AddRequest;
use App\Models\Book;
use Illuminate\Http\Request;

class BookController extends Controller
{
    public  function addBook(AddRequest $request){
        if ($request->hasFile('image_url')) {
            $previewImagePath = "/storage/{$request->file('image_url')->store('images/book')}";
        }

        $book = Book::create([
            'title' => $request->input('title'),
            'description' => $request->input('description'),
            'year' => $request->input('year'),
            'author' => $request->input('author'),
            'image_url' => $previewImagePath ?? null,
            'total' => $request->input('total')
        ]);

        return redirect()->route('showBook', [
            'book' => $book->id
        ]);
    }
}
