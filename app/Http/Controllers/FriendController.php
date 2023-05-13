<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use App\Models\Skill;
use App\Models\User_Friend;

class FriendController extends Controller
{
    public function index(){
        $friends = Auth::user()->friends;
        return view('pages/friends-index', compact('friends'));
    }

    public function show($memberid){
        $user = User::where('id', Auth::user()->id)->first();
        $friend = $user->friends()->where('friend_id', $memberid)->first();
        $friendstatus = false;
        if($friend){ 
            $friendstatus = true; 
        }
        $member = User::where('id', $memberid)->first();
        $skillShare = Skill::where('user_id', $memberid)
             ->where('type', 'share')
             ->get();
        $skillLearn = Skill::where('user_id', $memberid)
             ->where('type', 'learn')
             ->get();
        return view('pages/friends-show', compact('member', 'skillShare', 'skillLearn', 'friendstatus'));
    }

    public function create($memberid){
        $user = User::where('id', Auth::user()->id)->first();
        $user->friends()->attach($memberid);      
        
        $friend = User::where($memberid)->first();
        $friend->friends()->attach(Auth::user()->id);      

        return redirect(route('friends.show', $memberid));
    }

    public function destroy($memberid){
        $user = User::where('id', Auth::user()->id)->first();
        $user->friends()->detach($memberid);            
        return redirect(route('friends.show', $memberid));
    }
}