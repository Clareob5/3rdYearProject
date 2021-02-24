<?php

namespace Database\Factories;

use App\Models\UserWatchlist;
use Illuminate\Database\Eloquent\Factories\Factory;

class UserWatchlistFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = UserWatchlist::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'user_id' => $this->faker->numberBetween($min = 3, $max = 11),
            'movie_id' => $this->faker->numberBetween($min = 1, $max = 25)
        ];
    }
}
