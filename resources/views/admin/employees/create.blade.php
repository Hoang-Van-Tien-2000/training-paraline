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
                                <strong>Employee - Create </strong>
                            </div>
                            <form  action="{{route('admin.employee.add_confirm')}}" method="POST"
                                  enctype="multipart/form-data" class="form-horizontal">
                                @csrf
                                <div class="card-body card-block">
                                    <div class="row form-group">
                                        <div class="col col-md-3">
                                            <label for="file-input-control" class=" form-control-label">Avatar * </label>
                                        </div>
                                        <div class="col col-md-3">
                                            <input type="file" class="form-control file-input-control" name="avatar" id="file">
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
                                                    <option value=" {{$team->id}} ">{{$team->name}}</option>
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
                                            <input type="text" id="text-input" name="first_name" class="form-control">
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
                                            <input type="text" id="text-input" name="last_name" class="form-control">
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
                                                           value="1" class="form-check-input">Male
                                                </label>
                                                <label for="inline-radio3" class="form-check-label">
                                                    <input type="radio" id="inline-radio3" name="gender"
                                                           value="2" class="form-check-input">Female
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
                                            <input type="date" id="text-input" name="birthday" class="form-control">
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
                                            <input type="text" id="text-input" name="address" class="form-control">
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
                                            <input type="text" id="text-input" name="salary" class="form-control">
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
                                                <option value="1">Manager</option>
                                                <option value="2">Team leader</option>
                                                <option value="3">BSE</option>
                                                <option value="4">DEV</option>
                                                <option value="5">Tester</option>
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
                                            <select name="type_of_word" id="SelectLm"
                                                    class="form-control-sm form-control">
                                                <option value="1">Fulltime</option>
                                                <option value="2">Partime</option>
                                                <option value="3">Probationary Staff</option>
                                                <option value="4">Intern</option>
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
                                                           value="0" class="form-check-input">On working
                                                </label>
                                                <label for="inline-radio3" class="form-check-label">
                                                    <input type="radio" id="inline-radio3" name="Status"
                                                           value="1" class="form-check-input">Retired
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
                                    <a href="{{Session::forget('addEmployee')}}" class="btn btn-info">Reset</a>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>
    </div>
@endsection
