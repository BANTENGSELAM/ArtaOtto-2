@props(['product'])

<div class="group bg-white rounded-2xl shadow-sm border border-gray-100 overflow-hidden hover:shadow-xl hover:-translate-y-2 transition-all duration-300">
    <div class="relative overflow-hidden h-64 bg-gray-50">
        @if($product->images->count() > 0)
            <img src="{{ asset('storage/' . $product->images->first()->image_path) }}" alt="{{ $product->name }}" class="w-full h-full object-cover transition-transform duration-500 group-hover:scale-110">
        @else
            <div class="w-full h-full flex items-center justify-center text-gray-300">
                <svg class="h-20 w-20" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z" /></svg>
            </div>
        @endif
        <div class="absolute inset-0 bg-gradient-to-t from-black/20 to-transparent"></div>
        
        <!-- Brand Badge -->
        <div class="absolute top-4 left-4">
            <span class="bg-white/90 backdrop-blur-sm px-3 py-1 rounded-full text-xs font-bold text-indigo-600 shadow-sm border border-indigo-50">
                {{ $product->brand->name }}
            </span>
        </div>
    </div>

    <div class="p-6">
        <h3 class="text-xl font-bold text-gray-900 mb-2 truncate group-hover:text-indigo-600 transition-colors">{{ $product->name }}</h3>
        <p class="text-gray-500 text-sm mb-6 line-clamp-2">
            {{ $product->description ?? 'Tidak ada deskripsi singkat untuk produk ini.' }}
        </p>
        <a href="{{ route('products.show', $product->id) }}" class="inline-flex items-center text-indigo-600 font-bold hover:gap-2 transition-all">
            View Detail 
            <svg class="ml-1 w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7" /></svg>
        </a>
    </div>
</div>
