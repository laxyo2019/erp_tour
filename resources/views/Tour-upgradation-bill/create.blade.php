
@extends('layout.main')
@section('content')
<main class="app-content">
   <div class="app-title">
    <div>
          <h1><i class="app-menu__icon fa fa-comments-o"></i> Create Tour Upgradation Amount  Bill</h1>
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
                           <h3 class="tile-title">Tour Upgradation Amount Bill Form</h3>
                           <div class="tile-body">
                              <form class="row" action="{{route('tour-bill-upgradation.store')}}" method="post" enctype="multipart/form-data">
                                 @csrf
                                 <input type="hidden" name="emp_location" value="{{$data->emp_location}}">
                                 
                                 <input type="hidden" name="emp_department" value="{{$data->department}}">
                                 <div class="form-group col-md-3">
                                    <label class="control-label"> Tour Upgradation Sr.No</label>
                                    <input id="ta_no" name="ta_no" class="form-control" type="text" placeholder="Enter T.A. Journal Sr. No" value="{{$data->id }}" readonly="">
                                    @error('ta_no')
                                    <span class="text-danger" role="alert">
                                    <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                 </div>
                                  <div class="form-group col-md-3">
                                    <label class="control-label"> User Name</label>
                                    <input id="user_name" name="user_name" class="form-control" type="text"  value="{{$data->emp_name }}" > 
                                    @error('user_name')
                                    <span class="text-danger" role="alert">
                                    <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                 </div>
                                {{--  <div class="form-group col-md-3">
                                    <label class="control-label"> Bill No</label>
                                    <input id="bill_no12" name="bill_no" class="form-control" type="text" placeholder="Enter Bill No" value="{{old('bill_no')}}" > 
                                    @error('bill_no')
                                    <span class="text-danger" role="alert">
                                    <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                 </div> --}}
                               {{--   <div class="form-group col-md-3">
                                    <label class="control-label">Period of upgradation Tour, From</label>
                                    <input id="time_from" name="time_from" class="form-control datepicker" type="text" placeholder="dd/mm/yyyy" value="{{ date('Y-m-d',strtotime($data->time_from)) }}" required="" readonly="">
                                    @error('time_from')
                                    <span class="text-danger" role="alert">
                                    <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                 </div>
                                 <div class="form-group col-md-3">
                                    <label class="control-label">Period of upgradation Tour,To</label>
                                    <input id="time_to" name="time_to" class="form-control datepicker" type="text" placeholder="dd/mm/yyyy" value="{{ date('Y-m-d',strtotime($data->time_to))}}" required="" readonly="">
                                    @error('time_to')
                                    <span class="text-danger" role="alert">
                                    <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                 </div> --}}
                                 <div class="form-group col-md-3" >
                                    <label for="Grade">Grade</label>
                                    <input type="text" name="grd" class="form-control" id="grd" required="" readonly="" value="{{$data->grd}}">
                                 </div>
                                  <div class="form-group col-md-3" >
                                    <label for="Designation">Department</label>
                                    <input type="text"  name="designation" class="form-control" id="designation" required="" readonly="" value="{{$data->designation}}">
                                 </div>
                                 <div class="form-group col-md-3" >
                                    <label for="Designation">Designation</label>
                                    <input type="text"  name="designation" class="form-control" id="designation" required="" readonly="" value="{{$data->designation}}">
                                 </div>
                                 <div class="form-group col-md-3">
                                    <label class="control-label" >Tour upgradation, From</label>
                                    <input id="tour_upgradation_from" name="tour_upgradation_from" class="form-control" type="text" placeholder="Enter tour from" value="{{ $data->tour_from }}" required="" readonly=""> 
                                    @error('tour_upgradation_from')
                                    <span class="text-danger" role="alert">
                                    <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                 </div>
                                 <div class="form-group col-md-3">
                                    <label class="control-label">Tour upgradation, To</label>
                                    <input id="tour_upgradation_to" name="tour_upgradation_to" class="form-control" type="text" placeholder="Enter tour to" value="{{ $data->tour_to }}" required="" readonly="">
                                    @error('tour_upgradation_to')
                                    <span class="text-danger" role="alert">
                                    <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                 </div>
                                 <div class="form-group col-md-3">
                                    <label class="control-label"> Enter Amount</label>
                                    <input id="total_amount" name="total_amount" class="form-control" type="text" placeholder="Enter amount" value="{{ old('total_amount') }}" required="" >
                                    @error('total_amount')
                                    <span class="text-danger" role="alert">
                                    <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                 </div>
                                 <div class="form-group col-md-4">
                                    <label class="control-label"> Upload Bill copy</label>
                                     <input id="bills" name="bills" class="form-control" type="file" placeholder="file" value="{{ old('bills[]') }}" >
                                      @error('bills')
                                      <span class="text-danger" role="alert">
                                      <strong>{{ $message }}</strong>
                                      </span>
                                    @enderror
                                 </div>

                                  <div class="form-group col-md-8">
                                    <label class="control-label">Tour Upgrad Justification</label>
                                    <textarea id="tour_upgrade_justification" name="tour_upgrade_justification" class="form-control" type="text" placeholder="Enter tourupgradate justification" value="{{ $data->exception_heigh_upgradaton }}" required="" readonly="" >{{ $data->exception_heigh_upgradaton }}</textarea>
                                    @error('tour_upgrade_justification')
                                    <span class="text-danger" role="alert">
                                    <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                 </div>

                             </div>
                             <input type="hidden" name="user_id" value="{{ $data->user_id }}">
                             <input type="hidden" name="user_id" value="{{ $data->user_id }}">
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
 <script src="http://ajax.googleapis.com/ajax/libs/jquery/1/jquery.min.js" type="text/javascript"></script>

