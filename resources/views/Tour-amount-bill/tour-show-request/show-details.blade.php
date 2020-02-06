
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
   </ul>
</div>
<div class="row">
   <div class="col-md-12">
      <div class="tile">
         <div class="tile-body">
            <div class="table-responsive">
               <div class="container">
                  <div class="modal-header">
                     <h4 class="modal-title">Tour Amount Bill Details</h4>
                  </div>
                  <!-- Modal body -->
                  <div class="modal-body">
                     <div class="tile">
                        <h3 class="tile-title"><b></b></h3>
                        <form class="row" action="{{route('tour-amount-bill.store')}}" method="post" enctype="multipart/form-data">
                        @csrf
                         @foreach($data as $datas)

                           <div class="form-group col-md-3">
                              <label class="control-label"> <b>T.A Journal Sr. No</b></label><br>
                              <span>{{$datas->ta_no}}</span>
                           </div>
                           <div class="form-group col-md-3">
                              <label class="control-label"> <b>Bill No</b></label><br>
                              <span>{{$datas->bill_no}}</span>
                           </div>
                           <div class="form-group col-md-3">
                              <label class="control-label"><b>Period of Tour, From</b></label><br>
                              <span>{{$datas->time_from}}</span>
                           </div>
                           <div class="form-group col-md-3">
                              <label class="control-label"><b>To</b></label><br>
                              <span>{{$datas->time_to}}</span>
                           </div>
                           <div class="form-group col-md-3" >
                              <label for="Grade"><b>Grade</b></label><br>
                              <span>{{$datas->grd}}</span>
                           </div>
                           <div class="form-group col-md-3" >
                              <label for="Designation"><b>Designation</b></label><br>
                              <span>{{$datas->designation}}</span>
                           </div>
                           <div class="form-group col-md-3">
                              <label class="control-label"><b>Tour, From</b></label><br>
                              <span>{{$datas->tour_from}}</span>
                           </div>
                           <div class="form-group col-md-3">
                              <label class="control-label"><b>To</b></label><br>
                              <span>{{$datas->tour_to}}</span>
                           </div>
                           <div class="form-group col-md-12">
                              <div class="card">
                                 <div class="card-body">
                                    <table border="1" style="" id="invoice-item-table" class="table table-striped table-hover table-bordered">
                                       <thead>
                                          <tr class="tr-nav" style="background: #e3f2fd;">
                                             <th rowspan="2">ID</th>
                                             <th rowspan="2">Purpose of journy & Details of Halt</th>
                                             <th colspan="2" align="center">Departure</th>
                                             <th colspan="2" align="center">Arrival</th>
                                             <th rowspan="2">Class by Which Travelled</th>
                                             <th rowspan="2">Fare(Rs.)</th>
                                             <th rowspan="2">Ticket No.</th>
                                             <th rowspan="2">No. Of Hrs. Day & Remarks</th>
                                          </tr>
                                          <tr style="background: #e3f2fd;">
                                             <th>Date & Time</th>
                                             <th>Station</th>
                                             <th>Date & Time</th>
                                             <th>Station</th>
                                          </tr>
                                       </thead>
                                       <tbody>
                                          <?php
                                             $sum = 0;
                                          ?>
                                          @foreach($data2 as $dataDetails)
                                             <?php
                                                $sum += $dataDetails->fare_rs;
                                             ?>
                                          <tr>
                                             <td id="sr_no">1</td>
                                             <td>{{ $dataDetails->purpose_of_journy }}</td>
                                             <td>{{ $dataDetails->departure_dt}}</td>
                                             <td>{{ $dataDetails->departure_station}}</td>
                                             <td>{{ $dataDetails->arrival_dt}}</td>
                                             <td>{{ $dataDetails->arrival_station}}</td>
                                             <td>{{ $dataDetails->class_by}}</td>
                                             <td>{{ $dataDetails->fare_rs}}</td>
                                             <td>{{ $dataDetails->ticket_no}} </td>
                                             <td>{{ $dataDetails->remark}}</td>
                                          </tr>
                                          @endforeach
                                       </tbody>
                                    </table>
                                    <div class="row mt-3">
                                       <div class="form-group col-md-8">
                                          <label class="control-label">Total fare as about</label>
                                       </div>
                                       <div class="form-group col-md-4">
                                          <h2><strong>Total Rs.</strong><span><?php echo number_format($sum,2); ?></span></h2>
                                          {{-- <label class="control-label"> Total Rs.</label> --}}
                                          
                                       </div>
                                    </div>
                                 </div>
                              </div>
                           </div>

                           <div class="form-group col-md-3" >
                              <label class="control-label"><b>Daily Allowance of Days</b></label><br>
                              <span>{{ $datas->daily_allowance_day}}</span>
                           </div>
                           <div class="form-group col-md-3">
                              <label class="control-label"><b>Rs.</b></label><br>
                              <span>{{ $datas->daily_allowance_amonut}}</span>
                           </div>
                           <div class="form-group col-md-3">
                              <label class="control-label"><b>Metropolitan only</b></label><br>
                              <span>{{ $datas->metropolitan}}</span>
                           </div>
                           <div class="form-group col-md-3">
                              <label class="control-label"><b>Rs.</b></label></label><br>
                              <span>{{ $datas->metropolitan_amonut}} </span>
                           </div>

                           <div class="form-group col-md-3">
                              <label class="control-label"><b>Daily Allowance of Days.</b></label><br>
                              <span>{{ $datas->daily_allownce_details}} </span>
                           </div>
                           <div class="form-group col-md-3">
                              <label class="control-label"><b>Rs.</b></b></label><br>
                              <span>{{ $datas->daily_allownce_amount}}</span>
                           </div>

                            <div class="form-group col-md-3">
                              <label class="control-label"><b>Other Localities Journey period</b></label><br>
                              <span>{{ $datas->other_localities}}</span>
                           </div>
                           <div class="form-group col-md-3">
                              <label class="control-label"><b>Rs.</b></label><br>
                              <span>{{ $datas->other_localities_amount}}</span>
                           </div>
                           <div class="form-group col-md-3">
                              <label class="control-label"><b>Conveyance charges (as detailed on revised).</b></label><br>
                              <span>{{ $datas->conveyance_chages_detail}}</span>
                           </div>
                           <div class="form-group col-md-3">
                              <label class="control-label"><b>Rs.</b></label></label><br>
                              <span>{{ $datas->conveyance_chages_amount}} </span>
                           </div>
                           <div class="form-group col-md-3">
                              <label class="control-label"><b>Other charge as detailed on revised.</b></label><br>
                              <span>{{ $datas->other_charge_detail}} </span>
                           </div>
                           <div class="form-group col-md-3">
                              <label class="control-label"><b>Rs.</b></b></label><br>
                              <span>{{ $datas->other_charge_amount}}</span>
                           </div>
                            <div class="form-group col-md-12 mt-5" align="left" >
                              <h2><strong>Total Rs.  </strong><span id="total_fare_amount1">{{number_format($datas->daily_allowance_amonut+$datas->metropolitan_amonut+$datas->daily_allownce_amount + $datas->other_localities_amount + $datas->conveyance_chages_amount + $datas->other_charge_amount,2)}} </span>   </h2>       
                           </div>
                     </div>
                  </div>
         {{--  ............add row for local tour bill amount section........................ --}}
                  <div class="form-group col-md-12" style="width: 100%;">
                        <nav class="navbar navbar-dark bg-dark">
                             <a class="navbar-brand" href="#">Local Tour Amount Details</a>
                        </nav>
                          <nav class="navbar navbar-light" style="background-color: #e3f2fd;">
                            <span>Note:- For conveyance date wise details of journey be given and if necessary separate statement be attached..</span>
                          </nav>
                           <div class="card">
                        <table border="1" style="" id="local-tour-bill-table"{{--  class="table table-striped table-hover table-bordered" --}}>
                                 <thead>
                                   <tr>
                                      {{-- <th rowspan="2">ID</th> --}}
                                      <th rowspan="2">Date</th>
                                      <th colspan="2" align="center">Mode of Conveyance Used </th>
                                      <th colspan="2" align="center">Details of Trip</th>
                                      <th colspan="3">Conveynce</th>
                                   </tr>
                                   <tr>
                                      <th colspan="2"></th>
                                      <th>From</th>
                                      <th>To</th>
                                      <th>Approx(km)</th>
                                      <th>Amount(Rs)</th>
                                      <th >Total Amount/km</th>
                                   </tr>
                                </tr>
                                 </thead>
                                 <tbody>
                                 <?php 
                                    $sum = 0;

                                     foreach($localDatas as $localData){
                                     $sum += $localData->total_amount_pr_km; ?>
                                     <tr id="1">
                                       {{-- <td id="sr_no">1</td> --}}
                                         <td >
                                            <input id="local_tour_dt1" name="local_tour_dt[]" class="form-control datepicker" type="text"  placeholder="dd/mm/yyyy" value="{{ $localData->local_tour_dt}}" readonly>
                                         </td>
                                         <td colspan="2"> 
                                            <textarea id="mode_of_con_used1" name="mode_of_con_used[]" class="form-control" type="text" placeholder="Enter mode of Conveyance" value="{{ $localData->mode_of_con_used}}" required=""readonly>{{ $localData->mode_of_con_used}}</textarea>
                                             @error('mode_of_con_used')
                                             <span class="text-danger" role="alert">
                                             <strong>{{ $message }}</strong>
                                             </span>
                                             @enderror
                                         </td>
                                         <td> 
                                            <input id="from_dt1" name="from_dt[]" class="form-control datepicker" type="text" placeholder="dd/mm/yyyy" value="{{ $localData->from_dt }}"readonly>
                                         </td>
                                         <td> 
                                            <input id="to_dt1" name="to_dt[]" class="form-control datepicker" type="text" placeholder="dd/mm/yyyy" value="{{ $localData->to_dt }}"readonly>
                                         </td>
                                         <td> 
                                            <input id="con_approx_km1" name="con_approx_km[]" class="form-control con_approx_km" type="text" placeholder="Enter Station" value="{{ $localData->con_approx_km }}"readonly>
                                         </td>
                                         <td> 
                                            <input id="con_amount1" name="con_amount[]" class="form-control con_amount" type="text" placeholder="Enter Class By Travelled" value="{{$localData->con_amount }}"readonly>
                                         </td>
                                         {{-- <td><span class="sums" id="total_amount_pr_km1"></span></td> --}}
                                          <td> 
                                            <input id="total_amount_pr_km1" name="total_amount_pr_km[]" class="form-control sums"  type="text" placeholder="" value="{{$localData->total_amount_pr_km }}" readonly>
                                            <span class="sums" id="total_amount_pr_km1"></span>
                                         </td>
                                        {{--  <td><button type="button" name="add_row3" id="add_row3" class="btn btn-success btn-xs">+</button></td> --}}
                                         {{--  <div class="form-group col-md-12 mt-5" align="left" >
                                             
                                         </div> --}}
                                      </tr>
                                      <?php } ?>
                                 </tbody>
                           </table>
                          <h2 align="right"> <strong>Total Rs.  </strong><span class="total_local_fare_amount"> {{number_format($sum,2)}} </span> </h2>
                        </div>
                    </div>
      {{-- End add row for local tour bill amount section...................................... --}}
                  <div class="card">
                     <div class="card-body">
                        <div class="row">
                           <div class="form-group col-md-4">
                              <label class="control-label"><b>Less Advances (if any ) received on</b></label></br>
                              <span>{{ $datas->less_advance_time}} </span>
                           </div>
                           <div class="form-group col-md-2">
                              <label class="control-label"><b>Rs.</b></label></br>
                              <span>{{ $datas->less_advance_amount}} </span>
                           </div>
                           <div class="form-group col-md-4">
                              <label class="control-label"><b>Blance Due from Rs me be accepted case / recovered from my salary </b></label></br>
                              <span>{{ $datas->due_blance_time}}</span>
                           </div>
                           <div class="form-group col-md-2">
                              <label class="control-label"><b>Rs.</b></label></br>
                              <span>{{ $datas->due_amount}}</span>
                           </div>
                        </div>
                     </div>
                  </div>
                  <div class="row mt-3">
                     <div class="form-group col-md-12">
                        <table border="" style="" id="upload_docs_table ">
                           <thead>
                              <tr>
                                 <th >Bills</th>
                                 <th >Download Bills</th>
                              </tr>
                           </thead>
                           <tbody>
                           <?php 
                              $avc = json_decode($datas->bills);
                               foreach ($avc as  $value1) {?>
                              <tr>
                                 <td>
                                    <img src="{{url('/files/'.$value1)}}"  height="100px" width="300px"  />
                                 </td>
                                 {{-- <td><a href="{{'download',$datas->id}}" ><i class="fa fa-arrow-down"></i> Download</a></td> --}}
                                 <td><a href="{{route('download',$datas->id)}}" ><i class="fa fa-arrow-down"></i> Download</a></td>
                              </tr>
                              <?php } ?>
                           </tbody>
                        </table>
                     </div>
                  </div>
               </div>
            </div>
         </div>
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

   // Total Rs..................................................................
   $('.total_rs').on('keyup', function(){
       var total = 0;
       // on every keyup, loop all the elements and add all the results
       $('.total_rs').each(function(index, element) {
           var val = parseFloat($(element).val());
           if( !isNaN( val )){
              total += val;
           }
       });
       $('#total_fare_amount1').html(total);
   });

   });
</script>


@endsection

