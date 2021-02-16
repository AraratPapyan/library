<?php

namespace App\Http\Controllers;

use App\AuthorBook;
use App\Book;
use App\LibraryBook;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Author;

class BooksController extends Controller
{
    public function index(Request $request)
    {
        if (!empty($request->term)) {
            $term = strtolower($request->term);
            $books = Book::whereRaw("LOWER(name) LIKE '%{$term}%'" )->paginate(20);
        } else {
            $books = Book::paginate(20);
        }

        return view('book.index',compact('books'));
    }

    public function create()
    {
        $author = Author::pluck('full_name', 'id')->toArray();
        return view('book.create', compact('author'));
    }
    public function store(Request $request)
    {
        $book = $request->except("_token", "author");

        $validate =new Book();
        $validator =Validator::make($book,
            $validate->rules
        );
        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator);
        }
        $book = Book::create($book);
        if(!empty($request->author)){
            foreach($request->author as $author){
                AuthorBook::firstOrCreate([
                    'book_id'=>$book->id,
                    'author_id'=>$author,
                ]);
            }
        }

        if(!empty($request->library)){
            LibraryBook::firstOrCreate([
                'book_id'=>$book->id,
                'library_id'=>$request->library,
            ]);
        }
        return redirect()->route('books.index');
    }

    public function edit($id)
    {
        $book = Book::whereId($id)->first();
        $author = Author::pluck('full_name', 'id')->toArray();
        return view('book.edit', compact('book', 'author'));
    }
    public function update(Request $request, $id)
    {
        $book = $request->except("_token", '_method', 'author');
        $validate =new Book();
        $validator =Validator::make($book,
            $validate->rules
        );
        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator);
        }
        Book::whereId($id)->update($book);

        if(!empty($request->author)){
            foreach($request->author as $author){
                AuthorBook::firstOrCreate([
                    'book_id'=>$id,
                    'author_id'=>$author,
                ]);
            }
        }
        return redirect()->route('book.index');
    }
    public function show($id)
    {
        $book = Book::whereId($id)->first();
        return view('book.show', compact('book'));
    }
    public function destroy($id)
    {
        try {
            Book::where('id', $id)->delete();
        } catch (\Exception $e) {
            return response()->json(['status' => 'error', 'msg' => $e->getMessage()]);
        }

        return response()->json(['status' => 'success']);
    }
}
