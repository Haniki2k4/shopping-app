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
        Schema::create('posts', function (Blueprint $table) {
            $table->id(); // Primary key
            $table->string('title', 150);
            $table->foreignId('categoryID')->nullable();
            $table->string('description', 250);
            $table->text('detail');
            $table->integer('position')->default(0); // Vị trí bài viết
            $table->string('seokeyword')->nullable(); 
            $table->string('seodescription')->nullable();
            $table->string('created_by');
            $table->string('modified_by')->nullable();
            $table->enum('post_status', ['draft', 'published', 'archived'])->default('draft'); // Trạng thái bài viết
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('posts');
    }
};
