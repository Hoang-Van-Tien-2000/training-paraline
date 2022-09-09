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
                                <div class="row form-group">
                                    <div class="col col-md-3">
                                        <label for="name" class="py-4"> Avatar </label>
                                    </div>
                                    <div class="col-3 col-md-3">
                                        <input type="file" class="form-control" name="Avatar" value=" " id="file"
                                               aria-describedby="file">
                                    </div>
                                </div>
                                <div class="row  form-group">
                                    <div class="col col-md-3">
                                        <label for="name" class="py-4"> Team </label>
                                    </div>
                                    <div class="col-3 col-md-3">
                                        <select nam="Team" id="SelectLm" class="form-control-sm form-control">
                                            <option value="">1</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="row form-group">
                                    <div class="col col-md-3">
                                        <label for="FirstName" class="py-4"> First name </label>
                                    </div>
                                    <div class="col-3 col-md-3">
                                        <input type="text" class="form-control" name="FirstName"
                                            value="{{ session('addEmployee')['FirstName'] }}" id="FirstName"
                                            aria-describedby="FirstName">
                                    </div>
                                </div>
                                <div class="row form-group">
                                    <div class="col col-md-3">
                                        <label for="name" class="py-4"> Last name </label>
                                    </div>
                                    <div class="col-3 col-md-3">
                                        <input type="text" class="form-control" name="LastName"
                                            value="{{ session('addEmployee')['LastName'] }}" id="LastName"
                                            aria-describedby="LastName">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <div class="col col-md-3">
                                        <label for="name"> Gender </label>
                                    </div>
                                    <div class="col-3 col-md-3">
                                        @if(session('addEmployee')['Gender'] == 1)
                                            Male
                                        @elseif(session('addEmployee')['Gender'] == 2)
                                            Female
                                        @endif
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <div class="col col-md-3">
                                        <label for="name" class="py-4"> Birthday </label>
                                    </div>
                                    <div class="col-3 col-md-3">
                                        <input type="date" id="text-input"
                                            value="{{session('addEmployee')['Birthday']}}" name="Birthday"
                                            class="form-control">
                                    </div>
                                </div>
                                <div class="row form-group">
                                    <div class="col col-md-3">
                                        <label for="name"> Address </label>
                                    </div>
                                    <div class="col-3 col-md-3">
                                        <input type="text" id="text-input" value="{{session('addEmployee')['Address']}}"
                                            name="Address" class="form-control">
                                    </div>
                                </div>
                                <div class="row form-group">
                                    <div class="col col-md-3">
                                        <label for="name" class="py-4"> Salary </label>
                                    </div>
                                    <div class="col-3 col-md-3">
                                        <input type="text" id="text-input" value="{{session('addEmployee')['Salary']}}"
                                            name="Salary" class="form-control">
                                    </div>
                                </div>
                                <div class="row form-group">
                                    <div class="col col-md-3">
                                        <label for="name"> Position </label>
                                    </div>
                                    <div class="col-3 col-md-3">
                                        <select name="Position" id="SelectLm" class="form-control-sm form-control">
                                            <option value="{{session('addEmployee')['Position']}}">
                                                @switch(session('addEmployee')['Position'])
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
                                        <label for="name"> Type of work </label>
                                    </div>
                                    <div class="col-3 col-md-3">
                                        <select name="TypeOfWord" id="SelectLm" class="form-control-sm form-control">
                                            <option value="{{session('addEmployee')['TypeOfWord']}}">
                                                @switch(session('addEmployee')['TypeOfWord'])
                                                    @case(1)
                                                    Fulltime
                                                    @break
                                                    @case(2)
                                                    Partime
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
                                        <label for="name"> Status </label>
                                    </div>
                                    <div class="col-3 col-md-3">
                                        @if(session('addEmployee')['Status'] == 0)
                                            On working
                                        @elseif(session('addEmployee')['Status'] == 1)
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
                        <input type="hidden" class="form-control" name="name" value="{{Session::get('addEmployee')}}" id="name"
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