<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;


class ProductController extends Controller
{
    public function index()
    {
       $products = Product::paginate(5);
       return view('product.index', compact('products'));
    }

    public function create()
    {
        return view('product.edit', ['product' => new Product()]);
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'nama' => 'required|string|max:255',
            'kategori' => 'required|string|max:255',    
            'harga' => 'required|integer|min:0',
        ]);

        Product::create($data);

        return redirect()->route('products.index')->with('success', 'Produk berhasil ditambahkan!');
    }

    public function edit($id)
    {
        $product = Product::findOrFail($id);
        return view('product.edit', compact('product'));
    }

    public function update(Request $request, Product $product)
    {

        $data = $request->validate([
            'nama' => 'required|string|max:255',
            'kategori' => 'required|string|max:255',
            'harga' => 'required|integer|min:0',
        ]);

        $product->update($data);

        return redirect()->route('products.index')->with('success', 'Produk berhasil diperbarui!');
    }

    public function destroy(Product $product)
    {
        $product->delete();
        return redirect()->route('products.index')->with('success', 'Produk berhasil dihapus!');
    }
}
