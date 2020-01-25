<?php

namespace App\Http\Controllers;

use App\TourRequest;
use App\emp_mast;
use App\Department;
use App\user;

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
        // $useId = Auth::user();
        $data = TourRequest::get();
        // dd($data);
        // dd($data->Toarray());die;
        return view('tour-request.index',compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
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
        // dd($request->Toarray());
        $request->validate([
            'request'=>'required'
        ]);
        $data = [
            'user_id'=>$user_id,
            'request'=>$request['request']
        ];
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
    public function edit(TourRequest $tourRequest)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\TourRequest  $tourRequest
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, TourRequest $tourRequest)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\TourRequest  $tourRequest
     * @return \Illuminate\Http\Response
     */
    public function destroy()
    {
        //
    }
    /*ShowRequest function show listing which is send for approvel*/
    public function ShowRequest()
    {
        // $data = TourRequest::all();
        $data  = TourRequest::with(['user_details','department.department'])
                            ->get();
                            dd($data);
        return view('showrequest.index',compact('data'));
    }
    public function RequestStatus(TourRequest $tourRequest)
    {
            
        $stat;
        if($_POST['request_id'] == 0)
        {

            $msg = 'Approved';
            $stat = 1;
            // dd($stat);
            TourRequest::find($_POST['id'])->update(['status'=> $stat]);

        }
        elseif ($_POST['request_id'] = 1) {
            $response = $_POST['reason'];
            $msg = 'Decline';
            $stat = 0;
            TourRequest::find($_POST['id'])->update(['status'=> $stat,'response'=>$response]);
        }
        // TourRequest::find($_POST['id'])->update(['status'=> $stat]);
        return back()->with('success',$msg.' Successfully');
    }
}
