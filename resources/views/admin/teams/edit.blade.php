@extends('admin.layout.main')''
@section('main-content')
    @include('admin.layout.header')
    <div class="main-content">
        <div class="section__content section__content--p30">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-12">
                        <div class="card">
                            <div class="card-header"><Strong><a
                                            href="{{route('admin.team.search')}}">Search </a></Strong> > Team - Edit
                            </div>
                            <div class="card-body">
                                @if (session('status'))
                                    <div class="alert alert-success" role="alert">
                                        {{ session('status') }}
                                    </div>
                                @endif
                                <form action="{{route('admin.team.edit_confirm', $team->id)}}" method="post">
                                    @csrf
                                    <input type="hidden" value="{{$team->id}}" name="id">
                                    <div class="form-group">
                                        <label for="name">Name *</label>
                                        <input type="text" class="form-control" name="name"
                                            value="{{Session::get('editTeam') ? Session('editTeam') : $team->name  }} "
                                            id="name" aria-describedby="name">
                                        @error('name')
                                        <small class="form-text text-danger"> {{ $message }}</small>
                                        @enderror
                                    </div>
                                    <button type="submit" class="btn btn-primary  float-right">Confirm</button>
                                </form>
                                <a href="" class="btn btn-light">Reset</a>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection