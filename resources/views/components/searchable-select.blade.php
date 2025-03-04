@props(['name', 'options' => [], 'placeholder' => 'Seçiniz...', 'emptyMessage' => 'Mevcut seçenek yok'])

<div x-data="{
    open: false,
    search: '',
    selected: '',
    options: {{ json_encode($options) }},
    filteredOptions() {
        let results = Object.entries(this.options)
            .filter(([key, value]) => value.toLowerCase().includes(this.search.toLowerCase()))
            .map(([key, value]) => ({ key, value }));

        return results.length > 0 ? results : null;
    }
}" class="relative w-full mb-4">

    <input type="hidden" name="{{ $name }}" x-model="selected">

    <div class="relative">
        <label for="{{ $name }}" class="block text-sm font-medium text-gray-700">{{ $placeholder }}</label>
        <button type="button" @click="open = !open" class="w-full p-2 border rounded-md bg-white text-left">
            <span x-text="selected ? options[selected] : '{{ $placeholder }}'"></span>
        </button>
    </div>

    <div x-show="open" @click.away="open = false"
        class="absolute mt-2 w-full bg-white border rounded-md shadow-lg z-10">
        <input type="text" x-model="search" placeholder="Ara..." class="w-full p-2 border-b focus:outline-none">

        <ul class="max-h-40 overflow-y-auto">
            <template x-if="filteredOptions()">
                <template x-for="option in filteredOptions()" :key="option.key">
                    <li @click="selected = option.key; open = false; search = ''"
                        class="p-2 cursor-pointer hover:bg-gray-100">
                        <span x-text="option.value"></span>
                    </li>
                </template>
            </template>

            <template x-if="!filteredOptions()">
                <li class="p-2 text-gray-500 text-center">
                    {{ $emptyMessage }}
                </li>
            </template>
        </ul>
    </div>
</div>
