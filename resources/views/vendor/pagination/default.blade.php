@if ($paginator->hasPages())
    <div class="flex justify-center mt-8">
        <nav class="flex items-center space-x-2 bg-white border border-black rounded-full px-4 py-2 shadow-sm">
            {{-- Previous Page Link --}}
            @if ($paginator->onFirstPage())
                <span class="px-4 py-2 rounded-full text-gray-400 cursor-not-allowed">
                    &laquo;
                </span>
            @else
                <a href="{{ $paginator->previousPageUrl() }}"
                    class="px-4 py-2 rounded-full text-black hover:bg-gray-100 transition">
                    &laquo;
                </a>
            @endif

            {{-- Pagination Elements --}}
            @foreach ($elements as $element)
                {{-- "Three Dots" Separator --}}
                @if (is_string($element))
                    <span class="px-4 py-2 text-gray-500">{{ $element }}</span>
                @endif

                {{-- Array Of Links --}}
                @if (is_array($element))
                    @foreach ($element as $page => $url)
                        @if ($page == $paginator->currentPage())
                            <span class="px-4 py-2 rounded-full bg-black text-white">
                                {{ $page }}
                            </span>
                        @else
                            <a href="{{ $url }}"
                                class="px-4 py-2 rounded-full text-black hover:bg-gray-100 transition">
                                {{ $page }}
                            </a>
                        @endif
                    @endforeach
                @endif
            @endforeach

            {{-- Next Page Link --}}
            @if ($paginator->hasMorePages())
                <a href="{{ $paginator->nextPageUrl() }}"
                    class="px-4 py-2 rounded-full text-black hover:bg-gray-100 transition">
                    &raquo;
                </a>
            @else
                <span class="px-4 py-2 rounded-full text-gray-400 cursor-not-allowed">
                    &raquo;
                </span>
            @endif
        </nav>
    </div>
@endif
