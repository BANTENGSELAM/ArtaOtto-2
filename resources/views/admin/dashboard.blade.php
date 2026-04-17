<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard - ArtaOtto</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-slate-50 font-sans text-slate-900">

    <!-- NAV DASHBOARD -->
    <nav class="bg-white border-b border-slate-200 sticky top-0 z-50">
        <div class="max-w-[1400px] mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex justify-between h-20">
                <div class="flex items-center">
                    <span class="text-2xl font-black text-indigo-600 tracking-tighter italic uppercase">ArtaOtto</span>
                    <div class="hidden md:ml-10 md:flex md:space-x-8">
                        <a href="{{ route('admin.dashboard') }}" class="inline-flex items-center px-1 pt-1 border-b-2 border-indigo-500 text-sm font-bold text-slate-900 uppercase tracking-widest">
                            Dashboard
                        </a>
                    </div>
                </div>
                <div class="flex items-center space-x-4">
                    <div class="text-right mr-4 hidden sm:block">
                        <p class="text-xs font-bold text-slate-400 uppercase tracking-widest">{{ Auth::guard('admin')->user()->role }}</p>
                        <p class="text-sm font-bold text-slate-700">{{ Auth::guard('admin')->user()->name }}</p>
                    </div>
                    <form action="{{ route('admin.logout') }}" method="POST">
                        @csrf
                        <button type="submit" class="bg-slate-100 text-slate-600 px-4 py-2 rounded-lg text-xs font-bold uppercase tracking-widest hover:bg-red-50 hover:text-red-600 transition-all active:scale-95">
                            Logout
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </nav>

    <main class="max-w-[1400px] mx-auto py-10 px-4 sm:px-6 lg:px-8">
        
        <!-- HEADER DASHBOARD (Fitur) -->
        <div class="flex flex-col md:flex-row md:items-center justify-between mb-10 gap-6">
            <div>
                <h1 class="text-4xl font-black text-slate-900 tracking-tight">Dashboard Admin</h1>
                <p class="text-slate-500 mt-1">Sistem manajemen produk ArtaOtto Corporate.</p>
            </div>
            <div class="flex space-x-4">
                <!-- Action Buttons (Fitur) -->
                <a href="{{ route('admin.sliders.index') }}" class="bg-slate-800 text-white px-6 py-3 rounded-xl font-bold text-sm uppercase tracking-widest hover:bg-slate-900 shadow-lg active:scale-95 transition-all">
                    Kelola Slider
                </a>
                <a href="{{ route('admin.admins.index') }}" class="bg-indigo-600 text-white px-6 py-3 rounded-xl font-bold text-sm uppercase tracking-widest hover:bg-slate-800 shadow-lg active:scale-95 transition-all">
                    Kelola Admin
                </a>
                <a href="{{ route('admin.brands.index') }}" class="bg-indigo-600 text-white px-6 py-3 rounded-xl font-bold text-sm uppercase tracking-widest hover:bg-indigo-700 shadow-lg active:scale-95 transition-all">
                    Kelola Brand
                </a>
                <a href="{{ route('admin.products.create') }}" class="bg-emerald-500 text-white px-6 py-3 rounded-xl font-bold text-sm uppercase tracking-widest hover:bg-emerald-600 shadow-lg active:scale-95 transition-all">
                    Tambah Produk
                </a>
            </div>
        </div>

        <!-- ALERT SUCCESS (Fitur) -->
        @if(session('success'))
            <div class="bg-emerald-50 border-l-4 border-emerald-500 p-6 rounded-r-xl mb-8 flex items-center shadow-sm">
                <svg class="w-6 h-6 text-emerald-500 mr-4" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="3" d="M5 13l4 4L19 7" /></svg>
                <p class="text-emerald-800 font-bold uppercase tracking-widest text-sm">{{ session('success') }}</p>
            </div>
        @endif

        <!-- KONTEN UTAMA: DAFTAR PRODUK BY BRAND (Fitur) -->
        @foreach($brands as $brand)
            <div class="bg-white rounded-2xl shadow-sm border border-slate-200 overflow-hidden mb-12">
                <!-- BRAND CARD HEADER -->
                <div class="bg-slate-50 px-8 py-5 border-b border-slate-200 flex justify-between items-center">
                    <h2 class="text-xl font-black text-slate-800 uppercase tracking-tight">{{ $brand->name }}</h2>
                    <span class="bg-indigo-100 text-indigo-700 px-4 py-1.5 rounded-full text-xs font-bold uppercase tracking-widest">
                        {{ $brand->products->count() }} Produk
                    </span>
                </div>

                <!-- TABLE STRUCTURE -->
                <div class="overflow-x-auto">
                    <table class="min-w-full divide-y divide-slate-100">
                        <thead class="bg-white">
                            <tr>
                                <th class="px-8 py-5 text-left text-xs font-bold text-slate-400 uppercase tracking-widest">Images</th>
                                <th class="px-8 py-5 text-left text-xs font-bold text-slate-400 uppercase tracking-widest">Nama Produk</th>
                                <th class="px-8 py-5 text-left text-xs font-bold text-slate-400 uppercase tracking-widest">Stok</th>
                                <th class="px-8 py-5 text-left text-xs font-bold text-slate-400 uppercase tracking-widest">Status</th>
                                <th class="px-8 py-5 text-right text-xs font-bold text-slate-400 uppercase tracking-widest">Aksi</th>
                            </tr>
                        </thead>
                        <tbody class="bg-white divide-y divide-slate-50">
                            @foreach($brand->products as $product)
                                <tr class="hover:bg-slate-50/50 transition-colors">
                                    <!-- COLUMN IMAGES -->
                                    <td class="px-8 py-6 whitespace-nowrap">
                                        <div class="w-10 h-10 bg-slate-100 rounded-lg flex items-center justify-center border border-slate-200 group">
                                            <span class="text-xs font-black text-slate-500 group-hover:text-indigo-600">
                                                {{ $product->images_count }}
                                            </span>
                                        </div>
                                    </td>
                                    <!-- COLUMN NAMA PRODUK -->
                                    <td class="px-8 py-6 whitespace-nowrap">
                                        <div class="text-sm font-bold text-slate-900">{{ $product->name }}</div>
                                    </td>
                                    <!-- COLUMN STOK -->
                                    <td class="px-8 py-6 whitespace-nowrap">
                                        @if($product->stock > 0)
                                            <span class="bg-emerald-50 text-emerald-600 px-3 py-1 rounded-md text-xs font-black uppercase tracking-widest">
                                                In Stock ({{ $product->stock }})
                                            </span>
                                        @else
                                            <span class="bg-rose-50 text-rose-600 px-3 py-1 rounded-md text-xs font-black uppercase tracking-widest">
                                                Out of Stock
                                            </span>
                                        @endif
                                    </td>
                                    <!-- COLUMN STATUS -->
                                    <td class="px-8 py-6 whitespace-nowrap">
                                        @if(!$product->is_hidden)
                                            <span class="inline-flex items-center bg-green-500 text-white px-3 py-1 rounded-md text-[10px] font-black uppercase tracking-widest">
                                                <svg class="w-3 h-3 mr-1.5" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="3" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" /><path stroke-linecap="round" stroke-linejoin="round" stroke-width="3" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z" /></svg>
                                                Visible
                                            </span>
                                        @else
                                            <span class="inline-flex items-center bg-slate-400 text-white px-3 py-1 rounded-md text-[10px] font-black uppercase tracking-widest">
                                                <svg class="w-3 h-3 mr-1.5" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="3" d="M13.875 18.825A10.05 10.05 0 0112 19c-4.478 0-8.268-2.943-9.543-7a9.97 9.97 0 011.563-3.029m5.858.908a3 3 0 114.243 4.243M9.878 9.878l4.242 4.242M9.88 9.88l-3.29-3.29m7.532 7.532l3.29 3.29M3 3l18 18" /></svg>
                                                Hidden
                                            </span>
                                        @endif
                                    </td>
                                    <!-- COLUMN AKSI -->
                                    <td class="px-8 py-6 whitespace-nowrap text-right text-sm font-bold">
                                        <div class="flex justify-end items-center space-x-3">
                                            <a href="{{ route('admin.products.edit', $product->id) }}" class="text-orange-500 hover:text-orange-600 transition-colors">Edit</a>
                                            <span class="text-slate-200">|</span>
                                            <form action="{{ route('admin.products.destroy', $product->id) }}" method="POST" onsubmit="return confirm('Hapus produk ini?')">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="text-rose-500 hover:text-rose-600 transition-colors">Hapus</button>
                                            </form>
                                        </div>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        @endforeach

        <!-- FOOTER DASHBOARD -->
        <div class="mt-20 text-center pb-12">
            <a href="{{ route('home') }}" class="text-indigo-600 hover:text-indigo-800 font-black uppercase tracking-widest text-xs transition-all border-b-2 border-transparent hover:border-indigo-600 pb-1">
                Lihat Halaman User &rarr;
            </a>
        </div>
    </main>

</body>
</html>
