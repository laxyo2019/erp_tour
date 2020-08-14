<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\TourRequest;
use App\emp_mast;
use App\Department;
use App\Designation;
use App\Grade;
use App\company;
use App\User;
use App\TABill;
use Auth;
use App\TourRate;
use App\MetropolitanRate;
use DB;
use App\Role;
use App\TourRequestEmpAlong;

class MyTourRequestController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

       $user = User::find(Auth::user()->id);     
       $roleName = '';
       $useId    = Auth::user()->id;
       // $roles = Role::wehere('id',$useId)->first();
       //dd($useId);
       if($user->hasRole('tour_user')){
            $roleName = 'tour_user';

            $TABillCount = TABill::with('TDetail')
                    ->where('user_id',$useId)
                    ->orderBy('id', 'DESC')
                    ->get();
           
            $data = TourRequest::orderBy('id', 'DESC')
                    ->where('user_id',$useId)
                    ->get();
                    // dd( $data);
            $getDate = TourRequest::orderBy('id', 'DESC')
                    ->where('user_id',$useId)
                    ->where('accountant_status',1)
                    ->get();       
            // dd($getDate);
            $allrecords = array();        
            foreach($getDate as $Data){
                $allrecords[] = $Data;
            }
            $Dates= array_column($allrecords,'time_from');
            $sortDate = !empty($Dates) ? min($Dates):'';           
            // $All  
                    
        }elseif($user->hasRole('tour_manager')){
            $roleName = 'tour_manager';

       // dd($roleName);

            $data = TourRequest::orderBy('id', 'asc')->where('user_id',$useId)->get();

            $TABillCount = TABill::with('TDetail')->get();
            $getDate = TourRequest::orderBy('id', 'asc')
                    ->where('user_id',$useId)
                    ->where('accountant_status',1)
                    ->get();       
            //dd($getDate);
            $allrecords = array();        
            foreach($getDate as $Data){
                $allrecords[] = $Data;
            }
            $Dates= array_column($allrecords,'time_from');
            $sortDate = !empty($Dates) ? min($Dates):'';

        }elseif($user->hasRole('tour_admin')){
            $roleName = 'tour_admin';

            $data = TourRequest::orderBy('id', 'asc')->where('manager_status',1)->where('user_id',$useId)->get();

        }elseif($user->hasRole('tour_accountant')){
            $roleName = 'tour_accountant';
            
            // $data = TourRequest::orderBy('id', 'asc')->where('manager_status',1)->where('user_id',$useId)->get();
            $TABillCount = TABill::with('TDetail')
                    ->where('user_id',$useId)
                    ->orderBy('id', 'DESC')
                    ->get();
           
            $data = TourRequest::orderBy('id', 'DESC')
                    ->where('user_id',$useId)
                    ->get();
                    // dd( $data);
            $getDate = TourRequest::orderBy('id', 'DESC')
                    ->where('user_id',$useId)
                    ->where('accountant_status',1)
                    ->get();       
            // dd($getDate);
            $allrecords = array();        
            foreach($getDate as $Data){
                $allrecords[] = $Data;
            }
            $Dates= array_column($allrecords,'time_from');
            $sortDate = !empty($Dates) ? min($Dates):'';
        }
        // dd($roleName);
        return view('tour-request.index',compact('data','roleName','TABillCount','sortDate'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {   
        $user_id = Auth::user()->id;
        $data  = emp_mast::where('user_id',$user_id)->with(['department','designation','grade','company','branch_details'])->first();
        // dd($data);
        // $department = Department::all();
        $designation = Designation::all();
        $grade = Grade::all();
        $company = company::all();
        $employees = emp_mast::all();

        return view('tour-request.create',compact('data','designation','grade','company', 'employees'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        //dd($request->employees_along);

        foreach($request->employees_along as $index){
            
            TourRequestEmpAlong::create([
                'user_id' => $index
            ]) ;
        }

        $user_id = Auth::user()->id;

        $data = $request->validate([
            'emp_name'          =>  'required',
            'grd'               =>  'required',
            'designation'       =>  'required',
            'department'        =>  'required',
            'tour_from'         =>  'required',
            'tour_to'           =>  'required',
            'time_from'         =>  'required',
            'time_to'           =>  'required',
            'purpuse_of_tour'   =>  'required',
            'advance_amount'    =>  'required',
            'emp_location'      =>  'required'
        ]);

        $data['user_id']        = $user_id;
        $data['mode_of_travel'] = $request->mode_of_travel;
        $data['entitlement']    = $request->entitlement;
        $data['proposed_class'] = $request->proposed_class;
        $data['justification']  = $request->justification;

        if(Auth::user()->hasRole('tour_manager')){
            $data['manager_status'] = 1;
        }



        TourRequest::create($data);
            return back()->with('success','Request Send Successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\TourRequest  $tourRequest
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $department  = Department::all();
        $designation = Designation::all();
        $grade       = Grade::all();
        $company     = company::all();
        $data        = TourRequest::orderBy('id', 'DESC')->with(['user_details','department.department'])->where('id',$id)->get();

        return view('showrequest.show-details',compact('data','department','designation','grade','company'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\TourRequest  $tourRequest
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        // $department = Department::all();
        // $designation = Designation::all();
        // $grade = Grade::all();
        // $company = company::all();
        // $allData  = emp_mast::with(['department','designation','grade','company','branch_details'])->first();

        $data = TourRequest::where('id',$id)->first();
        return view('tour-request.edit',compact('data'));

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\TourRequest  $tourRequest
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, TourRequest $tourRequest,$id)
    {
       
         $user_id = Auth::user()->id;
         $data = $request->validate([
            'emp_name'=>'required',
            'grd'=>'required',
            'designation'=>'required',
            'department'=>'required',
            'tour_from'=>'required',
            'tour_to'=>'required',
            'time_from'=>'required',
            'time_to'=>'required',
            'purpuse_of_tour'=>'required',
            'advance_amount'=>'required'

        ]);
        $data['user_id'] = $user_id;
        $data['mode_of_travel'] = $request->mode_of_travel;
        $data['entitlement'] = $request->entitlement;
        $data['proposed_class'] = $request->proposed_class;
        $data['justification'] = $request->justification;
        // dd($data);
        TourRequest::where('id',$id)->update($data);
            return back()->with('success','Request update Successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\TourRequest  $tourRequest
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
         $data = TourRequest::where('id',$id)->delete();
         return back()->with('success','Request deleted Successfully');

    }
    /*ShowRequest function show listing which is send for approvel*/
    public function ShowRequest()
    {
       $user = User::find(Auth::user()->id);     
       $roleName = '';
      // $id    = Auth::user()->id;
         if ($user->hasRole('tour_manager')) {

             $roleName = 'tour_manager';
             $id    = Auth::user()->id;
             $department  = user::where('id',$id)->with(['department1.department','department1.branch_details'])->first();
 	// dd( $department);
             $managerDept = $department->department1->department->name;
             $branch_name = $department->department1->branch_details->city;
             $data  = TourRequest::orderBy('id', 'DESC')->where('department',$managerDept)->get();
             //dd($managerDept);
             // $data = DB::table('tour_request')
             //        ->join('emp_masts', 'tour_request.user_id', '=', 'emp_masts.user_id')
             //        ->where('branch_id',$branch_id)
             //        ->where('department',$managerDept)
             //        ->get();
         
         } elseif($user->hasRole('tour_admin')){
            
            $roleName = 'tour_admin';
            $data  = TourRequest::orderBy('id', 'DESC')->with(['user_details','department.department'])->where('manager_status',1)->get();

         }elseif ($user->hasRole('tour_superadmin')) {
             $roleName = 'tour_superadmin';
             $data  = TourRequest::orderBy('id', 'DESC')->with(['user_details','department.department'])
                            ->where('manager_status',1)
                            ->where('level1_status',1)
                            ->get();             

         }elseif ($user->hasRole('tour_accountant')) {
             $roleName = 'tour_accountant';
            
             $data  = TourRequest::orderBy('id', 'DESC')->with(['user_details','department.department'])->where('level2_status',1)->get();

         }

        return view('showrequest.index',compact('data','roleName'));
    }
    public function RequestStatusmanager(TourRequest $tourRequest)
    {
        $stat;
        if($_POST['request_id'] == 1)
        {
            $msg = 'Approved';
            $stat = 1;
            // dd($stat);
            TourRequest::find($_POST['id'])->update(['manager_status'=> $stat]);
        }
        elseif ($_POST['request_id'] = 2) {
            $response = $_POST['reason'];
            $msg = 'Decline';
            $stat = 2;
            TourRequest::find($_POST['id'])->update(['manager_status'=> $stat]);
        }
        return back()->with('success',$msg.' Successfully');
    }
    public function RequestStatusLevel1(TourRequest $tourRequest)
    {
         
        $stat;
        if($_POST['request_id'] == 1)
        {
            $msg = 'Approved';
            $stat = 1;
            TourRequest::find($_POST['id'])->update(['level1_status'=> $stat]);
        }
        elseif ($_POST['request_id'] = 2) {
            $response = $_POST['reason'];
            $msg = 'Decline';
            $stat = 2;
            TourRequest::find($_POST['id'])->update(['level1_status'=> $stat]);
        }
        return back()->with('success',$msg.' Successfully');
    }
    public function RequestStatusLevel2(TourRequest $tourRequest)
    {
           
        $stat;
        if($_POST['request_id'] == 1)
        {
            $msg = 'Approved';
            $stat = 1;
            $query = $_POST['reason'];
            TourRequest::find($_POST['id'])->update(['level2_status'=> $stat,'admin_response'=>$query]);
        }
        elseif ($_POST['request_id'] = 2) {
            $response = $_POST['reason'];
            $msg = 'Decline';
            $stat = 2;
            TourRequest::find($_POST['id'])->update(['level2_status'=> $stat]);
        }
        return back()->with('success',$msg.' Successfully');
    } 
    public function RequestStatusAccountant(TourRequest $tourRequest)
    {
        // dd($_POST);
        $stat;
        if($_POST['request_id'] == 1)
        {
            $msg = 'Amount paid ';
            $stat = 1;
            $query = $_POST['reason'];
            TourRequest::find($_POST['id'])->update(['accountant_status'=> $stat,'accountant_response'=>$query]);
        }
        elseif ($_POST['request_id'] = 2) {
            $response = $_POST['reason'];
            $msg = 'amount Unpaid';
            $stat = 2;
            TourRequest::find($_POST['id'])->update(['accountant_status'=> $stat]);
        }
        return back()->with('success',$msg.' Successfully');
    }

    public function tourRateMultiple()
    {
        $daily_allowance_day = $_POST['daily_allowance_day'];
        $grd = $_POST['grd'];
        
        $TourRate1 = TourRate::where('grade',$grd)->first();
      
        return $tour_rate = $TourRate1->tour_rate*$daily_allowance_day;
            // return $tourRequest;
    } 
    public function mertroTourRateMultiple()
    {
        $metropolitan = $_POST['metropolitan'];
      
        $grd = $_POST['grd'];
        $TourRate = MetropolitanRate::where('grade',$grd)->first();
        
        return $tour_rate = $TourRate->metropolitan_tour_rate*$metropolitan;
            // return $tourRequest;
    }

    public function Delete_per($id){
        
    }
}

