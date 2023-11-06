@php
    $urlData = '';
    $keyword = app('request')->input('query') ? '&query=' . app('request')->input('query') : '';
    $cat_id = app('request')->input('cat_id') ? '&cat_id=' . app('request')->input('cat_id') : '';
    $sortby = app('request')->input('sortby') ? '&sortby=' . app('request')->input('sortby') : '';
    // dd($elements[0]);
    $urlData = $keyword . $cat_id . $sortby;
@endphp

@if ($paginator->hasPages())
    <div class="product-filter product-filter-bottom filters-panel">
        <div class="row">
            <div class="short-by-show text-center col-md-3 col-sm-12 col-xs-12">
                <div class="form-group" style="margin: 7px 10px">Showing 25 of
                    {{ $paginator->lastPage() }} Page(s)
                </div>
            </div>
            <div class="box-pagination col-md-6 col-sm-12 col-xs-12 text-center">
                <ul class="pagination">
                    @if (!$paginator->onFirstPage())
                        <li><a href="{{ $paginator->previousPageUrl() . $urlData }}">&lt;</a></li>
                    @endif

                    @if (is_array($elements))
                        @foreach ($elements[0] as $page => $url)
                            <li class="@if ($page == $paginator->currentPage()) active @endif">
                                <a href="{{ $url . $urlData }}"><span>{{ $page }}</span>
                                </a>
                            </li>
                        @endforeach
                    @endif
                    @if ($paginator->hasMorePages())
                        <li><a href="{{ $paginator->nextPageUrl() . $urlData }}">&gt;</a></li>
                    @endif

                </ul>
            </div>

        </div>
    </div>
@endif
