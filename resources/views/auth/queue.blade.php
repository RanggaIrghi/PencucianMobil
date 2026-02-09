@extends('layouts.main')

@section('content')

<div class="flex min-h-screen bg-[#F9FAFB] font-poppins">

    @include('partials.sidebar')

    <div class="flex-1 lg:ml-64 p-8">

        <div class="flex justify-between items-center mb-8">
            <div>
                <h1 class="text-2xl font-bold text-gray-800">Antrian</h1>
                <p class="text-xs text-gray-500">Let's check your store today</p>
            </div>

            <div class="flex items-center gap-6">
                <div class="relative hidden md:block">
                    <input type="text" placeholder="Search..."
                        class="bg-gray-100 border-none rounded-xl py-2.5 pl-10 pr-4 text-sm w-64 focus:ring-2 focus:ring-[#4ADE80] outline-none">
                    <svg class="w-5 h-5 text-gray-400 absolute left-3 top-2.5" fill="none" stroke="currentColor"
                        viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path>
                    </svg>
                </div>
                <button class="text-gray-500 hover:text-gray-700 relative">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z">
                        </path>
                    </svg>
                </button>
                <button class="text-gray-500 hover:text-gray-700 relative">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M15 17h5l-1.405-1.405A2.032 2.032 0 0118 14.158V11a6.002 6.002 0 00-4-5.659V5a2 2 0 10-4 0v.341C7.67 6.165 6 8.388 6 11v3.159c0 .538-.214 1.055-.595 1.436L4 17h5m6 0v1a3 3 0 11-6 0v-1m6 0H9">
                        </path>
                    </svg>
                    <span class="absolute top-0 right-0 w-2 h-2 bg-red-500 rounded-full"></span>
                </button>
                <div class="flex items-center gap-3 pl-4 border-l border-gray-200">
                    <div class="w-10 h-10 bg-gray-300 rounded-xl overflow-hidden">
                        <svg class="w-full h-full text-gray-500 bg-gray-200" fill="currentColor" viewBox="0 0 24 24">
                            <path
                                d="M24 20.993V24H0v-2.996A14.977 14.977 0 0112.004 15c4.904 0 9.26 2.354 11.996 5.993zM16.002 8.999a4 4 0 11-8 0 4 4 0 018 0z" />
                        </svg>
                    </div>
                    <div class="text-sm">
                        <p class="font-bold text-gray-800">Syabil</p>
                        <p class="text-xs text-gray-500">Admin</p>
                    </div>
                </div>
            </div>
        </div>

        <div class="border-b border-gray-200 mb-6">
            <nav class="flex gap-8 text-sm font-medium text-gray-500">
                <a href="#" class="pb-3 border-b-2 border-[#4ADE80] text-[#4ADE80] font-bold">All Orders</a>
                <a href="#" class="pb-3 border-b-2 border-transparent hover:text-gray-800 transition">Queue</a>
                <a href="#" class="pb-3 border-b-2 border-transparent hover:text-gray-800 transition">Washing</a>
                <a href="#" class="pb-3 border-b-2 border-transparent hover:text-gray-800 transition">Drying</a>
                <a href="#" class="pb-3 border-b-2 border-transparent hover:text-gray-800 transition">Finishing</a>
                <a href="#" class="pb-3 border-b-2 border-transparent hover:text-gray-800 transition">Completed</a>
            </nav>
        </div>

        <div class="flex flex-wrap items-center gap-4 mb-6">
                <form action="{{ route('queue') }}" method="GET"
                    class="flex-1 bg-white rounded-xl shadow-sm border border-gray-100 p-1 flex items-center">

                    <div class="p-3 text-gray-400">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path>
                        </svg>
                    </div>

                    <input type="text" name="search" value="{{ request('search') }}"
                        placeholder="Cari Invoice, Nama, atau Plat Nomor..."
                        class="w-full text-sm outline-none text-gray-700 placeholder-gray-400 bg-transparent"
                        autocomplete="off">

                    <button type="submit" class="hidden"></button>

                    @if(request('search'))
                    <a href="{{ route('queue') }}" class="pr-3 text-gray-400 hover:text-red-500 text-xs">
                        Reset
                    </a>
                    @endif
                </form>

            <button
                class="flex items-center gap-2 bg-white px-4 py-3 rounded-xl shadow-sm border border-gray-100 text-sm font-medium text-gray-600 hover:bg-gray-50">
                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M12 6V4m0 2a2 2 0 100 4m0-4a2 2 0 110 4m-6 8a2 2 0 100-4m0 4a2 2 0 110-4m0 4v2m0-6V4m6 6v10m6-2a2 2 0 100-4m0 4a2 2 0 110-4m0 4v2m0-6V4">
                    </path>
                </svg>
                Filters
            </button>

            <button
                class="flex items-center gap-2 bg-white px-4 py-3 rounded-xl shadow-sm border border-gray-100 text-sm font-medium text-gray-600 hover:bg-gray-50">
                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z">
                    </path>
                </svg>
                02/11 - 02/12
            </button>

            <button
                class="flex items-center gap-2 bg-white px-4 py-3 rounded-xl shadow-sm border border-gray-100 text-sm font-medium text-[#4ADE80] hover:bg-green-50">
                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M4 16v1a3 3 0 003 3h10a3 3 0 003-3v-1m-4-4l-4 4m0 0l-4-4m4 4V4"></path>
                </svg>
                Download
            </button>
        </div>

        <div class="bg-white rounded-2xl shadow-sm border border-gray-100 overflow-hidden">
            <table class="w-full text-left">
                <thead class="bg-white border-b border-gray-100">
                    <tr>
                        <th class="p-6 w-10">
                            <input type="checkbox"
                                class="w-4 h-4 rounded border-gray-300 text-[#4ADE80] focus:ring-[#4ADE80]">
                        </th>
                        <th class="p-6 text-xs font-bold text-gray-800 uppercase tracking-wider">
                            <div class="flex items-center gap-1 cursor-pointer">Invoice ID <svg
                                    class="w-3 h-3 text-gray-400" fill="currentColor" viewBox="0 0 24 24">
                                    <path d="M7 10l5 5 5-5z" /></svg></div>
                        </th>
                        <th class="p-6 text-xs font-bold text-gray-800 uppercase tracking-wider">
                            <div class="flex items-center gap-1 cursor-pointer">Date <svg class="w-3 h-3 text-gray-400"
                                    fill="currentColor" viewBox="0 0 24 24">
                                    <path d="M7 10l5 5 5-5z" /></svg></div>
                        </th>
                        <th class="p-6 text-xs font-bold text-gray-800 uppercase tracking-wider">
                            <div class="flex items-center gap-1 cursor-pointer">Customer <svg
                                    class="w-3 h-3 text-gray-400" fill="currentColor" viewBox="0 0 24 24">
                                    <path d="M7 10l5 5 5-5z" /></svg></div>
                        </th>
                        <th class="p-6 text-xs font-bold text-gray-800 uppercase tracking-wider">
                            <div class="flex items-center gap-1 cursor-pointer">No polisi <svg
                                    class="w-3 h-3 text-gray-400" fill="currentColor" viewBox="0 0 24 24">
                                    <path d="M7 10l5 5 5-5z" /></svg></div>
                        </th>
                        <th class="p-6 text-xs font-bold text-gray-800 uppercase tracking-wider">
                            <div class="flex items-center gap-1 cursor-pointer">Total <svg class="w-3 h-3 text-gray-400"
                                    fill="currentColor" viewBox="0 0 24 24">
                                    <path d="M7 10l5 5 5-5z" /></svg></div>
                        </th>
                        <th class="p-6 text-xs font-bold text-gray-800 uppercase tracking-wider">
                            <div class="flex items-center gap-1 cursor-pointer">Status <svg
                                    class="w-3 h-3 text-gray-400" fill="currentColor" viewBox="0 0 24 24">
                                    <path d="M7 10l5 5 5-5z" /></svg></div>
                        </th>
                        <th class="p-6 w-10"></th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-gray-100">
                    @foreach($transaksis as $item)
                    <tr class="hover:bg-gray-50 transition">
                        <td class="p-6">
                            <input type="checkbox"
                                class="w-4 h-4 rounded border-gray-300 text-[#4ADE80] focus:ring-[#4ADE80]">
                        </td>
                        <td class="p-6">
                            <div class="flex items-center gap-4">
                                <div
                                    class="w-8 h-8 rounded-lg bg-[#4ADE80] flex items-center justify-center text-white shrink-0">
                                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M19 14l-7 7m0 0l-7-7m7 7V3"></path>
                                    </svg>
                                </div>
                                <span class="text-sm font-medium text-gray-900">{{ $item->no_invoice }}</span>
                            </div>
                        </td>
                        <td class="p-6 text-sm text-gray-600">{{ $item->created_at->format('d/m/Y H:i') }}</td>
                        <td class="p-6 text-sm font-medium text-gray-900">{{ $item->kendaraan->pelanggan->nama }}</td>
                        <td class="p-6 text-sm text-gray-600">{{ $item->kendaraan->no_polisi }}</td>
                        <td class="p-6 text-sm font-medium text-gray-900">Rp
                            {{ number_format($item->total_harga, 0, ',', '.') }}</td>

                        <td class="p-6">
                            <div class="relative">
                                <select onchange="updateStatus(this, {{ $item->id }})" class="appearance-none cursor-pointer pl-3 pr-8 py-1 rounded-full text-xs font-bold uppercase tracking-wide border-0 focus:ring-2 focus:ring-offset-1 focus:outline-none transition-all
                        {{ $item->status == 'Queue' ? 'bg-red-50 text-red-500 focus:ring-red-200' : '' }}
                        {{ $item->status == 'Washing' ? 'bg-blue-50 text-blue-500 focus:ring-blue-200' : '' }}
                        {{ $item->status == 'Finished' ? 'bg-green-50 text-green-500 focus:ring-green-200' : '' }}
                        ">
                                    <option value="Queue" {{ $item->status == 'Queue' ? 'selected' : '' }}>Queue
                                    </option>
                                    <option value="Washing" {{ $item->status == 'Washing' ? 'selected' : '' }}>Washing
                                    </option>
                                    <option value="Finished" {{ $item->status == 'Finished' ? 'selected' : '' }}>
                                        Finished</option>
                                </select>
                                <div class="pointer-events-none absolute inset-y-0 right-2 flex items-center">
                                    <svg class="w-3 h-3 text-current opacity-70" fill="none" stroke="currentColor"
                                        viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M19 9l-7 7-7-7"></path>
                                    </svg>
                                </div>
                            </div>
                        </td>

                        <td class="p-6 text-right">
                            <button class="text-gray-400 hover:text-gray-600">
                                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M4 4v5h.582m15.356 2A8.001 8.001 0 004.582 9m0 0H9m11 11v-5h-.581m0 0a8.003 8.003 0 01-15.357-2m15.357 2H15">
                                    </path>
                                </svg>
                            </button>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>

    </div>
