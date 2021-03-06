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
								<th>Tour, From</th>
								<th>Tour, To</th>
								<th>Purpuse of Tour</th>
								<th>Advance Amount</th>
								<th>View All Details</th>
								<th>Manager</th>
								<th>Level1</th>
								<th>Level2</th>
                        		<th>Accountant</th>
								<th>Action</th>
							</tr>
						</thead>
						<tbody>
                    @php $i=1; 
                    @endphp
                    {{-- Foreach Loop start --}}
                    @foreach($data as $datas)
					<tr>
						<td>{{ $i++ }}</td>
						<td>{{strtoupper($datas->emp_name)}}</td></td>
						<td>{{strtoupper($datas->tour_from)}}</td>
						<td>{{strtoupper($datas->tour_to)}}</td>
						<td>{{strtoupper($datas->purpuse_of_tour)}}</td>
						<td>{{$datas->advance_amount}}</td>
						<td><a href="{{route('TourRequest.show',$datas->id)}}" target="_blank"><i class="fa fa-eye btn btn-primary" ></i></a>
						</td>
						<td>
	                		@if($datas->requested_role == 'tour_manager')
	                			<span> - </span>
	                		@else
							<span style="
								@if($datas->manager_status == 0) color:#ff9a00 
									@elseif($datas->manager_status == 1) color:green 
									@elseif($datas->manager_status == 2) color:#ff0000
									@elseif($datas->manager_status == 3) color:grey;
									 @endif; font-weight: bold">
								@if($datas->manager_status == 0) Pending 
									@elseif($datas->manager_status == 1 && $datas->skip_manager != 1) Approve 
									@elseif($datas->manager_status == 2) Discard
									@elseif($datas->manager_status == 1 && $datas->skip_manager == 1)  N/A
								@endif
							</span>
							@endif
			            </td>
						<td>
							<span style="
							@if($datas->level1_status == 0) color:#ff9a00 
								@elseif($datas->level1_status == 1) color:green 
								@elseif($datas->level1_status == 2) color:#ff0000 
							@endif; font-weight: bold">
							@if($datas->level1_status == 0) Pending 
								@elseif($datas->level1_status == 1) Approved 
								@elseif($datas->level1_status == 2) Discard 
							@endif
							</span>
			            </td>
			            <td>
							<span style="
							@if($datas->level2_status == 0) color:#ff9a00 
								@elseif($datas->level2_status == 1) color:green 
								@elseif($datas->level2_status == 2) color:#ff0000 
							@endif; font-weight: bold">
								@if($datas->level2_status == 0) Pending 
								@elseif($datas->level2_status == 1) Approved with Rs. ({{$datas->admin_response}})  
								@elseif($datas->level2_status == 2) Discard 
							@endif
							</span>
			           	</td>
				        {{-- for paid unpaid amount to accountant --}}
		                <td>
		                	<center>
		                       <span style="@if($datas->accountant_status == 0) color:#ff9a00 
		                      	@elseif($datas->accountant_status == 1) color:green 
		                      	@elseif($datas->accountant_status == 2) color:#ff0000 
		                       	@endif; font-weight: bold">
		                       	@if($datas->accountant_status == 0) Pending 
		                       	@elseif($datas->accountant_status == 1) ({{$datas->accountant_response}}) Amount Paid   
		                       	@elseif($datas->accountant_status == 2) Discard 
		                       	@endif
		                      </span>
		                    </center>
		                </td>
	                </td>
						<td>
							 @if( $datas->manager_status == 0 && $roleName == 'tour_manager')
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
							@elseif($datas->manager_status == 1 && $roleName == 'tour_manager')

							@endif


						 	@if( $datas->manager_status == 1 && $datas->level1_status == 0 && $roleName == 'tour_admin' || $datas->manager_status == 3)
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

							{{-- For Accountant paid or not paid ammount --}}
							
							@elseif($datas->manager_status == 1 && $datas->level1_status == 1 && $datas->level2_status == 1  && $roleName == 'tour_accountant')

							@endif

							@if( $datas->manager_status == 1 && $datas->level1_status == 1 && $datas->level2_status == 1  &&  $datas->accountant_status == 0 && $roleName == 'tour_accountant')
								<form action="{{route('accountant')}}" method="POST">
								@csrf
									
							 	<button type="submit" class="btn btn-success fa fa-thumbs-up paid-amount" bootbox >Pay Amount
								<input type="hidden" name="request_id" value="{{1}}">
								<input type="hidden" name="id" value="{{$datas->id}}">
								<input type="hidden" name="reason" value="">
							 	</button>
								</form>

							@elseif( $datas->manager_status == 1 && $datas->level1_status == 1 && $datas->level2_status == 1 && $datas->accountant_status == 1)
									<span style="color: green;"> <p>Amount Paid</p></span>
							
							@elseif( $datas->manager_status == 1 && $datas->level1_status == 1 && $datas->level2_status == 1 && $datas->accountant_status == 2)
									<span style="color: red;"> <p>Amount Un Paid</p></span>
							@endif

						{{-- end For Accountant paid or not paid ammount --}}

							 @if( $datas->manager_status == 1 && $datas->level1_status == 1 && $datas->level2_status == 0 && $roleName == 'tour_superadmin')

								<form action="{{route('add-request-l2')}}" method="POST">
								@csrf
								 	<button type="submit" class="btn btn-success fa fa-thumbs-up reason-approve" bootbox >Approve
									<input type="hidden" name="request_id" value="{{1}}">
									<input type="hidden" name="id" value="{{$datas->id}}">
									<input type="hidden" name="reason" value="">
									
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
							  @permission('delete_tour')
							  <a href="{{route('delete',$datas->id)}}" class="btn btn-primary"><i class="fa fa-trash"></i>Delete</a>
							  @endpermission
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
    $(".reason-approve").click(function(){

    var reason;
  		var text = prompt("Please enter the query","");
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

	// for paid amount to applicant
    $(".paid-amount").click(function(){

    var reason;
  		var text = prompt("Please enter the amount","");
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
// end for paid amount to applicant



});
</script>
@endsection

