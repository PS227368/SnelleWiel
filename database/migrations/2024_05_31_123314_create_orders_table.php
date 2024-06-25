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
            $table->decimal('product_height_cm', 8, 2);
            $table->integer('product_weight_g');
            $table->string('customer_name');
            $table->string('customer_address');
            $table->string('customer_city');
            $table->string('customer_postal_code');
            $table->string('customer_phone');
            $table->string('status');
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
