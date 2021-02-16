@extends('layout.layout')

@section('content')


    <section class="ms-user-account">
        <div class="container">
            <div class="row">
                <div class="col-md-12 col-sm-12">
                    <div class="ms-ua-box">

                        {!! Form::open(['route'=>['libraries.store'],'method' => 'POST', 'class' => 'm-form m-form--label-align-right', "id" => "add_author"]) !!}
                        <div class="form-group">
                            {!! Form::text("name", null, ['class'=>'form-control', "placeholder"=>"Library Name"]); !!}
                            {!! $errors->first('name', '<p class="help-block">:message</p>') !!}
                        </div>
                        <div class="form-group">
                            {!! Form::text("director", null, ['class'=>'form-control', "placeholder"=>"Director Full Name"]); !!}
                            {!! $errors->first('director', '<p class="help-block">:message</p>') !!}
                        </div>
                        <div class="form-group">
                            {!! Form::text("street_address", null, ['class'=>'form-control', "placeholder"=>"Street Address"]); !!}
                            {!! $errors->first('street_address', '<p class="help-block">:message</p>') !!}
                        </div>
                        <div class="form-group">
                            {!! Form::text("city", null, ['class'=>'form-control', "placeholder"=>"City"]); !!}
                            {!! $errors->first('city', '<p class="help-block">:message</p>') !!}
                        </div>
                        <div class="form-group">
                            {!! Form::text("country", null, ['class'=>'form-control', "placeholder"=>"Country"]); !!}
                            {!! $errors->first('country', '<p class="help-block">:message</p>') !!}
                        </div>

                        <div class="form-group">
                            {!! Form::text("phone_number", null, ['class'=>'form-control', "placeholder"=>"Phone Number"]); !!}
                            {!! $errors->first('phone_number', '<p class="help-block">:message</p>') !!}
                        </div>

                        <div class="form-group">
                            {!! Form::text("email", null, ['class'=>'form-control', "placeholder"=>"E-mail Address"]); !!}
                            {!! $errors->first('email', '<p class="help-block">:message</p>') !!}
                        </div>
                        @if(!empty($book))
                            <div class="form-group">
                                {!! Form::select("book[]",  $book, null, ['multiple'=>'multiple', 'class'=>' form-control']); !!}
                            </div>
                        @endif
                        <div class="form-group">
                            <input type="submit" value="Add" class="btn btn-primary"/>
                        </div>
                        {!! Form::close() !!}
                    </div>
                </div>
            </div>
        </div>
    </section>



@endsection
