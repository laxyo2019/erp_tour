<?php

namespace App\Http\Controllers\TourUpdradationBill;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;
use Auth;
use File;
use Response;
use App\TABill;
use App\PurposeOfJournyDetail;
use App\LocalTaBillAmount;
use App\TourRequest;
use App\emp_mast;
use App\Department;
use App\Designation;
use App\Grade;
use App\company;
use App\User;
use App\TourUpgradation;
use App\TourUpgradationBill;
use App\ManagerUpdradation;
use App\ManagerUpdradationBill;

class TourUpdradationBillManger extends Controller
{
     public function index()
     {
        
       $user = User::find(Auth::user()->id);     
       $roleName = '';
       $useId    = Auth::user()->id;
        if($user->hasRole('tour_manager')){
            $roleName = 'tour_manager';
            // $TABill = TABill::with('TDetail')->get();
           
            $data = ManagerUpdradationBill::orderBy('id', 'asc')
                    ->where('user_id',$useId)
                    ->get();      
        }
       
        return view('Tour-upgradation-bill.manager-bill-request.index',compact('data','department','designation','grade','company'));
    }

    public function create(Request $request)
    {
        
        $requestId = $request->id;
        $data = ManagerUpdradation::where('id',$requestId)->first();
        $TABill = ManagerUpdradationBill::get();
        // dd($requestId);
        return view('Tour-upgradation-bill.manager-bill-request.create',compact('data','TABill'));
    }

    public function store(Request $request)
    {

        $user_id = Auth::user()->id;
        $datas   =  $request->validate([
                            'user_id'   =>'required',
                            'ta_no'     =>'required',
                            'tour_upgradation_from'  =>'required',
                            'tour_upgradation_to'    =>'required',
                            'grd'       =>'required',
                            'designation'=>'required',
                            'emp_location' =>'required',
                            'total_amount' =>'required',
                            'tour_upgrade_justification' =>'required',
                            'user_name' =>'required'
                            ]);

        $filename = $request->file('bills')->getClientOriginalName();
        $extension = $request->file('bills')->getClientOriginalExtension();
        $fileNameToStore = $filename; 

        $path = $request->file('bills')->storeAs('public/tour_upgradation_files',$fileNameToStore);
       
        $datas['bills'] = $fileNameToStore;
 
       
        $datapur = ManagerUpdradationBill::create($datas);

        
        return redirect()->route('tour-manager-upgradation.index')->with('success','Request Send Successfull.');

    }

    public function show($id)
    {
        $department  = Department::all();
        $designation = Designation::all();
        $grade       = Grade::all();
        $company     = company::all();
        $datas       = ManagerUpdradationBill::with(['user_details'])->where('id',$id)->get();
        
        $data        = ManagerUpdradationBill::where('id',$id)->first();
        // dd($advance_amount);
        return view('Tour-upgradation-bill.manager-bill-request.show-details',compact('datas','localDatas','department','designation','grade','company'));
        
    }


    public function edit($id)
    {
       $department = Department::all();
        $designation = Designation::all();
        $grade = Grade::all();
        $company = company::all();
        $data = ManagerUpdradationBill::where('id',$id)->first();

        //dd($data);
        return view('Tour-upgradation-bill.manager-bill-request.edit',compact('data','localDatas','department','designation','grade','company'));
    }

 
    public function update(Request $request, $id)
    {
         $user_id = Auth::user()->id;
        $datas   =  $request->validate([
                            'user_id'   =>'required',
                            'ta_no'     =>'required',
                            'tour_upgradation_from'  =>'required',
                            'tour_upgradation_to'    =>'required',
                            'grd'       =>'required',
                            'designation'=>'required',
                            'emp_location' =>'required',
                            'total_amount' =>'required',
                            'tour_upgrade_justification' =>'required',
                            'user_name' =>'required'
                            ]);

 
        if(!empty($request->hasfile('bills')))
        {
            $filename = $request->file('bills')->getClientOriginalName();
            $extension = $request->file('bills')->getClientOriginalExtension();
            $fileNameToStore = $filename; 
            $path = $request->file('bills')->storeAs('public/tour_upgradation_files',$fileNameToStore);
            
            $datas['bills'] = $fileNameToStore;  
            
        
         }else{
            $file  = ManagerUpdradationBill::find($id);
           
            $img_nm = $file->bills;
            if ($img_nm) {            
        
                $datas['bills'] = $img_nm;
            
         }      
        }

    /*end code for upload multiple files*/
        $updatedData =  ManagerUpdradationBill::where('id', $id)->update($datas);

       return back()->with('success','Request updated Successfully');
    }

    public function destroy($id)
    {
         $data = ManagerUpdradationBill::where('id',$id)->delete();
              
          return back()->with('success','Request deleted Successfully');
    }

