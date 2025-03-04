@props(['paginator'])

<nav class="flex justify-center mt-4">
    <ul class="inline-flex items-center space-x-2">
        {{-- Önceki Sayfa Linki --}}
        @if ($paginator->onFirstPage())
            <li class="px-3 py-2 text-gray-400 bg-gray-200 rounded cursor-not-allowed">Önceki</li>
        @else
            <li>
                <a href="{{ $paginator->previousPageUrl() }}"
                    class="px-3 py-2 bg-blue-500 text-white rounded hover:bg-blue-600">Önceki</a>
            </li>
        @endif

        {{-- Sayfa Numaraları --}}
        @foreach ($paginator->elements() as $element)
            @if (is_string($element))
                <li class="px-3 py-2 text-gray-500">{{ $element }}</li>
            @endif

            @if (is_array($element))
                @foreach ($element as $page => $url)
                    @if ($page == $paginator->currentPage())
                        <li class="px-3 py-2 bg-blue-600 text-white rounded">{{ $page }}</li>
                    @else
                        <li>
                            <a href="{{ $url }}"
                                class="px-3 py-2 bg-gray-100 text-gray-700 rounded hover:bg-gray-200">{{ $page }}</a>
                        </li>
                    @endif
                @endforeach
            @endif
        @endforeach

        {{-- Sonraki Sayfa Linki --}}
        @if ($paginator->hasMorePages())
            <li>
                <a href="{{ $paginator->nextPageUrl() }}"
                    class="px-3 py-2 bg-blue-500 text-white rounded hover:bg-blue-600">Sonraki</a>
            </li>
        @else
            <li class="px-3 py-2 text-gray-400 bg-gray-200 rounded cursor-not-allowed">Sonraki</li>
        @endif
    </ul>
</nav>
