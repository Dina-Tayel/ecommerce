<?php

namespace Database\Factories;

use App\Models\Category;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Category>
 */
class CategoryFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        static $i=0 ;
        $i ++ ;
        return [
            'title'=>$this->faker->word(),
            'slug'=>$this->faker->unique()->slug,
            'desc'=>$this->faker->sentences(3, true),
            'img'=>'uploads/categories/'. $i ,
            'is_parent'=>$this->faker->randomElement([1 , 0]),
            'parent_id'=>$this->faker->randomElement(Category::where('is_parent',0)->pluck('id')->toArray()),
            'status'=>$this->faker->randomElement(['active','inactive']),

        ];
    }
}
