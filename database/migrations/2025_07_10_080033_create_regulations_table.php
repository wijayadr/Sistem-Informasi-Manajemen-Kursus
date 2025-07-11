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
        Schema::create('regulations', function (Blueprint $table) {
            $table->id();
            $table->foreignId('regulation_category_id')->constrained('regulation_categories')->onDelete('cascade');
            $table->string('title')->comment('Judul Peraturan');
            $table->enum('document_type', ['file', 'url']);
            $table->text('document_value')->comment('Isi Dokumen Peraturan');
            $table->text('description')->nullable()->comment('Deskripsi Peraturan');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('regulations');
    }
};
