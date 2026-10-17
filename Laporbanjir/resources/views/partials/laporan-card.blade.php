<div class="laporan-card">
    <h3>{{ $item->nama_pelapor }}</h3>
    <p>Lokasi: {{ $item->lokasi }}</p>
    <p>Tinggi: {{ $item->tinggi_genangan }} cm</p>
    <p>Tanggal: {{ $item->tanggal_kejadian }}</p>

    @if ($item->tinggi_genangan < 30)
        <strong>Waspada</strong>
    @elseif ($item->tinggi_genangan <= 70)
        <strong>Siaga</strong>
    @else
        <strong>Awas</strong>
    @endif
</div>