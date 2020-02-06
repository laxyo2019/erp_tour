
@extends('layout.main')
@section('content')
<main class="app-content">
   <div class="app-title">
    <div>
          <h1><i class="app-menu__icon fa fa-comments-o"></i> Create Tour Amount Bill</h1>
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
               <div style="width: 100%;" class="modal-content">
                     <div class="col-md-12">
                           <h3 class="tile-title">Tour Amount Bill Form</h3>
                           <div class="tile-body">
                              <form class="row" action="{{route('tour-amount-bill.store')}}" method="post" enctype="multipart/form-data">
                                 @csrf
                                 <div class="form-group col-md-3">
                                    <label class="control-label"> T.A Journal Sr. No</label>
                                    <input id="ta_no" name="ta_no" class="form-control" type="text" placeholder="Enter T.A. Journal Sr. No" value="{{ old('ta_no') }}" required="">
                                    @error('ta_no')
                                    <span class="text-danger" role="alert">
                                    <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                 </div>
                                 <div class="form-group col-md-3">
                                    <label class="control-label"> Bill No</label>
                                    <input id="bill_no" name="bill_no" class="form-control" type="text" placeholder="Enter Bill No" value="{{ old('bill_no') }}" required=""> 
                                    @error('bill_no')
                                    <span class="text-danger" role="alert">
                                    <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                 </div>
                                 <div class="form-group col-md-3">
                                    <label class="control-label">Period of Tour, From</label>
                                    <input id="time_from" name="time_from" class="form-control datepicker" type="text" placeholder="dd/mm/yyyy" value="{{ old('time_from') }}" required="">
                                    @error('time_from')
                                    <span class="text-danger" role="alert">
                                    <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                 </div>
                                 <div class="form-group col-md-3">
                                    <label class="control-label">To</label>
                                    <input id="time_to" name="time_to" class="form-control datepicker" type="text" placeholder="dd/mm/yyyy" value="{{ old('time_to') }}" required="">
                                    @error('time_to')
                                    <span class="text-danger" role="alert">
                                    <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                 </div>
                                 <div class="form-group col-md-3" >
                                    <label for="Grade">Grade</label>
                                    <select name="grd" class="form-control" id="grd" required="">
                                       <option value="" required=""> Select Grade</option>
                                        @foreach($grade as $grades)
                                       <option value="{{$grades->grade}}" >{{$grades->grade}}</option>
                                       @endforeach
                                    </select>
                                    @error('grd')
                                    <span class="text-danger" role="alert">
                                    <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                 </div>
                                 <div class="form-group col-md-3" >
                                    <label for="Designation">Designation</label>
                                    <select name="designation" class="form-control" id="designation" required="" >
                                       <option value="" required=""> Select Designation</option>
                                       @foreach($designation as $designations)
                                       <option value="{{$designations->designation}}">{{$designations->designation}}</option>
                                       @endforeach
                                    </select>
                                    </select>
                                    @error('designation')
                                    <span class="text-danger" role="alert">
                                    <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                 </div>
                                 <div class="form-group col-md-3">
                                    <label class="control-label">Tour, From</label>
                                    <input id="tour_from" name="tour_from" class="form-control" type="text" placeholder="Enter tour from" value="{{ old('tour_from') }}" required=""> 
                                    @error('tour_from')
                                    <span class="text-danger" role="alert">
                                    <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                 </div>
                                 <div class="form-group col-md-3">
                                    <label class="control-label">To</label>
                                    <input id="tour_to" name="tour_to" class="form-control" type="text" placeholder="Enter tour to" value="{{ old('tour_to') }}" required="">
                                    @error('tour_to')
                                    <span class="text-danger" role="alert">
                                    <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                 </div>

                                 <div class="form-group col-md-12" style="width: 100%;">
                                    <div class="card">
                                          <table border="1" style="" id="invoice-item-table"{{--  class="table table-striped table-hover table-bordered" --}}>
                                            <thead>
                                               <tr style="background-color: #e3f2fd;"> 
                                                  {{-- <th rowspan="2">ID</th> --}}
                                                  <th rowspan="2">Purpose of journy & Details of Halt</th>
                                                  <th colspan="3" align="center">Departure</th>
                                                  <th colspan="3" align="center">Arrival</th>
                                                  <th rowspan="2">Class by Which Travelled</th>
                                                  <th rowspan="2">Fare(Rs.)</th>
                                                  <th rowspan="2">Ticket No.</th>
                                                  <th rowspan="2">No. Of Hrs. Day & Remarks</th>
                                                  <th rowspan="2">Add More</th>
                                               </tr>
                                             
                                               <tr style="background-color: #e3f2fd;">
                                                  <th>Date</th>
                                                  <th>Time</th>
                                                  <th>Station</th>
                                                  <th>Date</th>
                                                  <th>Time</th>
                                                  <th>Station</th>
                                               </tr>
                                               <tr></tr>
                                             </thead>
                                             <tbody>
                                               <tr id="tr">
                                                  {{-- <td id="sr_no">1</td> --}}
                                                  <td> 
                                                     <textarea id="purpose_of_journy1" name="purpose_of_journy[]" class="form-control" type="text" placeholder="Enter Purpose Of journy" value="{{ old('purpose_of_journy[]') }}" required=""></textarea>
                                                      @error('purpose_of_journy')
                                                      <span class="text-danger" role="alert">
                                                      <strong>{{ $message }}</strong>
                                                      </span>
                                                      @enderror
                                                  </td>
                                                  <td>
                                                     <input id="departure_dt1" name="departure_dt[]" class="form-control datepicker" type="text"  placeholder="dd/mm/yyyy" value="{{ old('departure_dt[]') }}" required="">
                                                  </td>
                                                  <td> 
                                                     <input id="departure_tm1" name="departure_tm[]" class="form-control timepicker" type="text" placeholder="hh:mm" value="{{ old('departure_tm[]') }}" required="">
                                                  </td>
                                                  <td> 
                                                     <input id="departure_station1" name="departure_station[]" class="form-control" type="text" placeholder="Enter Station" value="{{ old('departure_station[]') }}" required="">
                                                  </td>
                                                  <td> 
                                                     <input id="arrival_dt1" name="arrival_dt[]" class="form-control datepicker" type="text" placeholder="dd/mm/yyyy" value="{{ old('arrival_dt[]') }}" required="">
                                                  </td>
                                                   <td> 
                                                     <input id="arrival_tm1" name="arrival_tm[]" class="form-control timepicker" type="text" placeholder="hh:mm" value="{{ old('arrival_tm[]') }}" required="">
                                                  </td>
                                                  <td> 
                                                     <input id="arrival_station1" name="arrival_station[]" class="form-control" type="text" placeholder="Enter Station" value="{{ old('arrival_station[]') }}" required="">
                                                  </td>
                                                  <td> 
                                                     <input id="class_by1" name="class_by[]" class="form-control" type="text" placeholder="Enter Class By Travelled" value="{{ old('class_by[]') }}" required="">
                                                  </td>
                                                  <td class="td"> 
                                                    <input id="fare_rs1" name="fare_rs[]" class="form-control fare_t" type="text" placeholder="Enter Fare Rs." value="{{ old('fare_rs[]') }}" onclick="addFareAmount(1)" required="">
                                                  </td>
                                                  <td> 
                                                     <input id="ticket_no1" name="ticket_no[]" class="form-control" type="text" placeholder="Enter Ticket No." value="{{ old('ticket_no[]') }}" required="">
                                                  </td>
                                                  <td> <input id="remark1" name="remark[]" class="form-control" type="text" placeholder="Enter Remarks" value="{{ old('remark[]') }}">
                                                  </td>
                                                  <td><button type="button" name="add_row" id="add_row" class="btn btn-success btn-xs">+</button></td>
                                               </tr>
                                             </tbody>
                                          </table>
                                        <div class="row mt-3">
                                            <div class="form-group col-md-8">
                                            <label class="control-label">Total fare as about</label>
                                            <textarea name="total_fare_details" class="form-control" id="total_fare_details" placeholder="Enter Total fare as about"  value="{{ old('total_fare_details') }}" required="">{{ old('total_fare_details') }}</textarea>
                                            @error('total_fare_details')
                                            <span class="text-danger" role="alert">
                                            <strong>{{ $message }}</strong>
                                            </span>
                                            @enderror
                                         </div>
                                         <div class="form-group col-md-4">
                                            <label class="control-label"> Total Rs.</label>
                                            <input id="total_fare_amount" name="total_fare_amount" class="form-control total_amount" type="text" placeholder="Enter fare amount" value="" required="" readonly="">
                                            @error('total_fare_amount')
                                            <span class="text-danger" role="alert">
                                            <strong>{{ $message }}</strong>
                                            </span>
                                            @enderror
                                         </div>
                                        </div>
                                       {{-- </div> --}}
                                    </div>
                                 </div>

                                </hr>
                                 <div class="col-md-6 mt-5" {{-- style="border-right: 1px solid;" --}} >
                                      <div class="row">
                                        <div class="form-group col-md-8">
                                           <label class="control-label">Daily Allowance of Days</label>
                                           <textarea name="daily_allowance_day" class="form-control" id="daily_allowance_day" placeholder="Enter Daily Allowance of Days" value="{{ old('daily_allowance_day') }}">{{ old('daily_allowance_day') }}</textarea>
                                           @error('daily_allowance_day')
                                           <span class="text-danger" role="alert">
                                           <strong>{{ $message }}</strong>
                                           </span>
                                           @enderror
                                        </div>
                                        <div class="form-group col-md-4">
                                           <label class="control-label">Rs.</label>
                                           <input id="daily_allowance_amonut" name="daily_allowance_amonut" class="form-control total_rs" type="text" placeholder="Enter amount" value="{{ old('daily_allowance_amonut') }}" onclick="addAmount()">
                                           @error('daily_allowance_amonut')
                                           <span class="text-danger" role="alert">
                                           <strong>{{ $message }}</strong>
                                           </span>
                                           @enderror
                                        </div>
                                        <div class="form-group col-md-8">
                                           <label class="control-label">Metropolitan only</label>
                                           <textarea name="metropolitan" class="form-control " id="metropolitan" placeholder="Enter metropolitan"value="{{ old('daily_allowance_amonut') }}">{{ old('daily_allowance_amonut') }}</textarea>
                                           @error('metropolitan')
                                           <span class="text-danger" role="alert">
                                           <strong>{{ $message }}</strong>
                                           </span>
                                           @enderror
                                        </div>
                                        <div class="form-group col-md-4">
                                           <label class="control-label">Rs.</label>
                                           <input id="metropolitan_amonut" name="metropolitan_amonut" class="form-control total_rs" type="text" placeholder="Enter amount"value="{{ old('daily_allowance_amonut') }}" onclick="addAmount()">
                                           @error('metropolitan_amonut')
                                           <span class="text-danger" role="alert">
                                           <strong>{{ $message }}</strong>
                                           </span>
                                           @enderror
                                        </div>
                                        <div class="form-group col-md-8">
                                           <label class="control-label">Daily Allowance of Days.</label>
                                           <textarea name="daily_allownce_details" class="form-control " id="daily_allownce_details" placeholder="Enter Daily Allowance"value="{{ old('daily_allowance_amonut') }}">{{ old('daily_allowance_amonut') }}</textarea>
                                           @error('daily_allownce_details')
                                           <span class="text-danger" role="alert">
                                           <strong>{{ $message }}</strong>
                                           </span>
                                           @enderror
                                        </div>
                                        <div class="form-group col-md-4">
                                           <label class="control-label">Rs</label>
                                           <input id="daily_allownce_amount" name="daily_allownce_amount" class="form-control total_rs" type="text" placeholder="Enter tour to" value="{{ old('daily_allowance_amonut') }}" onclick="addAmount()">
                                           @error('daily_allownce_amount')
                                           <span class="text-danger" role="alert">
                                           <strong>{{ $message }}</strong>
                                           </span>
                                           @enderror
                                        </div>
                                      </div>
                                 </div>
                                 <div class="col-md-6 mt-5">
                                    <div class="row">
                                      <div class="form-group col-md-8">
                                         <label class="control-label">Other Localities Journey period</label>
                                         <textarea name="other_localities" class="form-control" id="other_localities" placeholder="Enter Other Localities" value="{{ old('other_localities') }}">{{ old('other_localities') }}</textarea>
                                         @error('other_localities')
                                         <span class="text-danger" role="alert">
                                         <strong>{{ $message }}</strong>
                                         </span>
                                         @enderror
                                      </div>
                                      <div class="form-group col-md-4">
                                         <label class="control-label">Rs.</label>
                                         <input id="other_localities_amount" name="other_localities_amount" class="form-control total_rs" type="text" placeholder="Enter amount" value="{{ old('other_localities_amount') }}" onclick="addAmount()">
                                         @error('other_localities_amount')
                                         <span class="text-danger" role="alert">
                                         <strong>{{ $message }}</strong>
                                         </span>
                                         @enderror
                                      </div>
                                      <div class="form-group col-md-8">
                                         <label class="control-label">Conveyance charges (as detailed on revised).</label>
                                         <textarea name="conveyance_chages_detail" class="form-control" id="conveyance_chages_detail" placeholder="Enter Conveyance charges details" value="{{ old('conveyance_chages_detail') }}">{{ old('conveyance_chages_detail') }}</textarea>
                                         @error('conveyance_chages_detail')
                                         <span class="text-danger" role="alert">
                                         <strong>{{ $message }}</strong>
                                         </span>
                                         @enderror
                                      </div>
                                      <div class="form-group col-md-4">
                                         <label class="control-label">Rs.</label>
                                         <input id="conveyance_chages_amount" name="conveyance_chages_amount" class="form-control total_rs" type="text" placeholder="Enter amount" value="{{ old('conveyance_chages_amount') }}" onclick="addAmount()">
                                         @error('conveyance_chages_amount')
                                         <span class="text-danger" role="alert">
                                         <strong>{{ $message }}</strong>
                                         </span>
                                         @enderror
                                      </div>
                                      <div class="form-group col-md-8">
                                         <label class="control-label">Other charge as detailed on revised.</label>
                                         <textarea name="other_charge_detail" class="form-control" id="other_charge_detail" placeholder="Enter amount" value="{{ old('other_charge_detail') }}"></textarea>
                                         @error('other_charge_detail')
                                         <span class="text-danger" role="alert">
                                         <strong>{{ $message }}</strong>
                                         </span>
                                         @enderror
                                      </div>
                                      <div class="form-group col-md-4">
                                         <label class="control-label">Rs.</label>
                                         <input id="other_charge_amount" name="other_charge_amount" class="form-control total_rs" type="text" placeholder="Enter amount" value="{{ old('other_charge_amount') }}" onclick="addFareAmount()" onclick="addAmount()">
                                         @error('other_charge_amount')
                                         <span class="text-danger" role="alert">
                                         <strong>{{ $message }}</strong>
                                         </span>
                                         @enderror
                                      </div>
                                      <div class="form-group col-md-12 mt-5" align="left" >
                                          <h2> <strong>Total Rs.  </strong><span id="total_fare_amount1"></span> </h2>
                                      </div>
                                    </div>
                                 </div>
                              <div class="card">
                                <div class="card-body">
                                 <div class="row">
                                   <div class="form-group col-md-4">
                                    <hr>
                                         <label class="control-label">Less Advances (if any ) received on</label>
                                         <input id="less_advance_time" name="less_advance_time" class="form-control" type="tex" placeholder="Enter Period of Less Advances (if any) received on date time"  value="{{ old('less_advance_time') }}">
                                         @error('less_advance_time')
                                         <span class="text-danger" role="alert">
                                         <strong>{{ $message }}</strong>
                                         </span>
                                         @enderror
                                      </div>
                                      <div class="form-group col-md-2">
                                         <hr>
                                         <label class="control-label">Rs.</label>
                                         <input id="less_advance_amount" name="less_advance_amount" class="form-control" type="text" placeholder="Enter amount" value="{{ old('less_advance_amount') }}">
                                         @error('less_advance_amount')
                                         <span class="text-danger" role="alert">
                                         <strong>{{ $message }}</strong>
                                         </span>
                                         @enderror
                                      </div>
                                      <div class="form-group col-md-4">
                                         <hr>
                                         <label class="control-label">Blance Due from Rs me be accepted case / recovered from my salary</label>
                                         <input id="due_blance_time" name="due_blance_time" class="form-control" type="text" placeholder="Enter blance Due" value="{{ old('due_blance_time') }}">
                                         @error('due_blance_time')
                                         <span class="text-danger" role="alert">
                                         <strong>{{ $message }}</strong>
                                         </span>
                                         @enderror
                                      </div>
                                      <div class="form-group col-md-2">
                                         <hr>
                                         <label class="control-label">Rs.</label>
                                         <input id="due_amount" name="due_amount" class="form-control" type="text" placeholder="Enter Blance due from Rs." value="{{ old('due_amount') }}">
                                         @error('due_amount')
                                         <span class="text-danger" role="alert">
                                         <strong>{{ $message }}</strong>
                                         </span>
                                         @enderror
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
                                               <tr style="background-color: #e3f2fd;">
                                                  {{-- <th rowspan="2">ID</th> --}}
                                                  <th rowspan="2">Date</th>
                                                  <th colspan="2" align="center">Mode of Conveyance Used </th>
                                                  <th colspan="2" align="center">Details of Trip</th>
                                                  <th colspan="3">Conveynce</th>
                                                  <th colspan="3">Add More</th>
                                               </tr>
                                               <tr style="background-color: #e3f2fd;">
                                                  <th colspan="2"></th>
                                                  <th>From</th>
                                                  <th>To</th>
                                                  <th>Approx(km)</th>
                                                  <th>Amount(Rs)</th>
                                                  <th >Total Amount/km</th>
                                                  {{-- <th></th> --}}
                                               </tr>
                                               <tr></tr>
                                             </thead>
                                             <tbody>
                                              <tr id="1">
                                                {{-- <td id="sr_no">1</td> --}}
                                                  <td >
                                                     <input id="local_tour_dt1" name="local_tour_dt[]" class="form-control datepicker" type="text"  placeholder="dd/mm/yyyy" value="{{ old('local_tour_dt[]') }}" >
                                                    
                                                  </td>
                                                  <td colspan="2"> 
                                                     <textarea id="mode_of_con_used1" name="mode_of_con_used[]" class="form-control" type="text" placeholder="Enter mode of Conveyance" value="{{ old('mode_of_con_used[]') }}" ></textarea>
                                                      @error('mode_of_con_used')
                                                      <span class="text-danger" role="alert">
                                                      <strong>{{ $message }}</strong>
                                                      </span>
                                                      @enderror
                                                  </td>
                                                  <td> 
                                                     <input id="from_dt1" name="from_dt[]" class="form-control datepicker" type="text" placeholder="dd/mm/yyyy" value="{{ old('from_dt[]') }}">
                                                  </td>
                                                  <td> 
                                                     <input id="to_dt1" name="to_dt[]" class="form-control datepicker" type="text" placeholder="dd/mm/yyyy" value="{{ old('to_dt[]') }}">
                                                  </td>
                                                  <td> 
                                                     <input id="con_approx_km1" name="con_approx_km[]" class="form-control con_approx_km" type="text" placeholder="Enter Station" value="{{ old('con_approx_km[]') }}">
                                                  </td>
                                                  <td> 
                                                     <input id="con_amount1" name="con_amount[]" class="form-control con_amount" type="text" placeholder="Enter Class By Travelled" value="{{ old('con_amount[]') }}">
                                                  </td>
                                                  {{-- <td><span class="sums" id="total_amount_pr_km1"></span></td> --}}
                                                   <td> 
                                                     <input id="total_amount_pr_km1" name="total_amount_pr_km[]" class="form-control sums"  type="text" placeholder="" value="" readonly="">
                                                     {{-- <span class="sums" id="total_amount_pr_km1"></span> --}}
                                                  </td>
                                                  <td><button type="button" name="add_row3" id="add_row3" class="btn btn-success btn-xs">+</button></td>
                                                   <div class="form-group col-md-12 mt-5" align="left" >
                                                      
                                                  </div>
                                               </tr>
                                             </tbody>
                                          </table>
                                          <h2 align="right"> <strong>Total Rs.  </strong><span class="total_local_fare_amount">0</span> </h2>
                                    </div>
                                  </div>
                                {{-- End add row for local tour bill amount section...................................... --}}

                                {{--  add row for image upload section...................................... --}}
                                <div class="card mt-3">
                                  <div class="card-body">
                                   <div class="row ">
                                     <div class="form-group col-md-12">
                                       <table border="" style="" id="upload_docs_table" class="table table-striped table-hover table-bordered">
                                        <thead>
                                           <tr>
                                              <th >ID</th>
                                              <th >Upload Bills</th>
                                              <th>Add More</th>
                                           </tr>
                                         </thead>
                                         <tbody>
                                           <tr>
                                              <td id="sr_no">1</td>
                                              <td> 
                                                 <input id="bills" name="bills[]" class="form-control" type="file" placeholder="file" value="{{ old('bills[]') }}" required="">
                                                  @error('bills')
                                                    <span class="text-danger" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                    </span>
                                                  @enderror
                                              </td>
                                              <td><button type="button" name="add_row1" id="add_row1" class="btn btn-success btn-xs">+</button></td>
                                           </tr>
                                         </tbody>
                                      </table>
                                   </div>
                                 </div>
                               </div>
                             </div>
                            <div class="form-group align-self-end col-md-6 mt-3">
                                <button id="addGrade" class="btn btn-primary" type="submit">
                                <i class="fa fa-fw fa-lg fa-check-circle"></i>Send
                                </button>
                           </div>
                          </form>
                        </div>
                      </div>
                     </div>
                  </div>
               </div>
              {{--  end add row for image upload section...................................... --}}
       </tbody>
    </table>
