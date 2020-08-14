<?php

namespace App\Http\Controllers\TourUpgradation;

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

class TourUpgradationBillController extends Controller
{
     public function index()
     {
        
        
       $user = User::find(Auth::user()->id);     
       $roleName = '';
       $useId    = Auth::user()->id;
    if($user->hasRole('tour_user')){
        // dd($useId);
        $roleName = 'tour_user';
        // $TABill = TABill::with('TDetail')->get();
       
        $data = TourUpgradationBill::orderBy('id', 'asc')
                ->where('user_id',$useId)
                ->get();      
    }
        // $department  = Department::all();
        // $designation = Designation::all();
        // $grade       = Grade::all();
        // $company     = company::all();
        // $data        = TABill::orderBy('id', 'asc')->get();
        // dd($data);
        return view('Tour-upgradation-bill.index',compact('data','department','designation','grade','company'));
    }

    public function create(Request $request)
    {
        

        $requestId = $request->id;
        // $requestId = 35;
        $data = TourUpgradation::where('id',$requestId)->first();
        $TABill = TourUpgradationBill::get();
        // dd($data);

        return view('Tour-upgradation-bill.create',compact('data','TABill'));
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

 
        // dd($datas);

        $filename = $request->file('bills')->getClientOriginalName();
        $extension = $request->file('bills')->getClientOriginalExtension();
        $fileNameToStore = $filename; 

        $path = $request->file('bills')->storeAs('public/tour_upgradation_files',$fileNameToStore);
        $datas['bills'] = $fileNameToStore;
 
      
       
        $datapur = TourUpgradationBill::create($datas);

        
        return redirect()->route('tour-exp-upgradation.index')->with('success','Request Send Successfull.');

        

    }

    public function show($id)
    {
        $department  = Department::all();
        $designation = Designation::all();
        $grade       = Grade::all();
        $company     = company::all();
        $datas       = TourUpgradationBill::with(['user_details'])->where('id',$id)->get();
        $data2       = PurposeOfJournyDetail::where('last_id',$id)->get();
        $localDatas  = LocalTaBillAmount::where('last_id',$id)->get();
        $data        = TourUpgradationBill::where('id',$id)->first();
        $advance_amount = TourUpgradation::where('id',$data->ta_no)->first();
       // dd($data);
        return view('show-tour-upgradation-bill-request.show-bill-request-of-users.show-details',compact('datas','data2','localDatas','department','designation','grade','company','advance_amount'));
        
    }


    public function edit($id)
    {
        $department = Department::all();
        $designation = Designation::all();
        $grade = Grade::all();
        $company = company::all();
        $data = TourUpgradationBill::where('id',$id)->first();
// dd($data);
        $data2 = PurposeOfJournyDetail::where('last_id',$id)->get();
        $localDatas = LocalTaBillAmount::where('last_id',$id)->get();
        $advance_amount = TourUpgradation::where('id',$data->ta_no)->first();

        return view('Tour-upgradation-bill.edit',compact('data','data2','localDatas','department','designation','grade','company','advance_amount'));
    }

 
    public function update(Request $request, $id)
    {
// dd($request);
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
            $file  = TourUpgradationBill::find($id);
           
            $img_nm = $file->bills;
            if ($img_nm) {            
        
                $datas['bills'] = $img_nm;
            
         }      
        }

    /*end code for upload multiple files*/
        $updatedData =  TourUpgradationBill::where('id', $id)->update($datas);

