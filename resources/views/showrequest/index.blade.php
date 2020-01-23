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
								<th>Request</th>
								<th>Response</th>
								<th>Action</th>
							</tr>
						</thead>
						<tbody>
                    @php $i=1; @endphp
                    {{-- Foreach Loop start --}}
                    @foreach($data as $datas)
					<tr>
						<td>{{ $i++}}</td>
						<td><textarea class="form-control" id="exampleTextarea" rows="1">{{ $datas->request}}</textarea></td>
						<td><textarea class="form-control" id="exampleTextarea" rows="1">{{ $datas->response}}</textarea></td>
						<td>
						{{-- Delete form --}}
						<form method="post" action="{{ route('employee.destroy',$datas->id) }}">
	                        @csrf
	                        @method('DELETE')
							@if($datas->status == 1)
            					<a href="{{url('/index',[$datas->id,'decline'])}}"   >
								 <i class="fa fa-thumbs-down btn btn-danger" aria-hidden="true"></i>
							 	</a>
							@endif
							@if($datas->status == 0)
            					<a href="{{url('/index',[$datas->id,'approved'])}}"   >
								 <i class="fa fa-thumbs-up btn btn-success" aria-hidden="true"></i>
							 	</a>
							 @endif
							 @if( $datas->status === NULL )
								<span class="dot blink"></span>
							@endif
							</form>
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

@endsection()