</div>
</main>
@endsection
<script type="text/javascript" charset="utf8" src="http://ajax.aspnetcdn.com/ajax/jQuery/jquery-2.2.4.min.js"></script>
 
{{-- js for datetime picker............................  --}}
<script> 
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
{{-- add table row For Tour Amont bill.................................. --}}

   $(document).ready(function(){
     var final_total_amt = $('#final_total_amt').text();
     var count = 1;
     
     $('#add_row').on('click', function(){
       //alert();
       count++;
       $('#total_item').val(count);
       var html_code = '';
       html_code += '<tr id="row_id_'+count+'">';
       // html_code += '<td><span id="sr_no">'+count+'</span></td>';
       
       html_code += '<td><textarea name="purpose_of_journy[]" id="purpose_of_journy'+count+'" class="form-control input-sm" placeholder="Enter Purpose Of journy"/ required=""></textarea></td>';
   
       html_code += '<td><input  name="departure_dt[]" type="text" id="departure_dt'+count+'" data-srno="'+count+'" class="form-control input-sm datepicker"  placeholder="dd/mm/yyyy " required=""/></td>';

        html_code += '<td><input type="text" name="departure_tm[]" id="departure_tm'+count+'" data-srno="'+count+'" class="form-control input-sm timepicker"  placeholder="hh:mm" required=""/></td>';
   
       html_code += '<td><input type="text" name="departure_station[]" id="departure_station'+count+'" data-srno="'+count+'" class="form-control input-sm " placeholder="Enter Station" required=""/></td>';
   
       html_code += '<td><input type="text" name="arrival_dt[]" id="arrival_dt'+count+'" data-srno="'+count+'" class="form-control input-sm datepicker"  placeholder="dd/mm/yyyy"  required=""/></td>';

      html_code += '<td><input type="text" name="arrival_tm[]" id="arrival_tm'+count+'" data-srno="'+count+'" class="form-control input-sm"  placeholder="hh:mm"  required=""/></td>';

       html_code += '<td><input type="text" name="arrival_station[]" id="arrival_station'+count+'" data-srno="'+count+'" class="form-control input-sm" placeholder="Enter Station" required=""/></td>';
   
       html_code += '<td><input type="text" name="class_by[]" id="class_by'+count+'" data-srno="'+count+'" class="form-control input-sm" placeholder="Enter Class By Travelled" required=""/></td>';
   
       html_code += '<td class="td"><input type="text" name="fare_rs[]" id="fare_rs'+count+'" data-srno="'+count+'" class="form-control fare_t" placeholder="Enter Fare Rs."  onclick="addFareAmount('+count+')" required=""/></td>';
   
       html_code += '<td><input type="text" name="ticket_no[]" id="ticket_no'+count+'" data-srno="'+count+'" class="form-control " placeholder="Enter Ticket No."  required=""/></td>';
   
       html_code += '<td><input type="text" name="remark[]" id="remark'+count+'" data-srno="'+count+'" class="form-control " placeholder="Enter Remarks" required=""/></td>';
   
       html_code += '<td><button type="button" name="remove_row" id="'+count+'" class="btn btn-danger btn-xs remove_row">X</button></td>';
   
      
       html_code += '</tr>';
       $('#invoice-item-table').append(html_code);
     });
     
     $(document).on('click', '.remove_row', function(){
       var row_id = $(this).attr("id");
       var tr_id = "#fare_rs"+row_id;
       var data = $(tr_id).val();
       var total = $('#total_fare_amount').val();
       var amt = total-data;
       $('#total_fare_amount').val(amt);
       $('#row_id_'+row_id).remove();
       count--;
       $('#total_item').val(count);


     });

     /*$(document).ready(function(){
       $("#fare_rs"+count).keyup(function(){
          alert(count);
          var textinput = $('#fare_rs'+count).val().substring(0,8);
           $("#total_fare_amount").val(textinput);

          });
      });*/
   
   });
