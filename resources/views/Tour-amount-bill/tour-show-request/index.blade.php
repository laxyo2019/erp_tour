

@extends('layout.main')
@section('content')
<main class="app-content">
<div class="app-title">
   <div>
          <h1><i class="app-menu__icon fa fa-comments-o"></i> Tour Amount Bill</h1>
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
               <table class="table table-striped table-hover table-bordered table-responsive" id="sampleTable" >
                  <thead>
                     <tr>
                        <th>S.No</th>
                        <th>Employee Name</th>
                        <th>T.A.No.</th>
                        <th>Bill No.</th>
                      
                        <th>Tour, From</th>
                        <th>Tour, To</th>
                        <!-- <th>Advance Amount</th> -->
                        <th>View All Details</th>
                        <th>Due Amount</th>
                        <th>Manager</th>
                        <th>T.A. Bill verification</th>
                        <th>Level1</th>
                        <th>Level2</th>
                        <th>Accountant</th>
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
                        <td>{{$datas->tour_from}}</td>
                        <td>{{$datas->tour_to}}</td>
                        <!-- <td>{{number_format($datas->advance_amount,2)}}</td> -->

                        <td>
                           <a href="{{route('tour-amount-bill.show',$datas->id)}}" target="_blank"><i class="fa fa-eye btn btn-primary " ></i></a>
                        </td>
                        <td>{{$datas->due_amount}}</td>

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
                           <center>
                              <span style="@if($datas->accountant_status_varied_bill == 0) color:#ff9a00 
                              @elseif($datas->accountant_status_varied_bill == 1) color:green 
                              @elseif($datas->accountant_status_varied_bill == 2) color:#ff0000 
                              @endif; font-weight: bold">
                              @if($datas->accountant_status_varied_bill == 0) Pending 
                              @elseif($datas->accountant_status_varied_bill == 1){{$datas->acct__bill_vari_res}} 
                              @elseif($datas->accountant_status_varied_bill == 2){{$datas->acct_bill_discard_res}} 
                              @endif
                              </span>
                           </center>
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
                           @elseif($datas->level2_status == 1) ({{number_format($datas->admin_response,2)}}) Amount Pay  
                           @elseif($datas->level2_status == 2) Discard 
                           @endif
                           </span>
                        </td>
                         {{-- for paid unpaid amount to accountant --}}
                      <td>
                        <center>
                           <span style="@if($datas->accountant_status == 0) color:#ff9a00 
                           @elseif($datas->accountant_status == 1) color:green 
                           @elseif($datas->accountant_status == 2) color:#ff0000 
                           @endif; font-weight: bold">
                           @if($datas->accountant_status == 0) Pending 
                           @elseif($datas->accountant_status == 1) ({{number_format($datas->accountant_response,2)}}) Amount Paid   
                           @elseif($datas->accountant_status == 2) Discard 
                           @endif
                           </span>
                        </center>
                     </td>
                  {{-- end for paid unpaid amount to accountant --}}

                        @if($datas->level2_status == 1)
                         @endif
                        <td>
                           @if( $datas->manager_status == 0 && $roleName == 'tour_manager')
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
                           @elseif($datas->manager_status == 1 && $roleName == 'tour_manager')
                           @endif


                           @if( $datas->manager_status == 1 && $datas->accountant_status_varied_bill == 0 && $roleName == 'tour_accountant')
                           <form action="{{route('tour-bill-varify')}}" method="POST">
                              @csrf
                              <button type="submit" class="btn btn-success fa fa-thumbs-up acct__bill_vari_res" bootbox >Varified
                              <input type="hidden" name="request_id" value="{{1}}">
                              <input type="hidden" name="id" value="{{$datas->id}}">
                              <input type="hidden" name="acct__bill_vari_res" value="">

                              </button>
                           </form>
                           <form action="{{route('tour-bill-varify')}}" method="POST">
                              @csrf
                              <button type="submit" class="fa fa-thumbs-down btn btn-danger acct_bill_discard_res" bootbox >Decline
                              <input type="hidden" name="request_id" value="{{2}}">
                              <input type="hidden" name="id" value="{{$datas->id}}">
                              <input type="hidden" name="acct_bill_discard_res" value="">
                              </button>
                           </form>
                           @elseif($datas->manager_status == 1 && $datas->accountant_status_varied_bill == 1 && $roleName == 'tour_accountant')
                           @endif


                           @if( $datas->manager_status == 1  && $datas->accountant_status_varied_bill == 1  && $datas->level1_status == 0 && $roleName == 'tour_admin')
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
                           @elseif($datas->manager_status == 1 && $datas->level1_status == 1 && $datas->accountant_status_varied_bill == 1 && $roleName == 'tour_admin')
                           @endif

                           @if( $datas->manager_status == 1 && $datas->level1_status == 1 && $datas->level2_status == 0  && $roleName == 'tour_superadmin')
                           <form action="{{route('tour-add-request-l2')}}" method="POST">
                              @csrf
                              <button type="submit" class="btn btn-success fa fa-thumbs-up reason-approve" bootbox >Approve
                              <input type="hidden" name="request_id" value="{{1}}">
                              <input type="hidden" name="id" value="{{$datas->id}}">
                               <input type="hidden" name="reason" value="">
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

                           {{-- for paid or unpaid amount to accountant --}}

                          @if( $datas->manager_status == 1 && $datas->level1_status == 1 && $datas->level2_status == 1  &&  $datas->accountant_status == 0 && $roleName == 'tour_accountant')
                              <form action="{{route('accountant-bill')}}" method="POST">
                              @csrf
                                 
                              <button type="submit" class="btn btn-success fa fa-thumbs-up paid-amount" bootbox >Paid Amount
                              <input type="hidden" name="request_id" value="{{1}}">
                              <input type="hidden" name="id" value="{{$datas->id}}">
                              <input type="hidden" name="reason" value="">
                              </button>
                              </form>
                              <form action="{{route('accountant-bill')}}" method="POST">
                              @csrf
                              <button type="submit" class="fa fa-thumbs-down btn btn-danger unpaid-amount" bootbox >Unpaid Amount
                              <input type="hidden" name="request_id" value="{{2}}">
                              <input type="hidden" name="id" value="{{$datas->id}}">
                              <input type="hidden" name="reason" value="">
                              </button>
                            </form>
                           @elseif( $datas->manager_status == 1 && $datas->level1_status == 1 && $datas->level2_status == 1 && $datas->accountant_status == 1)
                              <span style="color: green;"> <p>Amount Paid</p></span>
                        
                           @elseif( $datas->manager_status == 1 && $datas->level1_status == 1 && $datas->level2_status == 1 && $datas->accountant_status == 2)
                                 <span style="color: red;"> <p>Amount Un Paid</p></span>
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
   		var text = prompt("Please enter the due amount","");
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



// for varify amount to applicant
    $(".acct__bill_vari_res").click(function(){

    var reason;
      var text = prompt("Please enter the query","");
       if (!text){
           return false;
       }else {
         reason =  text;
         $('input[name="acct__bill_vari_res"]').val(reason);
      }
      
   });
   $("#approved").click(function(){
       if (!confirm("Do you want to approve")){
         return false;
       }
     });
// end  varify amount to applicant


// for declind amount to applicant
    $(".acct_bill_discard_res").click(function(){

    var reason;
      var text = prompt("Please enter decline reason....","");
       if (!text){
           return false;
       }else {
         reason =  text;
         $('input[name="acct_bill_discard_res"]').val(reason);
      }
      
   });
   $("#approved").click(function(){
       if (!confirm("Do you want to Decline")){
         return false;
       }
     });
// end  varify amount to applicant
   });



</script>
@endsection


