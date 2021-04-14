<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use App\Models\User;

class APIUserTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
    protected $model = User::class;

    public function test_example()
    {
        //JWTがないとユーザー情報は返答しない
        $response = $this->get('/api/users/1');

        $response->assertStatus(404);
    }
}
