@props([
    'type' => 'primary',
    'size' => 'md'
])

@php
    // Define our mapping for types (colors)
    $types = [
        'primary'   => 'bg-blue-600 text-white hover:bg-blue-700',
        'secondary' => 'bg-gray-600 text-white hover:bg-gray-700',
        'danger'    => 'bg-red-600 text-white hover:bg-red-700',
        'outline'   => 'border border-blue-600 text-blue-600 hover:bg-blue-50',
    ];

    // Define our mapping for sizes
    $sizes = [
        'sm' => 'px-3 py-1 text-sm',
        'md' => 'px-4 py-2 text-base',
        'lg' => 'px-6 py-3 text-lg font-bold',
    ];

    // Select the classes based on props, defaulting to primary/md
    $classes = ($types[$type] ?? $types['primary']) . ' ' . ($sizes[$size] ?? $sizes['md']);
@endphp

<button {{ $attributes->merge(['class' => "inline-flex items-center rounded transition " . $classes]) }}>
    {{ $slot }}
</button>