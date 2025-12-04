<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBrandsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('brands', function (Blueprint $table) {
            $table->id();
            $table->string('name'); // Brand name
            $table->string('slug')->unique();
            $table->foreignId('category_id') // Link to categories
                  ->constrained('categories')
                  ->onDelete('cascade');
            $table->string('logo')->nullable();        // Main brand logo path
            $table->string('logo_thumb')->nullable();  // Thumbnail logo path
            $table->text('description')->nullable();
            $table->enum('status', ['active', 'inactive'])->default('active');
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
        Schema::dropIfExists('brands');
    }
}
