<?php

namespace Database\Seeders;

use App\Models\Community;
use Illuminate\Database\Seeder;

class CommunitySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(){

        Community::create([
            'name' => 'Art',
            'image' => 'images/communities/art.png',
        ]);
        Community::create([
            'name' => 'Culinary',
            'image' => 'images/communities/culinary.png',
        ]);
        Community::create([
            'name' => 'Gardening',
            'image' => 'images/communities/gardening.png',
        ]);
        Community::create([
            'name' => 'Literature',
            'image' => 'images/communities/literature.png',
        ]);
        Community::create([
            'name' => 'Music',
            'image' => 'images/communities/music.png',
        ]);
        Community::create([
            'name' => 'Sports',
            'image' => 'images/communities/sports.png',
        ]);
        Community::create([
            'name' => 'Tech',
            'image' => 'images/communities/tech.png',
        ]);

    }
}