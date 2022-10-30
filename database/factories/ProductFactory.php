<?php

namespace Database\Factories;

use App\Models\Brand;
use App\Models\Category;
use App\Models\User;
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
    public function definition()
    {

        static $i = 0;
        $i++;
        return [
            'title' => $this->faker->word(),
            'slug' => $this->faker->unique()->slug,
            'summary' => $this->faker->sentence,
            'desc' => $this->faker->text(),
            'return_cancellation' => $this->faker->paragraph(3, true),
            'additional_info' => $this->faker->paragraph(3, true),
            'img' => "$i" . '.png',
            'size_guide' => $this->faker->imageUrl('255', '274'),
            'price' => $this->faker->numberBetween(180, 1080),
            'offer_price' => $this->faker->numberBetween(180, 1080),
            'discount' => $this->faker->numberBetween(18, 2),
            'stock' => $this->faker->numberBetween(2, 18),
            'size' => $this->faker->randomElement(['S', 'L', 'M']),
            'status' => $this->faker->randomElement(['active', 'inactive']),
            'condition' => $this->faker->randomElement(['new', 'popular', 'winter']),
            'category_id' => $this->faker->randomElement(Category::where('is_parent', 1)->pluck('id')->toArray()),
            'child_cat_id' => $this->faker->randomElement(Category::where('is_parent', 0)->pluck('parent_id')->toArray()),
            'seller_id' => $this->faker->randomElement(User::where('role', 'seller')->pluck('id')->toArray()),
            'brand_id' => $this->faker->randomElement(Brand::pluck('id')->toArray()),

        ];
    }
}
