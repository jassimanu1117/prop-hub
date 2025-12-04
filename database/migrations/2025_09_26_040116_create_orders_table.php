<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOrdersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('orders', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id')->nullable(); // If logged in
            $table->string('guest_id')->nullable();            // For guest users
            $table->string('name');
            $table->string('phone');
            $table->text('address');
            $table->decimal('subtotal', 10, 2);
            $table->decimal('total', 10, 2);
            $table->string('transaction_id')->nullable();      // UPI / QR payment reference
            $table->enum('status', [
                'pending',      // Order placed but not processed
                'processing',   // Packing or preparing
                'shipped',      // Out for delivery
                'delivered',    // Customer received
                'completed',    // Fully completed
                'cancelled',    // Cancelled by customer/admin
                'returned'      // Returned by customer
            ])->default('pending');

            $table->enum('payment_status', [
                'pending',      // Payment not done yet
                'paid',         // Payment completed
                'failed',       // Payment failed
                'refunded'      // Refund issued
            ])->default('pending');

            $table->enum('payment_method', [
                'cod',
                'upi',
                'card',
                'netbanking',
                'wallet',
                'stripe'
            ])->default('cod');

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
        Schema::dropIfExists('orders');
    }
}
