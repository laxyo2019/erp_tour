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
                						<div class="form-group col-md-6">
											<label class="control-label"> Your Name</label>
											<input id="name" name="emp_name" class="form-control" type="text" placeholder="Enter Name" value="{{$data->emp_name}}">
											@error('emp_name')
		                                      <span class="text-danger" role="alert">
		                                          <strong>{{ $message }}</strong>
		                                      </span>
			                                @enderror
										</div>
										<div class="form-group col-md-6" >
											<label for="Grade">Grade</label>
					  						{{-- <input id="grd" name="grd" class="form-control" type="text" placeholder="Enter Grade"> --}}
					  						<select name="grd" class="form-control" id="grd" required="">
											 @foreach($grade as $grades)
											    <option value="{{$data->grade}}">{{$grades->grade}}</option>
											  @endforeach
											  </select>
					  						@error('grd')
		                                      <span class="text-danger" role="alert">
		                                          <strong>{{ $message }}</strong>
		                                      </span>
			                                @enderror
										</div>
										<div class="form-group col-md-6" >
											<label for="Designation">Designation</label>
											{{-- <input id="designation" name="designation" class="form-control" type="text" placeholder="Enter Designation"> --}}
											<select name="designation" class="form-control" id="designation" required="">
											 @foreach($designation as $designations)
											    <option value="{{$data->designation}}">{{$designations->designation}}
											    </option>
			                                @endforeach

										 </select>
											@error('designation')
		                                      <span class="text-danger" role="alert">
		                                          <strong>{{ $message }}</strong>
		                                      </span>
			                                @enderror
										</div> 
										<div class="form-group col-md-6" >
											<label for="Department">Department</label>
				    						{{-- <input id="department" name="department" class="form-control" type="text" placeholder="Enter Department"> --}}
				    						<select name="department" class="form-control" id="department" required=""> 
				    							@foreach($department as $departments)
											    <option value="{{$data->department}}">{{$departments->department}}</option>
			                                @endforeach
											    
											  </select>
				    						@error('department')
		                                      <span class="text-danger" role="alert">
		                                          <strong>{{ $message }}</strong>
		                                      </span>
			                                @enderror
										</div>
										<div class="form-group col-md-6">
											<label class="control-label">Tour, From</label>
											<input id="tour_from" name="tour_from" class="form-control" type="text" placeholder="Enter tour from" value="{{$data->tour_from}}">
											@error('tour_from')
		                                      <span class="text-danger" role="alert">
		                                          <strong>{{ $message }}</strong>
		                                      </span>
			                                @enderror
										</div>
										<div class="form-group col-md-6">
											<label class="control-label">To</label>
											<input id="tour_to" name="tour_to" class="form-control" type="text" placeholder="Enter tour to" value="{{$data->tour_to}}">
											@error('tour_to')
		                                      <span class="text-danger" role="alert">
		                                          <strong>{{ $message }}</strong>
		                                      </span>
			                                @enderror
										</div>
										<div class="form-group col-md-6">
											<label class="control-label">Period of Tour, From</label>
											<input id="time_from" name="time_from" class="form-control" type="date" placeholder="Enter Period of Tour, From" value="{{$data->time_from}}">
											@error('time_from')
		                                      <span class="text-danger" role="alert">
		                                          <strong>{{ $message }}</strong>
		                                      </span>
			                                @enderror
										</div>
										<div class="form-group col-md-6">
											<label class="control-label">To</label>
											<input id="time_to" name="time_to" class="form-control" type="date" placeholder="Enter Period of Tour, To" value="{{$data->time_to}}">
											@error('time_to')
		                                      <span class="text-danger" role="alert">
		                                          <strong>{{ $message }}</strong>
		                                      </span>
			                                @enderror
										</div>   
										
										<div class="form-group col-md-6">
											<label for="purpuse_of_tour">Purpuse of Tour</label>
                							<textarea name="purpuse_of_tour" class="form-control" id="purpuse_of_tour" rows="3" value="{{$data->purpuse_of_tour}}">{{$data->purpuse_of_tour}}</textarea>
            								@error('purpuse_of_tour')
		                                      <span class="text-danger" role="alert">
		                                          <strong>{{ $message }}</strong>
		                                      </span>
		                                	@enderror
										</div>
										<div class="form-group col-md-6">
											<label for="mode_of_travel">Mode Of Travel</label>
                							<textarea name="mode_of_travel" class="form-control" id="mode_of_travel" rows="3" value="{{$data->mode_of_travel}}">{{$data->mode_of_travel}}"</textarea>
            								@error('mode_of_travel')
		                                      <span class="text-danger" role="alert">
		                                          <strong>{{ $message }}</strong>
		                                      </span>
		                                	@enderror
										</div><div class="form-group col-md-6">
											<label for="entitlement">Entitlement Class</label>
                							<textarea name="entitlement" class="form-control" id="entitlement" rows="3" value="{{$data->entitlement}}">{{$data->entitlement}}</textarea>
            								@error('entitlement')
		                                      <span class="text-danger" role="alert">
		                                          <strong>{{ $message }}</strong>
		                                      </span>
		                                	@enderror
										</div>
										<div class="form-group col-md-6">
											<label for="proposed_class">Proposed Class</label>
                							<textarea name="proposed_class" class="form-control" id="proposed_class" rows="3" value="{{$data->proposed_class}}">{{$data->proposed_class}}</textarea>
            								@error('proposed_class')
		                                      <span class="text-danger" role="alert">
		                                          <strong>{{ $message }}</strong>
		                                      </span>
		                                	@enderror
										</div>
										<div class="form-group col-md-6">
											<label for="justification">Justification for higher class(If any) </label>
                							<textarea name="justification" class="form-control" id="justification" rows="3" value="{{$data->justification}}">{{$data->justification}}</textarea>
            								@error('justification')
		                                      <span class="text-danger" role="alert">
		                                          <strong>{{ $message }}</strong>
		                                      </span>
		                                	@enderror
										</div>
										<div class="form-group col-md-6">
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
@endsection