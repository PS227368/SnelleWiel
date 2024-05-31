<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::create('orders', function (Blueprint $table) {
            $table->id();
            $table->string('order_number');
            $table->string('order_line_number');
            $table->string('product_name');
            $table->decimal('product_height', 8, 2);
            $table->decimal('product_weight', 8, 2);
            $table->string('customer_name');
            $table->text('customer_address');
            $table->string('customer_city');
            $table->string('customer_postal_code');
            $table->string('customer_phone');
            $table->timestamps();
        });
    }
    

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('orders');
    }
};
