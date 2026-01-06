<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\KegiatanController;

Route::get('/', function () {
    return redirect()->route('kegiatan.index');
});

// ===============================
//          ROUTE KEGIATAN
// ===============================
Route::get('/kegiatan', [KegiatanController::class, 'index'])->name('kegiatan.index');
Route::get('/kegiatan/create', [KegiatanController::class, 'create'])->name('kegiatan.create');
Route::post('/kegiatan', [KegiatanController::class, 'store'])->name('kegiatan.store');
Route::get('/kegiatan/{id}/edit', [KegiatanController::class, 'edit'])->name('kegiatan.edit');
Route::put('/kegiatan/{id}', [KegiatanController::class, 'update'])->name('kegiatan.update');
Route::patch('/kegiatan/{id}/inline', [KegiatanController::class, 'inlineUpdate'])->name('kegiatan.inline');
Route::delete('/kegiatan/{id}', [KegiatanController::class, 'destroy'])->name('kegiatan.destroy');
