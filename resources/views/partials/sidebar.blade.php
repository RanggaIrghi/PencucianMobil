<div class="w-64 bg-white h-screen fixed left-0 top-0 border-r border-gray-100 flex flex-col z-50 hidden lg:flex">
    
    <div class="p-8 flex items-center gap-3">
        <div class="w-8 h-8 bg-gray-200 rounded-lg flex items-center justify-center">
            <svg class="w-5 h-5 text-gray-500" fill="currentColor" viewBox="0 0 24 24"><path d="M21 19V5c0-1.1-.9-2-2-2H5c-1.1 0-2 .9-2 2v14c0 1.1.9 2 2 2h14c1.1 0 2-.9 2-2zM8.5 13.5l2.5 3.01L14.5 12l4.5 6H5l3.5-4.5z"/></svg>
        </div>
        <h1 class="text-xl font-bold text-teal-900">Car<span class="text-[#4ADE80]">Wash</span></h1>
        
        <button class="ml-auto text-gray-400 hover:text-gray-600">
            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7"></path></svg>
        </button>
    </div>

    <div class="flex-1 px-4 space-y-2 overflow-y-auto">
        <p class="px-4 text-xs font-bold text-gray-400 uppercase mb-4 mt-2">Overview</p>

        <a href="{{ route('transaction') }}" 
           class="flex items-center gap-3 px-4 py-3 rounded-xl transition-colors font-medium
           {{ request()->routeIs('transaction') ? 'text-[#4ADE80] bg-green-50' : 'text-gray-500 hover:text-gray-900 hover:bg-gray-50' }}">
            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 10h18M7 15h1m4 0h1m-7 4h12a3 3 0 003-3V8a3 3 0 00-3-3H6a3 3 0 00-3 3v8a3 3 0 003 3z"></path></svg>
            Transaksi Baru
        </a>

        <a href="#" 
           class="flex items-center gap-3 px-4 py-3 rounded-xl transition-colors font-medium text-gray-500 hover:text-gray-900 hover:bg-gray-50">
            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 9V7a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2m2 4h10a2 2 0 002-2v-6a2 2 0 00-2-2H9a2 2 0 00-2 2v6a2 2 0 002 2zm7-5a2 2 0 11-4 0 2 2 0 014 0z"></path></svg>
            Pembayaran
        </a>

        <a href="#" 
           class="flex items-center gap-3 px-4 py-3 rounded-xl transition-colors font-medium text-gray-500 hover:text-gray-900 hover:bg-gray-50 justify-between">
            <div class="flex items-center gap-3">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197M13 7a4 4 0 11-8 0 4 4 0 018 0z"></path></svg>
                Antrian
            </div>
            <span class="bg-[#2c3e50] text-white text-xs font-bold px-2 py-0.5 rounded-full">1</span>
        </a>

        <a href="#" 
           class="flex items-center gap-3 px-4 py-3 rounded-xl transition-colors font-medium text-gray-500 hover:text-gray-900 hover:bg-gray-50">
            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 11a7 7 0 01-7 7m0 0a7 7 0 01-7-7m7 7v4m0 0H8m4 0h4m-4-8a3 3 0 01-3-3V5a3 3 0 116 0v6a3 3 0 01-3 3z"></path></svg>
            Karyawan
        </a>

        <a href="#" 
           class="flex items-center gap-3 px-4 py-3 rounded-xl transition-colors font-medium text-gray-500 hover:text-gray-900 hover:bg-gray-50">
            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 17v-2m3 2v-4m3 4v-6m2 10H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"></path></svg>
            Laporan
        </a>
    </div>
</div>