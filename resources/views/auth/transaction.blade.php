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

        <form action="" method="POST" 
              x-data="{ 
                  step: 1,
                  form: {
                      nama: '',
                      alamat: '',
                      telepon: '(+62) ',
                      nopol: '',
                      tipe: '',
                      warna: '',
                      layanan_nama: 'Cuci Steam',
                      layanan_harga: 10000,
                      tambahan: 'Tidak ada',
                      metode_bayar: 'Cash'
                  },
                  invoiceNo: '#INV' + Math.floor(Math.random() * 1000000000),
                  getDate() {
                      const today = new Date();
                      const dd = String(today.getDate()).padStart(2, '0');
                      const mm = String(today.getMonth() + 1).padStart(2, '0');
                      const yyyy = today.getFullYear();
                      return dd + '/' + mm + '/' + yyyy;
                  },
                  formatRupiah(value) {
                      return new Intl.NumberFormat('id-ID', { style: 'currency', currency: 'IDR' }).format(value);
                  },
                  updateLayanan(e) {
                      const selectedOption = e.target.options[e.target.selectedIndex];
                      this.form.layanan_harga = parseInt(selectedOption.value);
                      this.form.layanan_nama = selectedOption.text;
                  }
              }"
              class="grid grid-cols-1 lg:grid-cols-3 gap-6">
            @csrf

            <div class="lg:col-span-2 space-y-6" x-show="step === 1">
                
                <div class="bg-white p-6 rounded-2xl shadow-sm">
                    <div class="flex justify-between items-center mb-6">
                        <h2 class="text-lg font-bold text-gray-600">Data Pelanggan</h2>
                    </div>

                    <h3 class="text-sm font-bold text-gray-900 mb-4">Customer Overview</h3>
                    <div class="space-y-5">
                        <div>
                            <label class="block text-xs font-bold text-gray-700 mb-2">Nama</label>
                            <input type="text" x-model="form.nama" name="nama" placeholder="Nama" class="w-full bg-gray-50 text-gray-800 rounded-xl p-3.5 text-sm outline-none focus:ring-2 focus:ring-[#4ADE80] transition">
                        </div>
                        <div>
                            <label class="block text-xs font-bold text-gray-700 mb-2">Alamat</label>
                            <input type="text" x-model="form.alamat" name="alamat" placeholder="Alamat" class="w-full bg-gray-50 text-gray-800 rounded-xl p-3.5 text-sm outline-none focus:ring-2 focus:ring-[#4ADE80] transition">
                        </div>
                        <div>
                            <label class="block text-xs font-bold text-gray-700 mb-2">No telp</label>
                            <div class="flex gap-3">
                                <div class="bg-gray-50 rounded-xl px-3 flex items-center justify-between gap-2 w-20 cursor-pointer">
                                    <div class="w-5 h-5 rounded-full bg-gray-200"></div> 
                                    <svg class="w-3 h-3 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path></svg>
                                </div>
                                <input type="text" x-model="form.telepon" name="telepon" class="w-full bg-gray-50 text-gray-800 rounded-xl p-3.5 text-sm outline-none focus:ring-2 focus:ring-[#4ADE80] transition">
                            </div>
                        </div>
                    </div>
                </div>

                <div class="bg-white p-6 rounded-2xl shadow-sm">
                    <h2 class="text-lg font-bold text-gray-600 mb-6">Pilih Layanan Cuci Mobil</h2>
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
                                            <select name="layanan_id" @change="updateLayanan" class="w-full bg-gray-50 text-gray-800 font-medium rounded-xl p-3 appearance-none outline-none focus:ring-2 focus:ring-[#4ADE80] cursor-pointer">
                                                <option value="10000">Cuci Steam</option>
                                                <option value="20000">Cuci Lengkap</option>
                                                <option value="30000">Premium Detailing</option>
                                            </select>
                                            <div class="pointer-events-none absolute inset-y-0 right-0 flex items-center px-3 text-gray-500">
                                                <svg class="h-4 w-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path></svg>
                                            </div>
                                        </div>
                                    </td>
                                    <td class="py-4 px-2">
                                        <div class="relative">
                                            <select x-model="form.tambahan" name="tambahan" class="w-full bg-gray-50 text-gray-800 rounded-xl p-3 appearance-none outline-none focus:ring-2 focus:ring-[#4ADE80] cursor-pointer">
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
                            <label class="block text-xs font-bold text-gray-700 mb-2">Nomor polisi</label>
                            <input type="text" x-model="form.nopol" name="nopol" placeholder="D 1234 ABC" class="w-full bg-gray-50 text-gray-800 rounded-xl p-3.5 text-sm outline-none focus:ring-2 focus:ring-[#4ADE80] transition">
                        </div>
                        <div>
                            <label class="block text-xs font-bold text-gray-700 mb-2">Tipe kendaraan</label>
                            <div class="relative">
                                <select x-model="form.tipe" name="tipe_kendaraan" class="w-full bg-gray-50 text-gray-800 rounded-xl p-3.5 text-sm appearance-none outline-none focus:ring-2 focus:ring-[#4ADE80] transition cursor-pointer">
                                    <option value="" disabled selected>Pilih Tipe</option>
                                    <option value="MPV">MPV</option>
                                    <option value="SUV">SUV</option>
                                    <option value="Sedan">Sedan</option>
                                    <option value="Hatchback">Hatchback</option>
                                    <option value="City Car">City Car</option>
                                </select>
                                <div class="pointer-events-none absolute inset-y-0 right-0 flex items-center px-3 text-gray-500">
                                    <svg class="h-4 w-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path></svg>
                                </div>
                            </div>
                        </div>
                        <div>
                            <label class="block text-xs font-bold text-gray-700 mb-2">Warna</label>
                            <input type="text" x-model="form.warna" name="warna" placeholder="Warna Mobil" class="w-full bg-gray-50 text-gray-800 rounded-xl p-3.5 text-sm outline-none focus:ring-2 focus:ring-[#4ADE80] transition">
                        </div>
                    </div>
                </div>

                <button type="button" @click="step = 2" class="w-full bg-[#34D399] hover:bg-[#4ADE80] text-teal-900 text-lg font-medium py-10 rounded-xl shadow-md transition transform hover:-translate-y-1 flex items-center justify-center">
                    Lanjutkan Pembayaran
                </button>
            </div>


            <div class="lg:col-span-2 space-y-6" x-show="step === 2" style="display: none;">
                <div class="bg-white p-6 rounded-2xl shadow-sm">
                    
                    <button type="button" @click="step = 1" class="flex items-center text-gray-400 hover:text-gray-600 mb-4 text-sm">
                        <svg class="w-4 h-4 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7"></path></svg>
                        Kembali
                    </button>

                    <div class="flex justify-between items-center mb-6">
                        <h2 class="text-lg font-bold text-gray-600">Detail Pemesanan</h2>
                        <button type="button" class="text-gray-400 hover:text-gray-600"><svg class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24"><path d="M12 8c1.1 0 2-.9 2-2s-.9-2-2-2-2 .9-2 2 .9 2 2 2zm0 2c-1.1 0-2 .9-2 2s.9 2 2 2 2-.9 2-2-.9-2-2-2zm0 6c-1.1 0-2 .9-2 2s.9 2 2 2 2-.9 2-2-.9-2-2-2z"/></svg></button>
                    </div>

                    <h3 class="text-sm font-bold text-gray-900 mb-4">Customer Overview</h3>

                    <div class="space-y-4">
                        <div>
                            <label class="block text-xs font-bold text-gray-700 mb-2">Nama</label>
                            <div class="w-full bg-gray-50 text-gray-800 rounded-xl p-3.5 text-sm" x-text="form.nama"></div>
                        </div>

                        <div>
                            <label class="block text-xs font-bold text-gray-700 mb-2">No invoice</label>
                            <div class="w-full bg-gray-50 text-gray-800 rounded-xl p-3.5 text-sm" x-text="invoiceNo"></div>
                            <input type="hidden" name="no_invoice" x-model="invoiceNo">
                        </div>

                        <div>
                            <label class="block text-xs font-bold text-gray-700 mb-2">Tgl (otomatis)</label>
                            <div class="w-full bg-gray-50 text-gray-800 rounded-xl p-3.5 text-sm" x-text="getDate()"></div>
                        </div>

                        <div>
                            <label class="block text-xs font-bold text-gray-700 mb-2">Tipe pemesanan</label>
                            <div class="w-full bg-gray-50 text-gray-800 rounded-xl p-3.5 text-sm">Offline</div>
                            <input type="hidden" name="tipe_pemesanan" value="Offline">
                        </div>

                        <div>
                            <label class="block text-xs font-bold text-gray-700 mb-2">Metode Pembayaran</label>
                            <div class="relative">
                                <select name="metode_pembayaran" x-model="form.metode_bayar" class="w-full bg-gray-50 text-gray-800 rounded-xl p-3.5 text-sm appearance-none outline-none focus:ring-2 focus:ring-[#4ADE80] cursor-pointer">
                                    <option value="Cash">Cash</option>
                                    <option value="Transfer">Transfer</option>
                                    <option value="QRIS">QRIS</option>
                                </select>
                                <div class="pointer-events-none absolute inset-y-0 right-0 flex items-center px-3 text-gray-500">
                                    <svg class="h-4 w-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path></svg>
                                </div>
                            </div>
                        </div>

                        <div>
                            <label class="block text-xs font-bold text-gray-700 mb-2">Total</label>
                            <div class="w-full bg-gray-50 text-gray-800 rounded-xl p-3.5 text-sm" x-text="formatRupiah(form.layanan_harga)"></div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="lg:col-span-1 space-y-6" x-show="step === 2" style="display: none;">
                
                <div class="bg-white p-6 rounded-2xl shadow-sm h-fit">
                    <h2 class="text-lg font-bold text-gray-600 mb-6">Struk</h2>

                    <div class="bg-white border border-gray-200 rounded-lg p-6 shadow-sm flex flex-col items-center text-center">
                        
                        <div class="w-16 h-16 bg-[#5E7288] rounded-full flex items-center justify-center mb-3">
                             <svg class="w-8 h-8 text-white" fill="currentColor" viewBox="0 0 24 24">
                                <path d="M18.92 6.01C18.72 5.42 18.16 5 17.5 5h-11c-.66 0-1.21.42-1.42 1.01L3 12v8c0 .55.45 1 1 1h1c.55 0 1-.45 1-1v-1h12v1c0 .55.45 1 1 1h1c.55 0 1-.45 1-1v-8l-2.08-5.99zM6.5 16c-.83 0-1.5-.67-1.5-1.5S5.67 13 6.5 13s1.5.67 1.5 1.5S7.33 16 6.5 16zm11 0c-.83 0-1.5-.67-1.5-1.5s.67-1.5 1.5-1.5 1.5.67 1.5 1.5-.67 1.5-1.5 1.5zM5 11l1.5-4.5h11L19 11H5z"/>
                             </svg>
                        </div>
                        
                        <p class="font-bold text-gray-700 text-sm">Car Wash</p>
                        <p class="text-xs text-gray-500">Jln Margahayu</p>
                        <p class="text-xs text-gray-500 mb-4">No tlp 0831283828</p>

                        <div class="w-full flex justify-between text-xs text-gray-500 mb-4 border-b border-gray-100 pb-2">
                            <span>Syabil</span>
                            <span x-text="getDate()"></span>
                        </div>

                        <div class="w-full text-sm mb-4 text-left">
                            <div class="flex justify-between mb-2">
                                <span class="text-gray-600" x-text="form.layanan_nama"></span>
                                <span class="font-bold text-gray-800" x-text="formatRupiah(form.layanan_harga)"></span>
                            </div>
                        </div>

                        <div class="w-full border-t border-gray-200 my-2"></div>

                        <div class="w-full text-xs text-gray-500 space-y-2 text-left">
                            <div class="flex justify-between">
                                <span>Sub total</span>
                                <span x-text="formatRupiah(form.layanan_harga)"></span>
                            </div>
                            <div class="flex justify-between font-bold text-gray-800 text-sm mt-2">
                                <span>Total</span>
                                <span x-text="formatRupiah(form.layanan_harga)"></span>
                            </div>
                        </div>

                        <div class="w-full mt-6 text-right">
                            <p class="text-xs text-gray-400">Invoice</p>
                            <p class="text-xs font-bold text-gray-600" x-text="invoiceNo"></p>
                        </div>
                    </div>
                </div>

                <button type="submit" class="w-full bg-[#34D399] hover:bg-[#4ADE80] text-teal-900 text-lg font-medium py-4 rounded-full shadow-md transition transform hover:-translate-y-1 flex items-center justify-center">
                    Bayar dan Cetak
                </button>
            </div>

        </form>

    </div>
</div>

@endsection