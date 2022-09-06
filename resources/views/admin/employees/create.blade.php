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
                            <div class="card-body card-block">
                                <form action="" method="post" enctype="multipart/form-data" class="form-horizontal">
                                    <div class="row form-group">
                                        <div class="col col-md-3">
                                            <label for="file-input" class=" form-control-label">Avatar * </label>
                                        </div>
                                        <div class="col-12 col-md-9">
                                            <input type="file" id="file-input" name="file-input"
                                                class="form-control-file">
                                        </div>
                                    </div>
                                    <div class="row form-group">
                                        <div class="col col-md-3">
                                            <label for="selectSm" class=" form-control-label">Team * </label>
                                        </div>
                                        <div class="col-3 col-md-3">
                                            <select nam="selectSm" id="SelectLm" class="form-control-sm form-control">
                                                <option value="0">Onsite</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="row form-group">
                                        <div class="col col-md-3">
                                            <label for="text-input" class=" form-control-label">First Name * </label>
                                        </div>
                                        <div class="col-4 col-md-4">
                                            <input type="text" id="text-input" name="text-input" placeholder="Text"
                                                class="form-control">
                                        </div>
                                    </div>
                                    <div class="row form-group">
                                        <div class="col col-md-3">
                                            <label for="text-input" class=" form-control-label">Last Name * </label>
                                        </div>
                                        <div class="col-4 col-md-4">
                                            <input type="text" id="text-input" name="text-input" placeholder="Text"
                                                class="form-control">
                                        </div>
                                    </div>
                                    <div class="row form-group">
                                       <div class="col col-md-3">
                                            <label class=" form-control-label">Gender *</label>
                                       </div>
                                       <div class="col col-md-9">
                                          <div class="form-check-inline form-check">
                                                <label for="inline-radio1" class="form-check-label pr-5">
                                                   <input type="radio" id="inline-radio1 " name="inline-radios"
                                                      value="option1" class="form-check-input">Male
                                                </label>
                                                <label for="inline-radio3" class="form-check-label">
                                                    <input type="radio" id="inline-radio3" name="inline-radios"
                                                        value="option3" class="form-check-input">Female
                                                </label>
                                          </div>
                                       </div>
                                    </div>
                           
                                    <div class="row form-group">
                                       <div class="col col-md-3">
                                            <label for="text-input" class=" form-control-label">Birthday * </label>
                                       </div>
                                       <div class="col-4 col-md-4">
                                          <input type="text" id="text-input" name="text-input" placeholder="Text"
                                                class="form-control">
                                       </div>
                                    </div>
                                    <div class="row form-group">
                                       <div class="col col-md-3">
                                            <label for="text-input" class=" form-control-label">Address * </label>
                                       </div>
                                       <div class="col-4 col-md-4">
                                          <input type="text" id="text-input" name="text-input" placeholder="Text"
                                                class="form-control">
                                       </div>
                                    </div>
                                    <div class="row form-group">
                                       <div class="col col-md-3">
                                            <label for="text-input" class=" form-control-label">Salary * </label>
                                       </div>
                                       <div class="col-4 col-md-4">
                                          <input type="text" id="text-input" name="text-input" placeholder="Text"
                                                class="form-control">
                                       </div>
                                    </div>
                                    <div class="row form-group">
                                       <div class="col col-md-3">
                                            <label for="selectSm" class=" form-control-label">Position * </label>
                                       </div>
                                       <div class="col-3 col-md-3">
                                          <select name="selectSm" id="SelectLm" class="form-control-sm form-control">
                                                <option value="0">BSE</option>
                                          </select>
                                       </div>
                                    </div>
                                    <div class="row form-group">
                                       <div class="col col-md-3">
                                            <label for="selectSm" class=" form-control-label">Type of word * </label>
                                       </div>
                                       <div class="col-3 col-md-3">
                                          <select name="selectSm" id="SelectLm" class="form-control-sm form-control">
                                                <option value="0">Fulltime</option>
                                          </select>
                                       </div>
                                    </div>
                                    <div class="row form-group">
                                       <div class="col col-md-3">
                                            <label class=" form-control-label">Status *</label>
                                       </div>
                                       <div class="col col-md-9">
                                          <div class="form-check-inline form-check">
                                                <label for="inline-radio1" class="form-check-label pr-5">
                                                   <input type="radio" id="inline-radio1 " name="inline-radios"
                                                      value="option1" class="form-check-input">On working
                                                </label>
                                                <label for="inline-radio3" class="form-check-label">
                                                   <input type="radio" id="inline-radio3" name="inline-radios"
                                                      value="option3" class="form-check-input">Retired
                                                </label>
                                          </div>
                                       </div>
                                    </div>
                           </div>
                        </div>
                        </form>
                  </div>
                  <div class="card-footer">
                        <button type="submit" class="btn btn-primary btn-sm">
                           <i class="fa fa-dot-circle-o"></i> Confirm
                        </button>
                        <button type="reset" class="btn btn-danger btn-sm">
                           <i class="fa fa-ban"></i> Reset
                        </button>
                  </div>
               </div>
            </div>
      </div>
   </div>
   </div>
   </div>
@endsection
