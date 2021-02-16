<?php

namespace App\Http\Controllers;

use App\Book;
use App\Library;
use App\LibraryBook;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;

class LibrariesController extends Controller
{
    public function index(Request $request)
    {
        if (!empty($request->term)) {
            $term = strtolower($request->term);
            $libraries = Library::whereRaw("LOWER(name) LIKE '%{$term}%'" )->paginate(20);
        } else {
            $libraries = Library::paginate(20);
        }
        return view('library.index',compact('libraries'));
    }

    public function create()
    {
        $book = Book::pluck('name', 'id')->toArray();
        return view('library.create', compact('book'));
    }
    public function store(Request $request)
    {
        $library = $request->except("_token", "book");
        $validate =new Library();
        $validator =Validator::make($library,
            $validate->rules
        );
        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator);
        }
        $library = Library::create($library);

        if(!empty($request->book)){
            foreach($request->book as $book){
                LibraryBook::firstOrCreate([
                    'book_id'=>$book,
                    'library_id'=>$library->id,
                ]);
            }
        }
        return redirect()->route('libraries.index');
    }

    public function edit($id)
    {
        $library = Library::whereId($id)->first();
        $book = Book::pluck('name', 'id')->toArray();
        return view('library.edit', compact('library', 'book'));

    }
    public function update(Request $request, $id)
    {
        $library = $request->except("_token", '_method', 'book');
        $validate =new Library();
        $validator =Validator::make($library,
            $validate->rules
        );
        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator);
        }
        Library::whereId($id)->update($library);

        if(!empty($request->book)){
            foreach($request->book as $book){
                LibraryBook::firstOrCreate([
                    'book_id'=>$book,
                    'library_id'=>$id,
                ]);
            }
        }
        return redirect()->route('libraries.index');
    }
    public function show($id)
    {
        $library = Library::whereId($id)->first();
        return view('library.show', compact('library'));
    }
    public function destroy($id)
    {
        try {
            Library::where('id', $id)->delete();
        } catch (\Exception $e) {
            return response()->json(['status' => 'error', 'msg' => $e->getMessage()]);
        }

        return response()->json(['status' => 'success']);
    }


    public function destroy_book($id, $book_id)
    {
        try {
            LibraryBook::where('library_id', $id)->where('book_id', $book_id)->delete();
        } catch (\Exception $e) {
            return response()->json(['status' => 'error', 'msg' => $e->getMessage()]);
        }

        return response()->json(['status' => 'success']);

    }
}
