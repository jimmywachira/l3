<x-layout title="Contact Us">
    <!-- Header Section -->
    {{-- <x-layouts.header /> --}}

    <div class="max-w-4xl mx-auto px-4 py-12">

         <div class="text-center mb-12">
            <h1 class="text-4xl font-bold text-gray-900 mb-4">Contact Us</h1>
            <p class="text-lg text-gray-600">Have a question or feedback? We'd love to hear from you!</p>
        </div>

        <!-- Livewire Contact Form -->
        @livewire('contact-form')

    </div>
</x-layout>