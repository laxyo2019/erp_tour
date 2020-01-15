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
				<ul class="app-breadcrumb breadcrumb side">
        {{-- {{dd($data)}} --}}
				</ul>
	</div>
{{-- =================================== --}}
  {{-- START INSERT MODEL BOX --}}

	<div class="container">
		<button type="button" class="btn btn-info btn-lg" data-toggle="modal" data-target="#myModal">Add Employee</button>
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
									<h3 class="tile-title">Add Employee</h3>
									<div class="tile-body">
                		</<{{-- INSERT FORM --}}
                <form method="post"></form>
										<form class="row" action="{{route('employee.store')}}" method="post">
                						@csrf
                  
											<div class="form-group col-md-6">
												<label class="control-label"> Name</label>
												<input id="grd" name="emp_name" class="form-control" type="text" placeholder="Enter Name">
											</div>
											<div class="form-group col-md-6">
												<label class="control-label"> Email</label>
												<input id="grd" name="email" class="form-control" type="text" placeholder="Enter Email">
											</div>
											<div class="form-group col-md-6" >
											  <label for="Company">Company</label>
						{{-- Company select --}}<select name="comp_id" class="form-control" id="Company" required="">
											  	<option></option>
											  	@foreach($company as $companys)
											    <option value="{{$companys->id}}">{{$companys->company}}</option>
											    @endforeach
											  </select>
											</div>
											<div class="form-group col-md-6" >
											  <label for="Department">Department</label>
				    {{-- Department select --}} <select name="dept_id" class="form-control" id="Department" required>
											  	<option></option>
											    @foreach($department as $departments)
											    <option value="{{$departments->id}}">{{$departments->department}}</option>
											    @endforeach
											  </select>
											</div>
											<div class="form-group col-md-6" >
											  <label for="Designation">Designation</label>
					{{-- Designation select --}}<select name="desg_id" class="form-control" id="Designation" required>
											  	<option></option>
											    @foreach($designation as $designations)
											    <option value="{{$designations->id}}">{{$designations->designation}}</option>
											    @endforeach
											  </select>
											</div> 
											<div class="form-group col-md-6" >
											  <label for="Grade">Grade</label>
					  	{{-- Grade select --}}<select name="grade_id" class="form-control" id="Grade" required>
											  	<option></option>
											    @foreach($grade as $grades)
											    <option value="{{$grades->id}}">{{$grades->grade}}</option>
											    @endforeach
											  </select>
											</div>
											<div class="form-group col-md-6">
												<label class="control-label">Password</label>
												<input id="grd" name="password" class="form-control" type="text" placeholder="Enter Password">
											</div>   
											<div class="form-group align-self-end col-md-6 ">
												<button id="addGrade" class="btn btn-primary" type="submit">
													<i class="fa fa-fw fa-lg fa-check-circle"></i>ADD
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
      {{-- END INSERT MODEL BOX --}}</div>

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
											<th>Name</th>
											<th>Email</th>
											<th>Password</th>
											<th>Company</th>
											<th>Department</th>
											<th>Designation</th>
											<th>Action</th>
										</tr>
									</thead>
									<tbody>
			                    @php $i=1; @endphp
			                    {{-- Foreach Loop start --}}
			                    @foreach($data as $datas)
            
								<tr>
									<td>{{ $i++}}</td>
									<td>{{ $datas->emp_name}}</td>
									<td>{{ $datas->user['email']}}</td>
									<td>{{ $datas->password}}</td>
									<td>{{ $datas->company['company']}}</td>
									<td>{{ $datas->department['department']}}</td>
									<td>{{ $datas->designation['designation']}}</td>
									<td>
      						{{-- Delete form --}}
       									<form method="post" action="{{ route('employee.destroy',$datas->id) }}">
				                        @csrf
				                        @method('DELETE')
											<button type="button" data-toggle="modal" data-target="#status{{ $datas->id }}">
						 {{-- status button --}}<i class="fa fa-toggle-on" aria-hidden="true"></i>
											</button>
	                    {{-- Edit Button with model box call --}}
	                    					<button type="button" data-toggle="modal" data-target="#myEdit{{ $datas->id }}">
											 
												<i class="fa fa-pencil-square-o" aria-hidden="true"></i>
											</button>
	     				
											{{-- <button>
												<i class="fa fa-trash" aria-hidden="true"></i>
											</button> --}}
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

											<div class="form-group col-md-6" >
											  <label for="Company">Company</label>
						{{-- Company select --}}<select name="comp_id" class="form-control" id="Company" required="">
												  	<option></option>
												  			@php $pre_co = ""; @endphp
												  	@foreach($company as $companys)
												  		@if( $datas->company['company'] == $companys->company)
												  			@php $pre_co = 'selected'; @endphp													
												  		@endif
												      <option {{$pre_co}} value="{{$companys->id}}">{{$companys->company}}</option>
												  	@endforeach
											  	</select>
											</div>

											<div class="form-group col-md-6" >
											  <label for="Department">Department</label>
				    {{-- Department select --}} <select name="dept_id" class="form-control" id="Department" required>
												  	<option></option>
												  		@php $pre_de = ""; @endphp
												    @foreach($department as $departments)
												    	@if($datas->department['department'] == $departments->department)
												    		@php $pre_de = 'selected'; @endphp
												    	@endif
												      <option {{$pre_de}} value="{{$departments->id}}">{{$departments->department}}</option>
												    @endforeach
											   </select>
											</div>

											<div class="form-group col-md-6" >
											  <label for="Designation">Designation</label>
					{{-- Designation select --}}<select name="desg_id" class="form-control" id="Designation" required>
												  	<option></option>
												  		@php $pre_di = ""; @endphp
												    @foreach($designation as $designations)
												    	@if($datas->designation['designation'] == $designations->designation)
												    		@php $pre_di = 'selected'; @endphp
												    	@endif
												      <option {{$pre_di}} value="{{$designations->id}}">{{$designations->designation}}</option>
												    @endforeach
											    </select>
											</div> 

											<div class="form-group col-md-6" >
											  <label for="Grade">Grade</label>
					  	{{-- Grade select --}}<select name="grade_id" class="form-control" id="Grade" required>
											  	<option></option>
											  			@php $pre_g = ""; @endphp
												    @foreach($grade as $grades)
												    	@if($datas->grade['grade'] == $grades->grade)
												    		@php $pre_g = 'selected'; @endphp
												    	@endif
												      <option {{$pre_g}} value="{{$grades->id}}">{{$grades->grade}}</option>
												    @endforeach
											  </select>
											</div>

											<div class="form-group col-md-6">
												<label class="control-label">Password</label>
												<input value="{{ $datas->password}}" name="password" class="form-control" type="text" placeholder="Enter Password">
											</div>   
{{-- Hidden input, for find user_id table field --}}<input value="{{$datas->user_id}}" type="hidden" name="user_id">
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
</main>
@endsection('content')


