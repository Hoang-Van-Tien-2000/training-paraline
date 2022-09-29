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
                                <label for="team" class=" form-control-label">Team </label>
                                <select name="team" id="team" class="form-control-sm form-control">
                                    <option value="">--Select--</option>
                                    @foreach($teams as $team)
                                        <option value="{{$team->id}}"
                                                @if( isset(request()->team) && $team->id == request()->team) selected @endif
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
                            <button type="submit" class="btn btn-primary" style="float: right">Search</button>
                        </form>
                        <a href="{{ route('admin.employee.search') }}" class="btn btn-default"> Reset </a>
                    </div>
                    <!-- /.box-header -->
                    <div class="box-body table-responsive no-padding">
                        <div class="dataTables_length " id="example1_length" style="margin: 10px;font-size: 14px;">
                            <a href="{{route('admin.employee.export_csv', request()->all())}}" class="btn btn-primary"
                               style="float: right"> Export CSV</a>
                            <table class="table table-hover" style="align-items: center">
                                <tr style="cursor: pointer;">
                                    <th width=4% onclick="sortByField('id')">ID <i class="fa fa-sort" aria-hidden="true"></i></th>
                                    <th width=10% onclick="sortByField('last_name')">Full name <i class="fa fa-sort" aria-hidden="true"></i></th>
                                    <th width=6% onclick="sortByField('team_id')">Team <i class="fa fa-sort" aria-hidden="true"></i></th>
                                    <th width=4%>Email</th>
                                    <th width=2%>Gender</th>
                                    <th>Birthday</th>
                                    <th>Address</th>
                                    <th>Avatar</th>
                                    <th>Salary</th>
                                    <th width=8% onclick="sortByField('position')">Position <i class="fa fa-sort" aria-hidden="true"></i>
                                    </th>
                                    <th width=12% onclick="sortByField('type_of_work')">Type_of_work <i class="fa fa-sort" aria-hidden="true" ></i></th>
                                    <th width=7% onclick="sortByField('status')">Status <i class="fa fa-sort" aria-hidden="true"></i></th>
                                    <th width=9%>Action</th>
                                </tr>
                                @if(count($employees)>0)
                                    @foreach($employees as $employee)
                                        <tr>
                                            <td>
                                                {{$employee->id}}
                                            </td>
                                            <td>{{$employee->full_name}}</td>
                                            <td> {{ !empty($employee->team) ? $employee->team->name : '' }}</td>
                                            <td>{{ $employee->email }}</td>
                                            <td>
                                                <?php $lists = [1 => 'Male', 2 => 'Female']; ?>
                                                @foreach($lists as $key => $value)
                                                    @if($employee->gender == $key) {{$value}}
                                                    @endif
                                                @endforeach
                                            </td>
                                            <td>{{$employee->birthday }}</td>
                                            <td>{{$employee->address}}</td>
                                            <td><img alt="Your image"
                                                     src="{{ asset(config('constant.APP_URL_IMAGE'). $employee->avatar) }}"
                                                     width="50px"></td>
                                            <td>{{number_format($employee->salary,0,'đ','.')}} </td>
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
                                                                              style="font-size: 17px!important;"
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
