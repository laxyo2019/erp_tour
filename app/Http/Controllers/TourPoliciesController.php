<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Grade;
use App\TourTravelPolicy;
use App\TourTravelCategory;
use Auth;
use App\emp_mast;

class TourPoliciesController extends Controller
{
   
     public function index()
    {
        $data = Grade::all();
        $TourTravelCategory = TourTravelCategory::all();
        $TourTravelPolicy = TourTravelPolicy::all();
        //dd( $TourTravelCategory );

        return view('Tour-policies.index',compact('data','TourTravelPolicy','TourTravelCategory'));
    }

    
    public function create()
    {
        //

    }

    public function store(Request $request)
    {
        // dd( $request );

        $data = $request->validate([
            'category'=>'required',
            'sr_vip_sixth'=>'required',
            'avp_sr_gm_fifth'=>'required',
            'section_head_gm_dm_sr_manager_forth'=>'required',
            'team_leader_third'=>'required',
            'staff_officer_second'=>'required',
            'tecnician_driver_office_boy_first'=>'required'
            ]);
        $data['any_discription'] = $request->any_discription;
        // dd( $data );

      TourTravelPolicy::create($data);
      return back()->with("success","Policy Add Successfully");
    }

   
    public function show($id)
    {
        //
    }

    
    public function edit($id)
    {
        //
    }

    
    public function update(Request $request, $id)
    {
        // dd( $request );

        $data = $request->validate([
            'category'=>'required',
            'sr_vip_sixth'=>'required',
            'avp_sr_gm_fifth'=>'required',
            'section_head_gm_dm_sr_manager_forth'=>'required',
            'team_leader_third'=>'required',
            'staff_officer_second'=>'required',
            'tecnician_driver_office_boy_first'=>'required'
            ]);
        $data['any_discription'] = $request->any_discription;
        // dd( $data );

        TourTravelPolicy::find($id)->update($data);
        return back()->with('success','Update Successfully');
    }


    public function destroy($id)
    {
        $data = TourTravelPolicy::where('id',$id)->delete();
                
          return back()->with('success','Request deleted Successfully');
    } 
    public function TourAndTravelPolicies()
    {   

        $user_id = Auth::user()->id;
        $grade  = emp_mast::where('user_id',$user_id)->with(['grade'])->first();
        $gradeEmp  =  $grade->grade->name;
    // dd( $grade->grade->name);

        $data = Grade::all();
        $TourTravelCategory = TourTravelCategory::all();
        $TourTravelPolicy = TourTravelPolicy::all();
        //dd( $TourTravelCategory );

        return view('Tour-policies.all-tour-and--travel-policies',compact('data','TourTravelPolicy','TourTravelCategory','gradeEmp'));
    }
}
