<?php

namespace App\Http\Controllers;

use App\TourRequest;
use App\emp_mast;
use App\Department;
use App\Designation;
use App\Grade;
use App\company;
use App\User;

use Illuminate\Http\Request;
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
        $user = \Auth::user();
        $this->username = $user->name;
        $this->role =$user->roles->first()->name;

        $roleName = $user->roles->first()->name;
        $useId = Auth::user()->id;
        if($roleName == 'users'){
            $data = TourRequest::where('user_id',$useId)->get();
        }elseif($roleName == 'manager'){
            $data = TourRequest::where('user_id',$useId)->get();
        }elseif($roleName == 'level_1'){
            $data = TourRequest::where('manager_status',1)->where('user_id',$useId)->get();
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


// dd($request);
        $user_id = Auth::user()->id;
        // dd($request->Toarray());

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
        $data['mode_of_travel'] = $request->user_id;
        $data['entitlement'] = $request->entitlement;
        $data['proposed_class'] = $request->proposed_class;
        $data['justification'] = $request->justification;
        TourRequest::create($data);
            return back()->with('success','Request Send Successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\TourRequest  $tourRequest
     * @return \Illuminate\Http\Response
     */
    public function show(TourRequest $tourRequest)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\TourRequest  $tourRequest
     * @return \Illuminate\Http\Response
     */
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
            'purpuse_of_tour'=>'required'

        ]);
        $data['user_id'] = $user_id;
        $data['mode_of_travel'] = $request->user_id;
        $data['entitlement'] = $request->entitlement;
        $data['proposed_class'] = $request->proposed_class;
        $data['justification'] = $request->justification;
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
        // $data = TourRequest::all();
        $user = \Auth::user();
        $this->username = $user->name;
        $this->role =$user->roles->first()->name;

        $roleName = $user->roles->first()->name;

        if($roleName == 'level_1'){
            $data  = TourRequest::with(['user_details','department.department'])
                            ->where('manager_status',1)->get();
                            // dd($data);
         }elseif ($roleName == 'manager') {
             $data  = TourRequest::with(['user_details','department.department'])
                            ->get();
         }elseif ($roleName == 'level_2') {
             $data  = TourRequest::with(['user_details','department.department'])
                            ->where('manager_status',1)
                             ->where('level1_status',1)
                            ->get();
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
            TourRequest::find($_POST['id'])->update(['level2_status'=> $stat]);
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
