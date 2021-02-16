@extends('layout.layout')

@section('content')
    <section class="ms-user-account">
        <div class="container">
            <div class="row">
                <div class="col-md-12 col-sm-12">
                    <div class="ms-ua-box">
                        <div class="form-group">
                            {{$author->full_name}}
                        </div>
                        <div class="form-group">
                            {{$author->date_of_birth}}
                        </div>
                        <div class="form-group">
                         Biography: {{$author->biography}}
                       </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
