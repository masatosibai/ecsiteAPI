<?php

namespace Database\Factories;

use App\Models\reservation;
use Illuminate\Database\Eloquent\Factories\Factory;

class reservationFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = reservation::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {

        return [
            "user_id" => $this->faker->numberBetween($min = 1, $max = 5000),
            "shop_id" => $this->faker->numberBetween($min = 1, $max = 20),
            "date" => $this->faker->date('Y/m/d'),
            "time" => $this->faker->time("H:i:s"),
            "user_num" => $this->faker->numberBetween($min = 1, $max = 30)


        ];
    }
}
