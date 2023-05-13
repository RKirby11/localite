<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Skill;
use Faker\Factory;

class SkillSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Factory::create();
        for($i = 1; $i <= 15; $i++)
        {
        	Skill::create([
                'user_id' => $i,
                'type' => 'share',
                'skill' => $faker->jobTitle,
            ]);
            Skill::create([
                'user_id' => $i,
                'type' => 'learn',
                'skill' => $faker->jobTitle,
            ]);
        }
    }
}
