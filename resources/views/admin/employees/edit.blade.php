@extends('admin.layout.main')
@section('title', 'Edit Employee')
@section('main-content')
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            Employee - Edit
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
                    <form action="{{ route('admin.employee.edit_confirm', $employee->id) }}" method="POST"
                          enctype="multipart/form-data" class="form-horizontal">
                        @method('PUT')
                        @csrf
                        <div class="box-body">
                            <div class="row form-group image">
                                <div class="col col-md-3">
                                    <label for="file-input-control" class=" form-control-label">Avatar
                                        * </label>
                                </div>
                                <div class="col col-md-3">
                                    <img class="thumbnail" height="150" width="150" id="blah"
                                         src="{{ asset(!empty(session('currentImgUrl'))  ? session('currentImgUrl') : public_url(config('constant.APP_URL_IMAGE'). $employee->avatar)) }}"
                                         alt="your image"/>
                                    <input type="file" name="avatar" onchange="readURL(this);"
                                           value="" class="form-control file-input-control"/>

                                    @error('avatar')
                                    <small class="form-text text-danger">{!! $message !!}</small>
                                    @enderror
                                </div>
                            </div>
                            <div class="row form-group">
                                <div class="col col-md-3">
                                    <label for="Team" class=" form-control-label">Team * </label>
                                </div>
                                <div class="col-3 col-md-3">
                                    <select name="team_id" id="Team" class="form-control-sm form-control">
                                        @foreach($teams as $team)
                                            <option
                                                {{ old('team_id', isset($employee) ? $employee->team_id : '' )  == $team->id ? 'selected' : '' }}
                                                value="{{$team->id}} ">{{$team->name}}
                                            </option>
                                        @endforeach
                                        @error('team_id')
                                        <small class="form-text text-danger"> {{ $message }}</small>
                                        @enderror
                                    </select>
                                </div>
                            </div>
                            <div class="row form-group">
                                <div class="col col-md-3">
                                    <label for="text-input" class=" form-control-label">First Name * </label>
                                </div>
                                <div class="col-4 col-md-4">
                                    <input type="text" id="text-input"
                                           value="{{ old('first_name', isset($employee) ? $employee->first_name : '' ) }}"
                                           name="first_name" class="form-control">
                                    @error('first_name')
                                    <small class="form-text text-danger"> {{ $message }}</small>
                                    @enderror
                                </div>
                            </div>
                            <div class="row form-group">
                                <div class="col col-md-3">
                                    <label for="text-input" class=" form-control-label">Last Name * </label>
                                </div>
                                <div class="col-4 col-md-4">
                                    <input type="text" id="text-input"
                                           value="{{ old('last_name', isset($employee) ? $employee->last_name : '' ) }}"
                                           name="last_name" class="form-control">
                                    @error('last_name')
                                    <small class="form-text text-danger"> {{ $message }}</small>
                                    @enderror
                                </div>
                            </div>
                            <div class="row form-group">
                                <div class="col col-md-3">
                                    <label class=" form-control-label">Gender *</label>
                                </div>
                                <div class="col col-md-9">
                                    <div class="form-check-inline form-check">
                                        <label for="inline-radio1" class="form-check-label"
                                               style="padding-right: 5rem;">
                                            <input type="radio" id="inline-radio1" name="gender"
                                                   value="{{ config('constant.GENDER_MALE') }}"
                                                   class="form-check-input"
                                                {{ old('gender', isset($employee) ? $employee->gender : '' )  == config('constant.GENDER_MALE') ? 'checked' : '' }}>Male
                                        </label>
                                        <label for="inline-radio3" class="form-check-label">
                                            <input type="radio" id="inline-radio3" name="gender"
                                                   value="{{config('constant.GENDER_FEMALE')}}"
                                                   class="form-check-input"
                                                {{ old('gender', isset($employee) ? $employee->gender : '' )  == config('constant.GENDER_FEMALE') ? 'checked' : '' }}
                                            >Female
                                        </label>
                                    </div>
                                    @error('gender')
                                    <small class="form-text text-danger"> {{ $message }}</small>
                                    @enderror
                                </div>
                            </div>

                            <div class="row form-group">
                                <div class="col col-md-3">
                                    <label for="text-input" class=" form-control-label">Birthday * </label>
                                </div>
                                <div class="col-4 col-md-4">
                                    <input type="date" id="text-input"
                                           value="{{ old('birthday', isset($employee) ? $employee->birthday : '' ) }}"
                                           name="birthday" class="form-control">
                                    @error('birthday')
                                    <small class="form-text text-danger"> {{ $message }}</small>
                                    @enderror
                                </div>
                            </div>
                            <div class="row form-group">
                                <div class="col col-md-3">
                                    <label for="text-input" class=" form-control-label">Address * </label>
                                </div>
                                <div class="col-4 col-md-4">
                                    <input type="text" id="text-input" name="address" class="form-control"
                                           value="{{ old('address', isset($employee) ? $employee->address : '' )}}">
                                    @error('address')
                                    <small class="form-text text-danger"> {{ $message }}</small>
                                    @enderror
                                </div>
                            </div>
                            <div class="row form-group">
                                <div class="col col-md-3">
                                    <label for="text-input" class=" form-control-label">Salary * </label>
                                </div>
                                <div class="col-4 col-md-4">
                                    <input type="text" id="text-input" name="salary" class="form-control"
                                           value="{{ old('salary', isset($employee) ? $employee->salary : '' )}}">
                                    @error('salary')
                                    <small class="form-text text-danger"> {{ $message }}</small>
                                    @enderror
                                </div>
                            </div>
                            <div class="row form-group">
                                <div class="col col-md-3">
                                    <label for="position" class=" form-control-label">Position * </label>
                                </div>
                                <div class="col-3 col-md-3">
                                    <select name="position" id="position" class="form-control-sm form-control">
                                        <option value="{{config('constant.POSITION_MANAGER') }}"
                                            {{ old('position', isset($employee) ? $employee->position : '' ) == config('constant.POSITION_MANAGER') ? 'selected' : '' }}>
                                            Manager
                                        </option>
                                        <option value="{{ config('constant.POSITION_TEAM_LEADER') }}"
                                            {{  old('position', isset($employee) ? $employee->position : '' ) == config('constant.POSITION_TEAM_LEADER') ? 'selected' : '' }}>
                                            Team leader
                                        </option>
                                        <option value="{{ config('constant.POSITION_BSE') }}"
                                            {{  old('position', isset($employee) ? $employee->position : '' ) == config('constant.POSITION_BSE') ? 'selected' : '' }}
                                        >BSE
                                        </option>
                                        <option value="{{  config('constant.POSITION_DEV') }}"
                                            {{  old('position', isset($employee) ? $employee->position : '' ) == config('constant.POSITION_DEV') ? 'selected' : '' }}
                                        >DEV
                                        </option>
                                        <option value="{{ config('constant.POSITION_TESTER') }}"
                                            {{  old('position', isset($employee) ? $employee->position : '' ) == config('constant.POSITION_TESTER') ? 'selected' : '' }}
                                        >Tester
                                        </option>
                                    </select>
                                    @error('position')
                                    <small class="form-text text-danger"> {{ $message }}</small>
                                    @enderror
                                </div>
                            </div>
                            <div class="row form-group">
                                <div class="col col-md-3">
                                    <label for="type_of_work" class="form-control-label">Type of word * </label>
                                </div>
                                <div class="col-3 col-md-3">
                                    <select name="type_of_work" id="type_of_work"
                                            class="form-control-sm form-control">
                                        <option value="{{ config('constant.TYPE_OF_WORK_FULL_TIME') }}"
                                            {{ old('type_of_work', isset($employee) ? $employee->type_of_work : '' ) == config('constant.TYPE_OF_WORK_FULL_TIME') ? 'selected' : '' }}
                                        >Full Time
                                        </option>
                                        <option value="{{config('constant.TYPE_OF_WORK_PART_TIME') }}"
                                            {{ old('type_of_work', isset($employee) ? $employee->type_of_work : '' ) == config('constant.TYPE_OF_WORK_PART_TIME') ? 'selected' : '' }}
                                        >Part
                                            Time
                                        </option>
                                        <option value="{{ config('constant.TYPE_OF_WORK_PROBATIONARY_STAFF') }}"
                                            {{ old('type_of_work', isset($employee) ? $employee->type_of_work : '' ) == config('constant.TYPE_OF_WORK_PROBATIONARY_STAFF') ? 'selected' : '' }}
                                        >Probationary Staff
                                        </option>
                                        <option value="{{config('constant.TYPE_OF_WORK_INTERN') }}"
                                            {{ old('type_of_work', isset($employee) ? $employee->type_of_work : '' ) == config('constant.TYPE_OF_WORK_INTERN') ? 'selected' : '' }}
                                        >Intern
                                        </option>
                                    </select>
                                    @error('type_of_word')
                                    <small class="form-text text-danger"> {{ $message }}</small>
                                    @enderror
                                </div>
                            </div>
                            <div class="row form-group">
                                <div class="col col-md-3">
                                    <label class=" form-control-label">Status *</label>
                                </div>
                                <div class="col col-md-9">
                                    <div class="form-check-inline form-check">
                                        <label for="inline-radio1" class="form-check-label "
                                               style="padding-right: 5rem;">
                                            <input type="radio" id="inline-radio1 " name="status"
                                                   value="{{ config('constant.STATUS_ON_WORKING') }}"
                                                   class="form-check-input"
                                                {{ old('status', isset($employee) ? $employee->status : '' )  == config('constant.STATUS_ON_WORKING') ? 'checked' : '' }}
                                            >On working
                                        </label>
                                        <label for="inline-radio3" class="form-check-label">
                                            <input type="radio" id="inline-radio3" name="status"
                                                   value="{{config('constant.STATUS_RETIRED') }}"
                                                   class="form-check-input"
                                                {{  old('status', isset($employee) ? $employee->status : '' ) == config('constant.STATUS_RETIRED') ? 'checked' : '' }}
                                            >Retired
                                        </label>
                                    </div>
                                    @error('status')
                                    <small class="form-text text-danger"> {{ $message }}</small>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        <div class="card-footer" style="padding: 10px;">
                            <a href="{{route('admin.employee.reset_add_edit')}}" class="btn btn-default ">Reset</a>
                            <button type="submit" class="btn btn-primary btn-sm " style="float: right;">Confirm</button>
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


