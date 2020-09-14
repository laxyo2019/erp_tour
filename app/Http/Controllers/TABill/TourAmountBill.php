<?php

namespace App\Http\Controllers\TABill;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\Http\Controllers\Controller;
use Auth;
use File;
use Response;
use App\TABill;
use App\PurposeOfJournyDetail;
use App\LocalTaBillAmount;
use App\TourRequest;
use App\emp_mast;
use App\Department;
use App\Designation;
use App\Grade;
use App\company;
use App\User;
use App\TourRequestEmpAlong;

class TourAmountBill extends Controller
{
    public function index()
    {
       $user = User::find(Auth::user()->id);     
       $roleName = '';
       $useId    = Auth::user()->id;
    if($user->hasRole('tour_user')){
        // dd($useId);
        $roleName = 'tour_user';
        // $TABill = TABill::with('TDetail')->get();
       
        $data = TABill::orderBy('id', 'asc')
                ->where('user_id',$useId)
                ->get();      
    }
    elseif($user->hasRole('tour_manager')){
        // dd($useId);
        $roleName = 'tour_manager';
        // $TABill = TABill::with('TDetail')->get();
       
        $data = TABill::orderBy('id', 'asc')
                ->where('user_id',$useId)
                ->get();      
    } elseif($user->hasRole('tour_accountant')){
        // dd($useId);
        $roleName = 'tour_accountant';
        // $TABill = TABill::with('TDetail')->get();
       
        $data = TABill::orderBy('id', 'asc')
                ->where('user_id',$useId)
                ->get();      
    }
        // $department  = Department::all();
        // $designation = Designation::all();
        // $grade       = Grade::all();
        // $company     = company::all();
        // $data        = TABill::orderBy('id', 'asc')->get();
        // dd($data);

        return view('Tour-amount-bill.index',compact('data','department','designation','grade','company'));
    }

    public function create(Request $request)
    {
        $requestId = $request->id;

        $data = TourRequest::with(['emp_along.employee', 'emp_along.grade'])
                    ->where('id',$requestId)->first();

        //return $data;

        $TABill = TABill::get();

        return view('Tour-amount-bill.create',compact('data','TABill', 'requestId'));
    }

