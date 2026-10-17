@extends('layouts.app')

@section('title', 'Form LaporBanjir')

@section('content')
    <h2>Form Pelaporan Banjir</h2>

    <form action="{{ route('banjir.konfirmasi') }}" method="POST">
        @csrf

        <input type="text" name="nama_pelapor"
               placeholder="Nama pelapor" required>

        <input type="text" name="lokasi"
               placeholder="Lokasi banjir" required>

        <input type="number" name="tinggi_genangan"
               placeholder="Tinggi genangan (cm)"
               min="0" required>

        <label>Tanggal kejadian</label>
        <input type="date" name="tanggal_kejadian" required>

        <button type="submit">Kirim Laporan</button>
    </form>
@endsection