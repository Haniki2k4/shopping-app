<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('categories', function (Blueprint $table) {
            $table->id(); // Primary key
            $table->string('title', 150); // Tiêu đề, giới hạn 150 ký tự
            $table->string('description', 250); // Mô tả, giới hạn 250 ký tự
            $table->string('created_by'); // Người tạo
            $table->string('modified_by')->nullable(); // Người sửa 
            $table->enum('status', ['Active', 'InActive'])->default('Active');
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
