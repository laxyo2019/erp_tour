<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Branch;
use App\company;

class BranchController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = company::all();
        $branch = Branch::with('company_details')->get();
        // dd($branch);
        return view('branch.index',compact('data','branch'));
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
            'comp_id'=>'required',
            'city'=>'required'
            ]);
        $data['address'] =  $request->address;
      Branch::create($data);
      return back()->with("success","Grade Add Successfully");
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $data = $request->validate([
            'comp_id'=>'required',
            'city'=>'required'
            ]);
        $data['address'] =  $request->address;
        Branch::find($id)->update($data);
      return back()->with("success","Grade Add Successfully");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
         Branch::destroy($id);
        return back()->with('success','Delete Successfully');
    }
}
