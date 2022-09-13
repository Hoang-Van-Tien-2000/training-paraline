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
                            <div class="card-body">
                                @foreach (Session::get('addEmployee') as $employee)
                                <div class="row form-group">
                                    <div class="col col-md-3">
                                        <label for="file" class="py-4"> Avatar </label>
                                    </div>
                                    <div class="col-3 col-md-3">
                                        <input type="file" class="form-control" name="avatar" value="" id="file"
                                               aria-describedby="file">
                                    </div>
                                </div>
                                <div class="row  form-group">
                                    <div class="col col-md-3">
                                        <label for="name" class="py-4"> Team </label>
                                    </div>
                                    <div class="col-3 col-md-3">
                                        <select name="team" id="SelectLm" class="form-control-sm form-control">
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
                                        @if($employee['gender'] == 1)
                                            Male
                                        @elseif($employee['gender'] == 2)
                                            Female
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
                                        <select name="position" id="SelectLm" class="form-control-sm form-control">
                                            <option value="{{$employee['position']}}">
                                                @switch($employee['position'])
                                                    @case(1)
                                                    Manager
                                                    @break
                                                    @case(2)
                                                    Team leader
                                                    @break
                                                    @case(3)
                                                    BSE
                                                    @break
                                                    @case(4)
                                                    DEV
                                                    @break
                                                    @case(5)
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
                                        <select name="type_of_word" id="SelectLm" class="form-control-sm form-control">
                                            <option value="{{$employee['type_of_word']}}">
                                                @switch($employee['type_of_word'])
                                                    @case(1)
                                                    Full time
                                                    @break
                                                    @case(2)
                                                    Part time
                                                    @break
                                                    @case(3)
                                                    Probationary Staff
                                                    @break
                                                    @case(4)
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
                                        @if($employee['status'] == 0)
                                            On working
                                        @elseif($employee['status'] == 1)
                                            Retired
                                        @endif
                                    </div>
                                </div>
                                <a href="{{ url()->previous() }} " class="btn btn-light">Back</a>
                                <button type="button" class="btn btn-primary float-right mb-1" data-toggle="modal"
                                        data-target="#staticModal">
                                    Save
                                </button>
                            </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- modal static -->
    <div class="modal fade" id="staticModal" tabindex="-1" role="dialog" aria-labelledby="staticModalLabel"
         aria-hidden="true"
         data-backdrop="static">
        <div class="modal-dialog modal-sm" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="staticModalLabel">Confirm</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <p>
                        Are you sure.
                    </p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                    <form action=" {{ route('admin.team.add_save')}}" method="POST">
                        @csrf
                        <input type="hidden" class="form-control" name="name" value="{{Session::get('addEmployee')}}"
                               id="name"
                               aria-describedby="name">
                        <button type="submit" class="btn btn-primary"> OK</button>
                    </form>

                </div>
            </div>
        </div>
    </div>
    <!-- end modal static -->

    </div>
    <!-- END PAGE CONTAINER-->

@endsection