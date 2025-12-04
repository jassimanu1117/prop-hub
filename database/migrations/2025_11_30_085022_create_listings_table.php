<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateListingsTable extends Migration
{
    public function up()
    {
        Schema::create('listings', function (Blueprint $table) {
            $table->id();

            // User reference
            $table->unsignedBigInteger('user_id')->nullable()->index();

            // Main grouping (property or tolet)
            $table->string('property_group')->index(); // property / tolet

            // Listing purpose
            $table->enum('listing_for', ['sale', 'rent'])->default('rent')->index(); // sale / rent

            // Basic details
            $table->string('title');
            $table->string('slug')->unique();
            $table->text('short_description')->nullable();
            $table->longText('description')->nullable();

            // Pricing
            $table->decimal('price', 14, 2)->nullable();
            $table->enum('price_type', ['monthly','one-time','negotiable'])->default('monthly');

            // Category id
            $table->unsignedBigInteger('category_id')->nullable()->index();

            // Physical attributes
            $table->unsignedSmallInteger('beds')->nullable();
            $table->unsignedSmallInteger('baths')->nullable();
            $table->unsignedInteger('area')->nullable();
            $table->string('area_unit')->default('sqft');

            // Flags
            $table->boolean('is_furnished')->default(false);
            $table->boolean('is_ready_to_move')->default(false);
            $table->boolean('is_verified')->default(false);
            $table->boolean('is_popular ')->default(false);
            $table->boolean('is_featured')->default(false);
            $table->boolean('is_hot')->default(false);

            // Owner / contact
            $table->string('owner_name')->nullable();
            $table->string('owner_mobile')->nullable();
            $table->string('contact_whatsapp')->nullable();

            // Address
            $table->string('address')->nullable();
            $table->string('city')->nullable()->index();
            $table->string('state')->nullable();
            $table->string('pincode')->nullable();

            // Geo
            $table->decimal('lat', 10, 7)->nullable();
            $table->decimal('lng', 10, 7)->nullable();

            // Image thumbnails (JSON)
            $table->json('thumbs')->nullable();

            // Status
            $table->enum('status', ['draft','pending','active','inactive','sold'])
                  ->default('pending')->index();

            $table->date('available_from')->nullable();

            $table->timestamps();

            // FK
            $table->foreign('user_id')->references('id')->on('users')->onDelete('set null');
        });
    }

    public function down()
    {
        Schema::dropIfExists('listings');
    }
}
