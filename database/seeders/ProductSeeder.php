<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Product;
use Illuminate\Support\Str;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

    // NOTE: Using true/false in seeder is intentional.
    // -------------------------------------------------
    // ✔ Readability: true/false is easier to understand than 1/0.
    // ✔ Laravel Casting: Product model automatically converts
    //   boolean columns into true/false (because MySQL boolean = tinyint 1).
    // ✔ Database Storage: Even if we write true/false,
    //   MySQL ALWAYS stores them internally as 1 or 0.
    // ✔ No performance difference: true → 1, false → 0 during insert.
    // ✔ Cleaner code: Improves clarity when reading seeders.

        $products = [
            [
                'name'        => 'Saree',
                'description' => 'A traditional Indian drape worn by women, crafted in various fabrics like silk, chiffon, georgette, and cotton. Elegant and suitable for festive, casual, and formal occasions.',
                'price'       => 1499.00,
                'category_id' => 1,  // change as per your DB
                'brand_id'    => 1,  // change if needed
                'gender'      => 'women',
                'is_trending'     => true,
                'is_new_arrival'  => false,
                'status'      => 'active',
            ],

            [
                'name'        => 'Dupatta',
                'description' => 'A long, graceful scarf worn with ethnic outfits like suits and lehengas. Made from materials such as chiffon, net, georgette, and silk.',
                'price'       => 399.00,
                'category_id' => 2,
                'brand_id'    => 1,
                'gender'      => 'women',
                'is_trending'     => false,
                'is_new_arrival'  => true,
                'status'      => 'active',
            ],

            [
                'name'        => 'Suit',
                'description' => 'A comfortable and stylish ethnic outfit consisting of kurta, salwar or pants, and dupatta. Great for daily wear, office, and festive occasions.',
                'price'       => 999.00,
                'category_id' => 3,
                'brand_id'    => 2,
                'gender'      => 'women',
                'is_trending'     => true,
                'is_new_arrival'  => true,
                'status'      => 'active',
            ],

            [
                'name'        => 'Footwear',
                'description' => 'Comfortable and fashionable footwear including flats, heels, juttis, sneakers, and ethnic styles for all occasions.',
                'price'       => 799.00,
                'category_id' => 4,
                'brand_id'    => 3,
                'gender'      => 'women',
                'is_trending'     => false,
                'is_new_arrival'  => false,
                'status'      => 'active',
            ],
        ];

     
        foreach ($products as $data) {
            Product::create([
                'name'        => $data['name'],
                'description' => $data['description'],
                'price'       => $data['price'],
                'category_id' => $data['category_id'],
                'brand_id'    => $data['brand_id'],
                'gender'      => $data['gender'],
                'slug'        => Str::slug($data['name']),
                'is_trending'     => $data['is_trending'],
                'is_new_arrival'  => $data['is_new_arrival'],
                'status'      => $data['status'],
            ]);
        }


    }
}
