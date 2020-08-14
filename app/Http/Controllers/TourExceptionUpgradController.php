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
use App\TourUpgradation;
use App\TourUpgradationBill;

class TourExceptionUpgradController extends Controller
{
     public function index()
    {
       $user = User::find(Auth::user()->id);     
       $roleName = '';
       $useId    = Auth::user()->id;
       // dd($useId);

       // $roles = Role::wehere('id',$useId)->first();

       if($user->hasRole('tour_user')){
            $roleName = 'tour_user';

             
            $data = TourUpgradation::orderBy('id', 'DESC')
                    ->where('user_id',$useId)
                    ->get();

            $TABillCount = TourUpgradationBill::with('TDetail')
                                ->where('user_id',$useId)
                                ->get();
            $getDate = TourUpgradation::orderBy('id', 'DESC')
                    ->where('user_id',$useId)
                    ->get();       
            $allrecords = array();        
            foreach($getDate as $Data){
                $allrecords[] = $Data;
            }
            $Dates= array_column($allrecords,'time_from');
            $sortDate = !empty($Dates) ? min($Dates):'';
                    
        }elseif($user->hasRole('tour_manager')){
            $roleName = 'tour_manager';

       // dd($roleName);

            $data = TourUpgradation::orderBy('id', 'DESC')->where('user_id',$useId)->get();

            $TABillCount = TABill::with('TDetail')->get();
            $getDate = TourUpgradation::orderBy('id', 'DESC')
                    ->where('user_id',$useId)
                    ->get();  
            $allrecords = array();        
            foreach($getDate as $Data){
                $allrecords[] = $Data;
            }
            $Dates= array_column($allrecords,'time_from');
            $sortDate = !empty($Dates) ? min($Dates):'';

        }elseif($user->hasRole('tour_admin')){
            $roleName = 'tour_admin';

           $data = TourUpgradation::orderBy('id', 'DESC')->where('user_id',$useId)->get();

            $TABillCount = TABill::with('TDetail')->get();
            $getDate = TourUpgradation::orderBy('id', 'DESC')
                    ->where('user_id',$useId)
                    ->get();       
            //dd($getDate);
            $allrecords = array();        
            foreach($getDate as $Data){
                $allrecords[] = $Data;
            }
            $Dates= array_column($allrecords,'time_from');
            $sortDate = !empty($Dates) ? min($Dates):'';

        }elseif($user->hasRole('tour_superadmin')){
            $roleName = 'tour_superadmin';
            
            $data = TourUpgradation::orderBy('id', 'DESC')->where('user_id',$useId)->get();

            $TABillCount = TABill::with('TDetail')->get();
            $getDate = TourUpgradation::orderBy('id', 'DESC')
                    ->where('user_id',$useId)
                    ->get();       
            //dd($getDate);
            $allrecords = array();        
            foreach($getDate as $Data){
                $allrecords[] = $Data;
            }
            $Dates= array_column($allrecords,'time_from');
            $sortDate = !empty($Dates) ? min($Dates):'';
        }
        // dd($roleName);
        return view('Tour-Exp-upgradation.index',compact('data','roleName','TABillCount','sortDate'));
    }
   
