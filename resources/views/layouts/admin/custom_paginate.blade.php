
<nav aria-label="Page navigation example">
    <ul class="pagination justify-content-center">
        @if ($items->currentPage() > 1)
        <li class="page-item"><a href="{{ $items->previousPageUrl() }}" class="page-link">Previous</a></li>
        @endif

        @for ($i = 1; $i <= $items->lastPage(); $i++)
            <li class="page-item">
                <a href="{{ $items->url($i) }}" class="{{ $i == $items->currentPage() ? 'active' : '' }} page-link">{{
                    $i }}</a>
            </li>
            @endfor

            @if ($items->currentPage() < $items->lastPage())
                <li class="page-item"><a href="{{ $items->nextPageUrl() }}" class="page-link">Next</a></li>
            @endif
    </ul>
</nav>