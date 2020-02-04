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
            <div class="container">
               <div class="modal-header">
                  <h4 class="modal-title">Tour Request Details</h4>
               </div>
               <!-- Modal body -->
               <div class="modal-body">
                  <div class="tile">
                     <h3 class="tile-title"><b></b></h3>
                     <form class="row" action="{{route('tour-amount-bill.store')}}" method="post" enctype="multipart/form-data">
                        @csrf
                        @foreach($data as $datas)
                        <div class="form-group col-md-3">
                           <label class="control-label"> <b>Employee Name</b></label><br>
                           <span>{{$datas->emp_name}}</span>
                        </div>
                        <div class="form-group col-md-3">
                           <label class="control-label"> <b>Grade</b></label><br>
                           <span>{{$datas->grd}}</span>
                        </div>
                        <div class="form-group col-md-3">
                           <label class="control-label"><b>Designation</b></label><br>
                           <span>{{$datas->designation}}</span>
                        </div>
                        <div class="form-group col-md-3">
                           <label class="control-label"><b>To</b></label><br>
                           <span>{{$datas->time_to}}</span>
                        </div>
                        <div class="form-group col-md-3" >
                           <label for="control-label"><b>Department</b></label><br>
                           <span>{{$datas->department}}</span>
                        </div>
                        <div class="form-group col-md-3">
                           <label class="control-label"><b>Tour, From</b></label><br>
                           <span>{{$datas->tour_from}}</span>
                        </div>
                        <div class="form-group col-md-3">
                           <label class="control-label"><b>To</b></label><br>
                           <span>{{$datas->tour_to}}</span>
                        </div>

                        <div class="form-group col-md-3" >
                           <label for="control-label"><b>Period of Tour, From </b></label><br>
                           <span>{{$datas->time_from}}</span>
                        </div>
                        <div class="form-group col-md-3" >
                           <label for="control-label"><b>Period of Tour, To </b></label><br>
                           <span>{{$datas->time_to}}</span>
                        </div>
                        <div class="form-group col-md-3" >
                           <label for="control-label"><b>Purpuse of Tour </b></label><br>
                           <span>{{$datas->purpuse_of_tour}}</span>
                        </div>
                        <div class="form-group col-md-3" >
                           <label for="control-label"><b>Mode Of Travel </b></label><br>
                           <span>{{$datas->mode_of_travel}}</span>
                        </div>
                        <div class="form-group col-md-3" >
                           <label for="control-label"><b>Entitlement Class </b></label><br>
                           <span>{{$datas->entitlement}}</span>
                        </div>
                        <div class="form-group col-md-3" >
                           <label for="control-label"><b>Proposed Class </b></label><br>
                           <span>{{$datas->proposed_class}}</span>
                        </div> 
                        <div class="form-group col-md-3" >
                           <label for="control-label"><b>Justification for higher class(If any)  </b></label><br>
                           <span>{{$datas->justification}}</span>
                        </div>
                        <div class="form-group col-md-6" >
                           <label for="control-label"><b>Notes:-   </b></label><br>
                           <span> Forms without neccessary approvals will not be accepted by Accounts Department for reimbursement of TA/DA inal Bill. Any deviation from policy, in case of circumstances,must be approved by Director. Tour approvel application shoul be submitted at least 2 days before the date of journey to HR Department. </span>
                        </div>
                        @endforeach
                     </form>
                  </div>
               </div>
            </div>
         </div>
      </div>
   </div>
</div>
@endsection

