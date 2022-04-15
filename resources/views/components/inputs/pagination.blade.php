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
                        class="relative inline-flex items-center px-4 py-2 text-sm font-medium text-zinc-500 border border-zinc-300 dark:border-somber cursor-default leading-5 rounded-md"
                    >
                    {!! __('pagination.previous') !!}
                </span>
                @else
                    <a href="{{ $paginator->previousPageUrl() }}#signatures"
                       class="relative inline-flex items-center px-4 py-2 text-sm font-medium border border-zinc-300 dark:border-somber leading-5 rounded-md hover:bg-zinc-50 dark:hover:bg-dark focus:outline-none focus:ring ring-theme focus:border-transparent active:bg-zinc-100 active:text-zinc-700 transition"
                    >
                        {!! __('pagination.previous') !!}
                    </a>
                @endif

                @if ($paginator->hasMorePages())
                    <a href="{{ $paginator->nextPageUrl() }}#signatures"
                       class="relative inline-flex items-center px-4 py-2 ml-3 text-sm font-medium border border-zinc-300 dark:border-somber leading-5 rounded-md hover:bg-zinc-50 dark:hover:bg-dark focus:outline-none focus:ring ring-theme focus:border-transparent active:bg-zinc-100 active:text-zinc-700 transition"
                    >
                        {!! __('pagination.next') !!}
                    </a>
                @else
                    <span
                        class="relative inline-flex items-center px-4 py-2 ml-3 text-sm font-medium text-zinc-500 border border-zinc-300 dark:border-somber cursor-default leading-5 rounded-md"
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
                                class="relative inline-flex items-center px-2 py-2 text-sm font-medium text-zinc-300 dark:text-zinc-500 border border-zinc-300 dark:border-somber cursor-default rounded-l-md leading-5"
                                aria-hidden="true"
                            ><x-icons.left class="w-5 h-5"></x-icons.left></span>
                        </span>
                    @else
                        <a href="{{ $paginator->previousPageUrl() }}#signatures" rel="prev"
                           class="relative inline-flex items-center px-2 py-2 text-sm font-medium text-zinc-500 dark:text-zinc-300 border border-zinc-300 dark:border-somber rounded-l-md leading-5 hover:bg-zinc-50 dark:hover:bg-dark focus:z-10 focus:outline-none focus:ring ring-theme focus:border-transparent active:bg-zinc-100 active:text-zinc-500 transition"
                           aria-label="{{ __('pagination.previous') }}"
                        ><x-icons.left class="w-5 h-5"></x-icons.left></a>
                    @endif

                    {{-- Pagination Elements --}}
                    @foreach ($elements as $element)
                        {{-- "Three Dots" Separator --}}
                        @if (is_string($element))
                            <span aria-disabled="true">
                                <span
                                    class="relative inline-flex items-center px-4 py-2 -ml-px text-sm font-medium border border-zinc-300 dark:border-somber cursor-default leading-5"
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
                                       class="relative inline-flex items-center px-4 py-2 -ml-px text-sm font-medium border border-zinc-300 dark:border-somber leading-5 hover:bg-zinc-50 dark:hover:bg-dark focus:z-10 focus:outline-none focus:ring ring-theme focus:border-transparent active:bg-zinc-100 active:text-zinc-700 transition"
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
                           class="relative inline-flex items-center px-2 py-2 -ml-px text-sm font-medium text-zinc-500 dark:text-zinc-300 border border-zinc-300 dark:border-somber rounded-r-md leading-5 hover:bg-zinc-50 dark:hover:bg-dark focus:z-10 focus:outline-none focus:ring ring-theme focus:border-transparent active:bg-zinc-100 active:text-zinc-500 transition"
                           aria-label="{{ __('pagination.next') }}"
                        ><x-icons.right class="w-5 h-5"></x-icons.right></a>
                    @else
                        <span aria-disabled="true" aria-label="{{ __('pagination.next') }}">
                            <span
                                class="relative inline-flex items-center px-2 py-2 -ml-px text-sm font-medium text-zinc-300 dark:text-zinc-500 border border-zinc-300 dark:border-somber cursor-default rounded-r-md leading-5"
                                aria-hidden="true"
                            ><x-icons.right class="w-5 h-5"></x-icons.right></span>
                        </span>
                    @endif
                </span>
            </div>
        </div>
    </nav>
@endif