    public function store(Request $request)
    {
        /*
        * Store employees along with current employee on tour
        */
        $requestId          = $request->request_id;
        $emp                = $request->user_id;
        $allowDays          = $request->daily_allowance_day;
        $allowAmount        = $request->daily_allowance_amount;
        $metroDays          = $request->metropolitan;
        $metroAmount        = $request->metropolitan_amonut;
        $otherChargDetail   = $request->other_charge_detail;
        $otherChargAmount   = $request->other_charge_amount;    
        

        for($i=0; $i < count($emp); $i++){
            echo($otherChargAmount[$i]);

           TourRequestEmpAlong::where('tour_request_id', $requestId)
                ->where('user_id', $emp[$i])
                ->update([
                    'daily_allowance_days'   => $allowDays[$i],
                    'daily_allowance_amount' => $allowAmount[$i],
                    'metro_days'             => $metroDays[$i],
                    'metro_days_amount'      => $metroAmount[$i],
                    'other_charges'          => $otherChargDetail[$i],
                    'other_charges_amount'   => $otherChargAmount[$i]
                ]);
        }
        

        /************/

        $user_id = Auth::user()->id;
        $request->validate(['ta_no'=>'required',
                            'time_from' =>'required',
                            'time_to'   =>'required',
                            'grd'       =>'required',
                            'designation'=>'required',
                            'tour_from'  =>'required',
                            'tour_to'    =>'required',
                            'total_fare_amount' =>'required',
                            'emp_location' =>'required',
                            'emp_department' =>'required'
                            ]);

 
        // dd($request);
        $datas = array(
                        'user_id'   =>$user_id,
                        'ta_no'     => $request->ta_no,
                        'bill_no'   => $request->bill_no,
                        'time_from' => $request->time_from,
                        'time_to'   => $request->time_to,
                        'grd'       => $request->grd,
                        'designation' => $request->designation,
                        'tour_from'   => $request->tour_from,
                        'tour_to'     => $request->tour_to,
                        'total_fare_details'=> $request->total_fare_details,
                        'total_fare_amount' => $request->total_fare_amount,
                        //'daily_allowance_day'       => $request->daily_allowance_day,
                        //'daily_allowance_amonut'    => $request->daily_allowance_amonut,
                        //'metropolitan'              => $request->metropolitan,
                        //'metropolitan_amonut'       => $request->metropolitan_amonut,
                        //'daily_allownce_details'    => $request->daily_allownce_details,
                        //'daily_allownce_amount'     => $request->daily_allownce_amount,
                        'other_localities'          => $request->other_localities,
                        'other_localities_amount'   => $request->other_localities_amount,
                        'conveyance_chages_detail'  => $request->conveyance_chages_detail,
                        //'conveyance_chages_amount'  => $request->conveyance_chages_amount,
                        //'other_charge_detail'       => $request->other_charge_detail,
                        //'other_charge_amount'       => $request->other_charge_amount,
                        'less_advance_time'         => $request->less_advance_time,
                        'less_advance_amount'       => $request->less_advance_amount,
                        'due_blance_time'           => $request->due_blance_time,
                        'due_amount'                => $request->due_amount,
                        'emp_location'              => $request->emp_location,
                        'emp_department'            => $request->emp_department,
            'additional_advance_amount'  => $request->additional_advance_amount,
            'total_advance_amount'  => $request->total_advance_amount
        );

        //dd($datas);
        /*code for upload multiple files*/
        $data = [];
        if($request->hasfile('bills')!='')
        {
        // dd($datas);
            foreach($request->file('bills') as $file)
            {
                $name=$file->getClientOriginalName();
                $file->move(public_path().'/files/', $name);  
                $data[] = $name;  
            }

         $file = new File();
         $file->filename = json_encode($data);
         $datas['bills'] =  $file->filename;
         }
        
        /*end code for upload multiple files*/

        $creatData =  TABill::create($datas);

        //dd(64);
        $count = count($request->purpose_of_journy);
        if($count != 0){
            $x = 0;
            while($x < $count){

                if($request->purpose_of_journy[$x] !=''){
                      $datas2 = array(
                        'last_id'           => $creatData->id,
                        'purpose_of_journy' => $request->purpose_of_journy[$x],
                        'departure_dt'      => $request->departure_dt[$x],
                        'departure_station' => $request->departure_station[$x],
                        'arrival_dt'        => $request->arrival_dt[$x],
                        'arrival_station'   => $request->arrival_station[$x],
                        'class_by'          => $request->class_by[$x],
                        'fare_rs'           => $request->fare_rs[$x],
                        'ticket_no'         => $request->ticket_no[$x],
                        'remark'            => $request->remark[$x],
                        'departure_tm'      => $request->departure_tm[$x],
                        'arrival_tm'        => $request->arrival_tm[$x]
                    );
                      // dd($datas2);
                   $datapur = PurposeOfJournyDetail::create($datas2);

                }             
                $x++; 
            }
        }

        $count1 = count($request->local_tour_dt);

        if($count1 != 0){
            $x = 0;
            while($x < $count1){
                if($request->local_tour_dt[$x] !=''){
                      $datas3 = array(
                        'last_id'           => $creatData->id,
                        'local_tour_dt'     => $request->local_tour_dt[$x],
                        'mode_of_con_used'  => $request->mode_of_con_used[$x],
                        'from_dt'           => $request->from_dt[$x],
                        'to_dt'             => $request->to_dt[$x],
                        'con_approx_km'     => $request->con_approx_km[$x],
                        'con_amount'        => $request->con_amount[$x],
                        'total_amount_pr_km'=> $request->total_amount_pr_km[$x],
                        'created_at'        => date('Y-m-d H:i:s'),
                        'updated_at'        => date('Y-m-d H:i:s')
                    );

                    LocalTaBillAmount::insert($datas3);
                }             
                $x++; 
            }
        }
            //$ta_no = $request->ta_no;
            //$data = TourRequest::where('id',$ta_no)->first();
               $useId    = Auth::user()->id;
               $data = TABill::orderBy('id', 'asc')
                ->where('user_id',$useId)
                ->get();
               
           //  return view('Tour-amount-bill.index',compact('data'))->with('success','Request Send Successfully');
             // return view('Tour-amount-bill.create',compact('data'))->with('success','Request Send Successfully');
             // return back()->with('success','Request Send Successfully');
        return redirect()->route('tour-amount-bill.index')->with('success','Request Send Successfull.');

    }

