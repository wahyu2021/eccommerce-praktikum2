@extends('layouts.main')
@section('title', 'Daftar Produk') @section('content')
<div class="card shadow-sm">
    <div class="card-header bg-primary text-white d-flex justify-content-between align-items-center">
        <h5 class="mb-0">📦 Daftar Produk</h5>
        <a href={{ route('products.create') }} class="btn btn-success">Tambah Produk</a>
    </div>
    <div class="card-body bg-white">
        @if (session('success'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                {{ session('success') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif
        @if ($products->isEmpty() )
            <div class="alert alert-warning text-center"> Tidak ada produk tersedia.</div>
        @else
            <table class="table table-striped table-hover align-middle">
                <thead class="table-dark">
                    <tr>
                        <th class="text-center" width="50">ID</th>
                        <th>Nama Produk</th>
                        <th>Kategori</th>
                        <th class="text-start">Harga</th>
                        <th class="text-center">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($products as $p)
                        <tr>
                            <td class="text-center">{{ $p->id }}</td>
                            <td>{{ $p->nama }}</td>
                            <td>
                                {{ $p->kategori }}
                            </td>
                            <td class="text-start">Rp {{ number_format($p->harga, 0, ',', '.') }}</td>
                            <td class="text-center">
                                <a href={{ route('products.edit', $p->id) }} class="btn btn-warning">Edit</a>

                                <button type="button" class="btn btn-danger" data-bs-toggle="modal"
                                    data-bs-target="#modalHapus">
                                    Hapus Item
                                </button>

                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>

            <div class="mt-3">
                {{ $products->onEachSide(1)->links('pagination::bootstrap-5', ['class' => 'pagination-sm']) }}
            </div>

            <div class="modal fade" id="modalHapus" tabindex="-1" aria-labelledby="modalHapusLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
        
                        <div class="modal-header">
                            <h5 class="modal-title" id="modalHapusLabel">Konfirmasi Penghapusan</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
        
                        <div class="modal-body">
                            Apakah Anda yakin ingin menghapus item ini? Tindakan ini tidak dapat dibatalkan.
                        </div>
        
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                            <form action="{{ route('products.destroy', $p->id) }}" method="POST" class="d-inline">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger">Ya, Hapus</button>
                            </form>
                        </div>
        
                    </div>
                </div>
            </div>
        @endif
    </div>


</div>
@endsection
