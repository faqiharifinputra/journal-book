<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\JurnalKegiatanController;

// ⛔ Ganti resource '/' jadi 'jurnal'
Route::resource('jurnal', JurnalKegiatanController::class)->except(['show']);

// ✅ Tambahkan ini supaya root URL langsung tampil data
Route::get('/', [JurnalKegiatanController::class, 'index'])->name('home');

Route::get('jurnal/export/excel', [JurnalKegiatanController::class, 'exportExcel'])->name('jurnal.export.excel');
Route::get('jurnal/export/pdf', [JurnalKegiatanController::class, 'exportPDF'])->name('jurnal.export.pdf');
Route::get('jurnal/live-search', [JurnalKegiatanController::class, 'liveSearch'])->name('jurnal.liveSearch');
Route::get('jurnal/print', [JurnalKegiatanController::class, 'print'])->name('jurnal.print');
