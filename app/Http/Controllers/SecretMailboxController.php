<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use RealRashid\SweetAlert\Facades\Alert;
use App\Models\User;
use App\Models\SecretMail;
use App\Models\Assignee;
use Session;

class SecretMailboxController extends Controller
{
    public function index(){
        
        if(!Auth::check()){
            Alert::error('Please login!', 'You must login before you are able to access this page.');
            return redirect()->route('login');
        }
        return view('secretMailbox.index');
    }

    public function view(Request $request){
        
        if(!Auth::check()){
            Alert::error('Please login!', 'You must login before you are able to access this page.');
            return redirect()->route('login');
        }
        return view('secretMailbox.view');
    }

    public function create(){
        
        if(!Auth::check()){
            Alert::error('Please login!', 'You must login before you are able to access this page.');
            return redirect()->route('login');
        }
        return view('secretMailbox.create');
    }

    public function createPost(Request $request){

    }

    public function replyPost(Request $request){

    }

    public function updateStatusPost(Request $request){

    }
}