    public function ShowTourRequest()
    {

        $user = User::find(Auth::user()->id);     
        $roleName = '';
        if($user->hasRole('tour_admin')){
            $roleName = 'tour_admin';
            // $data  = ManagerUpdradationBill::with(['user_details'])
            //                 ->where('manager_status',1)
            //                 ->where('accountant_status_varied_bill',1)
            //                 ->orderBy('id', 'DESC')
            //                 ->get();
             $id    = Auth::user()->id;
             $department  = user::where('id',$id)->with(['department1.department','department1.branch_details'])->first();
 
             $managerDept = $department->department1->department->name;
             $branch_name = $department->department1->branch_details->city;
             $data  = ManagerUpdradationBill::with(['user_details'])
                                ->orderBy('id', 'DESC')
                                ->where('emp_location',$branch_name)
                                ->get();
        //dd($data);

         }elseif ($user->hasRole('tour_accountant')) {
           $roleName = 'tour_accountant';
        // dd();

             $id    = Auth::user()->id;
             $department  = user::where('id',$id)->with(['department1.department','department1.branch_details'])->first();
 
             $managerDept = $department->department1->department->name;
             $branch_name = $department->department1->branch_details->city;
             $data  = ManagerUpdradationBill::with(['user_details'])->orderBy('id', 'DESC')
                    ->where('emp_location',$branch_name)
                                ->get();

        // dd($data);  

        }elseif ($user->hasRole('tour_superadmin')){
            $roleName = 'tour_superadmin';
             // $data  = TourUpgradationBill::orderBy('id', 'DESC')->with(['user_details','department.department'])
             //                ->where('manager_status',1)
             //                 ->where('level1_status',1)
             //                ->get();
             $data  = ManagerUpdradationBill::orderBy('id', 'DESC')->with(['user_details'])
                            ->where('level1_status',1)
                            ->get();
        // dd($data);

         }

        return view('show-tour-upgradation-bill-request.show-bill-request-of-manager.index',compact('data','roleName'));
    }
    // public function TourRequesApprovemanager(TourRequest $tourRequest)
    // {
    //      // dd($_POST);

    //     $stat;
    //     if($_POST['request_id'] == 1)
    //     {
    //         $msg = 'Approved';
    //         $stat = 1;
    //         TourUpgradationBill::find($_POST['id'])->update(['manager_status'=> $stat]);
    //     }
    //     elseif ($_POST['request_id'] = 2) {
    //         $response = $_POST['reason'];
    //         $msg = 'Decline';
    //         $stat = 2;
    //         TourUpgradationBill::find($_POST['id'])->update(['manager_status'=> $stat]);
    //     }
    //     return back()->with('success',$msg.' Successfully');
    // }
    public function TourRequestLevel1(TourRequest $tourRequest)
    {    
         // dd($_POST);

        $stat;
        if($_POST['request_id'] == 1)
        {
            $msg = 'Approved';
            $stat = 1;
            ManagerUpdradationBill::find($_POST['id'])->update(['level1_status'=> $stat]);
        }
        elseif ($_POST['request_id'] = 2) {
            $response = $_POST['reason'];
            $msg = 'Decline';
            $stat = 2;
            ManagerUpdradationBill::find($_POST['id'])->update(['level1_status'=> $stat]);
        }
        return back()->with('success',$msg.' Successfully');
    }
    public function TourRequestLevel2(TourRequest $tourRequest)
    {
         // dd($_POST);

        $stat;
        if($_POST['request_id'] == 1)
        {
            $msg = 'Approved';
            $stat = 1;
            $query = $_POST['reason'];

            ManagerUpdradationBill::find($_POST['id'])->update(['level2_status'=> $stat,'level2_response'=>$query]);

        }
        elseif ($_POST['request_id'] = 2) {
            $response = $_POST['reason'];
            $msg = 'Decline';
            $stat = 2;
            ManagerUpdradationBill::find($_POST['id'])->update(['level2_status'=> $stat]);
        }
        return back()->with('success',$msg.' Successfully');
    }

    public function download($id, $key)
    {
      $docs = ManagerUpdradationBill::first()
                      ->where('id', $id)
                      ->first();

       $avc = json_decode($docs->bills);
       if($avc !=NULL){
        // dd($docs->bills);
       $img = $avc[$key];
       $path = public_path('files/'.$img);
       //print_r($img);  die;
        // foreach ($avc as $value1) {
        //     $img = $avc[$key];
        //     // print_r($img); 
        //     
        // }
           return Response::download($path);
       }else{
       $avc = $docs->bills;
       // $img = $avc[$key];
       // dd($avc);
       $path = public_path('files/'.$avc);
           return Response::download($path);

       }
       }


    public function accountantBill(ManagerUpdradationBill $ManagerUpdradationBill)
    {
        // dd($_POST);

        $stat;
        if($_POST['request_id'] == 1)
        {
            $msg  = 'Amount paid ';
            $stat = 1;
            $query = $_POST['reason'];
            ManagerUpdradationBill::find($_POST['id'])->update(['accountant_status'=> $stat,'accountant_response'=>$query]);
        }
        elseif ($_POST['request_id'] == 2) {
            $response = $_POST['reason'];
            $msg = 'amount Unpaid';
            $stat = 2;
            ManagerUpdradationBill::find($_POST['id'])->update(['accountant_status'=> $stat]);
        }
        elseif ($_POST['request_id'] == 3) {
        // dd($_POST);
            $accountant_response = $_POST['reason'];
            $msg = 'amount received';
            $stat = 3;
            ManagerUpdradationBill::find($_POST['id'])->update(['accountant_status'=> $stat,'accountant_response'=>$accountant_response]);
        }
        return back()->with('success',$msg.' Successfully');
    }
    public function accountantVarifyBill(ManagerUpdradationBill $ManagerUpdradationBill)
    {
        // dd($_POST);
        $stat;
        if($_POST['request_id'] == 1)
        {
            $msg  = 'Bill varified ';
            $stat = 1;
            $acct_bill_vari_res = $_POST['acct__bill_vari_res'];
            ManagerUpdradationBill::find($_POST['id'])->update(['accountant_status_varied_bill'=> $stat,'acct_bill_vari_res'=>$acct_bill_vari_res]);
        }
        elseif ($_POST['request_id'] = 2) {

            $acct_bill_discard_res  = $_POST['acct_bill_discard_res'];
            $msg = 'Bill not varified';
            $stat = 2;
            ManagerUpdradationBill::find($_POST['id'])->update(['accountant_status_varied_bill'=> $stat,'acct_bill_discard_res'=>$acct_bill_discard_res]);
        }
        return back()->with('success',$msg.' Successfully');
    }
}
