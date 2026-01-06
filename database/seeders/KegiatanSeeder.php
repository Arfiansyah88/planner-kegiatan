<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Kegiatan;

class KegiatanSeeder extends Seeder
{
    public function run(): void
    {
        Kegiatan::insert([
            [
                'kegiatan' => 'Rapat Kerja Tahunan',
                'status' => 'rencana',
                'peserta_kegiatan' => 'Pengurus Inti',
                'tanggal_mulai' => '2026-01-10',
                'tanggal_selesai' => '2026-01-11',
                'tempat_kegiatan' => 'Aula Sekolah',
                'notes' => 'Pembahasan program kerja 1 tahun',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'kegiatan' => 'Pelatihan Kepemimpinan',
                'status' => 'berjalan',
                'peserta_kegiatan' => 'Anggota OSIS',
                'tanggal_mulai' => '2026-03-05',
                'tanggal_selesai' => '2026-03-07',
                'tempat_kegiatan' => 'Gedung Serbaguna',
                'notes' => 'Wajib hadir',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'kegiatan' => 'Evaluasi Akhir Tahun',
                'status' => 'selesai',
                'peserta_kegiatan' => 'Seluruh Panitia',
                'tanggal_mulai' => '2026-12-20',
                'tanggal_selesai' => '2026-12-20',
                'tempat_kegiatan' => 'Ruang Rapat',
                'notes' => 'Laporan pertanggungjawaban',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}
