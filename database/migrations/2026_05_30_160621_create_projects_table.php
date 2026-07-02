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
        Schema::create('projects', function (Blueprint $table) {
            $table->id();
            $table->string('classification'); // 'featured', 'present', 'legacy', 'horizon'
            $table->string('title');
            $table->string('sector');
            $table->text('cover_image')->nullable();
            $table->text('description');
            $table->decimal('rating', 3, 2)->default(5.00);
            $table->string('tech_stack')->nullable();
            $table->string('footer_stat')->nullable(); // e.g. "98.2% Accuracy Rate"
            $table->string('metric1_val')->nullable();
            $table->string('metric1_lbl')->nullable();
            $table->string('metric2_val')->nullable();
            $table->string('metric2_lbl')->nullable();
            $table->string('metric3_val')->nullable();
            $table->string('metric3_lbl')->nullable();
            $table->string('status_badge')->nullable(); // e.g. "In Development"
            $table->string('project_code')->nullable(); // e.g. "Q-STAGGER 1.0"
            $table->string('estimated_date')->nullable(); // e.g. "Est. Q4 2025"
            $table->string('icon')->nullable(); // e.g. "memory"
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('projects');
    }
};
