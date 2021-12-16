<?php

namespace App\Http\Controllers;

use App\Models\Notification;
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

    public function showLogin()
    {
        return view('auth.login');
    }

    public function showRegister()
    {
        return view('auth.register');
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
            'email' => 'required|email',
            'password' => 'required|confirmed'
        ]);

        $user = new User();
        $user->firstName = $request->firstName;
        $user->lastName = $request->lastName;
        $user->otherName = $request->otherName;
        $user->email = $request->email;
        $user->user_type = 'Alumnus';
        $user->password = Hash::make($request->password);
        $user->save();

        //notify admin
        $notification = new Notification();
        $notification->user_id = $user->id;
        $notification->notification_type_id = 1;
        $notification->save();
        

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
