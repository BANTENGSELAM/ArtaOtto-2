@extends('layouts.app')

@section('content')
<div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-12">
    
    <!-- Hero Section / Title -->
    <div class="mb-16 text-center">
        <h1 class="text-5xl font-black text-gray-900 mb-4 uppercase tracking-tighter">Line Up Product</h1>
        <p class="text-gray-500 text-lg">Temukan solusi dental terbaik dari mitra brand terpercaya kami.</p>
        
    </div>

    @forelse($brands as $brand)
        @if($brand->products->count() > 0)
        <!-- Brand Section -->
        <div class="mb-24">
            <a href="{{ route('brands.public.show', $brand->id) }}" class="flex items-center space-x-4 mb-8 group">
                @if($brand->logo_path)
                    <img src="{{ asset('storage/' . $brand->logo_path) }}" alt="{{ $brand->name }}" class="h-12 object-contain bg-white p-2 rounded shadow-sm border transition-transform group-hover:scale-110">
                @endif
                <h2 class="text-3xl font-bold text-gray-800 uppercase tracking-tight border-l-4 border-indigo-600 pl-4 group-hover:text-indigo-600 transition-colors">{{ $brand->name }}</h2>
            </a>

            <!-- Product Display Logic (Fitur: Slider vs Grid) -->
            @php $productCount = $brand->products->count(); @endphp

            @if($productCount > 3)
                <!-- SLIDER CONTAINER (Jika > 3 Produk) -->
                <div class="relative group/slider" id="slider-container-{{ $brand->id }}">
                    <!-- Arrow Left -->
                    <button onclick="scrollSlider('{{ $brand->id }}', 'left')" 
                            class="absolute left-0 top-1/2 -translate-y-12 -translate-x-6 z-30 bg-white shadow-xl rounded-full p-4 text-indigo-600 border border-gray-100 opacity-0 group-hover/slider:opacity-100 transition-all hover:bg-indigo-600 hover:text-white active:scale-90">
                        <svg class="w-6 h-6" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="3" d="M15 19l-7-7 7-7" /></svg>
                    </button>

                    <!-- Slider Wrapper -->
                    <div id="slider-{{ $brand->id }}" 
                         class="flex overflow-x-auto snap-x snap-mandatory scrollbar-hide scroll-smooth space-x-8 pb-8 px-2">
                        @foreach($brand->products as $product)
                            <div class="flex-none w-full sm:w-[calc(50%-1rem)] lg:w-[calc(33.333%-1.334rem)] snap-start">
                                <x-product-card :product="$product" />
                            </div>
                        @endforeach
                    </div>

                    <!-- Arrow Right -->
                    <button onclick="scrollSlider('{{ $brand->id }}', 'right')" 
                            class="absolute right-0 top-1/2 -translate-y-12 translate-x-6 z-30 bg-white shadow-xl rounded-full p-4 text-indigo-600 border border-gray-100 opacity-0 group-hover/slider:opacity-100 transition-all hover:bg-indigo-600 hover:text-white active:scale-90">
                        <svg class="w-6 h-6" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="3" d="M9 5l7 7-7 7" /></svg>
                    </button>
                </div>
            @else
                <!-- GRID BIASA (Jika <= 3 Produk) -->
                <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-10">
                    @foreach($brand->products as $product)
                        <x-product-card :product="$product" />
                    @endforeach
                </div>
            @endif
        </div>
        @endif
    @empty
        <div class="text-center py-24 bg-gray-50 rounded-3xl border-2 border-dashed">
            <p class="text-gray-400">Belum ada brand atau produk yang tersedia saat ini.</p>
        </div>
    @endforelse

</div>

<style>
    .scrollbar-hide::-webkit-scrollbar {
        display: none;
    }
    .scrollbar-hide {
        -ms-overflow-style: none;
        scrollbar-width: none;
    }
</style>

<script>
    function scrollSlider(brandId, direction) {
        const slider = document.getElementById('slider-' + brandId);
        const cardWidth = slider.querySelector('.flex-none').offsetWidth + 32; // width + gap
        
        if (direction === 'left') {
            slider.scrollLeft -= cardWidth;
        } else {
            slider.scrollLeft += cardWidth;
        }
    }
</script>
@endsection
