<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Community;
use App\Models\Post;

class CommunityController extends Controller
{
    public function index()
    {
        $communities = Community::all();
        return view('pages/communities-index', compact('communities'));
    }

    public function addUser(Request $request)
    {
        $selection = $request->validate([
            'community_choices' => 'required_without_all',
        ]);
        foreach($selection['community_choices'] as $choice) {
            $newCommunity = Community::where('name', $choice)->first();
            $preExisting = false;
            foreach (Auth::user()->community as $preExistingCommunity) {
                if ($preExistingCommunity->name == $newCommunity->name) {
                    $preExisting = true;
                }
            }
            if (!$preExisting) {
                $newCommunity->user()->attach(Auth::user()->id);
            }
        }
        return redirect(route('home'));
    }

    public function removeUser($communityId)
    {
        $Community = Community::where('id', $communityId)->first();
        $Community->user()->detach(Auth::user()->id);
        return redirect(route('home'));
    }

    public function postboard($communityId){
        $Community = Community::where('id', $communityId)->first();
        $Posts = Post::where('community_id', $communityId)
            ->orderBy('created_at', 'desc')
            ->simplePaginate(3);
        return view('pages/postboard', compact('Community', 'Posts'));
    }
}