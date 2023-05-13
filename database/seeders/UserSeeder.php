<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Faker\Factory;
use Illuminate\Support\Facades\DB;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        
        $faker = Factory::create();
        for($i = 0; $i < 15; $i++)
        {
        	User::create([
        		'name' => $faker->name,
                'email' => $faker->email,
                'city' => 'Newport',
                'Age' => $faker->numberBetween($min = 16, $max = 100),
                'password' => Hash::make('password'),
                'avatar' => $faker->imageUrl($width = 300, $height = 300, 'people'),
                'bio' => $faker->paragraph($nbSentences = 2, $variableNbSentences = true),
        	]);
        }
    }
}