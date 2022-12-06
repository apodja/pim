<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Attribute;

class AttributeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Attribute::factory()->times(10)->create();
        Attribute::insert([
                [
                    'type' => 'Color',
                    'created_at' => now()
                ],   

                [
                    'type' => 'Size',
                    'created_at' => now()
                ]
            ]);
    }
}
