@extends('admin.layout.main')''
@section('main-content')
    @include('admin.layout.header')
    <div class="main-content">
        <div class="section__content section__content--p30">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-12">
                        <div class="card">
                            <div class="card-header">Employee - Search</div>
                            <div class="card-body">
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
                                <form action="" method="GET">
                                    <div class="form-group">
                                        <div class="col col-md-3">
                                            <label for="selectSm" class=" form-control-label">Team </label>
                                        </div>
                                        <div class="col-3 col-md-3">
                                            <select name="team" id="SelectLm" class="form-control-sm form-control">
                                                <option value="">--Select--</option>
                                                @foreach($teams as $team)
                                                    <option value="{{$team->id}}">{{$team->name}}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                    <div class="form-group col-6">
                                        <label for="name">Name *</label>
                                        <input type="text" class="form-control" name="name"
                                               value=" " id="name" aria-describedby="name">
                                    </div>
                                    <div class="form-group col-6">
                                        <label for="email">Email *</label>
                                        <input type="email" class="form-control" name="email"
                                               value=" " id="email" aria-describedby="email">
                                    </div>
                                    <button type="reset" class="btn btn-light ">Reset</button>
                                    <button type="submit" class="btn btn-primary  float-right">Search</button>
                                </form>

                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <div class="card-body">
                            <div class="table-responsive table-responsive-data2">
                                <table class="table table-data2">
                                    <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th>Team</th>
                                        <th>Name</th>
                                        <th>Email</th>
                                        <th>Action</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @if(count($employees)>0)
                                        @foreach($employees as $employee)
                                            <tr class="tr-shadow">
                                                <td>
                                                    {{$employee->id}}
                                                </td>
                                                <td> {{$employee->team->name}}</td>
                                                <td>{{$employee->full_name}}</td>
                                                <td>{{$employee->email}}</td>
                                                <td>
                                                    <button class="btn btn-primary" data-toggle="tooltip" title="Edit">
                                                        Edit
                                                    </button>
                                                    <button class="btn btn-danger" data-toggle="tooltip" title="Delete">
                                                        Delete
                                                    </button>
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                            @else
                                <tr>
                                    <td colspan="5"><p style="font-size: 17px" class="text-danger text-center p-3">No
                                            results found !</p></td>
                                </tr>
                        @endif
                        <!-- END DATA TABLE -->
                            <div class="d-flex justify-content-center d-block mt-3 px-3">
                                {!! $employees->appends(request()->only(['team', 'name', 'email']))->links() !!}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
@endsection