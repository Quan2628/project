<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('cart_details', function (Blueprint $table) {
            $table->id('cartDetail_id');
            $table->unsignedBigInteger('cart_id');
            $table->unsignedBigInteger('product_id');
            $table->integer('quantity');
            $table->string('size', 5);
            $table->string('color', 30);
            $table->decimal('unit_price', 10, 2);
            $table->decimal('total_price', 10, 2);
            // $table->timestamps();
            $table->foreign('cart_id')->references('cart_id')->on('carts');
            $table->foreign('product_id')->references('product_id')->on('products');
        });
        DB::statement('ALTER TABLE cart_details ADD CONSTRAINT ck_unit_price CHECK (unit_price>=0)');
        DB::statement('ALTER TABLE cart_details ADD CONSTRAINT ck_total_price CHECK (total_price>=0)');
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        DB::statement('ALTER TABLE cart_details DROP CONSTRAINT ck_unit__price');
        DB::statement('ALTER TABLE cart_details DROP CONSTRAINT ck_total__price');
        Schema::dropIfExists('cart_details');
    }
};
