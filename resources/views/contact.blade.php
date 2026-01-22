<x-layout title="Contact Us">
    <!-- Header Section -->
    {{-- <x-layouts.header /> --}}

    <div class="max-w-4xl mx-auto px-4 py-12">
        <!-- About Us Section -->
        <div class="mb-12 text-center border-b border-gray-200 pb-12">
            <h2 class="text-3xl font-bold text-gray-900 mb-4">About Our Team</h2>
            <p class="text-gray-600 max-w-3xl mx-auto text-lg leading-relaxed">
                We are a dedicated group of developers, designers, and tech enthusiasts passionate about building the future of the web. Our mission is to share knowledge, foster innovation, and support the developer community through high-quality content and open collaboration. We believe that great software is built by great teams, and we are here to help you on your journey.
            </p>
        </div>

         <div class="text-center mb-12">
            <h1 class="text-4xl font-bold text-gray-900 mb-4">Contact Us</h1>
            <p class="text-lg text-gray-600">Have a question or feedback? We'd love to hear from you!</p>
        </div>

        <!-- Livewire Contact Form -->
        @livewire('contact-form')

    </div>
</x-layout>