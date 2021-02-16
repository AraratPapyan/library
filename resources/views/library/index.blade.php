@extends('layout.layout')

@section('content')


    <section class="jumbotron text-center">

        <div class="row m-2  pt-4">
            <div class="col-md-3 pull-left">
                <a class="btn btn-primary pull-left" href="{{ route('libraries.create')}}" role="button">
                    Add Library
                </a>
            </div>
            @include('helpers.search')
        </div>

        <div class="album py-5 bg-light">
            <div class="container">
                <div class="row">
                    @foreach($libraries as $library)
                        <div class="col-md-4">
                            <div class="card mb-4 box-shadow">

                                <div class="card-body">
                                    <div class="card-text mt-5">
                                        <strong><a class="m-lg-2"
                                                   href="{{route('libraries.show', $library->id)}}">{{$library->name}}</a></strong>
                                        <div class="row">
                                            <div class="col-sm-12">
                                                <a href="{{route('libraries.edit', $library->id)}}">Edit</a>
                                                <div class="delete m-lg-2" data-id="{{ $library->id}}">Delete</div>
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
                    url: "/libraries/" + id,
                    type: 'DELETE',
                    data: {
                        "id": id,
                        "_token": token,
                    },
                    success: function () {
                        location.reload();
                        console.log("it Works");
                    }
                });

            })
        })

    </script>

@endsection
