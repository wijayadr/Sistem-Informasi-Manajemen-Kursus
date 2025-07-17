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
        Schema::create('sdgs_goal_progress', function (Blueprint $table) {
            $table->id();
            $table->foreignId('goal_id')->constrained('sdgs_goals')->onDelete('cascade');
            $table->decimal('achievement_value', 5, 2)->default(0); // Nilai 0–100
            $table->text('notes')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('sdgs_goal_progress');
    }
};
