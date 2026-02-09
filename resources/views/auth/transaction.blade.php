@extends('layouts.main')

@section('content')

<div class="flex min-h-screen bg-[#F9FAFB] font-poppins">
    
    @include('partials.sidebar')

    <div class="flex-1 lg:ml-64 p-8">
        
        <div class="flex justify-between items-center mb-8">
            <div>
                <h1 class="text-2xl font-bold text-gray-800">Hi, Syabil</h1>
                <p class="text-xs text-gray-500">Let's check your store today</p>
            </div>
             <div class="flex items-center gap-6">
                <div class="flex items-center gap-3 pl-4 border-l border-gray-200">
                    <div class="w-10 h-10 bg-gray-300 rounded-xl overflow-hidden">
                        <svg class="w-full h-full text-gray-500 bg-gray-200" fill="currentColor" viewBox="0 0 24 24"><path d="M24 20.993V24H0v-2.996A14.977 14.977 0 0112.004 15c4.904 0 9.26 2.354 11.996 5.993zM16.002 8.999a4 4 0 11-8 0 4 4 0 018 0z" /></svg>
                    </div>
                    <div class="text-sm">
                        <p class="font-bold text-gray-800">Syabil</p>
                        <p class="text-xs text-gray-500">Admin</p>
                    </div>
                </div>
            </div>
        </div>

        <form action="{{ route('admin.transaksi.store') }}" method="POST" novalidate
              x-data="{ 
                  step: 1,
                  form: {
                      nama: '',
                      alamat: '',
                      telepon: '',
                      nopol: '',
                      tipe: '',
                      warna: '',
                      layanan_nama: '-',
                      layanan_harga: 0,
                      tambahan: 'Tidak ada',
                      metode_bayar: 'Cash'
                  },
                  // Object untuk menyimpan status error
                  errors: {
                      nama: false,
                      alamat: false,
                      telepon: false,
                      nopol: false,
                      tipe: false,
                      warna: false,
                      layanan: false
                  },
                  invoiceNo: '#INV' + Math.floor(Math.random() * 1000000000),
                  
                  // --- FUNGSI VALIDASI MANUAL ---
                  validateForm() {
                      let isValid = true;
                      
                      // Reset error dulu
                      this.errors = { nama: false, alamat: false, telepon: false, nopol: false, tipe: false, warna: false, layanan: false };

                      if(!this.form.nama) { this.errors.nama = true; isValid = false; }
                      if(!this.form.alamat) { this.errors.alamat = true; isValid = false; }
                      if(!this.form.telepon) { this.errors.telepon = true; isValid = false; }
                      if(!this.form.nopol) { this.errors.nopol = true; isValid = false; }
                      if(!this.form.tipe) { this.errors.tipe = true; isValid = false; }
                      if(!this.form.warna) { this.errors.warna = true; isValid = false; }
                      if(this.form.layanan_harga === 0) { this.errors.layanan = true; isValid = false; }

                      return isValid;
                  },
                  
                  getDate() {
                      const today = new Date();
                      return String(today.getDate()).padStart(2, '0') + '/' + String(today.getMonth() + 1).padStart(2, '0') + '/' + today.getFullYear();
                  },
                  formatRupiah(value) {
                      return new Intl.NumberFormat('id-ID', { style: 'currency', currency: 'IDR' }).format(value);
                  },
                  updateLayanan(e) {
                      const selectedOption = e.target.options[e.target.selectedIndex];
                      const harga = selectedOption.getAttribute('data-harga'); 
                      const nama = selectedOption.getAttribute('data-nama');
                      
                      this.form.layanan_harga = parseInt(harga);
                      this.form.layanan_nama = nama;
                      this.errors.layanan = false; // Hapus error jika sudah pilih
                  }
              }"
              class="grid grid-cols-1 lg:grid-cols-3 gap-6">
            @csrf
            
            <input type="hidden" name="no_invoice" x-model="invoiceNo">

            <div class="lg:col-span-2 space-y-6" x-show="step === 1">
                
                <div class="bg-white p-6 rounded-2xl shadow-sm">
                    <h2 class="text-lg font-bold text-gray-600 mb-6">Data Pelanggan</h2>
                    <h3 class="text-sm font-bold text-gray-900 mb-4">Customer Overview</h3>
                    
                    <div class="space-y-5">
                        <div>
                            <label class="block text-xs font-bold text-gray-700 mb-2">Nama <span class="text-red-500">*</span></label>
                            <input type="text" x-model="form.nama" name="nama" placeholder="Nama" 
                                   @input="errors.nama = false"
                                   :class="errors.nama ? 'border-red-500 ring-1 ring-red-500' : 'border-transparent'"
                                   class="w-full bg-gray-50 text-gray-800 rounded-xl p-3.5 text-sm outline-none focus:ring-2 focus:ring-[#4ADE80] transition border">
                            <p x-show="errors.nama" class="text-red-500 text-xs mt-1">Nama wajib diisi</p>
                        </div>

                        <div>
                            <label class="block text-xs font-bold text-gray-700 mb-2">Alamat <span class="text-red-500">*</span></label>
                            <input type="text" x-model="form.alamat" name="alamat" placeholder="Alamat" 
                                   @input="errors.alamat = false"
                                   :class="errors.alamat ? 'border-red-500 ring-1 ring-red-500' : 'border-transparent'"
                                   class="w-full bg-gray-50 text-gray-800 rounded-xl p-3.5 text-sm outline-none focus:ring-2 focus:ring-[#4ADE80] transition border">
                            <p x-show="errors.alamat" class="text-red-500 text-xs mt-1">Alamat wajib diisi</p>
                        </div>

                        <div>
                            <label class="block text-xs font-bold text-gray-700 mb-2">No telp <span class="text-red-500">*</span></label>
                            <div class="flex gap-3">
                                <div class="bg-gray-50 rounded-xl px-3 flex items-center justify-between gap-2 w-20 cursor-pointer border border-transparent">
                                    <div class="w-5 h-5 rounded-full bg-gray-200"></div> 
                                    <svg class="w-3 h-3 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path></svg>
                                </div>
                                <div class="w-full">
                                    <input type="text" x-model="form.telepon" name="telepon" placeholder="08..."
                                       @input="errors.telepon = false"
                                       :class="errors.telepon ? 'border-red-500 ring-1 ring-red-500' : 'border-transparent'"
                                       class="w-full bg-gray-50 text-gray-800 rounded-xl p-3.5 text-sm outline-none focus:ring-2 focus:ring-[#4ADE80] transition border">
                                     <p x-show="errors.telepon" class="text-red-500 text-xs mt-1">No Telepon wajib diisi</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="bg-white p-6 rounded-2xl shadow-sm">
                    <h2 class="text-lg font-bold text-gray-600 mb-6">Pilih Layanan Cuci Mobil <span class="text-red-500">*</span></h2>
                    <div class="w-full overflow-x-auto">
                        <table class="w-full text-left">
                            <thead>
                                <tr class="text-xs font-bold text-gray-800 border-b border-gray-100">
                                    <th class="pb-3 w-1/3">Layanan</th>
                                    <th class="pb-3 w-1/3">Tambahan / Note</th>
                                    <th class="pb-3 w-1/3 text-right pr-4">Total</th>
                                </tr>
                            </thead>
                            <tbody class="text-sm">
                                <tr>
                                    <td class="py-4 pr-2">
                                        <div class="relative">
                                            <select name="layanan_id" @change="updateLayanan" 
                                                    :class="errors.layanan ? 'border-red-500 ring-1 ring-red-500' : 'border-transparent'"
                                                    class="w-full bg-gray-50 text-gray-800 font-medium rounded-xl p-3 appearance-none outline-none focus:ring-2 focus:ring-[#4ADE80] cursor-pointer border">
                                                <option value="" disabled selected>Pilih Layanan</option>
                                                @foreach($layanans as $layanan)
                                                    <option value="{{ $layanan->id }}" 
                                                            data-harga="{{ $layanan->harga }}" 
                                                            data-nama="{{ $layanan->nama_layanan }}">
                                                        {{ $layanan->nama_layanan }}
                                                    </option>
                                                @endforeach
                                            </select>
                                            <p x-show="errors.layanan" class="text-red-500 text-xs mt-1 absolute -bottom-5">Pilih layanan dulu</p>
                                            
                                            <div class="pointer-events-none absolute inset-y-0 right-0 flex items-center px-3 text-gray-500">
                                                <svg class="h-4 w-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path></svg>
                                            </div>
                                        </div>
                                    </td>
                                    <td class="py-4 px-2">
                                        <div class="relative">
                                            <select x-model="form.tambahan" name="tambahan" class="w-full bg-gray-50 text-gray-800 rounded-xl p-3 appearance-none outline-none focus:ring-2 focus:ring-[#4ADE80] cursor-pointer border border-transparent">
                                                <option value="Tidak ada">Tidak ada</option>
                                                <option value="Parfum Mobil">Parfum Mobil</option>
                                                <option value="Semir Ban">Semir Ban</option>
                                            </select>
                                            <div class="pointer-events-none absolute inset-y-0 right-0 flex items-center px-3 text-gray-500">
                                                <svg class="h-4 w-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path></svg>
                                            </div>
                                        </div>
                                    </td>
                                    <td class="py-4 text-right pr-4">
                                        <div class="bg-gray-50 rounded-xl p-3 text-red-500 font-bold inline-block min-w-[120px]" x-text="formatRupiah(form.layanan_harga)"></div>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>

            <div class="lg:col-span-1 space-y-6" x-show="step === 1">
                <div class="bg-white p-6 rounded-2xl shadow-sm h-fit">
                    <h2 class="text-lg font-bold text-gray-600 mb-6">Data Kendaraan</h2>
                    <div class="space-y-5">
                        <div>
                            <label class="block text-xs font-bold text-gray-700 mb-2">Nomor polisi <span class="text-red-500">*</span></label>
                            <input type="text" x-model="form.nopol" name="nopol" placeholder="D 1234 ABC" 
                                   @input="errors.nopol = false"
                                   :class="errors.nopol ? 'border-red-500 ring-1 ring-red-500' : 'border-transparent'"
                                   class="w-full bg-gray-50 text-gray-800 rounded-xl p-3.5 text-sm outline-none focus:ring-2 focus:ring-[#4ADE80] transition border">
                            <p x-show="errors.nopol" class="text-red-500 text-xs mt-1">Nopol wajib diisi</p>
                        </div>
                        
                        <div>
                            <label class="block text-xs font-bold text-gray-700 mb-2">Tipe kendaraan <span class="text-red-500">*</span></label>
                            <div class="relative">
                                <select x-model="form.tipe" name="tipe_kendaraan" 
                                        @change="errors.tipe = false"
                                        :class="errors.tipe ? 'border-red-500 ring-1 ring-red-500' : 'border-transparent'"
                                        class="w-full bg-gray-50 text-gray-800 rounded-xl p-3.5 text-sm appearance-none outline-none focus:ring-2 focus:ring-[#4ADE80] transition cursor-pointer border">
                                    <option value="" disabled selected>Pilih Tipe</option>
                                    <option value="City Car / LCGC">City Car / LCGC</option>
                                    <option value="Hatchback">Hatchback</option>
                                    <option value="MPV">MPV</option>
                                    <option value="SUV">SUV</option>
                                    <option value="Sedan">Sedan</option>
                                    <option value="Station Wagon">Station Wagon</option>
                                    <option value="Coupe">Coupe / Sport</option>
                                    <option value="Convertible">Convertible</option>
                                    <option value="Offroad">Offroad / 4x4</option>
                                    <option value="Double Cabin">Double Cabin</option>
                                    <option value="Pickup">Pickup</option>
                                    <option value="Van">Van / Minibus</option>
                                    <option value="Truk Kecil">Truk Kecil / Box</option>
                                </select>
                                <p x-show="errors.tipe" class="text-red-500 text-xs mt-1">Tipe wajib dipilih</p>
                                <div class="pointer-events-none absolute inset-y-0 right-0 flex items-center px-3 text-gray-500">
                                    <svg class="h-4 w-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path></svg>
                                </div>
                            </div>
                        </div>

                        <div>
                            <label class="block text-xs font-bold text-gray-700 mb-2">Warna <span class="text-red-500">*</span></label>
                            <input type="text" x-model="form.warna" name="warna" placeholder="Warna Mobil" 
                                   @input="errors.warna = false"
                                   :class="errors.warna ? 'border-red-500 ring-1 ring-red-500' : 'border-transparent'"
                                   class="w-full bg-gray-50 text-gray-800 rounded-xl p-3.5 text-sm outline-none focus:ring-2 focus:ring-[#4ADE80] transition border">
                             <p x-show="errors.warna" class="text-red-500 text-xs mt-1">Warna wajib diisi</p>
                        </div>
                    </div>
                </div>

                <button type="button" @click="if(validateForm()) { step = 2 }" class="w-full bg-[#34D399] hover:bg-[#4ADE80] text-teal-900 text-lg font-medium py-10 rounded-xl shadow-md transition transform hover:-translate-y-1 flex items-center justify-center">
                    Lanjutkan Pembayaran
                </button>
            </div>


            <div class="lg:col-span-2 space-y-6" x-show="step === 2" style="display: none;">
                <div class="bg-white p-6 rounded-2xl shadow-sm">
                    <button type="button" @click="step = 1" class="flex items-center text-gray-400 hover:text-gray-600 mb-4 text-sm">
                        <svg class="w-4 h-4 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7"></path></svg>
                        Kembali
                    </button>
                    <div class="space-y-4">
                        <div><label class="block text-xs font-bold text-gray-700 mb-2">Nama</label><div class="w-full bg-gray-50 text-gray-800 rounded-xl p-3.5 text-sm" x-text="form.nama"></div></div>
                        <div><label class="block text-xs font-bold text-gray-700 mb-2">No invoice</label><div class="w-full bg-gray-50 text-gray-800 rounded-xl p-3.5 text-sm" x-text="invoiceNo"></div></div>
                         <div>
                            <label class="block text-xs font-bold text-gray-700 mb-2">Metode Pembayaran</label>
                            <div class="relative">
                                <select name="metode_pembayaran" x-model="form.metode_bayar" class="w-full bg-gray-50 text-gray-800 rounded-xl p-3.5 text-sm appearance-none outline-none focus:ring-2 focus:ring-[#4ADE80] cursor-pointer">
                                    <option value="Cash">Cash</option>
                                    <option value="Transfer">Transfer</option>
                                    <option value="QRIS">QRIS</option>
                                </select>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="lg:col-span-1 space-y-6" x-show="step === 2" style="display: none;">
                <div class="bg-white p-6 rounded-2xl shadow-sm h-fit">
                    <h2 class="text-lg font-bold text-gray-600 mb-6">Struk</h2>
                    <div class="bg-white border border-gray-200 rounded-lg p-6 shadow-sm flex flex-col items-center text-center">
                         <div class="w-16 h-16 bg-[#5E7288] rounded-full flex items-center justify-center mb-3">
                             <svg class="w-8 h-8 text-white" fill="currentColor" viewBox="0 0 24 24"><path d="M18.92 6.01C18.72 5.42 18.16 5 17.5 5h-11c-.66 0-1.21.42-1.42 1.01L3 12v8c0 .55.45 1 1 1h1c.55 0 1-.45 1-1v-1h12v1c0 .55.45 1 1 1h1c.55 0 1-.45 1-1v-8l-2.08-5.99zM6.5 16c-.83 0-1.5-.67-1.5-1.5S5.67 13 6.5 13s1.5.67 1.5 1.5S7.33 16 6.5 16zm11 0c-.83 0-1.5-.67-1.5-1.5s.67-1.5 1.5-1.5 1.5.67 1.5 1.5-.67 1.5-1.5 1.5zM5 11l1.5-4.5h11L19 11H5z"/></svg>
                        </div>
                        <p class="font-bold text-gray-700 text-sm">Car Wash</p>
                        <div class="w-full flex justify-between text-xs text-gray-500 mb-4 border-b border-gray-100 pb-2 mt-4"><span>Admin</span><span x-text="getDate()"></span></div>
                        <div class="w-full text-sm mb-4 text-left"><div class="flex justify-between mb-2"><span class="text-gray-600" x-text="form.layanan_nama"></span><span class="font-bold text-gray-800" x-text="formatRupiah(form.layanan_harga)"></span></div></div>
                        <div class="w-full border-t border-gray-200 my-2"></div>
                        <div class="w-full text-xs text-gray-500 space-y-2 text-left"><div class="flex justify-between font-bold text-gray-800 text-sm mt-2"><span>Total</span><span x-text="formatRupiah(form.layanan_harga)"></span></div></div>
                        <div class="w-full mt-6 text-right"><p class="text-xs text-gray-400">Invoice</p><p class="text-xs font-bold text-gray-600" x-text="invoiceNo"></p></div>
                    </div>
                </div>
                <button type="submit" class="w-full bg-[#34D399] hover:bg-[#4ADE80] text-teal-900 text-lg font-medium py-4 rounded-full shadow-md transition transform hover:-translate-y-1 flex items-center justify-center">Bayar dan Cetak</button>
            </div>

        </form>

    </div>
</div>

@endsection