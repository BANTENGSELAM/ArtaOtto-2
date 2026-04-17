@extends('layouts.app')

@section('content')
<div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-12">
    
    <!-- Header -->
    <div class="mb-12">
        <a href="{{ route('products.index') }}" class="text-gray-500 hover:text-indigo-600 font-medium mb-4 flex items-center space-x-1 group">
            <svg class="h-4 w-4 transition-transform group-hover:-translate-x-1" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7" /></svg>
            <span>Back to Products</span>
        </a>
        <h1 class="text-5xl font-black text-gray-900 tracking-tighter uppercase mb-2">{{ $product->name }}</h1>
        <p class="text-lg text-indigo-600 font-bold tracking-widest uppercase">{{ $product->brand->name }}</p>
    </div>

    <!-- Feature Diagram Layout (Fitur 4) -->
    <div class="grid grid-cols-1 lg:grid-cols-3 gap-8 items-center mb-24">
        
        <!-- Kolom Kiri: Fitur -->
        <div class="order-2 lg:order-1 flex flex-col space-y-12">
            <div class="text-right">
                <h4 class="text-xl font-bold text-gray-800 mb-2">Presisi Tinggi</h4>
                <p class="text-gray-500">Didesain dengan tingkat akurasi maksimal untuk kebutuhan operasional harian.</p>
                <div class="mt-4 h-1 w-12 bg-indigo-600 ml-auto"></div>
            </div>
            <div class="text-right">
                <h4 class="text-xl font-bold text-gray-800 mb-2">Material Premium</h4>
                <p class="text-gray-500">Menggunakan bahan tahan karat standar medis internasional (ISO).</p>
                <div class="mt-4 h-1 w-12 bg-indigo-600 ml-auto"></div>
            </div>
        </div>

        <!-- Kolom Tengah: Image Utama -->
        <div class="order-1 lg:order-2">
            <div class="relative group">
                <div class="absolute -inset-4 bg-indigo-50 rounded-full blur-3xl opacity-50 group-hover:opacity-100 transition-opacity"></div>
                <div class="relative bg-white rounded-3xl shadow-2xl p-4 border border-gray-100">
                    @if($product->images->count() > 0)
                        <img src="{{ asset('storage/' . $product->images->first()->image_path) }}" 
                             alt="{{ $product->name }}" 
                             class="w-full h-auto rounded-2xl object-contain aspect-square">
                    @else
                        <div class="w-full aspect-square bg-gray-50 rounded-2xl flex items-center justify-center text-gray-300">
                            <span class="font-bold">No Image Available</span>
                        </div>
                    @endif
                </div>
            </div>
        </div>

        <!-- Kolom Kanan: Fitur -->
        <div class="order-3 flex flex-col space-y-12">
            <div class="text-left">
                <h4 class="text-xl font-bold text-gray-800 mb-2">Desain Ergonomis</h4>
                <p class="text-gray-500">Memberikan kenyamanan maksimal bagi praktisi dan pasien selama prosedur.</p>
                <div class="mt-4 h-1 w-12 bg-indigo-600 mr-auto"></div>
            </div>
            <div class="text-left">
                <h4 class="text-xl font-bold text-gray-800 mb-2">Maintenance Mudah</h4>
                <p class="text-gray-500">Struktur komponen modular yang memudahkan pembersihan dan perawatan.</p>
                <div class="mt-4 h-1 w-12 bg-indigo-600 mr-auto"></div>
            </div>
        </div>
    </div>

    <!-- Gallery (Fitur 5) -->
    @if($product->images->count() > 1)
    <div class="mb-24">
        <h3 class="text-2xl font-bold text-gray-900 mb-8 border-b-2 border-indigo-600 inline-block pb-2">Product Gallery</h3>
        <div class="grid grid-cols-2 md:grid-cols-4 lg:grid-cols-6 gap-4">
            @foreach($product->images as $index => $image)
                <div class="group relative aspect-square overflow-hidden rounded-xl border border-gray-100 shadow-sm hover:shadow-md transition-all">
                    <img src="{{ asset('storage/' . $image->image_path) }}" 
                         alt="{{ $product->name }} image" 
                         class="w-full h-full object-cover transition-transform duration-500 group-hover:scale-110">
                </div>
            @endforeach
        </div>
    </div>
    @endif

    <!-- Description -->
    <div class="max-w-4xl mx-auto bg-orange-500 rounded-3xl p-10 lg:p-16 border border-gray-100">
        <h3 class="text-3xl font-bold text-white mb-6">Product Description</h3>
        <div class="prose prose-indigo max-w-none text-gray-100 leading-loose">
            {!! nl2br(e($product->description ?? 'Deskripsi detail produk akan segera diperbarui.')) !!}
        </div>
    </div>

</div>
@endsection
