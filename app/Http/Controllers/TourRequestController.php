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

use Auth;


class TourRequestController extends Controller
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
        if($user->hasRole('tour_user')){
            $roleName = 'tour_user';
            $data = TourRequest::where('user_id',Auth::user()->id)->orderBy('id', 'DESC')->get();
        }elseif($user->hasRole('tour_manager')){
            $roleName = 'tour_manager';
            $data = TourRequest::orderBy('id', 'DESC')->where('user_id',Auth::user()->id)->get();
        }elseif($user->hasRole('tour_admin')){
            $roleName = 'tour_admin';
            $data = TourRequest::orderBy('id', 'DESC')->where('manager_status',1)->where('user_id',Auth::user()->id)->get();
        }
            return view('tour-request.index',compact('data','roleName'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $department = Department::all();
        $designation = Designation::all();
        $grade = Grade::all();
        $company = company::all();

        return $employees;

         return view('tour-request.create',compact('department','designation','grade','company'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
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
            'purpuse_of_tour'=>'required'

        ]);
        $data['user_id'] = $user_id;
        $data['mode_of_travel'] = $request->mode_of_travel;
        $data['entitlement'] = $request->entitlement;
        $data['proposed_class'] = $request->proposed_class;
        $data['justification'] = $request->justification;
        TourRequest::create($data);
            return back()->with('success','Request Send Successfully');
    }

    public function show($id)
    {
        $department  = Department::all();
        $designation = Designation::all();
        $grade       = Grade::all();
        $company     = company::all();
        $data        = TourRequest::orderBy('id', 'DESC')->with(['user_details','department.department'])->where('id',$id)->get();

        return view('showrequest.show-details',compact('data','department','designation','grade','company'));
    }

    public function edit($id)
    {
        $department = Department::all();
        $designation = Designation::all();
        $grade = Grade::all();
        $company = company::all();

        $data = TourRequest::where('id',$id)->first();
         // dd($data);
        return view('tour-request.edit',compact('data','department','designation','grade','company'));

    }

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
            'purpuse_of_tour'=>'required'

        ]);
        $data['user_id'] = $user_id;
        $data['mode_of_travel'] = $request->mode_of_travel;
        $data['entitlement'] = $request->entitlement;
        $data['proposed_class'] = $request->proposed_class;
        $data['justification'] = $request->justification;
        TourRequest::where('id',$id)->update($data);
            return back()->with('success','Request update Successfully');
    }

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
        if($user->hasRole('tour_admin')){
            $data  = TourRequest::orderBy('id', 'DESC')->with(['user_details','department.department'])->where('manager_status',1)->get();
            $roleName = 'tour_admin';
         }
         elseif ($user->hasRole('tour_manager')) {
             $data  = TourRequest::orderBy('id', 'DESC')->with(['user_details','department.department'])
                            ->get();
            $roleName = 'tour_manager';
         }
         elseif ($user->hasRole('tour_superadmin')) {
             $data  = TourRequest::orderBy('id', 'DESC')->with(['user_details','department.department'])
                            ->where('manager_status',1)
                            ->where('level1_status',1)
                            ->get();             
            $roleName = 'tour_superadmin';
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
            TourRequest::find($_POST['id'])->update(['level2_status'=> $stat,'request'=>$query]);
        }
        elseif ($_POST['request_id'] = 2) {
            $response = $_POST['reason'];
            $msg = 'Decline';
            $stat = 2;
            TourRequest::find($_POST['id'])->update(['level2_status'=> $stat]);
        }
        return back()->with('success',$msg.' Successfully');
    }
}
