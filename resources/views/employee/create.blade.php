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
	<button type="button" class="btn btn-info btn-lg" data-toggle="modal" data-target="#myModal">New Request</button>
		<!-- Modal -->
		<div class="modal fade" id="myModal" role="dialog">
			<div class="modal-dialog">
				<!-- Modal content-->
				<div class="row">
					<div style="width: 131%;" class="modal-content">
						<div class="modal-header">
							<button type="button" class="close" data-dismiss="modal">&times;</button>
							<h4 class="modal-title"></h4>
						</div>
						<div class="modal-body">
							<div class="clearix"></div>
							<div class="col-md-12">
								<div class="tile">
									<h3 class="tile-title">Send Request</h3>
									<div class="tile-body">
                				{{-- </<INSERT FORM?> --}}
              						  <form method="post">{{-- dont remove this otherwise model button not work --}}</form>
										<form class="row" action="{{route('TourRequest.store')}}" method="post">
                						@csrf
                						<div class="form-group col-md-6">
												<label class="control-label"> Name</label>
												<input id="grd" name="emp_name" class="form-control" type="text" placeholder="Enter Name">
											</div>
											<div class="form-group col-md-6" >
											  <label for="Grade">Grade</label>
					  							<select name="grade_id" class="form-control" id="Grade" required>
											  	<option></option>
											  
											  </select>
											</div>
											<div class="form-group col-md-6" >
											  <label for="Designation">Designation</label>
											<select name="desg_id" class="form-control" id="Designation" required>
											  	<option></option>
											    
											    
											  </select>
											</div> 
											<div class="form-group col-md-6" >
											  <label for="Department">Department</label>
				    						 <select name="dept_id" class="form-control" id="Department" required>
											  	<option></option>
											    
											  </select>
											</div>
											<div class="form-group col-md-6">
												<label class="control-label">Tour, From</label>
												<input id="tour_from" name="tour_from" class="form-control" type="text" placeholder="Enter tour from">
											</div>
											<div class="form-group col-md-6">
												<label class="control-label">To</label>
												<input id="tour_to" name="tour_to" class="form-control" type="text" placeholder="Enter tour to">
											</div>
											<div class="form-group col-md-6">
												<label class="control-label">Period of Tour, From</label>
												<input id="time_from" name="time_from" class="form-control" type="date" placeholder="Enter Password">
											</div>
											<div class="form-group col-md-6">
												<label class="control-label">To</label>
												<input id="time_to" name="time_to" class="form-control" type="date" placeholder="Enter Password">
											</div>
											<div class="form-group col-md-6" >
											  <label for="Department">Department</label>
				   							 <select name="dept_id" class="form-control" id="Department" required>
											  	<option></option>
											    
											  </select>
											</div>    
											
											<div class="form-group col-md-6">
												<label for="purpuse_of_tour">Purpuse of Tour</label>
                    							<textarea name="purpuse_of_tour" class="form-control" id="purpuse_of_tour" rows="3"></textarea>
                								@error('purpuse_of_tour')
			                                      <span class="text-danger" role="alert">
			                                          <strong>{{ $message }}</strong>
			                                      </span>
			                                	@enderror
											</div>
											<div class="form-group col-md-6">
												<label for="mode_of_travel">Mode Of Travel</label>
                    							<textarea name="mode_of_travel" class="form-control" id="mode_of_travel" rows="3"></textarea>
                								@error('mode_of_travel')
			                                      <span class="text-danger" role="alert">
			                                          <strong>{{ $message }}</strong>
			                                      </span>
			                                	@enderror
											</div><div class="form-group col-md-6">
												<label for="entitlement">Entitlement Class</label>
                    							<textarea name="entitlement" class="form-control" id="entitlement" rows="3"></textarea>
                								@error('entitlement')
			                                      <span class="text-danger" role="alert">
			                                          <strong>{{ $message }}</strong>
			                                      </span>
			                                	@enderror
											</div>
											<div class="form-group col-md-6">
												<label for="proposed_class">Proposed Class</label>
                    							<textarea name="proposed_class" class="form-control" id="proposed_class" rows="3"></textarea>
                								@error('proposed_class')
			                                      <span class="text-danger" role="alert">
			                                          <strong>{{ $message }}</strong>
			                                      </span>
			                                	@enderror
											</div>
											
											<div class="form-group col-md-6">
												<label for="justification">Justification for higher class(If any) </label>
                    							<textarea name="justification" class="form-control" id="justification" rows="3"></textarea>
                								@error('justification')
			                                      <span class="text-danger" role="alert">
			                                          <strong>{{ $message }}</strong>
			                                      </span>
			                                	@enderror
											</div>
											<div class="form-group align-self-end col-md-6 ">
												<button id="addGrade" class="btn btn-primary" type="submit">
													<i class="fa fa-fw fa-lg fa-check-circle"></i>ADD
												</button>
											</div>
										</form>
                						{{-- END INSERT FORM --}}
									</div>
								</div>
							</div>
						</div>
						<div class="modal-footer">
							<button type="button" id="close" class="btn btn-default" data-dismiss="modal">Close</button>
						</div>
				</div>
			</div>
		</div>
	</div>
</div>


	</tbody>
</table>
</div>
</div>		
</main>
@endsection