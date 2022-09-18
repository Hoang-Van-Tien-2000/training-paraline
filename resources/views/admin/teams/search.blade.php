@extends('Admin.layout.main')
@section('title', 'List Team')
@section('main-content')
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            Team - Search
        </h1>
    </section>
    <!-- Main content -->
    <section class="content">
        @if (session('message'))
            <div class="alert alert-success" role="alert">
                {{ session('message') }}
            </div>
        @endif
        @if (session('error'))
            <div class="alert alert-danger" role="alert">
                {{ session('error') }}
            </div>
        @endif
        <div class="row">
            <div class="col-xs-12">
                <div class="box">
                    <div class="box-header ">
                        <form action="">
                            <div class="form-group">
                                <label for="keyword">Name </label>
                                <input type="text" class="form-control" name="keyword"
                                       value="" id="keyword">
                            </div>
                            <input type="reset" value="Reset" class="btn btn-light">
                            <input type="submit" name="btn-search " value="Search"
                                   class="btn btn-primary" style="float:right">
                        </form>
                    </div>
                    <!-- /.box-header -->
                    <div class="box-body table-responsive no-padding">
                        <div class="dataTables_length " id="example1_length" style="margin: 10px;font-size: 17px;">
                            <table class="table table-hover" style="align-items: center">
                                <tr>
                                    <th>ID</th>
                                    <th>Name</th>
                                    <th>Action</th>
                                </tr>
                                @if(count($teams)>0)
                                    @foreach($teams as $team)
                                        <tr>
                                            <td>
                                                {{$team ->id}}
                                            </td>
                                            <td> {{$team ->name}}</td>
                                            <td>
                                                <a href="{{ route('admin.team.edit',$team->id) }}"
                                                   class="btn btn-primary"><i class="fa fa-edit"
                                                                              style="font-style:17px!important;"
                                                                              aria-hidden="true"></i> Edit</a>
                                                <a href="javascript:void(0)" title="Xóa"
                                                   class="confirmDelete btn btn-danger" record="team"
                                                   recordid="{{$team->id}}">
                                                    <i class="fa fa-trash"> </i> Delete
                                                </a>
                                            </td>
                                        </tr>
                                    @endforeach
                                @else
                                    <td colspan="3"><p style="font-size: 17px;" class="text-danger text-center p-3">No
                                            results found !</p></td>
                                @endif
                            </table>
                        </div>
                        <div class="text-center " style="margin-bottom: 10px!important;">
                            {!! $teams->appends(request()->only('keyword'))->links() !!}
                        </div>
                    </div>
                    <!-- /.box-body -->

                </div>
                <!-- /.box -->
            </div>
        </div>
    </section>
    <!-- /.content -->
@endsection