    public function show($id)
    {
        $department  = Department::all();
        $designation = Designation::all();
        $grade       = Grade::all();
        $company     = company::all();
        $datas       = TABill::with(['user_details','department.department'])->where('id',$id)->get();
        $data2       = PurposeOfJournyDetail::where('last_id',$id)->get();
        $localDatas  = LocalTaBillAmount::where('last_id',$id)->get();
        $data        = TABill::where('id',$id)->first();
	    $advance_amount = TourRequest::where('id',$data->ta_no)->first();
        // dd($advance_amount);
        return view('Tour-amount-bill.tour-show-request.show-details',compact('datas','data2','localDatas','department','designation','grade','company','advance_amount'));
        
    }


    public function edit($id)
    {
        $department = Department::all();
        $designation = Designation::all();
        $grade = Grade::all();
        $company = company::all();
        $data = TABill::where('id',$id)->first();
//dd($data);
        $data2 = PurposeOfJournyDetail::where('last_id',$id)->get();
        $localDatas = LocalTaBillAmount::where('last_id',$id)->get();
        $advance_amount = TourRequest::where('id',$data->ta_no)->first();

        return view('Tour-amount-bill.edit',compact('data','data2','localDatas','department','designation','grade','company','advance_amount'));
    }

 
    public function update(Request $request, $id)
    {
        $user_id = Auth::user()->id;
        $request->validate(['ta_no'=>'required',
                            'bill_no'   =>'required',
                            'time_from' =>'required',
                            'time_to'   =>'required',
                            'grd'       =>'required',
                            'designation'=>'required',
                            'tour_from'  =>'required',
                            'tour_to'    =>'required',
                            'total_fare_amount' =>'required'
                            ]);

   

        $datas = array(
            'user_id'       =>$user_id,
            'ta_no'         => $request->ta_no,
            'bill_no'       => $request->bill_no,
            'time_from'     => $request->time_from,
            'time_to'       => $request->time_to,
            'grd'           => $request->grd,
            'designation'   => $request->designation,
            'tour_from'     => $request->tour_from,
            'tour_to'       => $request->tour_to,
            'total_fare_details'        => $request->total_fare_details,
            'total_fare_amount'         => $request->total_fare_amount,
            'daily_allowance_day'       => $request->daily_allowance_day,
            'daily_allowance_amonut'    => $request->daily_allowance_amonut,
            'metropolitan'              => $request->metropolitan,
            'metropolitan_amonut'       => $request->metropolitan_amonut,
            'daily_allownce_details'    => $request->daily_allownce_details,
            'daily_allownce_amount'     => $request->daily_allownce_amount,
            'other_localities'          => $request->other_localities,
            'other_localities_amount'   => $request->other_localities_amount,
            'conveyance_chages_detail'  => $request->conveyance_chages_detail,
            'conveyance_chages_amount'  => $request->conveyance_chages_amount,
            'other_charge_detail'       => $request->other_charge_detail,
            'other_charge_amount'       => $request->other_charge_amount,
            'less_advance_time'         => $request->less_advance_time,
            'less_advance_amount'       => $request->less_advance_amount,
            'due_blance_time'           => $request->due_blance_time,
            'due_amount'                => $request->due_amount,
	        'additional_advance_amount' => $request->additional_advance_amount,
	        'total_advance_amount'      => $request->total_advance_amount
        );

         /*code for upload multiple files*/

       if(!empty($request->hasfile('bills')))
        {
           
            foreach($request->file('bills') as $file)
            {
                $name=$file->getClientOriginalName();
                $file->move(public_path().'/files/', $name);  
                $datas['bills'] = $name;  
            }
        
         }else{
            $file  = TABill::find($id);
            //dd($file->bills);
            $img_nm = json_decode($file->bills);
            if ($img_nm) {            
		foreach ($img_nm as $value) {
                $datas['bills'] = $value;
            }
         }
          //$file= new File();
          //$file->filename = json_encode($datas);
          //$datas['bills'] =  $file->filename;      
        }
         

    /*end code for upload multiple files*/
    //dd($datas);

        $updatedData =  TABill::where('id',$id)->update($datas);

    $count = count($request->purpose_of_journy);  

        if($count != 0){
            $x = 0;
            while($x < $count){
                if($request->purpose_of_journy[$x] !=''){
                      $req_id = $request->id[$x];
                      $datas2 = array(
                        'purpose_of_journy' => $request->purpose_of_journy[$x],
                        'departure_dt'      => $request->departure_dt[$x],
                        'departure_station' => $request->departure_station[$x],
                        'arrival_dt'        => $request->arrival_dt[$x],
                        'arrival_station'   => $request->arrival_station[$x],
                        'class_by'          => $request->class_by[$x],
                        'fare_rs'           => $request->fare_rs[$x],
                        'ticket_no'         => $request->ticket_no[$x],
                        'remark'            => $request->remark[$x]
                    );
                      // dd($datas2);
                    PurposeOfJournyDetail::where('id',$req_id)->update($datas2);
                }             
                $x++; 
            }
        }

        if (!empty($request->local_tour_dt)) {
            
             $count1 = count($request->local_tour_dt);
                if($count1 != 0){
                    $x2 = 0;
                    while($x2 < $count1){
                        if($request->local_tour_dt[$x2] !=''){
                              $req_id1 = $request->ids[$x2];
                              // dd( $req_id1);
                              $datas3 = array(
                                'local_tour_dt'     => $request->local_tour_dt[$x2],
                                'mode_of_con_used'  => $request->mode_of_con_used[$x2],
                                'from_dt'           => $request->from_dt[$x2],
                                'to_dt'             => $request->to_dt[$x2],
                                'con_approx_km'     => $request->con_approx_km[$x2],
                                'con_amount'        => $request->con_amount[$x2],
                                'total_amount_pr_km'=> $request->total_amount_pr_km[$x2]
                            );
                            LocalTaBillAmount::where('ids',$req_id1)->update($datas3);
                        }             
                        $x2++; 
                    }
                }
        }
                

        if($updatedData){
            return back()->with('success','Request updated Successfully');
        }
    }