<script type="text/javascript">
  /* Daily Allowance of Days ..................................*/
$(document).ready(function(){
  $(this).on('keyup','#daily_allowance_day',function(){
    var daily_allowance_day = $('#daily_allowance_day').val();
    var grd = $('#grd').val();
    // alert(grd);
    var token = '<?php echo csrf_token() ?>';
     $.ajax({
        type: 'post',
        url: '/rate-multiple',
        data: {'daily_allowance_day': daily_allowance_day,'grd':grd, '_token': token},
      success: function(data){
       var daily_allowance_day = $('#daily_allowance_amonut').val(data);

      }
    });

});
  $(this).on('keyup','#metropolitan',function(){
    var metropolitan = $('#metropolitan').val();
    var grd = $('#grd').val();
    var token = '<?php echo csrf_token() ?>';
     $.ajax({
        type: 'post',
        url: '{{route('metro-rate-multiple')}}',
        data: {'metropolitan': metropolitan,'grd':grd, '_token': token},
      success: function(data){
       var metropolitan = $('#metropolitan_amonut').val(data);

      }
    });

});
});
/* end  Daily Allowance of Days..................................*/
</script>
@endsection

{{-- <script type="text/javascript" charset="utf8" src="http://ajax.aspnetcdn.com/ajax/jQuery/jquery-2.2.4.min.js"></script> --}}
{{-- <script src="https://code.jquery.com/jquery-2.2.4.min.js" type="text/javascript"></script> --}}
{{-- <script
  src="https://code.jquery.com/jquery-3.4.1.min.js"
  integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo="
  crossorigin="anonymous"></script> --}}
  {{-- <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script> --}}
 <script src="http://ajax.googleapis.com/ajax/libs/jquery/1/jquery.min.js" type="text/javascript"></script>

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

        var total_local_fare_amount1 = $('.total_local_fare_amount1').text();
        $('.total_local_fare_amount').val('');
        $('.total_local_fare_amount').val(data);

        var total_advance_amount = $('#total_advance_amount').val();
        $('#due_amount').val('');
        $('#due_amount').val(total_advance_amount-data);

        $('.total_local_fare_amount1').text('');
        $('.total_local_fare_amount1').text(total_local_fare_amount1-data)

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

        html_code += '<td><input type="text" name="from_dt[]" id="from_dt'+count+'" data-srno="'+count+'" class="form-control input-sm timepicker"  placeholder="Enter Details of Trip  From"/></td>';
   
       html_code += '<td><input type="text" name="to_dt[]" id="to_dt'+count+'" data-srno="'+count+'" class="form-control input-sm " placeholder="Enter Details of Trip  To"/></td>';
   
       html_code += '<td><input type="text" name="con_approx_km[]" id="con_approx_km'+count+'" data-srno="'+count+'" class="form-control input-sm con_approx_km"  placeholder="Enter KM"  /></td>';

      html_code += '<td><input type="text" name="con_amount[]" id="con_amount'+count+'" data-srno="'+count+'" class="form-control input-sm con_amount"  placeholder="Enter amount"></td>';

      // html_code += '<td><span class="sums" id="total_amount_pr_km'+count+'"></span></td>';
      html_code += '<td><input id="total_amount_pr_km'+count+'" name="total_amount_pr_km[]" class="form-control sums"  type="text" placeholder="Enter Total Amount/km" value="">';

       html_code += '<td><button type="button" name="remove_row1" id="'+count+'" class="btn btn-danger btn-xs remove_row3">X</button></td>';
   
      
       html_code += '</tr>';
       $('#local-tour-bill-table').append(html_code);
    
    });

