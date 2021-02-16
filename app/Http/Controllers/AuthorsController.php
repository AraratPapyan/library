<?php

namespace App\Http\Controllers;

use App\Author;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;


class AuthorsController extends Controller
{
    public function index(Request $request)
    {
        if (!empty($request->term)) {
            $term = strtolower($request->term);
            $authors = Author::whereRaw("LOWER(full_name) LIKE '%{$term}%'" )->paginate(20);
        } else {
            $authors = Author::paginate(20);
        }

        return view('author.index',compact('authors'));
    }

    public function create()
    {
        return view('author.create');
    }

    public function store(Request $request)
    {
        $author = $request->except("_token");

        $validate =new Author();
        $validator =Validator::make($author,
            $validate->rules
        );
        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator);
        }
        Author::create($author);

        return redirect()->route('authors.index');
    }

    public function edit($id)
    {
        $author = Author::whereId($id)->first();
        return view('author.edit', compact('author'));
    }

    public function update(Request $request, $id)
    {
        $author = $request->except("_token", '_method');
        $validate =new Author();
        $validator =Validator::make($author,
            $validate->rules
        );
        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator);
        }
        Book::whereId($id)->update($author);

        return redirect()->route('authors.index');
    }
    public function show($id)
    {
        $author = Author::whereId($id)->first();
        return view('author.show', compact('author'));
    }

    public function destroy($id)
    {
        try {
            Author::where('id', $id)->delete();
        } catch (\Exception $e) {
            return response()->json(['status' => 'error', 'msg' => $e->getMessage()]);
        }

        return response()->json(['status' => 'success']);
    }
}
