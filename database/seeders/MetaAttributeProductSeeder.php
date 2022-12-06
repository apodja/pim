<?php

namespace Database\Seeders;

use App\Models\MetaAttributeProduct;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class MetaAttributeProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        MetaAttributeProduct::factory()->times(10)->create();
    }
}
