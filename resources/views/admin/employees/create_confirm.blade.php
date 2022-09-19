@extends('admin.layout.main')
@section('title', 'Create-confirm Employee')
@section('main-content')
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            Employee - Create Confirm
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
                        <div class="box-body">
                            <form action="{{route('admin.employee.add_save')}}" method="POST">
                                @csrf
                            <div class="row form-group">
                                <div class="col col-md-3">
                                    <label for="file" class="py-4"> Avatar </label>
                                </div>
                                <div class="col-3 col-md-3">
                                    <input type="hidden" name="avatar" value="{{Session::get('addEmployee')['1']}}">
                                    <img src="{{asset('storage/'.Session::get('addEmployee')['1'])}}"
                                          height="auto"  class="card-img-top" alt="...">
                                </div>
                            </div>
                                <div class="row  form-group">
                                    <div class="col col-md-3">
                                        <label for="name" class="py-4"> Team </label>
                                    </div>
                                    <div class="col-3 col-md-3">
                                        <select name="team_id" id="SelectLm"
                                                class="form-control-sm form-control">
                                            <option value="{{Session::get('addEmployee')['0']['team_id']}}">
                                                {{$team->name}}
                                            </option>
                                        </select>
                                    </div>
                                </div>
                                <div class="row form-group">
                                    <div class="col col-md-3">
                                        <label for="first_name" class="py-4"> First name </label>
                                    </div>
                                    <div class="col-3 col-md-3">
                                        <input type="text" class="form-control" name="first_name"
                                               value="{{ Session::get('addEmployee')['0']['first_name'] }}" id="first_name"
                                               aria-describedby="first_name">
                                    </div>
                                </div>
                                <div class="row form-group">
                                    <div class="col col-md-3">
                                        <label for="last_name" class="py-4"> Last name </label>
                                    </div>
                                    <div class="col-3 col-md-3">
                                        <input type="text" class="form-control" name="last_name"
                                               value=" {{ Session::get('addEmployee')['0']['last_name'] }} " id="last_name"
                                               aria-describedby="last_name">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <div class="col col-md-3">
                                        <label for="gender"> Gender </label>
                                    </div>
                                    <div class="col-3 col-md-3">
                                        @if(Session::get('addEmployee')['0']['gender'] == config('constant.GENDER_MALE'))
                                            <label for="inline-radio1" class="form-check-label pr-5">
                                                <input type="hidden" id="inline-radio1" name="gender"
                                                       value="{{Session::get('addEmployee')['0']['gender']}}"
                                                       class="form-check-input">Male
                                            </label>
                                        @elseif(Session::get('addEmployee')['0'] == config('constant.GENDER_FEMALE'))
                                            <label for="inline-radio3" class="form-check-label">
                                                <input type="hidden" id="inline-radio3" name="gender"
                                                       value="{{Session::get('addEmployee')['0']['gender']}}"
                                                       class="form-check-input">Female
                                            </label>
                                        @endif
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <div class="col col-md-3">
                                        <label for="birthday" class="py-4"> Birthday </label>
                                    </div>
                                    <div class="col-3 col-md-3">
                                        <input type="date" id="text-input"
                                               value="{{ Session::get('addEmployee')['0']['birthday'] }}" name="birthday"
                                               class="form-control">
                                    </div>
                                </div>
                                <div class="row form-group">
                                    <div class="col col-md-3">
                                        <label for="address"> Address </label>
                                    </div>
                                    <div class="col-3 col-md-3">
                                        <input type="text" id="text-input" value="{{ Session::get('addEmployee')['0']['address'] }}"
                                               name="address" class="form-control">
                                    </div>
                                </div>
                                <div class="row form-group">
                                    <div class="col col-md-3">
                                        <label for="salary" class="py-4"> Salary </label>
                                    </div>
                                    <div class="col-3 col-md-3">
                                        <input type="text" id="text-input" value="{{ Session::get('addEmployee')['0']['salary'] }}"
                                               name="salary" class="form-control">
                                    </div>
                                </div>
                                <div class="row form-group">
                                    <div class="col col-md-3">
                                        <label for="position"> Position </label>
                                    </div>
                                    <div class="col-3 col-md-3">
                                        <select name="position" id="SelectLm"
                                                class="form-control-sm form-control">
                                            <option value="{{Session::get('addEmployee')['0']['position']}}">
                                                @switch(Session::get('addEmployee')['0']['position'])
                                                    @case(config('constant.POSITION_MANAGER'))
                                                    Manager
                                                    @break
                                                    @case(config('constant.POSITION_TEAM_LEADER'))
                                                    Team leader
                                                    @break
                                                    @case(config('constant.POSITION_BSE'))
                                                    BSE
                                                    @break
                                                    @case(config('constant.POSITION_DEV'))
                                                    DEV
                                                    @break
                                                    @case(config('constant.POSITION_TESTER'))
                                                    Tester
                                                    @break
                                                    @default
                                                @endswitch
                                            </option>
                                        </select>
                                    </div>
                                </div>
                                <div class="row form-group">
                                    <div class="col col-md-3">
                                        <label for="type_of_word"> Type of work </label>
                                    </div>
                                    <div class="col-3 col-md-3">
                                        <select name="type_of_work" id="SelectLm"
                                                class="form-control-sm form-control">
                                            <option value="{{Session::get('addEmployee')['0']['type_of_work']}}">
                                                @switch(Session::get('addEmployee')['0']['type_of_work'])
                                                    @case(config('constant.TYPE_OF_WORK_FULL_TIME'))
                                                    Full Time
                                                    @break
                                                    @case(config('constant.TYPE_OF_WORK_PART_TIME'))
                                                    Part Time
                                                    @break
                                                    @case(config('constant.TYPE_OF_WORK_PROBATIONARY_STAFF'))
                                                    Probationary Staff
                                                    @break
                                                    @case(config('constant.TYPE_OF_WORK_INTERN'))
                                                    Intern
                                                    @break
                                                    @default
                                                @endswitch
                                            </option>
                                        </select>
                                    </div>
                                </div>
                                <div class="row form-group">
                                    <div class="col col-md-3">
                                        <label for="status"> Status </label>
                                    </div>
                                    <div class="col-3 col-md-3">
                                        @if(Session::get('addEmployee')['0']['status'] == config('constant.STATUS_ON_WORKING') )
                                            <label for="inline-radio1" class="form-check-label pr-5">
                                                <input type="hidden" id="inline-radio1 " name="status"
                                                       value="{{Session::get('addEmployee')['0']['status']}}" class="form-check-input"
                                                >On working
                                            </label>
                                        @elseif(Session::get('addEmployee')['0']['status'] == config('constant.STATUS_RETIRED'))
                                            <label for="inline-radio3" class="form-check-label">
                                                <input type="hidden" id="inline-radio3" name="Status"
                                                       value="{{Session::get('addEmployee')['0']['status']}}" class="form-check-input"
                                                >Retired
                                            </label>
                                        @endif
                                    </div>
                                </div>
                            <a href="{{ url()->previous() }} " class="btn btn-light">Back</a>
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
                            </form>
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


