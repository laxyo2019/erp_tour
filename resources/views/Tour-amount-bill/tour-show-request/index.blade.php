

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
               <table class="table table-striped table-hover table-bordered table-responsive" id="sampleTable" >
                  <thead>
                     <tr>
                        <th>S.No</th>
                        <th>Employee Name</th>
                        <th>T.A.No.</th>
                        <th>Bill No.</th>
                        <th>Time, From</th>
                        <th>Time, To</th>
                        {{-- <th>Grade</th> --}}
                        {{-- <th>Designation</th> --}}
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
                  @php $i=1; 
                  @endphp
                  {{-- Foreach Loop start --}}
                  @foreach($data as $datas)
                     <tr>
                        <td>{{ $i++}}</td>
                        <td>{{$datas['user_details']->name}}</td>
                        <td>{{$datas->ta_no}}</td></td>
                        <td>{{$datas->bill_no}}</td>
                        <td>{{$datas->time_from}}</td>
                        <td>{{$datas->time_to}}</td>
                        {{-- <td>{{$datas->grd}}</td> --}}
                        {{-- <td>{{$datas->designation}}</td> --}}
                        <td>{{$datas->tour_from}}</td>
                        <td>{{$datas->tour_to}}</td>
                        <td>
                           <a href="{{route('tour-amount-bill.show',$datas->id)}}" target="_blank"><i class="fa fa-eye btn btn-primary " ></i></a>
                        </td>
                        <td>
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
                        </td>
                        <td>
                           <span style="@if($datas->level1_status == 0) color:#ff9a00 
                              @elseif($datas->level1_status == 1) color:green 
                              @elseif($datas->level1_status == 2) color:#ff0000 
                              @endif; font-weight: bold">
                           @if($datas->level1_status == 0) Pending 
                           @elseif($datas->level1_status == 1) Approve 
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
                           @elseif($datas->level2_status == 1) Approve 
                           @elseif($datas->level2_status == 2) Discard 
                           @endif
                           </span>
                        </td>
                           @if($datas->level2_status == 1)
                           @endif
                        <td>
                           @if( $datas->manager_status == 0)
                           <form action="{{route('tour-add-request')}}" method="POST">
                              @csrf
                              <button type="submit" class="btn btn-success fa fa-thumbs-up" bootbox >Approve
                              <input type="hidden" name="request_id" value="1">
                              <input type="hidden" name="id" value="{{$datas->id}}">
                              </button>
                           </form>
                           <form action="{{route('tour-add-request')}}" method="POST">
                              @csrf
                              <button type="submit" class="fa fa-thumbs-down btn btn-danger reason-decline1" bootbox >Decline
                              <input type="hidden" name="request_id" value="2">
                              <input type="hidden" name="id" value="{{$datas->id}}">
                              <input type="hidden" name="reason" value="">
                              </button>
                           </form>
                           @elseif($datas->manager_status == 1 && $roleName == 'manager')
                           @endif
                           @if( $datas->manager_status == 1 && $datas->level1_status == 0 && $roleName == 'level_1')
                           <form action="{{route('tour-add-request-l1')}}" method="POST">
                              @csrf
                              <button type="submit" class="btn btn-success fa fa-thumbs-up" bootbox >Approve
                              <input type="hidden" name="request_id" value="{{1}}">
                              <input type="hidden" name="id" value="{{$datas->id}}">
                              </button>
                           </form>
                           <form action="{{route('tour-add-request-l1')}}" method="POST">
                              @csrf
                              <button type="submit" class="fa fa-thumbs-down btn btn-danger reason-decline1" bootbox >Decline
                              <input type="hidden" name="request_id" value="{{2}}">
                              <input type="hidden" name="id" value="{{$datas->id}}">
                              <input type="hidden" name="reason" value="">
                              </button>
                           </form>
                           @elseif($datas->manager_status == 1 && $datas->level1_status == 1 && $roleName == 'level_1')
                           @endif
                           @if( $datas->manager_status == 1 && $datas->level1_status == 1 && $datas->level2_status == 0 && $roleName == 'level_2')
                           <form action="{{route('tour-add-request-l2')}}" method="POST">
                              @csrf
                              <button type="submit" class="btn btn-success fa fa-thumbs-up" bootbox >Approve
                              <input type="hidden" name="request_id" value="{{1}}">
                              <input type="hidden" name="id" value="{{$datas->id}}">
                              </button>
                           </form>
                           <form action="{{route('tour-add-request-l2')}}" method="POST">
                              @csrf
                              <button type="submit" class="fa fa-thumbs-down btn btn-danger reason-decline1" bootbox >Decline
                              <input type="hidden" name="request_id" value="{{2}}">
                              <input type="hidden" name="id" value="{{$datas->id}}">
                              <input type="hidden" name="reason" value="">
                              </button>
                           </form>
                           @elseif( $datas->manager_status == 1 && $datas->level1_status == 1 && $datas->level2_status == 1)
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

