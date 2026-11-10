@extends('layouts.app')

@section('title', 'Pengelolaan Tugas & Project - TaskCraft UTS PWEB 2026')

@section('content')
<div class="space-y-6">

    {{-- Header Pengelolaan --}}
    <div class="flex flex-col md:flex-row md:items-center justify-between gap-4 bg-base-900 border border-base-800 p-6 rounded-2xl shadow-xl">
        <div>
            <h1 class="text-2xl sm:text-3xl font-extrabold text-white">Daftar Tugas</h1>
        </div>
        
        <div class="flex items-center space-x-3">
            <span class="bg-accent-500/20 text-accent-200 border border-accent-400/30 px-3.5 py-2 rounded-xl text-xs font-bold">
                Total: {{ count($tasks) }} Tugas
            </span>
        </div>
    </div>

    {{-- Tabel Pengelolaan Data Tasks (loop foreach) --}}
    <div class="bg-base-900 border border-base-800 rounded-2xl shadow-xl overflow-hidden">
        <div class="overflow-x-auto">
            <table class="w-full text-left border-collapse">
                <thead class="bg-base-950 text-sand-400 uppercase text-xs tracking-wider border-b border-base-800">
                    <tr>
                        <th class="px-5 py-4">Kode</th>
                        <th class="px-5 py-4">Tugas</th>
                        <th class="px-5 py-4">Kategori</th>
                        <th class="px-5 py-4">Penanggung Jawab</th>
                        <th class="px-5 py-4">Deadline</th>
                        <th class="px-5 py-4">Prioritas</th>
                        <th class="px-5 py-4">Status</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-base-800/80 text-sm">
                    {{-- Implementasi Perulangan @foreach sesuai Rubrik UTS --}}
                    @foreach ($tasks as $item)
                        <tr class="hover:bg-base-800/50 transition">
                            {{-- Kode --}}
                            <td class="px-5 py-4 font-mono text-xs text-accent-300 font-bold">
                                {{ $item['code'] }}
                            </td>

                            {{-- Nama Tugas & Project --}}
                            <td class="px-5 py-4">
                                <div class="font-bold text-white text-base">{{ $item['name'] }}</div>
                                <div class="text-xs text-sand-400 flex items-center space-x-1 mt-0.5">
                                    <img src="{{ asset('images/folder-sand.svg') }}" alt="folder" class="w-3.5 h-3.5">
                                    <span>{{ $item['project'] }}</span>
                                </div>
                            </td>

                            {{-- Kategori --}}
                            <td class="px-5 py-4">
                                <span class="bg-base-950 text-sand-200 border border-base-800 px-3 py-1 rounded-lg text-xs font-semibold inline-flex items-center gap-1.5">
                                    {{-- Ikon beda-beda sesuai kategori biar gampang dibaca --}}
                                    @if (str_contains($item['category'], 'UI/UX'))
                                        <img src="{{ asset('images/sparkles-accent.svg') }}" alt="sparkles" class="w-3.5 h-3.5">
                                    @elseif (str_contains($item['category'], 'Component'))
                                        <img src="{{ asset('images/cube-accent.svg') }}" alt="cube" class="w-3.5 h-3.5">
                                    @elseif (str_contains($item['category'], 'Controller'))
                                        <img src="{{ asset('images/wrench-accent.svg') }}" alt="wrench" class="w-3.5 h-3.5">
                                    @elseif (str_contains($item['category'], 'Engine'))
                                        <img src="{{ asset('images/cube-sand.svg') }}" alt="cube" class="w-3.5 h-3.5">
                                    @elseif (str_contains($item['category'], 'Dokumentasi'))
                                        <img src="{{ asset('images/document-text-sand.svg') }}" alt="document-text" class="w-3.5 h-3.5">
                                    @else
                                        <img src="{{ asset('images/folder-sand.svg') }}" alt="folder" class="w-3.5 h-3.5">
                                    @endif
                                    {{ $item['category'] }}
                                </span>
                            </td>

                            {{-- Assignee --}}
                            <td class="px-5 py-4">
                                <div class="flex items-center space-x-2">
                                    <div class="w-7 h-7 rounded-full bg-gradient-to-tr from-accent-500 to-accent-400 text-white font-bold flex items-center justify-center text-xs">
                                        {{ strtoupper(substr($item['assignee'], 0, 1)) }}
                                    </div>
                                    <span class="text-sand-100 font-medium text-xs">{{ $item['assignee'] }}</span>
                                </div>
                            </td>

                            {{-- Deadline --}}
                            <td class="px-5 py-4 text-xs text-sand-200 font-medium">
                                {{ $item['deadline'] }}
                            </td>

                            {{-- Prioritas --}}
                            <td class="px-5 py-4">
                                @if ($item['priority'] === 'Tinggi')
                                    <span class="bg-accent-600/10 text-accent-400 border border-accent-600/20 px-2.5 py-1 rounded-full text-xs font-semibold">Tinggi</span>
                                @elseif ($item['priority'] === 'Sedang')
                                    <span class="bg-sand-300/10 text-sand-300 border border-sand-300/20 px-2.5 py-1 rounded-full text-xs font-semibold">Sedang</span>
                                @else
                                    <span class="bg-base-800 text-sand-400 px-2.5 py-1 rounded-full text-xs font-semibold">Rendah</span>
                                @endif
                            </td>

                            {{-- Status & Progress --}}
                            <td class="px-5 py-4">
                                <div class="space-y-1.5">
                                    <div class="flex items-center justify-between text-xs">
                                        @if ($item['status'] === 'Selesai')
                                            <span class="text-accent-300 font-bold">Selesai</span>
                                        @elseif ($item['status'] === 'Dalam Proses')
                                            <span class="text-sand-300 font-bold">Dalam Proses</span>
                                        @else
                                            <span class="text-accent-400 font-bold">Belum Dimulai</span>
                                        @endif
                                        <span class="text-sand-500 font-mono text-[11px]">{{ $item['progress'] }}%</span>
                                    </div>
                                    {{-- Progress Bar --}}
                                    <div class="w-full bg-base-950 rounded-full h-1.5 overflow-hidden border border-base-800">
                                        <div class="h-full rounded-full transition-all duration-500 {{ $item['status'] === 'Selesai' ? 'bg-accent-500' : ($item['status'] === 'Dalam Proses' ? 'bg-sand-300' : 'bg-accent-600') }}" 
                                             style="width: {{ $item['progress'] }}%">
                                        </div>
                                    </div>
                                </div>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>

</div>
@endsection
