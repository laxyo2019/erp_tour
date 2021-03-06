

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
      {{-- <a class="btn btn-info btn-lg" href="{{route('TourRequest.create')}}"  >New Request</a> --}}
      <!-- Modal -->
      {{-- 
      <div class="modal fade" id="myModal" role="dialog">
         --}}
         {{-- 
         <div class="modal-dialog">
            --}}
            <!-- Modal content-->
            <div class="row">
               <div style="width: 131%;" class="modal-content">
                  {{-- 
                  <div class="modal-header">
                     <button type="button" class="close" data-dismiss="modal">&times;</button>
                     <h4 class="modal-title"></h4>
                  </div>
                  --}}
                  <div class="modal-body">
                     <div class="clearix"></div>
                     <div class="col-md-12">
                        <div class="tile">
                           <h3 class="tile-title">Tour Amount Bill Form</h3>
                           <div class="tile-body">
                              {{-- </
                              <INSERT FORM?>
                              --}}

                              @foreach($datas as $data)
                              <form class="row" action="{{route('tour-amount-bill.update',$data->id)}}" method="post" enctype="multipart/form-data">
                                 @csrf
                                 @method('PUT')

                                 <div class="form-group col-md-3">
                                    <label class="control-label"> T.A Journal Sr. No</label>
                                    <input id="ta_no" name="ta_no" class="form-control" type="text" placeholder="Enter T.A. Journal Sr. No" value="{{ $data->ta_no }}">
                                    @error('ta_no')
                                    <span class="text-danger" role="alert">
                                    <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                 </div>
                                 <div class="form-group col-md-3">
                                    <label class="control-label"> Bill No</label>
                                    <input id="bill_no" name="bill_no" class="form-control" type="text" placeholder="Enter Bill No" value="{{ $data->bill_no }}">
                                    @error('bill_no')
                                    <span class="text-danger" role="alert">
                                    <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                 </div>
                                 <div class="form-group col-md-3">
                                    <label class="control-label">Period of Tour, From</label>
                                    <input id="time_from" name="time_from" class="form-control" type="date" placeholder="Enter Period of Tour, From" value="{{ $data->time_from }}">
                                    @error('time_from')
                                    <span class="text-danger" role="alert">
                                    <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                 </div>
                                 <div class="form-group col-md-3">
                                    <label class="control-label">To</label>
                                    <input id="time_to" name="time_to" class="form-control" type="date" placeholder="Enter Period of Tour, To" value="{{ $data->time_to }}">
                                    @error('time_to')
                                    <span class="text-danger" role="alert">
                                    <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                 </div>
                                 {{-- 
                                 <div class="form-group col-md-6">
                                    <label class="control-label"> Your Name</label>
                                    <input id="name" name="emp_name" class="form-control" type="text" placeholder="Enter Name">
                                    @error('emp_name')
                                    <span class="text-danger" role="alert">
                                    <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                 </div>
                                 --}}
                                 <div class="form-group col-md-3" >
                                    <label for="Grade">Grade</label>
                                    {{-- <input id="grd" name="grd" class="form-control" type="text" placeholder="Enter Grade"> --}}
                                    <select name="grd" class="form-control" id="grd" required="">
                                       <option value=""> Select Grade</option>
                                        @foreach($grade as $grades)
                                       <option value="{{$data->grade}}" >{{$grades->grade}}</option>
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
                                    {{-- <input id="designation" name="designation" class="form-control" type="text" placeholder="Enter Designation"> --}}
                                    <select name="designation" class="form-control" id="designation" required="">
                                       <option value=""> Select Designation</option>
                                       @foreach($designation as $designations)
                                       <option value="{{$data->designation}}">{{$designations->designation}}</option>
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
                                    <input id="tour_from" name="tour_from" class="form-control" type="text" placeholder="Enter tour from" value="{{ $data->tour_from }}"> 
                                    @error('tour_from')
                                    <span class="text-danger" role="alert">
                                    <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                 </div>
                                 <div class="form-group col-md-3">
                                    <label class="control-label">To</label>
                                    <input id="tour_to" name="tour_to" class="form-control" type="text" placeholder="Enter tour to" value="{{ $data->tour_to}}">
                                    @error('tour_to')
                                    <span class="text-danger" role="alert">
                                    <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                 </div>

                                 <div class="form-group col-md-12">
                                    <div class="card">
                                       <div class="card-body">
                                          <table border="1" style="" id="invoice-item-table">
                                            <thead>
                                               <tr>
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
                                             
                                               <tr>
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
                                                     <input id="purpose_of_journy1" name="purpose_of_journy[]" class="form-control" type="text" placeholder="Enter Purpose Of journy" value="{{ $datass->purpose_of_journy }}" >
                                                      @error('purpose_of_journy')
                                                      <span class="text-danger" role="alert">
                                                      <strong>{{ $message }}</strong>
                                                      </span>
                                                      @enderror
                                                  </td>
                                                  <td>
                                                    <input id="departure_dt1" name="departure_dt[]" class="form-control datepicker" type="text"  placeholder="dd/mm/yyyy" value="{{ $datass->departure_dt}}">
                                                  </td>
                                                   <td>
                                                    <input id="departure_tm1" name="departure_tm[]" class="form-control timepicker" type="datetime-local"  placeholder="hh:mm" value="{{ $datass->departure_tm}}">
                                                  </td>
                                                  <td> 
                                                     <input id="departure_station1" name="departure_station[]" class="form-control" type="text" placeholder="Enter Station" value="{{ $datass->departure_station}}">
                                                  </td>
                                                  <td> 
                                                     <input id="arrival_dt1" name="arrival_dt[]" class="form-control datepicker" type="text" placeholder="dd/mm/yyyy" value="{{ $datass->arrival_dt}}">
                                                  </td>
                                                   <td> 
                                                     <input id="arrival_tm1" name="arrival_tm[]" class="form-control timepicker" type="text" placeholder="hh:mm" value="{{ $datass->arrival_tm}}">
                                                  </td>
                                                  <td> 
                                                     <input id="arrival_station1" name="arrival_station[]" class="form-control" type="text" placeholder="Enter Station" value="{{ $datass->arrival_station}}">
                                                  </td>
                                                  <td> 
                                                     <input id="class_by1" name="class_by[]" class="form-control" type="text" placeholder="Enter Class By Travelled" value="{{ $datass->class_by}}">
                                                  </td>
                                                  <td> 
                                                     <input id="fare_rs1" name="fare_rs[]" class="form-control fare_t" type="text" placeholder="Enter Fare Rs."  value="{{ $datass->fare_rs}}" onclick="myFunction(1)">
                                                  </td>
                                                  <td> 
                                                     <input id="ticket_no1" name="ticket_no[]" class="form-control" type="text" placeholder="Enter Ticket No." value="{{ $datass->ticket_no}}">
                                                  </td>
                                                  <td> <input id="remark1" name="remark[]" class="form-control" type="text" placeholder="Enter Remarks" value="{{ $datass->remark}}">
                                                  </td>
                                                 {{--  <td><button type="button" name="add_row" id="add_row" class="btn btn-success btn-xs">+</button></td> --}}
                                               </tr>
                                               @endforeach
                                             </tbody>
                                          </table>
                                        <div class="row mt-3">
                                            <div class="form-group col-md-8">
                                            <label class="control-label">Total fare as about</label>
                                            <textarea name="total_fare_details" class="form-control" id="total_fare_details" placeholder="Enter Total fare as about"  value="{{ $data->total_fare_details}}">{{ $data->total_fare_details}}</textarea>
                                            @error('total_fare_details')
                                            <span class="text-danger" role="alert">
                                            <strong>{{ $message }}</strong>
                                            </span>
                                            @enderror
                                         </div>
                                         <div class="form-group col-md-4">
                                            <label class="control-label"> Total Rs.</label>
                                            <input id="total_fare_amount" name="total_fare_amount" class="form-control total_amount" type="text" placeholder="Enter fare amount" value="{{ $data->total_fare_amount}}">
                                            @error('total_fare_amount')
                                            <span class="text-danger" role="alert">
                                            <strong>{{ $message }}</strong>
                                            </span>
                                            @enderror
                                         </div>
                                          {{-- <div class="form-group col-md-4">
                                            <label class="control-label"> Total Rs.</label>
                                            <input id="total_fare_amount" name="total_fare_amount" class="form-control total_amount" type="text" placeholder="Enter fare amount" value="" >
                                            @error('total_fare_amount')
                                            <span class="text-danger" role="alert">
                                            <strong>{{ $message }}</strong>
                                            </span>
                                            @enderror
                                         </div> --}}
                                        </div>
                                       </div>
                                    </div>
                                 </div>

                                </hr>
                                 <div class="col-md-6 mt-5" {{-- style="border-right: 1px solid;" --}} >
                                      <div class="row">
                                        <div class="form-group col-md-8">
                                           <label class="control-label">Daily Allowance of Days</label>
                                           <textarea name="daily_allowance_day" class="form-control" id="daily_allowance_day" placeholder="Enter Daily Allowance of Days" value="{{ $data->daily_allowance_day}}">{{ $data->daily_allowance_day}}</textarea>
                                           @error('daily_allowance_day')
                                           <span class="text-danger" role="alert">
                                           <strong>{{ $message }}</strong>
                                           </span>
                                           @enderror
                                        </div>
                                        <div class="form-group col-md-4">
                                           <label class="control-label">Rs.</label>
                                           <input id="daily_allowance_amonut" name="daily_allowance_amonut" class="form-control total_rs" type="text" placeholder="Enter amount" value="{{ $data->daily_allowance_amonut}}" onclick="myFunction1()">
                                           @error('daily_allowance_amonut')
                                           <span class="text-danger" role="alert">
                                           <strong>{{ $message }}</strong>
                                           </span>
                                           @enderror
                                        </div>
                                        <div class="form-group col-md-8">
                                           <label class="control-label">Metropolitan only</label>
                                           <textarea name="metropolitan" class="form-control" id="metropolitan" placeholder="Enter metropolitan"value="{{ $data->remark}}">{{ $data->metropolitan}}</textarea>
                                           @error('metropolitan')
                                           <span class="text-danger" role="alert">
                                           <strong>{{ $message }}</strong>
                                           </span>
                                           @enderror
                                        </div>
                                        <div class="form-group col-md-4">
                                           <label class="control-label">Rs.</label>
                                           <input id="metropolitan_amonut" name="metropolitan_amonut" class="form-control total_rs" type="text" placeholder="Enter amount"value="{{ $data->metropolitan_amonut}}" onclick="myFunction1()">
                                           @error('metropolitan_amonut')
                                           <span class="text-danger" role="alert">
                                           <strong>{{ $message }}</strong>
                                           </span>
                                           @enderror
                                        </div>
                                        <div class="form-group col-md-8">
                                           <label class="control-label">Daily Allowance of Days.</label>
                                           <textarea name="daily_allownce_details" class="form-control" id="daily_allownce_details" placeholder="Enter Daily Allowance"value="{{ $data->daily_allownce_details}}">{{ $data->daily_allownce_details}}</textarea>
                                           @error('daily_allownce_details')
                                           <span class="text-danger" role="alert">
                                           <strong>{{ $message }}</strong>
                                           </span>
                                           @enderror
                                        </div>
                                        <div class="form-group col-md-4">
                                           <label class="control-label">Rs</label>
                                           <input id="daily_allownce_amount" name="daily_allownce_amount" class="form-control total_rs" type="text" placeholder="Enter tour to" value="{{ $data->daily_allownce_amount}}" onclick="myFunction1()">
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
                                         <textarea name="other_localities" class="form-control" id="other_localities" placeholder="Enter Other Localities" value="{{ $data->other_localities}}">{{ $data->other_localities}}</textarea>
                                         @error('other_localities')
                                         <span class="text-danger" role="alert">
                                         <strong>{{ $message }}</strong>
                                         </span>
                                         @enderror
                                      </div>
                                      <div class="form-group col-md-4">
                                         <label class="control-label">Rs.</label>
                                         <input id="other_localities_amount" name="other_localities_amount" class="form-control total_rs" type="text" placeholder="Enter amount" value="{{ $data->other_localities_amount}}" onclick="myFunction1()">
                                         @error('other_localities_amount')
                                         <span class="text-danger" role="alert">
                                         <strong>{{ $message }}</strong>
                                         </span>
                                         @enderror
                                      </div>
                                      <div class="form-group col-md-8">
                                         <label class="control-label">Conveyance charges (as detailed on revised).</label>
                                         <textarea name="conveyance_chages_detail" class="form-control" id="conveyance_chages_detail" placeholder="Enter Conveyance charges details" value="{{ $data->conveyance_chages_detail}}">{{ $data->conveyance_chages_detail}}</textarea>
                                         @error('conveyance_chages_detail')
                                         <span class="text-danger" role="alert">
                                         <strong>{{ $message }}</strong>
                                         </span>
                                         @enderror
                                      </div>
                                      <div class="form-group col-md-4">
                                         <label class="control-label">Rs.</label>
                                         <input id="conveyance_chages_amount" name="conveyance_chages_amount" class="form-control total_rs" type="text" placeholder="Enter amount" value="{{ $data->conveyance_chages_amount}}" onclick="myFunction1()">
                                         @error('conveyance_chages_amount')
                                         <span class="text-danger" role="alert">
                                         <strong>{{ $message }}</strong>
                                         </span>
                                         @enderror
                                      </div>
                                      <div class="form-group col-md-8">
                                         <label class="control-label">Other charge as detailed on revised.</label>
                                         <textarea name="other_charge_detail" class="form-control" id="other_charge_detail" placeholder="Enter amount" value="{{ $data->other_charge_detail}}">{{ $data->other_charge_detail}}</textarea>
                                         @error('other_charge_detail')
                                         <span class="text-danger" role="alert">
                                         <strong>{{ $message }}</strong>
                                         </span>
                                         @enderror
                                      </div>
                                      <div class="form-group col-md-4">
                                         <label class="control-label">Rs.</label>
                                         <input id="other_charge_amount" name="other_charge_amount" class="form-control total_rs" type="text" placeholder="Enter amount" value="{{ $data->other_charge_amount}}" onclick="myFunction1()">
                                         @error('other_charge_amount')
                                         <span class="text-danger" role="alert">
                                         <strong>{{ $message }}</strong>
                                         </span>
                                         @enderror
                                      </div>
                                      <div class="form-group col-md-12 mt-5" align="left" >
                                         
                                          <h2> <strong>Total Rs.  </strong><span id="total_fare_amount1">
                                          {{number_format($data->daily_allowance_amonut+$data->metropolitan_amonut+$data->daily_allownce_amount + $data->other_localities_amount + $data->conveyance_chages_amount + $data->other_charge_amount,2)}} </span>
                                         <span id="total_fare_amount1"></span></h2>

                                      </div>

                                    </div>
                                 </div>
                              <div class="card">
                                <div class="card-body">
                                 <div class="row">
                                   <div class="form-group col-md-4">
                                    <hr>
                                         <label class="control-label">Less Advances (if any ) received on</label>
                                         <input id="less_advance_time" name="less_advance_time" class="form-control" type="datetime-local" placeholder="Enter Period of Less Advances (if any) received on date time"  value="{{ $data->less_advance_time}}">
                                         @error('less_advance_time')
                                         <span class="text-danger" role="alert">
                                         <strong>{{ $message }}</strong>
                                         </span>
                                         @enderror
                                      </div>
                                      <div class="form-group col-md-2">
                                         <hr>
                                         <label class="control-label">Rs.</label>
                                         <input id="less_advance_amount" name="less_advance_amount" class="form-control" type="text" placeholder="Enter amount" value="{{ $data->less_advance_amount}}">
                                         @error('less_advance_amount')
                                         <span class="text-danger" role="alert">
                                         <strong>{{ $message }}</strong>
                                         </span>
                                         @enderror
                                      </div>
                                      <div class="form-group col-md-4">
                                         <hr>
                                         <label class="control-label">Blance Due from Rs me be accepted case / recovered from my salary</label>
                                         <input id="due_blance_time" name="due_blance_time" class="form-control" type="datetime-local" placeholder="Enter blance Due" value="{{ $data->due_blance_time}}">
                                         @error('due_blance_time')
                                         <span class="text-danger" role="alert">
                                         <strong>{{ $message }}</strong>
                                         </span>
                                         @enderror
                                      </div>
                                      <div class="form-group col-md-2">
                                         <hr>
                                         <label class="control-label">Rs.</label>
                                         <input id="due_amount" name="due_amount" class="form-control" type="text" placeholder="Enter Blance due from Rs." value="{{ $data->due_amount}}">
                                         @error('due_amount')
                                         <span class="text-danger" role="alert">
                                         <strong>{{ $message }}</strong>
                                         </span>
                                         @enderror
                                      </div>
                                 </div>
                               </div>
                             </div>
                                 <div class="row mt-3">
                                   <div class="form-group col-md-12">
                                     <table border="" style="" id="upload_docs_table">
                                      <thead>
                                         <tr>
                                          
                                            <th > Upload New Bill</th>
                                            <th > Old Bills</th>
                                            <th > Downlod Bill</th>
                                         </tr>
                                       </thead>
                                       <tbody>
                                         <tr>
                                        <?php 
                                          $avc = json_decode($data->bills);
                                           foreach ($avc as  $value1) {?>    
                                          <tr>
                                              <td> 
                                               <input id="bills" name="bills[]" class="form-control" type="file" placeholder="file" value="{{ $data->bills}}">
                                                @error('bills')
                                                  <span class="text-danger" role="alert">
                                                  <strong>{{ $message }}</strong>
                                                  </span>
                                                @enderror
                                            </td>
                                             <td>
                                                <img src="{{url('/files/'.$value1)}}"  height="100px" width="300px"  />
                                             </td>
                                             <td><a href="" ><i class="fa fa-arrow-down"></i> Download</a></td>
                                            
                                          </tr>
                                          <?php } ?>

                                         </tr>
                                       </tbody>
                                    </table>
                                 </div>
                               </div>
                             <div class="form-group align-self-end col-md-6 mt-3">
                                <button id="addGrade" class="btn btn-primary" type="submit">
                                <i class="fa fa-fw fa-lg fa-check-circle"></i>Send
                                </button>
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
<script type="text/javascript" charset="utf8" src="http://ajax.aspnetcdn.com/ajax/jQuery/jquery-2.2.4.min.js"></script>
  


