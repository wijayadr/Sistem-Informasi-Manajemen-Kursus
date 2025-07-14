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
        Schema::create('religion_statistics', function (Blueprint $table) {
            $table->id();
            $table->integer('islam')->default(0);
            $table->integer('christian')->default(0);
            $table->integer('catholic')->default(0);
            $table->integer('hindu')->default(0);
            $table->integer('buddhist')->default(0);
            $table->integer('confucian')->default(0);
            $table->integer('others')->default(0);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('religion_statistics');
    }
};
