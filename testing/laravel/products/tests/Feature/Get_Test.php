<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use App\Models\Products;
class test_get extends TestCase
{
    use RefreshDatabase;
    public function test_example()
    {
        $response = $this->get('/products');

        $response->assertStatus(200);
    }
}
