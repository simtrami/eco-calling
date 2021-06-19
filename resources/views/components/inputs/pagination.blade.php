@if ($paginator->hasPages())
    <nav class="w-full flex items-center justify-between" role="navigation"
         aria-label="{{ __('pagination.nav_label') }}"
    >
        <div class="w-full grid grid-cols-1 gap-2 md:hidden">
            <div>
                <p class="text-sm leading-5">
                    {!! __('pagination.showing') !!}
                    <span class="font-medium">{{ $paginator->firstItem() }}</span>
                    {!! __('pagination.to') !!}
                    <span class="font-medium">{{ $paginator->lastItem() }}</span>
                    {!! __('pagination.of') !!}
                    <span class="font-medium">{{ $paginator->total() }}</span>
                    {!! __('pagination.results') !!}
                </p>
            </div>
            <div class="flex justify-between flex-1">
                @if ($paginator->onFirstPage())
                    <span
                        class="relative inline-flex items-center px-4 py-2 text-sm font-medium text-gray-500 border border-gray-300 dark:border-somber cursor-default leading-5 rounded-md"
                    >
                    {!! __('pagination.previous') !!}
                </span>
                @else
                    <a href="{{ $paginator->previousPageUrl() }}#signatures"
                       class="relative inline-flex items-center px-4 py-2 text-sm font-medium border border-gray-300 dark:border-somber leading-5 rounded-md hover:bg-gray-50 dark:hover:bg-dark focus:outline-none focus:ring ring-theme focus:border-transparent active:bg-gray-100 active:text-gray-700 transition"
                    >
                        {!! __('pagination.previous') !!}
                    </a>
                @endif

                @if ($paginator->hasMorePages())
                    <a href="{{ $paginator->nextPageUrl() }}#signatures"
                       class="relative inline-flex items-center px-4 py-2 ml-3 text-sm font-medium border border-gray-300 dark:border-somber leading-5 rounded-md hover:bg-gray-50 dark:hover:bg-dark focus:outline-none focus:ring ring-theme focus:border-transparent active:bg-gray-100 active:text-gray-700 transition"
                    >
                        {!! __('pagination.next') !!}
                    </a>
                @else
                    <span
                        class="relative inline-flex items-center px-4 py-2 ml-3 text-sm font-medium text-gray-500 border border-gray-300 dark:border-somber cursor-default leading-5 rounded-md"
                    >
                    {!! __('pagination.next') !!}
                </span>
                @endif
            </div>
        </div>

        <div class="hidden md:flex-1 md:flex md:items-center md:justify-between">
            <div>
                <p class="text-sm leading-5">
                    {!! __('pagination.showing') !!}
                    <span class="font-medium">{{ $paginator->firstItem() }}</span>
                    {!! __('pagination.to') !!}
                    <span class="font-medium">{{ $paginator->lastItem() }}</span>
                    {!! __('pagination.of') !!}
                    <span class="font-medium">{{ $paginator->total() }}</span>
                    {!! __('pagination.results') !!}
                </p>
            </div>

            <div>
                <span class="relative z-0 inline-flex shadow-sm rounded-md">
                    {{-- Previous Page Link --}}
                    @if ($paginator->onFirstPage())
                        <span aria-disabled="true" aria-label="{{ __('pagination.previous') }}">
                            <span
                                class="relative inline-flex items-center px-2 py-2 text-sm font-medium text-gray-300 dark:text-gray-500 border border-gray-300 dark:border-somber cursor-default rounded-l-md leading-5"
                                aria-hidden="true"
                            >
                                <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20">
                                    <path fill-rule="evenodd"
                                          d="M12.707 5.293a1 1 0 010 1.414L9.414 10l3.293 3.293a1 1 0 01-1.414 1.414l-4-4a1 1 0 010-1.414l4-4a1 1 0 011.414 0z"
                                          clip-rule="evenodd"
                                    />
                                </svg>
                            </span>
                        </span>
                    @else
                        <a href="{{ $paginator->previousPageUrl() }}#signatures" rel="prev"
                           class="relative inline-flex items-center px-2 py-2 text-sm font-medium text-gray-500 dark:text-gray-300 border border-gray-300 dark:border-somber rounded-l-md leading-5 hover:bg-gray-50 dark:hover:bg-dark focus:z-10 focus:outline-none focus:ring ring-theme focus:border-transparent active:bg-gray-100 active:text-gray-500 transition"
                           aria-label="{{ __('pagination.previous') }}"
                        >
                            <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20">
                                <path fill-rule="evenodd"
                                      d="M12.707 5.293a1 1 0 010 1.414L9.414 10l3.293 3.293a1 1 0 01-1.414 1.414l-4-4a1 1 0 010-1.414l4-4a1 1 0 011.414 0z"
                                      clip-rule="evenodd"
                                />
                            </svg>
                        </a>
                    @endif

                    {{-- Pagination Elements --}}
                    @foreach ($elements as $element)
                        {{-- "Three Dots" Separator --}}
                        @if (is_string($element))
                            <span aria-disabled="true">
                                <span
                                    class="relative inline-flex items-center px-4 py-2 -ml-px text-sm font-medium border border-gray-300 dark:border-somber cursor-default leading-5"
                                >{{ $element }}</span>
                            </span>
                        @endif

                        {{-- Array Of Links --}}
                        @if (is_array($element))
                            @foreach ($element as $page => $url)
                                @if ($page == $paginator->currentPage())
                                    <span aria-current="page">
                                        <span
                                            class="relative inline-flex items-center px-4 py-2 -ml-px text-sm font-medium text-white bg-theme border border-theme cursor-default leading-5"
                                        >{{ $page }}</span>
                                    </span>
                                @else
                                    <a href="{{ $url }}#signatures"
                                       class="relative inline-flex items-center px-4 py-2 -ml-px text-sm font-medium border border-gray-300 dark:border-somber leading-5 hover:bg-gray-50 dark:hover:bg-dark focus:z-10 focus:outline-none focus:ring ring-theme focus:border-transparent active:bg-gray-100 active:text-gray-700 transition"
                                       aria-label="{{ __('pagination.go_to', ['page' => $page]) }}"
                                    >
                                        {{ $page }}
                                    </a>
                                @endif
                            @endforeach
                        @endif
                    @endforeach

                    {{-- Next Page Link --}}
                    @if ($paginator->hasMorePages())
                        <a href="{{ $paginator->nextPageUrl() }}#signatures" rel="next"
                           class="relative inline-flex items-center px-2 py-2 -ml-px text-sm font-medium text-gray-500 dark:text-gray-300 border border-gray-300 dark:border-somber rounded-r-md leading-5 hover:bg-gray-50 dark:hover:bg-dark focus:z-10 focus:outline-none focus:ring ring-theme focus:border-transparent active:bg-gray-100 active:text-gray-500 transition"
                           aria-label="{{ __('pagination.next') }}"
                        >
                            <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20">
                                <path fill-rule="evenodd"
                                      d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z"
                                      clip-rule="evenodd"
                                />
                            </svg>
                        </a>
                    @else
                        <span aria-disabled="true" aria-label="{{ __('pagination.next') }}">
                            <span
                                class="relative inline-flex items-center px-2 py-2 -ml-px text-sm font-medium text-gray-300 dark:text-gray-500 border border-gray-300 dark:border-somber cursor-default rounded-r-md leading-5"
                                aria-hidden="true"
                            >
                                <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20">
                                    <path fill-rule="evenodd"
                                          d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z"
                                          clip-rule="evenodd"
                                    />
                                </svg>
                            </span>
                        </span>
                    @endif
                </span>
            </div>
        </div>
    </nav>
@endif
