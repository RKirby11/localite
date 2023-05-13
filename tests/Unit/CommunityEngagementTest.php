<?php

namespace Tests\Unit;

use PHPUnit\Framework\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;
use App\Models\User;
use App\Models\Community;
use App\Models\Post;

class CommunityEngagementTest extends TestCase
{
    Use RefreshDatabase;

    public function testCountOfUserPostsToCommunityIsCorrect()
    {
        $user2 = User::factory()->create([
            'name' => 'test2',
        ]);
        $community = Community::create([
            'name' => 'Art',
            'image' => 'images/communities/art.png',
        ]);
        $community->user()->attach($user2->id);


    }
}
