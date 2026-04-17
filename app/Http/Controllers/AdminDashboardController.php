<?php

namespace App\Http\Controllers;

use App\Models\Brand;
use App\Models\Product;
use Illuminate\Http\Request;

class AdminDashboardController extends Controller
{
    /**
     * Tampilkan halaman dashboard admin.
     */
    public function index()
    {
        // Fitur 10: Query Brand dengan Produk masing-masing (Eager Loading)
        $brands = Brand::with(['products' => function($query) {
            $query->withCount('images')->latest();
        }])->get();

        return view('admin.dashboard', compact('brands'));
    }
}
