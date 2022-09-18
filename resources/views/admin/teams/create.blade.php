@extends('admin.layout.main')
@section('title', 'Create Team')
@section('main-content')
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            Team - Create
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
                    <form role="form" method="post" action="{{route('admin.team.add_confirm')}}">
                        @csrf
                        <div class="box-body">
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="name">Name *</label>
                                        <input name="name" type="text" value="{{old('name')}}" class="form-control"
                                               id="name">
                                        @error('name')
                                        <small class="form-text text-danger"> {{ $message }}</small>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- /.box-body -->
                        <div class="box-footer ">
                            <a href="{{Session::forget('addTeam')}}" class="btn btn-default ">Reset</a>
                            <button type="submit" class="btn btn-primary " style="float: right">Confirm</button>
                        </div>
                    </form>
                </div>
                <!-- /.box -->
            </div>
            <!--/.col (left) -->
        </div>
        <!-- /.row -->
    </section>
    <!-- /.content -->
@endsection


