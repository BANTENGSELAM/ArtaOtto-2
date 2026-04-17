<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Manajemen Slider Gambar - ArtaOtto Admin</title>
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
                        <a href="{{ route('admin.dashboard') }}" class="inline-flex items-center px-1 pt-1 border-b-2 border-transparent text-sm font-bold text-slate-500 hover:text-slate-900 uppercase tracking-widest">
                            Dashboard
                        </a>
                        <a href="{{ route('admin.sliders.index') }}" class="inline-flex items-center px-1 pt-1 border-b-2 border-indigo-500 text-sm font-bold text-slate-900 uppercase tracking-widest">
                            Kelola Slider
                        </a>
                    </div>
                </div>
                <div class="flex items-center space-x-4">
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
        
        <div class="mb-10 text-center">
            <h1 class="text-4xl font-black text-slate-900 tracking-tight">Manajemen Slider Gambar</h1>
            <p class="text-slate-500 mt-2">Daftar gambar slideshow tanpa bingkai untuk halaman utama.</p>
        </div>

        @if(session('success'))
            <div class="max-w-4xl mx-auto bg-emerald-50 border-l-4 border-emerald-500 p-6 rounded-r-xl mb-8 flex items-center shadow-sm">
                <svg class="w-6 h-6 text-emerald-500 mr-4" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="3" d="M5 13l4 4L19 7" /></svg>
                <p class="text-emerald-800 font-bold uppercase tracking-widest text-sm">{{ session('success') }}</p>
            </div>
        @endif
        
        @if($errors->any())
            <div class="max-w-4xl mx-auto bg-rose-50 border-l-4 border-rose-500 p-6 rounded-r-xl mb-8">
                <ul class="list-disc list-inside text-rose-700 font-medium text-sm">
                    @foreach($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <div class="max-w-4xl mx-auto bg-white rounded-2xl shadow-sm border border-slate-200 overflow-hidden mb-12">
            <form action="{{ route('admin.sliders.store') }}" method="POST" enctype="multipart/form-data" class="p-8 bg-slate-50 border-b border-slate-200 flex flex-col md:flex-row gap-6 items-end">
                @csrf
                <div class="flex-grow">
                    <label class="block text-xs font-bold text-slate-500 uppercase tracking-widest mb-2">Tambah Gambar Baru</label>
                    <input type="file" name="image" accept="image/*" required class="w-full text-sm text-slate-500 file:mr-4 file:py-3 file:px-6 file:rounded-xl file:border-0 file:text-sm file:font-semibold file:bg-white file:border file:border-slate-200 file:text-indigo-600 hover:file:bg-indigo-50 focus:outline-none bg-white border border-slate-200 rounded-xl">
                </div>
                <button type="submit" class="bg-indigo-600 text-white px-8 py-3 rounded-xl font-bold text-sm uppercase tracking-widest hover:bg-indigo-700 shadow-lg active:scale-95 transition-all whitespace-nowrap h-[50px]">
                    Upload Gambar
                </button>
            </form>

            <div class="p-8">
                <h2 class="text-xl font-black text-slate-800 uppercase tracking-tight mb-6">Gambar Slider Saat Ini</h2>
                
                @if($sliders->count() > 0)
                    <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 gap-6">
                        @foreach($sliders as $slider)
                            <div class="relative bg-slate-50 p-3 rounded-2xl border border-slate-200 group">
                                <div class="aspect-square bg-slate-200 rounded-xl overflow-hidden mb-4 relative">
                                    <img src="{{ asset('storage/' . $slider->image_path) }}" alt="Slider Image" class="w-full h-full object-cover">
                                    
                                    <!-- Aksi Hapus Hover -->
                                    <div class="absolute inset-0 bg-black/50 opacity-0 group-hover:opacity-100 transition-opacity flex items-center justify-center">
                                        <form action="{{ route('admin.sliders.destroy', $slider->id) }}" method="POST" onsubmit="return confirm('Hapus gambar ini dari slider?');" class="w-full h-full flex items-center justify-center">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="bg-rose-500 text-white p-3 rounded-full hover:bg-rose-600 shadow-xl transform scale-75 group-hover:scale-100 transition-all">
                                                <svg class="w-6 h-6" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" /></svg>
                                            </button>
                                        </form>
                                    </div>
                                </div>
                                <div class="text-center">
                                    <span class="text-xs font-bold text-slate-400 uppercase tracking-widest">Urutan: {{ $loop->iteration }}</span>
                                </div>
                            </div>
                        @endforeach
                    </div>
                @else
                    <div class="text-center py-12 border-2 border-dashed border-slate-200 rounded-2xl">
                        <svg class="mx-auto h-12 w-12 text-slate-300 mb-4" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z" /></svg>
                        <p class="text-slate-500 font-medium">Belum ada gambar slider yang ditambahkan.</p>
                        <p class="text-slate-400 text-sm mt-1">Silakan upload gambar pertama Anda di atas.</p>
                    </div>
                @endif
            </div>
        </div>

    </main>
</body>
</html>
