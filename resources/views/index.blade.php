@extends('layouts.main')

@section('content')

<div x-data="{ 
    step: 1, 
    layanan: 'Cuci Interior', 
    harga: '10.000',
    paymentMethod: 'ewallet', 
    wallet: 'dana', 
    form: {
        nama: '',
        alamat: '',
        telepon: '',
        nopol: '',
        tipe: '',
        warna: ''
    },
    getDate() {
        const today = new Date();
        const dd = String(today.getDate()).padStart(2, '0');
        const mm = String(today.getMonth() + 1).padStart(2, '0');
        const yyyy = today.getFullYear();
        return dd + '/' + mm + '/' + yyyy;
    }
}" class="flex h-screen w-full font-poppins overflow-hidden bg-[#F9FAFB]">
    
    <div class="hidden lg:flex w-5/12 bg-[#050B18] relative flex-col justify-between p-8">
        <div class="flex items-center gap-3 z-10 ml-4">
            <div class="w-10 h-10 bg-gray-200 rounded-lg flex items-center justify-center">
                <svg class="w-6 h-6 text-gray-500" fill="currentColor" viewBox="0 0 24 24"><path d="M21 19V5c0-1.1-.9-2-2-2H5c-1.1 0-2 .9-2 2v14c0 1.1.9 2 2 2h14c1.1 0 2-.9 2-2zM8.5 13.5l2.5 3.01L14.5 12l4.5 6H5l3.5-4.5z"/></svg>
            </div>
            <h1 class="text-white text-xl font-bold">Pencucian<span class="text-[#4ADE80]">Mobil</span></h1>
        </div>

        <div class="absolute top-24 left-10"><svg width="40" height="40" viewBox="0 0 50 50" fill="none"><path d="M25 0V10M25 40V50M0 25H10M40 25H50M7 7L14 14M36 36L43 43M7 43L14 36M36 14L43 7" stroke="#FACC15" stroke-width="3" stroke-linecap="round"/></svg></div>
        <div class="absolute top-32 right-12 opacity-80"><svg width="80" height="80" viewBox="0 0 100 100" fill="none"><path d="M20 80 C 20 50, 80 50, 80 20 M 70 20 L 80 10 L 90 20" stroke="#14B8A6" stroke-width="2" fill="none" /></svg></div>
        <div class="absolute bottom-40 right-20 w-32"><svg viewBox="0 0 100 20" fill="none" stroke="white" stroke-width="2"><path d="M0 10 Q 50 20, 100 0" /></svg></div>

        <div class="relative z-10 flex justify-center items-center flex-1">
            <div class="bg-white p-4 rounded-sm w-64 h-48 flex items-center justify-center shadow-lg">
                <svg class="w-20 h-20 text-gray-300" fill="currentColor" viewBox="0 0 24 24"><path d="M21 19V5c0-1.1-.9-2-2-2H5c-1.1 0-2 .9-2 2v14c0 1.1.9 2 2 2h14c1.1 0 2-.9 2-2zM8.5 13.5l2.5 3.01L14.5 12l4.5 6H5l3.5-4.5z"/></svg>
            </div>
        </div>

        <div class="z-10 mt-4">
            <h2 class="text-3xl font-bold text-white leading-tight">Selamat datang Di website<br>Pencucian <span class="text-[#4ADE80]">Mobil</span></h2>
        </div>
    </div>

    <form class="w-full lg:w-7/12 flex flex-col justify-between h-full relative" action="" method="POST">
        @csrf
        
        <div class="px-8 py-6 flex justify-end items-center gap-6 lg:gap-10 text-sm font-medium text-[#4ADE80]">
            <a href="/" class="text-gray-900 border-b-2 border-gray-900 pb-1 font-semibold">Pesanan</a>
            <a href="{{ route('keranjang') }}" class="hover:text-gray-900 transition">Keranjang</a>
            <a href="#" class="hover:text-gray-900 transition">Toko</a>
            <a href="#" class="hover:text-gray-900 transition">FAQ</a>
            <button type="button" class="bg-[#4ADE80] text-white px-3 py-1 rounded-md flex items-center gap-1 shadow hover:bg-green-400 transition text-xs font-bold">
                EN <svg class="w-3 h-3" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path></svg>
            </button>
        </div>

        <div class="flex-1 flex flex-col justify-center px-8 lg:px-16 pb-4">
            
            <div class="mb-4">
                <button type="button" @click="if(step > 1) step--" class="text-gray-800 hover:text-gray-600 transition p-2 -ml-2 hover:bg-gray-100 rounded-full">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"></path></svg>
                </button>
            </div>

            <div class="bg-white rounded-3xl p-6 lg:p-8 shadow-sm w-full border border-gray-100 min-h-[460px]">
                
                <div x-show="step === 1" x-transition:enter="transition ease-out duration-300">
                    <h2 class="text-xl font-bold text-gray-700 mb-4">Data Pelanggan</h2>
                    <h3 class="text-xs font-bold text-gray-900 mb-4 uppercase tracking-wide">Customer Overview</h3>
                    <div class="flex flex-col gap-4">
                        <div>
                            <label class="block text-xs font-semibold text-gray-700 mb-2">Nama</label>
                            <input type="text" x-model="form.nama" name="nama" class="w-full bg-gray-50 text-gray-800 rounded-xl p-3 text-sm outline-none focus:ring-2 focus:ring-[#4ADE80] transition" placeholder="Masukkan nama...">
                        </div>
                        <div>
                            <label class="block text-xs font-semibold text-gray-700 mb-2">Alamat</label>
                            <input type="text" x-model="form.alamat" name="alamat" class="w-full bg-gray-50 text-gray-800 rounded-xl p-3 text-sm outline-none focus:ring-2 focus:ring-[#4ADE80] transition" placeholder="Alamat lengkap...">
                        </div>
                        <div>
                            <label class="block text-xs font-semibold text-gray-700 mb-2">No telp</label>
                            <div class="flex gap-3">
                                <div class="bg-gray-50 rounded-xl px-3 flex items-center justify-between gap-2 w-20 cursor-pointer hover:bg-gray-100 transition">
                                    <div class="w-5 h-5 rounded-full bg-gray-200 border border-gray-300"></div> 
                                    <svg class="w-3 h-3 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path></svg>
                                </div>
                                <input type="text" x-model="form.telepon" name="telepon" placeholder="+62" class="w-full bg-gray-50 text-gray-800 rounded-xl p-3 text-sm outline-none focus:ring-2 focus:ring-[#4ADE80] transition">
                            </div>
                        </div>
                    </div>
                </div>

                <div x-show="step === 2" style="display: none;" x-transition:enter="transition ease-out duration-300">
                    <h2 class="text-xl font-bold text-gray-700 mb-4">Data Kendaraan</h2>
                    <div class="h-6"></div> 
                    <div class="flex flex-col gap-4">
                        <div>
                            <label class="block text-xs font-semibold text-gray-700 mb-2">Nomor polisi</label>
                            <input type="text" x-model="form.nopol" name="nopol" placeholder="D 128 GF" class="w-full bg-gray-50 text-gray-800 rounded-xl p-3 text-sm outline-none focus:ring-2 focus:ring-[#4ADE80] transition">
                        </div>
                        <div>
                            <label class="block text-xs font-semibold text-gray-700 mb-2">Tipe kendaraan</label>
                            <input type="text" x-model="form.tipe" name="tipe_mobil" placeholder="Suv" class="w-full bg-gray-50 text-gray-800 rounded-xl p-3 text-sm outline-none focus:ring-2 focus:ring-[#4ADE80] transition">
                        </div>
                        <div>
                            <label class="block text-xs font-semibold text-gray-700 mb-2">Warna</label>
                            <input type="text" x-model="form.warna" name="warna" placeholder="Hitam" class="w-full bg-gray-50 text-gray-800 rounded-xl p-3 text-sm outline-none focus:ring-2 focus:ring-[#4ADE80] transition">
                        </div>
                    </div>
                </div>

                <div x-show="step === 3" style="display: none;" x-transition:enter="transition ease-out duration-300">
                    <h2 class="text-xl font-bold text-gray-700 mb-6">Pilihan Layanan Cuci Mobil</h2>
                    <div class="flex flex-col gap-5">
                        <label class="cursor-pointer group flex items-start gap-4">
                            <input type="radio" name="layanan" value="Cuci Interior" class="hidden" @click="layanan = 'Cuci Interior'; harga = '10.000'">
                            <div :class="layanan === 'Cuci Interior' ? 'bg-[#6EE7B7] border-[#6EE7B7]' : 'bg-transparent border-gray-400'" class="w-24 py-3 rounded-xl border text-center transition-colors duration-300 shrink-0">
                                <span class="font-bold text-gray-800">10.000</span>
                            </div>
                            <div>
                                <h4 class="font-bold text-sm text-gray-900 mb-1">Cuci Interior</h4>
                                <p class="text-xs text-gray-500 leading-relaxed">Membersihkan bagian dalam mobil: vacuum, dashboard, doortrim.</p>
                            </div>
                        </label>
                        <label class="cursor-pointer group flex items-start gap-4">
                            <input type="radio" name="layanan" value="Cuci Lengkap" class="hidden" @click="layanan = 'Cuci Lengkap'; harga = '20.000'">
                            <div :class="layanan === 'Cuci Lengkap' ? 'bg-[#6EE7B7] border-[#6EE7B7]' : 'bg-transparent border-gray-400'" class="w-24 py-3 rounded-xl border text-center transition-colors duration-300 shrink-0">
                                <span class="font-bold text-gray-800">20.000</span>
                            </div>
                            <div>
                                <h4 class="font-bold text-sm text-gray-900 mb-1">Cuci Lengkap</h4>
                                <p class="text-xs text-gray-500 leading-relaxed">Pembersihan menyeluruh luar dan dalam mobil.</p>
                            </div>
                        </label>
                        <label class="cursor-pointer group flex items-start gap-4">
                            <input type="radio" name="layanan" value="Premium Detailing" class="hidden" @click="layanan = 'Premium Detailing'; harga = '30.000'">
                            <div :class="layanan === 'Premium Detailing' ? 'bg-[#6EE7B7] border-[#6EE7B7]' : 'bg-transparent border-gray-400'" class="w-24 py-3 rounded-xl border text-center transition-colors duration-300 shrink-0">
                                <span class="font-bold text-gray-800">30.000</span>
                            </div>
                            <div>
                                <h4 class="font-bold text-sm text-gray-900 mb-1">Premium Detailing</h4>
                                <p class="text-xs text-gray-500 leading-relaxed">Termasuk cuci lengkap + waxing dan polishing ringan.</p>
                            </div>
                        </label>
                    </div>
                </div>

                <div x-show="step === 4" style="display: none;" x-transition:enter="transition ease-out duration-300">
                    <h2 class="text-xl font-bold text-gray-700 mb-4">Detail Pemesanan</h2>
                    <div class="flex flex-col gap-4 overflow-y-auto max-h-[320px] pr-2">
                        <div>
                            <label class="block text-xs font-semibold text-gray-700 mb-2">Nama</label>
                            <input type="text" :value="form.nama" readonly class="w-full bg-gray-50 text-gray-900 font-medium rounded-xl p-3 text-sm outline-none">
                        </div>
                        <div>
                            <label class="block text-xs font-semibold text-gray-700 mb-2">Nomor Polisi</label>
                            <input type="text" :value="form.nopol" readonly class="w-full bg-gray-50 text-gray-900 font-medium rounded-xl p-3 text-sm outline-none">
                        </div>
                        <div>
                            <label class="block text-xs font-semibold text-gray-700 mb-2">Layanan Cuci Mobil</label>
                            <input type="text" :value="layanan" readonly class="w-full bg-gray-50 text-gray-900 font-medium rounded-xl p-3 text-sm outline-none">
                        </div>
                        <div>
                            <label class="block text-xs font-semibold text-gray-700 mb-2">Total pembayaran</label>
                            <input type="text" :value="'Rp ' + harga + '.00'" readonly class="w-full bg-gray-50 text-gray-900 font-medium rounded-xl p-3 text-sm outline-none">
                        </div>
                    </div>
                </div>

                <div x-show="step === 5" style="display: none;" x-transition:enter="transition ease-out duration-300">
                    
                    <div class="flex flex-col lg:flex-row gap-8 h-full">
                        
                        <div class="w-full lg:w-7/12">
                            <h2 class="text-lg font-bold text-gray-700 mb-4">Metode Pembayaran</h2>
                            
                            <div class="relative mb-6">
                                <select x-model="paymentMethod" name="metode_pembayaran" class="w-full bg-gray-50 border border-gray-200 text-gray-800 rounded-xl p-4 appearance-none outline-none focus:ring-2 focus:ring-[#4ADE80]">
                                    <option value="ewallet">E-Wallet</option>
                                    <option value="transfer">Transfer Bank</option>
                                    <option value="cash">Cash / Tunai</option>
                                </select>
                                <div class="absolute inset-y-0 right-0 flex items-center px-4 pointer-events-none">
                                    <svg class="w-4 h-4 text-gray-500" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path></svg>
                                </div>
                            </div>

                            <div class="flex gap-4 mb-8 items-center" x-show="paymentMethod === 'ewallet'">
                                
                                <img src="{{ asset('img/dana.png') }}" 
                                     @click="wallet = 'dana'"
                                     :class="wallet === 'dana' ? 'border-2 border-[#4ADE80] ring-2 ring-green-100' : 'border border-gray-200'"
                                     class="h-10 w-16 object-contain bg-white rounded-lg p-1 cursor-pointer transition-all duration-200 hover:shadow-md" 
                                     alt="Dana">

                                <img src="{{ asset('img/qris.png') }}" 
                                     @click="wallet = 'qris'"
                                     :class="wallet === 'qris' ? 'border-2 border-[#4ADE80] ring-2 ring-green-100' : 'border border-gray-200'"
                                     class="h-10 w-16 object-contain bg-white rounded-lg p-1 cursor-pointer transition-all duration-200 hover:shadow-md" 
                                     alt="QRIS">

                                <img src="{{ asset('img/gopay.png') }}" 
                                     @click="wallet = 'gopay'"
                                     :class="wallet === 'gopay' ? 'border-2 border-[#4ADE80] ring-2 ring-green-100' : 'border border-gray-200'"
                                     class="h-10 w-16 object-contain bg-white rounded-lg p-1 cursor-pointer transition-all duration-200 hover:shadow-md" 
                                     alt="Gopay">

                            </div>

                            <div class="flex justify-center items-center p-4 bg-white" x-show="paymentMethod === 'ewallet'">
                                <div class="text-center">
                                    <img src="https://api.qrserver.com/v1/create-qr-code/?size=150x150&data=BayarPakaiWalletIni" alt="QR Code" class="w-40 h-40 border-4 border-black rounded-lg mx-auto">
                                    <p class="text-xs text-gray-500 mt-2">Scan untuk membayar via <span class="font-bold uppercase" x-text="wallet"></span></p>
                                </div>
                            </div>

                             <div x-show="paymentMethod === 'transfer'" class="p-4 bg-gray-50 rounded-xl text-sm text-gray-600">
                                <p class="font-bold">BCA: 123-456-7890</p>
                                <p>A.N Pencucian Mobil</p>
                            </div>
                        </div>

                        <div class="w-full lg:w-5/12 border-l border-gray-100 pl-0 lg:pl-6">
                            <h3 class="text-sm font-bold text-gray-500 mb-4">Detail Pemesanan</h3>
                            <div class="space-y-4 text-sm">
                                <div><p class="text-xs text-gray-500">Nama</p><p class="font-medium text-gray-800" x-text="form.nama"></p></div>
                                <div><p class="text-xs text-gray-500">Nomor Polisi</p><p class="font-medium text-gray-800" x-text="form.nopol"></p></div>
                                <div><p class="text-xs text-gray-500">Layanan Cuci Mobil</p><p class="font-medium text-gray-800" x-text="layanan"></p></div>
                                <div><p class="text-xs text-gray-500">Tanggal (otomatis)</p><p class="font-medium text-gray-800" x-text="getDate()"></p></div>
                                <div><p class="text-xs text-gray-500">Tipe pemesanan</p><p class="font-medium text-gray-800">Online</p></div>
                                <div class="pt-4 border-t border-gray-100">
                                    <p class="text-xs text-gray-500">Total</p>
                                    <p class="font-bold text-red-500 text-lg" x-text="'Rp ' + harga + '.00'"></p>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
     
            </div>
            
            <div class="mt-8">
                <button type="button" x-show="step === 1" @click="step = 2" class="w-1/2 bg-[#6EE7B7] hover:bg-[#4ADE80] text-teal-900 font-bold py-3.5 rounded-xl shadow-[0_10px_20px_-10px_rgba(110,231,183,1)] transition transform hover:-translate-y-1">Selanjutnya</button>
                <button type="button" x-show="step === 2" @click="step = 3" class="w-1/2 bg-[#6EE7B7] hover:bg-[#4ADE80] text-teal-900 font-bold py-3.5 rounded-xl shadow-[0_10px_20px_-10px_rgba(110,231,183,1)] transition transform hover:-translate-y-1">Selanjutnya</button>
                <button type="button" x-show="step === 3" @click="step = 4" class="w-1/2 bg-[#6EE7B7] hover:bg-[#4ADE80] text-teal-900 font-bold py-3.5 rounded-xl shadow-[0_10px_20px_-10px_rgba(110,231,183,1)] transition transform hover:-translate-y-1">Selanjutnya</button>
                <button type="button" x-show="step === 4" @click="step = 5" class="w-1/2 bg-[#6EE7B7] hover:bg-[#4ADE80] text-teal-900 font-bold py-3.5 rounded-xl shadow-[0_10px_20px_-10px_rgba(110,231,183,1)] transition transform hover:-translate-y-1">Bayar</button>
                <button type="submit" x-show="step === 5" class="w-1/2 bg-[#6EE7B7] hover:bg-[#4ADE80] text-teal-900 font-bold py-3.5 rounded-xl shadow-[0_10px_20px_-10px_rgba(110,231,183,1)] transition transform hover:-translate-y-1">Selesai & Kirim</button>
            </div>
        </div>
        
        <div class="h-6"></div> 
    </form>
</div>
@endsection