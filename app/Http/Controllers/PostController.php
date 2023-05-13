<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Post;
use App\Models\CommunityUser;

class PostController extends Controller
{
    public function store(Request $request, $communityId){   
        $newPost = $request->validate([
            'postText' => ['required', 'string', 'max:500']
        ]);
        $newPost = Post::create([
            'community_id' => $communityId,
            'user_id' => Auth::user()->id,
            'post_text' =>  $newPost['postText'],
            'likes' => 0
        ]);
        
        $communityUser = CommunityUser::where('community_id', $communityId)
                        ->where('user_id', Auth::user()->id)
                        ->first();
        $communityUser->points += 1;
        $communityUser->save();
        return redirect(route('postboard', $communityId));
    }

    public function destroy(Request $request, $communityId, $postId)
    {   
        $post = Post::where('id', $postId)->first();
        $post->delete();

        $communityUser = CommunityUser::where('community_id', $communityId)
                        ->where('user_id', Auth::user()->id)
                        ->first();
        $communityUser->points -= 1;
        $communityUser->save();
        return redirect(route('postboard', $communityId));
    }

    public function edit(Request $request, $communityId, $postId)
    {   
        $post = Post::where('id', $postId)->first();
        return view('pages/post-edit', compact('post', 'communityId'));
    }

    public function update(Request $request, $communityId, $postId)
    {   
        $updatedPost = $request->validate([
            'postText' => ['required', 'string', 'max:500']
        ]);
        $post = Post::where('id', $postId)->first();
        $post->post_text = $updatedPost['postText'];
        $post->save();
        return redirect(route('postboard', $communityId));
    }

    public function updateLikes($postId)
    {   
        $post = Post::where('id', $postId)->first();
        $post->likes = $post->likes + 1;
        $post->save();
        return redirect(route('postboard', $post->community_id));
    }
}
