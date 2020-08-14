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
use App\ManagerUpdradation;
use App\Level1Updradation;
use DB;
use App\Level1UpdradationBill;

class ForLevelOneController extends Controller
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

       if($user->hasRole('tour_admin')){
            $roleName = 'tour_admin';

             $data = Level1Updradation::orderBy('id', 'DESC')
                        ->where('user_id',$useId)
                        ->get();

            $TABillCount = Level1UpdradationBill::with('TDetail')->where('user_id',$useId)->get();
            $getDate = Level1Updradation::orderBy('id', 'DESC')
                    ->where('user_id',$useId)
                    ->get();       
            //dd($getDate);
            $allrecords = array();        
            foreach($getDate as $Data){
                $allrecords[] = $Data;
            }
            $Dates= array_column($allrecords,'time_from');
            $sortDate = !empty($Dates) ? min($Dates):'';
       
        // dd($data);
        }
        return view('Tour-Exp-upgradation.for-lavel1.index',compact('data','roleName','TABillCount','sortDate'));
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
        return view('Tour-Exp-upgradation.for-lavel1.create',compact('data','designation','grade','company'));
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
        Level1Updradation::create($data);
           return back()->with('success','Request send Successfully');
    }

    public function show($id)
    {
        $department  = Department::all();
        $designation = Designation::all();
        $grade       = Grade::all();
        $company     = company::all();
        $data        = Level1Updradation::orderBy('id', 'DESC')
                        ->with(['user_details'])
                        ->where('id',$id)
                        ->get();

        return view('show-tour-upgradation-request.for-level1.show-details',compact('data','department','designation','grade','company'));
    }

   
    public function edit($id)
    {
        // $department = Department::all();
        // $designation = Designation::all();
        // $grade = Grade::all();
        // $company = company::all();
        // $allData  = emp_mast::with(['department','designation','grade','company','branch_details'])->first();

        $data = Level1Updradation::where('id',$id)->first();
        return view('Tour-Exp-upgradation.for-lavel1.edit',compact('data'));

    }

    public function update(Request $request, Level1Updradation $Level1Updradation,$id)
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
            'exception_heigh_upgradaton'=>'required'


        ]);
        // dd($data);
        $data['user_id'] = $user_id;
        $data['mode_of_travel'] = $request->mode_of_travel;
        $data['entitlement'] = $request->entitlement;
        $data['proposed_class'] = $request->proposed_class;
        $data['justification'] = $request->justification;

        Level1Updradation::where('id',$id)->update($data);
            return back()->with('success','Request update Successfully');
    }

  
    public function destroy($id)
    {
         $data = Level1Updradation::where('id',$id)->delete();
         return back()->with('success','Request deleted Successfully');

    }
    /*ShowRequest function show listing which is send for approvel*/
    public function ShowRequest()
    {
       $user = User::find(Auth::user()->id);     
       $roleName = '';
      // $id    = Auth::user()->id;
         if ($user->hasRole('tour_superadmin')) {

             $roleName = 'tour_superadmin';
             $id    = Auth::user()->id;
             $department  = user::where('id',$id)->with(['department1.department','department1.branch_details'])->first();
    // dd( $department );
             $managerDept = $department->department1->department->name;
             $branch_name = $department->department1->branch_details->city;

             $data  = Level1Updradation::orderBy('id', 'DESC')
                            ->where('department',$managerDept)
                            ->where('emp_location',$branch_name)
                            ->get();
         
         }
        return view('show-tour-upgradation-request.for-level1.index',compact('data','roleName'));
    }
    
    public function RequestStatusLevel2(Level1Updradation $Level1Updradation)
    {
   

        $stat;
        if($_POST['request_id'] == 1)
        {
            $msg = 'Approved';
            $stat = 1;
            $query = $_POST['reason'];
            Level1Updradation::find($_POST['id'])->update(['level2_status'=> $stat,'super_admin_response'=>$query]);
        }
        elseif ($_POST['request_id'] = 2) {
            $response = $_POST['reason'];
            $msg = 'Decline';
            $stat = 2;
            Level1Updradation::find($_POST['id'])->update(['level2_status'=> $stat]);
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