/* end add table row For Tour Amont bill..................................*/

/* add table row For image bill..................................*/

   $(document).ready(function(){
     var final_total_amt = $('#final_total_amt').text();
     var count = 1;
     
     $(document).on('click', '#add_row1', function(){
       //alert();
       count++;
       $('#total_item1').val(count);
       var html_code = '';
       html_code += '<tr id="row_id_'+count+'">';
       html_code += '<td><span id="sr_no">'+count+'</span></td>';
       
       html_code += '<td><input type="file" name="bills[]" id="bills'+count+'" class="form-control input-sm" placeholder="Enter Purpose Of journy" name="bills" required=""/></td>';
   
       html_code += '<td><button type="button" name="remove_row1" id="'+count+'" class="btn btn-danger btn-xs remove_row_image">X</button></td>';
   
      
       html_code += '</tr>';
       $('#upload_docs_table').append(html_code);
     });
     
     $(document).on('click', '.remove_row_image', function(){
       var row_id = $(this).attr("id");
       var total_item_amount = $('#order_item_final_amount'+row_id).val();
       var final_amount = $('#final_total_amt').text();
       var result_amount = parseFloat(final_amount) - parseFloat(total_item_amount);
       $('#final_total_amt').text(result_amount);
       $('#row_id_'+row_id).remove();
       count--;
       $('#total_item1').val(count);
     });
   
   });
