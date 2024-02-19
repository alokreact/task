<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Product>
 */
class ProductFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'name'=>$this->faker->name,
            'description'=>$this->faker->sentence,
            'price'=>$this->faker->numberBetween(10,1000),
            'discount'=>$this->faker->numberBetween(1,10),
            'image1'=>$this->faker->image('public/profile_images', 400, 300, null, false),
            'status'=>$this->faker->boolean(),
            'delivery_charges'=>$this->faker->numberBetween(10,200)
        ];
    }
}
