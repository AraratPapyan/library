@extends('layout.layout')

@section('content')


    <section class="jumbotron text-center">
        <div class="row m-2  pt-4">
            <div class="col-md-3 pull-left">
                <a class="btn btn-primary pull-left" href="{{ route('books.create')}}" role="button">
                    Add Book
                </a>
            </div>
            @include('helpers.search')
        </div>

        <div class="album py-5 bg-light">
            <div class="container">
                <div class="row">
                    @foreach($books as $book)
                    <div class="col-md-4" >
                        <div class="card mb-4 box-shadow" >
                            <div class="card-body">
                                <div class="card-text mt-5">
                                    <a href="{{route('books.show', $book->id)}}">{{$book->name}}</a>
                                    <div class="row">
                                        <div class="col-sm-12">
                                            <strong> <a class="m-lg-2" href="{{route('books.edit', $book->id)}}">Edit</a> </strong>
                                            <div class="delete m-lg-5" data-id="{{$book->id}}">Delete</div>
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
                    url: "/books/" + id,
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
