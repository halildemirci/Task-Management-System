@props([
    'type' => 'text',
    'name',
    'label' => null,
    'placeholder' => '',
    'value' => '',
    'required' => false,
])

<div class="mb-4">
    @if ($label)
        <label for="{{ $name }}" class="block text-sm font-medium text-gray-700">
            {{ $label }}
        </label>
    @endif

    <input type="{{ $type }}" name="{{ $name }}" id="{{ $name }}" value="{{ old($name, $value) }}"
        placeholder="{{ $placeholder }}" {{ $required ? 'required' : '' }}
        {{ $attributes->merge(['class' => 'h-10 mt-1 p-2 w-full border rounded-md focus:ring focus:ring-blue-300']) }}>

    @error($name)
        <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
    @enderror
</div>
