<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Str;

class PropertyCategorySeeder extends Seeder
{

    public function run()
    {
        // --------------------------------------
        // SAFE TRUNCATE (foreign key safe)
        // --------------------------------------
        Schema::disableForeignKeyConstraints();
        DB::table('property_categories')->truncate();
        Schema::enableForeignKeyConstraints();

        // --------------------------------------
        // MAIN PARENT CATEGORIES
        // --------------------------------------
        $mainCategories = [

            // PROPERTY
            ['name' => 'Residential', 'type_group' => 'property'],
            ['name' => 'Commercial',  'type_group' => 'property'],
            ['name' => 'Land / Plot', 'type_group' => 'property'],

            // TO-LET
            ['name' => 'Rooms / PG',  'type_group' => 'tolet'],
        ];

        $mainIds = [];

        // Insert parent categories
        foreach ($mainCategories as $item) {

            $mainIds[$item['name']] = DB::table('property_categories')->insertGetId([
                'parent_id'  => null,
                'type_group' => $item['type_group'],
                'name'       => $item['name'],
                'slug'       => Str::slug($item['name']),
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }

        // --------------------------------------
        // CHILD CATEGORY LISTS
        // --------------------------------------
        $subCategories = [

            'Residential' => [
                'Apartment / Flat',
                'Independent House / Villa',
                'Studio Apartment',
                'Builder Floor',
                'Penthouse',
                'Farmhouse',
                'Serviced Apartment',
            ],

            'Commercial' => [
                'Shop / Showroom',
                'Office Space',
                'Warehouse / Godown',
                'Co-working Space',
                'Industrial Shed',
            ],

            'Land / Plot' => [
                'Residential Plot',
                'Commercial Plot',
                'Farm Land',
            ],

            'Rooms / PG' => [
                'Room (Single)',
                'Room (Shared)',
                'PG / Hostel',
                'Hostel (Men)',
                'Hostel (Women)',
            ],
        ];

        // --------------------------------------
        // INSERT SUBCATEGORIES
        // --------------------------------------
        foreach ($subCategories as $parentName => $children) {

            $parentId    = $mainIds[$parentName];     // Fast fetch
            $typeGroup   = $mainCategories[array_search($parentName, array_column($mainCategories, 'name'))]['type_group'];

            foreach ($children as $child) {

                DB::table('property_categories')->insert([
                    'parent_id'  => $parentId,
                    'type_group' => $typeGroup,
                    'name'       => $child,
                    'slug'       => Str::slug($child),
                    'created_at' => now(),
                    'updated_at' => now(),
                ]);
            }
        }
    }

}
