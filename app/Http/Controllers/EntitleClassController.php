<?php

namespace App\Http\Controllers;

use App\EntitleClass;
use Illuminate\Http\Request;

class EntitleClassController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = EntitleClass::all();
        return view('entitleclass.index',compact('data'));
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
         $data = $request->validate([
            'entitleclass'=>'required'
            ]);

      EntitleClass::create($data);
      return back()->with("success","entitleclass Add Successfully");
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\EntitleClass  $entitleClass
     * @return \Illuminate\Http\Response
     */
    public function show(EntitleClass $entitleClass)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\EntitleClass  $entitleClass
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
         
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\EntitleClass  $entitleClass
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,$id)
    {
         $data = $request->validate([
            'entitleclass'=>'required'
        ]);

        EntitleClass::find($id)->update($data);
        return back()->with('success','Update Successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\EntitleClass  $entitleClass
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        EntitleClass::destroy($id);
        return back()->with('success','Delete Successfully');
    }
}
