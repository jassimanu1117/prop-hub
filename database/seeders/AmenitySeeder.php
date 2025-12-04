<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Amenity;

class AmenitySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
     public function run()
     {
        $amenities = [
            'Parking',
            'Gym',
            'Wi-Fi',
            'Security',
            'Swimming Pool',
        ];

        foreach ($amenities as $amenity) {
            Amenity::create([
                'name' => $amenity,
                'status' => 'active',
            ]);
        }
     }
}
