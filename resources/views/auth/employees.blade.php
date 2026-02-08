@extends('layouts.main')

@section('content')

<div class="flex min-h-screen bg-[#F9FAFB] font-poppins">
    
    @include('partials.sidebar')

    <div class="flex-1 lg:ml-64 p-8">
        
        <div class="flex justify-between items-center mb-8">
            <div>
                <h1 class="text-2xl font-bold text-gray-800">Karyawan</h1> <p class="text-xs text-gray-500">Let's check your store today</p>
            </div>
            
            <div class="flex items-center gap-6">
                <div class="relative hidden md:block">
                    <input type="text" placeholder="Search..." class="bg-gray-100 border-none rounded-xl py-2.5 pl-10 pr-4 text-sm w-64 focus:ring-2 focus:ring-[#4ADE80] outline-none">
                    <svg class="w-5 h-5 text-gray-400 absolute left-3 top-2.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path></svg>
                </div>

                <button class="text-gray-500 hover:text-gray-700 relative">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"></path></svg>
                </button>
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

        <div class="flex flex-wrap items-center gap-4 mb-6">
            <div class="flex-1 bg-white rounded-xl shadow-sm border border-gray-100 p-1 flex items-center">
                <div class="p-3 text-gray-400">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path></svg>
                </div>
                <input type="text" placeholder="Search by ID, product, or others..." class="w-full text-sm outline-none text-gray-700 placeholder-gray-400 bg-transparent">
            </div>

            <button class="flex items-center gap-2 bg-white px-4 py-3 rounded-xl shadow-sm border border-gray-100 text-sm font-medium text-gray-600 hover:bg-gray-50">
                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6V4m0 2a2 2 0 100 4m0-4a2 2 0 110 4m-6 8a2 2 0 100-4m0 4a2 2 0 110-4m0 4v2m0-6V4m6 6v10m6-2a2 2 0 100-4m0 4a2 2 0 110-4m0 4v2m0-6V4"></path></svg>
                Filters
            </button>

            <a href="#" class="flex items-center gap-2 bg-white px-6 py-3 rounded-xl shadow-sm border border-gray-100 text-sm font-bold text-gray-600 hover:bg-gray-50 hover:text-[#4ADE80] transition">
                +Tambah
            </a>
        </div>

        <div class="bg-white rounded-2xl shadow-sm border border-gray-100 overflow-hidden">
            <table class="w-full text-left">
                <thead class="bg-white border-b border-gray-100">
                    <tr>
                        <th class="p-6 w-10">
                            <input type="checkbox" class="w-4 h-4 rounded border-gray-300 text-[#4ADE80] focus:ring-[#4ADE80]">
                        </th>
                        <th class="p-6 text-xs font-bold text-gray-800 uppercase tracking-wider w-1/5">
                            <div class="flex items-center gap-1 cursor-pointer">Nama <svg class="w-3 h-3 text-gray-400" fill="currentColor" viewBox="0 0 24 24"><path d="M7 10l5 5 5-5z"/></svg></div>
                        </th>
                        <th class="p-6 text-xs font-bold text-gray-800 uppercase tracking-wider w-1/5">
                            <div class="flex items-center gap-1 cursor-pointer">alamat <svg class="w-3 h-3 text-gray-400" fill="currentColor" viewBox="0 0 24 24"><path d="M7 10l5 5 5-5z"/></svg></div>
                        </th>
                        <th class="p-6 text-xs font-bold text-gray-800 uppercase tracking-wider w-1/5">
                            <div class="flex items-center gap-1 cursor-pointer">Mail <svg class="w-3 h-3 text-gray-400" fill="currentColor" viewBox="0 0 24 24"><path d="M7 10l5 5 5-5z"/></svg></div>
                        </th>
                        <th class="p-6 text-xs font-bold text-gray-800 uppercase tracking-wider w-1/6">
                            <div class="flex items-center gap-1 cursor-pointer">No tlp <svg class="w-3 h-3 text-gray-400" fill="currentColor" viewBox="0 0 24 24"><path d="M7 10l5 5 5-5z"/></svg></div>
                        </th>
                        <th class="p-6 text-xs font-bold text-gray-800 uppercase tracking-wider w-20">
                            <div class="flex items-center gap-1 cursor-pointer">umur <svg class="w-3 h-3 text-gray-400" fill="currentColor" viewBox="0 0 24 24"><path d="M7 10l5 5 5-5z"/></svg></div>
                        </th>
                        <th class="p-6 text-xs font-bold text-gray-800 uppercase tracking-wider text-right">
                            <div class="flex items-center justify-end gap-1 cursor-pointer">Status <svg class="w-3 h-3 text-gray-400" fill="currentColor" viewBox="0 0 24 24"><path d="M7 10l5 5 5-5z"/></svg></div>
                        </th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-gray-100">
                    
                    <tr class="hover:bg-gray-50 transition group">
                        <td class="p-6 align-middle">
                            <input type="checkbox" class="w-4 h-4 rounded border-gray-300 text-[#4ADE80] focus:ring-[#4ADE80]">
                        </td>
                        <td class="p-6 align-middle">
                            <div class="flex items-center gap-4">
                                <div class="w-10 h-10 rounded-xl bg-[#34D399] flex items-center justify-center text-white shrink-0">
                                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"></path></svg>
                                </div>
                                <span class="text-sm font-medium text-gray-900">Syabil</span>
                            </div>
                        </td>
                        <td class="p-6 text-sm text-gray-800 align-middle">Rancasawo</td>
                        <td class="p-6 text-sm text-gray-800 align-middle">syabil@gmail.com</td>
                        <td class="p-6 text-sm text-gray-800 align-middle">08212323234</td>
                        <td class="p-6 text-sm font-bold text-gray-800 align-middle text-center">22</td>
                        <td class="p-6 text-right align-middle">
                            <a href="#" class="text-[#4ADE80] font-medium text-sm hover:underline">Detail</a>
                        </td>
                    </tr>

                    </tbody>
            </table>
        </div>

    </div>
</div>

@endsection