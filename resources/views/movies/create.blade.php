@extends('layouts.master')

@section('content')

    <head>
        <title>Bootstrap Example</title>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
    </head>

    @if ($message = Session::get('success'))
        <div class="alert alert-success">
            {{ $message }}
        </div>
    @endif

    <h2>Add Movie</h2>
    <button type="button" class="btn btn-info" onclick="window.location='{{ url('movies') }}'">Listing Page</button>
    <form method="POST" action="/movies" enctype="multipart/form-data">
        {{ csrf_field() }}
        <div class="form-group">
            <label for="name">Name:</label>
            <input type="text" class="form-control" id="name" name="name" required>
        </div>

        <div class="form-group">
            <label for="year-of-release">Year of release:</label>
            <input type="date" class="form-control" id="year_of_release" name="year_of_release" required>
        </div>

        <div class="form-group">
            <label for="plot">Plot:</label>
            <input type="text" class="form-control" id="plot" name="plot" required>
        </div>

        <div class="form-group">
            <label for="image">Image:</label>
            <input type="file" class="form-control" id="image" name="image" required>
        </div>

        <div class="form-group">
            <button type="button" class="btn btn-info btn-lg" data-toggle="modal" data-target="#addProducerModal">Add a new
                producer</button>
            <button type="button" class="btn btn-info btn-lg" data-toggle="modal" data-target="#addActorModal">Add a new
                actor</button>
        </div>

        <div class="form-group" id="producer_list_wrapper">
            <label for="producersDropdown"><b>Producers</b></label>
            <div class="form-group" id="producer_list_wrapper">
                <select class="form-control" id="producer_list" name="producer_list" required>
                    <div class="form-group" id="options-list">
                    </div>
                </select>
            </div>
        </div>

        <div class="form-group" id="actor_list_wrapper">
            <table class="table table-bordered" id="dynamic_field">
                <tr>
                    <label for="actorsDropdown"><b>Actors</b></label>
                    <div class="form-group" id="actor_list_wrapper">
                        <td><select class="form-control actor_list" id="actor_list" name="actor_list[]" required>
                                <div class="form-group" id="options-list">
                                </div>
                            </select>
                        </td>
                        <td><button type="button" name="add" id="add" class="btn btn-success">Add More</button>
                        </td>
                    </div>
                </tr>
            </table>
        </div>

        <div class="form-group">
            <button style="cursor:pointer" type="submit" class="btn btn-primary">Submit</button>
        </div>

    </form>

    <!-- Trigger the modal for Add Actor with a button -->
    <form method="post" action="/actors">
        {{ csrf_field() }}
        <div class="modal fade" id="addActorModal" role="dialog">
            <div class="modal-dialog">

                <!-- Modal content-->
                <div class="modal-content">
                    <div class="alert alert-danger" style="display:none"></div>
                    <div class="modal-header">

                        <h3 class="modal-title">Add Actor</h3>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <div class="row">
                            <div class="form-group col-md-6">
                                <label for="Name">Name:</label>
                                <input type="text" class="form-control" name="name" id="name" required>
                            </div>
                        </div>
                        <div class="row">
                            <div class="form-group col-md-6">
                                <label for="Date Of Birth">Date Of Birth:</label>
                                <input type="date" class="form-control" name="dob" id="dob" required>
                            </div>
                        </div>
                        <div class="row">
                            <div class="form-group col-md-6">
                                <label for="Sex">Sex:</label>
                                <select class="form-control" name="sex" id="sex" required>
                                    <option value="male">Male</option>
                                    <option value="female">Female</option>
                                </select>
                            </div>
                        </div>
                        <div class="row">
                            <div class="form-group col-md-6">
                                <label for="Bio">Bio:</label>
                                <input type="text" class="form-control" name="bio" id="bio" required>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button class="btn btn-success" id="ajaxSubmit">Save changes</button>
                    </div>

                </div>

            </div>

        </div>
    </form>

    <!-- Trigger the modal for Add Producer with a button -->
    <form method="post" action="/producers">
        {{ csrf_field() }}
        <div class="modal fade" id="addProducerModal" role="dialog">
            <div class="modal-dialog">

                <!-- Modal content-->
                <div class="modal-content">
                    <div class="alert alert-danger" style="display:none"></div>
                    <div class="modal-header">

                        <h3 class="modal-title">Add Producer</h3>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <div class="row">
                            <div class="form-group col-md-6">
                                <label for="Name">Name:</label>
                                <input type="text" class="form-control" name="name" id="name" required>
                            </div>
                        </div>
                        <div class="row">
                            <div class="form-group col-md-6">
                                <label for="Date Of Birth">Date Of Birth:</label>
                                <input type="date" class="form-control" name="dob" id="dob" required>
                            </div>
                        </div>
                        <div class="row">
                            <div class="form-group col-md-6">
                                <label for="Sex">Sex:</label>
                                <select class="form-control" name="sex" id="sex" required>
                                    <option value="male">Male</option>
                                    <option value="female">Female</option>
                                </select>
                            </div>
                        </div>
                        <div class="row">
                            <div class="form-group col-md-6">
                                <label for="Bio">Bio:</label>
                                <input type="text" class="form-control" name="bio" id="bio" required>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button class="btn btn-success" id="ajaxSubmit">Save changes</button>
                    </div>
                </div>

            </div>
        </div>
    </form>


    <script>
        var selectedActors = [];
        var actorList = {};
        var producerList = {};
        var i = 0;

        $(document).on('click', '#mediumButton', function(event) {
            event.preventDefault();
            let href = $(this).attr('data-attr');
            $.ajax({
                url: href,
                beforeSend: function() {
                    $('#loader').show();
                },
                // return the result
                success: function(result) {
                    $('#mediumModal').modal("show");
                    $('#mediumBody').html(result).show();
                },
                complete: function() {
                    $('#loader').hide();
                },
                error: function(jqXHR, testStatus, error) {
                    console.log(error);
                    alert("Page " + href + " cannot open. Error:" + error);
                    $('#loader').hide();
                },
                timeout: 8000
            })
        });


        var ajax1 = $(document).ready(function() {
            $.ajax({
                type: "GET",
                url: "/actors",
                data: "{}",
                success: function(data) {
                    var data = data.actors;
                    var s = '<option value="">Please Select an Actor</option>';
                    for (var i = 0; i < data.length; i++) {
                        s += '<option value="' + data[i].id + '">' + data[i].name + '</option>';
                    }
                    $('#actor_list').html(s);
                    actorList = s;
                    console.log(actorList)
                }
            });
            $.ajax({
                type: "GET",
                url: "/producers",
                data: "{}",
                success: function(data) {
                    var data = data.producers;
                    var s = '<option value="">Please Select a Producer</option>';
                    for (var i = 0; i < data.length; i++) {
                        s += '<option value="' + data[i].id + '">' + data[i].name + '</option>';
                    }
                    $('#producer_list').html(s);
                    producerList = s;
                }
            });
        });

        $(document).ready(function() {
            var i = 1;
            $('#add').click(function() {
                i++;
                $('#dynamic_field').append('<tr id="row' + i +
                    '" class="dynamic-added"><td><select name="actor_list[]" class="form-control name_list" required id="name-two">' +
                    actorList + '</select></td><td><button type="button" name="remove" id="' + i +
                    '" class="btn btn-danger btn_remove">X</button></td></tr>');
            });

            $('.actor_list').on('change', function() {
                var self = this;
                console.log(this.value)
                console.log(actorList)
            });

            $(document).on('click', '.btn_remove', function() {
                var button_id = $(this).attr("id");
                $('#row' + button_id + '').remove();
            });
        });
    </script>
@endsection
