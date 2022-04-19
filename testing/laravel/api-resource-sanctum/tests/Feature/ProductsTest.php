<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;
use App\Models\User;
class ProductsTest extends TestCase
{
    //get--------------------------------------------------------------
    public function test_get_products()
    {
        // $response = $this->getJson(route('products'));//with route and json format(not: first check has route name)
        $response = $this->get('/api/products');
        $response->assertStatus(200);
    }

    //get with id------------------------------------------------------
    public function test_get_products_id()
    {
        $response = $this->get('/api/products/1');
        $response->assertStatus(204);
    }

    //get with search---------------------------------------------------
    public function test_get_products_search()
    {
        $response = $this->get('/api/products/search/linux');
        $response->assertStatus(200);
    }
}
