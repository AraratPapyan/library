@extends('layout.layout')

@section('content')
    <section class="ms-user-account">
        <div class="container">
            <div class="row">
                <div class="col-md-12 col-sm-12">
                    <div class="ms-ua-box">
                        {!! Form::open(['route'=>['authors.update', $author->id],'method' => 'POST', 'class' => 'm-form m-form--label-align-right', "id" => "add_author"]) !!}
                        @csrf
                        @method("PUT")
                        <div class="form-group">
                            {!! Form::text("name", $author->full_name, ['class'=>'form-control', "placeholder"=>"Name"]); !!}
                            {!! $errors->first('name', '<p class="help-block">:message</p>') !!}
                        </div>
                        <div class="form-group">
                            {!! Form::date("date_of_birth", $author->date_of_birth, ['class'=>'form-control', "placeholder"=>"Date Of Birth"]); !!}
                            {!! $errors->first('date_of_birth', '<p class="help-block">:message</p>') !!}
                        </div>
                        <div class="form-group">
                            <textarea name="biography" rows="5" cols="40" class="form-control">{{$author->biography}}"</textarea>
                            {!! $errors->first('biography', '<p class="help-block">:message</p>') !!}
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
