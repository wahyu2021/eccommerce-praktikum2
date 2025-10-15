@extends('layouts.main')

@section('title', 'Kategori Produk')

@push('styles')
    <style>
        .category-card {
            transition: transform 0.2s ease-in-out, box-shadow 0.2s ease-in-out;
            border: 1px solid #eee;
        }

        .category-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 8px 25px rgba(0, 0, 0, 0.1) !important;
            border-color: #0d6efd;
        }

        .category-icon {
            font-size: 3rem;
            color: #0d6efd;
        }
    </style>
@endpush

@section('content')
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h2 class="mb-0">📂 Kategori Produk</h2>
        <div class="w-50">
            <input type="text" id="categorySearch" class="form-control" placeholder="🔍  Cari kategori...">
        </div>
    </div>

    @if (session('success'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            {{ session('success') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif

    @if ($categories->isEmpty())
        <div class="alert alert-warning text-center">
            Tidak ada kategori tersedia.
        </div>
    @else
        <div class="row" id="categoryList">
            @foreach ($categories as $category)
                <div class="col-12 col-md-6 col-lg-4 mb-4 category-item">
                    <a href="{{ route('products.index', ['kategori' => $category->kategori]) }}"
                        class="text-decoration-none">
                        <div class="card h-100 text-center shadow-sm category-card">
                            <div class="card-body d-flex flex-column justify-content-center align-items-center p-4">

                                @if (strtolower($category->kategori) == 'elektronik')
                                    <i class="bi bi-laptop category-icon mb-3 fs-2"></i>
                                @elseif (strtolower($category->kategori) == 'aksesoris')
                                    <i class="bi bi-headset category-icon mb-3 fs-2"></i>
                                @elseif (strtolower($category->kategori) == 'fashion')
                                    <i class="bi bi-bag category-icon mb-3 fs-2"></i>
                                @else
                                    <i class="bi bi-box-seam category-icon mb-3"></i> 
                                @endif

                                <h5 class="card-title text-dark">{{ $category->kategori }}</h5>
                                <span class="badge bg-primary rounded-pill">{{ $category->total }} produk</span>
                            </div>
                        </div>
                    </a>
                </div>
            @endforeach
        </div>
        <div id="noResult" class="alert alert-info text-center d-none">
            Kategori yang Anda cari tidak ditemukan.
        </div>
    @endif
@endsection

@push('scripts')
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const searchInput = document.getElementById('categorySearch');
            const categoryList = document.getElementById('categoryList');
            const categoryItems = categoryList.querySelectorAll('.category-item');
            const noResult = document.getElementById('noResult');

            searchInput.addEventListener('keyup', function(e) {
                const searchTerm = e.target.value.toLowerCase();
                let visibleCount = 0;

                categoryItems.forEach(item => {
                    const categoryName = item.querySelector('.card-title').textContent
                .toLowerCase();
                    if (categoryName.includes(searchTerm)) {
                        item.style.display = '';
                        visibleCount++;
                    } else {
                        item.style.display = 'none';
                    }
                });

                // Tampilkan pesan jika tidak ada hasil
                if (visibleCount === 0) {
                    noResult.classList.remove('d-none');
                } else {
                    noResult.classList.add('d-none');
                }
            });
        });
    </script>
@endpush
