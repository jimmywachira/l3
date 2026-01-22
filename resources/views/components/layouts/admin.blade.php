<x-layout title="{{ $title ?? 'Admin Dashboard' }}">
    
    <div class="relative w-full font-semibold ">
        <main class="min-h-[calc(100vh-160px)]:pl-0 pl-20">
            {{ $slot }}
        </main>
    </div>
</x-layout>
