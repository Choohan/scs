<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use RealRashid\SweetAlert\Facades\Alert;
use App\Models\User;
use App\Models\SecretMail;
use App\Models\Assignee;
use Session;

use Illuminate\Support\Facades\Mail;
use App\Mail\newEmailStudent;
use App\Mail\newEmailAdmin;
use App\Mail\newReplyAuthor;
use App\Mail\newReplyReciever;

class SecretMailboxController extends Controller
{
    public function index(){
        
        if(!Auth::check()){
            Alert::error('Please login!', 'You must login before you are able to access this page.');
            return redirect()->route('login');
        }
        $user = Auth::user();

        if(!isset($user->isAdmin)){
            $mails = SecretMail::where('creator_id', $user->id)->whereNull('parent_mail_id')->get();
        }else if($user->isAdmin == 1){
            $mails = SecretMail::rightJoin('assignees', 'assignees.mail_id', 'secret_mail.id')->whereNull('secret_mail.parent_mail_id')->where('assignees.peer_id', $user->id)->get();
        }else{
            $mails = SecretMail::whereNull('parent_mail_id')->get();
        }
        return view('secretMailbox.index', compact('mails'));
    }

    public function view($id, Request $request){
        
        if(!Auth::check()){
            Alert::error('Please login!', 'You must login before you are able to access this page.');
            return redirect()->route('login');
        }

        $user = Auth::user();
        $mail = SecretMail::where('id', $id)->first();
        $studentView = False;
        $isPeerHelper = False;
        if(!isset($user->isAdmin)){
            if($mail->creator_id != $user->id){
                Auth::error('Insufficient Permission!', 'You are not allowed to view this mail.');
            }
            $studentView = True;
        }else if($user->isAdmin == 1){
            $mails = SecretMail::rightJoin('assignees', 'assignees.mail_id', 'secret_mail.id')->whereNull('secret_mail.parent_mail_id')->where('secret_mail.id', $id)->get();
            if($mails->count() < 1){
                Auth::error('Insufficient Permission!', 'You are not allowed to view this mail.');
            }
            $isPeerHelper = True;
        }

        $peerHelpers = User::where('isAdmin', '1')->get();

        $replies = SecretMail::leftJoin('users', 'users.id', 'secret_mail.author_id')->where('secret_mail.parent_mail_id', $id)->get();
        
        return view('secretMailbox.view', compact('mail', 'replies', 'studentView', 'peerHelpers', 'isPeerHelper'));
    }

    public function create(){
        
        if(!Auth::check()){
            Alert::error('Please login!', 'You must login before you are able to access this page.');
            return redirect()->route('login');
        }
        return view('secretMailbox.create');
    }

    public function createPost(Request $request){
        
        if(!Auth::check()){
            Alert::error('Please login!', 'You must login before you are able to access this page.');
            return redirect()->route('login');
        }
        
        $user = Auth::user();

        $newMail = SecretMail::create([
            'title' => $request->input('title'),
            'problem' => $request->input('problem'),
            'feeling' => $request->input('feeling'),
            'thoughts' => $request->input('thoughts'),
            'creator_id' => $user->id,
            'author_id' => $user->id,
        ]);

        
        
        if($user->isAdmin == 1){
            $assignee = Assignee::create([
                'peer_id' => $user->id,
                'mail_id' => $newMail->id
            ]);
        }


        Mail::to($user->email)->send(new newEmailStudent($user, $newMail));
        
        $admins = User::where('isAdmin', '2')->get();
        foreach ($admins as $admin){
            Mail::to($admin->email)->send(new newEmailAdmin($admin, $newMail));
        }

        Alert::success('Submit successfully!', 'You had submitted a secret mail.');
        return redirect()->route('sm.list');
    }

    public function replyPost(Request $request){
        
        if(!Auth::check()){
            Alert::error('Please login!', 'You must login before you are able to access this page.');
            return redirect()->route('login');
        }
        
        $user = Auth::user();
        $parentMail = SecretMail::find($request->input('parent'));

        if($user->isAdmin != null){
            $parentMail->status = 1;
            $parentMail->save();
        }else{
            $parentMail->status = 0;
            $parentMail->save();
        }
        $newMail = SecretMail::create([
            'text' => $request->input('message'),
            'parent_mail_id' => $parentMail->id,
            'creator_id' => $parentMail->creator_id,
            'author_id' => $user->id,
        ]);

        $studentView = False;
        if(!isset($user->isAdmin)){
            $studentView = True;
        }

        $replies = SecretMail::leftJoin('users', 'users.id', 'secret_mail.author_id')->where('secret_mail.parent_mail_id', $parentMail->id)->orderBy('secret_mail.created_at', 'desc')->get();

        Mail::to($user->email)->send(new newReplyAuthor($user, $parentMail, $replies, $studentView));

        if($user->id == $parentMail->creator_id){
            $peerHelpers = User::rightJoin('assignees', 'assignees.peer_id', 'users.id')->where('assignees.mail_id', $parentMail->id)->get();

            foreach($peerHelpers as $peer){
                Mail::to($peer->email)->send(new newReplyReciever($peer, $parentMail, $replies, $studentView));
            }
        }else{
            $creator = User::find($parentMail->creator_id);
            Mail::to($creator->email)->send(new newReplyReciever($creator, $parentMail, $replies, $studentView));
        }
        
        Alert::success('Submit successfully!', 'You had replied a secret mail.');
        return redirect()->route('sm.view', ['id'=>$parentMail->id]);
    }

    public function updateStatusPost(Request $request){

    }

    public function assignPeerHelper(Request $request){
        
        if(!Auth::check()){
            Alert::error('Please login!', 'You must login before you are able to access this page.');
            return redirect()->route('login');
        }
        
        $assignee = Assignee::create([
            'peer_id' => $request->input('peer'),
            'mail_id' => $request->input('parent')
        ]);
        
        Alert::success('Assigned successfully!', 'You had assigned a Peer Helper to this secret mail.');
        return redirect()->route('sm.view', $request->input('parent'));
    }
}
