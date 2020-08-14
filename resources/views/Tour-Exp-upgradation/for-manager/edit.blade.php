

@extends('layout.main')
@section('content')
<main class="app-content">
   <div class="app-title">
      <div>
          <h1><i class="app-menu__icon fa fa-comments-o"></i> Edit Tour Upgradation Request</h1>
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
      <div class="row">
         <div style="width: 131%;" class="modal-content">
            <div class="modal-body">
               <div class="clearix"></div>
               <div class="col-md-12">
                  <div class="tile">
                     <!-- <h3 class="tile-title">Tour Upgradation Form</h3> -->
                     <div class="tile-body">
                        <form class="row" action="{{route('tour-manager-upgradation.update',$data->id)}}" method="post">

                           @csrf
                           @method('PUT')
                           <div class="form-group col-md-4">
                              <label class="control-label"> Your Name</label>
                              <input id="name" name="emp_name" class="form-control" type="text" placeholder="Enter Name" value="{{$data->emp_name}}">
                              @error('emp_name')
                              <span class="text-danger" role="alert">
                              <strong>{{ $message }}</strong>
                              </span>
                              @enderror
                           </div>
                           <div class="form-group col-md-4" >
                              <label for="Grade">Grade</label>
                               <input  value="{{$data->grd ? $data->grd ? $data->grd :'' :'' }}" name="grd" class="form-control" id="grd" readonly="">
                              @error('grd')
                              <span class="text-danger" role="alert">
                              <strong>{{ $message }}</strong>
                              </span>
                              @enderror
                           </div>
                           <div class="form-group col-md-4" >
                              <label for="Designation">Designation</label>
                             <input  value="{{$data->designation ? $data->designation ? $data->designation : '' :''}}" name="designation" class="form-control" id="designation" readonly="">
                                 
                              @error('designation')
                              <span class="text-danger" role="alert">
                              <strong>{{ $message }}</strong>
                              </span>
                              @enderror
                           
                           </div>
                           <div class="form-group col-md-4" >
                              <label for="Department">Department</label>
                         
                                 <input  value="{{ $data->department ? $data->department ? $data->department :'' :'' }}" type="text" name="department" readonly="" class="form-control"></input>
                              {{-- </select> --}}
                              @error('department')
                              <span class="text-danger" role="alert">
                              <strong>{{ $message }}</strong>
                              </span>
                              @enderror
                           </div>
                           <div class="form-group col-md-4">
                              <label class="control-label">Tour Upgradation, From</label>
                              <input id="tour_from" name="tour_from" class="form-control" type="text" placeholder="Enter tour from" value="{{$data->tour_from}}">

                              @error('tour_from')
                              <span class="text-danger" role="alert">
                              <strong>{{ $message }}</strong>
                              </span>
                              @enderror
                           </div>
                           <div class="form-group col-md-4">
                              <label class="control-label">Tour Upgradation, To</label>
                              <input id="tour_to" name="tour_to" class="form-control" type="text" placeholder="Enter tour to" value="{{$data->tour_to}}">
                              @error('tour_to')
                              <span class="text-danger" role="alert">
                              <strong>{{ $message }}</strong>
                              </span>
                              @enderror
                           </div>
                           <div class="form-group col-md-4">
                              <label class="control-label">Period of Tour Upgradation, From</label>
                              <input id="time_from" name="time_from" class="form-control datepicker" type="text" placeholder="yyyy-mm-dd" value="{{$data->time_from}}">
                              @error('time_from')
                              <span class="text-danger" role="alert">
                              <strong>{{ $message }}</strong>
                              </span>
                              @enderror
                           </div>
                           <div class="form-group col-md-4">
                              <label class="control-label">Period of Tour Upgradation,To</label><br><br>
                              <input id="time_to" name="time_to" class="form-control datepicker" type="text" placeholder="yyyy-mm-dd" value="{{$data->time_to}}">
                              @error('time_to')
                              <span class="text-danger" role="alert">
                              <strong>{{ $message }}</strong>
                              </span>
                              @enderror
                           </div>
                          
                           <div class="form-group col-md-4">
                              <label for="purpuse_of_tour">Purpuse of Tour</label>
                              <textarea name="purpuse_of_tour" class="form-control" id="purpuse_of_tour" rows="2" placeholder="Enter purpuse of tour" >{{$data->purpuse_of_tour}}</textarea>
                              @error('purpuse_of_tour')
                              <span class="text-danger" role="alert">
                              <strong>{{ $message }}</strong>
                              </span>
                              @enderror
                           </div>

                           <div class="form-group col-md-6">
                              <label for="justification">Justification for higher class(If any) </label>
                              <textarea name="justification" class="form-control" id="justification" rows="2" placeholder="Enter justification for higher class(If any)"> {{$data->justification}}</textarea>
                              @error('justification')
                              <span class="text-danger" role="alert">
                              <strong>{{ $message }}</strong>
                              </span>
                              @enderror
                           </div>
                           {{--  <div class="form-group col-md-4" >
                              <label for="Department">Tour Policies</label><br><br>
                              <select name="tour_policy" class="form-control" id="tour_policy" >
                                 <option value="{{$data->tour_policy}}"> {{$data->tour_policy}}</option>
                                 <option value="Traveling"> Traveling</option><option value="Hotel"> Hotel</option>
                                 <option value="Traveling"> Traveling</option>
                                 <option value="Eating"> Eating</option>
                                 <option value="ETC"> ETC.</option>
                                
                              </select>
                              @error('tour_policy')
                              <span class="text-danger" role="alert">
                              <strong>{{ $message }}</strong>
                              </span>
                              @enderror
                           </div> --}}
                            <div class="form-group col-md-6">
                              <label for="justification">Exception Higher Upgradaton </label>
                              <textarea name="exception_heigh_upgradaton" class="form-control" id="exception_heigh_upgradaton" rows="2" placeholder="Enter Exception Upgradaton for higher class"> {{$data->exception_heigh_upgradaton}}</textarea>

                              @error('exception_heigh_upgradaton')
                              <span class="text-danger" role="alert">
                              <strong>{{ $message }}</strong>
                              </span>
                              @enderror
                           </div>
                           {{-- {{dd($data)}} --}}
                         {{--  <input id="emp_location" name="emp_location" class="form-control" type="hidden" value="{{$data->branch_details ? $data->branch_details->city ? $data->branch_details->city :'' :''}}">  --}}
                           <div class="form-group col-md-12">
                              <label for="justification"><b>Notes:-</b> </label>
                              <span>Forms without neccessary approvals will not be accepted by Accounts Department for reimbursement of TA/DA inal Bill. Any deviation from policy, in case of circumstances,must be approved by Director. Tour approvel application shoul be submitted at least 2 days before the date of journey to HR Department.	 </span>
                           </div>
                           <div class="form-group align-self-end col-md-6 ">
                              <button id="addGrade" class="btn btn-primary" type="submit" align="center">
                              <i class="fa fa-fw fa-lg fa-check-circle" ></i>Apply
                              </button>
                           </div>
                        </form>
                        {{-- END INSERT FORM --}}
                     </div>
                  </div>
               </div>
            </div>
         </div>
      </div>
   </div>
  </div>
 </tbody>
</table>
</div>
</main>
<script type="text/javascript"> 
$(document).ready(function() {

  $(function() {
    $('.datepicker').datepicker({
        orientation: "bottom",
        format: "yyyy-mm-dd",
        autoclose: true,
        todayHighlight: true
    });
  });
  $(function() {
  $('.timepicker').datetimepicker({
    format:'hh:mm',
  });
});
}); 
</script>
@endsection
