<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;
use App\Models\User;
use App\Models\Community;
use Illuminate\Support\Facades\Hash;

class UserTest extends TestCase
{
    Use RefreshDatabase;

    public function testNewUserCreatedCorrectly()
    {
        User::factory()->create([
            'name' => 'test1',
        ]);

        $user1 = User::where('id', '1')->first();
        $this->assertTrue($user1->name == 'test1');
        $this->assertTrue($user1->communities == null);
    }

    public function testUserCanViewTheirCommunity()
    {
        $user2 = User::factory()->create([
            'name' => 'test2',
        ]);
        $community = Community::create([
            'name' => 'Art',
            'image' => 'images/communities/art.png',
        ]);
        $community->user()->attach($user2->id);

        $this->assertTrue($user2->community[0]->name == 'Art');
        
        $view = $this->actingAs($user2)
                    ->get('/home')
                    ->assertSeeText('Your Local Art Community Postboard');
    }
}
