<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\LoginRequest;  
use App\Http\Requests\ResetPassword; 
use App\Http\Requests\VerifyResetPasswordInput;
use Illuminate\Support\Facades\DB;
use Mail;

class LoginController extends Controller
{
    public function index()
    {
        return view('login.index');
    }

    public function verify(LoginRequest $request)
    {
        // $sql = "SELECT * FROM users WHERE username='$request->username' AND password='$request->password'";
    	// $result = DB::select($sql);

        $user = DB::table('logininfo')
            ->where('email', $request->email)
            ->where('password', $request->password)
            ->first(); //return a single row
        
        if(!$user)
        {
            $request->session()->flash('message', 'Invalid email or password');
            return redirect()->route('login');
        }
        else
        {
            $userDetails = DB::table($user->type)
            ->where('userID', $user->userID)
            ->first(); //return a single row

            $request->session()->put('user', $user);
            $request->session()->put('userDetails', $userDetails);

            if ($user->type == "Admin") {
                return redirect()->route('adminHome');
            }else if ($user->type == "Customer") {
                return redirect()->route('customerHome');
            }else if ($user->type == "Restaurant") {
                return redirect()->route('restaurantHome');
            }
        }
    }

    public function resetPassword(Request $request)
    {
        return view('resetPassword.index');
    }
    
    public function sendEmailresetPassword(ResetPassword $request)
    {

        $userDetails = DB::table('logininfo')
            ->where('email', $request->email)
            ->first(); //return a single row

        $md5Pass=md5($userDetails->password);

        $changeResetPasswordURL= route('changePassword',['userID'=>$userDetails->userID,'md5Pass'=>$md5Pass]);

       dd($changeResetPasswordURL);
    }


    public function changePassword($userID, $md5Pass)
    {
        //check if md5 matched that means get the actual link from email

        $userDetails = DB::table('logininfo')
            ->where('userID', $userID)
            ->first(); //return a single row

        $getUserMd5Pass=md5($userDetails->password);

        if ($getUserMd5Pass==$md5Pass) 
        {
            return view('resetPassword.resetUserPassword')
                ->with('userDetails', $userDetails);
        }else{
            return redirect()->route('error');
        }
    }

    public function storeChangePassword(VerifyResetPasswordInput $request)
    {
        DB::table('logininfo')
            ->where('userID', $request->userID)
            ->update(['password' => $request->password_confirmation]);

            return redirect()->route('login');
    }

    public function faq(Request $request)
    {        
        return view('login.faq');
    }

    public function contact(Request $request)
    {        
        return view('login.contact');
    }


    public function logout(Request $request)
    {
        $request->session()->flush();
        return redirect()->route('login');
    }
}
