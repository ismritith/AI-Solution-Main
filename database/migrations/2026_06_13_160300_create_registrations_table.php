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
        Schema::create('registrations', function (Blueprint $table) {
            $table->id();
            $table->string('registration_type');
            $table->string('team_name')->nullable();
            $table->string('full_name')->nullable();
            $table->string('email');
            $table->string('event_name');
            $table->integer('team_size')->nullable();
            $table->string('pass_type')->nullable();
            $table->json('members')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('registrations');
    }
};
