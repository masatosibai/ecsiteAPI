<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class APITest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function test_get_apishop()
    {
        $response = $this->get('/api/shops');

        $response->assertStatus(200);

        $response = $this->get('/api/shops/1');

        $response->assertStatus(200);

    }
}
