@props([
    'type' => 'primary', // Varsayılan olarak "primary"
])

@php
    $baseClasses = "inline-flex items-center px-2 py-1 text-xs font-semibold rounded-md";

    $typeClasses = match ($type) {
        'success' => 'bg-green-500 text-white',
        'danger' => 'bg-red-500 text-white',
        'warning' => 'bg-yellow-500 text-gray-800',
        'info' => 'bg-blue-500 text-white',
        'gray' => 'bg-gray-500 text-white',
        default => 'bg-gray-200 text-gray-800',
    };
@endphp

<span {{ $attributes->merge(['class' => "$baseClasses $typeClasses"]) }}>
    {{ $slot }}
</span>
