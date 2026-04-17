<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\SliderImage;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class SliderController extends Controller
{
    public function index()
    {
        $sliders = SliderImage::orderBy('created_at', 'asc')->get();
        return view('admin.sliders.index', compact('sliders'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'image' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048'
        ]);

        if ($request->hasFile('image')) {
            $path = $request->file('image')->store('sliders', 'public');
            
            SliderImage::create([
                'image_path' => $path,
            ]);
        }

        return back()->with('success', 'Gambar slider berhasil ditambahkan.');
    }

    public function destroy($id)
    {
        $slider = SliderImage::findOrFail($id);
        
        if (Storage::disk('public')->exists($slider->image_path)) {
            Storage::disk('public')->delete($slider->image_path);
        }
        
        $slider->delete();

        return back()->with('success', 'Gambar slider berhasil dihapus.');
    }
}
