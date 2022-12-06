<?php

namespace Database\Factories;

use App\Models\MetaAttribute;
use App\Models\Product;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\MetaAttributeProduct>
 */
class MetaAttributeProductFactory extends Factory
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
            'meta_attribute_id' => MetaAttribute::inRandomOrder()->first()->id,
        ];
    }
}
