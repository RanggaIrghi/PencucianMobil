@extends('layouts.main')

@section('content')

<div class="flex h-screen w-full font-poppins overflow-hidden bg-[#F9FAFB]"
     x-data="{
        selectedItem: null,
        transactions: {{ Js::from($transaksis) }}, // DATA ASLI DARI DATABASE
        
        formatRupiah(value) {
            return new Intl.NumberFormat('id-ID', { style: 'currency', currency: 'IDR', minimumFractionDigits: 0 }).format(value);
        },
        formatDate(dateString) {
            const date = new Date(dateString);
            // Format: 12/02/2025 08:30
            return date.toLocaleDateString('id-ID', { 
                day: '2-digit', month: '2-digit', year: 'numeric', 
                hour: '2-digit', minute: '2-digit' 
            }).replace(/\./g, ':'); // Ganti pemisah jam titik jadi titik dua (opsional)
        }
     }">

    <div class="hidden lg:flex w-5/12 bg-[#050B18] relative flex-col justify-between p-8">
        <div class="flex items-center gap-3 z-10 ml-4">
            <div class="w-10 h-10 bg-gray-200 rounded-lg flex items-center justify-center">
                <svg class="w-6 h-6 text-gray-500" fill="currentColor" viewBox="0 0 24 24"><path d="M21 19V5c0-1.1-.9-2-2-2H5c-1.1 0-2 .9-2 2v14c0 1.1.9 2 2 2h14c1.1 0 2-.9 2-2zM8.5 13.5l2.5 3.01L14.5 12l4.5 6H5l3.5-4.5z" /></svg>
            </div>
            <h1 class="text-white text-xl font-bold">Pencucian<span class="text-[#4ADE80]">Mobil</span></h1>
        </div>
        <div class="absolute top-24 left-10"><svg width="40" height="40" viewBox="0 0 50 50" fill="none"><path d="M25 0V10M25 40V50M0 25H10M40 25H50M7 7L14 14M36 36L43 43M7 43L14 36M36 14L43 7" stroke="#FACC15" stroke-width="3" stroke-linecap="round" /></svg></div>
        <div class="absolute top-32 right-12 opacity-80"><svg width="80" height="80" viewBox="0 0 100 100" fill="none"><path d="M20 80 C 20 50, 80 50, 80 20 M 70 20 L 80 10 L 90 20" stroke="#14B8A6" stroke-width="2" fill="none" /></svg></div>
        <div class="absolute bottom-40 right-20 w-32"><svg viewBox="0 0 100 20" fill="none" stroke="white" stroke-width="2"><path d="M0 10 Q 50 20, 100 0" /></svg></div>
        <div class="relative z-10 flex justify-center items-center flex-1">
            <div class="bg-white p-4 rounded-sm w-64 h-48 flex items-center justify-center shadow-lg">
                <svg class="w-20 h-20 text-gray-300" fill="currentColor" viewBox="0 0 24 24"><path d="M21 19V5c0-1.1-.9-2-2-2H5c-1.1 0-2 .9-2 2v14c0 1.1.9 2 2 2h14c1.1 0 2-.9 2-2zM8.5 13.5l2.5 3.01L14.5 12l4.5 6H5l3.5-4.5z" /></svg>
            </div>
        </div>
        <div class="z-10 mt-4">
            <h2 class="text-3xl font-bold text-white leading-tight">Selamat datang Di website<br>Pencucian <span class="text-[#4ADE80]">Mobil</span></h2>
        </div>
    </div>

    <div class="w-full lg:w-7/12 flex flex-col h-full relative overflow-y-auto">

        <div class="px-8 py-6 flex justify-end items-center gap-6 lg:gap-10 text-sm font-medium text-[#4ADE80]">
            <a href="/" class="{{ request()->is('/') ? 'text-gray-900 border-b-2 border-gray-900 pb-1 font-semibold' : 'hover:text-gray-900 transition' }}">Pesanan</a>
            <a href="{{ route('keranjang') }}" class="{{ request()->routeIs('keranjang') ? 'text-gray-900 border-b-2 border-gray-900 pb-1 font-semibold' : 'hover:text-gray-900 transition' }}">Keranjang</a>
            <a href="#" class="">Toko</a>
            <a href="" class="">FAQ</a>
            <button class="bg-[#4ADE80] text-white px-3 py-1 rounded-md flex items-center gap-1 shadow hover:bg-green-400 transition text-xs font-bold">
                EN <svg class="w-3 h-3" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path></svg>
            </button>
        </div>

        <div class="flex-1 flex flex-col px-8 lg:px-16 pt-4 pb-8">

            <div class="flex justify-center items-center gap-4 mb-8 text-sm font-medium">
                <span class="text-red-500 font-bold">Queue</span>
                <div class="h-1 w-12 bg-[#6EE7B7] rounded-full"></div>
                <span class="text-gray-900">Washing</span>
                <div class="h-1 w-12 bg-gray-200 rounded-full"></div>
                <span class="text-gray-500">Finish</span>
            </div>

            <h3 class="font-bold text-gray-700 mb-4 text-lg">Daftar Transaksi</h3>
            
            @if(count($transaksis) == 0)
                <div class="text-center py-10 bg-gray-50 rounded-2xl border border-gray-100">
                    <p class="text-gray-500 mb-4">Belum ada pesanan.</p>
                    <a href="/" class="text-[#4ADE80] font-bold hover:underline">Buat Pesanan Baru</a>
                </div>
            @else
                
                <div class="w-full rounded-2xl p-2 bg-white shadow-sm border border-gray-100 mb-6 max-h-[400px] overflow-y-auto">
                    <template x-for="item in transactions" :key="item.id">
                        <div @click="selectedItem = item"
                             class="cursor-pointer flex items-center justify-between border-b border-gray-100 p-4 last:border-0 hover:bg-gray-50 transition rounded-xl"
                             :class="selectedItem === item ? 'bg-green-50 border-green-200' : ''">
                            
                            <div class="flex items-center gap-4">
                                <div class="w-10 h-10 rounded-md shrink-0 flex items-center justify-center text-white font-bold text-xs uppercase"
                                     :class="item.status === 'Queue' ? 'bg-red-400' : (item.status === 'Washing' ? 'bg-[#6EE7B7]' : 'bg-blue-400')">
                                    <span x-text="item.status.substring(0, 1)"></span>
                                </div>
                                
                                <div>
                                    <div class="font-bold text-gray-800 text-sm" x-text="item.no_invoice"></div>
                                    <div class="text-xs text-gray-500" x-text="formatDate(item.created_at)"></div>
                                </div>
                            </div>

                            <div class="hidden sm:block text-sm">
                                <div class="font-medium text-gray-800" x-text="item.kendaraan.pelanggan.nama"></div>
                            </div>
                            <div class="hidden sm:block text-sm">
                                <div class="font-bold text-gray-900" x-text="item.kendaraan.no_polisi"></div>
                            </div>

                            <div class="text-xs font-bold uppercase tracking-wide px-2 py-1 rounded-md"
                                 :class="item.status === 'Queue' ? 'text-red-500 bg-red-50' : (item.status === 'Washing' ? 'text-green-600 bg-green-50' : 'text-blue-600 bg-blue-50')"
                                 x-text="item.status">
                            </div>

                            <button class="text-[#6EE7B7] hover:underline font-medium text-xs lg:text-sm">
                                Detail
                            </button>
                        </div>
                    </template>
                </div>
            @endif


            <div x-show="selectedItem" 
                 x-transition:enter="transition ease-out duration-300"
                 x-transition:enter-start="opacity-0 translate-y-4"
                 x-transition:enter-end="opacity-100 translate-y-0"
                 class="w-full bg-white border border-gray-200 rounded-2xl shadow-lg p-6 relative">
                
                <button @click="selectedItem = null" class="absolute top-4 right-4 text-gray-400 hover:text-red-500 transition">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path></svg>
                </button>

                <h3 class="font-bold text-gray-800 text-lg mb-6 text-center">Struk Pembayaran</h3>

                <div class="flex flex-col lg:flex-row gap-8">
                    
                    <div class="flex-1 space-y-4 text-sm">
                        <div class="flex justify-between border-b border-gray-100 pb-2">
                            <span class="text-gray-500">No. Invoice</span>
                            <span class="font-bold text-gray-800" x-text="selectedItem.no_invoice"></span>
                        </div>
                        <div class="flex justify-between border-b border-gray-100 pb-2">
                            <span class="text-gray-500">Tanggal Transaksi</span>
                            <span class="font-bold text-gray-800" x-text="formatDate(selectedItem.created_at)"></span>
                        </div>
                         <div class="flex justify-between border-b border-gray-100 pb-2">
                            <span class="text-gray-500">Tanggal Booking</span>
                            <span class="font-bold text-gray-800" x-text="formatDate(selectedItem.tanggal_booking)"></span>
                        </div>
                        <div class="flex justify-between border-b border-gray-100 pb-2">
                            <span class="text-gray-500">Nama Pelanggan</span>
                            <span class="font-bold text-gray-800" x-text="selectedItem.kendaraan.pelanggan.nama"></span>
                        </div>
                        <div class="flex justify-between border-b border-gray-100 pb-2">
                            <span class="text-gray-500">Kendaraan</span>
                            <span class="font-bold text-gray-800" x-text="selectedItem.kendaraan.no_polisi + ' (' + selectedItem.kendaraan.tipe_kendaraan + ')'"></span>
                        </div>
                         <div class="flex justify-between border-b border-gray-100 pb-2">
                            <span class="text-gray-500">Metode Bayar</span>
                            <span class="font-bold text-gray-800 uppercase" x-text="selectedItem.metode_pembayaran"></span>
                        </div>
                    </div>

                    <div class="flex-1 bg-gray-50 rounded-xl p-4 flex flex-col justify-between">
                        <div>
                            <p class="text-xs text-gray-500 mb-1">Layanan</p>
                            <p class="font-bold text-gray-800 text-lg mb-4" x-text="selectedItem.layanan.nama_layanan"></p>
                            
                            <p class="text-xs text-gray-500 mb-1">Status Saat Ini</p>
                            <span class="inline-block px-3 py-1 rounded-full text-xs font-bold text-white mb-4 uppercase"
                                  :class="selectedItem.status === 'Queue' ? 'bg-red-400' : (selectedItem.status === 'Washing' ? 'bg-[#6EE7B7]' : 'bg-blue-400')"
                                  x-text="selectedItem.status">
                            </span>
                        </div>

                        <div class="border-t border-gray-200 pt-4 mt-2">
                            <div class="flex justify-between items-center">
                                <span class="text-gray-600 font-medium">Total Bayar</span>
                                <span class="text-2xl font-bold text-[#4ADE80]" x-text="formatRupiah(selectedItem.total_harga)"></span>
                            </div>
                        </div>
                    </div>

                </div>

                <div class="mt-6 text-center">
                    <p class="text-xs text-gray-400">Terima kasih telah mencuci kendaraan Anda di sini.</p>
                    <button class="mt-4 text-sm text-[#4ADE80] font-bold hover:underline flex items-center justify-center gap-1 mx-auto">
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16v1a3 3 0 003 3h10a3 3 0 003-3v-1m-4-4l-4 4m0 0l-4-4m4 4V4"></path></svg>
                        Download PDF
                    </button>
                </div>

            </div>

            <div class="mt-8 text-center" x-show="!selectedItem">
                <a href="{{ url('/') }}" class="inline-block bg-[#6EE7B7] hover:bg-[#4ADE80] text-teal-900 font-medium px-10 py-3 rounded-full shadow-md transition transform hover:-translate-y-1 text-center">
                    Kembali ke Menu Utama
                </a>
            </div>

        </div>
    </div>
</div>
@endsection