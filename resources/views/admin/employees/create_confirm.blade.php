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
                    @foreach (Session::get('addEmployee') as $product_id)
                    {{$product_id['firstname']}}
                    {{$product_id['lastname']}}
                    @endforeach
                    <div class="form-group">
                        <label for="name" class="py-4"> Avatar   </label>
                        <input type="text" class="form-control" name="name" value="" id="name"  aria-describedby="name">
                    </div>
                    <div class="form-group">
                      <label for="name" class="py-4"> Team   </label>
                      <input type="text" class="form-control" name="name" value="" id="name"  aria-describedby="name">
                  </div>
                  <div class="form-group">
                    <label for="name" class="py-4"> First name   </label>
                    <input type="text" class="form-control" name="name" value="" id="name"  aria-describedby="name">
                </div>
                <div class="form-group">
                  <label for="name" class="py-4"> Last name   </label>
                  <input type="text" class="form-control" name="name" value="" id="name"  aria-describedby="name">
                </div>
                <div class="form-group">
                  <label for="name" class="py-4"> Gender   </label>
                  <input type="text" class="form-control" name="name" value="" id="name"  aria-describedby="name">
                </div>
                <div class="form-group">
                  <label for="name" class="py-4"> Birthday   </label>
                  <input type="text" class="form-control" name="name" value="" id="name"  aria-describedby="name">
                </div>
                <div class="form-group">
                  <label for="name" class="py-4"> Address   </label>
                  <input type="text" class="form-control" name="name" value="" id="name"  aria-describedby="name">
                </div>
                <div class="form-group">
                  <label for="name" class="py-4"> Salary   </label>
                  <input type="text" class="form-control" name="name" value="" id="name"  aria-describedby="name">
                </div>
                <div class="form-group">
                  <label for="name" class="py-4"> Position   </label>
                  <input type="text" class="form-control" name="name" value="" id="name"  aria-describedby="name">
                </div>
                <div class="form-group">
                  <label for="name" class="py-4"> Type of work   </label>
                  <input type="text" class="form-control" name="name" value="" id="name"  aria-describedby="name">
                </div>
                <div class="form-group">
                  <label for="name" class="py-4"> Status   </label>
                  <input type="text" class="form-control" name="name" value="" id="name"  aria-describedby="name">
                </div>
                <a href="{{ url()->previous() }} " class="btn btn-light">Back</a>
                <button type="button" class="btn btn-primary float-right mb-1" data-toggle="modal"  data-target="#staticModal">
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
			<div class="modal fade" id="staticModal" tabindex="-1" role="dialog" aria-labelledby="staticModalLabel" aria-hidden="true"
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
								<input type="hidden" class="form-control" name="name" value="{{Session::get('add')}}" id="name"  aria-describedby="name">
								<button type="submit" class="btn btn-primary"> OK </button>
								{{-- <a href=" {{ route('admin.team.add_save')}} " class="btn btn-primary " >OK<a> --}}
							</form>
						
						</div>
					</div>
				</div>
			</div>
			<!-- end modal static -->

		</div>
		<!-- END PAGE CONTAINER-->

@endsection