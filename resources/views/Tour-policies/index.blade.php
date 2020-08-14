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
        <ul class="app-breadcrumb breadcrumb side">
        </ul>
      </div>
{{-- =================================== --}}
  {{-- START INSERT MODEL BOX --}}

<div class="container">
  <button type="button" class="btn btn-info btn-lg" data-toggle="modal" data-target="#addpolicy">Add Tour And Travel Policies</button>
  <!-- Modal -->
  <div class="modal fade" id="addpolicy" role="dialog">
    <div class="modal-dialog">
      <!-- Modal content-->
      <div class="row">
        <div style="width: 131%;" class="modal-content">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal">&times;</button>
            <h4 class="modal-title"></h4>
          </div>
          <div class="modal-body">
            <div class="clearix"></div>
            <div class="col-md-12">
              <div class="tile">
                <h3 class="tile-title">Add Tour And Travel Policies</h3>
                <div class="tile-body">
                {{-- INSERT FORM --}}
                  <form class="row" action="{{route('tour-policies.store')}}" method="post">
                 @csrf
                    <div class="form-group col-md-6" >
                      <label for="category">CATEGORY</label>
                        <select name="category" class="form-control" id="category"  readonly="">
                        <option value="" required=""> Select category</option>
                          @foreach($TourTravelCategory as $datas)
                            <option value="{{$datas->category}}" >{{$datas->category}}</option>
                          @endforeach
                        </select>
                        @error('category')
                          <span class="text-danger" role="alert">
                          <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                     </div>

                      <div class="form-group col-md-6" >
                      <label for="sr_vip_sixth">Sr. VP / VP (E6) </label>
                        <input type="text" name="sr_vip_sixth" id="sr_vip_sixth" class="form-control">
                        @error('sr_vip_sixth')
                          <span class="text-danger" role="alert">
                          <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                     </div>
                      <div class="form-group col-md-6" >
                      <label for="avp_sr_gm_fifth"> AVP/Sr. GM (E5)</label><br><br>
                        <input type="text" name="avp_sr_gm_fifth" id="avp_sr_gm_fifth" class="form-control">
                        @error('avp_sr_gm_fifth')
                          <span class="text-danger" role="alert">
                          <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                     </div>
                      <div class="form-group col-md-6" >
                      <label for="section_head_gm_dm_sr_manager_forth">Section Head/GM/ DGM/AGM/Sr.Mgr. (E4)</label>
                        <input type="text" name="section_head_gm_dm_sr_manager_forth" id="section_head_gm_dm_sr_manager_forth" class="form-control">
                        @error('section_head_gm_dm_sr_manager_forth')
                          <span class="text-danger" role="alert">
                          <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                     </div>
                      <div class="form-group col-md-6" >
                      <label for="team_leader_third">Mgr./Dy. Mgr./Asst. Mgr./Coordinator/Team Leader (E3)</label>
                        <input type="text" name="team_leader_third" id="team_leader_third" class="form-control">
                        @error('team_leader_third')
                          <span class="text-danger" role="alert">
                          <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                     </div>
                      <div class="form-group col-md-6" >
                      <label for="staff_officer_second">Staff/Officer/Executive/Asst. (E2)</label><br><br>
                        <input type="text" name="staff_officer_second" id="staff_officer_second" class="form-control">
                        @error('staff_officer_second')
                          <span class="text-danger" role="alert">
                          <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                     </div>
                     <div class="form-group col-md-6" >
                      <label for="Grade">Technician/ Drivers/Office Boys (E1)</label>
                        <input type="text" name="tecnician_driver_office_boy_first" id="tecnician_driver_office_boy_first" class="form-control">
                        @error('tecnician_driver_office_boy_first')
                          <span class="text-danger" role="alert">
                          <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                     </div>

                      <div class="form-group col-md-6" >
                      <label for="any_discription">Any Discription</label>
                        {{-- <input type="text" name="tour_rate" id="tour_rate" class="form-control"> --}}
                        <textarea  name="any_discription" id="any_discription" class="form-control"></textarea>
                        {{-- @error('any_discription')
                          <span class="text-danger" role="alert">
                          <strong>{{ $message }}</strong>
                        </span>
                        @enderror --}}
                     </div>

                      <div class="form-group col-md-4 align-self-end">
                        <button id="addpolicy" class="btn btn-primary" type="submit">
                          <i class="fa fa-fw fa-lg fa-check-circle"></i>ADD
                        </button>
                      </div>
                    </form>
                      {{-- END INSERT FORM --}}
                
                  </div>
                </div>
              </div>
            </div>
            <div class="modal-footer">
              <button type="button" id="close" class="btn btn-default" data-dismiss="modal">Close</button>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
{{-- END INSERT MODEL BOX --}}

