<?php

namespace Database\Factories;

use App\Models\UserRecs;
use Illuminate\Database\Eloquent\Factories\Factory;

class UserRecsFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = UserRecs::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [

          // 'movie_ids' = array();
          //   for ($i = 0; $i < 10; $i++) {
          //   // get a random digit, but always a new one, to avoid duplicates
          //   'movie_ids' []= $faker->unique()->randomDigit;
          //   }
          //   'user_id' => $this->faker->randomDigit,
        ];
    }
}
