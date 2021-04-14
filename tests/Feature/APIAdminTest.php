<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class APIAdminTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function test_example()
    {
        //権限がちがうからエラーです
        $response = $this->post('/api/admin/register/shopadmin', [
            'name' => 'admin',
            'email' => 'sample@d.com',
            'password' => '11111',
            'admin' => '2',
            'role' => '2',

        ]);

        $response->assertStatus(404);

        $response = $this->post('/api/admin/register/shopadmin', [
            'name' => 'admin',
            'email' => 'sample@d.com',
            'password' => '11111',
            'admin' => '1',
            'role' => '2',

        ]);

        $response->assertStatus(500);
    }
}
