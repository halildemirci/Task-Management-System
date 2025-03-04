@props(['name', 'label' => null, 'placeholder' => '', 'value' => '', 'rows' => 4, 'required' => false])

<div class="mb-4">
    @if ($label)
        <label for="{{ $name }}" class="block text-sm font-medium text-gray-700">
            {{ $label }}
        </label>
    @endif

    <textarea name="{{ $name }}" id="{{ $name }}" rows="{{ $rows }}" placeholder="{{ $placeholder }}"
        {{ $required ? 'required' : '' }}
        {{ $attributes->merge(['class' => 'mt-1 p-2 w-full border rounded-md focus:ring focus:ring-blue-300']) }}>{{ old($name, $value) }}</textarea>

    @error($name)
        <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
    @enderror
</div>
