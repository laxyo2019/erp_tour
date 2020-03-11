@extends('layout.main')
@section('content')

<main class="app-content">
	<div class="app-title">
		<div>
          {{-- Message show --}}
			<p>
	            @if($message = Session::get('success'))
		            
					<div class="alert alert-success">
						<p>{{ $message }}</p>
					</div>
	            @endif
	          
			</p>
		</div>
			<ul class="app-breadcrumb breadcrumb side">  </ul>
	</div>

<div class="container">
	{{-- <a class="btn btn-info btn-lg" href="{{route('TourRequest.create')}}"  >New Request</a> --}}
		<!-- Modal -->
		{{-- <div class="modal fade" id="myModal" role="dialog"> --}}
			{{-- <div class="modal-dialog"> --}}
				<!-- Modal content-->
				<div class="row">
					<div style="width: 131%;" class="modal-content">
						{{-- <div class="modal-header">
							<button type="button" class="close" data-dismiss="modal">&times;</button>
							<h4 class="modal-title"></h4>
						</div> --}}
						<div class="modal-body">
							<div class="clearix"></div>
							<div class="col-md-12">
								<div class="tile">
									<h3 class="tile-title">Update Tour Approvel Form</h3>
									<div class="tile-body">
                				{{-- </<INSERT FORM?> --}}
              						  <form method="post">{{-- dont remove this otherwise model button not work --}}</form>
										<form class="row" action="{{route('TourRequest.update',$data->id)}}" method="post">
                						@csrf
	                       				 @method('PUT')
                						<div class="form-group col-md-4">
											<label class="control-label"> Your Name</label>
											<input id="name" name="emp_name" class="form-control" type="text" placeholder="Enter Name" value="{{$data->emp_name}}">
											@error('emp_name')
		                                      <span class="text-danger" role="alert">
		                                          <strong>{{ $message }}</strong>
		                                      </span>
			                                @enderror
										</div>
										<div class="form-group col-md-4" >
											<label for="Grade">Grade</label>
					  						<input  value="{{$allData->grade->name}}" name="grd" class="form-control" id="grd" readonly="" >
					  						@error('grd')
		                                      <span class="text-danger" role="alert">
		                                          <strong>{{ $message }}</strong>
		                                      </span>
			                                @enderror
										</div>
										<div class="form-group col-md-4" >
											<label for="Designation">Designation</label>
											 <input  value="{{$allData->designation->designation}}" name="designation" class="form-control" id="designation" readonly="" >

										 </select>
											@error('designation')
		                                      <span class="text-danger" role="alert">
		                                          <strong>{{ $message }}</strong>
		                                      </span>
			                                @enderror
										</div> 
										<div class="form-group col-md-4" >
											<label for="Department">Department</label>
				    						{{-- <input id="department" name="department" class="form-control" type="text" placeholder="Enter Department"> --}}
				    						 <input  value="{{$allData->department->department}}" type="text" name="department" readonly="" class="form-control"></input>
				    						@error('department')
		                                      <span class="text-danger" role="alert">
		                                          <strong>{{ $message }}</strong>
		                                      </span>
			                                @enderror
										</div>
										<div class="form-group col-md-4">
											<label class="control-label">Tour, From</label>
											<input id="tour_from" name="tour_from" class="form-control" type="text" placeholder="Enter tour from" value="{{$data->tour_from}}">
											@error('tour_from')
		                                      <span class="text-danger" role="alert">
		                                          <strong>{{ $message }}</strong>
		                                      </span>
			                                @enderror
										</div>
										<div class="form-group col-md-4">
											<label class="control-label">To</label>
											<input id="tour_to" name="tour_to" class="form-control" type="text" placeholder="Enter tour to" value="{{$data->tour_to}}">
											@error('tour_to')
		                                      <span class="text-danger" role="alert">
		                                          <strong>{{ $message }}</strong>
		                                      </span>
			                                @enderror
										</div>
										<div class="form-group col-md-4">
											<label class="control-label">Period of Tour, From</label>
											<input id="time_from" name="time_from" class="form-control datepicker" type="text" placeholder="Enter Period of Tour, From" value="{{$data->time_from}}">
											@error('time_from')
		                                      <span class="text-danger" role="alert">
		                                          <strong>{{ $message }}</strong>
		                                      </span>
			                                @enderror
										</div>

										<div class="form-group col-md-4">
											<label class="control-label">To</label>
											<input id="time_to" name="time_to" class="form-control  datepicker" type="text" placeholder="Enter Period of Tour, To" value="{{$data->time_to}}">
											@error('time_to')
		                                      <span class="text-danger" role="alert">
		                                          <strong>{{ $message }}</strong>
		                                      </span>
			                                @enderror
										</div>   
										<div class="form-group col-md-4">
				                              <label for="advance_amount">Advance Amount</label>
				                              <input id="advance_amount" name="advance_amount" class="form-control advance_amount" type="text" placeholder="Advance amount" value="{{$data->advance_amount}}">
				                              @error('advance_amount')
				                              <span class="text-danger" role="alert">
				                              <strong>{{ $message }}</strong>
				                              </span>
				                              @enderror
				                          </div>
										<div class="form-group col-md-4">
											<label for="purpuse_of_tour">Purpuse of Tour</label>
                							<textarea name="purpuse_of_tour" class="form-control" id="purpuse_of_tour" rows="2" value="{{$data->purpuse_of_tour}}">{{$data->purpuse_of_tour}}</textarea>
            								@error('purpuse_of_tour')
		                                      <span class="text-danger" role="alert">
		                                          <strong>{{ $message }}</strong>
		                                      </span>
		                                	@enderror
										</div>
										<div class="form-group col-md-4">
											<label for="mode_of_travel">Mode Of Travel</label>
                							<textarea name="mode_of_travel" class="form-control" id="mode_of_travel" rows="2" value="{{$data->mode_of_travel}}">{{$data->mode_of_travel}}</textarea>
            								@error('mode_of_travel')
		                                      <span class="text-danger" role="alert">
		                                          <strong>{{ $message }}</strong>
		                                      </span>
		                                	@enderror
										</div><div class="form-group col-md-4">
											<label for="entitlement">Entitlement Class</label>
                							<textarea name="entitlement" class="form-control" id="entitlement" rows="2" value="{{$data->entitlement}}">{{$data->entitlement}}</textarea>
            								@error('entitlement')
		                                      <span class="text-danger" role="alert">
		                                          <strong>{{ $message }}</strong>
		                                      </span>
		                                	@enderror
										</div>
										<div class="form-group col-md-4">
											<label for="proposed_class">Proposed Class</label>
                							<textarea name="proposed_class" class="form-control" id="proposed_class" rows="2" value="{{$data->proposed_class}}">{{$data->proposed_class}}</textarea>
            								@error('proposed_class')
		                                      <span class="text-danger" role="alert">
		                                          <strong>{{ $message }}</strong>
		                                      </span>
		                                	@enderror
										</div>
										<div class="form-group col-md-4">
											<label for="justification">Justification for higher class(If any) </label>
                							<textarea name="justification" class="form-control" id="justification" rows="2" value="{{$data->justification}}">{{$data->justification}}</textarea>
            								@error('justification')
		                                      <span class="text-danger" role="alert">
		                                          <strong>{{ $message }}</strong>
		                                      </span>
		                                	@enderror
										</div>
										<div class="form-group col-md-4">
											<label for="justification"><b>Notes:-</b> </label>
											<span>Forms without neccessary approvals will not be accepted by Accounts Department for reimbursement of TA/DA inal Bill. Any deviation from policy, in case of circumstances,must be approved by Director. Tour approvel application shoul be submitted at least 2 days before the date of journey to HR Department.	 </span>
                							
										</div>
										<div class="form-group align-self-end col-md-6 ">
											<button id="addGrade" class="btn btn-primary" type="submit">
												<i class="fa fa-fw fa-lg fa-check-circle"></i>Update
											</button>
										</div>
										</form>
                						{{-- END INSERT FORM --}}
									</div>
								</div>
							</div>
						</div>
						{{-- <div class="modal-footer">
							<button type="button" id="close" class="btn btn-default" data-dismiss="modal">Close</button>
						</div> --}}
				</div>
			</div>
		</div>
	{{-- </div> --}}
</div>


	</tbody>
</table>
</div>
{{-- </div>		 --}}
</main>
<script type="text/javascript"> 
$(document).ready(function() {

  $(function() {
    $('.datepicker').datepicker({
        orientation: "bottom",
        format: "yyyy-mm-dd",
        autoclose: true,
        todayHighlight: true
    });
  });
  $(function() {
  $('.timepicker').datetimepicker({
    format:'hh:mm',
  });
});
}); 
</script>
@endsection
