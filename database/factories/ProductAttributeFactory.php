<?php

namespace Database\Factories;

use App\Models\Attribute as ModelsAttribute;
use App\Models\Product;
use Attribute;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Model>
 */
class ProductAttributeFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'product_id' => Product::inRandomOrder()->first()->id,
            'attribute_id' => ModelsAttribute::inRandomOrder()->first()->id
        ];
    }
}
