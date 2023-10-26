<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class SliderTest extends TestCase
{
    /**
     * A basic feature test example.
     */
    public function test_get_sliders(): void
    {
        $response = $this->get('/api/sliders');

        $response->assertStatus(200);
    }
}
