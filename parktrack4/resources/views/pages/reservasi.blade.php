<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ParkTrack - Reservasi Slot</title>
    
    <!-- Memanggil Tailwind CSS -->
    <script src="https://cdn.tailwindcss.com"></script>
    
    <!-- Memanggil FontAwesome untuk Ikon Kendaraan & Dompet -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    
    <!-- Style Custom bawaan dari kodemu -->
    <style>
        body { background-color: #0f172a; color: #f8fafc; display: flex; justify-content: center; padding: 2rem 1rem; font-family: sans-serif; }
        .bg-container { background-color: #1e293b; }
        .bg-card { background-color: #334155; }
        .input-field { width: 100%; padding: 0.75rem 1rem; border-radius: 0.5rem; background-color: #0f172a; border: 1px solid rgba(255,255,255,0.1); color: white; margin-top: 0.5rem; }
        .input-field:focus { outline: none; border-color: #3b82f6; }
        .btn-primary { width: 100%; background-color: #3b82f6; color: white; padding: 1rem; border-radius: 0.5rem; font-weight: bold; margin-top: 1rem; transition: 0.3s; }
        .btn-primary:hover { background-color: #2563eb; }
        .text-primary { color: #3b82f6; }
        .shadow-glow { box-shadow: 0 0 30px rgba(59, 130, 246, 0.1); }
    </style>
</head>
<body>

    <div class="w-full max-w-[1200px] bg-container rounded-3xl shadow-glow p-8 min-h-[800px] flex flex-col relative border border-white/10">
        
        <!-- Navbar Sederhana (Tailwind Style) -->
        <nav class="flex justify-between items-center mb-8 pb-4 border-b border-white/10">
            <div>
                <h3 class="text-2xl text-primary font-bold">ParkTrack</h3>
                <small class="text-slate-400">Sistem Manajemen Parkir Cerdas</small>
            </div>
            <div class="flex gap-4">
                <a href="/" class="text-slate-300 hover:text-white transition">Dashboard</a>
                <a href="/reservasi" class="text-primary font-semibold">Reservasi</a>
            </div>
        </nav>

        <main>
            <h2 class="text-2xl font-semibold mb-6">Reservasi Slot</h2>
            <form method="POST" action="/reservasi/proses" class="grid grid-cols-1 lg:grid-cols-[2fr_1fr] gap-6">
                @csrf
                
                <div class="bg-card rounded-2xl p-6 border border-white/10 shadow-card">
                    <h3 class="text-xl font-semibold mb-6">Booking Details</h3>
                    <div class="mb-5">
                        <label class="block text-sm text-slate-400">Pilih Lokasi dan Tarif Parkir</label>
                        <select name="area_id" class="input-field">
                            <option value="1">Area A - Reguler Rp 2.000/jam</option>
                            <option value="2">Area B - Reguler Rp 2.000/jam</option>
                        </select>
                        <input type="hidden" name="parking_type" value="Reguler">
                    </div>
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-5 mb-5">
                        <div>
                            <label class="block text-sm text-slate-400">Nama Pengemudi</label>
                            <input name="driver_name" type="text" class="input-field" value="{{ session('user.name', 'Aislop') }}" required>
                        </div>
                        <div>
                            <label class="block text-sm text-slate-400">Nomor HP WhatsApp</label>
                            <input name="phone" type="text" class="input-field" placeholder="+62 8xx xxxx xxxx" required>
                        </div>
                    </div>
                    <div class="mb-5">
                        <label class="block text-sm text-slate-400">Plat Nomor Kendaraan</label>
                        <input name="plate_number" type="text" class="input-field" placeholder="Contoh: B 1234 XX" required>
                    </div>
                    <div class="mb-5">
                        <label class="block mb-4 text-sm text-slate-400">Jenis Kendaraan</label>
                        <div class="flex gap-5 flex-wrap">
                            <label class="flex items-center gap-3 cursor-pointer bg-[#0f172a] py-2.5 px-5 rounded-full border border-white/10 hover:border-blue-500 transition-all">
                                <input type="radio" name="vehicle_type" value="Mobil" checked class="accent-blue-500 w-4 h-4"> 
                                <i class="fa-solid fa-car"></i> Mobil
                            </label>
                            <label class="flex items-center gap-3 cursor-pointer bg-[#0f172a] py-2.5 px-5 rounded-full border border-white/10 hover:border-blue-500 transition-all">
                                <input type="radio" name="vehicle_type" value="Motor" class="accent-blue-500 w-4 h-4"> 
                                <i class="fa-solid fa-motorcycle"></i> Motor
                            </label>
                        </div>
                    </div>
                    <div class="mt-5 pt-5 border-t border-white/10 mb-5">
                        <label class="block text-sm text-slate-400"><i class="fa-solid fa-wallet"></i> Metode Pembayaran</label>
                        <select name="payment_method" class="input-field">
                            <option value="QRIS">QRIS</option>
                            <option value="Transfer Bank">Transfer Bank</option>
                        </select>
                    </div>
                </div>
                
                <div class="bg-card rounded-2xl p-6 border border-white/10 shadow-card flex flex-col justify-between">
                    <div>
                        <h3 class="text-xl font-semibold mb-6">Payment Summary</h3>
                        <p class="text-slate-400 mb-5 text-sm">Biaya reservasi awal menjamin slot parkir Anda tersedia saat kedatangan.</p>
                        <div class="flex justify-between mb-4"><span class="text-slate-400">Booking Fee</span><span>Rp 2.000</span></div>
                        <div class="flex justify-between mb-4"><span class="text-slate-400">Deposit 1 Jam Pertama</span><span>Rp 2.000</span></div>
                        <hr class="border-t border-white/10 my-5">
                        <div class="flex justify-between mb-4 text-xl font-semibold"><span>TOTAL BAYAR</span><span class="text-primary">Rp 4.000</span></div>
                    </div>
                    <button type="submit" class="btn-primary">BAYAR SEKARANG</button>
                </div>
            </form>
        </main>
    </div>

</body>
</html>