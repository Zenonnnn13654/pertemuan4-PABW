<?php

namespace App\Http\Controllers;

use App\Models\Laporan;
use Illuminate\Http\Request;

class LaporBanjirController extends Controller
{
    public function form()
    {
        return view('banjir.form');
    }

    public function konfirmasi(Request $request)
    {
        $data = $request->validate([
            'nama' => 'required|string|max:100',
            'lokasi' => 'required|string|max:150',
            'tinggi' => 'required|integer|min:0',
        ]);

        $laporan = Laporan::create([
            'nama_pelapor' => $data['nama'],
            'lokasi' => $data['lokasi'],
            'tinggi_genangan' => $data['tinggi'],
            'tanggal_kejadian' => now()->toDateString(),
        ]);

        return view('banjir.konfirmasi', compact('laporan'));
    }

    public function daftar()
    {
        $laporan = Laporan::all();

        return view('banjir.daftar', compact('laporan'));
    }
}