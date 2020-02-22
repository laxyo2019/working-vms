<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\Mail;
use Illuminate\Http\Request;
use App\Mail\SendMailable;
use App\FleetUser;
use App\Fleet;
use App\User;
use Auth;
use DB;

class FleetController extends Controller
{
    
    public function index()
    {
        $user  = User::where('parent_id',Auth::user()->id)->get();
        $fleet = Fleet::where('fleet_owner',Auth::user()->id)->get();
       
        return view('fleet.index',compact('user','fleet'));
    }

    public function create()
    {
         $user  = User::where('parent_id',Auth::user()->id)->get();
        return view('fleet.create',compact('user'));    }

    
    public function store(Request $request)
    {
        $validatedData = $request->validate([
                                       'fleet_name'  => 'required',
                                       'fleet_code'  => 'required|unique:fleet_mast',
                                       'fleet_desc'  =>'nullable'
                                       ]);      
       
        $validatedData['fleet_owner'] = Auth::user()->id;
        $last_id = Fleet::create($validatedData)->id;           
        //Mail::to($user->email)->send(new SendMailable($name));
        return redirect('fleet');      
    }

    public function show($id)
    {
        $user = User::join('fleet_user','users.id','=','fleet_user.user_id')->where('fleet_id',$id)->get();
        $fleet_id = $id;

        $model_user = User::where('parent_id',Auth::user()->id)->get();
        $fleet_users=FleetUser::where('fleet_id',$fleet_id)->get();
        $fleet_users_id = array();
        foreach ($fleet_users as $value) {
          $fleet_users_id[] = $value->user_id;
        } 

        return view('fleet.show',compact('user','model_user','fleet_id','fleet_users_id'));   

    }
   
    public function edit($id)
    {
        $fleet =Fleet::where('id',$id)->first();
        $user = User::all();
        return view('fleet.edit',compact('fleet','user'));
    }
    
    public function update(Request $request, $id)
    {
        $validatedData = $request->validate([
                                       'fleet_name'  => 'required',
                                       'fleet_code'  => 'required',
                                       'fleet_desc'  =>'nullable'
                                       ]);

        Fleet::where('id',$id)->update($validatedData);
        return redirect('fleet');
    }

   
    public function destroy($id)
    {
        Fleet::where('id',$id)->delete();
        return redirect('fleet');
    }

    public function mail()
    {
       $name = 'Krunal';       
       return 'Email was sent';
    }

    public function add_on_fleet(Request $request){
      $ids      = $request->id;
      $fleet_id = $request->fleet_id;    
      $data = array();
      foreach ($ids as $id) {
        $data = ['user_id'=>$id,'fleet_id'=>$fleet_id];
        FleetUser::insert($data);
      }
      $user = User::join('fleet_user','users.id','=','fleet_user.user_id')->where('fleet_id',$fleet_id)->get();
      return view('fleet.table_refresh',compact('user'));  
    }
    public function user_delete($id)
    {
       FleetUser::where('id',$id)->delete();
       return redirect()->back();
    }
}
