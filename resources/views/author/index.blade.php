@extends('layout.layout')

@section('content')
    <section class="jumbotron text-center">
        <div class="row m-2  pt-4">
            <div class="col-md-3 pull-left">
                <a class="btn btn-primary pull-left" href="{{ route('authors.create')}}" role="button">
                    Add Author
                </a>
            </div>
            @include('helpers.search')
        </div>
        <div class="album py-5 bg-light">
            <div class="container">
                <div class="row">
                    @foreach($authors as $author)
                        <div class="col-md-4" >
                            <div class="card mb-4 box-shadow" >

                                <div class="card-body">
                                    <div class="card-text mt-5">
                                        <strong><a class="m-lg-2"href="{{route('authors.show', $author->id)}}">{{$author->full_name}}</a></strong>
                                        <div class="row">
                                            <div class="col-sm-12">
                                                <a href="{{route('authors.edit', $author->id)}}">Edit</a>
                                                <div class="delete m-lg-5" data-id="{{ $author->id}}">Delete</div>
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
                    url: "/authors/" + id,
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
