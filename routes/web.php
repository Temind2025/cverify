<?php

use App\Http\Controllers\CertificateController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('verify-certificate');
})->name('verify.certificate');

Route::post('/verify', [CertificateController::class, 'verify'])->name('certificate.verify');