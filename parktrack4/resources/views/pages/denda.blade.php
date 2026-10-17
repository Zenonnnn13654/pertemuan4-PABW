@php
    $flash = session('flash');
@endphp

<div class="w-full max-w-[1200px] bg-container rounded-3xl shadow-glow p-8 min-h-[800px] flex flex-col relative border border-white/10 z-10">

    @include('layouts.navbar')

    <main>
        {{-- Flash Message --}}
        @if ($flash)
            <div class="mb-5 px-4 py-3 rounded-xl text-sm font-semibold
                {{ ($flash['type'] ?? '') === 'success'
                    ? 'bg-green-500/20 text-green-400 border border-green-500/30'
                    : 'bg-danger/20 text-danger border border-danger/30' }}">

                <i class="fa-solid {{ ($flash['type'] ?? '') === 'success'
                    ? 'fa-circle-check'
                    : 'fa-triangle-exclamation' }}"></i>

                {{ $flash['msg'] ?? '' }}
            </div>
        @endif

        {{-- Judul --}}
        <div class="flex flex-col sm:flex-row justify-between items-center mb-5 gap-4">
            <h2 class="text-2xl font-semibold text-danger mb-0 flex items-center gap-2">
                <i class="fa-solid fa-triangle-exclamation"></i>
                PELANGGARAN AKTIF
            </h2>

            @if (!empty($allViolations))
                <button onclick="toggleHistoryModal()"
                    class="btn-outline text-sm w-full sm:w-auto">
                    RIWAYAT PELANGGARAN ({{ count($allViolations) }})
                </button>
            @endif
        </div>

        {{-- Pelanggaran Aktif --}}
        @if ($violation)

            <div class="bg-card rounded-2xl p-6 border border-danger shadow-[0_4px_20px_rgba(255,59,59,0.15)]">

                <div class="grid grid-cols-1 lg:grid-cols-[2fr_1fr] gap-6 mb-8">

                    {{-- Bukti CCTV --}}
                    <div class="h-[250px] bg-app rounded-xl border border-dashed border-danger flex flex-col items-center justify-center text-danger overflow-hidden relative">

                        <img
                            src="{{ asset($violation['image_path'] ?? 'assets/images/parkir-cctv.jpg') }}"
                            alt="Bukti Pelanggaran"
                            class="w-full h-full object-cover">

                        <div class="absolute bottom-0 left-0 w-full bg-black/70 p-2 text-center text-xs text-white border-t border-danger/30">
                            <i class="fa-solid fa-camera"></i>
                            Captured by CCTV —
                            {{ $violation['captured_at'] ?? '' }}
                        </div>
                    </div>

                    {{-- Informasi Denda --}}
                    <div class="flex flex-col justify-center">

                        <h3 class="text-danger text-xl font-bold mb-4">
                            Jenis: {{ $violation['type'] ?? '' }}
                        </h3>

                        <p class="text-slate-400 mb-4 leading-relaxed">
                            {{ $violation['description'] ?? '' }}
                        </p>

                        <div class="mb-3 flex items-center gap-2 flex-wrap">

                            <span class="text-xs px-2 py-0.5 rounded-full border
                                {{ ($violation['severity'] ?? '') === 'Tinggi'
                                    ? 'bg-danger/20 text-danger border-danger/30'
                                    : (($violation['severity'] ?? '') === 'Sedang'
                                        ? 'bg-yellow-500/20 text-yellow-400 border-yellow-500/30'
                                        : 'bg-green-500/20 text-green-400 border-green-500/30') }}">

                                Keparahan: {{ $violation['severity'] ?? '' }}
                            </span>

                            <span class="text-xs px-2 py-0.5 rounded-full border bg-red-500/20 text-red-400 border-red-500/30">
                                BELUM DIBAYAR
                            </span>
                        </div>

                        {{-- Metode Pembayaran --}}
                        <div class="mt-3">
                            <label class="block mb-2 text-sm text-white">
                                Pilih Metode Pembayaran Denda
                            </label>

                            <select class="input-field" id="dendaMethod"
                                onchange="handleDendaMethod(this.value)">

                                <option value="Wallet Balance" selected>
                                    Wallet Balance (Otomatis Potong Saldo)
                                </option>

                                <option value="QRIS">QRIS</option>

                                <option value="Virtual Account">
                                    Virtual Account Bank
                                </option>

                                <option value="Minimarket">Minimarket</option>
                            </select>
                        </div>

                        {{-- QRIS --}}
                        <div id="dendaQrisPreview"
                            class="mt-3 hidden justify-center">

                            <img
                                src="{{ asset('assets/images/qris.png') }}"
                                alt="QRIS"
                                class="max-w-[180px] w-full rounded-xl border border-white/10 bg-white p-2 shadow-card">
                        </div>
                    </div>
                </div>

                <hr class="border-t border-danger/20 mb-6 relative z-10">

                {{-- Total Denda dan Pembayaran --}}
                <div class="flex flex-col md:flex-row justify-between items-center gap-4 relative z-20">

                    <div>
                        <div class="text-slate-400 mb-1">
                            TOTAL TAGIHAN DENDA
                        </div>

                        <div class="text-4xl font-bold text-danger">
                            Rp {{ number_format($violation['amount'] ?? 0, 0, ',', '.') }}
                        </div>
                    </div>

                    <div class="w-full md:w-[300px] relative z-50">

                        <form
                            action="{{ route('parktrack.denda.bayar') }}"
                            method="POST"
                            onsubmit="return confirm('Bayar denda ini menggunakan saldo Wallet Anda?');">

                            @csrf

                            <button type="submit"
                                class="w-full py-3.5 px-6 rounded-xl font-bold bg-danger/10 text-danger border border-danger hover:bg-danger hover:text-white transition-all cursor-pointer">

                                <i class="fa-solid fa-wallet"></i>
                                BAYAR SEKARANG
                            </button>
                        </form>
                    </div>
                </div>
            </div>

        @else

            {{-- Tidak Ada Denda --}}
            <div class="bg-card rounded-2xl p-10 border border-white/10 shadow-card text-center">

                <i class="fa-solid fa-shield-check text-6xl text-green-400 mb-4"></i>

                <h3 class="text-xl font-semibold text-green-400">
                    Tidak Ada Pelanggaran Aktif
                </h3>

                <p class="text-slate-500 mt-2">
                    Anda tidak memiliki pelanggaran yang belum dibayar.
                    Terus patuhi peraturan parkir!
                </p>
            </div>

        @endif
    </main>
