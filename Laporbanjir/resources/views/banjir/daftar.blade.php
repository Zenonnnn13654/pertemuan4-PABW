@extends('layouts.app')

@section('title', 'Daftar Laporan Banjir')

@section('content')
    <h2>Daftar Laporan Banjir</h2>

    @forelse ($laporan as $item)
        @include('partials.laporan-card', ['item' => $item])
    @empty
        <p>Belum ada laporan banjir.</p>
    @endforelse
@endsection