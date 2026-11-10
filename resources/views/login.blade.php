@extends('layouts.app')

@section('title', 'Login - TaskCraft UTS PWEB 2026')

@section('content')
<div class="min-h-[80vh] flex flex-col justify-center items-center py-12 px-4 sm:px-6 lg:px-8">
    <div class="max-w-md w-full space-y-8 bg-base-900/90 p-8 rounded-2xl border border-base-800 shadow-2xl backdrop-blur-xl">
        
        {{-- Header Login --}}
        <div class="text-center">
            <div class="mx-auto w-16 h-16 bg-gradient-to-tr from-accent-500 to-accent-400 rounded-2xl flex items-center justify-center text-white shadow-lg shadow-accent-400/30 mb-4">
                <img src="{{ asset('images/lock-closed-cream.svg') }}" alt="lock-closed" class="w-10 h-10">
            </div>
            <h2 class="text-3xl font-extrabold text-white tracking-tight">Login</h2>
        </div>

        {{-- Form Login, action ke route login.post, method POST --}}
        <form class="mt-8 space-y-6" action="{{ route('login.post') }}" method="POST">
            @csrf
            
            <div class="space-y-4">
                <div>
                    <label for="username" class="block text-sm font-medium text-sand-200 mb-1">Username</label>
                    <div class="relative">
                        <input id="username" name="username" type="text" value="{{ old('username', $username ?? '') }}" required 
                               class="w-full px-4 py-3 bg-base-950 border border-base-800 rounded-xl text-white placeholder:text-sand-500 focus:outline-none focus:ring-2 focus:ring-accent-400 focus:border-transparent transition duration-200"
                               placeholder="Nama kamu">
                    </div>
                    @error('username')
                        <p class="mt-1 text-xs text-accent-400 font-medium">{{ $message }}</p>
                    @enderror
                </div>

                <div>
                    <label for="password" class="block text-sm font-medium text-sand-200 mb-1">Password</label>
                    <div class="relative">
                        <input id="password" name="password" type="password" required 
                               class="w-full px-4 py-3 bg-base-950 border border-base-800 rounded-xl text-white placeholder:text-sand-500 focus:outline-none focus:ring-2 focus:ring-accent-400 focus:border-transparent transition duration-200"
                               placeholder="Min. 4 karakter">
                    </div>
                    @error('password')
                        <p class="mt-1 text-xs text-accent-400 font-medium">{{ $message }}</p>
                    @enderror
                </div>
            </div>

            {{-- Tombol Submit --}}
            <div>
                <button type="submit" 
                        class="group relative w-full flex justify-center py-3.5 px-4 border border-transparent text-sm font-bold rounded-xl text-white bg-gradient-to-r from-accent-500 to-accent-400 hover:from-accent-400 hover:to-accent-400 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-accent-400 shadow-lg shadow-accent-500/30 transition duration-200">
                    <span class="absolute left-0 inset-y-0 flex items-center pl-3">
                        <img src="{{ asset('images/arrow-right-on-rectangle-cream.svg') }}" alt="arrow-right-on-rectangle" class="h-5 w-5">
                    </span>
                    Masuk
                </button>
            </div>
        </form>

    </div>
</div>
@endsection
