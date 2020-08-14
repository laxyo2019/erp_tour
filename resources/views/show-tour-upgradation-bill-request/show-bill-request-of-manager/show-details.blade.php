

@extends('layout.main')
@section('content')
<main class="app-content">
   <div class="app-title">
    <div>
          <h1><i class="app-menu__icon fa fa-comments-o"></i> Edit Tour Amount Bill</h1>
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

            <!-- Modal content-->
            <div class="row">
               <div style="width: 131%;" class="modal-content">

                  <div class="modal-body">
                     <div class="clearix"></div>
                     <div class="col-md-12">
                        <div class="tile">
                           <h3 class="tile-title">Tour Amount Bill Form</h3>
                           <div class="tile-body">
                              {{-- </
                              <INSERT FORM?>
                              --}}
                               @foreach($datas as $key => $data)
                            
                                  <form class="row" action="{{route('tour-amount-bill.update',$data->id)}}" method="post" enctype="multipart/form-data">
                                 @csrf
                                 @method('PUT')

                                 <div class="form-group col-md-3">
                                    <label class="control-label"> T.A Journal Sr. No</label>
                                    <input id="ta_no" name="ta_no" class="form-control" type="text" placeholder="Enter T.A. Journal Sr. No" value="{{ $data->ta_no }}" readonly="">
                                 </div>
                                 <div class="form-group col-md-3">
                                    <label class="control-label"> Bill No</label>
                                    <input id="bill_no" name="bill_no" class="form-control" type="text" placeholder="Enter Bill No" value="{{ $data->bill_no }}"  readonly="">
                                 </div>
                                 <div class="form-group col-md-3">
                                    <label class="control-label">Period of Tour, From</label>
                                    <input id="time_from" name="time_from" class="form-control datepicker" type="text" placeholder="Enter Period of Tour, From" value="{{ date('Y-m-d',strtotime($data->time_from)) }}" readonly="">
                                 </div>
                                 <div class="form-group col-md-3">
                                    <label class="control-label">Period of Tour,To</label>
                                    <input id="time_to" name="time_to" class="form-control datepicker" type="text" placeholder="Enter Period of Tour, To" value="{{ date('Y-m-d',strtotime($data->time_to)) }}" readonly="">
                                 </div>
                                 <div class="form-group col-md-3" >
                                    <label for="Grade">Grade</label>
                                    <input name="grd" class="form-control" id="grd" required="" readonly="" value="{{$data->grd}}">
                                     
                                 </div>
                                 <div class="form-group col-md-3" >
                                    <label for="Designation">Designation</label>
                                    <input name="designation" class="form-control" id="designation" required="" readonly="" value="{{$data->designation}}">
                                       <option value="{{$data->designation}}" >
                                   
                                 </div>
                                 <div class="form-group col-md-3">
                                    <label class="control-label">Tour, From</label>
                                    <input id="tour_from" name="tour_from" class="form-control" type="text" placeholder="Enter tour from" value="{{ $data->tour_from }}" readonly=""> 
                                 </div>
                                 <div class="form-group col-md-3">
                                    <label class="control-label">To</label>
                                    <input id="tour_to" name="tour_to" class="form-control" type="text" placeholder="Enter tour to" value="{{ $data->tour_to}}" readonly="">
                                 </div>
                              {{-- @foreach($data as $datas) --}}

                                 <div class="form-group col-md-12">
                                    <div class="card">
                                       <div class="card-body">
                                          <table border="1" style="" id="invoice-item-table">
                                            <thead>
                                               <tr style="background-color: #e3f2fd;">
                                                  <th rowspan="2">ID</th>
                                                  <th rowspan="2">Purpose of journy & Details of Halt</th>
                                                  <th colspan="3" align="center">Departure</th>
                                                  <th colspan="3" align="center">Arrival</th>
                                                  <th rowspan="2">Class by Which Travelled</th>
                                                  <th rowspan="2">Fare(Rs.)</th>
                                                  <th rowspan="2">Ticket No.</th>
                                                  <th rowspan="2">No. Of Hrs. Day & Remarks</th>
                                                  {{-- <th rowspan="2">Add More</th> --}}
                                               </tr>
                                             
                                               <tr style="background-color: #e3f2fd;">
                                                  <th>Date</th>
                                                  <th>Time</th>
                                                  <th>Station</th>
                                                  <th>Date</th>
                                                  <th>Time</th>
                                                  <th>Station</th>
                                               </tr>
                                             </thead>
                                             <tbody>
                                              @foreach($data2 as $datass)
                                                <tr>
                                                  <td id="sr_no">1</td>
                                                  <td> 
                                                     <input name="id[]" type="hidden" value="{{ $datass->id }}" >
                                                     <textarea id="purpose_of_journy1" name="purpose_of_journy[]" class="form-control" type="text" placeholder="Enter Purpose Of journy" value="{{ $datass->purpose_of_journy }}"  readonly="">{{ $datass->purpose_of_journy }}</textarea>
                                                      @error('purpose_of_journy')
                                                      <span class="text-danger" role="alert">
                                                      <strong>{{ $message }}</strong>
                                                      </span>
                                                      @enderror
                                                  </td>
                                                  <td>
                                                    <input id="departure_dt1" name="departure_dt[]" class="form-control datepicker" type="text"  placeholder="dd/mm/yyyy" value="{{ $datass->departure_dt}}" readonly="">
                                                  </td>
                                                   <td>
                                                    <input id="departure_tm1" name="departure_tm[]" class="form-control timepicker" type="text"  placeholder="hh:mm" value="{{ $datass->departure_tm}}"  readonly="">
                                                  </td>
                                                  <td> 
                                                     <input id="departure_station1" name="departure_station[]" class="form-control" type="text" placeholder="Enter Station" value="{{ $datass->departure_station}}"  readonly="">
                                                  </td>
                                                  <td> 
                                                     <input id="arrival_dt1" name="arrival_dt[]" class="form-control datepicker" type="text" placeholder="dd/mm/yyyy" value="{{ $datass->arrival_dt}}"  readonly="">
                                                  </td>
                                                   <td> 
                                                     <input id="arrival_tm1" name="arrival_tm[]" class="form-control timepicker" type="text" placeholder="hh:mm" value="{{ $datass->arrival_tm}}"  readonly="">
                                                  </td>
                                                  <td> 
                                                     <input id="arrival_station1" name="arrival_station[]" class="form-control" type="text" placeholder="Enter Station" value="{{ $datass->arrival_station}}"  readonly="">
                                                  </td>
                                                  <td> 
                                                     <input id="class_by1" name="class_by[]" class="form-control" type="text" placeholder="Enter Class By Travelled" value="{{ $datass->class_by}}"  readonly="">
                                                  </td>
                                                  <td> 
                                                     <input id="fare_rs1" name="fare_rs[]" class="form-control fare_t" type="text" placeholder="Enter Fare Rs."  value="{{ $datass->fare_rs}}" onclick="myFunction(1)"  readonly="">
                                                  </td>
                                                  <td> 
                                                     <input id="ticket_no1" name="ticket_no[]" class="form-control" type="text" placeholder="Enter Ticket No." value="{{ $datass->ticket_no}}"  readonly="">
                                                  </td>
                                                  <td> <input id="remark1" name="remark[]" class="form-control" type="text" placeholder="Enter Remarks" value="{{ $datass->remark}}"  readonly="">
                                                  </td>
                                               </tr>
                                               @endforeach
                                             </tbody>
                                          </table>
                                        <div class="row mt-3">
                                            <div class="form-group col-md-2">
                                            <label class="control-label"><strong> Total fare as about</strong> Rs.</label> 
                                            <input id="total_fare_amount" name="total_fare_amount" class="form-control total_amount" type="text" placeholder="Enter fare amount" value="{{ $data->total_fare_amount}}" readonly="">
                                         </div>
                                        </div>
                                       </div>
                                    </div>
                                 </div>
  {{--  add row for local tour bill amount section...................................... --}}

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
                                               <tr></tr>
                                             </thead>
                                             <tbody>
                                            <?php 
                                                $sum = 0;
                                                foreach($localDatas as $localData) {
                                                  $sum += $localData->total_amount_pr_km;
                                              ?>
                                              <tr id="{{$localData->ids}}">
                                                {{-- <td id="sr_no">1</td> --}}
                                                  <td >
                                                     <input id="ids[]" name="ids[]" type="hidden" value="{{$localData->ids}}" >
                                                     <input id="local_tour_dt1" name="local_tour_dt[]" class="form-control datepicker" type="text"  placeholder="dd/mm/yyyy" value="{{ $localData->local_tour_dt}}"  readonly="">
                                                    
                                                  </td>
                                                  <td colspan="2"> 
                                                     <textarea id="mode_of_con_used1" name="mode_of_con_used[]" class="form-control" type="text" placeholder="Enter mode of Conveyance" value="{{ $localData->mode_of_con_used}}" required=""  readonly="">{{ $localData->mode_of_con_used}}</textarea>

                                                      @error('mode_of_con_used')
                                                      <span class="text-danger" role="alert">
                                                      <strong>{{ $message }}</strong>
                                                      </span>
                                                      @enderror
                                                  </td>
                                                  <td> 
                                                     <input id="from_dt1" name="from_dt[]" class="form-control datepicker" type="text" placeholder="dd/mm/yyyy" value="{{ $localData->from_dt }}"  readonly="">

                                                  </td>
                                                  <td> 
                                                     <input id="to_dt1" name="to_dt[]" class="form-control datepicker" type="text" placeholder="dd/mm/yyyy" value="{{ $localData->to_dt }}"  readonly="">

                                                  </td>
                                                  <td> 
                                                     <input id="con_approx_km{{$localData->ids}}" name="con_approx_km[]" class="form-control con_approx_km" type="text" placeholder="Enter Station" value="{{ $localData->con_approx_km }}"  readonly="">

                                                  </td>
                                                  <td> 
                                                     <input id="con_amount{{$localData->ids}}" name="con_amount[]" class="form-control con_amount" type="text" placeholder="Enter Class By Travelled" value="{{$localData->con_amount }}"  readonly="">
                                                  </td>
                                                   <td> 
                                                     <input id="total_amount_pr_km{{ $localData->ids }}" name="total_amount_pr_km[]" class="form-control sums"  type="text" placeholder="" value="{{$localData->total_amount_pr_km }}" readonly>
                                                  </td>
                                               </tr>
                                               <?php } ?>

                                             </tbody>
                                          </table>

                                  </div>
                          </div>
                      {{-- End add row for local tour bill amount section...................................... --}}
                                </hr>
                                 <div class="col-md-12 mt-5" {{-- style="border-right: 1px solid;" --}} >
                                      <div class="row">
                                        <div class="form-group col-md-2">
                                           <label class="control-label">Daily Allowance of Days</label>
                                           <input name="daily_allowance_day" class="form-control" id="daily_allowance_day" placeholder="Enter Daily Allowance of Days" value="{{ $data->daily_allowance_day}}"  readonly=""></input>
                                           @error('daily_allowance_day')
                                           <span class="text-danger" role="alert">
                                           <strong>{{ $message }}</strong>
                                           </span>
                                           @enderror
                                        </div>
                                        <div class="form-group col-md-2">
                                           <label class="control-label">Rs.</label><br><br>
                                           <input id="daily_allowance_amonut" name="daily_allowance_amonut" class="form-control total_rs" type="text" placeholder="Enter amount" value="{{ $data->daily_allowance_amonut}}" onclick="myFunction1()"  readonly="">
                                           @error('daily_allowance_amonut')
                                           <span class="text-danger" role="alert">
                                           <strong>{{ $message }}</strong>
                                           </span>
                                           @enderror
                                        </div>
                                        <div class="form-group col-md-2">
                                           <label class="control-label">Metropolitan only</label><br><br>
                                           <input name="metropolitan" class="form-control" id="metropolitan" placeholder="Enter metropolitan"value="{{ $data->metropolitan}}"  readonly=""></input>
                                           @error('metropolitan')
                                           <span class="text-danger" role="alert">
                                           <strong>{{ $message }}</strong>
                                           </span>
                                           @enderror
                                        </div>
                                        <div class="form-group col-md-2">
                                           <label class="control-label">Rs.</label><br><br>
                                           <input id="metropolitan_amonut" name="metropolitan_amonut" class="form-control total_rs" type="text" placeholder="Enter amount"value="{{ $data->metropolitan_amonut}}" onclick="myFunction1()"  readonly="">
                                        </div>
                                      <div class="form-group col-md-3">
                                         <label class="control-label">Conveyance charges (as detailed on revised).Rs.</label>
                                         <input id="conveyance_chages_amount" name="conveyance_chages_amount" class="form-control  total_local_fare_amount" type="text" placeholder="Enter amount" value="{{ $data->conveyance_chages_amount}}" onclick="myFunction1()"  readonly="">
                                         @error('conveyance_chages_amount')
                                         <span class="text-danger" role="alert">
                                         <strong>{{ $message }}</strong>
                                         </span>
                                         @enderror
                                      </div>
                                      <div class="form-group col-md-3">
                                         <label class="control-label">Other charge as detailed on revised.</label>
                                         <input name="other_charge_detail" class="form-control" id="other_charge_detail" placeholder="Enter amount" value="{{ $data->other_charge_detail}}"  readonly=""></input>
                                         @error('other_charge_detail')
                                         <span class="text-danger" role="alert">
                                         <strong>{{ $message }}</strong>
                                         </span>
                                         @enderror
                                      </div>
                                      <div class="form-group col-md-3">
                                         <label class="control-label">Rs.</label><br><br>
                                         <input id="other_charge_amount" name="other_charge_amount" class="form-control total_rs" type="text" placeholder="Enter amount" value="{{ $data->other_charge_amount}}" onclick="myFunction1()"  readonly="">
                                         @error('other_charge_amount')
                                         <span class="text-danger" role="alert">
                                         <strong>{{ $message }}</strong>
                                         </span>
                                         @enderror
                                      </div>
                                      <div class="form-group col-md-12 mt-5" align="left" >
                                         
                                      <?php $total = $data->total_fare_amount + $data->daily_allowance_amonut+$data->metropolitan_amonut+$data->daily_allownce_amount + $data->other_localities_amount + $data->conveyance_chages_amount + $data->other_charge_amount; ?>
		                                  <h2> <strong>Total Amount =  </strong><span id="total_fare_amount1" class="total_local_fare_amount1">{{$total}}</span> </h2>
                                      </div>

                                    </div>
                                 </div>
                              <div class="card">
                                <div class="card-body">
                                  <div class="col-md-12">
                                 <div class="row">
 				 
                                   <div class="form-group col-md-2">
                                    <hr>
                                         <label class="control-label">Less Advances (if any ) received on</label>
                                         <input id="less_advance_time" name="less_advance_time" class="form-control datepicker" type="text" placeholder="yyyy-mm-dd"  value="{{ $data->less_advance_time}}"  readonly="">
                                      </div>
                                      <div class="form-group col-md-2">
                                         <hr>
                                         <label class="control-label">Rs.</label><br><br>
                                         <input id="less_advance_amount" name="less_advance_amount" class="form-control" type="text" placeholder="Enter amount" value="{{ $advance_amount->admin_response}}" readonly=""  >
                                      </div>
                                    <div class="form-group col-md-2">
                                    <hr>
                                          <label class="control-label">Additional Amount.</label><br><br>
                                             <input id="additional_advance_amount" name="additional_advance_amount" class="form-control" type="text" placeholder="Enter amount" value="{{$data->additional_advance_amount}}" readonly="" >
                                      </div>
                                      <div class="form-group col-md-2">
                                         <hr>
                                        <label class="control-label">Advanced <strong>Total Amount</strong></label>
                                             <input id="total_advance_amount" name="total_advance_amount" class="form-control" type="text" value="{{$data->total_advance_amount}}" readonly="" >
                                      </div>
                                      <div class="form-group col-md-4">
                                         <hr>
                                         <label class="control-label">Blance Due from Rs me be accepted case / recovered from my salary Rs.</label>
                                         <input id="due_amount" name="due_amount" class="form-control" type="text" placeholder="Enter Blance due from Rs." value="{{ $total-$data->total_advance_amount}}"  readonly="">
                                      </div>
                                 </div>
                               </div>
                             </div>
                            </div>
                    
                                 <div class="row mt-3">
                                   <div class="form-group col-md-12">
                                     <table border="" style="" id="upload_docs_table">
                                      <thead>
                                         <tr>
                                            <th > Bills</th>
                                            <th > Downlod Bill</th>
                                         </tr>
                                       </thead>
                                       <tbody>
                                         <tr>
                                        <?php 
                                          $avc = json_decode($data->bills);
                                            if ( $avc != null) {

                                             foreach ($avc as $key => $value1) { ?>    
                                          <tr>
                                              {{-- <td> 
                                               <input id="bills" name="bills[]" class="form-control" type="file" placeholder="file" value="{{ $value1}}">
                                                @error('bills')
                                                  <span class="text-danger" role="alert">
                                                  <strong>{{ $message }}</strong>
                                                  </span>
                                                @enderror
                                            </td> --}}
                                             <td>
                                                <img src="{{url('/files/'.$value1)}}"  height="100px" width="300px"  />
                                                 <td><a href="{{route('download',[$data->id, $key])}}" ><i class="fa fa-arrow-down"></i> Download</a></td>
                                                
                                             </td>
                                          </tr>
                                            <?php } }else{
                                              ?>

                                              <tr>
                                             <td>
                                                <img src="{{url('/files/'.$data->bills)}}"  height="100px" width="300px"  />
                                             </td>
                                             <td><a href="{{route('download',[$data->id,$key])}}" ><i class="fa fa-arrow-down"></i> Download</a></td>
                                            
                                          </tr>
                                          <?php } ?>

                                         </tr>
                                       </tbody>
                                    </table>
                                 </div>
                               </div>
                            
                              </form>
                           @endforeach 
                              {{-- END INSERT FORM --}}
                           </div>
                        </div>
                     </div>
                  </div>
                  {{-- 
                  <textarea id="messageArea" name="messageArea" rows="7" class="form-control ckeditor" placeholder="Write your message.."></textarea>
                  --}}
               </div>
            </div>
         </div>
         {{-- 
      </div>
      --}}
   </div>
   </tbody>
   </table>
   </div>
   {{-- </div>    --}}
</main>

@endsection
