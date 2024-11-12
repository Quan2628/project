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
        Schema::create('comments', function (Blueprint $table) {
            $table->id('comment_id');
            $table->foreignId('product_id')->constrained('products');  // Khóa ngoại tới bảng products
            $table->foreignId('user_id')->constrained('users');  // Khóa ngoại tới bảng users
            $table->text('comment');  // Nội dung bình luận
            $table->unsignedBigInteger('parent_id')->nullable(); // ID bình luận cha
            $table->foreign('parent_id')->references('comment_id')->on('comments');
            // $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('comments');
    }
};
