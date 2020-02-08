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

class TourAmountBill extends Controller
{
    
    public function index()
    {
        $department  = Department::all();
        $designation = Designation::all();
        $grade       = Grade::all();
        $company     = company::all();
        $data        = TABill::orderBy('id', 'DESC')->get();
        return view('Tour-amount-bill.index',compact('data','department','designation','grade','company'));
    }

    public function create()
    {
        $department  = Department::all();
        $designation = Designation::all();
        $grade       = Grade::all();
        $company     = company::all();

          return view('Tour-amount-bill.create',compact('department','designation','grade','company'));
    }

    public function store(Request $request)
    {
        // dd($request);
        $user_id = Auth::user()->id;
        $request->validate(['ta_no'=>'required',
                            'bill_no'   =>'required',
                            'time_from' =>'required',
                            'time_to'   =>'required',
                            'grd'       =>'required',
                            'designation'=>'required',
                            'tour_from'  =>'required',
                            'tour_to'    =>'required',
                            'total_fare_details'=>'required',
                            'total_fare_amount' =>'required',
                            'bills' => 'required',
                            'bills.*' => 'required'
                            ]);
    /*code for upload multiple files*/
        if($request->hasfile('bills'))
        {
            foreach($request->file('bills') as $file)
            {
                $name=$file->getClientOriginalName();
                $file->move(public_path().'/files/', $name);  
                $data[] = $name;  
            }
         }
         $file= new File();
         $file->filename = json_encode($data);
    /*end code for upload multiple files*/

        $datas = array(
                        'user_id'=>$user_id,
                        'ta_no' => $request->ta_no,
                        'bill_no' => $request->bill_no,
                        'time_from' => $request->time_from,
                        'time_to' => $request->time_to,
                        'grd' => $request->grd,
                        'designation' => $request->designation,
                        'tour_from' => $request->tour_from,
                        'tour_to' => $request->tour_to,
                        
                        'total_fare_details'=> $request->total_fare_details,
                        'total_fare_amount' => $request->total_fare_amount,
                        'daily_allowance_day'      => $request->daily_allowance_day,
                        'daily_allowance_amonut'   => $request->daily_allowance_amonut,
                        'metropolitan'             => $request->metropolitan,
                        'metropolitan_amonut'      => $request->metropolitan_amonut,
                        'daily_allownce_details'   => $request->daily_allownce_details,
                        'daily_allownce_amount'    => $request->daily_allownce_amount,
                        'other_localities'         => $request->other_localities,
                        'other_localities_amount'  => $request->other_localities_amount,
                        'conveyance_chages_detail'  => $request->conveyance_chages_detail,
                        'conveyance_chages_amount'  => $request->conveyance_chages_amount,
                        'other_charge_detail'       => $request->other_charge_detail,
                        'other_charge_amount'       => $request->other_charge_amount,
                        'less_advance_time'         => $request->less_advance_time,
                        'less_advance_amount'       => $request->less_advance_amount,
                        'due_blance_time'           => $request->due_blance_time,
                        'due_amount'                => $request->due_amount,
                        'bills'                     => $file->filename
        );

        $creatData =  TABill::create($datas);
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
                    PurposeOfJournyDetail::create($datas2);
                }             
                $x++; 
            }
        }

        $count1 = count($request->local_tour_dt);

        if($count1 != 0){
            $x = 0;
            while($x < $count1){
                if($request->local_tour_dt[$x] !=''){
                      $datas2 = array(
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
                    LocalTaBillAmount::insert($datas2);
                }             
                $x++; 
            }
        }

        if($creatData){
            return back()->with('success','Request Send Successfully');
        }

    }

    public function show($id)
    {
        $department  = Department::all();
        $designation = Designation::all();
        $grade       = Grade::all();
        $company     = company::all();
        $data        = TABill::with(['user_details','department.department'])->where('id',$id)->get();
        $data2       = PurposeOfJournyDetail::where('last_id',$id)->get();

        $localDatas       = LocalTaBillAmount::where('last_id',$id)->get();
        return view('Tour-amount-bill.tour-show-request.show-details',compact('data','data2','localDatas','department','designation','grade','company'));
        
    }


    public function edit($id)
    {
        $department = Department::all();
        $designation = Designation::all();
        $grade = Grade::all();
        $company = company::all();
        $datas = TABill::where('id',$id)->get();
        $data2 = PurposeOfJournyDetail::where('last_id',$id)->get();
        $localDatas = LocalTaBillAmount::where('last_id',$id)->get();
        return view('Tour-amount-bill.edit',compact('datas','data2','localDatas','department','designation','grade','company'));
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
                            'total_fare_details'=>'required',
                            'total_fare_amount' =>'required'
                            ]);

    /*code for upload multiple files*/

       if(!empty($request->hasfile('bills')))
        {
            // dd(count($request->bills));
            foreach($request->file('bills') as $file)
            {
                $name=$file->getClientOriginalName();
                $file->move(public_path().'/files/', $name);  
                $datas[] = $name;  
            }
         }else{
            $file  = TABill::find($id);
            $img_nm = json_decode($file->bills);
            foreach ($img_nm as $value) {
                $datas[] = $value;
            }
         }
         $file= new File();
         $file->filename = json_encode($datas);

    /*end code for upload multiple files*/

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
            'bills'                     => $file->filename,
        );

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

        $user = \Auth::user();
        $this->username = $user->name;
        $this->role =$user->roles->first()->name;

        $roleName = $user->roles->first()->name;

        if($roleName == 'level_1'){
            $data  = TABill::with(['user_details','department.department'])
                            ->where('manager_status',1)->orderBy('id', 'DESC')->get();;

         }elseif ($roleName == 'manager') {

             $data  = TABill::with(['user_details','department.department'])->orderBy('id', 'DESC')->get();


         }elseif ($roleName == 'level_2') {
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

            TABill::find($_POST['id'])->update(['level2_status'=> $stat,'request'=>$query]);

        }
        elseif ($_POST['request_id'] = 2) {
            $response = $_POST['reason'];
            $msg = 'Decline';
            $stat = 2;
            TABill::find($_POST['id'])->update(['level2_status'=> $stat]);
        }
        return back()->with('success',$msg.' Successfully');
    }

    public function download($id)
    {
         $docs = TABill::first()
                      ->where('id', $id)
                      ->first();

       $avc = json_decode($docs->bills);
        foreach ($avc as  $value1) {
            $path = public_path('files/'.$value1);
            return Response::download($path);
        }
       }


}
