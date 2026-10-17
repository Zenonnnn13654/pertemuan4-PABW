<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ViolationController extends Controller
{
    public function index()
    {
        // Contoh data pelanggaran aktif
        $violation = [
            'plate_number' => 'D 1234 ABC',
            'type' => 'Parkir Melebihi Batas Waktu',
            'description' => 'Kendaraan parkir melebihi waktu yang ditentukan.',
            'amount' => 50000,
            'status' => 'unpaid',
            'severity' => 'Sedang',
            'captured_at' => now()->format('d-m-Y H:i'),
            'image_path' => 'assets/images/parkir-cctv.jpg',
        ];

        // Contoh riwayat pelanggaran
        $allViolations = [
            $violation,
            [
                'plate_number' => 'D 1234 ABC',
                'type' => 'Parkir di Zona Terlarang',
                'description' => 'Kendaraan berada di zona terlarang.',
                'amount' => 100000,
                'status' => 'paid',
                'severity' => 'Tinggi',
                'captured_at' => now()->subDays(2)->format('d-m-Y H:i'),
                'image_path' => 'assets/images/parkir-cctv.jpg',
            ],
        ];

        return view('pages.denda', compact(
            'violation',
            'allViolations'
        ));
    }

    public function pay(Request $request)
    {
        // Simulasi pembayaran tanpa database
        return redirect()
            ->route('denda')
            ->with('flash', [
                'type' => 'success',
                'msg' => 'Simulasi pembayaran berhasil. Belum ada transaksi nyata.',
            ]);
    }
}
