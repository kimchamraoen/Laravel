<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('payments', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('order_id')->unsigned();
            $table->string('payment_method');
            $table->double('total_payment');
            $table->bigInteger('customer_id')->unsigned(); // Fixed Typo
            $table->timestamp('payment_date')->nullable();
            $table->timestamps();

            # Foreign Key
            $table->foreign('order_id')->references('id')->on('orders')->onDelete('cascade');
            $table->foreign('customer_id')->references('id')->on('customers')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('payments');
    }
};
