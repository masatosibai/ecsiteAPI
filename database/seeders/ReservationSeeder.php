<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\reservation;

class ReservationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        reservation::factory()->count(100)->create();
    }
}
