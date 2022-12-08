<?php

namespace Database\Seeders;

use App\Models\MetaAttribute;
use App\Models\Product;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class MetaAttributeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        MetaAttribute::insert([
            [
                'value' => 'Green',
                'attribute_id' => 1,
                'product_id' => Product::first()->id
            ],
            [
                'value' => 'Red',
                'attribute_id' => 1,
                'product_id' => Product::first()->id
            ],
            [
                'value' => 'Purple',
                'attribute_id' => 1,
                'product_id' => Product::first()->id
            ],
            [
                'value' => 'Orange',
                'attribute_id' => 1,
                'product_id' => Product::first()->id
            ],
            [
                'value' => 'S',
                'attribute_id' => 2,
                'product_id' => Product::first()->id
            ],
            [
                'value' => 'S',
                'attribute_id' => 2,
                'product_id' => Product::first()->id
            ],
            [
                'value' => 'M',
                'attribute_id' => 2,
                'product_id' => Product::first()->id
            ],
            [
                'value' => 'L',
                'attribute_id' => 2,
                'product_id' => Product::first()->id
            ],
            [
                'value' => 'XL',
                'attribute_id' => 2,
                'product_id' => Product::first()->id
            ]
        ]);
    }
}
