@extends('layout.layout')

@section('content')



    <section class="ms-user-account">
        <div class="container">
            <div class="row">
                <div class="col-md-12 col-sm-12">
                    <div class="ms-ua-box">
                        <div class="form-group">
                            <label>{{$library->name}}</label>
                        </div>
                        <div class="form-group">
                            <label>{{$library->director}}</label>
                        </div>
                        <div class="form-group">
                            <label>{{$library->street_address}} {{$library->city}} {{$library->country}}</label>
                        </div>

                            <label>{{$library->phone_number}}</label>
                        <div class="form-group">
                            <label>{{$library->email}}</label>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </section>
    <section class="jumbotron text-center">

        <div class="row m-2  pt-4">
            <div class="col-md-3 pull-left">
                <a class="btn btn-primary pull-left" href="{{ route('books.create',['library' => $library->id])}}" role="button">
                    Add Book
                </a>
            </div>
        </div>
        <div class="album py-5 bg-light">
            <div class="container">
                <div class="row">
                    @foreach($library->libraryBooks as $book)
                        <div class="col-md-4" >
                            <div class="card mb-4 box-shadow" >
                                <div class="card-body">
                                    <div class="card-text mt-5">
                                        <a href="{{route('books.show', $book->id)}}">{{$book->name}}</a>
                                        <div class="row">
                                            <div class="col-sm-12">
                                                    <a href="{{route('books.edit', $book->id)}}">Edit</a>
                                                    <div class="delete" data-id="{{$book->id}}">Delete</div>

                                            </div>
                                        </div>

                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>

            </div>
        </div>

    </section>

    <script>
        $(document).ready(function () {
            $(".delete").on('click', function (e) {
                e.preventDefault();
                var id = $(this).data('id');
                var token = $("meta[name='csrf-token']").attr("content");

                $.ajax({
                    url: "/library/" + {{$library->id}} + "/book/" +id,
                    type: 'DELETE',
                    data: {
                        "id": id,
                        "_token": token,
                    },
                    success: function () {
                        location.reload();
                    }
                });

            })
        })

    </script>



@endsection
