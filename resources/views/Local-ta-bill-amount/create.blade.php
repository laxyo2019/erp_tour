
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
      <div class="row">
         <div style="width: 100%;" class="modal-content">
               <div class="col-md-12">
                     <h3 class="tile-title">Tour Amount Bill Form</h3>
                     <div class="tile-body">
                        <form class="row" action="{{route('tour-amount-bill.store')}}" method="post" enctype="multipart/form-data">
                           @csrf
                          
                           
                           <div class="form-group col-md-12" style="width: 100%;">
                              <div class="card">
                                    <table border="1" style="" id="invoice-item-table"{{--  class="table table-striped table-hover table-bordered" --}}>
                                      <thead>
                                         <tr>
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
                                       
                                         <tr>
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
                                               <input id="departure_dt1" name="departure_dt[]" class="form-control datepicker" type="text"  placeholder="dd/mm/yyyy" value="{{ old('departure_dt[]') }}" >
                                            </td>
                                            <td> 
                                               <input id="departure_tm1" name="departure_tm[]" class="form-control timepicker" type="text" placeholder="hh:mm" value="{{ old('departure_tm[]') }}">
                                            </td>
                                            <td> 
                                               <input id="departure_station1" name="departure_station[]" class="form-control" type="text" placeholder="Enter Station" value="{{ old('departure_station[]') }}">
                                            </td>
                                            <td> 
                                               <input id="arrival_dt1" name="arrival_dt[]" class="form-control datepicker" type="text" placeholder="dd/mm/yyyy" value="{{ old('arrival_dt[]') }}">
                                            </td>
                                             <td> 
                                               <input id="arrival_tm1" name="arrival_tm[]" class="form-control timepicker" type="text" placeholder="hh:mm" value="{{ old('arrival_tm[]') }}">
                                            </td>
                                            <td> 
                                               <input id="arrival_station1" name="arrival_station[]" class="form-control" type="text" placeholder="Enter Station" value="{{ old('arrival_station[]') }}">
                                            </td>
                                            <td> 
                                               <input id="class_by1" name="class_by[]" class="form-control" type="text" placeholder="Enter Class By Travelled" value="{{ old('class_by[]') }}">
                                            </td>
                                            <td class="td"> 
                                              <input id="fare_rs1" name="fare_rs[]" class="form-control fare_t" type="text" placeholder="Enter Fare Rs." value="{{ old('fare_rs[]') }}" onclick="myFunction(1)">
                                            </td>
                                            <td> 
                                               <input id="ticket_no1" name="ticket_no[]" class="form-control" type="text" placeholder="Enter Ticket No." value="{{ old('ticket_no[]') }}">
                                            </td>
                                            <td> <input id="remark1" name="remark[]" class="form-control" type="text" placeholder="Enter Remarks" value="{{ old('remark[]') }}">
                                            </td>
                                            <td><button type="button" name="add_row" id="add_row" class="btn btn-success btn-xs">+</button></td>
                                         </tr>
                                       </tbody>
                                    </table>
                                 {{-- </div> --}}
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
    </tbody>
  </table>
</div>

</main>

@endsection
<script type="text/javascript" charset="utf8" src="http://ajax.aspnetcdn.com/ajax/jQuery/jquery-2.2.4.min.js"></script>
  
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

<script>
   $(document).ready(function(){
     var final_total_amt = $('#final_total_amt').text();
     var count = 1;
     
     $(document).on('click', '#add_row', function(){
       //alert();
       count++;
       $('#total_item').val(count);
       var html_code = '';
       html_code += '<tr id="row_id_'+count+'">';
       // html_code += '<td><span id="sr_no">'+count+'</span></td>';
       
       html_code += '<td><textarea name="purpose_of_journy[]" id="purpose_of_journy'+count+'" class="form-control input-sm" placeholder="Enter Purpose Of journy"/></textarea></td>';
   
       html_code += '<td><input  name="departure_dt[]" type="text" id="departure_dt'+count+'" data-srno="'+count+'" class="form-control input-sm datepicker"  placeholder="dd/mm/yyyy "/></td>';

        html_code += '<td><input type="text" name="departure_tm[]" id="departure_tm'+count+'" data-srno="'+count+'" class="form-control input-sm timepicker"  placeholder="hh:mm"/></td>';
   
       html_code += '<td><input type="text" name="departure_station[]" id="departure_station'+count+'" data-srno="'+count+'" class="form-control input-sm " placeholder="Enter Station"/></td>';
   
       html_code += '<td><input type="text" name="arrival_dt[]" id="arrival_dt'+count+'" data-srno="'+count+'" class="form-control input-sm datepicker"  placeholder="dd/mm/yyyy" /></td>';

      html_code += '<td><input type="text" name="arrival_tm[]" id="arrival_tm'+count+'" data-srno="'+count+'" class="form-control input-sm"  placeholder="hh:mm" /></td>';

       html_code += '<td><input type="text" name="arrival_station[]" id="arrival_station'+count+'" data-srno="'+count+'" class="form-control input-sm" placeholder="Enter Station"/></td>';
   
       html_code += '<td><input type="text" name="class_by[]" id="class_by'+count+'" data-srno="'+count+'" class="form-control input-sm" placeholder="Enter Class By Travelled"/></td>';
   
       html_code += '<td class="td"><input type="text" name="fare_rs[]" id="fare_rs'+count+'" data-srno="'+count+'" class="form-control fare_t" placeholder="Enter Fare Rs."  onclick="myFunction('+count+')"/></td>';
   
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

     /*$(document).ready(function(){
       $("#fare_rs"+count).keyup(function(){
          alert(count);
          var textinput = $('#fare_rs'+count).val().substring(0,8);
           $("#total_fare_amount").val(textinput);

          });
      });*/
   
   });

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
//   $("#fare_rs"+id).keyup(function(){
//           // alert(id);
//           var textinput = $('#fare_rs'+id).val().substring(0,8);
//            $("#total_fare_amount").val(textinput);

//           });
// }

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
//   $("#fare_rs"+id).keyup(function(){
//           // alert(id);
//           var textinput = $('#fare_rs'+id).val().substring(0,8);
//            $("#total_fare_amount").val(textinput);

//           });
// }

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




