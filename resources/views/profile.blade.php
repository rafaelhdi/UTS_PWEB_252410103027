@extends('layouts.app')

@section('title', 'Profil Pengguna - TaskCraft UTS PWEB 2026')

@section('content')
<div class="max-w-4xl mx-auto space-y-8">

    {{-- Card Header Profil --}}
    <div class="bg-base-900 border border-base-800 rounded-2xl p-8 shadow-xl relative overflow-hidden">
        <div class="absolute -right-10 -top-10 w-48 h-48 bg-accent-500/10 rounded-full blur-3xl pointer-events-none"></div>
        
        <div class="flex flex-col sm:flex-row items-center sm:items-start gap-6 relative z-10">
            {{-- Avatar: foto profil dari public/images/profile.jpg --}}
            <img src="{{ asset('images/profile.jpg') }}" alt="Foto profil {{ $profileData['username'] }}"
                 class="w-24 h-24 sm:w-28 sm:h-28 rounded-2xl object-cover shadow-xl shadow-accent-400/20 border-2 border-accent-300/30">

            {{-- Details --}}
            <div class="flex-1 text-center sm:text-left space-y-2">
                <div class="inline-flex items-center space-x-2 bg-accent-400/10 border border-accent-400/20 px-3 py-1 rounded-full text-xs font-semibold text-accent-300">
                    <span>{{ $profileData['role'] }}</span>
                </div>
                <h1 class="text-3xl font-extrabold text-white tracking-tight">{{ $profileData['username'] }}</h1>
                <p class="text-sand-200 font-medium text-sm">{{ $profileData['fullname'] }}</p>
                <div class="flex flex-wrap justify-center sm:justify-start gap-4 text-xs text-sand-400 pt-1">
                    <span class="flex items-center space-x-1">
                        <span class="text-accent-300 font-semibold">NIM:</span>
                        <span>{{ $profileData['nim'] }}</span>
                    </span>
                    <span>•</span>
                    <span class="flex items-center space-x-1">
                        <span class="text-accent-300 font-semibold">Kelas:</span>
                        <span>{{ $profileData['class'] }}</span>
                    </span>
                    <span>•</span>
                    <span class="flex items-center space-x-1">
                        <span class="text-accent-300 font-semibold">Email:</span>
                        <span>{{ $profileData['email'] }}</span>
                    </span>
                </div>
            </div>
        </div>
    </div>

    {{-- Card isi profil & keahlian; items-start biar kartu kiri gak ditarik tinggi kolom kanan --}}
    <div class="grid grid-cols-1 md:grid-cols-3 gap-6 items-start">
        
        {{-- Bio & Deskripsi --}}
        <div class="md:col-span-2 bg-base-900 border border-base-800 rounded-2xl p-6 shadow-xl space-y-6">
            <div>
                <h2 class="text-lg font-bold text-white mb-2 flex items-center space-x-2">
                    <img src="{{ asset('images/user-circle-accent.svg') }}" alt="user-circle" class="w-5 h-5">
                    <span>Tentang Saya</span>
                </h2>
                <p class="text-sand-200 text-sm leading-relaxed">
                    {{ $profileData['bio'] }}
                </p>
            </div>

            {{-- Tag Cloud Skill & Keahlian --}}
            <div>
                <h3 class="text-sm font-bold text-sand-100 mb-3 uppercase tracking-wider text-xs">Keahlian</h3>
                <div class="flex flex-wrap gap-2">
                    @foreach ($profileData['skills'] as $skill)
                                            <span class="bg-base-950 border border-base-800 text-accent-200 text-xs font-semibold px-3 py-1.5 rounded-xl shadow-sm flex items-center gap-1">
                                                <img src="{{ asset('images/sparkles-accent.svg') }}" alt="sparkles" class="w-3.5 h-3.5">
                                                {{ $skill }}
                                            </span>
                                        @endforeach
                </div>
            </div>

        </div>

        {{-- Quick Stats & Action --}}
        <div class="space-y-6">
            <div class="bg-base-900 border border-base-800 rounded-2xl p-6 shadow-xl space-y-4">
                <h3 class="text-xs font-bold text-white uppercase tracking-wider">Pencapaian</h3>
                
                <div class="space-y-3">
                    <div class="flex items-center justify-between p-3 rounded-xl bg-base-950 border border-base-800">
                        <span class="text-xs text-sand-400 font-medium">Project Dikelola</span>
                        <span class="font-extrabold text-accent-300 text-base">{{ $profileData['total_project'] }}</span>
                    </div>
                    <div class="flex items-center justify-between p-3 rounded-xl bg-base-950 border border-base-800">
                        <span class="text-xs text-sand-400 font-medium">Task Selesai</span>
                        <span class="font-extrabold text-accent-300 text-base">{{ $profileData['completed'] }}</span>
                    </div>
                </div>
            </div>

            <div class="bg-base-900 border border-base-800 rounded-2xl p-6 shadow-xl text-center space-y-3">
                <h4 class="text-xs font-bold text-sand-400 uppercase tracking-wider">Aksi Cepat</h4>
                <a href="{{ route('dashboard', ['username' => $profileData['username']]) }}" 
                   class="block w-full py-2.5 px-4 rounded-xl text-xs font-bold text-white bg-accent-500 hover:bg-accent-400 transition shadow-lg shadow-accent-500/30">
                    Kembali ke Dashboard
                </a>
                <a href="{{ route('pengelolaan', ['username' => $profileData['username']]) }}" 
                   class="block w-full py-2.5 px-4 rounded-xl text-xs font-semibold text-sand-200 bg-base-800 hover:bg-base-700 transition border border-base-700">
                    Buka Pengelolaan Tugas
                </a>
            </div>
        </div>

    </div>

</div>
@endsection
