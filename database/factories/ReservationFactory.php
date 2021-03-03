<?php

namespace Database\Factories;

use App\Models\Reservation;
use Illuminate\Database\Eloquent\Factories\Factory;

class ReservationFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Reservation::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            "user_id" => $this->faker->numberBetween($min = 1, $max = 100),
            "shop_id" => $this->faker->numberBetween($min = 1, $max = 20),
            "date" => $this->faker->date('Y-m-d H:i:s'),
            "time" => $this->faker->time("H:i:s"),
            "user_num" => $this->faker->numberBetween($min = 1, $max = 30)


        ];
    }
}
