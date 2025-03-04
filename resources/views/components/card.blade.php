@props([
    'class' => null,
    'title' => null,
    'button' => null,
    'button_name' => null,
    'footer' => null,
])

<div class="w-auto min-w-xl bg-white shadow-md rounded-lg p-6 border border-gray-200">
    @if ($title)
        <div class="mb-4 border-b pb-2 text-lg font-semibold text-gray-800 flex justify-between items-center">
            {{ $title }}

            @if ($button)
                <x-link href="{{ $button }}"
                    class="bg-blue-500 hover:bg-blue-700 text-white hover:text-white font-bold py-2 px-4 rounded">{{ $button_name }}</x-link>
            @endif
        </div>
    @endif

    <div class="text-gray-700">
        {{ $slot }}
    </div>

    @if ($footer)
        <div class="mt-4 pt-2 border-t text-sm text-gray-600">
            {{ $footer }}
        </div>
    @endif
</div>
