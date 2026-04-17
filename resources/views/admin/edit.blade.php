<!DOCTYPE html>
<html lang="id">
<head>
    <title>Edit Produk</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100 p-8">
    <div class="max-w-2xl mx-auto bg-white rounded shadow p-6">
        <h1 class="text-2xl font-bold mb-6">Edit Produk: {{ $product->name }}</h1>

        @if($errors->any())
            <div class="bg-red-100 text-red-700 p-4 rounded mb-6">
                <ul class="list-disc pl-5">
                    @foreach($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ route('admin.products.update', $product->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            
            <div class="mb-4">
                <label class="block text-gray-700 mb-2">Nama Produk <span class="text-red-500">*</span></label>
                <input type="text" name="name" class="w-full border p-2 rounded" required value="{{ old('name', $product->name) }}">
            </div>

            <div class="mb-4">
                <label class="block text-gray-700 mb-2">Brand <span class="text-red-500">*</span></label>
                @if($brands->isEmpty())
                    <p class="text-red-500 text-sm mb-2">Silakan tambahkan data brand langsung ke database terlebih dahulu.</p>
                @endif
                <select name="brand_id" class="w-full border p-2 rounded" required>
                    <option value="">Pilih Brand</option>
                    @foreach($brands as $brand)
                        <option value="{{ $brand->id }}" {{ old('brand_id', $product->brand_id) == $brand->id ? 'selected' : '' }}>
                            {{ $brand->name }}
                        </option>
                    @endforeach
                </select>
            </div>

            <div class="mb-4">
                <label class="block text-gray-700 mb-2">Deskripsi</label>
                <textarea name="description" rows="4" class="w-full border p-2 rounded">{{ old('description', $product->description) }}</textarea>
            </div>

            <div class="mb-4">
                <label class="block text-gray-700 mb-2">Stok <span class="text-red-500">*</span></label>
                <input type="number" name="stock" class="w-full border p-2 rounded" min="0" required value="{{ old('stock', $product->stock) }}">
            </div>

            <div class="mb-4">
                <label class="block text-gray-700 mb-2">Upload Gambar Tambahan (Opsional)</label>
                <input type="file" name="images[]" class="w-full border p-2 rounded bg-gray-50" multiple accept="image/jpeg, image/png, image/jpg">
                <small class="text-gray-500 block mt-1">Gambar yang sudah ada tidak akan terhapus jika Anda menambahkan gambar baru disini.</small>
                
                @if($product->images->count() > 0)
                <div class="mt-4">
                    <p class="text-sm font-semibold mb-2">Gambar Saat Ini:</p>
                    <div class="flex gap-2 mb-2 flex-wrap">
                        @foreach($product->images as $image)
                            <img src="{{ asset('storage/' . $image->image_path) }}" class="h-20 w-20 object-cover border rounded">
                        @endforeach
                    </div>
                </div>
                @endif
            </div>

            <div class="mb-6 flex items-center">
                <input type="checkbox" name="is_hidden" id="is_hidden" value="1" class="mr-2" {{ old('is_hidden', $product->is_hidden) ? 'checked' : '' }}>
                <label for="is_hidden" class="text-gray-700">Sembunyikan dari user (Draft)</label>
            </div>

            <div class="flex justify-between items-center">
                <a href="{{ route('admin.dashboard') }}" class="text-gray-500 hover:underline">Batal</a>
                <button type="submit" class="bg-blue-600 text-white px-6 py-2 rounded">Update Produk</button>
            </div>
        </form>
    </div>
</body>
</html>
