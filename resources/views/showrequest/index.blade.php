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
				<div >
					<table class="table table-hover table-bordered table-responsive" id="sampleTable">
						<thead>
							<tr>
								<th>S.No</th>
								<th>Employee Name</th>
								{{-- <th>Grade</th>
								<th>Designation</th> --}}
								<th>Department</th>
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
                    @php $i=1; 
                    @endphp
                    {{-- Foreach Loop start --}}
                    @foreach($data as $datas)
					<tr>
						<td>{{ $i++}}</td>
						<td>{{$datas->emp_name}}</td></td>
						{{-- <td>{{!$datas->department}}</td> --}}
						{{-- <td>{{$datas->grd}}</td>
						<td>{{$datas->designation}}</td> --}}
						{{-- <td>{{$datas->request}}</td> --}}
						<td>{{$datas->department}}</td>
						<td>{{$datas->tour_from}}</td>
						<td>{{$datas->tour_to}}</td>
						<td>{{$datas->time_from}}</td>
						<td>{{$datas->time_to}}</td>
						<td>{{$datas->purpuse_of_tour}}</td>
						<td><a href="{{route('TourRequest.show',$datas->id)}}" target="_blank"><i class="fa fa-eye btn btn-primary" ></i></a>
							</td>
						{{-- <td> {{$datas->response}}</td> --}}

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
                  @if($datas->level2_status == 1)
                  @endif
                </td>
					<td>
						 @if( $datas->manager_status == 0)
						 	<form action="{{route('add-request')}}" method="POST">
							@csrf
							 	<button type="submit" class="btn btn-success fa fa-thumbs-up" bootbox >Approve
								<input type="hidden" name="request_id" value="1">
								<input type="hidden" name="id" value="{{$datas->id}}">
							
						 	</button>
						 </form>
						 <form action="{{route('add-request')}}" method="POST">
							@csrf
						 	<button type="submit" class="fa fa-thumbs-down btn btn-danger reason-decline1" bootbox >Decline
								<input type="hidden" name="request_id" value="2">
								<input type="hidden" name="id" value="{{$datas->id}}">
								<input type="hidden" name="reason" value="">
						 	</button>
						</form>
						@elseif($datas->manager_status == 1 && $roleName == 'manager')

						@endif


					 	@if( $datas->manager_status == 1 && $datas->level1_status == 0 && $roleName == 'level_1')
							<form action="{{route('add-request-l1')}}" method="POST">
							@csrf
								
						 	<button type="submit" class="btn btn-success fa fa-thumbs-up" bootbox >Approve
							<input type="hidden" name="request_id" value="{{1}}">
							<input type="hidden" name="id" value="{{$datas->id}}">
							
						 	</button>
							</form>
							<form action="{{route('add-request-l1')}}" method="POST">
							@csrf
						 	<button type="submit" class="fa fa-thumbs-down btn btn-danger reason-decline1" bootbox >Decline
							<input type="hidden" name="request_id" value="{{2}}">
							<input type="hidden" name="id" value="{{$datas->id}}">
							<input type="hidden" name="reason" value="">
						 	</button>
						 </form>

						@elseif($datas->manager_status == 1 && $datas->level1_status == 1 && $roleName == 'level_1')

						@endif

						 @if( $datas->manager_status == 1 && $datas->level1_status == 1 && $datas->level2_status == 0 && $roleName == 'level_2')

							<form action="{{route('add-request-l2')}}" method="POST">
							@csrf
							 	<button type="submit" class="btn btn-success fa fa-thumbs-up" bootbox >Approve
								<input type="hidden" name="request_id" value="{{1}}">
								<input type="hidden" name="id" value="{{$datas->id}}">
								
							 	</button>
							 </form>
							 <form action="{{route('add-request-l2')}}" method="POST">
							@csrf
							 	<button type="submit" class="fa fa-thumbs-down btn btn-danger reason-decline1" bootbox >Decline
								<input type="hidden" name="request_id" value="{{2}}">
								<input type="hidden" name="id" value="{{$datas->id}}">
								<input type="hidden" name="reason" value="">
							 	</button>
							 </form>
							{{-- <span class="dot blink"> </span> --}}
							@elseif( $datas->manager_status == 1 && $datas->level1_status == 1 && $datas->level2_status == 1)
								
						  @endif
						</td>
					</tr>
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
	{{-- Edit Model Box start ,this model box popup on edit button click --}}
	{{-- <div class="container">
		  <div class="modal fade" id="companyEdit{{ $datas->id }}" role="dialog">
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
											<input value="{{$datas->user_id}}"type="hidden" name="user_id">
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
{{-- Edit Model/Update Box End --}}