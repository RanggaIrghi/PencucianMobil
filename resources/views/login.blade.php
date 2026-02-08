@extends('layouts.main')

@section('content')

<div class="flex h-screen w-full font-poppins overflow-hidden">

    <div class="w-full lg:w-7/12 bg-white flex flex-col justify-center px-8 lg:px-20 relative">
        
        <div class="absolute top-8 left-8 lg:left-12 flex items-center gap-3">
            <div class="w-10 h-10 bg-gray-200 rounded-lg flex items-center justify-center">
                <svg class="w-6 h-6 text-gray-500" fill="currentColor" viewBox="0 0 24 24"><path d="M21 19V5c0-1.1-.9-2-2-2H5c-1.1 0-2 .9-2 2v14c0 1.1.9 2 2 2h14c1.1 0 2-.9 2-2zM8.5 13.5l2.5 3.01L14.5 12l4.5 6H5l3.5-4.5z"/></svg>
            </div>
            <h1 class="text-[#050B18] text-xl font-bold">Pencucian<span class="text-[#4ADE80]">Mobil</span></h1>
        </div>

        <div class="w-full max-w-md mx-auto mt-16 lg:mt-0">
            
            <h2 class="text-3xl font-bold text-[#050B18] mb-8">Login to your account</h2>

            <form action="{{ route('login') }}" method="POST" class="space-y-5">
                @csrf
                
                <div>
                    <input type="email" name="email" placeholder="Email" class="w-full bg-gray-50 text-gray-800 rounded-xl p-4 text-sm outline-none focus:ring-2 focus:ring-[#4ADE80] transition placeholder-gray-400">
                </div>

                <div class="relative" x-data="{ show: false }">
                    <input :type="show ? 'text' : 'password'" name="password" placeholder="Password" class="w-full bg-gray-50 text-gray-800 rounded-xl p-4 text-sm outline-none focus:ring-2 focus:ring-[#4ADE80] transition placeholder-gray-400">
                    
                    <button type="button" @click="show = !show" class="absolute inset-y-0 right-4 flex items-center text-gray-400 hover:text-gray-600">
                        <svg x-show="!show" class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13.875 18.825A10.05 10.05 0 0112 19c-4.478 0-8.268-2.943-9.543-7a9.97 9.97 0 011.563-3.029m5.858.908a3 3 0 114.243 4.243M9.878 9.878l4.242 4.242M9.88 9.88l-3.29-3.29m7.532 7.532l3.29 3.29M3 3l3.59 3.59m0 0A9.953 9.953 0 0112 5c4.478 0 8.268 2.943 9.543 7a10.025 10.025 0 01-4.132 5.411m0 0L21 21"></path></svg>
                        <svg x-show="show" style="display: none;" class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"></path><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"></path></svg>
                    </button>
                </div>

                <div class="flex items-center justify-between text-sm">
                    <label class="flex items-center gap-2 cursor-pointer">
                        <input type="checkbox" class="w-4 h-4 rounded border-gray-300 text-[#4ADE80] focus:ring-[#4ADE80]">
                        <span class="text-gray-600">Remember me</span>
                    </label>
                    <a href="#" class="text-[#4ADE80] hover:text-green-600 font-medium">Forgot Password?</a>
                </div>

                <button type="submit" class="w-full bg-[#6EE7B7] hover:bg-[#4ADE80] text-teal-900 font-bold py-4 rounded-xl shadow-[0_10px_20px_-10px_rgba(110,231,183,1)] transition transform hover:-translate-y-1">
                    Sign in with email
                </button>
            </form>

            <div class="flex items-center gap-4 my-8">
                <div class="h-px bg-gray-200 flex-1"></div>
                <span class="text-gray-400 text-sm">Or login with</span>
                <div class="h-px bg-gray-200 flex-1"></div>
            </div>

            <div class="flex gap-4">
                <button class="flex-1 flex items-center justify-center py-3.5 border border-gray-200 rounded-xl hover:bg-gray-50 transition">
                   <svg class="w-5 h-5" viewBox="0 0 24 24"><path d="M22.56 12.25c0-.78-.07-1.53-.2-2.25H12v4.26h5.92c-.26 1.37-1.04 2.53-2.21 3.31v2.77h3.57c2.08-1.92 3.28-4.74 3.28-8.09z" fill="#4285F4"/><path d="M12 23c2.97 0 5.46-.98 7.28-2.66l-3.57-2.77c-.98.66-2.23 1.06-3.71 1.06-2.86 0-5.29-1.93-6.16-4.53H2.18v2.84C3.99 20.53 7.7 23 12 23z" fill="#34A853"/><path d="M5.84 14.09c-.22-.66-.35-1.36-.35-2.09s.13-1.43.35-2.09V7.07H2.18C1.43 8.55 1 10.22 1 12s.43 3.45 1.18 4.93l2.85-2.84z" fill="#FBBC05"/><path d="M12 5.38c1.62 0 3.06.56 4.21 1.64l3.15-3.15C17.45 2.09 14.97 1 12 1 7.7 1 3.99 3.47 2.18 7.07l3.66 2.84c.87-2.6 3.3-4.53 6.16-4.53z" fill="#EA4335"/></svg>
                </button>
                <button class="flex-1 flex items-center justify-center py-3.5 border border-gray-200 rounded-xl hover:bg-gray-50 transition">
                    <svg class="w-6 h-6 text-black" fill="currentColor" viewBox="0 0 24 24"><path d="M17.05 20.28c-.98.95-2.05.8-3.08.35-1.09-.46-2.09-.48-3.24 0-1.44.62-2.2.44-3.06-.35C2.79 15.25 3.51 7.59 9.05 7.31c1.35.07 2.29.74 3.08.74 1.18 0 2.45-1.02 3.65-.89 1.43.16 2.52.82 3.19 1.83-2.99 1.66-2.47 5.75.64 7.02-.49 1.55-1.2 2.89-2.56 4.27zM12.03 7.25c-.15-2.23 1.66-4.07 3.74-4.25.29 2.58-2.34 4.5-3.74 4.25z"/></svg>
                </button>
            </div>

            <div class="mt-8 text-center text-sm text-gray-500">
                Don't have an account? 
                <a href="" class="text-[#4ADE80] font-bold hover:underline">Get Started</a>
            </div>

        </div>
    </div>

    <div class="hidden lg:flex w-5/12 bg-[#050B18] relative flex-col justify-center items-center overflow-hidden">
        
        <div class="absolute top-8 right-8 z-20">
            <button class="bg-[#4ADE80] text-white px-3 py-1 rounded-md flex items-center gap-1 shadow hover:bg-green-400 transition text-xs font-bold">
                EN <svg class="w-3 h-3" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path></svg>
            </button>
        </div>

        <div class="absolute top-24 left-10">
            <svg width="40" height="40" viewBox="0 0 50 50" fill="none"><path d="M25 0V10M25 40V50M0 25H10M40 25H50M7 7L14 14M36 36L43 43M7 43L14 36M36 14L43 7" stroke="#FACC15" stroke-width="3" stroke-linecap="round"/></svg>
        </div>

        <div class="absolute top-32 right-12 opacity-80">
            <svg width="80" height="80" viewBox="0 0 100 100" fill="none"><path d="M20 80 C 20 50, 80 50, 80 20 M 70 20 L 80 10 L 90 20" stroke="#14B8A6" stroke-width="2" fill="none" /></svg>
        </div>

        <div class="relative z-10">
            <div class="bg-white p-4 rounded-sm w-72 h-56 flex items-center justify-center shadow-lg">
                <svg class="w-24 h-24 text-gray-300" fill="currentColor" viewBox="0 0 24 24"><path d="M21 19V5c0-1.1-.9-2-2-2H5c-1.1 0-2 .9-2 2v14c0 1.1.9 2 2 2h14c1.1 0 2-.9 2-2zM8.5 13.5l2.5 3.01L14.5 12l4.5 6H5l3.5-4.5z"/></svg>
            </div>
        </div>

        <div class="absolute bottom-40 right-20 w-32">
            <svg viewBox="0 0 100 20" fill="none" stroke="white" stroke-width="2"><path d="M0 10 Q 50 20, 100 0" /></svg>
        </div>

    </div>

</div>
@endsection