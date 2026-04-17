<?php

namespace App\Http\Controllers;

use App\Models\Brand;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class BrandController extends Controller
{
    public function index()
    {
        $brands = Brand::withCount('products')->latest()->paginate(10);
        return view('admin.brands.index', compact('brands'));
    }

    public function create()
    {
        return view('admin.brands.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'logo' => 'nullable|image|mimes:jpeg,png,jpg,svg|max:2048'
        ]);

        $brand = new Brand();
        $brand->name = $request->name;

        if ($request->hasFile('logo')) {
            $path = $request->file('logo')->store('brand_logos', 'public');
            $brand->logo_path = $path;
        }

        $brand->save();

        return redirect()->route('admin.brands.index')->with('success', 'Brand berhasil ditambahkan');
    }

    public function destroy(Brand $brand)
    {
        // Fitur: Hapus semua gambar produk terkait dari storage
        $brand->load('products.images');
        foreach ($brand->products as $product) {
            foreach ($product->images as $image) {
                Storage::disk('public')->delete($image->image_path);
            }
        }

        if ($brand->logo_path) {
            Storage::disk('public')->delete($brand->logo_path);
        }

        $brand->delete();

        return redirect()->route('admin.brands.index')->with('success', 'Brand dan semua produk terkait berhasil dihapus');
    }

    public function show($id, Request $request)
    {
        // Fitur 9: Error handling 404
        $brand = Brand::findOrFail($id);

        $query = $brand->products()->with(['brand', 'images'])->visible();

        if ($request->filled('search')) {
            $query->where('name', 'like', '%' . $request->search . '%');
        }

        // Pagination 8 item per halaman
        $products = $query->latest()->paginate(8);

        return view('brands.show', compact('brand', 'products'));
    }
}
