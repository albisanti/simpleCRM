<div class="mt-2 mb-2">
    Displaying <b>{{$paginator->count()}}</b>  <span class="text-muted">out of {{$paginator->total()}} results.</span>
</div>
<div>
    <ul class="pagination">
        <li class="page-item {{ $paginator->currentPage() == 1 ? 'disabled' : '' }}">
            <a class="page-link" href="{{$paginator->previousPageUrl()}}">
                Prev
            </a>
        </li>

        @for ($i = 1; $i <= $paginator->lastPage(); $i++)
            <li class="{{ ($paginator->currentPage() == $i) ? ' active' : '' }} page-item">
                <a class="page-link" href="{{ $paginator->url($i) }}">
                    {{ $i }}
                </a>
            </li>
        @endfor

        <li class="page-item {{ $paginator->currentPage() == $paginator->lastPage() ? 'disabled' : '' }}">
            <a class="page-link" href="{{$paginator->nextPageUrl()}}">
                Next
            </a>
        </li>
    </ul>
</div>
