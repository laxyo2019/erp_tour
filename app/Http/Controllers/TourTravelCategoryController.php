<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\TourTravelPolicy;
use App\TourTravelCategory;
use App\Grade;

class TourTravelCategoryController extends Controller
{
     public function index()
    {
        $data = Grade::all();

        $TourTravelCategory = TourTravelCategory::all();
        // dd( $TourTravelCategory );

        return view('Tour-travel-category.index',compact('data','TourTravelCategory'));
    }

    
    public function create()
    {
        //

    }

    public function store(Request $request)
    {
        //dd( $request );

        $data = $request->validate([
            'category'=>'required'
            ]);

     TourTravelCategory::create($data);
      return back()->with("success","Category Add Successfully");
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
        $data = $request->validate([
            'category'=>'required'
        ]);

        TourTravelCategory::find($id)->update($data);
        return back()->with('success','Update Successfully');
    }


    public function destroy($id)
    {
        $data = TourTravelCategory::where('id',$id)->delete();
                
          return back()->with('success','Request deleted Successfully');
    }
}
