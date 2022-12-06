<?php

namespace Database\Seeders;

use App\Models\MetaAttribute;
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
                'attribute_id' => 2
            ],
            [
                'value' => 'Red',
                'attribute_id' => 2
            ],
            [
                'value' => 'Purple',
                'attribute_id' => 2
            ],
            [
                'value' => 'Orange',
                'attribute_id' => 2
            ],
            [
                'value' => 'S',
                'attribute_id' => 1
            ],
            [
                'value' => 'S',
                'attribute_id' => 1
            ],
            [
                'value' => 'M',
                'attribute_id' => 1
            ],
            [
                'value' => 'L',
                'attribute_id' => 1
            ],
            [
                'value' => 'XL',
                'attribute_id' => 1
            ]
        ]);
    }
}
