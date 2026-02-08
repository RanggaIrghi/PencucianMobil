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
                <div class="relative hidden md:block">
                    <input type="text" placeholder="Search..." class="bg-gray-100 border-none rounded-xl py-2.5 pl-10 pr-4 text-sm w-64 focus:ring-2 focus:ring-[#4ADE80] outline-none">
                    <svg class="w-5 h-5 text-gray-400 absolute left-3 top-2.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path></svg>
                </div>
                <button class="text-gray-500 hover:text-gray-700"><svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"></path></svg></button>
                <button class="text-gray-500 hover:text-gray-700 relative">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 17h5l-1.405-1.405A2.032 2.032 0 0118 14.158V11a6.002 6.002 0 00-4-5.659V5a2 2 0 10-4 0v.341C7.67 6.165 6 8.388 6 11v3.159c0 .538-.214 1.055-.595 1.436L4 17h5m6 0v1a3 3 0 11-6 0v-1m6 0H9"></path></svg>
                    <span class="absolute top-0 right-0 w-2 h-2 bg-red-500 rounded-full"></span>
                </button>
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

        <div class="space-y-6" x-data="{
            stats: [
                { title: 'Laba Bersih', value: 'Rp 8.245.000', change: '-0.5%', up: false, icon: 'money', color: 'text-green-500', bg: 'bg-green-50' },
                { title: 'Total Wash', value: '1,256', change: '+1.0%', up: true, icon: 'cart', color: 'text-teal-500', bg: 'bg-teal-50' },
                { title: 'Penjualan rata rata', value: '1,256', change: '+1.0%', up: true, icon: 'tag', color: 'text-emerald-500', bg: 'bg-emerald-50' }
            ],
            antrian: [
                { id: '01', service: 'Cuci Steem', code: '#A4064B', date: 'Maret 24, 2022', time: '09.20 AM', status: 'Received', color: 'bg-green-100 text-green-600', price: 'Rp130.000', customer: 'Jenny Wilson', type: 'Branding' },
                { id: '02', service: 'Cuci Steem', code: '#A4064B', date: 'Maret 24, 2022', time: '09.20 AM', status: 'Shipping', color: 'bg-yellow-100 text-yellow-600', price: 'Rp130.000', customer: 'Devon Lane', type: 'Branding' },
                { id: '03', service: 'Cuci Steem', code: '#A4064B', date: 'Maret 24, 2022', time: '09.20 AM', status: 'Received', color: 'bg-green-100 text-green-600', price: 'Rp130.000', customer: 'Jenny Wilson', type: 'Branding' }
            ]
        }">

            <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
                <template x-for="stat in stats">
                    <div class="bg-white p-6 rounded-2xl shadow-sm border border-gray-100 relative overflow-hidden group">
                        <div class="flex justify-between items-start z-10 relative">
                            <div>
                                <div class="flex items-center gap-3 mb-4">
                                    <div :class="`w-10 h-10 rounded-full flex items-center justify-center ${stat.bg} ${stat.color}`">
                                        <template x-if="stat.icon === 'money'">
                                            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v8m0 0v1m0-1c-1.11 0-2.08-.402-2.599-1M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                                        </template>
                                        <template x-if="stat.icon === 'cart'">
                                            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 3h2l.4 2M7 13h10l4-8H5.4M7 13L5.4 5M7 13l-2.293 2.293c-.63.63-.184 1.707.707 1.707H17m0 0a2 2 0 100 4 2 2 0 000-4zm-8 2a2 2 0 11-4 0 2 2 0 014 0z"></path></svg>
                                        </template>
                                        <template x-if="stat.icon === 'tag'">
                                            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 7h.01M7 3h5c.512 0 1.024.195 1.414.586l7 7a2 2 0 010 2.828l-7 7a2 2 0 01-2.828 0l-7-7A1.994 1.994 0 013 12V7a4 4 0 014-4z"></path></svg>
                                        </template>
                                    </div>
                                    <span class="font-bold text-gray-700 text-sm" x-text="stat.title"></span>
                                </div>
                                <h3 class="text-2xl font-bold text-gray-900 mb-2" x-text="stat.value"></h3>
                                <div class="flex items-center text-xs font-bold">
                                    <span :class="stat.up ? 'text-green-500' : 'text-green-500'" x-text="stat.change"></span>
                                    <span class="text-gray-400 ml-1">from last week</span>
                                </div>
                            </div>
                            
                            <div class="w-24 h-16 opacity-50">
                                <svg viewBox="0 0 100 50" class="w-full h-full text-gray-300 fill-current">
                                    <path d="M0 40 Q 30 50 50 30 T 100 20 V 50 H 0 Z" />
                                </svg>
                            </div>
                        </div>
                    </div>
                </template>
            </div>

            <div class="grid grid-cols-1 lg:grid-cols-3 gap-6">
                
                <div class="lg:col-span-2 bg-white p-6 rounded-2xl shadow-sm border border-gray-100">
                    <div class="flex justify-between items-start mb-6">
                        <div>
                            <p class="text-sm text-gray-500 font-medium mb-1">Keseluruhan Penjualan</p>
                            <div class="flex items-center gap-3">
                                <h2 class="text-2xl font-bold text-gray-900">Rp 56,345.98</h2>
                                <span class="text-xs bg-green-100 text-green-600 font-bold px-2 py-1 rounded-full flex items-center gap-1">
                                    <svg class="w-3 h-3" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 7h8m0 0v8m0-8l-8 8-4-4-6 6"></path></svg>
                                    23.5%
                                </span>
                            </div>
                        </div>
                        <div class="flex items-center gap-4">
                            <div class="flex items-center gap-2">
                                <span class="w-3 h-3 rounded-full bg-green-400"></span> 
                                <span class="text-xs text-gray-500 font-medium">Pencucian</span>
                            </div>
                            <button class="border border-gray-200 rounded-lg px-3 py-1.5 text-xs font-medium text-gray-600 flex items-center gap-2 hover:bg-gray-50">
                                Last 7 month <svg class="w-3 h-3" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path></svg>
                            </button>
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
                                    <stop offset="0%" stop-color="#9CA3AF" stop-opacity="0.4"/>
                                    <stop offset="100%" stop-color="#9CA3AF" stop-opacity="0"/>
                                </linearGradient>
                            </defs>
                            <path d="M0 250 C 100 200, 200 280, 300 150 S 500 50, 600 180 S 700 100, 800 200 V 300 H 0 Z" fill="url(#chartGradient)" />
                            <path d="M0 250 C 100 200, 200 280, 300 150 S 500 50, 600 180 S 700 100, 800 200" fill="none" stroke="#9CA3AF" stroke-width="4" stroke-linecap="round"/>
                        </svg>

                        <div class="absolute bottom-2 w-full flex justify-between px-6 text-xs text-gray-400 font-medium">
                            <span>Jan</span><span>Feb</span><span>Mar</span><span>Apr</span><span>May</span><span>Jun</span><span>Jul</span>
                        </div>
                    </div>
                </div>

                <div class="bg-white p-6 rounded-2xl shadow-sm border border-gray-100 flex flex-col">
                    <div class="flex justify-between items-center mb-6">
                        <h3 class="font-bold text-gray-800">Laporan Penjualan</h3>
                        <button class="text-xs text-gray-500 font-medium flex items-center gap-1">Month <svg class="w-3 h-3" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path></svg></button>
                    </div>
                    
                    <div class="flex-1 flex items-center justify-center relative">
                        <div class="w-40 h-32 bg-gray-200 rounded-2xl relative overflow-hidden">
                             <svg viewBox="0 0 100 100" class="w-full h-full" preserveAspectRatio="none">
                                <path d="M0 100 L0 50 Q 25 20 50 60 T 100 30 V 100 Z" fill="#9CA3AF" fill-opacity="0.5" />
                             </svg>
                        </div>
                    </div>
                </div>
            </div>

            <div class="grid grid-cols-1 lg:grid-cols-3 gap-6">
                
                <div class="lg:col-span-2 bg-white p-6 rounded-2xl shadow-sm border border-gray-100">
                    <div class="flex justify-between items-center mb-6">
                        <h3 class="text-lg font-bold text-gray-700">Antrian</h3>
                        <button class="text-gray-400 hover:text-gray-600"><svg class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24"><path d="M12 8c1.1 0 2-.9 2-2s-.9-2-2-2-2 .9-2 2 .9 2 2 2zm0 2c-1.1 0-2 .9-2 2s.9 2 2 2 2-.9 2-2-.9-2-2-2zm0 6c-1.1 0-2 .9-2 2s.9 2 2 2 2-.9 2-2-.9-2-2-2z"/></svg></button>
                    </div>
                    
                    <div class="overflow-x-auto">
                        <table class="w-full text-left">
                            <thead class="text-xs font-bold text-gray-800 uppercase border-b border-gray-100">
                                <tr>
                                    <th class="pb-3 pl-2">No</th>
                                    <th class="pb-3">Layanan</th>
                                    <th class="pb-3">Tanggal order</th>
                                    <th class="pb-3">Status</th>
                                    <th class="pb-3">Harga</th>
                                    <th class="pb-3">Pelanggan</th>
                                </tr>
                            </thead>
                            <tbody class="text-sm divide-y divide-gray-50">
                                <template x-for="item in antrian" :key="item.id">
                                    <tr>
                                        <td class="py-4 pl-2 font-bold text-gray-400" x-text="item.id"></td>
                                        <td class="py-4">
                                            <div class="flex items-center gap-3">
                                                <div class="w-10 h-10 bg-gray-200 rounded-lg shrink-0 overflow-hidden">
                                                    <svg class="w-full h-full text-gray-400 p-2" fill="currentColor" viewBox="0 0 24 24"><path d="M19 11a7 7 0 01-7 7m0 0a7 7 0 01-7-7m7 7v4m0 0H8m4 0h4m-4-8a3 3 0 01-3-3V5a3 3 0 116 0v6a3 3 0 01-3 3z"></path></svg>
                                                </div>
                                                <div>
                                                    <p class="font-bold text-gray-800" x-text="item.service"></p>
                                                    <p class="text-xs text-gray-400" x-text="item.code"></p>
                                                </div>
                                            </div>
                                        </td>
                                        <td class="py-4">
                                            <p class="font-bold text-gray-800" x-text="item.date"></p>
                                            <p class="text-xs text-gray-400" x-text="item.time"></p>
                                        </td>
                                        <td class="py-4">
                                            <span :class="`px-3 py-1 rounded-full text-xs font-bold ${item.color}`" x-text="item.status"></span>
                                        </td>
                                        <td class="py-4 font-bold text-gray-800" x-text="item.price"></td>
                                        <td class="py-4">
                                            <p class="font-bold text-gray-800" x-text="item.customer"></p>
                                            <p class="text-xs text-gray-400" x-text="item.type"></p>
                                        </td>
                                    </tr>
                                </template>
                            </tbody>
                        </table>
                    </div>
                </div>

                <div class="bg-white p-6 rounded-2xl shadow-sm border border-gray-100 flex flex-col">
                    <div class="flex justify-between items-start mb-6">
                        <h3 class="font-bold text-gray-800 leading-tight">Ringkasan Transaksi<br>Mingguan</h3>
                        <button class="border border-gray-200 rounded-lg px-2 py-1 text-[10px] font-medium text-gray-600 flex items-center gap-1 hover:bg-gray-50">
                            Last 7 month <svg class="w-3 h-3" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"></path></svg>
                        </button>
                    </div>
                    
                    <div class="flex-1 flex flex-col justify-end">
                        <div class="w-full h-32 bg-gray-100 rounded-xl relative overflow-hidden mb-4 mx-auto max-w-[180px]">
                            <svg viewBox="0 0 100 80" class="w-full h-full" preserveAspectRatio="none">
                                <path d="M0 80 L0 40 Q 50 10 100 30 V 80 Z" fill="#9CA3AF" fill-opacity="0.5" />
                             </svg>
                        </div>
                        
                        <div class="flex justify-between text-[10px] text-gray-400">
                            <span>24 Jan</span><span>25 Jan</span><span>26 Jan</span><span>27 Jan</span><span>28 Jan</span><span>29 Jan</span>
                        </div>
                    </div>
                </div>

            </div>

        </div>

    </div>
</div>

@endsection