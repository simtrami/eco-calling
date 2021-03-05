<nav aria-label="@lang('signatures.paginate')">
    <ul class="pagination justify-content-end">
        <li class="page-item {{ $page != '1'?: 'disabled' }}">
            <a class="page-link" href="{{ route('signatures', ['page' => $page-1]) }}#signatures">&laquo;</a>
        </li>
        @if ($page > 1)
            <li class="page-item">
                <a class="page-link" href="{{ route('signatures', ['page' => 1]) }}#signatures">1</a>
            </li>
        @endif
        @if ($page > 2)
            <li class="page-item disabled"><a class="page-link">...</a></li>
        @endif
        <li class="page-item active">
            <a href="#" class="page-link">{{ $page }}</a>
        </li>
        @if ($page < $last - 1)
            <li class="page-item disabled"><a class="page-link">...</a></li>
        @endif
        @if ($page < $last)
            <li class="page-item">
                <a class="page-link" href="{{ route('signatures', ['page' => $last]) }}#signatures">{{ $last }}</a>
            </li>
        @endif
        <li class="page-item {{ $page !== $last ?: 'disabled' }}">
            <a class="page-link" href="{{ route('signatures', ['page' => $page+1]) }}#signatures">&raquo;</a>
        </li>
    </ul>
</nav>
