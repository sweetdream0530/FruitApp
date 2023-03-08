<?php

namespace Database\Factories;

use App\Models\Fruit;
use Illuminate\Database\Eloquent\Factories\Factory;

class FruitFactory extends Factory
{
    protected $model = Fruit::class;

    public function definition()
    {
        return [
            'name' => $this->faker->unique()->word(),
            'family' => $this->faker->word(),
            'genus' => $this->faker->word(),
            'order' => $this->faker->word(),
            'carbohydrates' => $this->faker->randomFloat(2, 0, 100),
            'protein' => $this->faker->randomFloat(2, 0, 100),
            'fat' => $this->faker->randomFloat(2, 0, 100),
            'calories' => $this->faker->randomFloat(2, 0, 1000),
            'sugar' => $this->faker->randomFloat(2, 0, 100),
        ];
    }
}