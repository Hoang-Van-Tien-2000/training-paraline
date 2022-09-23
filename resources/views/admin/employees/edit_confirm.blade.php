@extends('admin.layout.main')
@section('title', 'Edit-confirm Employee')
@section('main-content')
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            Employee - Edit Confirm
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
                    <form action="{{route('admin.employee.edit_save', request()->id)}}" method="post"
                          class="form-horizontal">
                        @csrf
                        <div class="box-body">
                            <div class="row form-group">
                                <div class="col col-md-3">
                                    <label for="file" class="py-4"> Avatar </label>
                                </div>
                                <div class="col-3 col-md-3">
                                    <input type="hidden" name="avatar"
                                           value="{{request()->session()->get('editEmployee')['file_name']}}">
                                    <img width="150" height="150"
                                         src="{{public_url(config('constant.APP_URL_IMAGE'). request()->session()->get('editEmployee')['file_name'])}}"
                                         class="card-img-top img-thumbnail" alt="...">
                                </div>
                            </div>
                            <div class="row  form-group">
                                <div class="col col-md-3">
                                    <label for="name" class="py-4"> Team </label>
                                </div>
                                <div class="col-3 col-md-3">
                                    @if(request()->session()->get('editEmployee')['team_id'])
                                        {{$team->name}}
                                    @endif
                                </div>
                            </div>
                            <div class="row form-group">
                                <div class="col col-md-3">
                                    <label for="first_name" class="py-4"> First name </label>
                                </div>
                                <div class="col-3 col-md-3">
                                     <span>
                                        {{request()->session()->get('editEmployee')['first_name']}}
                                    </span>
                                </div>
                            </div>
                            <div class="row form-group">
                                <div class="col col-md-3">
                                    <label for="last_name" class="py-4"> Last name </label>
                                </div>
                                <div class="col-3 col-md-3">
                                      <span>
                                        {{request()->session()->get('editEmployee')['last_name']}}
                                    </span>
                                </div>
                            </div>
                            <div class="form-group row">
                                <div class="col col-md-3">
                                    <label for="gender"> Gender </label>
                                </div>
                                <div class="col-3 col-md-3">
                                    @if(request()->session()->get('editEmployee')['gender'] == config('constant.GENDER_MALE'))
                                        <label for="inline-radio1" class="form-check-label pr-5">
                                            <span> Male </span>
                                        </label>
                                    @elseif(request()->session()->get('editEmployee')['gender'] == config('constant.GENDER_FEMALE'))
                                        <label for="inline-radio3" class="form-check-label">
                                            <span>Female </span>
                                        </label>
                                    @endif
                                </div>
                            </div>
                            <div class="form-group row">
                                <div class="col col-md-3">
                                    <label for="birthday" class="py-4"> Birthday </label>
                                </div>
                                <div class="col-3 col-md-3">
                                    <span> {{request()->session()->get('editEmployee')['birthday']}} </span>
                                </div>
                            </div>
                            <div class="row form-group">
                                <div class="col col-md-3">
                                    <label for="address"> Address </label>
                                </div>
                                <div class="col-3 col-md-3">
                                    <span> <span> {{request()->session()->get('editEmployee')['address']}} </span> </span>
                                </div>
                            </div>
                            <div class="row form-group">
                                <div class="col col-md-3">
                                    <label for="salary" class="py-4"> Salary </label>
                                </div>
                                <div class="col-3 col-md-3">
                                    <span> {{number_format(request()->session()->get('editEmployee')['salary'],0,'đ','.')}} </span>
                                </div>
                            </div>
                            <div class="row form-group">
                                <div class="col col-md-3">
                                    <label for="position"> Position </label>
                                </div>
                                <div class="col-3 col-md-3">
                                    @switch(request()->session()->get('editEmployee')['position'])
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
                                    @switch(request()->session()->get('editEmployee')['type_of_work'])
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
                                    @if(request()->session()->get('editEmployee')['status'] == config('constant.STATUS_ON_WORKING') )
                                        <label for="inline-radio1" class="form-check-label pr-5">
                                            <span>On working </span>
                                        </label>
                                    @elseif(request()->session()->get('editEmployee')['status'] == config('constant.STATUS_RETIRED'))
                                        <label for="inline-radio3" class="form-check-label">
                                            <span>Retired </span>
                                        </label>
                                    @endif
                                </div>
                            </div>
                            <a href="{{ route('admin.employee.edit' , request()->id)}}" class="btn btn-light">Back</a>
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
                                            <button type="submit" class="btn btn-primary">OK</button>
                                        </div>
                                    </div>
                                    <!-- /.modal-content -->
                                </div>
                                <!-- /.modal-dialog -->
                            </div>
                            <!-- /.modal -->
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


