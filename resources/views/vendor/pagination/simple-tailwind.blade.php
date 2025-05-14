@if ($paginator->hasPages())
    <nav class="flex justify-center my-4">
        <ul class="pagination flex items-center space-x-2 bg-white border border-black rounded-full px-6 py-2 shadow-sm">
            {{-- Previous Page Link --}}
            @if ($paginator->onFirstPage())
                <li class="disabled" aria-disabled="true">
                    <span class="text-gray-400 px-3 py-1">@lang('pagination.previous')</span>
                </li>
            @else
                <li>
                    <a href="{{ $paginator->previousPageUrl() }}" rel="prev"
                        class="text-black hover:bg-gray-100 px-3 py-1 rounded transition">
                        @lang('pagination.previous')
                    </a>
                </li>
            @endif

            {{-- Current and Next 3 Pages --}}
            @php
                $current = $paginator->currentPage();
                $last = min($current + 3, $paginator->lastPage());
                $pages = range($current, $last);
            @endphp

            @foreach ($pages as $page)
                @if ($page == $paginator->currentPage())
                    <li aria-current="page">
                        <span class="px-3 py-1 rounded-full bg-black text-white">
                            {{ $page }}
                        </span>
                    </li>
                @else
                    <li>
                        <a href="{{ $paginator->url($page) }}"
                            class="px-3 py-1 rounded text-black hover:bg-gray-100 transition">
                            {{ $page }}
                        </a>
                    </li>
                @endif
            @endforeach

            {{-- Next Page Link --}}
            @if ($paginator->hasMorePages())
                <li>
                    <a href="{{ $paginator->nextPageUrl() }}" rel="next"
                        class="text-black hover:bg-gray-100 px-3 py-1 rounded transition">
                        @lang('pagination.next')
                    </a>
                </li>
            @else
                <li class="disabled" aria-disabled="true">
                    <span class="text-gray-400 px-3 py-1">@lang('pagination.next')</span>
                </li>
            @endif
        </ul>
    </nav>
@endif
