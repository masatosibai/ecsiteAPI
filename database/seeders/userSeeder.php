<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Facades\DB;

class userSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $param = [
            'name' => 'admin',
            'email' => "admin@test.com",
            'password' => '123456',
            "role" => 1,
        ];
        DB::table('users')->insert($param);
        $users = User::factory()->count(10)->make();
        User::insert($users->toArray());
    }
}
