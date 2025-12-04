<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class AccessorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $accessories = [
            [
                'name' => 'Silk Saree Cover',
                'price' => 299.00,
                'status' => 'active',
            ],
            [
                'name' => 'Designer Dupatta Pin',
                'price' => 149.00,
                'status' => 'active',
            ],
            [
                'name' => 'Suit Storage Bag',
                'price' => 199.00,
                'status' => 'inactive',
            ],
            [
                'name' => 'Leather Footwear Polish',
                'price' => 99.00,
                'status' => 'active',
            ],
            [
                'name' => 'Embroidery Thread Kit',
                'price' => 249.00,
                'status' => 'active',
            ],
        ];

        foreach ($accessories as $item) {
            DB::table('accessories')->insert([
                'name'        => $item['name'],
                'slug'        => Str::slug($item['name']),
                'image_path'  => null, // optional image path
                'image_thumb' => null, // optional thumbnail path
                'price'       => $item['price'],
                'status'      => $item['status'],
                'created_at'  => now(),
                'updated_at'  => now(),
            ]);
        }
    }
}