{{-- js for add new tr in table --}} 
{{-- <script>
   $(document).ready(function(){
     var final_total_amt = $('#final_total_amt').text();
     var count = 2;
     
     $(document).on('click', '#add_row', function(){
       //alert();
       count++;
       $('#total_item').val(count);
       var html_code = '';
       html_code += '<tr id="row_id_'+count+'">';
       html_code += '<td><span id="sr_no">'+count+'</span></td>';
       
       html_code += '<td><input type="text" name="purpose_of_journy[]" id="purpose_of_journy'+count+'" class="form-control input-sm" placeholder="Enter Purpose Of journy"/></td>';
   
       html_code += '<td><input type="text" name="departure_dt[]" id="departure_dt'+count+'" data-srno="'+count+'" class="form-control input-sm "  placeholder="Enter Date & Time"/></td>';
   
       html_code += '<td><input type="text" name="departure_station[]" id="departure_station'+count+'" data-srno="'+count+'" class="form-control input-sm " placeholder="Enter Station"/></td>';
   
       html_code += '<td><input type="text" name="arrival_dt[]" id="arrival_dt'+count+'" data-srno="'+count+'" class="form-control input-sm"  placeholder="Enter tour Date & Time"" /></td>';
   
       html_code += '<td><input type="text" name="arrival_station[]" id="arrival_station'+count+'" data-srno="'+count+'" class="form-control input-sm" placeholder="Enter Station"/></td>';
   
       html_code += '<td><input type="text" name="class_by[]" id="class_by'+count+'" data-srno="'+count+'" class="form-control input-sm" placeholder="Enter Class By Travelled"/></td>';
   
       html_code += '<td><input type="text" name="fare_rs[]" id="fare_rs'+count+'" data-srno="'+count+'" class="form-control" onclick="myFunction('+count+') placeholder="Enter Fare Rs." /></td>';
   
       html_code += '<td><input type="text" name="ticket_no[]" id="ticket_no'+count+'" data-srno="'+count+'" class="form-control " placeholder="Enter Ticket No." /></td>';
   
       html_code += '<td><input type="text" name="remark[]" id="remark'+count+'" data-srno="'+count+'" class="form-control " placeholder="Enter Remarks"/></td>';
   
        html_code += '<td><button type="button" name="remove_row" id="'+count+'" class="btn btn-danger btn-xs remove_row">X</button></td>';
   
      
       html_code += '</tr>';
       $('#invoice-item-table').append(html_code);
     });
     
     $(document).on('click', '.remove_row', function(){
       var row_id = $(this).attr("id");
       var total_item_amount = $('#order_item_final_amount'+row_id).val();
       var final_amount = $('#final_total_amt').text();
       var result_amount = parseFloat(final_amount) - parseFloat(total_item_amount);
       $('#final_total_amt').text(result_amount);
       $('#row_id_'+row_id).remove();
       count--;
       $('#total_item').val(count);
     });
   
   });
</script> --}}


{{-- js for add ne tr for image --}}
<script>
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
       
       html_code += '<td><input type="file" name="bills[]" id="bills'+count+'" class="form-control input-sm" placeholder="Enter Purpose Of journy" name="bills"/></td>';
   
       html_code += '<td><button type="button" name="remove_row1" id="'+count+'" class="btn btn-danger btn-xs remove_row1">X</button></td>';
   
      
       html_code += '</tr>';
       $('#upload_docs_table').append(html_code);
     });
     
     $(document).on('click', '.remove_row1', function(){
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
</script>


<script>

function myFunction(id) {

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

function myFunction1(id) {
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
