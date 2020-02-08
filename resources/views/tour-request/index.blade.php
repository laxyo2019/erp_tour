@extends('layout.main')
@section('content')

<main class="app-content">
	<div class="app-title">
		<div>
          <h1><i class="app-menu__icon fa fa-comments-o"></i> All Tour Request</h1>
        </div>
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
	</div>
<div class="container">
<a class="btn btn-info btn-lg" href="{{route('TourRequest.create')}}"  >New Request</a>

{{-- ================================ --}}
<br>
 <div class="row mt-2">
		<div class="col-md-12">
			<div class="tile">
				<div class="tile-body">
					<div >
						<table class="table table-striped table-hover table-bordered table-responsive" id="sampleTable">
						<thead>
							<tr>
								<th>S.No</th>
								{{-- <th>Employee Name</th> --}}
								{{-- <th>Department</th> --}}
								<th>Tour, From</th>
								<th>Tour, To</th>
								<th>Period of Tour, To</th>
								<th>Period of Tour, To</th>
								<th>Purpuse of Tour</th>
								<th>View All Details</th>
								<th>Manager</th>
								<th>Level1</th>
								<th>Level2</th>
								<th>Action</th>
							</tr>
						</thead>
						<tbody>
	                    @php $i=1; @endphp
	                    {{-- Foreach Loop start --}}
	                    @foreach($data as $datas)
	                     <?php if($datas->level2_status ==1){			
									echo "<script src='/themes/sb-admin2/vendor/jquery/jquery.min.js'></script>
									<script> 
											$('#response').on('click',function(){
									        $('#myModal').modal('show');
									    });
							    </script>";
							}
							?>
						<tr>
							<td>{{ $i++}}</td>
							{{-- <td>{{$datas->emp_name}}</td></td> --}}
							{{-- <td>{{$datas->department}}</td> --}}
							<td>{{$datas->tour_from}}</td>
							<td>{{$datas->tour_to}}</td>
							<td>{{$datas->time_from}}</td>
							<td>{{$datas->time_to}}</td>
							<td>{{$datas->purpuse_of_tour}}</td>
							<td><a href="{{route('TourRequest.show',$datas->id)}}" target="_blank"><i class="fa fa-eye btn btn-primary" ></i></a>
							</td>
							<td>
		                		@if($datas->requested_role == 'Manager')
		                			<span> - </span>
		                		@else
								<span style="@if($datas->manager_status == 0) color:#ff9a00 
								@elseif($datas->manager_status == 1) color:green 
								@elseif($datas->manager_status == 2) color:#ff0000 @endif; font-weight: bold">
									@if($datas->manager_status == 0) Pending 
									@elseif($datas->manager_status == 1) Approve 
									@elseif($datas->manager_status == 2) Discard 
									@endif
								</span>
								@endif
		                	</td>
							<td>
								<span style="@if($datas->level1_status == 0) color:#ff9a00 
								@elseif($datas->level1_status == 1) color:green 
								@elseif($datas->level1_status == 2) color:#ff0000 
								@endif; font-weight: bold">
								@if($datas->level1_status == 0) Pending 
								@elseif($datas->level1_status == 1) Approve 
								@elseif($datas->level1_status == 2) Discard 
								@endif
								</span>
			                </td>
			                <td>
								<span style="@if($datas->level2_status == 0) color:#ff9a00 
								@elseif($datas->level2_status == 1) color:green


								@elseif($datas->level2_status == 2) color:#ff0000 
								@endif; font-weight: bold">
									@if($datas->level2_status == 0) Pending 
									@elseif($datas->level2_status == 1) Approve 
									@elseif($datas->level2_status == 2) Discard 
									@endif
								</span>
			                </td>
			               
							<td>
							@if($datas->manager_status == 0)
								<a href="{{route('TourRequest.edit',$datas->id)}}" class="btn btn-sm btn-outline-warning"><i class="fa fa-edit"></i> Edit</a>
					              <form method="post" action="{{ route('TourRequest.destroy',$datas->id) }}">
			                        @csrf
			                        @method('DELETE')
					                  {{-- Delete button --}}
					                 <button class="fa fa-trash btn btn-danger" onclick="return confirm(' you want to delete?');">
					                  </button>
									</form>
								@elseif($datas->level2_status == 1)
								<button type="button" class="btn btn-info btn-lg" data-toggle="modal" data-target="#myModal{{$datas->id}}"> View Admin response{{-- <i class="fa fa-eye btn btn-primary" > --}}</i></button>
		
							@endif
								</center>
							</td>
						</tr>
						<div id="myModal{{$datas->id}}" class="modal hide fade" role="dialog">
						  <div class="modal-dialog">
						    <!-- Modal content-->
						    <div class="modal-content">
						      <div class="modal-body text-center" style="color:#000">
						      	@if( !empty($datas->request) )
						      	{{-- @if ($datas->manager_status = 1 && $datas->level1_status = 0 ) 
						        	<p>Your resquest,<br>has been approved By Manager.</p>
						      	@elseif ($datas->level1_status = 1 && $datas->level1_status = 0) 
						        	<p>Your resquest,<br>has been approved By Level 1.</p>
						        @elseif ($datas->level2_status = 1)  --}}
						        	<h2>Admin Response</h2>
						        <p style="color: green;"><strong>{{$datas->request}}</strong></p>
						        	<p>Your resquest,<br>has been approved By Admin.</p>
						        @endif
						      </div>
						    </div>
						  </div>
						</div>
				@endforeach
			</tbody>
		</table>
	</div>

