@extends('layouts.app')

@section('title', 'Konfirmasi Laporan')

@section('content')
    <x-alert
        type="success"
        message="Laporan berhasil disimpan ke database!"
    />

    <h2>Detail Laporan</h2>

    <p>Nama: {{ $laporan->nama_pelapor }}</p>
    <p>Lokasi: {{ $laporan->lokasi }}</p>
    <p>Tinggi: {{ $laporan->tinggi_genangan }} cm</p>
    <p>Tanggal: {{ $laporan->tanggal_kejadian }}</p>

    <a href="{{ route('banjir.daftar') }}">
        Lihat Daftar Laporan
    </a>
@endsection