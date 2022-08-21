<?php

namespace App\Http\Controllers;

use App\Models\Notification;
use App\Models\NotificationType;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    function __construct()
    {
        $this->middleware('guest', ['except' => ['logout']]);
    }

    public function showLogin(Request $request)
    {
        // dd($request);
        if($request['_method'] == 'put')
            return view('auth.admin-login');
        return view('auth.login');
    }

    public function showAdminLogin()
    {
        return view('auth.admin-login');
    }

    public function showRegister(Request $request)
    {
        // dd($request);
        if($request['_method'] == 'put')
            return view('auth.admin-register');
        return view('auth.register');
        // if ($type == "Admin") {
        //     return view('auth.admin-register');
        // } else{
        //     return view('auth.register');
        // }
        
    }

    public function showAdminRegister()
    {
        return view('auth.admin-register');
    }


    public function showForgetPassword()
    {
        return view('auth.forgotpassword');
    }

    public function logIn(Request $request)
    {
        $this->validate($request, [
            'email' => 'required|email',
            'password' => 'required'
        ]);

        if (Auth::attempt([
            'email' => $request->email,
            'password' => $request->password
        ])) {
            // Authentication passed...
            return redirect()->route('dashboard.index');
        } else {
            return redirect()->back()->with('error', 'Invalid username or password');
        }
    }

    public function register(Request $request)
    {
        $this->validate($request, [
            'firstName' => 'required',
            'lastName' => 'required',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|confirmed'
        ]);

        $user = new User();
        $user->firstName = $request->firstName;
        $user->lastName = $request->lastName;
        $user->otherName = $request->otherName;
        $user->email = $request->email;
        if (isset($request['is-Admin'])) {
            $user->user_type = 'Admin';
        } else {
            $user->user_type = 'Alumnus';
        }
        
        $user->password = Hash::make($request->password);
        $user->save();

        //notify admin
        // $notification = new Notification();
        // $notification->user_id = $user->id;
        // $notification->notification_type_id = NotificationType::where('type', 'registration')->first()->id;
        // $notification->save();
        

        return redirect()->route('dashboard.index');
    }

    public function logout(Request $request)
    {
        Auth::logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect()->route('login');

    }
}
