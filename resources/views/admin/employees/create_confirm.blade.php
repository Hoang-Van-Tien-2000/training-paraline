@extends('admin.layout.main')
@section('title', 'Create-confirm Employee')
@section('main-content')

    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>Employee - Create Confirm</h1>
    </section>
    <!-- Main content -->
    <section class="content">
        <div class="row">
            <!-- left column -->
            <div class="col-md-8 d-flex justify-content-sm-between">
                <!-- general form elements -->
                <div class="box box-primary">
                    <!-- /.box-header -->
                    <div class="box-body">
                        <div class="row form-group">
                            <div class="col col-md-3">
                                <label for="file" class="py-4"> Avatar :</label>
                            </div>
                            <div class="col-3 col-md-3">
                                {{--                                <img src="{{asset(isset( request()->session()->get('addEmployee')['file_path']) ? request()->session()->get('addEmployee')['file_path'] : '')}}"--}}
                                {{--                                    width="150" height="150" class="card-img-top" alt="...">--}}
                                <img
                                    src="{{asset(session()->get('currentImgUrl'))}}"
                                    width="150" height="150" class="card-img-top" alt="...">

                            </div>
                        </div>
                        <div class="row  form-group">
                            <div class="col col-md-3">
                                <label for="team_id" class="py-4"> Team :</label>
                            </div>
                            <div class="col-3 col-md-3">
                                <span>
                                     @if(request()->session()->get('addEmployee')['team_id'])
                                        {{$team->name}}
                                    @endif
                                </span>
                            </div>
                        </div>
                        <div class="row form-group">
                            <div class="col col-md-3">
                                <label for="first_name" class="py-4"> First name :</label>
                            </div>
                            <div class="col-3 col-md-3">
                                    <span>
                                        {{request()->session()->get('addEmployee')['first_name']}}
                                    </span>
                            </div>
                        </div>
                        <div class="row form-group">
                            <div class="col col-md-3">
                                <label for="last_name" class="py-4"> Last name :</label>
                            </div>
                            <div class="col-3 col-md-3">
                                    <span>
                                        {{request()->session()->get('addEmployee')['last_name']}}
                                    </span>
                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="col col-md-3">
                                <label for="gender"> Gender : </label>
                            </div>
                            <div class="col-3 col-md-3">
                                @if(request()->session()->get('addEmployee')['gender'] == config('constant.GENDER_MALE'))
                                    <label for="inline-radio1" class="form-check-label pr-5">
                                        <span> Male </span>
                                    </label>
                                @elseif(request()->session()->get('addEmployee')['gender'] == config('constant.GENDER_FEMALE'))
                                    <label for="inline-radio3" class="form-check-label">
                                        <span>Female </span>
                                    </label>
                                @endif
                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="col col-md-3">
                                <label for="birthday" class="py-4"> Birthday :</label>
                            </div>
                            <div class="col-3 col-md-3">
                                <span> {{request()->session()->get('addEmployee')['birthday']}} </span>
                            </div>
                        </div>
                        <div class="row form-group">
                            <div class="col col-md-3">
                                <label for="address"> Address : </label>
                            </div>
                            <div class="col-3 col-md-3">
                                <span> {{request()->session()->get('addEmployee')['address'] }} </span>
                            </div>
                        </div>
                        <div class="row form-group">
                            <div class="col col-md-3">
                                <label for="salary" class="py-4"> Salary : </label>
                            </div>
                            <div class="col-3 col-md-3">
                                <span> {{number_format(request()->session()->get('addEmployee')['salary'],0,'đ','.')}} </span>
                            </div>
                        </div>
                        <div class="row form-group">
                            <div class="col col-md-3">
                                <label for="position"> Position </label>
                            </div>
                            <div class="col-3 col-md-3">
                                @switch(request()->session()->get('addEmployee')['position'])
                                    @case(config('constant.POSITION_MANAGER'))
                                    <span>Manager</span>
                                    @break
                                    @case(config('constant.POSITION_TEAM_LEADER'))
                                    <span> Team leader</span>
                                    @break
                                    @case(config('constant.POSITION_BSE'))
                                    <span> BSE</span>
                                    @break
                                    @case(config('constant.POSITION_DEV'))
                                    <span>DEV</span>
                                    @break
                                    @case(config('constant.POSITION_TESTER'))
                                    <span> Tester</span>
                                    @break
                                    @default
                                    @break
                                @endswitch
                            </div>
                        </div>
                        <div class="row form-group">
                            <div class="col col-md-3">
                                <label for="type_of_word"> Type of work </label>
                            </div>
                            <div class="col-3 col-md-3">
                                @switch(request()->session()->get('addEmployee')['type_of_work'])
                                    @case(config('constant.TYPE_OF_WORK_FULL_TIME'))
                                    <span>Full Time</span>
                                    @break
                                    @case(config('constant.TYPE_OF_WORK_PART_TIME'))
                                    <span> Part Time</span>
                                    @break
                                    @case(config('constant.TYPE_OF_WORK_PROBATIONARY_STAFF'))
                                    <span>  Probationary Staff</span>
                                    @break
                                    @case(config('constant.TYPE_OF_WORK_INTERN'))
                                    <span>  Intern</span>
                                    @break
                                    @default
                                    @break
                                @endswitch
                            </div>
                        </div>
                        <div class="row form-group">
                            <div class="col col-md-3">
                                <label for="status"> Status </label>
                            </div>
                            <div class="col-3 col-md-3">
                                @if(request()->session()->get('addEmployee')['status'] == config('constant.STATUS_ON_WORKING') )
                                    <label for="inline-radio1" class="form-check-label pr-5">
                                        <span>On working </span>
                                    </label>
                                @elseif(request()->session()->get('addEmployee')['status'] == config('constant.STATUS_RETIRED'))
                                    <label for="inline-radio3" class="form-check-label">
                                        <span>Retired </span>
                                    </label>

                                @endif
                            </div>
                        </div>
                        <a href="{{ route('admin.employee.add')}}" class="btn btn-light">Back</a>
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
                                        <form style="display: inline-block;"
                                              action="{{route('admin.employee.add_save')}}" method="post">
                                            {{method_field('post')}}
                                            @csrf
                                            {{--                                                <input type="hidden" class="form-control" value="{{request()->session()->get('addEmployee')}}">--}}
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


