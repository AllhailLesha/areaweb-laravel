<?php

namespace App\Http\Controllers\Base;

use App\Http\Controllers\Controller;
use App\Http\Requests\Book\AddRequest;
use App\Http\Requests\Book\UpdateRequest;
use App\Models\Book;
use Illuminate\Http\Request;

class BookController extends Controller
{
    public  function addBook(AddRequest $request){
        $book = Book::create([
            'title' => $request->input('title'),
            'description' => $request->input('description'),
            'year' => $request->input('year'),
            'author' => $request->input('author'),
            'image_url' => $this->getFilePath($request),
            'total' => $request->input('total')
        ]);

        return redirect()->route('showBook', [
            'book' => $book->id
        ]);
    }

    public function update(UpdateRequest $request, Book $book) {
        $book->update([
            'title' => $request->input('title'),
            'description' => $request->input('description'),
            'year' => $request->input('year'),
            'author' => $request->input('author'),
            'image_url' => $this->getFilePath($request, $book->image_url),
            'total' => $request->input('total'),
        ]);

        return redirect()->route('showBook', [
            'book' => $book->id
        ]);
    }

    private function getFilePath(Request $request, ?string $default = null): ?string
    {
        $previewImagePath = $default;
        if ($request->hasFile('image_url')) {
            $previewImagePath = "/storage/{$request->file('image_url')->store('images/book')}";
        }
        return $previewImagePath;
    }}
