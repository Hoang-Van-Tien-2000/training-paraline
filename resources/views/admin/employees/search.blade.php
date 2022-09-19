@extends('Admin.layout.main')
@section('title', 'List Employee')
@section('main-content')
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            Employee - Search
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
                        <form action="" method="GET">
                            <div class="form-group">
                                <label for="selectSm" class=" form-control-label">Team </label>
                                <select name="team" id="SelectLm" class="form-control-sm form-control">
                                    <option value="">--Select--</option>
                                    @foreach($teams as $team)
                                        <option value="{{$team->id}}">{{$team->name}}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="name">Name *</label>
                                <input type="text" class="form-control" name="name"
                                       value="{{request()->name}}" id="name" aria-describedby="name">
                            </div>
                            <div class="form-group">
                                <label for="email">Email </label>
                                <input type="text" class="form-control" name="email"
                                       value="{{request()->email}}" id="email" aria-describedby="email">
                            </div>
                            <button type="reset" class="btn btn-light ">Reset</button>
                            <button type="submit" class="btn btn-primary" style="float: right">Search</button>
                        </form>
                    </div>
                    <!-- /.box-header -->
                    <div class="box-body table-responsive no-padding">
                        <div class="dataTables_length " id="example1_length" style="margin: 10px;font-size: 17px;">
                            <a href="{{route('admin.employee.export_csv')}}" style="float: right;" class="btn btn-primary"> Export CSV</a>
                            <table class="table table-hover" style="align-items: center">
                                <tr>
                                    <th>ID</th>
                                    <th>Team</th>
                                    <th>Name</th>
                                    <th>Email</th>
                                    <th>Action</th>
                                </tr>
                                @if(count($employees)>0)
                                    @foreach($employees as $employee)
                                        <tr>
                                            <td>
                                                {{$employee->id}}
                                            </td>
                                            <td> {{$employee->team->name}}</td>
                                            <td>{{$employee->full_name}}</td>
                                            <td>{{$employee->email}}</td>
                                            <td>
                                                <a href="{{ route('admin.employee.edit',$employee->id) }}"
                                                   class="btn btn-primary"><i class="fa fa-edit"
                                                                              style="font-style: 17px!important;"
                                                                              aria-hidden="true"></i> Edit</a>
                                                <a href="javascript:void(0)" title="Xóa"
                                                   class="confirmDelete btn btn-danger" record="employee"
                                                   recordid="{{$employee->id}}">
                                                    <i class="fa fa-trash"> </i> Delete
                                                </a>
                                            </td>
                                        </tr>
                                    @endforeach
                                @else
                                    <td colspan="5"><p style="font-size: 17px;" class="text-danger text-center p-3">No
                                            results found !</p></td>
                                @endif
                            </table>
                        </div>
                        <div class="text-center " style="margin-bottom: 10px!important;">
                            {!! $employees->appends(request()->input())->links() !!}
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
