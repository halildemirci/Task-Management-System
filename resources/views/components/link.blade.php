@props([
    'href' => '#',
    'target' => '_self',
    'variant' => 'default',
])

@php
    $baseClasses = 'h-9 text-sm inline-flex items-center font-medium transition focus:outline-none';

    $variantClasses = match ($variant) {
        'primary' => 'text-blue-600 hover:text-blue-800',
        'secondary' => 'text-gray-600 hover:text-gray-800',
        'danger' => 'text-red-600 hover:text-red-800',
        default => 'text-gray-700 hover:text-gray-900',
    };
@endphp

<a href="{{ $href }}" target="{{ $target }}"
    {{ $attributes->merge(['class' => "$baseClasses $variantClasses"]) }}>
    {{ $slot }}
</a>
