@extends('layouts.master')
@section('content')
    <html>

    <head>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
    </head>

    <body>

        <h2>Movies</h2>

        @if ($message = Session::get('success'))
            <div class="alert alert-success">
                {{ $message }}
            </div>
        @endif

        <table class="table table-striped table-bordered">
            <thead>
                <tr>
                    <th>index</th>
                    <th>poster</th>
                    <th>name</th>
                    <th>year</th>
                    <th>plot</th>
                    <th>action</th>

                </tr>
            </thead>
            @foreach ($movies as $key => $value)
                <tr>
                    <td>{{ $value->id }}</td>
                    <td><img src="{{ asset('images/' . $value->image) }}" alt="" height=100 width=100 /></td>
                    <td>{{ $value->name }}</td>
                    <td>{{ $value->year_of_release }}</td>
                    <td>{{ $value->plot }}</td>
                    <form method="post" id="form-del" action="{{ route('movies.destroy', $value->id) }}">
                        @csrf
                        @method('DELETE')
                        <td>
                            <button class="btn btn-xs btn-danger btn-flat show_confirm" onclick="return confirm('Are you sure?')" type="submit" data_id={{ $value->id }} id="del-id">delete</button>
                            <button type="button" class="btn btn-xs btn-info info-modal" data-id={{ $value->id }}
                                data-toggle="modal" data-target="#infoModal">
                                more info
                            </button>
                            <a class="btn btn-xs btn-primary" href="{{ route('movies.edit', $value->id) }}">Edit</a>
                        </td>
                    </form>
                </tr>
            @endforeach
        </table>
        <button type="button" class="btn btn-info" onclick="window.location='{{ url('movies/create') }}'">Add
            movie</button>

        {{-- <-- Info Modal --> --}}
        <div class="modal fade" id="infoModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" style="width: 400px">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Movie info</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>

                    <div class="modal-body"></div>
                </div>
            </div>
        </div>

        <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.0/sweetalert.min.js"></script>
        <script type="text/javascript">
            $(document).on('click', '.info-modal', function() {
                let id = $(this).data('id');
                $.get('/movies/' + id, function(data) {
                    $('#infoModal .modal-body').html(data);
                });
            });
        </script>
    @endsection
