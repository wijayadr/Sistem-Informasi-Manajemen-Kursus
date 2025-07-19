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
        Schema::create('letter_requests', function (Blueprint $table) {
            $table->id();
            $table->string('tracking_number', 20)->unique();
            $table->foreignId('letter_type_id')->constrained('letter_types');
            $table->string('applicant_name', 100);
            $table->string('phone_number', 15)->nullable();
            $table->string('email', 100)->nullable();
            $table->text('purpose')->nullable();
            $table->enum('request_status', ['draft', 'submitted', 'processing', 'completed', 'rejected'])->default('draft');
            $table->text('admin_notes')->nullable();
            $table->timestamp('submitted_at')->default(now());
            $table->timestamp('completed_at')->nullable();
            $table->timestamps();

            $table->index('tracking_number');
            $table->index('request_status');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('letter_requests');
    }
};
