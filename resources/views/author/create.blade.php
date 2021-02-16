@extends('layout.layout')

@section('content')
    <section class="ms-user-account">
        <div class="container">
            <div class="row">
                <div class="col-md-12 col-sm-12">
                    <div class="ms-ua-box">

                        {!! Form::open(['route'=>['authors.store'],'method' => 'POST', 'class' => 'm-form m-form--label-align-right', "id" => "add_author"]) !!}
                        <div class="form-group">
                            {!! Form::text("name", null, ['class'=>'form-control', "placeholder"=>"Name"]); !!}
                            {!! $errors->first('name', '<p class="help-block">:message</p>') !!}
                        </div>
                        <div class="form-check-label"><label>Date Of Birth</label></div>
                        <div class="form-group">
                            {!! Form::date("date_of_birth", null, ['class'=>'form-control', "placeholder"=>"Date Of Birth"]); !!}
                            {!! $errors->first('date_of_birth', '<p class="help-block">:message</p>') !!}
                        </div>
                        <div class="form-group">
                            <textarea name="biography" rows="5" cols="40" class="form-control"></textarea>
                            {!! $errors->first('biography', '<p class="help-block">:message</p>') !!}
                        </div>
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
