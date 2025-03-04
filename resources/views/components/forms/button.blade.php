@props([
    'type' => 'submit',
    'variant' => 'primary',
    'size' => 'md',
    'disabled' => false,
])

@php
    $baseClasses = 'inline-flex items-center justify-center font-medium rounded-md transition focus:outline-none cursor-pointer';

    $sizeClasses = match ($size) {
        'sm' => 'px-3 py-1 text-sm',
        'md' => 'px-4 py-2 text-md',
        'lg' => 'px-5 py-3 text-lg',
        'block' => 'w-full py-2 text-md',
        default => 'px-4 py-2 text-md',
    };

    $variantClasses = match ($variant) {
        'secondary' => 'bg-gray-600 text-white hover:bg-gray-700',
        'danger' => 'bg-red-600 text-white hover:bg-red-700',
        'success' => 'bg-green-600 text-white hover:bg-green-700',
        default => 'bg-blue-600 text-white hover:bg-blue-700',
    };

    $disabledClasses = $disabled ? 'opacity-50 cursor-not-allowed' : '';
@endphp

<button type="{{ $type }}" {{ $disabled ? 'disabled' : '' }}
    {{ $attributes->merge(['class' => "$baseClasses $sizeClasses $variantClasses $disabledClasses"]) }}>
    {{ $slot }}
</button>