</div>
</div>
</div>
</div>
</div>
</main>

@endsection

<!-- Modal -->
		{{-- <div class="modal fade" id="myModal" role="dialog">
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
												<input id="date" name="from" class="form-control" type="date" placeholder="Enter Password">
											</div>
											<div class="form-group col-md-6">
												<label class="control-label">To</label>
												<input id="to" name="to" class="form-control" type="date" placeholder="Enter Password">
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
									</div>
								</div>
							</div>
						</div>
						<div class="modal-footer">
							<button type="button" id="close" class="btn btn-default" data-dismiss="modal">Close</button>
						</div>
				</div>
			</div>
		</div> --}}

{{-- Edit Model Box start ,this model box popup on edit button click --}}
{{-- 		<div class="container">
			<div class="modal fade" id="editRequest{{$datas->id}}" role="dialog">
				<div class="modal-dialog">

					<div class="row">
						<div style="width: 131%;" class="modal-content">
							<div class="modal-header">
								<button class="close" data-dismiss="modal">&times;</button>
								<h4 class="modal-title"></h4>
							</div>
							<div class="modal-body">
								<div class="clearix"></div>
								<div class="col-md-12">
									<div class="tile">
										<h3 class="tile-title">Update Employee</h3>
										<div class="tile-body">
										<form  action="{{route('employee.update',1)}}" method="post">
						                   @csrf
						                   @method('PUT')
											<div class="row">
											<div class="form-group col-md-12">
												<label for="request"></label>
                    							<textarea name="request" class="form-control" id="request" rows="3" value="{{$datas->request}}" > {{$datas->request}}</textarea>
                    							@error('request')
			                                      <span class="text-danger" role="alert">
			                                          <strong>{{ $message }}</strong>
			                                      </span>
			                                	@enderror
											</div>
												<div class="form-group col-md-6 align-self-end">
													<button type="submit" class="btn btn-primary">
														<i class="fa fa-fw fa-lg fa-check-circle"></i>Update
													</button>
												</div>
											</div>	
										</form>
										</div>
									</div>
								</div>
							</div>
							<div class="modal-footer">
								<button type="button" id="closeEdit" class="btn btn-default" data-dismiss="modal">Close</button>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div> --}}