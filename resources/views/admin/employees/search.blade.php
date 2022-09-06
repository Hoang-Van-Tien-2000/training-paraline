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
                      @if (session('status'))
                         <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                      </div>
                      @endif
                      <form action="{{route('admin.team.add_confirm')}}" method="post">
                         @csrf
                         <div class="form-group">
                          <div class="col col-md-3">
                               <label for="selectSm" class=" form-control-label">Team  </label>
                          </div>
                          <div class="col-3 col-md-3">
                             <select name="selectSm" id="SelectLm" class="form-control-sm form-control">
                                   <option value="0">Web Team</option>
                             </select>
                          </div>
                       </div>
                         <div class="form-group col-6">
                         <label for="name">Name *</label>
                         <input type="text" class="form-control" name="name" value="{{ request()->name }} " id="name" aria-describedby="name">
                         @error('name')
                         <small class="form-text text-danger"> {{ $message }}</small>
                         @enderror
                         </div>
                         <div class="form-group col-6">
                          <label for="email">Email *</label>
                          <input type="email" class="form-control" name="email" value="{{ request()->name }} " id="email" aria-describedby="email">
                          @error('email')
                          <small class="form-text text-danger"> {{ $message }}</small>
                          @enderror
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
                        @if (session('status'))
                           <div class="alert alert-success" role="alert">
                              {{ session('status') }}
                        </div>
                        @endif
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
                                  <tr class="tr-shadow">
                                      <td>
                                          1
                                      </td>
                                      <td> Web Team </td>
                                      <td>Lori Lynch</td>
                                      <td>NguyenVana@gmail.com</td>
                                      <td>
                                          <button class="btn btn-primary" data-toggle="tooltip" title="Edit">Edit 
                                          </button>
                                          <button class="btn btn-danger" data-toggle="tooltip" title="Delete">
                                          Delete
                                          </button>
                                      </td>
                                  </tr>
                              </tbody>
                          </table>
                      </div>
                      <!-- END DATA TABLE -->
                  </div>
               </div>
            </div>
   </div>
</div>
@endsection