<?php

namespace App\Http\Controllers;

use App\emp_mast;
use App\Department;
use App\Designation;
use App\Grade;
use App\company;
use App\User;
use DB;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class EmpMastController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {


        $data = emp_mast::with(['user','designation','department','grade','company'])->get();
        $department = Department::all();
        $designation = Designation::all();
        $grade = Grade::all();
        $company = company::all();
        return view('employee.index',compact('data','department','designation','grade','company'));
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
        // dd($request);
         $request->validate([
            'emp_name'=>'required',
            'email'=>'required',
            'comp_id'=>'required',
            'dept_id'=>'required',
            'desg_id'=>'required',
            'grade_id'=>'required',
            'password'=>'required',
            ]);

         $user = [
            'name' => $request->emp_name,
            'email' => $request->email,
            'password' => $request->password
            ];

            $user_id = User::create($user);/*return user table id in $user_id and create user*/
            $last_insert_id = $user_id->id;/*get last_id from user table*/

         $employee = [
            'user_id' => $last_insert_id,/*insert into emp_mast, last_id of user table*/
            'emp_name' => $request->emp_name,
            'comp_id' => $request->comp_id,
            'dept_id' => $request->dept_id,
            'desg_id' => $request->desg_id,
            'grade_id' => $request->grade_id,
            'email' => $request->email,
            'password' => $request->password,
            ];
            emp_mast::create($employee);

      return back()->with("success","Add Successfully");
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\emp_mast  $emp_mast
     * @return \Illuminate\Http\Response
     */
    public function show(emp_mast $emp_mast)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\emp_mast  $emp_mast
     * @return \Illuminate\Http\Response
     */
    public function edit(emp_mast $emp_mast)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\emp_mast  $emp_mast
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        // dd($request->TOarray());
        $user_id = $request->user_id; /*coming from hidden field from index file, foreign key*/
        $request->validate([
            'employee'=>'required',
            'email'=>'required',
            'comp_id'=>'required',
            'dept_id'=>'required',
            'desg_id'=>'required',
            'grade_id'=>'required',
            'password'=>'required',
        ]);

        $employee = [
            'emp_name'=>$request->employee,
            'comp_id'=>$request->comp_id,
            'dept_id'=>$request->dept_id,
            'desg_id'=>$request->desg_id,
            'grade_id'=>$request->grade_id,
            'email'=>$request->email,
            'password'=>$request->password,
        ];
        emp_mast::find($id)->update($employee);


        $user = [
            'name'=>$request->employee,
            'email'=>$request->email,
            'password'=> Hash::make($request->password),
        ];
        User::find($user_id)->update($user);
        return back()->with('success','Update Successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\emp_mast  $emp_mast
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        emp_mast::destroy($id);
        DB::table('user')->where('id',$id);
        return back()->with('success','Delete Successfully');
    }
}
