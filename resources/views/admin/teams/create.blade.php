@extends('admin.layout.main')''
@section('main-content')
    @include('admin.layout.header')
    <div class="main-content">
        <div class="section__content section__content--p30">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-12">
                        <div class="card">
                            <div class="card-header">Team - Create</div>
                            <div class="card-body">
                                <form action="{{route('admin.team.add_confirm')}}" method="post">
                                    @csrf
                                    <div class="form-group">
                                        <label for="name">Name *</label>
                                        <input type="text" class="form-control" name="name"
                                               value="{{old('name')}}" id="name" aria-describedby="name">
                                        @error('name')
                                        <small class="form-text text-danger"> {{ $message }}</small>
                                        @enderror
                                    </div>
                                    <button type="submit" class="btn btn-primary  float-right">Confirm</button>
                                </form>
                                <a href="{{Session::forget('addTeam')}}" class="btn btn-light">Reset</a>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection