<!doctype html>
<html lang="en">

<meta charset=" UTF-8">
<meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
<meta http-equiv="X-UA-Compatible" content="ie=edge">
<title>{{ $title ?? 'blog'}}</title>

<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Google+Sans+Code&display=swap" rel="stylesheet">

<meta name="description" content="A simple Livewire POS system">
@vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="absolute inset-0 -z-10 h-full w-full capitalize font-semibold bg-white bg-[radial-gradient(#e5e7eb_1px,transparent_1px)] [background-size:36px_36px]" x-data x-on:click="$dispatch('search:clear-results')" style="font-family: 'Google Sans Code', sans-serif;">

    {{-- <x-header /> --}}
    <header>
        <nav class="p-4 flex justify-between items-center">
            <a href="/" class="text-5xl font-bold text-blue-800">-<span class="text-blue-400">-</span> </a>
            <div class=" gap-1 font-bold">
                <a wire:navigate href="/" class="transition px-4 rounded-full rounded-r py-2 border-2 border-black hover:text-blue-600 {{ request()->is('/') ? 'text-blue-600 text-2xl border-blue-600' : '' }}">Home</a>
                <a wire:navigate href="/dashboard" class="{{ request()->is('dashboard*') ? 'text-blue-600 text-2xl border-blue-600' : '' }} border-2 border-black px-4 py-2 hover:text-blue-600 rounded-full rounded-l">AdminDashboard</a>
            </div>

            <div>
                <livewire:search />
            </div>
        </nav>

    </header>

    <div class="relative w-full font-semibold ">
        <main class="min-h-[calc(100vh-160px)]:pl-0 pl-20">
            {{ $slot }}
        </main>
    </div>

    <x-layouts.footer />

    {{-- <x-layouts.footer /> --}}
    <script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>
</body>
</html>
