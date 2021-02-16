@extends('layout.layout')

@section('content')

    <section class="ms-user-account">
        <div class="container">
            <div class="row">
                <div class="col-md-12 col-sm-12">
                    <div class="ms-ua-box">
                        <div class="form-group">
                            <label>{{$book->name}}</label>
                        </div>
                        <div class="form-group">
                            @foreach($book->bookAuthors as $author)
                            <label>Author(s) : {{$author->full_name}}</label>
                            @endforeach
                        </div>
                        <div class="form-group">
                            <label>{{$book->genre}}</label>
                        </div>
                        <div class="form-group">
                            <label>{{$book->publish_year}}</label>
                        </div>
                        <div class="form-group">
                            <label>{{$book->key_word}}</label>
                        </div>
                        <div class="form-group">
                            <label>{{$book->description}}</label>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

@endsection
