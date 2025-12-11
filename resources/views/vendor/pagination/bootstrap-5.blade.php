@if ($paginator->hasPages())
    <nav class="d-flex justify-content-center mt-4">
        <ul class="pagination" style="display: flex; gap: 8px; align-items: center; padding: 0; margin: 0; list-style: none;">

            {{-- Previous Page Link --}}
            @if ($paginator->onFirstPage())
                <li class="page-item disabled" aria-disabled="true">
                    <span class="page-link" aria-hidden="true"
                          style="border-radius: 50% !important; width: 45px; height: 45px; display: flex; align-items: center; justify-content: center; background-color: #f0f0f0 !important; border: none !important; color: #ccc !important;">
                        &lsaquo;
                    </span>
                </li>
            @else
                <li class="page-item">
                    <a class="page-link" href="{{ $paginator->previousPageUrl() }}" rel="prev"
                       style="border-radius: 50% !important; width: 45px; height: 45px; display: flex; align-items: center; justify-content: center; background-color: white !important; border: 1px solid #ddd !important; color: #333 !important; text-decoration: none !important; transition: 0.2s;">
                       &lsaquo;
                    </a>
                </li>
            @endif

            {{-- Pagination Elements --}}
            @foreach ($elements as $element)
                {{-- "Three Dots" Separator --}}
                @if (is_string($element))
                    <li class="page-item disabled" aria-disabled="true">
                        <span class="page-link" style="background: transparent !important; border: none !important; color: #999 !important;">{{ $element }}</span>
                    </li>
                @endif

                {{-- Array Of Links --}}
                @if (is_array($element))
                    @foreach ($element as $page => $url)
                        @if ($page == $paginator->currentPage())
                            {{-- TOMBOL AKTIF: Ijo & Bulet --}}
                            <li class="page-item active" aria-current="page">
                                <span class="page-link"
                                      style="border-radius: 50% !important; width: 45px; height: 45px; display: flex; align-items: center; justify-content: center; background-color: #27AE60 !important; border: 1px solid #27AE60 !important; color: white !important; font-weight: bold; box-shadow: 0 4px 8px rgba(39, 174, 96, 0.3) !important;">
                                    {{ $page }}
                                </span>
                            </li>
                        @else
                            {{-- TOMBOL BIASA --}}
                            <li class="page-item">
                                <a class="page-link hover-green" href="{{ $url }}"
                                   style="border-radius: 50% !important; width: 45px; height: 45px; display: flex; align-items: center; justify-content: center; background-color: white !important; border: 1px solid #ddd !important; color: #555 !important; text-decoration: none !important; font-weight: 500;">
                                   {{ $page }}
                                </a>
                            </li>
                        @endif
                    @endforeach
                @endif
            @endforeach

            {{-- Next Page Link --}}
            @if ($paginator->hasMorePages())
                <li class="page-item">
                    <a class="page-link" href="{{ $paginator->nextPageUrl() }}" rel="next"
                       style="border-radius: 50% !important; width: 45px; height: 45px; display: flex; align-items: center; justify-content: center; background-color: white !important; border: 1px solid #ddd !important; color: #333 !important; text-decoration: none !important; transition: 0.2s;">
                       &rsaquo;
                    </a>
                </li>
            @else
                <li class="page-item disabled" aria-disabled="true">
                    <span class="page-link" aria-hidden="true"
                          style="border-radius: 50% !important; width: 45px; height: 45px; display: flex; align-items: center; justify-content: center; background-color: #f0f0f0 !important; border: none !important; color: #ccc !important;">
                        &rsaquo;
                    </span>
                </li>
            @endif
        </ul>
    </nav>

    {{-- Script Kecil Buat Hover --}}
    <style>
        .page-link.hover-green:hover {
            background-color: #f0fdf4 !important;
            color: #27AE60 !important;
            border-color: #27AE60 !important;
            transform: translateY(-2px);
        }
    </style>
@endif
