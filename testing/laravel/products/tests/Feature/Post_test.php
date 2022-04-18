<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use App\Models\Products;
class Post_test extends TestCase
{
    use RefreshDatabase;
    public function post_product()
    {
        $response = $this->post('/products/add',[
            'name' => 'New Product',
            'slug' => 'new_prodcut',
            'price' => '33.99'
        ]);

        $response->assertOK();
        $this->assertCount(1, Products::all());
    }
}
