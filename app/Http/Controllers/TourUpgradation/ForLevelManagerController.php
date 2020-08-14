<?php

namespace App\Http\Controllers\TourUpgradation;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
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
use App\TourUpgradation;
use App\Level1Updradation;
use App\ManagerUpdradation;
use App\ManagerUpdradationBill;
use DB;
class ForLevelManagerController extends Controller
{
    public function index()
    {
       $user = User::find(Auth::user()->id);     
       $roleName = '';
       $useId    = Auth::user()->id;
       // dd($useId);

       // $roles = Role::wehere('id',$useId)->first();
      // $tourUpgradation= TourUpgradation::get();
       // dd($tourUpgradation);

       if($user->hasRole('tour_manager')){
            $roleName = 'tour_manager';

            $data = ManagerUpdradation::orderBy('id', 'DESC')
                            ->where('user_id',$useId)
                            ->get();

            $TABillCount = ManagerUpdradationBill::with('TDetail')
                            ->where('user_id',$useId)
                            ->get();
            $getDate = ManagerUpdradation::orderBy('id', 'DESC')
                        ->where('user_id',$useId)
                        ->get();       
            $allrecords = array();        
            foreach($getDate as $Data){
                $allrecords[] = $Data;
            }
            //dd($TABillCount);
            $Dates= array_column($allrecords,'time_from');
            $sortDate = !empty($Dates) ? min($Dates):'';
        }
        return view('Tour-Exp-upgradation.for-manager.index',compact('data','roleName','TABillCount','sortDate'));
    }
   
    public function create()
    {   
        $user_id = Auth::user()->id;
        $data  = emp_mast::where('user_id',$user_id)->with(['department','designation','grade','company','branch_details'])->first();
        // dd($data);
        // $department = Department::all();
        $designation = Designation::all();
        $grade = Grade::all();
        $company = company::all();
        // dd($data);
        return view('Tour-Exp-upgradation.for-manager.create',compact('data','designation','grade','company'));
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
        ManagerUpdradation::create($data);
           
        return back()->with('success','Request send Successfully');
        
    }

    
    public function show($id)
    {
        $department  = Department::all();
        $designation = Designation::all();
        $grade       = Grade::all();
        $company     = company::all();
        $data        = ManagerUpdradation::orderBy('id', 'DESC')->with(['user_details'])->where('id',$id)->get();

        return view('show-tour-upgradation-request.for-manager.show-details',compact('data','department','designation','grade','company'));
    }

   
    public function edit($id)
    {
        
        $data = ManagerUpdradation::where('id',$id)->first();
        return view('Tour-Exp-upgradation.for-manager.edit',compact('data'));

    }

   
    public function update(Request $request, ManagerUpdradation $ManagerUpdradation,$id)
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
            'justification'=>'required',
            'exception_heigh_upgradaton'=>'required'


        ]);
        $data['user_id'] = $user_id;
        $data['mode_of_travel'] = $request->mode_of_travel;
        $data['entitlement'] = $request->entitlement;
        $data['proposed_class'] = $request->proposed_class;
        $data['justification'] = $request->justification;
        // dd($data);
        ManagerUpdradation::where('id',$id)->update($data);
            return back()->with('success','Request update Successfully');
    }

   
    public function destroy($id)
    {
         $data = ManagerUpdradation::where('id',$id)->delete();
         return back()->with('success','Request deleted Successfully');

    }
    /*ShowRequest function show listing which is send for approvel*/
    public function ShowRequest()
    {
     
       $user = User::find(Auth::user()->id);     
       $roleName = '';
      // $id    = Auth::user()->id;
         if ($user->hasRole('tour_admin')) {

             $roleName = 'tour_admin';
             $id    = Auth::user()->id;
             $department  = user::where('id',$id)
                            ->with(['department1.department','department1.branch_details'])
                            ->first();
            //dd( $department);c
             $managerDept = $department->department1->department->name;
             $branch_name = $department->department1->branch_details->city;
             $data  = ManagerUpdradation::orderBy('id', 'DESC')
                                ->where('department',$managerDept)
                                ->where('emp_location',$branch_name)
                                ->get();

         }elseif ($user->hasRole('tour_superadmin')) {


             $roleName = 'tour_superadmin';
             $id    = Auth::user()->id;
             $department  = user::where('id',$id)->with(['department1.department','department1.branch_details'])->first();

             $managerDept = $department->department1->department->name;
             $branch_name = $department->department1->branch_details->city;
             $data  = ManagerUpdradation::orderBy('id', 'DESC')
                                ->where('manager_status',0)
                                ->where('department',$managerDept)
                                ->where('emp_location',$branch_name)
                                ->get();
         
         }elseif ($user->hasRole('tour_user')) {


             $roleName = 'tour_user';
             $id    = Auth::user()->id;
             $department  = user::where('id',$id)->with(['department1.department','department1.branch_details'])->first();
             //dd( $department);c
             $managerDept = $department->department1->department->name;
             $branch_name = $department->department1->branch_details->city;
             $data  = ManagerUpdradation::orderBy('id', 'DESC')
                            ->where('manager_status',0)
                            ->where('department',$managerDept)
                            ->where('emp_location',$branch_name)
                            ->get();
         
         }

        return view('show-tour-upgradation-request.for-manager.index',compact('data','roleName'));
    }
    
   public function RequestStatusLevel1(ManagerUpdradation $ManagerUpdradation){

        // dd( $_POST);
        $stat;
        if($_POST['request_id'] == 1)
        {
            $msg = 'Approved';
            $stat = 1;
            // dd($stat);
            $query = $_POST['reason'];

            ManagerUpdradation::find($_POST['id'])->update(['level1_status'=> $stat,'admin_response'=>$query]);
        }
        elseif ($_POST['request_id'] = 2) {
            $response = $_POST['reason'];
            $msg = 'Decline';
            $stat = 2;
            ManagerUpdradation::find($_POST['id'])->update(['level1_status'=> $stat,'admin_response'=>$query]);
        }
        return back()->with('success',$msg.' Successfully');
    }
    public function RequestStatusLevel2(ManagerUpdradation $ManagerUpdradation){

        // dd( $_POST);
        $stat;
        if($_POST['request_id'] == 1)
        {
            $msg = 'Approved';
            $stat = 1;
            // dd($stat);
            $query = $_POST['reason'];

            ManagerUpdradation::find($_POST['id'])->update(['level2_status'=> $stat,'super_admin_response'=>$query]);
        }
        elseif ($_POST['request_id'] = 2) {
            $response = $_POST['reason'];
            $msg = 'Decline';
            $stat = 2;
            ManagerUpdradation::find($_POST['id'])->update(['level2_status'=> $stat,'super_admin_response'=>$query]);
        }
        return back()->with('success',$msg.' Successfully');
    }
    

    public function tourRateMultiple()
    {
        $daily_allowance_day = $_POST['daily_allowance_day'];
        $grd = $_POST['grd'];
        
        $TourRate1 = TourRate::where('grade',$grd)->first();
      
        return $tour_rate = $TourRate1->tour_rate*$daily_allowance_day;
            // return $ManagerUpdradation;
    } 
    public function mertroTourRateMultiple()
    {
        $metropolitan = $_POST['metropolitan'];
      
        $grd = $_POST['grd'];
        $TourRate = MetropolitanRate::where('grade',$grd)->first();
        
        return $tour_rate = $TourRate->metropolitan_tour_rate*$metropolitan;
            // return $ManagerUpdradation;
    }
}
