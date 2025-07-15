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
        Schema::create('statistics', function (Blueprint $table) {
            $table->id();
            $table->string('type'); // e.g. 'religion', 'education', 'marital'
            $table->string('name'); // Display name for the statistic
            $table->year('year')->nullable();
            $table->string('chart_type')->default('bar'); // 'bar', 'pie', 'line', 'doughnut'
            $table->text('description')->nullable();
            $table->boolean('is_active')->default(true);
            $table->timestamps();
        });

        Schema::create('statistic_categories', function (Blueprint $table) {
            $table->id();
            $table->foreignId('statistic_id')->constrained('statistics')->onDelete('cascade');
            $table->string('category'); // e.g. 'Islam', 'Tamat SD'
            $table->integer('value')->default(0);
            $table->string('color')->nullable(); // For chart colors
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('statistic_categories');
        Schema::dropIfExists('statistics');
    }
};
