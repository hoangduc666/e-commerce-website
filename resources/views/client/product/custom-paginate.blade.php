@if ($paginator->hasPages())
    <nav aria-label="Page navigation example">
        <ul class="pagination justify-content-center">
            @if ($paginator->onFirstPage())
                <li class="page-item disabled">
                    <a class="page-link" href="#"
<<<<<<< HEAD
                       tabindex="-1">@lang('public.previous')</a>
=======
                       tabindex="-1">Previous</a>
>>>>>>> dece221f309a6888873a1349df77751a0356c316
                </li>
            @else
                <li class="page-item"><a class="page-link"
                                         href="{{ $paginator->previousPageUrl() }}">
<<<<<<< HEAD
                        @lang('public.previous')</a>
=======
                        Previous</a>
>>>>>>> dece221f309a6888873a1349df77751a0356c316
                </li>
            @endif

            @foreach ($elements as $element)
                @if (is_string($element))
                    <li class="page-item disabled">{{ $element }}</li>
                @endif

                @if (is_array($element))
                    @foreach ($element as $page => $url)
                        @if ($page == $paginator->currentPage())
                            <li class="page-item active">
                                <a class="page-link">{{ $page }}</a>
                            </li>
                        @else
                            <li class="page-item">
                                <a class="page-link"
                                   href="{{ $url }}">{{ $page }}</a>
                            </li>
                        @endif
                    @endforeach
                @endif
            @endforeach

            @if ($paginator->hasMorePages())
                <li class="page-item">
                    <a class="page-link"
                       href="{{ $paginator->nextPageUrl() }}"
                       rel="next">Next</a>
                </li>
            @else
                <li class="page-item disabled">
<<<<<<< HEAD
                    <a class="page-link" href="#">@lang('public.next')</a>
=======
                    <a class="page-link" href="#">Next</a>
>>>>>>> dece221f309a6888873a1349df77751a0356c316
                </li>
            @endif
        </ul>
    </nav>
@endif
