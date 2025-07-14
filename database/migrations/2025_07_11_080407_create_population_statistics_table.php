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
        Schema::create('population_statistics', function (Blueprint $table) {
            $table->id();
            $table->integer('total_population')->default(0);
            $table->integer('head_of_family')->default(0);
            $table->integer('male')->default(0);
            $table->integer('female')->default(0);
            $table->integer('temporary_residents')->default(0);
            $table->integer('population_mutation')->default(0);
            $table->integer('unmarried')->default(0);
            $table->integer('married')->default(0);
            $table->integer('divorced_alive')->default(0);
            $table->integer('divorced_dead')->default(0);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('population_statistics');
    }
};
