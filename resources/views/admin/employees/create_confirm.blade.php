@extends('admin.layout.main')''
@section('main-content')
    @include('admin.layout.header')
    <div class="main-content">
        <div class="section__content section__content--p30">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-12">
                        <div class="card">
                            <div class="card-header">Employee - Create Confirm</div>
                            <form action="{{route('admin.employee.add_save')}}" method="post"
                                  class="form-horizontal">
                                @csrf
                                <div class="card-body">
                                    <div class="row form-group">
                                        <div class="col col-md-3">
                                            <label for="file" class="py-4"> Avatar </label>
                                        </div>
                                        <div class="col-3 col-md-3">
                                        {{--<input type="file" class="form-control" name="avatar" value="" id="file"--}}
                                        {{--aria-describedby="file">--}}
                                        <input type="hidden" name="avatar" value="{{Session::get('avatar')}}">
                                        <img src="{{asset('storage/'.Session::get('avatar'))}}"
                                        class="card-img-top" alt="...">
                                        </div>
                                    </div>
                                    @foreach (Session::get('addEmployee') as $employee)
                                        <div class="row  form-group">
                                            <div class="col col-md-3">
                                                <label for="name" class="py-4"> Team </label>
                                            </div>
                                            <div class="col-3 col-md-3">
                                                <select name="team_id" id="SelectLm" class="form-control-sm form-control">
                                                    <option value="{{$employee['team_id']}}">
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
                                                       value="{{ $employee['first_name'] }}" id="first_name"
                                                       aria-describedby="first_name">
                                            </div>
                                        </div>
                                        <div class="row form-group">
                                            <div class="col col-md-3">
                                                <label for="last_name" class="py-4"> Last name </label>
                                            </div>
                                            <div class="col-3 col-md-3">
                                                <input type="text" class="form-control" name="last_name"
                                                       value=" {{ $employee['last_name'] }} " id="last_name"
                                                       aria-describedby="last_name">
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <div class="col col-md-3">
                                                <label for="gender"> Gender </label>
                                            </div>
                                            <div class="col-3 col-md-3">
                                                @if($employee['gender'] == config('constant.GENDER_MALE'))
                                                    <label for="inline-radio1" class="form-check-label pr-5">
                                                        <input type="radio" id="inline-radio1" name="gender"
                                                               value="{{$employee['gender']}}" checked
                                                               class="form-check-input">Male
                                                    </label>
                                                @elseif($employee['gender'] == config('constant.GENDER_FEMALE'))
                                                    <label for="inline-radio3" class="form-check-label">
                                                        <input type="radio" id="inline-radio3" name="gender"
                                                               value="{{$employee['gender']}}" checked
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
                                                       value="{{ $employee['birthday'] }}" name="birthday"
                                                       class="form-control">
                                            </div>
                                        </div>
                                        <div class="row form-group">
                                            <div class="col col-md-3">
                                                <label for="address"> Address </label>
                                            </div>
                                            <div class="col-3 col-md-3">
                                                <input type="text" id="text-input" value="{{ $employee['address'] }}"
                                                       name="address" class="form-control">
                                            </div>
                                        </div>
                                        <div class="row form-group">
                                            <div class="col col-md-3">
                                                <label for="salary" class="py-4"> Salary </label>
                                            </div>
                                            <div class="col-3 col-md-3">
                                                <input type="text" id="text-input" value="{{ $employee['salary'] }}"
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
                                                    <option value="{{$employee['position']}}">
                                                        @switch($employee['position'])
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
                                                    <option value="{{$employee['type_of_work']}}">
                                                        @switch($employee['type_of_work'])
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
                                                @if($employee['status'] == config('constant.STATUS_ON_WORKING') )
                                                    <label for="inline-radio1" class="form-check-label pr-5">
                                                        <input type="radio" id="inline-radio1 " name="status"
                                                               value="{{$employee['status']}}" class="form-check-input"
                                                               checked>On working
                                                    </label>
                                                @elseif($employee['status'] == config('constant.STATUS_RETIRED'))
                                                    <label for="inline-radio3" class="form-check-label">
                                                        <input type="radio" id="inline-radio3" name="Status"
                                                               value="{{$employee['status']}}" class="form-check-input"
                                                               checked>Retired
                                                    </label>
                                                @endif
                                            </div>
                                        </div>
                                    @endforeach
                                    <a href="{{ url()->previous() }} " class="btn btn-light">Back</a>
                                    <button type="submit" value="Save" class="btn btn-primary btn-sm float-right">
                                        Save
                                    </button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- END PAGE CONTAINER-->
@endsection