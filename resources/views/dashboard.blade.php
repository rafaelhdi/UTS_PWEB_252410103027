@extends('layouts.app')

@section('title', 'Dashboard Utama - TaskCraft UTS PWEB 2026')

@section('content')
<div class="space-y-8">

    {{-- Banner Welcome, nampilin username yang di-forward dari login --}}
    <div class="rounded-2xl bg-gradient-to-r from-base-800/60 via-base-900 to-base-900 border border-base-800 p-7 shadow-xl flex flex-col md:flex-row md:items-center md:justify-between gap-5">
        <h1 class="flex items-center gap-2.5 text-3xl sm:text-4xl font-extrabold text-white tracking-tight">
            <span>Halo, <span class="text-transparent bg-clip-text bg-gradient-to-r from-accent-300 to-accent-200">{{ $username }}</span>!</span>
            <img src="{{ asset('images/hand-raised-accent.svg') }}" alt="hand-raised" class="w-7 h-7 shrink-0">
        </h1>
        <div class="flex flex-wrap gap-3 md:justify-end">
            <a href="{{ route('pengelolaan', ['username' => $username]) }}"
               class="inline-flex items-center px-4 py-2.5 rounded-xl text-sm font-bold bg-accent-500 hover:bg-accent-400 text-white shadow-lg shadow-accent-500/30 transition">
                <img src="{{ asset('images/clipboard-document-check-cream.svg') }}" alt="clipboard-document-check" class="w-4 h-4 mr-2">
                Kelola Tugas
            </a>
            <a href="{{ route('profile', ['username' => $username]) }}"
               class="inline-flex items-center px-4 py-2.5 rounded-xl text-sm font-semibold bg-base-800 hover:bg-base-700 text-sand-100 border border-base-700 transition">
                <img src="{{ asset('images/user-circle-cream.svg') }}" alt="user-circle" class="w-4 h-4 mr-2">
                Profil Saya
            </a>
        </div>
    </div>

    {{-- Grid Statistik Cards --}}
    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-5">

        {{-- Total Tasks --}}
        <div class="bg-base-900 border border-base-800 rounded-2xl p-6 shadow-lg hover:border-base-700 transition">
            <div class="flex items-center justify-between">
                <div>
                    <p class="text-xs font-semibold uppercase tracking-wider text-sand-400">Total Tugas</p>
                    <p class="text-3xl font-extrabold text-white mt-2">{{ $stats['total_tasks'] }}</p>
                </div>
                <div class="w-12 h-12 rounded-xl bg-accent-400/10 text-accent-300 border border-accent-400/20 flex items-center justify-center">
                    <img src="{{ asset('images/folder-accent.svg') }}" alt="folder" class="w-6 h-6">
                </div>
            </div>
        </div>

        {{-- Completed Tasks --}}
        <div class="bg-base-900 border border-base-800 rounded-2xl p-6 shadow-lg hover:border-base-700 transition">
            <div class="flex items-center justify-between">
                <div>
                    <p class="text-xs font-semibold uppercase tracking-wider text-accent-300">Selesai</p>
                    <p class="text-3xl font-extrabold text-accent-300 mt-2">{{ $stats['completed_tasks'] }}</p>
                </div>
                <div class="w-12 h-12 rounded-xl bg-accent-500/10 text-accent-300 border border-accent-500/20 flex items-center justify-center">
                    <img src="{{ asset('images/check-circle-accent.svg') }}" alt="check-circle" class="w-6 h-6">
                </div>
            </div>
        </div>

        {{-- In Progress --}}
        <div class="bg-base-900 border border-base-800 rounded-2xl p-6 shadow-lg hover:border-base-700 transition">
            <div class="flex items-center justify-between">
                <div>
                    <p class="text-xs font-semibold uppercase tracking-wider text-sand-300">Dalam Proses</p>
                    <p class="text-3xl font-extrabold text-sand-300 mt-2">{{ $stats['in_progress_tasks'] }}</p>
                </div>
                <div class="w-12 h-12 rounded-xl bg-sand-300/10 text-sand-300 border border-sand-300/20 flex items-center justify-center">
                    <img src="{{ asset('images/bolt-sand.svg') }}" alt="bolt" class="w-6 h-6">
                </div>
            </div>
        </div>

        {{-- Pending --}}
        <div class="bg-base-900 border border-base-800 rounded-2xl p-6 shadow-lg hover:border-base-700 transition">
            <div class="flex items-center justify-between">
                <div>
                    <p class="text-xs font-semibold uppercase tracking-wider text-accent-400">Belum Dimulai</p>
                    <p class="text-3xl font-extrabold text-accent-400 mt-2">{{ $stats['pending_tasks'] }}</p>
                </div>
                <div class="w-12 h-12 rounded-xl bg-accent-600/10 text-accent-400 border border-accent-600/20 flex items-center justify-center">
                    <img src="{{ asset('images/clock-accent.svg') }}" alt="clock" class="w-6 h-6">
                </div>
            </div>
        </div>

    </div>

    {{-- Ringkasan Tugas Terbaru --}}
    <div class="bg-base-900 border border-base-800 rounded-2xl p-6 shadow-xl space-y-4">
        <div class="flex items-center justify-between pb-4 border-b border-base-800">
            <div>
                <h2 class="text-lg font-bold text-white flex items-center gap-2"><img src="{{ asset('images/chart-bar-square-accent.svg') }}" alt="chart-bar-square" class="w-5 h-5">Tugas Terbaru</h2>
            </div>
            <a href="{{ route('pengelolaan', ['username' => $username]) }}" class="text-xs font-semibold text-accent-300 hover:text-accent-200">
                Selengkapnya <img src="{{ asset('images/arrow-right-accent.svg') }}" alt="arrow-right" class="w-3.5 h-3.5 inline-block align-middle">
            </a>
        </div>

        <div class="overflow-x-auto">
            <table class="w-full text-left text-sm text-sand-200">
                <thead class="bg-base-950 text-sand-400 uppercase text-xs">
                    <tr>
                        <th class="px-4 py-3 rounded-l-lg">ID</th>
                        <th class="px-4 py-3">Judul Tugas</th>
                        <th class="px-4 py-3">Kategori</th>
                        <th class="px-4 py-3">Deadline</th>
                        <th class="px-4 py-3 rounded-r-lg">Status</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-base-800/60">
                    @foreach ($recentTasks as $task)
                        <tr class="hover:bg-base-800/40 transition">
                            <td class="px-4 py-3.5 font-mono text-xs text-sand-400">{{ $task['id'] }}</td>
                            <td class="px-4 py-3.5 font-semibold text-sand-100">{{ $task['title'] }}</td>
                            <td class="px-4 py-3.5"><span class="bg-base-800 text-sand-200 px-2.5 py-1 rounded-md text-xs font-medium">{{ $task['category'] }}</span></td>
                            <td class="px-4 py-3.5 text-xs text-sand-400">{{ $task['deadline'] }}</td>
                            <td class="px-4 py-3.5">
                                @if ($task['status'] === 'Selesai')
                                    <span class="bg-accent-500/10 text-accent-300 border border-accent-500/20 px-2.5 py-1 rounded-full text-xs font-medium">Selesai</span>
                                @elseif ($task['status'] === 'Dalam Proses')
                                    <span class="bg-sand-300/10 text-sand-300 border border-sand-300/20 px-2.5 py-1 rounded-full text-xs font-medium">Dalam Proses</span>
                                @else
                                    <span class="bg-accent-600/10 text-accent-400 border border-accent-600/20 px-2.5 py-1 rounded-full text-xs font-medium">Belum Dimulai</span>
                                @endif
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>

</div>
@endsection
