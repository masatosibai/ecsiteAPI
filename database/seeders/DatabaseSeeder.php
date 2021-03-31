<?php

namespace Database\Seeders;

use App\Models\reservation;
use Illuminate\Database\Seeder;

use App\Models\User;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call([
            // userSeeder::class,
            // ShopSeeder::class,
            // shopuserSeeder::class,
            ReservationSeeder::class,
        ]);
    }
}
