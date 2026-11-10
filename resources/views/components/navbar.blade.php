<nav class="bg-base-900 text-white border-b border-base-800 sticky top-0 z-50 shadow-md">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex items-center justify-between h-16">
            <!-- Brand Logo, pake asset() helper biar path-nya otomatis benar -->
            <div class="flex place-items-center space-x-3">
                <img src="{{ asset('images/logo.svg') }}" alt="Logo TaskCraft" class="w-10 h-10 rounded-lg shadow-lg shadow-accent-400/30 object-cover">
                <div>
                    <span class="font-extrabold text-lg tracking-wide text-transparent bg-clip-text bg-gradient-to-r from-accent-300 to-accent-200">TaskCraft</span>
                    <span class="text-xs block text-sand-400 font-medium">UTS Pemrograman Web 2026</span>
                </div>
            </div>

            <!-- Nav Links, tiap link bawa username lewat route param -->
            <div class="hidden md:flex items-center space-x-1">
                <a href="{{ route('dashboard', ['username' => $username ?? 'Praktikan']) }}"
                   class="px-4 py-2 rounded-lg text-sm font-semibold transition duration-150 {{ request()->is('dashboard') ? 'bg-accent-500/30 text-accent-200 border border-accent-400/40' : 'text-sand-200 hover:bg-base-800 hover:text-white' }}">
                    Dashboard
                </a>
                <a href="{{ route('pengelolaan', ['username' => $username ?? 'Praktikan']) }}"
                   class="px-4 py-2 rounded-lg text-sm font-semibold transition duration-150 {{ request()->is('pengelolaan') ? 'bg-accent-500/30 text-accent-200 border border-accent-400/40' : 'text-sand-200 hover:bg-base-800 hover:text-white' }}">
                    Pengelolaan Tugas
                </a>
                <a href="{{ route('profile', ['username' => $username ?? 'Praktikan']) }}"
                   class="px-4 py-2 rounded-lg text-sm font-semibold transition duration-150 {{ request()->is('profile') ? 'bg-accent-500/30 text-accent-200 border border-accent-400/40' : 'text-sand-200 hover:bg-base-800 hover:text-white' }}">
                    Profil Pengguna
                </a>
            </div>

            <!-- User Info Badge & Logout -->
            <div class="flex items-center space-x-3">
                <div class="hidden sm:flex items-center space-x-2 bg-base-800/80 px-3 py-1.5 rounded-full border border-base-700">
                    <div class="w-7 h-7 rounded-full bg-gradient-to-tr from-accent-400 to-accent-200 text-white font-bold flex items-center justify-center text-xs">
                        {{ strtoupper(substr($username ?? 'P', 0, 1)) }}
                    </div>
                    <span class="text-sm font-medium text-sand-100">{{ $username ?? 'Praktikan' }}</span>
                </div>

                <a href="{{ route('login') }}"
                   class="bg-accent-500/20 hover:bg-accent-500 text-accent-300 hover:text-white border border-accent-600/30 px-3 py-1.5 rounded-lg text-xs font-semibold transition duration-200 flex items-center space-x-1">
                    <img src="{{ asset('images/arrow-right-on-rectangle-accent.svg') }}" alt="arrow-right-on-rectangle" class="w-4 h-4">
                    <span>Keluar</span>
                </a>
            </div>
        </div>
    </div>
</nav>
