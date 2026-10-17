<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ReservationController extends Controller
{
    public function index(Request $request)
    {
        $reservasiList = $request->session()->get('reservasiList', []);
        
        return view('pages.reservasi', compact('reservasiList'));
    }

    public function proses(Request $request)
    {
        $dataBaru = [
            'nama' => $request->input('nama'),
            'plat_nomor' => $request->input('plat_nomor'),
            'jenis_kendaraan' => $request->input('jenis_kendaraan'),
            'durasi' => $request->input('durasi')
        ];

        $request->session()->push('reservasiList', $dataBaru);

        return redirect()->route('reservasi.form');
    }

    public function reset(Request $request)
    {
        $request->session()->forget('reservasiList');
        
        return redirect()->route('reservasi.form');
    }
}