</div>

@endsection

<script>
    function updateStatus(selectElement, id) {
        const newStatus = selectElement.value;
        const originalClass = selectElement.className;
        selectElement.style.opacity = '0.5';
        selectElement.disabled = true;
        fetch(`/admin/transaksi/${id}/status`, {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                    'X-CSRF-TOKEN': '{{ csrf_token() }}'
                },
                body: JSON.stringify({
                    status: newStatus
                })
            })
            .then(response => response.json())
            .then(data => {
                if (data.success) {
                    selectElement.className =
                        "appearance-none cursor-pointer pl-3 pr-8 py-1 rounded-full text-xs font-bold uppercase tracking-wide border-0 focus:ring-2 focus:ring-offset-1 focus:outline-none transition-all ";
                    if (newStatus === 'Queue') {
                        selectElement.classList.add('bg-red-50', 'text-red-500', 'focus:ring-red-200');
                    } else if (newStatus === 'Washing') {
                        selectElement.classList.add('bg-blue-50', 'text-blue-500', 'focus:ring-blue-200');
                    } else if (newStatus === 'Finished') {
                        selectElement.classList.add('bg-green-50', 'text-green-500', 'focus:ring-green-200');
                    }
                } else {
                    alert('Gagal update status');
                }
            })
            .catch(error => {
                console.error('Error:', error);
                alert('Terjadi kesalahan sistem');
            })
            .finally(() => {
                selectElement.style.opacity = '1';
                selectElement.disabled = false;
            });
    }
</script>