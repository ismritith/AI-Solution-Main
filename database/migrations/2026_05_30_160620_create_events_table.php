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
        Schema::create('events', function (Blueprint $table) {
            $table->id();
            $table->string('category'); // 'summit', 'hackathon', 'webinar'
            $table->string('title');
            $table->string('status_badge')->default('Upcoming'); // 'Registrations Open', 'Upcoming', 'Live Stream', etc.
            $table->text('main_image')->nullable();
            $table->text('description');
            $table->string('location')->nullable();
            $table->string('date_text')->nullable();
            $table->string('capacity')->nullable();
            $table->string('ticket_tier')->nullable();
            $table->string('ticket_price')->nullable();
            $table->text('ticket_inclusions')->nullable();
            $table->json('tracks')->nullable(); // Stores nested tracks
            $table->json('agenda')->nullable(); // Stores nested agenda/schedule slots
            $table->json('speakers')->nullable(); // Stores array of speakers
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('events');
    }
};
