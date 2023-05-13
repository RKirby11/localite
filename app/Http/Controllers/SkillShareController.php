<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Models\Skill;

class SkillShareController extends Controller
{
    public function create()
    {
        return view('pages/skill-share-create');
    }

    public function store(Request $request, $type)
    {
        $skill = $request->validate([
            'skill' => ['required', 'string', 'max:100']
        ]);
        Skill::create([
            'user_id' => Auth::user()->id,
            'type' => $type,
            'skill' => $skill['skill']
        ]);
        return redirect(route('skillshare.create'));
    }

    public function viewSkillShare()
    {
        $skillShare = Skill::where('user_id', Auth::user()->id)
            ->where('type', 'share')
            ->get();
        $skillLearn = Skill::where('user_id', Auth::user()->id)
            ->where('type', 'learn')
            ->get();
        if((count($skillShare) + count($skillLearn)) > 0) {
            $relatedMembers = [];
            foreach( Auth::user()->community as $community){
                foreach( $community->user as $communityMember){
                    $memberSkills = Skill::where('user_id', $communityMember->id)->get();
                    if((count($memberSkills) > 0) && ($communityMember->id != Auth::user()->id)){
                        $relatedMembers[] = $communityMember;
                    }
                }
            }
            shuffle($relatedMembers);
            return view('pages/skill-share', compact('skillShare', 'skillLearn', 'relatedMembers'));
        }
        else{
            return redirect(route('skillshare.create'));
        }
    }
}