{{-- ================================ --}}
  <br>
    <div class="row">
      <div class="col-md-12">
        <div class="tile">
          <div class="tile-body">
            <h1 align="center">TA/DA TABLE</h1>
            <div class="table-responsive">
              <table class="table table-hover table-bordered" id="sampleTable">
                <thead>
                  <tr>
                    <th>S.No</th>
                    <th>CATEGORY</th>
                    <th>(E6)</th>
                    <th>(E5)</th>
                    <th>(E4)</th>
                    <th>(E3)</th>
                    <th>(E2)</th>
                    <th>(E1)</th>
                    <th> Description</th>

                    <th>Action</th>

                  </tr>
                    <th></th>
                    <th> </th>
                    <th> Sr. VP / VP</th>
                    <th> AVP/Sr. GM</th>
                    <th> Section Head/GM/ DGM/AGM/Sr.Mgr. </th>
                    <th> Mgr./Dy. Mgr./Asst. Mgr./Coordinator/Team Leader </th>
                    <th> Staff/Officer/Executive/Asst. </th>
                    <th> Technician/ Drivers/Office Boys </th>
                    <th></th>
                    <hr>
                </thead>
                <tbody>
                @php $i=1; @endphp
                {{-- Foreach Loop start --}}
                
                   
                @foreach($TourTravelPolicy as $datas1)
              <tr>
                    <td>{{ $i++}}</td>
                    <td><b>{{ $datas1->category}}</b></td>
                    <td>{{ $datas1->sr_vip_sixth}}</td>
                    <td>{{ $datas1->avp_sr_gm_fifth}}</td>
                    <td>{{ $datas1->section_head_gm_dm_sr_manager_forth}}</td>
                    <td>{{ $datas1->team_leader_third}}</td>
                    <td>{{ $datas1->staff_officer_second}}</td>
                    <td>{{ $datas1->tecnician_driver_office_boy_first}}</td>
                    <td>{{ $datas1->any_description}}</td>
                    <td>
                    {{-- Delete form --}}
                 
                      <form method="post" action="{{ route('tour-policies.destroy',$datas1->id) }}">
                        @csrf
                        @method('DELETE')
                         {{-- Edit Button with model box call --}}
                             <button type="button" data-toggle="modal" data-target="#editpolicy{{ $datas1->id }}" class="fa fa-pencil-square-o btn btn-primary">
                             {{-- <i  aria-hidden="true" ></i> --}}
                             </button>
                              {{-- Delete button --}}
                             <button class="fa fa-trash btn btn-danger" onclick="return confirm(' you want to delete?');">
                              {{-- <i  aria-hidden="true"></i> --}}
                              </button>
                      </form>
                    </td>
                 </tr>
        {{-- Edit Model Box start ,this model box popup on edit button click --}}
            <div class="container">
              <div class="modal fade" id="editpolicy{{ $datas1->id }}" role="dialog">
                <div class="modal-dialog">
                  <!-- Modal content-->
                  <div class="row">
                    <div style="width: 131%;" class="modal-content">
                      <div class="modal-header">
                        <button class="close" data-dismiss="modal">&times;</button>
                        <h4 class="modal-title"></h4>
                      </div>
                      <div class="modal-body">
                        <div class="clearix"></div>
                        <div class="col-md-12">
                          <div class="tile">
                            <h3 class="tile-title">Update Tour Travel Policies</h3>
                            <div class="tile-body">
                            {{-- Update FORM --}}
                   
                              <form class="row" action="{{route('tour-policies.update',$datas1->id)}}" method="post">
                                @csrf
                                @method('PUT')

                                
                                <div class="form-group col-md-6" >
                                <label for="category">CATEGORY</label>
                                  <select name="category" class="form-control" id="category"  readonly="">
                                  <option value="{{$datas1->category}}" required=""> {{$datas1->category}}</option>
                                    @foreach($TourTravelCategory as $datas)
                                      <option value="{{$datas->category}}" >{{$datas->category}}</option>
                                    @endforeach
                                  </select>
                                  @error('category')
                                    <span class="text-danger" role="alert">
                                    <strong>{{ $message }}</strong>
                                  </span>
                                  @enderror
                               
                                </div>
                                <div class="form-group col-md-6" >
                                <label for="sr_vip_sixth">Sr. VP / VP (E6) </label>
                                  <input type="text" name="sr_vip_sixth" id="sr_vip_sixth" class="form-control" value="{{$datas1->sr_vip_sixth}}">
                                  @error('sr_vip_sixth')
                                    <span class="text-danger" role="alert">
                                    <strong>{{ $message }}</strong>
                                  </span>
                                  @enderror
                               </div>
                                <div class="form-group col-md-6" >
                                <label for="avp_sr_gm_fifth"> AVP/Sr. GM (E5)</label><br><br>
                                  <input type="text" name="avp_sr_gm_fifth" id="avp_sr_gm_fifth" class="form-control" value="{{$datas1->avp_sr_gm_fifth}}">
                                  @error('avp_sr_gm_fifth')
                                    <span class="text-danger" role="alert">
                                    <strong>{{ $message }}</strong>
                                  </span>
                                  @enderror
                               </div>
                                <div class="form-group col-md-6" >
                                <label for="section_head_gm_dm_sr_manager_forth">Section Head/GM/ DGM/AGM/Sr.Mgr. (E4)</label>
                                  <input type="text" name="section_head_gm_dm_sr_manager_forth" id="section_head_gm_dm_sr_manager_forth" class="form-control" value="{{$datas1->section_head_gm_dm_sr_manager_forth}}">
                                  @error('section_head_gm_dm_sr_manager_forth')
                                    <span class="text-danger" role="alert">
                                    <strong>{{ $message }}</strong>
                                  </span>
                                  @enderror
                               </div>
                                <div class="form-group col-md-6" >
                                <label for="team_leader_third">Mgr./Dy. Mgr./Asst. Mgr./Coordinator/Team Leader (E3)</label>
                                  <input type="text" name="team_leader_third" id="team_leader_third" class="form-control" value="{{$datas1->team_leader_third}}">
                                  @error('team_leader_third')
                                    <span class="text-danger" role="alert">
                                    <strong>{{ $message }}</strong>
                                  </span>
                                  @enderror
                               </div>
                                <div class="form-group col-md-6" >
                                <label for="staff_officer_second">Staff/Officer/Executive/Asst. (E2)</label><br><br>
                                  <input type="text" name="staff_officer_second" id="staff_officer_second" class="form-control" value="{{$datas1->staff_officer_second}}">
                                  @error('staff_officer_second')
                                    <span class="text-danger" role="alert">
                                    <strong>{{ $message }}</strong>
                                  </span>
                                  @enderror
                               </div>
                               <div class="form-group col-md-6" >
                                <label for="Grade">Technician/ Drivers/Office Boys (E1)</label>
                                  <input type="text" name="tecnician_driver_office_boy_first" id="tecnician_driver_office_boy_first" class="form-control" value="{{$datas1->tecnician_driver_office_boy_first}}">
                                  @error('tecnician_driver_office_boy_first')
                                    <span class="text-danger" role="alert">
                                    <strong>{{ $message }}</strong>
                                  </span>
                                  @enderror
                               </div>

                                <div class="form-group col-md-6" >
                                <label for="any_discription">Any Discription</label>
                                  {{-- <input type="text" name="tour_rate" id="tour_rate" class="form-control"> --}}
                                  <textarea  name="any_discription" id="any_discription" class="form-control">{{$datas1->any_discription}}</textarea>
                                  {{-- @error('any_discription')
                                    <span class="text-danger" role="alert">
                                    <strong>{{ $message }}</strong>
                                  </span>
                                  @enderror --}}
                               </div>
                     
                                <div class="form-group col-md-4 align-self-end">
                                    <button type="submit" class="btn btn-primary">
                                      <i class="fa fa-fw fa-lg fa-check-circle"></i>Update
                                    </button>
                                  </div>
                                </form>
                                  {{-- END Update FORM --}}
                 
                              </div>
                            </div>
                          </div>
                        </div>
                        <div class="modal-footer">
                          <button type="button" id="closeEdit" class="btn btn-default" data-dismiss="modal">Close</button>
                        </div>
                      
        {{-- Edit Model/Update Box End --}}
              @endforeach
            </tbody>
          </table>
        </div>
      </div>
    </div>
    <div>
           <h3> Note:</h3> 

              <p><b>Company-Arranged Accommodation</b><br>
Employees may avail of company-arranged accommodation, wherever available Facilities shall guide Local Front Office staff on eligibility criteria for employees as per Band, so that bookings are done accordingly.<br><br>

For Band 4 and below, in case of more than 2 employees traveling together it is mandatory to lake a twin sharing room and per night tariff for each traveler should not exceed 75% of the individual cost given above.<br><br>

Typically, no liquor expenses will be reimbursed.<br><br>

The following expense items are already included in the DA rate and are not to be claimed separately:<br><br>

I Charges for meals and beverages<br>
II  Any tips paid at hotels etc.<br>
III Laundry and dry cleaning.<br><br>

<b>Miscellaneous expenses</b><br>
Reimbursement of miscellaneous shall be decided by controlling officer on the merit of case to case basis.</p>

          </div>
  </div>
</div>
</main>
@endsection('content')


