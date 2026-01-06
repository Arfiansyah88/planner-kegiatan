<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('kegiatans', function (Blueprint $table) {
            $table->id();
            $table->string('kegiatan'); // Nama kegiatan
            $table->enum('status', ['Not Started', 'In Progress', 'Blocked', 'Completed'])
                ->default('Not Started'); // Status kegiatan
            $table->string('penanggung_jawab'); // Penanggung jawab
            $table->string('peserta_kegiatan')->nullable(); // Peserta (opsional)
            $table->date('tanggal_mulai')->nullable(); // Tanggal mulai (opsional)
            $table->date('tanggal_selesai')->nullable(); // Tanggal selesai (opsional)
            $table->string('tempat_kegiatan')->nullable(); // Tempat kegiatan (opsional)
            $table->text('notes')->nullable(); // Catatan tambahan (opsional)
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('kegiatans');
    }
};
