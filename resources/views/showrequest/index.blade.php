@extends('layout.main')
@section('content')

<main class="app-content">
	<div class="app-title">
		<div>
          {{-- Message show --}}
			<p>
            @if($message = session('success'))
				<div class="alert alert-success">
					<p>{{ $message }}</p>
				</div>
            @endif
			</p>
		</div>
				<ul class="app-breadcrumb breadcrumb side">
        {{-- {{dd($data)}} --}}
				</ul>
	</div>
	<div class="row">
	<div class="col-md-12">
		<div class="tile">
			<div class="tile-body">
				<div class="table-responsive">
					<table class="table table-hover table-bordered" id="sampleTable">
						<thead>
							<tr>
								<th>S.No</th>
								<th>Employee Name</th>
								<th>Grade</th>
								<th>Designation</th>
								<th>Department</th>
								<th>Tour, From</th>
								<th>Tour, To</th>
								<th>Period of Tour, To</th>
								<th>Period of Tour, To</th>
								<th>Purpuse of Tour</th>
								{{-- <th>Resion</th> --}}
								<th>Manager</th>
								<th>Level1</th>
								<th>Level2</th>

								{{-- <th>Action</th> --}}
							</tr>
						</thead>
						<tbody>
                    @php $i=1; 
                    // dd($data);
                    @endphp
                    {{-- Foreach Loop start --}}
                    @foreach($data as $datas)
					<tr>
						<td>{{ $i++}}</td>
						<td>{{$datas->emp_name}}</td></td>
						{{-- <td>{{!$datas->department}}</td> --}}
						<td>{{$datas->grd}}</td>
						<td>{{$datas->designation}}</td>
						{{-- <td>{{$datas->request}}</td> --}}
						<td>{{$datas->department}}</td>
						<td>{{$datas->tour_from}}</td>
						<td>{{$datas->tour_to}}</td>
						<td>{{$datas->from}}</td>
						<td>{{$datas->to}}</td>
						<td>{{$datas->purpuse_of_tour}}</td>
						{{-- <td> {{$datas->response}}</td> --}}

					<td>
						<center>
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
					</center>
                </td>
				<td>
				<center>
					<span style="@if($datas->level1_status == 0) color:#ff9a00 
					@elseif($datas->level1_status == 1) color:green 
					@elseif($datas->level1_status == 2) color:#ff0000 
					@endif; font-weight: bold">
						@if($datas->level1_status == 0) Pending 
						@elseif($datas->level1_status == 1) Approve 
						@elseif($datas->level1_status == 2) Discard 
						@endif
					</span>
				</center>
                </td>
                <td>
				<center>
					<span style="@if($datas->level2_status == 0) color:#ff9a00 
					@elseif($datas->level2_status == 1) color:green 
					@elseif($datas->level2_status == 2) color:#ff0000 
					@endif; font-weight: bold">
						@if($datas->level2_status == 0) Pending 
						@elseif($datas->level2_status == 1) Approve 
						@elseif($datas->level2_status == 2) Discard 
						@endif
					</span>
				</center>
                </td>
                <td>
                  {{-- <a class="btn btn-primary disbtn{{$datas->id}}" href=""><i class="fa fa-eye"></i></a> --}}
                  @if($datas->level2_status == 1)
                  <a class="btn btn-success disbtn{{$datas->id}}" href="" title="Apply for Quotation">Apply</a>
                  @endif
                </td>
					<td>
						{{-- Delete form --}}
					

						{{-- @if($datas->manager_status == 1) --}}
						{{-- @if($roleName == 'manager') --}}
						{{-- @if($datas->manager_status == 2)
        					<button type="submit" class="fa fa-thumbs-down btn btn-danger reason-decline" bootbox >Decline
							 <i class="fa fa-thumbs-down btn btn-danger" aria-hidden="true"></i>
							<input type="hidden" name="request_id" value="{{$datas->id}}">
							<input type="hidden" name="status" value="{{$datas->manager_status}}">
							<input type="hidden" name="reason" value="">
						 	</button>
						@elseif($datas->manager_status == 1 )
        					<button type="submit" class="btn btn-success fa fa-thumbs-up" bootbox >Approve
							 <i class="fa fa-thumbs-up btn btn-success" aria-hidden="true">Approved</i>
							<input type="hidden" name="request_id" value="{{$datas->id}}">
							<input type="hidden" name="status" value="{{$datas->manager_status}}">
 --}}
						 	{{-- </button>	 --}}
						 @if( $datas->manager_status == 0)
						 	<form action="{{route('add-request')}}" method="POST">
							@csrf
						 	<button type="submit" class="btn btn-success fa fa-thumbs-up" bootbox >Approve
							<input type="hidden" name="request_id" value="1">
							<input type="hidden" name="id" value="{{$datas->id}}">
							{{-- <input type="hidden" name="status" value="{{$datas->manager_status}}"> --}}
						 	</button>
						 </form>
						 <form action="{{route('add-request')}}" method="POST">
						@csrf
						 	<button type="submit" class="fa fa-thumbs-down btn btn-danger reason-decline" bootbox >Decline
								<input type="hidden" name="request_id" value="2">
								<input type="hidden" name="id" value="{{$datas->id}}">
								<input type="hidden" name="reason" value="">
						 	</button>
						</form>
						 	@elseif( $datas->manager_status == 1 && $datas->level1_status == 0)
								<form action="{{route('add-request-l1')}}" method="POST">
								@csrf
						 	<button type="submit" class="btn btn-success fa fa-thumbs-up" bootbox >Approve
							<input type="hidden" name="request_id" value="{{1}}">
							<input type="hidden" name="id" value="{{$datas->id}}">
							{{-- <input type="hidden" name="status" value="{{$datas->manager_status}}"> --}}
						 	</button>
						 </form>
						 <form action="{{route('add-request-l1')}}" method="POST">
						@csrf
						 	<button type="submit" class="fa fa-thumbs-down btn btn-danger reason-decline" bootbox >Decline
							<input type="hidden" name="request_id" value="{{2}}">
							<input type="hidden" name="id" value="{{$datas->id}}">
							<input type="hidden" name="reason" value="">
						 	</button>
						 </form>
						 @elseif( $datas->manager_status == 1 && $datas->level1_status == 1)
						<form action="{{route('add-request-l2')}}" method="POST">
						@csrf
						 	<button type="submit" class="btn btn-success fa fa-thumbs-up" bootbox >Approve
							<input type="hidden" name="request_id" value="{{1}}">
							<input type="hidden" name="id" value="{{$datas->id}}">
							{{-- <input type="hidden" name="status" value="{{$datas->manager_status}}"> --}}
						 	</button>
						 </form>
						 <form action="{{route('add-request-l2')}}" method="POST">
						@csrf
						 	<button type="submit" class="fa fa-thumbs-down btn btn-danger reason-decline" bootbox >Decline
							<input type="hidden" name="request_id" value="{{2}}">
							<input type="hidden" name="id" value="{{$datas->id}}">
							<input type="hidden" name="reason" value="">
						 	</button>
						 </form>
							{{-- <span class="dot blink"> </span> --}}
						@endif
						
						{{-- @endif --}}
					{{-- </form> --}}
						{{-- <form method="post" action="{{ route('employee.destroy',$datas->id) }}">
	                        @csrf
	                        @method('DELETE')
							
							<button class="fa fa-trash btn btn-danger" onclick="return confirm(' you want to delete?');">
				                        <i  aria-hidden="true"></i>
				                  </button>
							</form> --}}
						</td>
					</tr>
						{{-- Edit Model Box start ,this model box popup on edit button click --}}
						<div class="container">
							<div class="modal fade" id="myEdit{{ $datas->id }}" role="dialog">
								<div class="modal-dialog">
									<!-- Modal content-->
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
													{{-- Update FORM --}}
														<form  action="{{route('employee.update',$datas->id)}}" method="post">
										                       	@csrf
										                       	@method('PUT')
															<div class="row">
																<div class="form-group col-md-6">
																	<label class="control-label"> Name</label>
																	<input value="{{ $datas->emp_name}}" name="employee" class="form-control" type="text" placeholder="Enter employee">
																</div>

																<div class="form-group col-md-6">
																	<label class="control-label"> Email</label>
																	<input value="{{ $datas->user['email']}}" name="email" class="form-control" type="text" placeholder="Enter Employee">
																</div>	
																{{-- Hidden input, for find user_id table field --}}
																<input value="{{$datas->user_id}}"type="hidden" name="user_id">
																<div class="form-group col-md-6 align-self-end">
																	<button type="submit" class="btn btn-primary">
																		<i class="fa fa-fw fa-lg fa-check-circle"></i>Update
																	</button>
																</div>
															</div>	
														</form>
												{{-- END Update FORM --}}

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
						</div>
					{{-- Edit Model/Update Box End --}}
					@endforeach

				</tbody>
			</table>
		</div>
	</div>
</div>
</div>
</div>
<script type="text/javascript">
  $(document).ready(function(){
    $(".reason-decline").click(function(){

    var reason;
  		var text = prompt("Please enter the reason","");
	    if (!text){
	        return false;
	    }else {
			reason =  text;
			$('input[name="reason"]').val(reason);
		}
		
	});
	$("#approved").click(function(){
	    if (!confirm("Do you want to approve")){
	      return false;
	    }
	  });
});
</script>
@endsection
