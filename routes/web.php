<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\QRCodeController;

Route::get('/', [QRCodeController::class, 'index']);
Route::post('generate-qr-code', [QRCodeController::class, 'generate']);
Route::get('qr-code-result/{id}', [QRCodeController::class, 'qrCodeResult'])->name('qr-code-result');
