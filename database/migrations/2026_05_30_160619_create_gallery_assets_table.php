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
        Schema::create('gallery_assets', function (Blueprint $table) {
            $table->id();
            $table->string('category');
            $table->string('media_type')->default('image'); // 'image', 'video'
            $table->string('upload_method')->default('upload'); // 'upload', 'link'
            $table->string('file_path')->nullable();
            $table->text('external_url')->nullable();
            $table->string('title');
            $table->text('description')->nullable();
            $table->boolean('is_featured')->default(false);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('gallery_assets');
    }
};
