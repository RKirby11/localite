<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class LandingTest extends TestCase
{
    Use RefreshDatabase;

    public function testLandingPageLoads()
    {
        $response = $this->get('/');
        $response->assertStatus(200);
        $response->assertSeeText('Localite');
        $response->assertSeeText('Share, learn, and grow');
    }
}
