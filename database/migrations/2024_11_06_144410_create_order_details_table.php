<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('order_details', function (Blueprint $table) {
            $table->id('orderDetail_id');
            $table->unsignedBigInteger('order_id');
            $table->unsignedBigInteger('product_id');
            $table->integer('quantity');
            $table->decimal('unit_price', 10, 2);
            $table->decimal('total_price', 10, 2);
            // $table->timestamps();

            $table->foreign('order_id')->references('order_id')->on('orders');
            $table->foreign('product_id')->references('product_id')->on('products');
        });
        DB::statement('ALTER TABLE order_details ADD CONSTRAINT ck_unit_price CHECK (unit_price>=0)');
        DB::statement('ALTER TABLE order_details ADD CONSTRAINT ck_total_price CHECK (total_price>=0)');
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        DB::statement('ALTER TABLE order_details DROP CONSTRAINT ck_unit_price');
        DB::statement('ALTER TABLE order_details DROP CONSTRAINT ck_total_price');
        Schema::dropIfExists('order_details');
    }
};
