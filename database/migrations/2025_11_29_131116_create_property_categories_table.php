<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePropertyCategoriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('property_categories', function (Blueprint $table) {
            $table->id();

            /**
             * Parent-Child Category Structure
             * --------------------------------
             * parent_id = NULL → Main Group
             * Example:
             *   Residential (parent_id = NULL)
             *      → Apartment / Flat (parent_id = Residential.id)
             */
            $table->unsignedBigInteger('parent_id')->nullable()->index();

            /**
             * Category Type Group
             * ---------------------
             * property = Sale/Rent/Lease listings (Residential, Commercial, Land)
             * tolet    = Rooms, PG, Hostel, Shared Living
             */
            $table->enum('type_group', ['property', 'tolet'])->index();

            /**
             * Basic Category Information
             */
            $table->string('name')->index();
            $table->string('slug')->unique();

            /**
             * Optional description for SEO / future use
             */
            $table->text('description')->nullable();

             $table->string('image_path')->nullable();       // Main image path
            $table->string('image_thumb')->nullable();      

            /**
             * Active/Inactive category
             * (Soft visibility control)
             */
            $table->enum('status', ['active', 'inactive'])->default('active');

            $table->timestamps();

            /**
             * Foreign key for parent-child structure
             */
            $table->foreign('parent_id')
                  ->references('id')
                  ->on('property_categories')
                  ->onDelete('cascade')   // If parent is deleted → delete children
                  ->onUpdate('cascade');  // If parent ID changes → update children
        });
    }


    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('property_categories');
    }
}
