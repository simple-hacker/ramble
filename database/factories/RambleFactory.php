<?php

namespace Database\Factories;

use App\Models\User;
use App\Models\Ramble;
use Illuminate\Database\Eloquent\Factories\Factory;

class RambleFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Ramble::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'user_id' => User::factory(),
            'body' => $this->faker->sentence(),
        ];
    }
}
