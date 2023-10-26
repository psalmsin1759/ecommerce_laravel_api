<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use \App\Models\Category;

class CategoryTest extends TestCase
{
    /**
     * A basic feature test example.
     */
    public function test_get_category()
    {
        $response = $this->get('/api/categories');

        $response->assertStatus(200);
    }

    public function test_create_category(){

        $category = Category::factory()->create(); 
        $response = $this->post('/api/categories', $category->toArray());

        $response->assertStatus(200);
    }
}
