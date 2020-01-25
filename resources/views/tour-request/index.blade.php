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
											<div class="form-group col-md-12">
												<label for="request"></label>
                    							<textarea name="request" class="form-control" id="request" rows="3"></textarea>
                								@error('request')
			                                      <span class="text-danger" role="alert">
			                                          <strong>{{ $message }}</strong>
			                                      </span>
			                                	@enderror
											</div>
											<div class="form-group align-self-end col-md-12 ">
												<button id="addGrade" class="btn btn-primary" type="submit">
													<i class="fa fa-fw fa-lg fa-check-circle"></i>Send
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
{{-- ================================ --}}
<br>
<div class="row">
		<div class="col-md-12">
			<div class="tile">
				<div class="tile-body">
					<div class="table-responsive">
						<table class="table table-hover table-bordered" id="sampleTable">
							<thead>
								<tr>
									<th>S.No</th>
									<th>Request</th>
									<th>Response</th>
									<th>Status</th>
									<th>Date</th>
									<th>Action</th>
								</tr>
							</thead>
							<tbody>
	                    @php $i=1; @endphp
	                    {{-- Foreach Loop start --}}
	                    @foreach($data as $datas)
						<tr>
							<td>{{ $i++}}</td>
							<td>{{$datas->request}}</td>
							<td>{{$datas->response}}</td>
							<td>@if($datas->status=='0') {{'Approved'}} @else {{'Decline'}} @endif</td>
							<td>{{$datas->created_at}}</td>
							<td>
						{{-- Delete form --}}
							<form method="post" action="{{ route('employee.destroy',1) }}">
		                        @csrf
		                        @method('DELETE')
								 {{-- status button --}}
								 <button type="button" data-toggle="modal" data-target="#editRequest{{ $datas->id }}" class="fa fa-pencil-square-o btn btn-primary">
				                 {{-- <i  aria-hidden="true" ></i> --}}
				                 </button>
				                  {{-- Delete button --}}
				                 <button class="fa fa-trash btn btn-danger" onclick="return confirm(' you want to delete?');">
				                        {{-- <i  aria-hidden="true"></i> --}}
				                  </button>
									{{-- <button>
										<i class="fa fa-trash" aria-hidden="true"></i>
									</button> --}}
								</form>
							</td>
						</tr>
					</div>
				</div>
			</div>
		</div>
{{-- Edit Model Box start ,this model box popup on edit button click --}}
		<div class="container">
			<div class="modal fade" id="editRequest{{$datas->id}}" role="dialog">
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
</main>
@endsection