<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kegiatan extends Model
{
    use HasFactory;

    // Sesuaikan dengan nama kolom di tabel
    protected $fillable = [
        'kegiatan',
        'status',
        'penanggung_jawab',
        'peserta_kegiatan',
        'tanggal_mulai',
        'tanggal_selesai',
        'tempat_kegiatan',
        'notes',
    ];
}
