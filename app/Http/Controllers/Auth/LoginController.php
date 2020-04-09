<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use DB;
use Auth;
use Session;
use File;

class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    
    // protected $redirectTo = '/home';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

     public function redirectPath()
    {
        $acc_type  = Auth::user()->acc_type;     
        // $hasrole = DB::table('model_has_roles')->where('model_id',$Id)->first();
        // $roleid = 0;
        // if(!empty($hasrole)){
        //     $roleid = $hasrole->role_id;
        // }
       
        if(!empty($acc_type)){
            if (method_exists($this, 'redirectTo')) {
                return $this->redirectTo();
            }
            switch ($acc_type) {                
                case 'A' : 
                    Session::put('user_rol','admin');
                    return $login = '/admin';
                    break;
                case 'B':
                
                    Session::put('user_rol','user');
                    return $login = '/accountuser';
                    break;    
                case 'C':
               
                    Session::put('user_rol','manager');
                    return $login = '/dashboard';
                    break;
                default:
                    return $login='/';
            }
        }
        else{
            $login='/';
        }    
       
     return property_exists($this, 'redirectTo') ? $this->redirectTo : $login;
    }
}