</div>

{{-- Modal Riwayat Pelanggaran --}}
<div class="fixed inset-0 z-[9999] hidden items-center justify-center bg-black/80 backdrop-blur-sm"
    id="violationHistoryModal">

    <div class="bg-card w-full max-w-[560px] p-8 rounded-2xl border border-primary shadow-[0_0_30px_rgba(0,224,255,0.3)] relative mx-4">

        <button
            class="absolute top-4 right-4 text-slate-400 hover:text-white"
            onclick="toggleHistoryModal()">

            <i class="fa-solid fa-xmark"></i>
        </button>

        <h3 class="mb-1 text-primary text-xl font-bold">
            Riwayat Pelanggaran
        </h3>

        <p class="text-slate-400 text-xs mb-6">
            Semua catatan pelanggaran Anda.
        </p>

        <div class="max-h-[400px] overflow-y-auto text-left pr-2">

            @forelse ($allViolations as $item)

                <div class="flex items-start gap-4 p-4 border-b border-white/10 hover:bg-white/5 transition-colors rounded-lg">

                    <div class="w-10 h-10 flex-shrink-0 bg-danger/10 rounded-full flex items-center justify-center text-danger border border-danger/20">
                        <i class="fa-solid fa-ban"></i>
                    </div>

                    <div class="flex-1">

                        <div class="flex justify-between flex-wrap gap-1">

                            <span class="font-semibold text-white">
                                {{ $item['type'] }}
                            </span>

                            <span class="text-danger font-bold">
                                Rp {{ number_format($item['amount'], 0, ',', '.') }}
                            </span>
                        </div>

                        <div class="text-slate-400 text-xs mt-1 mb-1">
                            {{ $item['captured_at'] }}
                        </div>

                        <div class="flex gap-2 flex-wrap">

                            <span class="text-[10px] px-2 py-0.5 rounded border
                                {{ $item['severity'] === 'Tinggi'
                                    ? 'bg-danger/20 text-danger border-danger/30'
                                    : ($item['severity'] === 'Sedang'
                                        ? 'bg-yellow-500/20 text-yellow-400 border-yellow-500/30'
                                        : 'bg-green-500/20 text-green-400 border-green-500/30') }}">

                                {{ $item['severity'] }}
                            </span>

                            <span class="text-[10px] px-2 py-0.5 rounded border
                                {{ $item['status'] === 'paid'
                                    ? 'bg-green-500/20 text-green-400 border-green-500/30'
                                    : 'bg-red-500/20 text-red-400 border-red-500/30' }}">

                                {{ strtoupper($item['status']) }}
                            </span>
                        </div>
                    </div>
                </div>

            @empty

                <p class="text-slate-500 text-center py-6">
                    Tidak ada riwayat pelanggaran.
                </p>

            @endforelse
        </div>

        <button class="btn-primary mt-6"
            onclick="toggleHistoryModal()">
            Tutup
        </button>
    </div>
</div>

{{-- JavaScript --}}
<script>
    function toggleHistoryModal() {
        const modal = document.getElementById('violationHistoryModal');
        modal.classList.toggle('hidden');
        modal.classList.toggle('flex');
    }

    function handleDendaMethod(val) {
        const qris = document.getElementById('dendaQrisPreview');

        if (val === 'QRIS') {
            qris.classList.remove('hidden');
            qris.classList.add('flex');
        } else {
            qris.classList.add('hidden');
            qris.classList.remove('flex');
        }
    }
</script>
```