       return back()->with('success','Request updated Successfully');
       
      
    }

    public function destroy($id)
    {
         $data = TourUpgradationBill::where('id',$id)->delete();
               
          return back()->with('success','Request deleted Successfully');
    }


    public function ShowTourRequest()
    {

        $user = User::find(Auth::user()->id);     
        $roleName = '';
        if($user->hasRole('tour_admin')){
            $roleName = 'tour_admin';
            $data  = TourUpgradationBill::with(['user_details'])
                            ->where('manager_status',1)
                            ->where('accountant_status_varied_bill',1)
                            ->orderBy('id', 'DESC')
                            ->get();

         }elseif ($user->hasRole('tour_manager')) {
            $roleName = 'tour_manager';

             $id    = Auth::user()->id;
             $department  = user::where('id',$id)->with(['department1.department','department1.branch_details'])->first();
 
             $managerDept = $department->department1->department->name;
             $branch_name = $department->department1->branch_details->city;
             $data  = TourUpgradationBill::with(['user_details'])->orderBy('id', 'DESC')
                                // ->where('emp_department',$managerDept)
                                ->where('emp_location',$branch_name)
                                ->get();
         // dd($department);


         }elseif ($user->hasRole('tour_accountant')) {

           $data  = TourUpgradationBill::with(['user_details'])
               ->where('manager_status',1)
               ->orderBy('id', 'DESC')
               ->get();

           $roleName = 'tour_accountant';

         }elseif ($user->hasRole('tour_accountant')) {
           
         $roleName = 'tour_accountant';

             $id    = Auth::user()->id;
             $department  = user::where('id',$id)->with(['department1.department','department1.branch_details'])->first();
 
             $managerDept = $department->department1->department->name;
             $branch_name = $department->department1->branch_details->city;
             $data  = ManagerUpdradationBill::with(['user_details'])->orderBy('id', 'DESC')
                    ->where('emp_location',$branch_name)
                                ->get();


         }elseif ($user->hasRole('tour_superadmin')){
            $roleName = 'tour_superadmin';
             // $data  = TourUpgradationBill::orderBy('id', 'DESC')->with(['user_details','department.department'])
             //                ->where('manager_status',1)
             //                 ->where('level1_status',1)
             //                ->get();
             $data  = TourUpgradationBill::orderBy('id', 'DESC')->with(['user_details'])
                            ->where('manager_status',1)
                             ->where('level1_status',1)
                            ->get();
         }

        return view('show-tour-upgradation-bill-request.show-bill-request-of-users.index',compact('data','roleName'));
    }
    public function TourRequesApprovemanager(TourRequest $tourRequest)
    {
         // dd($_POST);

        $stat;
        if($_POST['request_id'] == 1)
        {
            $msg = 'Approved';
            $stat = 1;
            TourUpgradationBill::find($_POST['id'])->update(['manager_status'=> $stat]);
        }
        elseif ($_POST['request_id'] = 2) {
            $response = $_POST['reason'];
            $msg = 'Decline';
            $stat = 2;
            TourUpgradationBill::find($_POST['id'])->update(['manager_status'=> $stat]);
        }
        return back()->with('success',$msg.' Successfully');
    }
    public function TourRequestLevel1(TourRequest $tourRequest)
    {    
        $stat;
        if($_POST['request_id'] == 1)
        {
            $msg = 'Approved';
            $stat = 1;
            TourUpgradationBill::find($_POST['id'])->update(['level1_status'=> $stat]);
        }
        elseif ($_POST['request_id'] = 2) {
            $response = $_POST['reason'];
            $msg = 'Decline';
            $stat = 2;
            TourUpgradationBill::find($_POST['id'])->update(['level1_status'=> $stat]);
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

            TourUpgradationBill::find($_POST['id'])->update(['level2_status'=> $stat,'admin_response'=>$query]);

        }
        elseif ($_POST['request_id'] = 2) {
            $response = $_POST['reason'];
            $msg = 'Decline';
            $stat = 2;
            TourUpgradationBill::find($_POST['id'])->update(['level2_status'=> $stat]);
        }
        return back()->with('success',$msg.' Successfully');
    }

    public function download($id, $key)
    {
      $docs = TourUpgradationBill::first()
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


    public function accountantBill(TourUpgradationBill $TourUpgradationBill)
    {
        //dd($_POST);

        $stat;
        if($_POST['request_id'] == 1)
        {
            $msg  = 'Amount paid ';
            $stat = 1;
            $query = $_POST['reason'];
            TourUpgradationBill::find($_POST['id'])->update(['accountant_status'=> $stat,'accountant_response'=>$query]);
        }
        elseif ($_POST['request_id'] == 2) {
            $response = $_POST['reason'];
            $msg = 'amount Unpaid';
            $stat = 2;
            TourUpgradationBill::find($_POST['id'])->update(['accountant_status'=> $stat]);
        }
        elseif ($_POST['request_id'] == 3) {
        // dd($_POST);
            $accountant_response = $_POST['reason'];
            $msg = 'amount received';
            $stat = 3;
            TourUpgradationBill::find($_POST['id'])->update(['accountant_status'=> $stat,'accountant_response'=>$accountant_response]);
        }
        return back()->with('success',$msg.' Successfully');
    }
    public function accountantVarifyBill(TourUpgradationBill $TourUpgradationBill)
    {
        // dd($_POST);
        $stat;
        if($_POST['request_id'] == 1)
        {
            $msg  = 'Bill varified ';
            $stat = 1;
            $acct_bill_vari_res = $_POST['acct__bill_vari_res'];
            TourUpgradationBill::find($_POST['id'])->update(['accountant_status_varied_bill'=> $stat,'acct_bill_vari_res'=>$acct_bill_vari_res]);
        }
        elseif ($_POST['request_id'] = 2) {

            $acct_bill_discard_res  = $_POST['acct_bill_discard_res'];
            $msg = 'Bill not varified';
            $stat = 2;
            TourUpgradationBill::find($_POST['id'])->update(['accountant_status_varied_bill'=> $stat,'acct_bill_discard_res'=>$acct_bill_discard_res]);
        }
        return back()->with('success',$msg.' Successfully');
    }


}
