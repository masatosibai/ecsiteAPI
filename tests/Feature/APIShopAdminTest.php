<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class APIShopAdminTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function test_example()
    {
        //権限がないとアクセスできない
        $response = $this->get('/api/shopadmin/shops');

        $response->assertStatus(404);

        //権限があるとアクセスできる
        $response = $this->withHeaders([
            'Authorization' => 2,
        ])->get('/api/shopadmin/shops');

        $response->assertStatus(200);
    }
}
