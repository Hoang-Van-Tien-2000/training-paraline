@extends('admin.layout.main')''
@section('main-content')
    @include('admin.layout.header')
    <div class="main-content">
        <div class="section__content section__content--p30">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-12">
                        <div class="card">
                            <div class="card-header">
                                <strong>Employee - Edit </strong>
                            </div>
                            <form action="{{route('admin.employee.edit_confirm', $employee->id)}}" method="POST"
                                  enctype="multipart/form-data" class="form-horizontal">
                                @method('PUT')
                                @csrf
                                <div class="card-body card-block">
                                    <div class="row form-group image">
                                        <div class="col col-md-3">
                                            <label for="file-input-control" class=" form-control-label">Avatar
                                                * </label>
                                        </div>
                                        <div class="col col-md-3">
                                            <input type="file" class="form-control file-input-control src_img"
                                                   name="avatar"
                                                   id="file">
                                            <img id="avatar" class="thumbnail" width="150px" height="auto"
                                                 src="{{asset('storage/'.$employee->avatar)}}">
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
                                            <select name="team_id" id="SelectLm" class="form-control-sm form-control">
                                                @foreach($teams as $team)
                                                    <option {{ $team->id == $employee->team_id ? 'selected' : '' }}
                                                            value="{{  $team->id}} ">{{$team->name}}</option>
                                                @endforeach
                                                @error('team')
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
                                                   value="{{old('first_name', isset($employee) ? $employee->first_name : '' ) }}"
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
                                                   value="{{old('last_name', isset($employee) ? $employee->last_name : '' ) }}"
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
                                                <label for="inline-radio1" class="form-check-label pr-5">
                                                    <input type="radio" id="inline-radio1" name="gender"
                                                           value="{{ config('constant.GENDER_MALE')}}"
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
                                            <label for="selectSm" class=" form-control-label">Position * </label>
                                        </div>
                                        <div class="col-3 col-md-3">
                                            <select name="position" id="SelectLm" class="form-control-sm form-control">
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
                                            <label for="selectSm" class="form-control-label">Type of word * </label>
                                        </div>
                                        <div class="col-3 col-md-3">
                                            <select name="type_of_work" id="SelectLm"
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
                                                <label for="inline-radio1" class="form-check-label pr-5">
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
                                <div class="card-footer">
                                    <button type="submit" value="Confirm" class="btn btn-primary btn-sm float-right">
                                        <i class="fa fa-dot-circle-o"></i> Confirm
                                    </button>
                                    <a href="{{Session::forget('newAvatar')}}"
                                       class="btn btn-info">Reset</a>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
