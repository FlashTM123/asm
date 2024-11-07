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
        Schema::create('product', function (Blueprint $table) {
            $table->id();
            $table->string('product_name');
            $table->decimal('price', 8, 2); // Bạn nên chỉ định độ chính xác cho decimal
            $table->string('description');
            $table->string('image');
            $table->decimal('height', 10, 2);
            $table->integer('watering_time_per_day');
            $table->enum('status', ['active', 'inactive'])->default('active');

            // Thêm cột category_id trước khi thêm khóa ngoại
            $table->unsignedBigInteger('category_id'); // Thêm cột category_id

            // Định nghĩa khóa ngoại
            $table->foreign('category_id')->references('id')->on('category')->onDelete('cascade');

            $table->timestamps();
        });
    }


    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('product');
    }
};
