<?php
namespace App\Http\Controllers;

use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;
use Log;
use App\Classes\IEncryption;
use Illuminate\Foundation\Auth\User;
class RegisterController extends Controller
{
    protected $encKey = '1234567890';
    public function register(){
    	return view("register");
    }
    public function newRegister(Request $request){
    	$user = new User;    	

    	// encrypt password
    	$encrypte = new IEncryption;
    	$encPassword = $encrypte->encrypted($request->password,'1234567890');
    	$user->first_name = $request->firstName;
    	$user->last_name = $request->lastName;
    	$user->user_name = $request->userName;
    	$user->password = $encPassword;
    	$user->save();

    	return redirect('login');
    }
    public function showLogin(){
    	return view('login');
    }

    public function checkLogin(Request $request){
    	$encrypte = new IEncryption;
        $encPwd   = $encrypte->encrypted($request->password,$this->encKey);
    	
    	$user = User::where([
    						['user_name','=',$request->userName],
    						['password','=',$encPwd]
    						])->count();
    	        
        if($user > 0){
            //start session
            session_start();
            $_SESSION['userName'] = $request->userName;
           return redirect("/");
        }else {
            session_start();
            session_destroy();
            return view("login",['err_msg'=>'Invalid Detail']);
        }
    }
    public function logout(){
        session_start();
        session_destroy();
        return view("login");
    }
}
