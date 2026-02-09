<x-layout title="{{ $title ?? 'Home' }}">
    <div class="relative w-full overflow-hidden">
        <div class="pointer-events-none absolute inset-0">
            <div class="absolute -left-20 top-10 h-72 w-72 rounded-full bg-zinc-200/40 blur-3xl"></div>
            <div class="absolute right-0 top-32 h-64 w-64 rounded-full bg-emerald-200/30 blur-3xl"></div>
            <div class="absolute bottom-0 left-1/2 h-72 w-72 -translate-x-1/2 rounded-full bg-blue-200/30 blur-3xl"></div>
        </div>

        <main class="relative min-h-[calc(100vh-160px)] px-4 pb-16 pt-8 sm:px-6 lg:px-8">
            <div class="mx-auto flex w-full max-w-7xl flex-col gap-6">
                @isset($pageTitle)
                    <div class="rounded-3xl border border-zinc-200 bg-white/80 p-6 shadow-sm backdrop-blur">
                        <p class="text-xs uppercase tracking-[0.3em] text-zinc-400">Workspace</p>
                        <h1 class="mt-2 text-3xl font-bold text-zinc-900 sm:text-4xl">{{ $pageTitle }}</h1>
                        @isset($pageDescription)
                            <p class="mt-2 text-sm text-zinc-500">{{ $pageDescription }}</p>
                        @endisset
                    </div>
                @endisset

                <div class="rounded-3xl border border-zinc-200 bg-white/90 shadow-sm backdrop-blur">
                    <div class="p-6">
                        {{ $slot }}
                    </div>
                </div>
            </div>
        </main>
    </div>
</x-layout>