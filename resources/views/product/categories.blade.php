@extends('layouts.main')

@section('title', 'Kategori Produk')

@push('styles')
    <style>
        .category-card {
            transition: transform .25s ease, box-shadow .25s ease, border-color .25s ease;
            border-radius: 1rem;
            border: 1px solid var(--bs-border-color);
            background: var(--bs-body-bg);
        }

        .category-card:hover,
        .category-card:focus-within {
            transform: translateY(-6px);
            box-shadow: 0 12px 28px rgba(0, 0, 0, .08);
            border-color: var(--bs-primary);
        }

        .icon-circle {
            width: 72px;
            height: 72px;
            border-radius: 50%;
            background-color: var(--bs-primary-bg-subtle);
            color: var(--bs-primary);
            display: inline-flex;
            align-items: center;
            justify-content: center;
            transition: background-color .25s ease, color .25s ease;
        }

        .category-card:hover .icon-circle,
        .category-card:focus-within .icon-circle {
            background-color: var(--bs-primary);
            color: #fff;
        }

        .icon-circle .bi {
            font-size: 1.9rem;
        }

        .category-title {
            font-weight: 700;
            font-size: 1.05rem;
            color: var(--bs-emphasis-color);
            margin-bottom: .25rem;
            text-wrap: balance;
        }

        .category-search .input-group-text {
            background-color: var(--bs-body-bg);
            border-right: 0;
        }

        .category-search .form-control {
            border-left: 0;
            box-shadow: none !important;
        }

        .category-search .form-control:focus {
            border-color: var(--bs-primary);
        }

        .btn-icon {
            --btn-size: 2.25rem;
            width: var(--btn-size);
            height: var(--btn-size);
            display: inline-flex;
            align-items: center;
            justify-content: center;
            padding: 0;
        }
    </style>
@endpush

@section('content')
    <div class="card shadow-sm border-0 mb-4 p-4 rounded-3 bg-light">
        <div class="d-flex flex-column gap-3">
            <div class="d-flex flex-column flex-md-row align-items-md-center justify-content-between gap-2">
                <div>
                    <h2 class="mb-1 fw-bold d-flex align-items-center gap-2">
                        <span class="text-primary"><i class="bi bi-grid-3x3-gap-fill"></i></span>
                        Kategori Produk
                    </h2>
                    <p class="text-body-secondary mb-0">Jelajahi kategori untuk menemukan produk yang Anda butuhkan.</p>
                </div>

                <div class="text-md-end">
                    <span class="badge text-bg-primary-subtle text-primary px-3 py-2 rounded-pill">
                        <i class="bi bi-collection me-1"></i>
                        <span id="visibleCount">{{ $categories->count() }}</span> dari {{ $categories->count() }} kategori
                    </span>
                </div>
            </div>

            <div class="category-search">
                <div class="input-group">
                    <span class="input-group-text" id="searchLabel">
                        <i class="bi bi-search"></i>
                    </span>
                    <input type="text" id="categorySearch" class="form-control" placeholder="Cari kategori..."
                        aria-label="Cari kategori" aria-describedby="searchLabel searchStatus" autocomplete="off">
                    <button class="btn btn-outline-secondary btn-icon" type="button" id="clearSearch"
                        aria-label="Bersihkan pencarian" title="Bersihkan">
                        <i class="bi bi-x-lg"></i>
                    </button>
                </div>
                <div id="searchStatus" class="visually-hidden" role="status" aria-live="polite"></div>
            </div>
        </div>
    </div>

    {{-- ===== Alert Sukses ===== --}}
    @if (session('success'))
        <div class="alert alert-success alert-dismissible fade show rounded-3 shadow-sm" role="alert">
            <i class="bi bi-check-circle-fill me-2"></i>{{ session('success') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Tutup"></button>
        </div>
    @endif

    {{-- ===== Daftar Kategori ===== --}}
    @if ($categories->isEmpty())
        <div class="alert alert-warning text-center rounded-3 shadow-sm">
            <i class="bi bi-info-circle me-1"></i> Tidak ada kategori tersedia saat ini.
        </div>
    @else
        @php
            $categoryIcons = [
                'elektronik' => 'bi-laptop',
                'aksesoris' => 'bi-headset',
                'fashion' => 'bi-bag',
            ];
            $defaultIcon = 'bi-box-seam';
        @endphp

        <div class="row row-cols-1 row-cols-md-2 row-cols-lg-3 g-4" id="categoryList">
            @foreach ($categories as $category)
                @php
                    $iconClass = $categoryIcons[strtolower($category->kategori)] ?? $defaultIcon;
                @endphp
                <div class="col category-item">
                    <a href="{{ route('products.index', ['kategori' => $category->kategori]) }}"
                        class="text-decoration-none">
                        <div class="card category-card h-100 text-center shadow-sm" tabindex="0">
                            <div class="card-body d-flex flex-column justify-content-center align-items-center p-4">
                                <span class="icon-circle mb-3" aria-hidden="true">
                                    <i class="bi {{ $iconClass }}"></i>
                                </span>

                                <h3 class="category-title">{{ $category->kategori }}</h3>

                                <div class="d-flex align-items-center gap-2">
                                    <span
                                        class="badge text-bg-primary-subtle text-primary fw-semibold px-3 py-2 rounded-pill">
                                        <i class="bi bi-box2 me-1"></i>{{ $category->total }} produk
                                    </span>
                                    <span class="text-body-tertiary small">Lihat produk <i
                                            class="bi bi-arrow-right-short"></i></span>
                                </div>
                            </div>
                        </div>
                    </a>
                </div>
            @endforeach
        </div>

        <div id="noResult" class="alert alert-info text-center d-none rounded-3 shadow-sm mt-4">
            Kategori yang Anda cari tidak ditemukan.
        </div>
    @endif
@endsection

@push('scripts')
    <script>
        (function() {
            const searchInput = document.getElementById('categorySearch');
            const clearBtn = document.getElementById('clearSearch');
            const categoryList = document.getElementById('categoryList');
            const noResult = document.getElementById('noResult');
            const visibleCountEl = document.getElementById('visibleCount');
            const statusEl = document.getElementById('searchStatus');

            if (!categoryList || !searchInput) return;

            const items = Array.from(categoryList.querySelectorAll('.category-item'));
            const total = items.length;

            function setStatus(text) {
                if (statusEl) statusEl.textContent = text;
            }

            function updateVisibleCount(n) {
                if (visibleCountEl) visibleCountEl.textContent = n;
            }

            function filter(term) {
                let visible = 0;
                const q = term.toLowerCase().trim();

                items.forEach(item => {
                    const name = (item.querySelector('.category-title')?.textContent || '').toLowerCase();
                    const match = name.includes(q);
                    item.classList.toggle('d-none', !match);
                    if (match) visible++;
                });

                noResult?.classList.toggle('d-none', visible !== 0);
                updateVisibleCount(visible);
                setStatus(visible === total && !q ?
                    'Menampilkan semua kategori' :
                    `Menampilkan ${visible} dari ${total} kategori untuk pencarian "${term}"`
                );
            }

            function debounce(fn, delay) {
                let t;
                return function(...args) {
                    clearTimeout(t);
                    t = setTimeout(() => fn.apply(this, args), delay);
                }
            }

            const onInput = debounce((e) => filter(e.target.value), 150);

            searchInput.addEventListener('input', onInput);

            clearBtn?.addEventListener('click', () => {
                searchInput.value = '';
                searchInput.focus();
                filter('');
            });

            // Init status
            setStatus('Menampilkan semua kategori');
        })();
    </script>
@endpush
