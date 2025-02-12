<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ChartController;
use App\Http\Controllers\InventoryController;

// root
Route::get('/', function () {
    return view('welcome');
});

// Chart
Route::get('/inventories/chart', [ChartController::class, 'index'])->name('inventory.chart');

// Scanner
Route::get('/inventories/scanner', function () {
    return view('inventory.scanner');
});

// CRUD
Route::get('/inventories', [InventoryController::class, 'index'])->name('inventory.index');
Route::get('/inventories/create', [InventoryController::class, 'create'])->name('inventory.create');
Route::post('/inventories/add', [InventoryController::class, 'store'])->name('inventory.store');
Route::get('/inventories/{inventory}/edit', [InventoryController::class, 'edit']);
Route::put('/inventories/{inventory}/update', [InventoryController::class, 'update'])->name('inventory.update');
Route::delete('/inventories/{inventory}/destroy', [InventoryController::class, 'destroy'])->name('inventory.destroy');
Route::get('/inventories/{serial_number}', [InventoryController::class, 'show'])->name('inventory.show');

// PDF
Route::get('/inventory/{serial_number}/qr-pdf', [InventoryController::class, 'viewQrPdf'])->name('inventory.qr-pdf');
