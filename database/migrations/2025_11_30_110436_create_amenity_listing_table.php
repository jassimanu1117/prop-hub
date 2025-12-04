<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAmenityListingTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('amenity_listing', function (Blueprint $table) {
            $table->id();
            // Foreign keys
            $table->foreignId('listing_id')
                  ->constrained()
                  ->onDelete('cascade');

            $table->foreignId('amenity_id')
                  ->constrained()
                  ->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('amenity_listing');
    }
}
