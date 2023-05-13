<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Post;
use App\Models\Community;
use Faker\Factory;

class PostSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Factory::create();
        for($i = 0; $i < 30; $i++)
        {
            $communityId = $faker->numberBetween($min = 1, $max = 7);
            $posterId = $faker->numberBetween($min = 1, $max = 15);
        	Post::create([
                'community_id' => $communityId,
                'user_id' => $posterId,
                'post_text' => $faker->paragraph($nbSentences = 3, $variableNbSentences = true),
                'likes' => $faker->numberBetween($min = 0, $max = 50),
            ]);
            
            //Ensure there is a relationship between user and community they are posting to...
            $community = Community::where('id', $communityId)->first();
            $preExistingRelationship = false;
            foreach($community->user as $user){
                if($posterId == $user->id){
                    $preExistingRelationship = true;
                }
            }
            if(!$preExistingRelationship){
                $community->user()->attach($posterId);      
            }  
        }
    }
}
