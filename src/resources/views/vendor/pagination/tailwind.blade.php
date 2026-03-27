@if ($paginator->hasPages())
    <div class="pagination">

        {{-- 前へ --}}
        @if ($paginator->onFirstPage())
            <span class="page-btn disabled">&lt;</span>
        @else
            <a href="{{ $paginator->previousPageUrl() }}" class="page-btn">&lt;</a>
        @endif

        {{-- ページ番号 --}}
        @foreach ($elements as $element)
            @if (is_array($element))
                @foreach ($element as $page => $url)
                    @if ($page == $paginator->currentPage())
                        <span class="page-btn active">{{ $page }}</span>
                    @else
                        <a href="{{ $url }}" class="page-btn">{{ $page }}</a>
                    @endif
                @endforeach
            @endif
        @endforeach

        {{-- 次へ --}}
        @if ($paginator->hasMorePages())
            <a href="{{ $paginator->nextPageUrl() }}" class="page-btn">&gt;</a>
        @else
            <span class="page-btn disabled">&gt;</span>
        @endif

    </div>
@endif