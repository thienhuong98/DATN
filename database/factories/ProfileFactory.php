<?php

namespace Database\Factories;

use App\Models\Profile;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

class ProfileFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Profile::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'name' => $this->faker->name,
            'gender' => rand(0, 1),
            'birthday' => $this->faker->dateTimeThisCentury->format('Y-m-d'),
            'phone' => $this->faker->phoneNumber,
            'address' => $this->faker->address,
            'user_id' => User::factory(),
        ];
    }
}
