<!DOCTYPE html>
<html lang="id">
<head>
    <title>Produk Brand: {{ $brand->name }}</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-50 p-8">
    <div class="max-w-6xl mx-auto">
        <a href="{{ route('products.index') }}" class="text-gray-500 hover:underline mb-4 inline-block">&larr; Kembali ke Katalog Utama</a>
        
        <div class="flex items-center space-x-4 mb-8">
            @if($brand->logo_path)
                <img src="{{ asset('storage/' . $brand->logo_path) }}" alt="{{ $brand->name }}" class="h-16 object-contain bg-white p-2 rounded shadow">
            @endif
            <h1 class="text-3xl font-bold text-gray-800">Produk Resmi {{ $brand->name }}</h1>
        </div>

        <!-- Form Search di dalam Brand -->
        <form action="{{ route('brands.public.show', $brand->id) }}" method="GET" class="flex gap-4 mb-8">
            <input type="text" name="search" value="{{ request('search') }}" placeholder="Cari nama produk {{ $brand->name }}..." 
                   class="border p-2 rounded w-full md:w-1/2 focus:ring focus:ring-indigo-200">
            <button type="submit" class="bg-indigo-600 text-white px-4 py-2 rounded">Cari</button>
        </form>

        <!-- List Produk -->
        <div class="grid grid-cols-1 md:grid-cols-4 gap-6">
            @forelse($products as $product)
                <div class="bg-white rounded shadow p-4 border-t-4 border-indigo-500">
                    @if($product->images->count() > 0)
                        <img src="{{ asset('storage/' . $product->images->first()->image_path) }}" class="w-full h-40 object-cover rounded mb-4">
                    @else
                        <div class="w-full h-40 bg-gray-200 flex items-center justify-center rounded mb-4 text-gray-400">No Image</div>
                    @endif
                    <h2 class="font-bold text-lg mb-1 truncate">{{ $product->name }}</h2>
                    <p class="text-sm text-gray-500 mb-3">Stok: {{ $product->stock }}</p>
                    <a href="{{ route('products.show', $product->id) }}" class="text-indigo-600 font-semibold hover:underline border border-indigo-600 px-3 py-1 rounded inline-block w-full text-center">Lihat Detail &rarr;</a>
                </div>
            @empty
                <div class="col-span-full py-8 text-center text-gray-500 bg-white shadow rounded">
                    Tidak ada produk ditemukan untuk brand ini.
                </div>
            @endforelse
        </div>

        <!-- Pagination -->
        <div class="mt-8">
            {{ $products->links() }} 
        </div>
    </div>
</body>
</html>
