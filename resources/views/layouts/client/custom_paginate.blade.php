<div class="pagination-content text-center">
<ul class="pagination">
    @if ($items->currentPage() > 1)
        <li><a href="{{ $items->previousPageUrl() }}"><i class="fa fa-angle-double-left" aria-hidden="true"></i></a></li>
    @endif

    @for ($i = 1; $i <= $items->lastPage(); $i++)
        <li>
            <a href="{{ $items->url($i) }}"
               class="{{ $i == $items->currentPage() ? 'active' : '' }}"
            >{{ $i }}</a>
        </li>
    @endfor

    @if ($items->currentPage() < $items->lastPage())
        <li><a href="{{ $items->nextPageUrl() }}"><i class="fa fa-angle-double-right" aria-hidden="true"></i></a></li>
    @endif
</ul>
</div>
