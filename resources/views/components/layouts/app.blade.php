<!doctype html>
<html lang="en">

<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<meta http-equiv="X-UA-Compatible" content="ie=edge">
<title>{{ $title ?? 'DevBlog' }}</title>
<meta name="description" content="A professional developer blog">

<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Google+Sans+Code&display=swap" rel="stylesheet">

<meta name="description" content="A simple Livewire POS system">
@vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="absolute inset-0 -z-10 h-full w-full capitalize font-semibold bg-gray-200/50 bg-[radial-gradient(#e5e7eb_1px,transparent_1px)] [background-size:36px_36px]" x-data x-on:click="$dispatch('search:clear-results')" style="font-family: 'Google Sans Code', sans-serif;">

    {{-- <x-header /> --}}
    <header>
        <nav class="p-4 flex justify-between items-center">
            <a href="/" class="text-2xl font-bold text-blue-800"><span class="text-blue-400">Edu</span>Blog </a>
            <div class=" gap-1 font-bold">
                <a wire:navigate href="/" class="transition px-4 rounded-full rounded-r py-2 hover:text-2xl border-2 border-black hover:text-blue-600 {{ request()->is('/') ? 'text-blue-600 text-2xl border-blue-600' : '' }}">Home</a>
                <a href="/dashboard" class="{{ request()->is('/dashboard') ? 'text-blue-600  border-blue-600' : '' }} border-2 border-black px-4 py-2  hover:text-2xl rounded-full rounded-l">AdminDashboard</a>
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
    <script type=" module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>
</body>
</html>

{{--
<!doctype html>
<html lang="en" class="h-full bg-gray-50 antialiased">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>{{ $title ?? 'DevBlog' }}</title>
<meta name="description" content="A professional developer blog">

<!-- Fonts -->
<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&family=JetBrains+Mono:wght@400;500&display=swap" rel="stylesheet">

<style>
    body {
        font-family: 'Inter', sans-serif;
    }

    code,
    pre {
        font-family: 'JetBrains Mono', monospace;
    }

    [x-cloak] {
        display: none !important;
    }

</style>

@vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="absolute inset-0 -z-10 h-full w-full capitalize font-semibold bg-white bg-[radial-gradient(#e5e7eb_1px,transparent_1px)] [background-size:36px_36px]" x-data x-on:click="$dispatch('search:clear-results')" style="font-family: 'Google Sans Code', sans-serif;">
    <body class="flex flex-col min-h-full bg-white bg-[radial-gradient(#e5e7eb_1px,transparent_1px)] [background-size:32px_32px]" x-data x-on:click="$dispatch('search:clear-results')">

        <!-- Navigation -->
        <header class="sticky top-0 z-50 w-full border-b border-gray-200 bg-white/80 backdrop-blur-md supports-[backdrop-filter]:bg-white/60">
            <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
                <div class="flex h-16 items-center justify-between">
                    <!-- Left Side: Logo & Nav -->
                    <div class="flex items-center gap-8">
                        <a href="/" class="flex items-center gap-2 text-xl font-bold tracking-tight text-gray-900 transition hover:text-blue-600">
                            <div class="flex h-8 w-8 items-center justify-center rounded-lg bg-blue-600 text-white shadow-sm">
                                <ion-icon name="library" class="text-lg"></ion-icon>
                            </div>
                            <span>DevBlog</span>
                        </a>

                        <nav class="hidden md:flex items-center gap-6 text-sm font-medium text-gray-600">
                            <a wire:navigate href="/" class="transition hover:text-blue-600 {{ request()->is('/') ? 'text-blue-600' : '' }}">Home</a>
                            <a wire:navigate href="/articles" class="transition hover:text-blue-600 {{ request()->is('articles*') ? 'text-blue-600' : '' }}">Articles</a>
                        </nav>
                    </div>

                    <!-- Right Side: Search & Actions -->
                    <div class="flex items-center gap-4">
                        <div class="w-64 hidden sm:block">
                            <livewire:search />
                        </div>

                        <a href="/dashboard" class="hidden md:inline-flex items-center justify-center rounded-full bg-gray-900 px-4 py-2 text-sm font-medium text-white shadow-sm transition hover:bg-gray-700 focus:outline-none focus:ring-2 focus:ring-gray-400 focus:ring-offset-2">
                            Dashboard
                        </a>
                    </div>
                </div>
            </div>
        </header>

        <div class="relative w-full font-semibold ">
            <main class="min-h-[calc(100vh-160px)]:pl-0 pl-20">
                {{ $slot }}
            </main>
        </div>
        <!-- Main Content -->
        <main class="flex-auto w-full max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-8">
            {{ $slot }}
        </main>

        <x-layouts.footer />

        <script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
        <script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>
    </body>
    </html>
    --}}
