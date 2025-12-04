<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class BadgeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    /**
     * Run the database seeds.
     *
     * This will insert some default badges
     * which can be used for listings (property/tolet/common).
     */
    public function run()
    {
        // --------------------------------------
        // SAFE TRUNCATE (Foreign key safe)
        // --------------------------------------
        DB::statement('SET FOREIGN_KEY_CHECKS=0;');
        DB::table('badges')->truncate();
        DB::statement('SET FOREIGN_KEY_CHECKS=1;');

        // --------------------------------------
        // Default badges (You can add/remove more)
        // --------------------------------------
        $badges = [
            [
                'name'        => 'Featured',
                'slug'        => 'featured',
                'color_class' => 'success',  // Green badge
                'for_type'    => 'common',   // Visible everywhere
                'status'      => 'active',
            ],
            [
                'name'        => 'Verified',
                'slug'        => 'verified',
                'color_class' => 'primary',  // Blue badge
                'for_type'    => 'property',
                'status'      => 'active',
            ],
            [
                'name'        => 'Urgent',
                'slug'        => 'urgent',
                'color_class' => 'danger',   // Red badge
                'for_type'    => 'common',
                'status'      => 'active',
            ],
            [
                'name'        => 'Top Pick',
                'slug'        => 'top-pick',
                'color_class' => 'warning',  // Yellow badge
                'for_type'    => 'tolet',
                'status'      => 'active',
            ],
        ];

        // Insert all badges
        DB::table('badges')->insert($badges);
    }
}
