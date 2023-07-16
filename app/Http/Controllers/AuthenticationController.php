<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Hash;
use App\Models\SecretMail;
use App\Models\Assignee;
use RealRashid\SweetAlert\Facades\Alert;
use Illuminate\Support\Facades\Auth;
use Session;


class AuthenticationController extends Controller
{
    public function index(){
        if(Auth::check()){
            return redirect()->route('sm.list');
        }
        return view('authentication.login');
    }

    public function register(){
        if(Auth::check()){
            return redirect()->route('sm.list');
        }
        return view('authentication.register');
    }

    public function registerPost(Request $request){
        $existingUser = User::where('email', $request->input('email'))
                        ->orWhere('student_id', $request->input('studentid'))
                        ->first();

        if($existingUser != null){
            Alert::error('User exist!', 'Account had been registered before! Please login.');
            return redirect()->route('register');
        }

        if($request->input('password') != $request->input('cpassword')){
            Alert::error('Password is incorrect!', 'Please try again.');
            return redirect()->route('register');
        }

        $newUser = User::create([
            'name' => $request->input('full-name'),
            'email' => $request->input('email'),
            'password' => Hash::make($request->input('password')),
            'contacts' => $request->input('contact-no'),
            'student_id' => $request->input('studentid')
        ]);

        Alert::success('Account created successfully!', 'Please login to use the system.');
        
        return redirect()->route('login');


    }

    public function loginPost(Request $request){
        $credentials = $request->only('email', 'password');
        if(Auth::attempt($credentials)){
            Alert::success('Welcome Back!', 'Login successfully.');
            return redirect()->route('sm.list');
        }
        Alert::error('Invalid Credentials!', 'Please try again.');
        return redirect()->route('login');
    }

    public function dashboard(Request $request){

    }

    public function logOut(){
        Session::flush();
        Auth::logout();

        return redirect()->route('login');
    }
}
