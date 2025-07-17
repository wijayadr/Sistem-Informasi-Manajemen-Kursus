<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateIdmScoresTable extends Migration
{
    public function up()
    {
        Schema::create('idm_scores', function (Blueprint $table) {
            $table->id();
            $table->integer('year');
            $table->decimal('iks', 8, 4)->default(0); // Indeks Sosial (0-1)
            $table->decimal('ike', 8, 4)->default(0); // Indeks Ekonomi (0-1)
            $table->decimal('ikl', 8, 4)->default(0); // Indeks Lingkungan (0-1)
            $table->decimal('idm_score', 8, 4)->default(0); // IDM Score (0-1)
            $table->enum('idm_status', [
                'Sangat Tertinggal',
                'Tertinggal',
                'Berkembang',
                'Maju',
                'Mandiri'
            ]);
            $table->timestamps();

            // Index untuk performa
            $table->index('year');
            $table->index('idm_status');

            // Unique constraint untuk mencegah duplikasi data per desa per tahun
            $table->unique(['year']);
        });
    }

    public function down()
    {
        Schema::dropIfExists('idm_scores');
    }
}