    public function destroy($id)
    {
         $data = TABill::where('id',$id)->delete();
                PurposeOfJournyDetail::where('last_id',$id)->delete();
          return back()->with('success','Request deleted Successfully');
    }




    public function ShowTourRequest()
    {

        $user = User::find(Auth::user()->id);     
        $roleName = '';
        if($user->hasRole('tour_admin')){
            $roleName = 'tour_admin';
            $data  = TABill::with(['user_details','department.department'])
                            ->where('manager_status',1)->orderBy('id', 'DESC')->get();

        }elseif ($user->hasRole('tour_manager')) {
            $roleName = 'tour_manager';

            //  $id    = Auth::user()->id;
            //  $department  = user::where('id',$id)->with(['department1.department'])->first();
            //  $managerDept = $department->department1->department->department;

            // $data  = TABill::with(['user_details','department.department'])->orderBy('id', 'DESC')->get();
             $id    = Auth::user()->id;
             $department  = user::where('id',$id)->with(['department1.department','department1.branch_details'])->first();
 
             $managerDept = $department->department1->department->name;
             $branch_name = $department->department1->branch_details->city;
             $data  = TABill::orderBy('id', 'DESC')
                                ->where('emp_department',$managerDept)
                                // ->where('emp_location',$branch_name)
                                ->get();
            // dd($managerDept);


         }elseif ($user->hasRole('tour_accountant')) {

           $data  = TABill::with(['user_details','department.department'])
               ->where('manager_status',1)
               ->orderBy('id', 'DESC')
               ->get();

           $roleName = 'tour_accountant';

         }elseif ($user->hasRole('tour_accountant')) {

           $data  = TABill::with(['user_details','department.department'])
                       ->where('leve2_status',0)
                       ->orderBy('id', 'DESC' )
                       ->get();
           $roleName = 'tour_accountant';

         }elseif ($user->hasRole('tour_superadmin')){
            $roleName = 'tour_superadmin';
             $data  = TABill::orderBy('id', 'DESC')->with(['user_details','department.department'])
                            ->where('manager_status',1)
                             ->where('level1_status',1)
                            ->get();
         }

        return view('Tour-amount-bill.tour-show-request.index',compact('data','roleName'));
    }
    public function TourRequestStatusmanager(TourRequest $tourRequest)
    {
        $stat;
        if($_POST['request_id'] == 1)
        {
            $msg = 'Approved';
            $stat = 1;
            TABill::find($_POST['id'])->update(['manager_status'=> $stat]);
        }
        elseif ($_POST['request_id'] = 2) {
            $response = $_POST['reason'];
            $msg = 'Decline';
            $stat = 2;
            TABill::find($_POST['id'])->update(['manager_status'=> $stat]);
        }
        return back()->with('success',$msg.' Successfully');
    }

