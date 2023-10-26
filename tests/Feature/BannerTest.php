<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class BannerTest extends TestCase
{
    /**
     * A basic feature test example.
     */
    public function test_get_banner()
    {
        $response = $this->get('/api/banners');

        $response->assertStatus(200);
    }
}
