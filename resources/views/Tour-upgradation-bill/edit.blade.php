

@extends('layout.main')
@section('content')
<main class="app-content">
   <div class="app-title">
    <div>
          <h1><i class="app-menu__icon fa fa-comments-o"></i> Edit Tour Upgradation Amount Bill</h1>
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
                           {{-- <h3 class="tile-title">Tour Upgradation Amount Bill Form</h3> --}}
                           <div class="tile-body mt-3">
                              <form class="row" action="{{route('tour-bill-upgradation.update',$data->id)}}" method="post" enctype="multipart/form-data">
                                 @csrf
                                  @method('PUT')

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
                                    <input id="user_name" name="user_name" class="form-control" type="text"  value="{{$data->user_name }}" > 
                                    @error('user_name')
                                    <span class="text-danger" role="alert">
                                    <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                 </div>
                                
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
                                    <input id="tour_upgradation_from" name="tour_upgradation_from" class="form-control" type="text" placeholder="Enter tour from" value="{{ $data->tour_upgradation_from }}" required="" readonly=""> 
                                    @error('tour_upgradation_from')
                                    <span class="text-danger" role="alert">
                                    <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                 </div>
                                 <div class="form-group col-md-3">
                                    <label class="control-label">Tour upgradation, To</label>
                                    <input id="tour_upgradation_to" name="tour_upgradation_to" class="form-control" type="text" placeholder="Enter tour to" value="{{ $data->tour_upgradation_to }}" required="" readonly="">
                                    @error('tour_upgradation_to')
                                    <span class="text-danger" role="alert">
                                    <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                 </div>
                                 <div class="form-group col-md-3">
                                    <label class="control-label"> Enter Amount</label>
                                    <input id="total_amount" name="total_amount" class="form-control" type="text" placeholder="Enter amount" value="{{ $data->total_amount }}" required="" >
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
                                    <textarea id="tour_upgrade_justification" name="tour_upgrade_justification" class="form-control" type="text" placeholder="Enter tourupgradate justification" value="{{ $data->tour_upgrade_justification }}" required="" readonly="" >{{ $data->tour_upgrade_justification }}</textarea>
                                    @error('tour_upgrade_justification')
                                    <span class="text-danger" role="alert">
                                    <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                 </div>

                             </div>
                              <div class="row mt-3">
                                 <div class="form-group col-md-12">
                                   <table border="" style="" id="upload_docs_table">
                                    <thead>
                                       <tr>
                                          <th > Bills</th>
                                       </tr>
                                     </thead>
                                     <tbody>
                                       <tr>
                                      <?php 
                                        $avc = json_decode($data->bills);
                                          if ( $avc != null) {

                                           foreach ($avc as  $value1) { ?>    
                                        <tr>
                                            <td> 
                                             <input id="bills" name="bills[]" class="form-control" type="file" placeholder="file" value="{{ $value1}}">
                                              @error('bills')
                                                <span class="text-danger" role="alert">
                                                <strong>{{ $message }}</strong>
                                                </span>
                                              @enderror
                                          </td>
                                           <td>
                                              <img src="{{url('/files/'.$value1)}}"  height="100px" width="300px"  />
                                           </td>
                                          
                                        </tr>
                                          <?php } }else{ ?>
                                          <tr>
                                           <td>
                                              <img src="{{url('/files/'.$data->bills)}}"  height="100px" width="300px"  />
                                           </td>
                                        </tr>
                                        <?php } ?>
                                       </tr>
                                     </tbody>
                                  </table>
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
   {{-- </div>    --}}
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
<script >
  // ,'.con_amount, .con_approx_km'
  $(document).on('keyup','.sums',function(){


     //    var parent_id = $(this).parent().parent().attr('id');
     //    var amount = $('#con_amount'+parent_id).val();
     //    var con_approx_km = $('#con_approx_km'+parent_id).val();
     //    var mul_val = '#total_amount_pr_km'+parent_id;
     //    var total_sum = '.total_local_fare_amount';
     //    var mul = (parseInt(con_approx_km) * parseInt(amount));
     //    $(mul_val).val(mul);

         
     //    var old_total_amount1 = $(total_sum).val();
     //    var total_amount1 = 0        
     //    $('.sums').each(function() {
     //        total_amount1 = total_amount1 + parseInt($(this).val());
     //    });

     //    $(total_sum).val('');
     //    $(total_sum).val(total_amount1);


     // });
        var parent_id = $(this).parent().parent().attr('id');
        var amount = $('#con_amount'+parent_id).val();
        var con_approx_km = $('#con_approx_km'+parent_id).val();
        var total_amount_pr_km1 = $('#total_amount_pr_km'+parent_id).val();
        $('#total_amount_pr_km'+parent_id).val('');

        // console.log(amount);
        // console.log(total_amount_pr_km1);
        var con_appx_id = '#con_approx_km'+parent_id;
        var total_id = '#total_amount_pr_km'+parent_id;
        var total_amount_pr_km = '#total_amount_pr_km'+parent_id;  
          if(total_amount_pr_km  !=''){
              var sum_amount = $(total_amount_pr_km).val(); 
                  if(!sum_amount){
                    sum_amount = 0;
                  }
                  $(total_amount_pr_km).text(''); 
                   row_amount = total_amount_pr_km1;
                  $(total_amount_pr_km).val(parseFloat(row_amount));
                    var old_total_amount1 = $('.total_local_fare_amount1').val();
                    var sum = 0;
                    $('.sums').each(function(){
                        sum += parseFloat($(this).val());  // Or this.innerHTML, this.innerText
                    }); 
                    //console.log(sum)
                
                  $('.total_local_fare_amount1').val('');
                  $('.total_local_fare_amount1').val(sum);
          }

     });
     
     $(document).on('click', '.remove_row3', function(){
        var row_id = $(this).attr("id");
        var total_id = '#total_amount_pr_km'+row_id; 
        var row_amount =   $(total_id).val(); 
       if(row_amount  == ''){
        row_amount = 0;
       }
      var sum = 0;
      $('.sums').each(function(){
          sum += parseFloat($(this).val());  // Or this.innerHTML, this.innerText
      });
        $('.total_local_fare_amount1').val('');
        $('.total_local_fare_amount1').val(sum);
        $('#'+row_id).remove();
      });
       


   $(document).ready(function(){
      // Code For add All amount.....................................
        $(document).on('blur keyup','.fare_t,.con_amount,#daily_allowance_day,#metropolitan,#other_charge_amount,.con_approx_km,.sums',function(){
               var parent_id = $(this).parent().parent().attr('id');
               var total_fare_amount =  $('#total_fare_amount').val();
               var conveyance_chages_amount =  $('#conveyance_chages_amount').val();
               var daily_allowance_amonut =  $('#daily_allowance_amonut').val();
               var metropolitan_amonut    =  $('#metropolitan_amonut').val();
               var other_charge_amount    =  $('#other_charge_amount').val();
               var otal_amount_pr_km      = $('#total_amount_pr_km'+parent_id).val();
    // alert(otal_amount_pr_km);
               var total_fare_amount1 =  (total_fare_amount) ? total_fare_amount : 0;
               var conveyance_chages_amount1 =  (conveyance_chages_amount) ? conveyance_chages_amount : 0;
               var daily_allowance_amonut1 =  (daily_allowance_amonut) ? daily_allowance_amonut : 0;
               var metropolitan_amonut1   =  (metropolitan_amonut) ? metropolitan_amonut : 0;
               var other_charge_amount1   =  (other_charge_amount) ? other_charge_amount : 0;
               var otal_amount_pr_km1   =  (otal_amount_pr_km) ? otal_amount_pr_km : 0;
               //var sums1   =  (sums) ? sums : 0;
               var total_amount4 = parseFloat(total_fare_amount1)+parseFloat(conveyance_chages_amount1)+parseFloat(daily_allowance_amonut1)+parseFloat(metropolitan_amonut1)+parseFloat(other_charge_amount1)+parseFloat(otal_amount_pr_km1);
    console.log(otal_amount_pr_km);
            // alert(total_amount4);
           // console.log(sums1)

                $('.total_local_fare_amount1').text('');
                $('.total_local_fare_amount1').text(total_amount4);
                $('#conveyance_chages_amount').val('');
                $('#conveyance_chages_amount').val(otal_amount_pr_km);

                 var less_advance_amount = $('#less_advance_amount').val();
                  if(total_amount4>0){
                    var data = parseFloat(less_advance_amount) - parseFloat(total_amount4);
                    $('#due_amount').val(data); 
                }
        });

	$(document).on('blur keyup',function(){
	    var less_advance_amount = $('#less_advance_amount').val();
	    var total_fare_amount1  = $('.total_local_fare_amount1').text(); 

	    var aditional_advance_amount  =  $('#additional_advance_amount').val();
	    var aditional_advance_amount1   =  (aditional_advance_amount) ? aditional_advance_amount : 0;

	    var total_amount5 = parseFloat(less_advance_amount)+parseFloat(aditional_advance_amount1);
	
	       $('#total_advance_amount').val(total_amount5);
	    if(total_fare_amount1>0){
	      var data = total_fare_amount1 - total_amount5;

	      $('#due_amount').val(data); 
	  }

	});


  }); 

</script>

