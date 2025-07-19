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
        Schema::create('uploaded_documents', function (Blueprint $table) {
            $table->id();
            $table->foreignId('request_id')->constrained('letter_requests')->onDelete('cascade');
            $table->foreignId('document_type_id')->constrained('document_types');
            $table->string('original_filename');
            $table->string('system_filename');
            $table->string('file_path', 500);
            $table->timestamps();

            $table->unique(['request_id', 'document_type_id'], 'unique_request_document');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('uploaded_documents');
    }
};
