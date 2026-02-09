<!-- Navigation -->
<header class="sticky top-0 z-40 w-full border-b border-zinc-200/70 bg-white/80 backdrop-blur">
    <nav class="mx-auto flex max-w-7xl flex-wrap items-center justify-between gap-4 px-4 py-4 sm:px-6 lg:px-8">
        <a href="/" class="flex items-center gap-2 text-xl font-bold text-zinc-900">
            <span class="grid h-9 w-9 place-items-center rounded-2xl bg-zinc-900 text-sm text-white">B</span>
            <span>Blog Studio</span>
        </a>

        <div class="flex flex-1 items-center justify-center gap-2">
            <a wire:navigate.hover href="/" class="rounded-full border border-transparent px-4 py-2 text-sm font-semibold text-zinc-600 transition hover:border-zinc-900 hover:text-zinc-900 {{ request()->is('/') ? 'bg-blue-600 text-white' : '' }}">Home</a>
            <a wire:navigate.hover href="/contact" class="rounded-full border border-transparent px-4 py-2 text-sm font-semibold text-zinc-600 transition hover:border-zinc-900 hover:text-zinc-900 {{ request()->is('contact') ? 'bg-blue-600 text-white' : '' }}">About Us</a>
            @auth
                <a wire:navigate.hover href="/dashboard" class="rounded-full border border-transparent px-4 py-2 text-sm font-semibold text-zinc-600 transition hover:border-zinc-900 hover:text-zinc-900 {{ request()->is('dashboard') ? 'bg-blue-600 text-white' : '' }}">Admin Dashboard</a>
            @endauth
        </div>

        <div class="flex items-center gap-2">
            {{-- <a wire:navigate href="/search" class="hidden items-center gap-2 rounded-full border border-zinc-200 bg-white px-3 py-2 text-xs font-semibold text-zinc-500 shadow-sm transition hover:border-zinc-900 hover:text-zinc-900 sm:inline-flex">
                <ion-icon name="search-outline" class="text-sm"></ion-icon>
                Search
            </a> --}}

            @guest
                <a wire:navigate href="/login" class="rounded-full border border-zinc-200 bg-white px-4 py-2 text-sm font-semibold text-zinc-700 shadow-sm transition hover:border-zinc-900 hover:text-zinc-900 {{ request()->is('login') ? 'border-zinc-900 text-zinc-900' : '' }}">Login</a>
            @endguest

            @auth
                <a class="rounded-full bg-zinc-900 px-4 py-2 text-sm font-semibold text-white transition hover:bg-zinc-800" href='/logout'>Logout</a>
            @endauth
        </div>
    </nav>
</header>