<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Post;
use App\Models\CommunityUser;

class CommunityUserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //add a point for each community user relationship dependent 
        //on the number of posts of the user to the community
        $posts = Post::orderBy('id', 'asc')->get();
        foreach($posts as $post){
            $communityUser = CommunityUser::where('community_id', $post->community_id)
                ->where('user_id', $post->user_id)->first();
            $communityUser->points += 1;
            $communityUser->save();
        }
    }
}
