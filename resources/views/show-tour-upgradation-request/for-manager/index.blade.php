@extends('layout.main')
@section('content')

<main class="app-content">
	<div class="app-title">
		<div>
          <h1><i class="app-menu__icon fa fa-comments-o"></i> Manager Tour Upgradation Request</h1>
    </div>
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
								<th>Exception Heigh Upgradaton</th>

								<th>View All Details</th>
								{{-- <th>Manager</th> --}}
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
						<td>{{strtoupper($datas->emp_name)}}</td></td>
						<td>{{strtoupper($datas->tour_from)}}</td>
						<td>{{strtoupper($datas->tour_to)}}</td>
						<td>{{strtoupper($datas->purpuse_of_tour)}}</td><td>{{strtoupper($datas->exception_heigh_upgradaton)}}</td>
						<td><a href="{{route('tour-manager-upgradation.show',$datas->id)}}" target="_blank"><i class="fa fa-eye btn btn-primary" ></i></a>
							</td>

					<td>
                		@if($datas->requested_role == 'tour_admin')
                			<span> - </span>
                		@else
						<span style="
							@if($datas->level1_status == 0) color:#ff9a00 
								@elseif($datas->level1_status == 1) color:green 
								@elseif($datas->level1_status == 2) color:#ff0000 @endif; font-weight: bold">
							@if($datas->level1_status == 0) Pending 
								@elseif($datas->level1_status == 1) Approve 
								@elseif($datas->level1_status == 2) Discard 
							@endif
						</span>
							@endif
		            </td>
					{{-- <td>
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
		            </td> --}}
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
		         
                </td>
					<td>
						 @if(  $datas->level1_status == 0 && $roleName == 'tour_admin')
						 	<form action="{{route('approved-manager-upgradation-request')}}" method="POST">
							@csrf
							 	<button type="submit" class="btn btn-success fa fa-thumbs-up reason-approve" bootbox >Approve
								<input type="hidden" name="request_id" value="1">
								<input type="hidden" name="id" value="{{$datas->id}}">
								<input type="hidden" name="reason" value="">
						 	</button>
						 </form>
						 <form action="{{route('tour-upgradation-request-approve-manager')}}" method="POST">
							@csrf
						 	<button type="submit" class="fa fa-thumbs-down btn btn-danger reason-decline1 " bootbox >Decline
								<input type="hidden" name="request_id" value="2">
								<input type="hidden" name="id" value="{{$datas->id}}">
								<input type="hidden" name="reason" value="">

						 	</button>
						</form>
						@elseif($datas->manager_status == 1 && $roleName == 'tour_admin')


						@endif


					 {{-- 	@if(  $datas->level1_status == 0 && $roleName == 'tour_admin')
							<form action="{{route('tour-upgradation-request-approve-l1')}}" method="POST">
							@csrf
								
						 	<button type="submit" class="btn btn-success fa fa-thumbs-up" bootbox >Approve
							<input type="hidden" name="request_id" value="{{1}}">
							<input type="hidden" name="id" value="{{$datas->id}}">
							
						 	</button>
							</form>
							<form action="{{route('tour-upgradation-request-approve-l1')}}" method="POST">
							@csrf
						 	<button type="submit" class="fa fa-thumbs-down btn btn-danger reason-decline1" bootbox >Decline
							<input type="hidden" name="request_id" value="{{2}}">
							<input type="hidden" name="id" value="{{$datas->id}}">
							<input type="hidden" name="reason" value="">
						 	</button>
						 </form> --}}

						{{-- For Accountant paid or not paid ammount --}}
						
						{{-- @elseif($datas->manager_status == 1 && $datas->level1_status == 1 && $datas->level2_status == 1  && $roleName == 'tour_accountant')

						@endif --}}

						

					{{-- end For Accountant paid or not paid ammount --}}

						 @if( $datas->level1_status == 1 && $datas->level2_status == 0 && $roleName == 'tour_superadmin')

							<form action="{{route('approved-manager-upgradation-request-lelvel2')}}" method="POST">
							@csrf
							 	<button type="submit" class="btn btn-success fa fa-thumbs-up reason-approve" bootbox >Approve
								<input type="hidden" name="request_id" value="{{1}}">
								<input type="hidden" name="id" value="{{$datas->id}}">
								<input type="hidden" name="reason" value="">
								
								
							 	</button>
							 </form>
							 <form action="{{route('tour-upgradation-request-approve-l2')}}" method="POST">
							@csrf
							 	<button type="submit" class="fa fa-thumbs-down btn btn-danger reason-decline1" bootbox >Decline
								<input type="hidden" name="request_id" value="{{2}}">
								<input type="hidden" name="id" value="{{$datas->id}}">
								<input type="hidden" name="reason" value="">
							 	</button>
							 </form>
							{{-- <span class="dot blink"> </span> --}}
							@elseif(  $datas->level1_status == 1 && $datas->level2_status == 1)
								
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

