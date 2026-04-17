<!DOCTYPE html>
<html lang="id">
<head>
    <title>Kelola Brand</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100 p-8">
    <div class="max-w-6xl mx-auto bg-white rounded shadow p-6">
        <div class="flex justify-between items-center mb-6">
            <h1 class="text-2xl font-bold">Daftar Brand</h1>
            <div>
                <a href="{{ route('admin.dashboard') }}" class="text-gray-500 hover:underline mr-4">Kembali ke Dashboard</a>
                <a href="{{ route('admin.brands.create') }}" class="bg-indigo-600 text-white px-4 py-2 rounded">+ Tambah Brand</a>
            </div>
        </div>

        @if(session('success'))
            <div class="bg-green-100 text-green-700 p-4 rounded mb-4">
                {{ session('success') }}
            </div>
        @endif

        <table class="w-full border-collapse border border-gray-200">
            <thead class="bg-gray-50">
                <tr>
                    <th class="border p-2 text-left w-16 text-center">Logo</th>
                    <th class="border p-2 text-left">Nama Brand</th>
                    <th class="border p-2 text-center">Jumlah Produk</th>
                    <th class="border p-2 text-center">Aksi</th>
                </tr>
            </thead>
            <tbody>
                @forelse($brands as $brand)
                <tr>
                    <td class="border p-2 text-center">
                        @if($brand->logo_path)
                            <img src="{{ asset('storage/' . $brand->logo_path) }}" alt="{{ $brand->name }}" class="h-10 object-contain mx-auto">
                        @else
                            <span class="text-xs text-gray-400">No Logo</span>
                        @endif
                    </td>
                    <td class="border p-2">{{ $brand->name }}</td>
                    <td class="border p-2 text-center">{{ $brand->products_count }}</td>
                    <td class="border p-2 text-center">
                        <form action="{{ route('admin.brands.destroy', $brand->id) }}" method="POST" onsubmit="return confirm('Hapus brand ini? Semua produk terkait juga akan terhapus.')">
                            @csrf
                            @method('DELETE')
                            <button class="bg-red-500 text-white px-3 py-1 rounded text-sm hover:bg-red-600">Hapus</button>
                        </form>
                    </td>
                </tr>
                @empty
                <tr>
                    <td colspan="4" class="border p-2 text-center text-gray-500">Belum ada brand yang ditambahkan.</td>
                </tr>
                @endforelse
            </tbody>
        </table>

        <div class="mt-4">
             {{ $brands->links() }}
        </div>
    </div>
</body>
</html>
