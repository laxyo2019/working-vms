<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;
use Session;
use App\Models\Account;
use Auth; 
use DB; 
use App\User;
use Mail;
use App\Mail\SendMailable;
use App\Mail\UserRequest;

class AccountController extends Controller
{
    
   public function index()
    {
        $user = Account::all();
        return view('account_admin.show',compact('user'));
    }

    public function create()
    {
        $user  = User::all();
        return view('account_admin.create',compact('user'));
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
                                       'acc_code' =>'required|min:5',
                                       'acc_owner'=> 'required|not_in:0',
                                       'contact'  => 'required|numeric',
                                       'remarks'  =>'nullable'
                                       ]);
      
       $ckh_acc = Account::where('acc_code', '=', $validatedData['acc_code'])->first();
       if(!empty($ckh_acc)){
          return redirect()->back()->with('acc_code_error','Account Code already exists');
       }
       else{        
     
           $user     = User::find($request->acc_owner);
           $u_name   = strtolower($user->name);
           $password = substr($u_name,0,4).'1234';
           $name['username'] = $user->email;
           $name['name']     = $u_name;
           $name['password'] = $password;
            
            Account::create($validatedData);
            Mail::to($user->email)->send(new SendMailable($name));
            return redirect('account');
      }
    }

    
    public function show($id)
    {
        //
    }
    public function edit($id)
    {
        $data = Account::find($id);
        $user = User::all();
        return view('account_admin.edit',compact('data','user'));
    }
    public function update(Request $request, $id)
    {
        $validatedData = $request->validate([
                                       'acc_code' =>'required|min:5',
                                       'acc_owner'=> 'required|not_in:0',
                                       'contact'  => 'required|numeric',
                                       'remarks'  =>'nullable'
                                       ]);

        Account::where('id',$id)->update($validatedData);
        return redirect('account');
    }
    public function destroy($id)
    {      
        Account::where('id',$id)->delete();
        return redirect('account');
    }
    public function mail()
    {
       $name = 'Krunal';
       return 'Email was sent';
    }
    public function change_password($id)
    { 
        $user = Auth::User();
        $user_role = $user->getRoleNames();
        foreach ($user_role as $value) {
          $role = $value;
        }
        if($role == 'superadmin'){        
        $user = User::find($id);
        return view('account_admin.change_password',compact('user'));
        }
        if($role  =="account"){
        $user = User::find($id);
        return view('account_user.change_password',compact('user'));
        }
    }
    public function password_update(Request $request, $id)
    { 
         $data = $request->validate(['old_password' =>'required',
                                     'new_password'=>'required'   
                                    ]);
       $current_password = Auth::User()->password;    
           
     if (!(Hash::check($request->old_password, Auth::user()->password))) 
      { 
         return redirect()->back()->with('error','Old password not matched');
        }
        else{
          
           $user_id = Auth::User()->id;                       
            $obj_user = User::find($user_id);
            $obj_user->password = Hash::make($data['new_password']);
            $obj_user->save();
            return redirect()->back()->with("error","Password changed successfully !");
        }
    }
}
