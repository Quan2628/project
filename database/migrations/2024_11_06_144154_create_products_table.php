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
        Schema::create('products', function (Blueprint $table) {
            $table->id('product_id');
            $table->string('name', 255);
            $table->text('description')->nullable();
            $table->decimal('price', 10, 2);
            $table->string('size', 5);
            $table->string('color', 30);
            $table->integer('stock')->default(0);
            $table->string('image'); //Đường dẫn ảnh sản phẩm
            $table->unsignedBigInteger('category_id');
            $table->timestamps();

            //Thiết lập khoá ngoại
            $table->foreign('category_id')->references('id')->on('categories');
        });
        DB::statement('ALTER TABLE products ADD CONSTRAINT ck_price CHECK (price>=0)');
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        DB::statement('ALTER TABLE products DROP CONSTRAINT ck_price');
        Schema::dropIfExists('products');
    }
};
