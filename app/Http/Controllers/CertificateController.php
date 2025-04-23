<?php

namespace App\Http\Controllers;

use App\Models\Certificate;
use Illuminate\Http\Request;

class CertificateController extends Controller
{
    public function verify(Request $request)
    {
        $request->validate([
            'code' => 'required|string|exists:certificates,code',
        ]);

        $certificate = Certificate::where('code', $request->code)->first();

        if ($certificate && $certificate->is_verified && $certificate->validity_date >= now()) {
            return view('verify-certificate', [
                'certificate' => $certificate,
                'success' => true,
            ]);
        }

        return view('verify-certificate', [
            'certificate' => $certificate,
            'error' => $certificate ? 'Certificate is invalid or expired.' : 'Certificate not found.',
        ]);
    }
}