/* add total local amount bill..................................*/
	$(document).ready(function(){
	
	})

     $(document).on('keyup','.sums',function(){
      
        var parent_id = $(this).parent().parent().attr('id');
        var amount = $('#con_amount'+parent_id).val();
        var con_approx_km = $('#con_approx_km'+parent_id).val();
        var total_amount_pr_km1 = $('#total_amount_pr_km'+parent_id).val();
	     $('#total_amount_pr_km'+parent_id).val('');
        var con_appx_id = '#con_approx_km'+parent_id;
        var total_id = '#total_amount_pr_km'+parent_id;
        var total_amount_pr_km = '#total_amount_pr_km'+parent_id;  
        //if(con_approx_km !='' &&  amount !=''){
 	if(total_amount_pr_km  !=''){
          var sum_amount = $(total_amount_pr_km).val(); 
          if(!sum_amount){
            sum_amount = 0;
          }
         $(total_amount_pr_km).text(''); 
         // row_amount = (parseFloat(con_approx_km) * parseFloat(amount));
         row_amount = total_amount_pr_km1;
          $(total_amount_pr_km).val(parseFloat(row_amount));
          // var old_total_amount = $('.total_local_fare_amount').text();  //For minus purpose
          // var total_amount = parseFloat(old_total_amount)  - parseFloat(sum_amount);
          //$('.total_local_fare_amount').text('');
          //$('.total_local_fare_amount').text(total_amount);
          var old_total_amount1 = $('.total_local_fare_amount').val();
        	var sum = 0;
        	$('.sums').each(function(){
        	    sum += parseFloat($(this).val());  // Or this.innerHTML, this.innerText
        	});	
	       //var total_amount1 = parseFloat(row_amount) + parseFloat(old_total_amount1);
          $('.total_local_fare_amount').val('');
          $('.total_local_fare_amount').val(sum);

        }
     });
     $(document).on('click', '.remove_row3', function(){

       var row_id = $(this).attr("id");
       var total_id = '#total_amount_pr_km'+row_id;
	     var row_amount =   $(total_id).val(); 
       if(row_amount  == ''){
        row_amount = 0;
       }
        // var old_total_amount = $('.total_local_fare_amount').val();
        //alert(old_total_amount)   
        //var total_amount = parseFloat(old_total_amount) - parseFloat(row_amount);
      	var sum = 0;
      	$('.sums').each(function(){
      	    sum += parseFloat($(this).val());  // Or this.innerHTML, this.innerText
      	});
        $('.total_local_fare_amount').val('');
        $('.total_local_fare_amount').val(sum);

        // var total_advance_amount = $('#total_advance_amount').val();
        // $('#due_amount').val('');
        // $('#due_amount').val(total_advance_amount-sum);


       $('#'+row_id).remove();
     });
   

   });

