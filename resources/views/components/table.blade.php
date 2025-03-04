@props([
    'headers' => [],
])

<div class="overflow-x-auto">
    <table class="min-w-full bg-white border border-gray-300 rounded-lg shadow-sm">
        <thead class="bg-gray-100 border-b">
            <tr>
                @foreach ($headers as $header)
                    <th class="py-3 px-4 text-left text-sm font-semibold text-gray-700 uppercase">
                        {{ $header }}
                    </th>
                @endforeach
            </tr>
        </thead>
        <tbody class="divide-y divide-gray-200">
            {{ $slot }}
        </tbody>
    </table>
</div>
