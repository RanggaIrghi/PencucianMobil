@extends('layouts.main')

@section('content')

<div class="flex h-screen w-full font-poppins overflow-hidden bg-[#F9FAFB]">
    
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

    <div class="w-full lg:w-7/12 flex flex-col h-full relative">
        
        <div class="px-8 py-6 flex justify-end items-center gap-6 lg:gap-10 text-sm font-medium text-gray-500">
            <a href="#" class="text-gray-900 border-b-2 border-gray-900 pb-1 font-semibold">Pesanan</a> <a href="#" class="hover:text-gray-900 transition">Keranjang</a>
            <a href="#" class="hover:text-gray-900 transition">Toko</a>
            <a href="#" class="hover:text-gray-900 transition">FAQ</a>
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

            <div class="w-full rounded-lg p-6 h-full max-h-[500px] overflow-y-auto bg-white shadow-sm">
                
                <div class="flex items-center justify-between border-b border-gray-200 pb-4 mb-4 text-xs lg:text-sm">
                    <div class="w-10 h-10 bg-[#6EE7B7] rounded-md shrink-0"></div>
                    
                    <div class="font-medium text-gray-700">#000000002</div>

                    <div class="text-gray-600">02/12/2025 06:24</div>

                    <div class="font-medium text-gray-800">Heldi</div>

                    <div class="font-bold text-gray-900">D 125 VN</div>

                    <div class="text-red-500 font-bold uppercase tracking-wide">QUEUE</div>

                    <a href="#" class="text-[#6EE7B7] hover:underline font-medium">detail</a>
                </div>

                </div>

            <div class="mt-8">
                <a href="{{ url('/') }}" class="inline-block bg-[#6EE7B7] hover:bg-[#4ADE80] text-teal-900 font-medium px-10 py-3 rounded-full shadow-md transition transform hover:-translate-y-1 text-center">
                    Kembali
                </a>
            </div>

        </div>
    </div>
</div>
@endsection