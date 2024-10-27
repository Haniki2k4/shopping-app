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
        Schema::create('category', function (Blueprint $table) {
            $table->id(); // Primary key
            $table->string('title', 150); // Tiêu đề, giới hạn 150 ký tự
            $table->string('description', 250); // Mô tả, giới hạn 250 ký tự
            $table->string('seokeyword')->nullable(); // Từ khóa chuẩn SEO 
            $table->string('seodescription')->nullable(); // Mô tả chuẩn SEO 
            $table->string('created_by'); // Người tạo
            $table->string('modified_by')->nullable(); // Người sửa 
            $table->timestamps(); 
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('category');
    }
};
