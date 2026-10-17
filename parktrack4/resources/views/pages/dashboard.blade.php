@extends('layouts.parktrack')

@section('title', 'Dashboard ParkTrack')

@section('content')
    <h2>Dashboard ParkTrack</h2>

    @php
        $zona = [
            ['nama' => 'Zona A', 'terisi' => 15, 'kapasitas' => 20],
            ['nama' => 'Zona B', 'terisi' => 20, 'kapasitas' => 20],
            ['nama' => 'Zona C', 'terisi' => 10, 'kapasitas' => 25],
        ];
    @endphp

    @foreach ($zona as $item)
        <div class="card">
            <h3>{{ $item['nama'] }}</h3>

            <p>Terisi: {{ $item['terisi'] }} kendaraan</p>

            @if ($item['terisi'] >= $item['kapasitas'])
                <p>Parkiran penuh.</p>
            @else
                <p>
                    Tersedia:
                    {{ $item['kapasitas'] - $item['terisi'] }}
                    tempat parkir.
                </p>
            @endif
        </div>
    @endforeach
@endsection