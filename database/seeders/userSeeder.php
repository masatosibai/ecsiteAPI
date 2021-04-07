<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

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
            'password' =>Hash::make(123123),
            "role" => 1,
        ];
        DB::table('users')->insert($param);
        $users = User::factory()->count(10)->make();
        User::insert($users->toArray());
    }
}
