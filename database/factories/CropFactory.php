<?php

namespace Database\Factories;
use App\Models\User;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Crop>
 */
class CropFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            //
            'name'=>fake()->name,
            'user_id'=>User::pluck('id')->random(),
            'duration'=>fake()->numberBetween(2,12),
            'acerage'=>fake()->numberBetween(1,10),
            'note'=>fake()->sentence(),
        ];
    }
}
