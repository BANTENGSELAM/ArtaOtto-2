<!DOCTYPE html>
<html lang="id">
<head>
    <title>Tambah Brand</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100 p-8">
    <div class="max-w-2xl mx-auto bg-white rounded shadow p-6">
        <h1 class="text-2xl font-bold mb-6">Tambah Brand Baru</h1>

        @if($errors->any())
            <div class="bg-red-100 text-red-700 p-4 rounded mb-6">
                <ul class="list-disc pl-5">
                    @foreach($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ route('admin.brands.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            
            <div class="mb-4">
                <label class="block text-gray-700 mb-2">Nama Brand <span class="text-red-500">*</span></label>
                <input type="text" name="name" class="w-full border p-2 rounded focus:ring focus:ring-indigo-200" required value="{{ old('name') }}" placeholder="Contoh: Invisalign">
            </div>

            <div class="mb-6">
                <label class="block text-gray-700 mb-2">Logo Brand (Opsional)</label>
                <input type="file" name="logo" class="w-full border p-2 rounded bg-gray-50" accept="image/jpeg, image/png, image/jpg, image/svg+xml">
                <small class="text-gray-500 block mt-1">Format: JPG, PNG, SVG. Maksimal 2MB.</small>
            </div>

            <div class="flex justify-between items-center">
                <a href="{{ route('admin.brands.index') }}" class="text-gray-500 hover:underline">Batal</a>
                <button type="submit" class="bg-indigo-600 hover:bg-indigo-700 text-white px-6 py-2 rounded">Simpan Brand</button>
            </div>
        </form>
    </div>
</body>
</html>