/* end add table row For image bill..................................*/


/* add table row For local tour amount bill..................................*/
    $(document).ready(function(){
     var final_total_amt = $('#final_total_amt').text();
     var count = 1;
     
     $(document).on('click', '#add_row3', function(){
       count++;
       $('#total_item1').val(count);
       var html_code = '';
       html_code += '<tr id="'+count+'">';
       // html_code += '<td><span id="sr_no">'+count+'</span></td>';
       
      // html_code += '<td><inpute type="text" name="local_tour_dt[]" id="local_tour_dt'+count+'" data-srno="'+count+'"class="form-control input-sm" placeholder="dd/mm/yyyy"/></td>';
   
      html_code += '<td><input type="text" name="local_tour_dt[]" id="local_tour_dt'+count+'" data-srno="'+count+'" class="form-control input-sm timepicker"  placeholder="dd/mm/yyyy"/></td>';

       html_code += '<td colspan="2"><textarea name="mode_of_con_used[]" type="text" id="mode_of_con_used'+count+'" data-srno="'+count+'" class="form-control input-sm datepicker"  placeholder="Enter mode of Conveyance"/></textarea></td>';

        html_code += '<td><input type="text" name="from_dt[]" id="from_dt'+count+'" data-srno="'+count+'" class="form-control input-sm timepicker"  placeholder="dd/mm/yyyy"/></td>';
   
       html_code += '<td><input type="text" name="to_dt[]" id="to_dt'+count+'" data-srno="'+count+'" class="form-control input-sm " placeholder="dd/mm/yyyy"/></td>';
   
       html_code += '<td><input type="text" name="con_approx_km[]" id="con_approx_km'+count+'" data-srno="'+count+'" class="form-control input-sm con_approx_km"  placeholder="Enter KM"  /></td>';

      html_code += '<td><input type="text" name="con_amount[]" id="con_amount'+count+'" data-srno="'+count+'" class="form-control input-sm con_amount"  placeholder="Enter amount"></td>';

      // html_code += '<td><span class="sums" id="total_amount_pr_km'+count+'"></span></td>';
      html_code += '<td><input id="total_amount_pr_km'+count+'" name="total_amount_pr_km[]" class="form-control sums"  type="text" placeholder="" value="">';

       html_code += '<td><button type="button" name="remove_row1" id="'+count+'" class="btn btn-danger btn-xs remove_row3">X</button></td>';
   
      
       html_code += '</tr>';
       $('#local-tour-bill-table').append(html_code);
    
    });

/* add total local amount bill..................................*/

     $(document).on('blur','.con_amount, .con_approx_km',function(){
        
        var parent_id = $(this).parent().parent().attr('id');
        var amount = $('#con_amount'+parent_id).val();
        var con_approx_km = $('#con_approx_km'+parent_id).val();
        // console.log(amount);
        // console.log(con_approx_km);

        var con_appx_id = '#con_approx_km'+parent_id;
        var total_id = '#total_amount_pr_km'+parent_id; 

        if(con_approx_km !='' &&  amount !=''){

          var sum_amount = $(total_id).val(); 
          if(!sum_amount){
            sum_amount = 0;
          }
         $(total_id).text(''); 
          
          row_amount = (parseFloat(con_approx_km) * parseFloat(amount));

          $(total_id).val(parseFloat(row_amount));
       // console.log(row_amount);

         var old_total_amount = $('.total_local_fare_amount').text();  //For minus purpose
          var total_amount = parseFloat(old_total_amount)  - parseFloat(sum_amount);
           $('.total_local_fare_amount').text('');
          $('.total_local_fare_amount').text(total_amount);


          var old_total_amount1 = $('.total_local_fare_amount').text();
          var total_amount1 = parseFloat(row_amount) + parseFloat(old_total_amount1);
          $('.total_local_fare_amount').text('');
          $('.total_local_fare_amount').text(total_amount1);
          
        }

     });

     
     $(document).on('click', '.remove_row3', function(){
       var row_id = $(this).attr("id");

       var total_id = '#total_amount_pr_km'+row_id; 
       var row_amount =   $(total_id).text(); 
       if(row_amount  == ''){
        row_amount = 0;
       }

       var old_total_amount = $('.total_local_fare_amount').text();
        var total_amount = parseFloat(old_total_amount) - parseFloat(row_amount);
        $('.total_local_fare_amount').text('');
        $('.total_local_fare_amount').text(total_amount);
       $('#'+row_id).remove();
     });
   


   });
/* end add table row For local tour amount bill..................................*/


/* add amount fare_rs amount bill..................................*/

function addFareAmount(id) {

$('.fare_t').on('keyup', function(){
    var total = 0;
    // on every keyup, loop all the elements and add all the results
    $('.fare_t').each(function(index, element) {
        var val = parseFloat($(element).val());
        if( !isNaN( val )){
           total += val;
        }
    });
    $('#total_fare_amount').val(total);
});
}

/* add  total amount bill..................................*/

function addAmount(id) {

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
}



</script>




