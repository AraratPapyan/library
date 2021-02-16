@extends('layout.layout')

@section('content')
    <section class="ms-user-account">
        <div class="container">
            <div class="row">
                <div class="col-md-12 col-sm-12">
                    <div class="ms-ua-box">
                        {!! Form::open(['route'=>['books.update', $book->id],'method' => 'POST', 'class' => 'm-form m-form--label-align-right', "id" => "add_author"]) !!}
                        @csrf
                        @method("PUT")
                        <div class="form-group">
                            {!! Form::text("name", $book->name, ['class'=>'form-control', "placeholder"=>"Name"]); !!}
                            {!! $errors->first('name', '<p class="help-block">:message</p>') !!}
                        </div>
                        @if(!empty($author))
                            <div class="form-group">
                                {!! Form::select("author[]",  $author, $book->bookAuthor->pluck('author_id')->toArray(), ['multiple'=>'multiple', 'class'=>' form-control', 'id' => "bank-type"]); !!}
                            </div>
                        @endif
                        <div class="form-group">
                            {!! Form::text("genre", $book->genre, ['class'=>'form-control', "placeholder"=>"Genre"]); !!}
                            {!! $errors->first('genre', '<p class="help-block">:message</p>') !!}
                        </div>
                        <div class="form-group">
                            {!! Form::number("publish_year", $book->publish_year, ['class'=>'form-control', "placeholder"=>"Published Year"]); !!}
                            {!! $errors->first('genre', '<p class="help-block">:message</p>') !!}
                        </div>
                        <div class="form-group">
                            <textarea name="description" rows="5" cols="40" class="form-control">{{$book->description}}</textarea>
                            {!! $errors->first('description', '<p class="help-block">:message</p>') !!}
                        </div>
                        <div class="form-group">
                            {!! Form::text("key_word", $book->key_word, ['class'=>'form-control', "placeholder"=>"Key word"]); !!}
                            {!! $errors->first('key_word', '<p class="help-block">:message</p>') !!}
                        </div>
                        <div class="form-group">
                            <input type="submit" value="Update" class="btn btn-primary"/>
                        </div>
                        {!! Form::close() !!}
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
