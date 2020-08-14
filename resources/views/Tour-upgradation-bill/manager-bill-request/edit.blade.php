

@extends('layout.main')
@section('content')
<main class="app-content">
   <div class="app-title">
    <div>
          <h1><i class="app-menu__icon fa fa-comments-o"></i> Edit Tour Manager Upgradation Amount Bill</h1>
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
                              <form class="row" action="{{route('manager-tour-upg-bill.update',$data->id)}}" method="post" enctype="multipart/form-data">
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

