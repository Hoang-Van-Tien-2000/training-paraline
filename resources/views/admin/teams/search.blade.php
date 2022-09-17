@extends('admin.layout.main')''
@section('main-content')
    @include('admin.layout.header')
    <div class="main-content">
        <div class="section__content section__content--p30">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-12">
                        <div class="card">
                            <div class="card-header">Team - Search</div>
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
                                <form action="">
                                    <div class="form-group">
                                        <label for="keyword">Name </label>
                                        <input type="text" class="form-control" name="keyword"
                                               value="" id="keyword">
                                    </div>
                                    <input type="reset" value="Reset" class="btn btn-light">
                                    <input type="submit" name="btn-search " value="Search"
                                           class="btn btn-primary float-right">
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
                                        <th>Name</th>
                                        <th>Action</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @if(count($teams)>0)
                                        @foreach($teams as $team)
                                            <tr class="tr-shadow">
                                                <td>
                                                    {{$team ->id}}
                                                </td>
                                                <td> {{$team ->name}}</td>
                                                <td>
                                                    <a href="{{route('admin.team.edit', $team ->id)}}"
                                                       class="btn btn-primary" data-toggle="tooltip" title="Edit">Edit
                                                    </a>
                                                    <form class="d-inline-block"
                                                          onsubmit="return confirm('Bạn có chắc chắn muốn xóa')"
                                                          action="{{route('admin.team.delete', $team->id)}}"
                                                          method="GET">
                                                        <input type="submit" value="Delete" class="btn btn-danger">
                                                    </form>
                                                </td>
                                            </tr>
                                            <div>

                                            </div>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                            @else
                                <tr>
                                    <td colspan="3"><p style="font-size: 17px" class="text-danger text-center p-3">No
                                            results found !</p></td>
                                </tr>
                            @endif
                        </div>
                        <div class="d-flex justify-content-center d-block mt-3 px-3">
                            {!! $teams->appends(request()->only('keyword'))->links() !!}
                        </div>
                        <!-- END DATA TABLE -->
                    </div>
                </div>
            </div>

        </div>
    </div>
@endsection