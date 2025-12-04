<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class BrandSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Map: 'Brand Name' => category_id
        $brands = [
            // Saree (1)
            'Sangria' => 1,
            'Biba' => 1,
            'W for Women' => 1,
            'Aurelia' => 1,
            'FabIndia' => 1,

            // Dupatta (2)
            'Soch' => 2,
            'Global Desi' => 2,
            'Rangriti' => 2,
            'Indya' => 2,
            'Jaipur Kurti' => 2,

            // Suit (3)
            'Libas' => 3,
            'Rangmanch' => 3,
            'Anouk' => 3,
            'Melange' => 3,
            'House of Pataudi' => 3,

            // Footwear (4)
            'Bata' => 4,
            'Relaxo' => 4,
            'Sparx' => 4,
            'Metro' => 4,
            'Woodland' => 4,
            'Red Tape' => 4,
        ];

        foreach ($brands as $brand => $categoryId) {
            DB::table('brands')->insert([
                'name' => $brand,
                'category_id' => $categoryId,
                'slug' => Str::slug($brand),
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
    }
}
