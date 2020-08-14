
 @extends('layout.main')
 @section('content')
    <main class="app-content">
      <div class="app-title">
        <div>
          <h1><i class="fa fa-dashboard"></i> Dashboard</h1>
          {{-- <p>A free and open source Bootstrap 4 admin template</p> --}}
        </div>
        <ul class="app-breadcrumb breadcrumb">
          <li class="breadcrumb-item"><i class="fa fa-home fa-lg"></i></li>
          <li class="breadcrumb-item"><a href="#">Dashboard</a></li>
        </ul>
      </div>

        <div class="col-md-12">
          <div class="tile">
          <div class="container">
		    <div class="row justify-content-center">
		        <div class="col-md-8">
		            <div class="card"> 
		            	<div class="card-body">
		            		<h1 align='center'>Welcome :  {{ Auth::user()->name }}</h1>
		            	</div>

		            </div>

		        </div>

		    </div>
        
     
   @role('tour_admin')

    <div class="row">
      <div class="col-md-12">
        <div class="tile">
          <div class="tile-body">
            <h1 align="center">TA/DA TABLE (Tour And Travels Policies)</h1>
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
                    <td>{{ $datas1->any_description ? $datas1->any_description : 'Empty'}}</td>
                    
                 </tr>
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
 @endrole
 @role('tour_accountant')

    <div class="row">
      <div class="col-md-12">
        <div class="tile">
          <div class="tile-body">
            <h1 align="center">TA/DA TABLE (Tour And Travels Policies)</h1>
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
                    <td>{{ $datas1->any_description ? $datas1->any_description : 'Empty'}}</td>
                    
                 </tr>
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
 @endrole
 @role('tour_user')

    <div class="row">
      <div class="col-md-12">
        <div class="tile">
          <div class="tile-body">
            <h1 align="center">TA/DA TABLE (Tour And Travels Policies)</h1>
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
                    <td>{{ $datas1->any_description ? $datas1->any_description : 'Empty'}}</td>
                    
                 </tr>
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
 @endrole
 @role('tour_manager')

    <div class="row">
      <div class="col-md-12">
        <div class="tile">
          <div class="tile-body">
            <h1 align="center">TA/DA TABLE (Tour And Travels Policies)</h1>
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
                    <td>{{ $datas1->any_description ? $datas1->any_description : 'Empty'}}</td>
                    
                 </tr>
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
 @endrole
		</div>
	</div>
</div>
</main>
 @endsection