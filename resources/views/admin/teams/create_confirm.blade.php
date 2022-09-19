@extends('admin.layout.main')
@section('title', 'Create-confirm Team')
@section('main-content')
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            Team - Create Confirm
        </h1>
    </section>
    <!-- Main content -->
    <section class="content">
        <div class="row">
            <!-- left column -->
            <div class="col-md-10 d-flex justify-content-sm-between">
                <!-- general form elements -->
                <div class="box box-primary">
                    <!-- /.box-header -->
                    <!-- form start -->

                    <div class="box-body">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="name">Name *</label>
                                    <input name="name" type="text" value="{{Session::get('addTeam')}}"
                                           class="form-control"
                                           id="name">
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- /.box-body -->
                    <div class="box-footer ">
                        <a href="{{ url()->previous() }} " class="btn btn-default ">Back</a>
                        <button type="button"
                                class="btn btn-default __web-inspector-hide-shortcut__ btn btn-primary "
                                style="float: right; color: white;" data-toggle="modal" data-target="#modal-sm">
                            Save
                        </button>
                        <div class="modal fade" id="modal-sm">
                            <div class="modal-dialog modal-sm">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title">Confirm</h5>
                                    </div>
                                    <div class="modal-body">
                                        <p> Are you sure.</p>
                                    </div>
                                    <div class="modal-footer justify-content-between">
                                        <button type="button" class="btn btn-default" data-dismiss="modal">Cancel
                                        </button>
                                        <form style="display: inline-block;" action="{{route('admin.team.add_save')}}" method="POST">
                                            @csrf
                                            <input type="hidden" class="form-control" name="name"
                                                   value="{{Session::get('addTeam')}}"
                                                   id="name"
                                                   aria-describedby="name">
                                            <button type="submit" class="btn btn-primary">OK</button>
                                        </form>
                                    </div>
                                </div>
                                <!-- /.modal-content -->
                            </div>
                            <!-- /.modal-dialog -->
                        </div>
                        <!-- /.modal -->

                    </div>
                </div>
                <!-- /.box -->
            </div>
            <!--/.col (left) -->
        </div>
        <!-- /.row -->
    </section>
    <!-- /.content -->
@endsection


