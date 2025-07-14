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
        Schema::create('education_statistics', function (Blueprint $table) {
            $table->id();
            $table->integer('no_school')->default(0);
            $table->integer('not_finished_primary')->default(0);
            $table->integer('primary_graduate')->default(0);
            $table->integer('junior_secondary')->default(0);
            $table->integer('senior_secondary')->default(0);
            $table->integer('diploma_i_ii')->default(0);
            $table->integer('diploma_iii')->default(0);
            $table->integer('bachelor')->default(0);
            $table->integer('master')->default(0);
            $table->integer('doctorate')->default(0);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('education_statistics');
    }
};