    public function TourRequestStatusLevel1(TourRequest $tourRequest)
    {
        $stat;
        if($_POST['request_id'] == 1)
        {
            $msg = 'Approved';
            $stat = 1;
            TABill::find($_POST['id'])->update(['level1_status'=> $stat]);
        }
        elseif ($_POST['request_id'] = 2) {
            $response = $_POST['reason'];
            $msg = 'Decline';
            $stat = 2;
            TABill::find($_POST['id'])->update(['level1_status'=> $stat]);
        }
        return back()->with('success',$msg.' Successfully');
    }
    public function TourRequestStatusLevel2(TourRequest $tourRequest)
    {
        $stat;
        if($_POST['request_id'] == 1)
        {
            $msg = 'Approved';
            $stat = 1;
            $query = $_POST['reason'];

            TABill::find($_POST['id'])->update(['level2_status'=> $stat,'admin_response'=>$query]);

        }
        elseif ($_POST['request_id'] = 2) {
            $response = $_POST['reason'];
            $msg = 'Decline';
            $stat = 2;
            TABill::find($_POST['id'])->update(['level2_status'=> $stat]);
        }
        return back()->with('success',$msg.' Successfully');
    }

    public function download($id, $key)
    {
      $docs = TABill::first()
                      ->where('id', $id)
                      ->first();

       $avc = json_decode($docs->bills);
       if($avc !=NULL){
        // dd($docs->bills);
       $img = $avc[$key];
       $path = public_path('files/'.$img);
       //print_r($img);  die;
        // foreach ($avc as $value1) {
        //     $img = $avc[$key];
        //     // print_r($img); 
        //     
        // }
           return Response::download($path);
       }else{
       $avc = $docs->bills;
       // $img = $avc[$key];
       // dd($avc);
       $path = public_path('files/'.$avc);
           return Response::download($path);

       }
    }


    public function accountantBill(TABill $TABill)
    {
        $stat;
        if($_POST['request_id'] == 1)
        {
            $msg  = 'Amount paid ';
            $stat = 1;
            $query = $_POST['reason'];
            TABill::find($_POST['id'])->update(['accountant_status'=> $stat,'accountant_response'=>$query]);
        }
        elseif ($_POST['request_id'] == 2) {
            $response = $_POST['reason'];
            $msg = 'amount Unpaid';
            $stat = 2;
            TABill::find($_POST['id'])->update(['accountant_status'=> $stat]);
        }
        elseif ($_POST['request_id'] == 3) {
        // dd($_POST);
            $accountant_response = $_POST['reason'];
            $msg = 'amount received';
            $stat = 3;
            TABill::find($_POST['id'])->update(['accountant_status'=> $stat,'accountant_response'=>$accountant_response]);
        }
        return back()->with('success',$msg.' Successfully');
    }
    
    public function accountantVarifyBill(TABill $TABill)
    {
       // dd($_POST);
        $stat;
        if($_POST['request_id'] == 1)
        {
            $msg  = 'Bill varified ';
            $stat = 1;
            $acct__bill_vari_res = $_POST['acct__bill_vari_res'];
            TABill::find($_POST['id'])->update(['accountant_status_varied_bill'=> $stat,'acct__bill_vari_res'=>$acct__bill_vari_res]);
        }
        elseif ($_POST['request_id'] = 2) {

            $acct_bill_discard_res  = $_POST['acct_bill_discard_res'];
            $msg = 'Bill not varified';
            $stat = 2;
            TABill::find($_POST['id'])->update(['accountant_status_varied_bill'=> $stat,'acct_bill_discard_res'=>$acct_bill_discard_res]);
        }
        return back()->with('success',$msg.' Successfully');
    }
}

