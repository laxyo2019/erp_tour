<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Grade;
use App\TourTravelPolicy;
use App\TourTravelCategory;
use App\User;
use App\emp_mast;
use Auth;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {

         $user_id = Auth::user()->id;
        $grade  = emp_mast::where('user_id',$user_id)->with(['grade'])->first();
    // dd( $grade->grade->name);

        $data = Grade::all();
        $TourTravelCategory = TourTravelCategory::all();
        $TourTravelPolicy   = TourTravelPolicy::all();
        return view('home',compact('data','TourTravelPolicy','TourTravelCategory'));


    }
}
