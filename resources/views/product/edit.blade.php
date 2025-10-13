@extends('layouts.main')
@section('title', isset($product->id) ? 'Edit Produk' : 'Tambah Produk')
@section('content')
<div class="card shadow-sm">
    <div class="card-header bg-primary text-white text-center">
        <h5 class="mb-0">📦 {{ isset($product->id) ? 'Edit Produk' : 'Tambah Produk' }}</h5>
    </div>
    <div class="card-body bg-white">

        <form method="POST" action="{{ isset($product->id) ? route('products.update', $product->id) : route('products.store') }}">
            @csrf
            @if (isset($product->id))
                @method('PUT')
            @endif

            <div class="mb-3">
                <label for="nama" class="form-label">Nama Produk</label>
                <input type="text" class="form-control" id="nama" name="nama"
                    placeholder="Masukkan nama produk" value="{{ old('nama', $product->nama ?? '') }}">
            </div>
            <div class="mb-3">
                <label for="kategori" class="form-label">Kategori</label>
                <input type="text" class="form-control" id="kategori" name="kategori"
                    placeholder="Masukkan kategori produk" value="{{ old('kategori', $product->kategori ?? '') }}">
            </div>
            <div class="mb-3">
                <label for="harga" class="form-label">Harga</label>
                <input type="number" class="form-control" id="harga" name="harga"
                    placeholder="Masukkan harga produk" value="{{ old('harga', $product->harga ?? '') }}">
            </div>

            <button type="submit" class="btn btn-primary">{{ isset($product->id) ? 'Update' : 'Simpan' }}</button>
            <a href="/" class="btn btn-danger">Batal</a>
        </form>
    </div>

</div>
@endsection