// Code For add All amount.....................................
  $(document).on('blur keyup','.fare_t,.con_amount,#daily_allowance_day,#metropolitan,#other_charge_amount,#aditional_advance_amount,.sums',function(){
          var parent_id = $(this).parent().parent().attr('id');
          var amount = $('#con_amount'+parent_id).val();
          var con_approx_km = $('#con_approx_km'+parent_id).val();
          var total_amount_pr_km1 = $('#total_amount_pr_km'+parent_id).val();
         
	     var total_fare_amount =  $('#total_fare_amount').val();
         console.log(total_fare_amount);
         var conveyance_chages_amount =  $('#conveyance_chages_amount').val();
         var daily_allowance_amonut =  $('#daily_allowance_amonut').val();
         var metropolitan_amonut    =  $('#metropolitan_amonut').val();
         var other_charge_amount    =  $('#other_charge_amount').val();

         var total_fare_amount1 =  (total_fare_amount) ? total_fare_amount : 0;
         var conveyance_chages_amount1 =  (conveyance_chages_amount) ? conveyance_chages_amount : 0;
         var daily_allowance_amonut1 =  (daily_allowance_amonut) ? daily_allowance_amonut : 0;
         var metropolitan_amonut1   =  (metropolitan_amonut) ? metropolitan_amonut : 0;
         var other_charge_amount1   =  (other_charge_amount) ? other_charge_amount : 0;
         
         var total_amount4 = parseFloat(total_fare_amount1)+parseFloat(conveyance_chages_amount1)+parseFloat(daily_allowance_amonut1)+parseFloat(metropolitan_amonut1)+parseFloat(other_charge_amount1);

          $('.total_local_fare_amount1').text('');
          $('.total_local_fare_amount1').text(total_amount4);

    var less_advance_amount = $('#less_advance_amount').val();
    var total_fare_amount11  = $('#total_fare_amount1').text(); 
    var aditional_advance_amount  =  $('#additional_advance_amount').val();
    var aditional_advance_amount1   =  (aditional_advance_amount) ? aditional_advance_amount : 0;

    var total_amount5 = parseFloat(less_advance_amount)+parseFloat(aditional_advance_amount1);

  $('#total_advance_amount').val(total_amount5);
    if(total_fare_amount11>0){
      var data = parseFloat(total_fare_amount11)- parseFloat(total_amount5);
      $('#due_amount').val(data); 
  }
  })

  $(document).on('click', '.remove_row3', function(){
       var row_id = $(this).attr("id");
       var total_id = '#total_amount_pr_km'+row_id; 
       var row_amount =   $(total_id).val(); 
       if(row_amount  == ''){
        row_amount = 0;
       }
        var old_total_amount = $('.total_local_fare_amount1').text();
        var total_amount = parseFloat(old_total_amount) - parseFloat(row_amount);
        $('.total_local_fare_amount1').text('');
        $('.total_local_fare_amount1').text(total_amount);

        var total_advance_amount = $('#total_advance_amount').val();
        var total_local_fare_amount1 = $('.total_local_fare_amount1').text();
        // alert(total_local_fare_amount1);
        $('#due_amount').val('');
        $('#due_amount').val(total_advance_amount-total_local_fare_amount1);

       $('#'+row_id).remove();
  });
//end  Code For add All amount.....................................

/* end add table row For local tour amount bill..................................*/

/* minus amount advance to total amount ..................................*/

$(document).on('blur keyup','#less_advance_amount,#total_fare_amount1,#additional_advance_amount',function(){
    var less_advance_amount = $('#less_advance_amount').val();
    var total_fare_amount1  = $('#total_fare_amount1').text(); 
    var aditional_advance_amount  =  $('#additional_advance_amount').val();
    var aditional_advance_amount1   =  (aditional_advance_amount) ? aditional_advance_amount : 0;

    var total_amount5 = parseFloat(less_advance_amount)+parseFloat(aditional_advance_amount1);

    $('#total_advance_amount').val(total_amount5);
    if(total_fare_amount1>0){
      var data = total_amount5 - total_fare_amount1;
      $('#due_amount').val(data); 
  }

});
/* end  amount advance to total amount bill..................................*/


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
    // alert(total);
    $('#total_fare_amount').val(total);
    $('.total_local_fare_amount1').text('');
    $('.total_local_fare_amount1').text(total)
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
    $('#total_fare_amount').html(total);
});
}


</script>





