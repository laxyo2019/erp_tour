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
	<a class="btn btn-info btn-lg" href="{{route('tour-amount-bill.create')}}"  >New Request</a>
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
								<th>S.No</th>
								<th>T.A.No.</th>
								<th>Bill No.</th>
								<th>Time, From</th>
								<th>Time, To</th>
								{{-- <th>Grade</th>
								<th>Designation</th> --}}
								<th>Tour, To</th>
								<th>Tour, From</th>
								<th>View All Details</th>
								<th>Manager</th>
								<th>HOD</th>
								<th>Level2</th>
								<th>Action</th>
							</tr>
							</thead>
							<tbody>
	                    @php $i=1; @endphp
	                    {{-- Foreach Loop start --}}
	                    @foreach($data as $datas)
						<tr>
							<td>{{ $i++}}</td>
							<td>{{$datas->ta_no}}</td></td>
							<td>{{$datas->bill_no}}</td>
							<td>{{$datas->time_from}}</td>
							<td>{{$datas->time_to}}</td>
							{{-- <td>{{$datas->grd}}</td>
							<td>{{$datas->designation}}</td> --}}
							<td>{{$datas->tour_from}}</td>
							<td>{{$datas->tour_to}}</td>
							<td><a href="{{route('tour-amount-bill.show',$datas->id)}}" target="_blank"><i class="fa fa-eye btn btn-primary" ></i></a>
							</td>
							<td><center>
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
				            </td>
							<td>
							@if($datas->manager_status == 0)
								<a href="{{route('tour-amount-bill.edit',$datas->id)}}" class="btn btn-sm btn-outline-warning"><i class="fa fa-edit"></i> Edit</a>
				             	 <form method="post" action="{{ route('tour-amount-bill.destroy',$datas->id) }}">
		                       		 @csrf
		                       		 @method('DELETE')
				                  	{{-- Delete button --}}
				                	 <button class="fa fa-trash btn btn-danger" onclick="return confirm(' you want to delete?');">
				                  </button>
								</form>
								
		
							@endif
						 </td>
						</tr>
						
					@endforeach
				</tbody>
			</table>
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