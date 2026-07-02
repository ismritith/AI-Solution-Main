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
        Schema::create('blog_posts', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->string('slug')->nullable()->unique();
            $table->string('category');
            $table->integer('reading_time')->default(5);
            $table->timestamp('published_at')->nullable();
            $table->string('author_name')->default('Administrator');
            $table->string('author_role')->nullable();
            $table->text('author_avatar')->nullable();
            $table->text('banner_image')->nullable();
            $table->text('excerpt')->nullable();
            $table->longText('body_content');
            $table->text('blockquote_text')->nullable();
            $table->string('blockquote_source')->nullable();
            $table->json('technical_metrics')->nullable(); // Stores custom metrics (e.g. ROI, Latency)
            $table->string('tags')->nullable(); // Comma-separated or JSON
            $table->string('status')->default('draft'); // 'draft', 'published'
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('blog_posts');
    }
};