    public function create()
    {   
        $user_id = Auth::user()->id;
        $data    = emp_mast::where('user_id',$user_id)
                    ->with(['department','designation','grade','company','branch_details'])
                    ->first();
        // dd($data);
        // $department = Department::all();
        $designation = Designation::all();
        $grade = Grade::all();
        $company = company::all();

        return view('Tour-Exp-upgradation.create',compact('data','designation','grade','company'));
    }

   
    public function store(Request $request)
    {

        $user_id = Auth::user()->id;
        // dd($request);
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
            'justification'=>'required',
            'emp_location'=>'required',
            'exception_heigh_upgradaton'=>'required'


        ]);
        $data['user_id'] = $user_id;
        $data['mode_of_travel'] = $request->mode_of_travel;
        $data['entitlement'] = $request->entitlement;
        $data['proposed_class'] = $request->proposed_class;
        $data['justification'] = $request->justification;
        TourUpgradation::create($data);
           
            return redirect()->route('tour-exp-upgradation.index')->with('success','Request Send Successfully.');
    }

    public function show($id)
    {
        $department  = Department::all();
        $designation = Designation::all();
        $grade       = Grade::all();
        $company     = company::all();
    // dd( $id);
        
        $data        = TourUpgradation::orderBy('id', 'DESC')
                        ->with(['user_details'])
                        ->where('id',$id)
                        ->get();

        return view('Tour-Exp-upgradation.show-details',compact('data','department','designation','grade','company'));
    }

   
    public function edit($id)
    {
        // $department = Department::all();
        // $designation = Designation::all();
        // $grade = Grade::all();
        // $company = company::all();
        // $allData  = emp_mast::with(['department','designation','grade','company','branch_details'])->first();

        $data = TourUpgradation::where('id',$id)->first();
    // dd( $data);

        return view('Tour-Exp-upgradation.edit',compact('data'));

    }

    public function update(Request $request, TourUpgradation $TourUpgradation,$id)
    {
       
         $user_id = Auth::user()->id;
    // dd( $id);
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
            'justification'=>'required',
            'exception_heigh_upgradaton'=>'required'


        ]);
        $data['user_id'] = $user_id;
        $data['mode_of_travel'] = $request->mode_of_travel;
        $data['entitlement'] = $request->entitlement;
        $data['proposed_class'] = $request->proposed_class;
        $data['justification'] = $request->justification;
        // dd($data);
        TourUpgradation::where('id',$id)->update($data);
            
            return back()->with('success','Request update Successfully');
    }

    
    public function destroy($id)
    {
         $data = TourUpgradation::where('id',$id)->delete();
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
             $department  = user::where('id',$id)
                            ->with(['department1.department','department1.branch_details'])
                            ->first();
    // dd( $department);
            $managerDept = $department->department1->department->name;
            $branch_name = $department->department1->branch_details->city;
            $data  = TourUpgradation::orderBy('id', 'DESC')
                                    ->where('department',$managerDept)
                                    ->where('emp_location',$branch_name)
                                    ->get();
             //dd($managerDept);
             // $data = DB::table('tour_request')
             //        ->join('emp_masts', 'tour_request.user_id', '=', 'emp_masts.user_id')
             //        ->where('branch_id',$branch_id)
             //        ->where('department',$managerDept)
             //        ->get();
         
         } elseif($user->hasRole('tour_admin')){
            
             $roleName = 'tour_admin';
             $id    = Auth::user()->id;
             $department  = user::where('id',$id)->with(['department1.department','department1.branch_details'])->first();
             $managerDept = $department->department1->department->name;
             $branch_name = $department->department1->branch_details->city;
             $data  = TourUpgradation::orderBy('id', 'DESC')
                                    ->where('manager_status',1)
                                    ->where('department',$managerDept)
                                    ->where('emp_location',$branch_name)
                                    ->get();
             // dd($data);

         }elseif ($user->hasRole('tour_superadmin')) {
             $roleName = 'tour_superadmin';
             
             $id    = Auth::user()->id;
             $department  = user::where('id',$id)->with(['department1.department','department1.branch_details'])->first();
             $managerDept = $department->department1->department->name;
             $branch_name = $department->department1->branch_details->city;
             $data  = TourUpgradation::orderBy('id', 'DESC')
                                    ->where('manager_status',1)
                                    ->where('level1_status',1)
                                    ->where('department',$managerDept)
                                    ->where('emp_location',$branch_name)
                                    ->get();             

         }elseif ($user->hasRole('tour_accountant')) {
             $roleName = 'tour_accountant';
            
             $data  = TourUpgradation::orderBy('id', 'DESC')->with(['user_details','department.department'])->where('level2_status',1)->get();

         }

        return view('show-tour-upgradation-request.index',compact('data','roleName'));
    }
    public function RequestStatusmanager(TourUpgradation $TourUpgradation){

        // dd( $_POST);
        $stat;
        if($_POST['request_id'] == 1)
        {
            $msg = 'Approved';
            $stat = 1;
            // dd($stat);
            $query = $_POST['reason'];
            TourUpgradation::find($_POST['id'])->update(['manager_status'=> $stat,'manager_response'=>$query]);
        }
        elseif ($_POST['request_id'] = 2) {
            $response = $_POST['reason'];
            $msg = 'Decline';
            $stat = 2;
            TourUpgradation::find($_POST['id'])->update(['manager_status'=> $stat,'manager_response'=>$response]);
        }
        return back()->with('success',$msg.' Successfully');
    }
    public function RequestStatusLevel1(TourUpgradation $TourUpgradation)
    {
         
        $stat;
        if($_POST['request_id'] == 1)
        {
            $msg = 'Approved';
            $stat = 1;
            $query = $_POST['reason'];

            TourUpgradation::find($_POST['id'])->update(['level1_status'=> $stat,'admin_response'=>$query]);
        }
        elseif ($_POST['request_id'] = 2) {
            $response = $_POST['reason'];
            $msg = 'Decline';
            $stat = 2;
            TourUpgradation::find($_POST['id'])->update(['level1_status'=> $stat,'admin_response'=>$response]);
        }
        return back()->with('success',$msg.' Successfully');
    }
    public function RequestStatusLevel2(TourUpgradation $TourUpgradation)
    {
           
        $stat;
        if($_POST['request_id'] == 1)
        {
            $msg = 'Approved';
            $stat = 1;
            $query = $_POST['reason'];
            TourUpgradation::find($_POST['id'])->update(['level2_status'=> $stat,'super_admin_response'=>$query]);
        }
        elseif ($_POST['request_id'] = 2) {
            $response = $_POST['reason'];
            $msg = 'Decline';
            $stat = 2;
            TourUpgradation::find($_POST['id'])->update(['level2_status'=> $stat,'super_admin_response'=>$response]);
        }
        return back()->with('success',$msg.' Successfully');
    } 
    public function RequestStatusAccountant(TourUpgradation $TourUpgradation)
    {
        // dd($_POST);
        $stat;
        if($_POST['request_id'] == 1)
        {
            $msg = 'Amount paid ';
            $stat = 1;
            $query = $_POST['reason'];
            TourUpgradation::find($_POST['id'])->update(['accountant_status'=> $stat,'accountant_response'=>$query]);
        }
        elseif ($_POST['request_id'] = 2) {
            $response = $_POST['reason'];
            $msg = 'amount Unpaid';
            $stat = 2;
            TourUpgradation::find($_POST['id'])->update(['accountant_status'=> $stat]);
        }
        return back()->with('success',$msg.' Successfully');
    }

    public function tourRateMultiple()
    {
        $daily_allowance_day = $_POST['daily_allowance_day'];
        $grd = $_POST['grd'];
        
        $TourRate1 = TourRate::where('grade',$grd)->first();
      
        return $tour_rate = $TourRate1->tour_rate*$daily_allowance_day;
            // return $TourUpgradation;
    } 
    public function mertroTourRateMultiple()
    {
        $metropolitan = $_POST['metropolitan'];
      
        $grd = $_POST['grd'];
        $TourRate = MetropolitanRate::where('grade',$grd)->first();
        
        return $tour_rate = $TourRate->metropolitan_tour_rate*$metropolitan;
            // return $TourUpgradation;
    }
}
