<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Brand>
 */
class BrandFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        static $i =0;
        $i ++ ;
        return [
            'title'=>$this->faker->word(),
            'slug'=>$this->faker->unique()->slug,
            'img'=>"$i" . '.png',
            'status'=>$this->faker->randomElement(['active','inactive']),

        ];
    }
}
