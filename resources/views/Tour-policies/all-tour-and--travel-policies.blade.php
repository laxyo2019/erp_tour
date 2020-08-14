@extends('layout.main')
@section('content')


<main class="app-content">
  <div class="app-title">
    <div>
         <div>
          <h1><i class="app-menu__icon fa fa-comments-o"></i>  Tour And Travels Policies</h1>
        </div>
          
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
                    @if($gradeEmp =='E6') <th>(E6)</th> @endif
                    @if($gradeEmp =='E5') <th>(E5)</th> @endif
                    @if($gradeEmp =='E4') <th>(E4)</th> @endif
                    @if($gradeEmp =='E3') <th>(E3)</th> @endif
                    @if($gradeEmp =='E2') <th>(E2)</th> @endif
                    @if($gradeEmp =='E1') <th>(E1)</th> @endif
                    <th> Description</th>

                  </tr>
                    <th></th>
                    <th> </th>
                     @if($gradeEmp =='E6')<th> Sr. VP / VP</th>@endif
                     @if($gradeEmp =='E5')<th> AVP/Sr. GM</th>@endif
                     @if($gradeEmp =='E4')<th> Section Head/GM/ DGM/AGM/Sr.Mgr. </th>@endif
                     @if($gradeEmp =='E3')<th> Mgr./Dy. Mgr./Asst. Mgr./Coordinator/Team Leader </th>@endif
                     @if($gradeEmp =='E2')<th> Staff/Officer/Executive/Asst. </th>@endif
                     @if($gradeEmp =='E1')<th> Technician/ Drivers/Office Boys </th>@endif
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
                     @if($gradeEmp =='E6')<td>{{ $datas1->sr_vip_sixth}}</td>@endif
                    @if($gradeEmp =='E5')<td>{{ $datas1->avp_sr_gm_fifth}}</td>@endif
                    @if($gradeEmp =='E4')<td>{{ $datas1->section_head_gm_dm_sr_manager_forth}}</td>@endif
                    @if($gradeEmp =='E3')<td>{{ $datas1->team_leader_third}}</td>@endif
                    @if($gradeEmp =='E2') <td>{{ $datas1->staff_officer_second}}</td>@endif
                    @if($gradeEmp =='E1')<td>{{ $datas1->tecnician_driver_office_boy_first}}</td>@endif
                    <td>{{ $datas1->any_description ? $datas1->any_description : 'Empty'}}</td>
                    
                 </tr>
     
                                  {{-- END Update FORM --}}
                 
                      
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


