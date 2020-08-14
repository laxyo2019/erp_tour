@extends('layout.main')
@section('content')




<main class="app-content">
	<div class="app-title">
		<div>
          <h1><i class="app-menu__icon fa fa-comments-o"></i> All Tour Upgradation Request</h1>
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

<a class="btn btn-info btn-lg" href="{{route('tour-exp-upgradation.create')}}"  ><i class="fa fa-send">New Request</i></a>

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
								<th>S.No.</th>
								<th>Tour Upgradation,From</th>
								<th>Tour <br>Upgradation,To</th>
								<th>Purpuse of Tour</th>
								<th>Exception<br>Heigh <br>Upgradation</th>
								<th>View All Details</th>
								<th>Manager</th>
								<th>Level1</th>
								<th>Level2</th>
								{{-- <th>Accountant</th> --}}
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
							<td>{{strtoupper($datas->tour_from)}}</td>
							<td>{{strtoupper($datas->tour_to)}}</td>
							<td>{{strtoupper($datas->purpuse_of_tour)}}</td>
							<td>{{strtoupper($datas->exception_heigh_upgradaton)}}</td>
							<td><a href="{{route('tour-exp-upgradation.show',$datas->id)}}" target="_blank"><i class="fa fa-eye btn btn-primary" ></i></a>
							</td>
							{{-- <td>{{$datas->advance_amount}}</td> --}}

							<td>
		                		@if($datas->requested_role == 'tour_manager')
		                			<span> - </span>
		                		@else
								<span style="@if($datas->manager_status == 0) color:#ff9a00 
								@elseif($datas->manager_status == 1) color:green 
								@elseif($datas->manager_status == 2) color:#ff0000 @endif; font-weight: bold">
									@if($datas->manager_status == 0) Pending 
									@elseif($datas->manager_status == 1) Approved 
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
								@elseif($datas->level1_status == 1) Approved 
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
									@elseif($datas->level2_status == 1) Approved with amount ({{$datas->admin_response}})
									@elseif($datas->level2_status == 2) Discard 
									@endif
								</span>
			                </td>
			              
			                {{-- end for amount paid or unpaid --}}

							<td>
							@if($datas->manager_status == 0)
								<a href="{{route('tour-exp-upgradation.edit',$datas->id)}}" class="btn btn-sm btn-outline-warning"><i class="fa fa-edit"></i> Edit</a>
				              	<form method="post" action="{{ route('tour-exp-upgradation.destroy',$datas->id) }}">
		                        @csrf
		                        @method('DELETE')
				                  {{-- Delete button --}}
				                 <button class="fa fa-trash btn btn-danger" onclick="return confirm(' you want to delete?');">
				                  </button>
								</form>
						    @endif
							@if($datas->level2_status == 1 )
								
								<?php 
									//print_r(($TABillCount==null) ? 'dd': 'vv');
									$count = count($TABillCount);
									if($count != 0){
									  foreach($TABillCount as $TABillCounts){
										$arr[] = $TABillCounts->ta_no;
										$arr2 = array_unique($arr);

									//if($TABillCounts->ta_no == $datas->id){ 
									if(in_array($datas->id, $arr2)){
										//dd($arr2);
										if($count < 2){
								?>
									<button class="btn btn-info fa fa-reply" disabled="true">Already Apply</button>
								<?php }elseif($count > 1){ ?>
									{{-- <button class="btn btn-info fa fa-reply" disabled="true">Apply previous Bill</button> --}}
								<?php
									}
									}elseif($TABillCounts->ta_no != $datas->id ){
										
										//echo "string";
										
										$uid[] = $datas->user_id;
										$cnt = count($uid);
										if($cnt ==1){
								?>
									<form method="post" id="formID_{{$datas->user_id}}" action="{{url('tb-upgradation')}}">
				                        @csrf
				                     <input type="hidden" name="id" value="{{$datas->id}}">
										<button class="btn btn-info fa fa-reply">Apply Bill 1 </button>
										{{-- <button class="btn btn-info fa fa-reply" disabled="true">Already Apply</button> --}}
									</form>
								<?php } } elseif(strtotime($datas->time_from) == strtotime($sortDate) && $TABillCounts->ta_no != $datas->id) { ?>
									<form method="post" action="{{url('tb-upgradation')}}">
				                        @csrf
				                        <input type="hidden" name="id" value="{{$datas->id}}">
										<button class="btn btn-info fa fa-reply">Apply Bill2 </button>
										{{-- <button class="btn btn-info fa fa-reply" disabled="true">Already Apply</button> --}}
									</form>
								<?php } } } if($count==0){
									//print_r($count);
									if(strtotime($datas->time_from) == strtotime($sortDate)) {
								?>
									<form method="post" action="{{url('tb-upgradation')}}">
				                        @csrf
				                        <input type="hidden" name="id" value="{{$datas->id}}">
										<button class="btn btn-info fa fa-reply">Apply Bill </button>
									</form>
								<?php }else{ ?>
									<button class="btn btn-info fa fa-reply" disabled="true">Apply previous Bill</button>
								<?php } }  ?>

								
								{{-- && $datas->id == $TABillCounts->ta_no --}}
							@elseif($datas->level2_status == 0 && $datas->level1_status == 1)

								<form method="post" action="{{url('tb-upgradation')}}">
			                        @csrf
			                        <input type="hidden" name="id" value="{{$datas->id}}">
									<button class="btn btn-info fa fa-reply" disabled="" >Apply Bill2 </button>
								</form>

							@endif
						{{-- @endforeach --}}
						</center>
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
						        	<p>Your resquest,<br>has been approved.</p>
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