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
                            <input id="sort_field" type="hidden" name="sort_field" class="form-control">
                            <input id="sort_type" type="hidden" name="sort_type" class="form-control">
                            <div class="form-group">
                                <label for="selectSm" class=" form-control-label">Team </label>
                                <select name="team" id="SelectLm" class="form-control-sm form-control">
                                    <option value="">--Select--</option>
                                    @foreach($teams as $team)
                                        <option value="{{$team->id}}"
                                                @if( isset(request()->id) && $team->team_id == request()->id) selected @endif
                                        >{{$team->name}}</option>
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
                            <a href="{{route('admin.employee.export_csv')}}" class="btn btn-primary"
                               style="float: right"> Export CSV</a>
                            <table class="table table-hover" style="align-items: center">
                                <tr>
                                    <th width=4%>ID <i onclick="sortByField('id')" class="fa fa-sort" aria-hidden="true"
                                                       style="cursor: pointer;"></i></th>
                                    <th width=9%>Full name <i onclick="sortByField('id')" class="fa fa-sort"
                                                              aria-hidden="true" style="cursor: pointer;"></i></th>
                                    <th>Team <i onclick="sortByField('id')" class="fa fa-sort" aria-hidden="true"
                                                style="cursor: pointer;"></i></th>
                                    <th width=5%>Email</th>
                                    <th>Gender</th>
                                    <th>Birthday</th>
                                    <th>Address</th>
                                    <th>Avatar</th>
                                    <th>Salary</th>
                                    <th width=8%>Position <i onclick="sortByField('id')" class="fa fa-sort"
                                                             aria-hidden="true" style="cursor: pointer;"></i></th>
                                    <th  width=11%>Type_of_work <i onclick="sortByField('id')" class="fa fa-sort"
                                                        aria-hidden="true" style="cursor: pointer;"></i></th>
                                    <th width=7%>Status <i onclick="sortByField('id')" class="fa fa-sort"
                                                           aria-hidden="true" style="cursor: pointer;"></i></th>
                                    <th>Action</th>
                                </tr>
                                @if(count($employees)>0)
                                    @foreach($employees as $employee)
                                        <tr>
                                            <td>
                                                {{$employee->id}}
                                            </td>
                                            <td> {{!empty($employee->team) ? $employee->team->name : ''}}</td>
                                            <td>{{$employee->full_name}}</td>
                                            <td>{{$employee->email}}</td>
                                            <td>
                                                <?php $lists = [1 => 'Male', 2 => 'Female']; ?>
                                                @foreach($lists as $key => $value)
                                                    @if($employee->gender == $key) {{$value}}
                                                    @endif
                                                @endforeach
                                            </td>
                                            <td>{{$employee->birthday}}</td>
                                            <td>{{$employee->address}}</td>
                                            <td><img src="{{asset('/storage/'.$employee->avatar) }} "
                                                     width="50px"></td>
                                            <td>{{$employee->salary}}</td>
                                            <td>
                                                <?php $lists = [1 => 'Manager', 2 => 'Team Leader', 3 => 'BSE', 4 => 'Dev', 5 => 'Tester']; ?>
                                                @foreach($lists as $key => $value)
                                                    @if($employee->position == $key) {{$value}}
                                                    @endif
                                                @endforeach
                                            </td>
                                            <td>
                                                <?php $lists = [1 => 'Full Time', 2 => 'Part Time', 3 => 'Probationary Staff', 4 => 'Intern']; ?>
                                                @foreach($lists as $key => $value)
                                                    @if($employee->type_of_work == $key) {{$value}}
                                                    @endif
                                                @endforeach
                                            </td>
                                            <td>
                                                <?php $lists = [0 => 'On Working', 1 => 'Retired']; ?>
                                                @foreach($lists as $key => $value)
                                                    @if($employee->status == $key) {{$value}}
                                                    @endif
                                                @endforeach
                                            </td>
                                            <td>
                                                <a href="{{ route('admin.employee.edit',$employee->id) }}"
                                                   class="btn btn-primary"><i class="fa fa-edit"
                                                                              style="font-style: 17px!important;"
                                                                              aria-hidden="true"></i></a>
                                                <a href="javascript:void(0)" title="Xóa"
                                                   class="confirmDelete btn btn-danger" record="employee"
                                                   recordid="{{$employee->id}}">
                                                    <i class="fa fa-trash"> </i>
                                                </a>
                                            </td>
                                        </tr>
                                    @endforeach
                                @else
                                    <td colspan="13"><p style="font-size: 17px;" class="text-danger text-center p-3">No
                                            results found !</p></td>
                                @endif
                            </table>
                        </div>
                        <div class="text-center " style="margin-bottom: 10px!important;">
                            {{ $employees->appends(request()->input())->links() }}
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
