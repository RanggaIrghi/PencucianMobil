@extends('layouts.main')

@section('content')

<div class="flex min-h-screen bg-[#F9FAFB] font-poppins">
    
    @include('partials.sidebar')

    <div class="flex-1 lg:ml-64 p-8">
        
        <div class="flex justify-between items-center mb-8">
            <div>
                <h1 class="text-2xl font-bold text-gray-800">Hi, Syabil</h1>
                <p class="text-xs text-gray-500">Ringkasan toko anda hari ini</p>
            </div>
            
            <div class="flex items-center gap-6">
                <div class="relative hidden md:block">
                    <input type="text" placeholder="Search..." class="bg-gray-100 border-none rounded-xl py-2.5 pl-10 pr-4 text-sm w-64 focus:ring-2 focus:ring-[#4ADE80] outline-none">
                    <svg class="w-5 h-5 text-gray-400 absolute left-3 top-2.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path></svg>
                </div>
                
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

        <div class="space-y-6">
            <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
                
                <div class="bg-white p-6 rounded-2xl shadow-sm border border-gray-100 relative overflow-hidden">
                    <div class="flex justify-between items-start z-10 relative">
                        <div>
                            <div class="flex items-center gap-3 mb-4">
                                <div class="w-10 h-10 rounded-full flex items-center justify-center bg-green-50 text-green-500">
                                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v8m0 0v1m0-1c-1.11 0-2.08-.402-2.599-1M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                                </div>
                                <span class="font-bold text-gray-700 text-sm">Total Pendapatan</span>
                            </div>
                            <h3 class="text-2xl font-bold text-gray-900 mb-2">Rp {{ number_format($totalRevenue, 0, ',', '.') }}</h3>
                            <div class="flex items-center text-xs font-bold text-green-500">
                                <span>+100%</span>
                                <span class="text-gray-400 ml-1">All time</span>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="bg-white p-6 rounded-2xl shadow-sm border border-gray-100 relative overflow-hidden">
                    <div class="flex justify-between items-start z-10 relative">
                        <div>
                            <div class="flex items-center gap-3 mb-4">
                                <div class="w-10 h-10 rounded-full flex items-center justify-center bg-teal-50 text-teal-500">
                                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 3h2l.4 2M7 13h10l4-8H5.4M7 13L5.4 5M7 13l-2.293 2.293c-.63.63-.184 1.707.707 1.707H17m0 0a2 2 0 100 4 2 2 0 000-4zm-8 2a2 2 0 11-4 0 2 2 0 014 0z"></path></svg>
                                </div>
                                <span class="font-bold text-gray-700 text-sm">Total Cucian</span>
                            </div>
                            <h3 class="text-2xl font-bold text-gray-900 mb-2">{{ $totalTransactions }} Mobil</h3>
                            <div class="flex items-center text-xs font-bold text-teal-500">
                                <span>+1.0%</span>
                                <span class="text-gray-400 ml-1">dari kemarin</span>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="bg-white p-6 rounded-2xl shadow-sm border border-gray-100 relative overflow-hidden">
                    <div class="flex justify-between items-start z-10 relative">
                        <div>
                            <div class="flex items-center gap-3 mb-4">
                                <div class="w-10 h-10 rounded-full flex items-center justify-center bg-emerald-50 text-emerald-500">
                                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 7h.01M7 3h5c.512 0 1.024.195 1.414.586l7 7a2 2 0 010 2.828l-7 7a2 2 0 01-2.828 0l-7-7A1.994 1.994 0 013 12V7a4 4 0 014-4z"></path></svg>
                                </div>
                                <span class="font-bold text-gray-700 text-sm">Rata-rata Transaksi</span>
                            </div>
                            <h3 class="text-2xl font-bold text-gray-900 mb-2">Rp {{ number_format($averageSales, 0, ',', '.') }}</h3>
                            <div class="flex items-center text-xs font-bold text-emerald-500">
                                <span>+2.5%</span>
                                <span class="text-gray-400 ml-1">stabil</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="grid grid-cols-1 lg:grid-cols-3 gap-6">
                
                <div class="lg:col-span-2 bg-white p-6 rounded-2xl shadow-sm border border-gray-100">
                    <div class="flex justify-between items-start mb-6">
                        <div>
                            <p class="text-sm text-gray-500 font-medium mb-1">Pendapatan Bulan Ini</p>
                            <div class="flex items-center gap-3">
                                <h2 class="text-2xl font-bold text-gray-900">Rp {{ number_format($revenueThisMonth, 0, ',', '.') }}</h2>
                                <span class="text-xs bg-green-100 text-green-600 font-bold px-2 py-1 rounded-full flex items-center gap-1">
                                    Bulan {{ date('F') }}
                                </span>
                            </div>
                        </div>
                        <div class="flex items-center gap-4">
                            <div class="flex items-center gap-2">
                                <span class="w-3 h-3 rounded-full bg-green-400"></span> 
                                <span class="text-xs text-gray-500 font-medium">Omset</span>
                            </div>
                        </div>
                    </div>
                    
                    <div class="relative w-full h-64 bg-gradient-to-t from-gray-50 to-white rounded-xl flex items-end overflow-hidden">
                        <div class="absolute inset-0 flex flex-col justify-between p-4 pointer-events-none">
                            <div class="border-b border-gray-100 h-full w-full"></div>
                            <div class="border-b border-gray-100 h-full w-full"></div>
                            <div class="border-b border-gray-100 h-full w-full"></div>
                        </div>
                        <svg viewBox="0 0 800 300" class="w-full h-full absolute bottom-0 left-0" preserveAspectRatio="none">
                            <defs>
                                <linearGradient id="chartGradient" x1="0" y1="0" x2="0" y2="1">
                                    <stop offset="0%" stop-color="#4ADE80" stop-opacity="0.4"/>
                                    <stop offset="100%" stop-color="#4ADE80" stop-opacity="0"/>
                                </linearGradient>
                            </defs>
                            <path d="M0 250 C 100 200, 200 280, 300 150 S 500 50, 600 180 S 700 100, 800 200 V 300 H 0 Z" fill="url(#chartGradient)" />
                            <path d="M0 250 C 100 200, 200 280, 300 150 S 500 50, 600 180 S 700 100, 800 200" fill="none" stroke="#4ADE80" stroke-width="4" stroke-linecap="round"/>
                        </svg>
                    </div>
                </div>

                <div class="bg-white p-6 rounded-2xl shadow-sm border border-gray-100 flex flex-col">
                    <div class="flex justify-between items-center mb-6">
                        <h3 class="font-bold text-gray-800">Target Bulanan</h3>
                    </div>
                    <div class="flex-1 flex items-center justify-center relative">
                        <div class="w-40 h-32 bg-gray-200 rounded-2xl relative overflow-hidden flex items-center justify-center">
                             <p class="text-gray-500 text-xs text-center">Chart Visual<br>(Placeholder)</p>
                        </div>
                    </div>
                </div>
            </div>

            <div class="grid grid-cols-1 lg:grid-cols-3 gap-6">
                
                <div class="lg:col-span-2 bg-white p-6 rounded-2xl shadow-sm border border-gray-100">
                    <div class="flex justify-between items-center mb-6">
                        <h3 class="text-lg font-bold text-gray-700">5 Transaksi Terakhir</h3>
                        <a href="{{ route('queue') }}" class="text-sm text-[#4ADE80] font-bold hover:underline">Lihat Semua</a>
                    </div>
                    
                    <div class="overflow-x-auto">
                        <table class="w-full text-left">
                            <thead class="text-xs font-bold text-gray-800 uppercase border-b border-gray-100">
                                <tr>
                                    <th class="pb-3">Layanan</th>
                                    <th class="pb-3">Tanggal</th>
                                    <th class="pb-3">Status</th>
                                    <th class="pb-3">Harga</th>
                                    <th class="pb-3">Pelanggan</th>
                                </tr>
                            </thead>
                            <tbody class="text-sm divide-y divide-gray-50">
                                @forelse($recentTransactions as $item)
                                <tr>
                                    <td class="py-4">
                                        <div class="flex items-center gap-3">
                                            <div class="w-10 h-10 bg-gray-100 rounded-lg shrink-0 flex items-center justify-center">
                                                <svg class="w-5 h-5 text-gray-500" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 11a7 7 0 01-7 7m0 0a7 7 0 01-7-7m7 7v4m0 0H8m4 0h4m-4-8a3 3 0 01-3-3V5a3 3 0 116 0v6a3 3 0 01-3 3z"></path></svg>
                                            </div>
                                            <div>
                                                <p class="font-bold text-gray-800">{{ $item->layanan->nama_layanan }}</p>
                                                <p class="text-xs text-gray-400">{{ $item->no_invoice }}</p>
                                            </div>
                                        </div>
                                    </td>
                                    <td class="py-4">
                                        <p class="font-bold text-gray-800">{{ $item->created_at->format('d M Y') }}</p>
                                        <p class="text-xs text-gray-400">{{ $item->created_at->format('H:i') }}</p>
                                    </td>
                                    <td class="py-4">
                                        <span class="px-3 py-1 rounded-full text-xs font-bold
                                            {{ $item->status == 'Queue' ? 'bg-red-100 text-red-600' : '' }}
                                            {{ $item->status == 'Washing' ? 'bg-blue-100 text-blue-600' : '' }}
                                            {{ $item->status == 'Finished' ? 'bg-green-100 text-green-600' : '' }}
                                        ">
                                            {{ $item->status }}
                                        </span>
                                    </td>
                                    <td class="py-4 font-bold text-gray-800">Rp {{ number_format($item->total_harga, 0, ',', '.') }}</td>
                                    <td class="py-4">
                                        <p class="font-bold text-gray-800">{{ $item->kendaraan->pelanggan->nama }}</p>
                                        <p class="text-xs text-gray-400">{{ $item->kendaraan->no_polisi }}</p>
                                    </td>
                                </tr>
                                @empty
                                <tr>
                                    <td colspan="5" class="py-8 text-center text-gray-400">Belum ada transaksi hari ini.</td>
                                </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>
                </div>

                <div class="bg-white p-6 rounded-2xl shadow-sm border border-gray-100 flex flex-col">
                    <div class="flex justify-between items-start mb-6">
                        <h3 class="font-bold text-gray-800 leading-tight">Ringkasan<br>Mingguan</h3>
                    </div>
                    <div class="flex-1 flex flex-col justify-end">
                        <div class="w-full h-32 bg-gray-100 rounded-xl relative overflow-hidden mb-4 mx-auto max-w-[180px] flex items-center justify-center">
                            <p class="text-xs text-gray-400">Chart Visual</p>
                        </div>
                        <div class="flex justify-between text-[10px] text-gray-400">
                            <span>Mon</span><span>Tue</span><span>Wed</span><span>Thu</span><span>Fri</span><span>Sat</span>
                        </div>
                    </div>
                </div>

            </div>

        </div>

    </div>
</div>

@endsection