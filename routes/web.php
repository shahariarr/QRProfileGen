<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\QRCodeController;





Route::get('/dashboard', [QRCodeController::class, 'dashboard'])->name('dashboard')->middleware('auth');
Route::post('generate-qr-code', [QRCodeController::class, 'generate'])->middleware('auth');
Route::get('qr-code-result/{id}', [QRCodeController::class, 'qrCodeResult'])->name('qr-code-result')->middleware('auth');
Route::get('qr-code-edit/{id}', [QRCodeController::class, 'edit'])->name('qr-code-edit')->middleware('auth');
Route::put('update-qr-code/{id}', [QRCodeController::class, 'update'])->name('update-qr-code')->middleware('auth');

Auth::routes();
Route::redirect('/','login');

//abc

//xyz


