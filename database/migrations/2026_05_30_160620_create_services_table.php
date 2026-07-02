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
        Schema::create('services', function (Blueprint $table) {
            $table->id();
            $table->string('category'); // 'infrastructure', 'vertical', 'step'
            $table->string('title');
            $table->text('description');
            $table->string('icon')->nullable(); // Google Material Symbol identifier
            $table->string('tags')->nullable(); // Comma-separated or JSON
            $table->string('metric_subtitle')->nullable(); // e.g. "Boost efficiency by 40%"
            $table->string('step_number')->nullable(); // For step category
            $table->boolean('is_featured')->default(false);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('services');
    }
};
