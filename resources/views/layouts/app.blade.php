<!DOCTYPE html>
<html lang="id" class="h-full bg-base-950 text-sand-100">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'TaskCraft - UTS Pemrograman Web 2026')</title>

    {{-- Tailwind di-compile lokal dari resources/css/app.css lewat Vite, bukan CDN lagi.
         Jalankan `npm run build` (sekali) atau `npm run dev` (buat ngoding). --}}
    @vite(['resources/css/app.css', 'resources/js/app.js'])

    {{-- Font Plus Jakarta Sans, ambil dari Google Fonts --}}
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;500;600;700;800&display=swap" rel="stylesheet">
</head>
{{-- bg-base-950-nya dipindah ke <html> biar bintang di app.css kelihatan (lihat body::before) --}}
<body class="h-full flex flex-col font-sans antialiased text-sand-100">

    @if (!request()->is('login'))
        {{-- Panggil component navbar, lewat username buat ditampilin di pojok --}}
        <x-navbar :username="$username ?? 'Praktikan'" />
    @endif

    <main class="flex-1 max-w-7xl w-full mx-auto px-4 sm:px-6 lg:px-8 py-8">
        {{-- Tempat konten utama, nanti diisi oleh @section('content') di view lain --}}
        @yield('content')
    </main>

    @if (!request()->is('login'))
        {{-- Panggil component footer, pakai @include soalnya file blade biasa --}}
        @include('components.footer')
    @endif

</body>
</html>
