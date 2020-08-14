@extends('layout.main')
@section('content')

<main class="app-content">
	<div class="app-title">
	<div>
          <h1><i class="app-menu__icon fa fa-comments-o"></i> Tour Upgradation Amount Bill</h1>
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
		<ul class="app-breadcrumb breadcrumb side">  </ul>
	</div>
<div class="container">
	{{-- <a class="btn btn-info btn-lg" href="{{route('manager-tour-upg-bill.create')}}"  >New Request</a> --}}
		<!-- Modal -->
		<div class="modal fade" id="myModal" role="dialog">
			<div class="modal-dialog">
				<!-- Modal content-->
			</div>
		</div>
<div class="row mt-2">
		<div class="col-md-12">
			<div class="tile">
				<div class="tile-body">
					<div >
						<table class="table table-striped table-hover table-bordered table-responsive" id="sampleTable">
							<thead>
								<tr>
								<th>S.No.</th>
								<th>Bill No.</th>
								<th>Tour Upgradation, From</th>
								<th>Tour Upgradation, To</th>
								<th>View All Details</th>
                        		<th>Bill verification</th>	
								<th>Level1</th>
								<th>Level2</th>
								<th>Accountant</th>
								<th>Action</th>
							</tr>
							</thead>
							<tbody>
	                    @php $i=1; @endphp
	                    {{-- Foreach Loop start --}}
	                    @foreach($data as $datas)
						<tr>
							<td>{{ $i++}}</td>
							<td>{{$datas->ta_no}}</td>
							<td>{{strtoupper($datas->tour_upgradation_from)}}</td>
							<td>{{strtoupper($datas->tour_upgradation_to)}}</td>
							<td><a href="{{route('manager-tour-upg-bill.show',$datas->id)}}" target="_blank"><i class="fa fa-eye btn btn-primary" ></i></a>
							</td>
							
				            <td>
                           <center>
                              <span style="@if($datas->accountant_status_varied_bill == 0) color:#ff9a00 
                              @elseif($datas->accountant_status_varied_bill == 1) color:green 
                              @elseif($datas->accountant_status_varied_bill == 2) color:#ff0000 
                              @endif; font-weight: bold">
                              @if($datas->accountant_status_varied_bill == 0) Pending 
                              @elseif($datas->accountant_status_varied_bill == 1) {{$datas->acct_bill_vari_res}}  {{-- ({{number_format($datas->accountant_response,2)}}) Amount Paid  --}}  
                              @elseif($datas->accountant_status_varied_bill == 2) {{$datas->acct_bill_discard_res}} 
                              @endif
                              </span>
                           </center>
                       </td>
								<td>
								<center>
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
								</center>
				                </td>
				                <td>
								<center>
									<span style="
									@if($datas->level2_status == 0) color:#ff9a00 
										@elseif($datas->level2_status == 1) color:green 
										@elseif($datas->level2_status == 2) color:#ff0000 
									@endif; font-weight: bold">
									@if($datas->level2_status == 0) Pending 
										@elseif($datas->level2_status == 1) Approved with amount ({{number_format($datas->level2_response,2)}}) 
										@elseif($datas->level2_status == 2) Discard 
									@endif
									</span>
								</center>
				                </td>
					            {{-- for amount paid or unpaid --}}
				               <td>
									<span style="@if($datas->accountant_status == 0) color:#ff9a00 
										@elseif($datas->accountant_status == 1) color:green
										@elseif($datas->accountant_status == 3) color:green
										@elseif($datas->accountant_status == 2) color:#ff0000 
										@endif; font-weight: bold">
											@if($datas->accountant_status == 0) Pending 
										@elseif($datas->accountant_status == 1) ({{number_format($datas->accountant_response,2)}}) Amount Paid 
										@elseif($datas->accountant_status == 2) Amount Un Paid 
										@elseif($datas->accountant_status == 3) ({{number_format($datas->accountant_response,2)}}) Amount Received 
										@endif
									</span>
				                </td>
			                {{-- end for amount paid or unpaid --}}

				            </td>
							<td>
							@if($datas->level1_status == 0)
								<a href="{{route('manager-tour-upg-bill.edit',$datas->id)}}" class="btn btn-sm btn-outline-warning"><i class="fa fa-edit"></i> Edit</a>
				             	 <form method="post" action="{{ route('manager-tour-upg-bill.destroy',$datas->id) }}">
		                       		 @csrf
		                       		 @method('DELETE')
				                  
				                	 <button class="fa fa-trash btn btn-danger" onclick="return confirm(' you want to delete?');">
				                  </button>
								</form>
								@elseif($datas->level2_status == 1)
								<button type="button" class="btn btn-info" data-toggle="modal" data-target="#myModal{{$datas->id}}">View Admin response</i></button>
							@endif
						 </td>
						</tr>
						<div id="myModal{{$datas->id}}" class="modal hide fade" role="dialog">
						  <div class="modal-dialog">
						    <!-- Modal content-->
						    <div class="modal-content">
						      <div class="modal-body text-center" style="color:#000">
						      	@if( !empty($datas->admin_response) )
						      	{{-- @if ($datas->manager_status = 1 && $datas->level1_status = 0 ) 
						        	<p>Your resquest,<br>has been approved By Manager.</p>
						      	@elseif ($datas->level1_status = 1 && $datas->level1_status = 0) 
						        	<p>Your resquest,<br>has been approved By Level 1.</p>
						        @elseif ($datas->level2_status = 1)  --}}
						        	<h2>Admin Response</h2>
						        <p style="color: green;"><strong>{{$datas->admin_response}}</strong></p>
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
<script type="text/javascript">
   $(document).ready(function(){
     $(".reason-accept").click(function(){
   
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
