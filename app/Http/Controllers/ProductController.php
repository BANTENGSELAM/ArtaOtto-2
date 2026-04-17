<?php

namespace App\Http\Controllers;

use App\Models\Brand;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ProductController extends Controller
{
    // ==========================================
    // BAGIAN USER BISA MENGAKSES (TANPA LOGIN)
    // ==========================================

    public function home()
    {
        // Ambil 6 produk terbaru yang tidak hidden
        $products = Product::with(['brand', 'images'])->visible()->latest()->take(6)->get();

        return view('home', compact('products'));
    }

    public function index(Request $request)
    {
        // Fitur 10: Ambil semua Brand yang memiliki produk visible (Line Up Page)
        $brands = Brand::with(['products' => function($query) {
            $query->visible()->latest();
        }])->get();

        return view('products.index', compact('brands'));
    }

    public function about()
    {
        return view('about');
    }

    public function customerService()
    {
        return view('customer_service');
    }

    public function show($id)
    {
        // Fitur 9: Gunakan findOrFail
        $product = Product::with(['brand', 'images'])->visible()->findOrFail($id);
        
        return view('products.show', compact('product'));
    }

    // ==========================================
    // BAGIAN ADMIN
    // ==========================================

    public function dashboard()
    {
        // Load all brands with their products
        // Grouping logic handled in the view or controller
        $brands = Brand::with(['products' => function($query) {
            $query->latest();
        }])->get();
        // Fallback for products without brands (if any, though db requires it)
        $ungroupedProducts = Product::whereNull('brand_id')->latest()->get();

        return view('admin.dashboard', compact('brands', 'ungroupedProducts'));
    }

    public function create()
    {
        $brands = Brand::all();
        return view('admin.create', compact('brands'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'brand_id' => 'required|exists:brands,id',
            'stock' => 'required|integer|min:0',
            'description' => 'nullable|string',
            'images.*' => 'image|mimes:jpeg,png,jpg|max:2048',
            'is_hidden' => 'boolean'
        ]);

        $product = Product::create([
            'name' => $request->name,
            'brand_id' => $request->brand_id,
            'description' => $request->description,
            'stock' => $request->stock,
            'is_hidden' => $request->boolean('is_hidden', false),
        ]);

        if ($request->hasFile('images')) {
            foreach ($request->file('images') as $image) {
                // Fitur 5: simpan di public/products
                $path = $image->store('products', 'public');
                
                $product->images()->create([
                    'image_path' => $path
                ]);
            }
        }

        return redirect()->route('admin.dashboard')->with('success', 'Produk berhasil ditambahkan');
    }

    public function edit(Product $product)
    {
        $brands = Brand::all();
        // Load existing images so they can be viewed/deleted if needed (view only for now for simplicity, or we can just append)
        $product->load('images');
        return view('admin.edit', compact('product', 'brands'));
    }

    public function update(Request $request, Product $product)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'brand_id' => 'required|exists:brands,id',
            'stock' => 'required|integer|min:0',
            'description' => 'nullable|string',
            'images.*' => 'image|mimes:jpeg,png,jpg|max:2048',
            'is_hidden' => 'boolean'
        ]);

        $product->update([
            'name' => $request->name,
            'brand_id' => $request->brand_id,
            'description' => $request->description,
            'stock' => $request->stock,
            'is_hidden' => $request->boolean('is_hidden', false),
        ]);

        if ($request->hasFile('images')) {
            // Optional: for complete replacement, we could delete old images here.
            // For simplicity, we just add new ones or leave the existing ones intact if no new images uploaded.
            foreach ($request->file('images') as $image) {
                // Fitur 5: simpan di public/products
                $path = $image->store('products', 'public');
                $product->images()->create([
                    'image_path' => $path
                ]);
            }
        }

        return redirect()->route('admin.dashboard')->with('success', 'Produk berhasil diupdate');
    }

    public function destroy(Product $product)
    {
        foreach ($product->images as $image) {
            Storage::disk('public')->delete($image->image_path);
        }

        $product->delete();

        return redirect()->route('admin.dashboard')->with('success', 'Produk berhasil dihapus');
    }
}
