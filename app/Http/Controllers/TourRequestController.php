<?php

namespace App\Http\Controllers;

use App\TourRequest;
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
        $data = TourRequest::all();
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
    public function destroy(TourRequest $tourRequest)
    {
        //
    }
    /*ShowRequest function show listing which is send for approvel*/
    public function ShowRequest()
    {
        $data = TourRequest::all();
        return view('showrequest.index',compact('data'));
    }
}
