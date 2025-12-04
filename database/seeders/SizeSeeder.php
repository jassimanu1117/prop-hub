<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Size;

class SizeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $sizes = [
            'men' => ['S', 'M', 'L', 'XL', 'XXL', '3XL'],
            'women' => ['XS', 'S', 'M', 'L', 'XL', 'XXL', 'Free Size']
        ];

        foreach ($sizes as $gender => $list) {
            foreach ($list as $size) {
                Size::firstOrCreate([
                    'name' => $size,
                    'gender' => $gender
                ]);
            }
        }
    }

}
