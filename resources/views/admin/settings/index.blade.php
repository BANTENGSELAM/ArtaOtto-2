<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sistem CMS Settings - ArtaOtto Admin</title>
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
                        <a href="{{ route('admin.settings.index') }}" class="inline-flex items-center px-1 pt-1 border-b-2 border-indigo-500 text-sm font-bold text-slate-900 uppercase tracking-widest">
                            Settings / CMS
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

    <main class="max-w-4xl mx-auto py-10 px-4 sm:px-6 lg:px-8">
        
        <div class="mb-10 text-center">
            <h1 class="text-4xl font-black text-slate-900 tracking-tight">Manajemen Konten (CMS)</h1>
            <p class="text-slate-500 mt-2">Ubah teks dan logo pada Landing Page ArtaOtto.</p>
        </div>

        @if(session('success'))
            <div class="bg-emerald-50 border-l-4 border-emerald-500 p-6 rounded-r-xl mb-8 flex items-center shadow-sm">
                <svg class="w-6 h-6 text-emerald-500 mr-4" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="3" d="M5 13l4 4L19 7" /></svg>
                <p class="text-emerald-800 font-bold uppercase tracking-widest text-sm">{{ session('success') }}</p>
            </div>
        @endif

        <div class="bg-white rounded-2xl shadow-sm border border-slate-200 overflow-hidden">
            <form action="{{ route('admin.settings.update') }}" method="POST" enctype="multipart/form-data" class="p-8 space-y-8">
                @csrf
                @method('PUT')

                <!-- SECTION: HERO -->
                <div>
                    <h2 class="text-xl font-black text-slate-800 uppercase tracking-tight mb-4 border-b pb-2">1. Hero Section</h2>
                    
                    <div class="space-y-4">
                        <div>
                            <label class="block text-xs font-bold text-slate-500 uppercase tracking-widest mb-1">Hero Title</label>
                            <input type="text" name="hero_title" value="{{ $settings['hero_title'] ?? '' }}" class="w-full bg-slate-50 border border-slate-200 p-3 rounded-lg focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500 outline-none transition-all text-sm font-medium">
                        </div>
                        
                        <div>
                            <label class="block text-xs font-bold text-slate-500 uppercase tracking-widest mb-1">Hero Description</label>
                            <textarea name="hero_desc" rows="3" class="w-full bg-slate-50 border border-slate-200 p-3 rounded-lg focus:ring-2 focus:ring-indigo-500 outline-none transition-all text-sm font-medium">{{ $settings['hero_desc'] ?? '' }}</textarea>
                        </div>
                    </div>
                </div>

                <!-- SECTION: LOGO SLIDER -->
                <div>
                    <h2 class="text-xl font-black text-slate-800 uppercase tracking-tight mb-4 border-b pb-2">2. Logo Slider</h2>
                    
                    <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
                        @for($i = 1; $i <= 3; $i++)
                        <div class="bg-slate-50 p-4 rounded-xl border border-slate-100 text-center">
                            <label class="block text-xs font-bold text-slate-500 uppercase tracking-widest mb-3">Logo {{ $i }}</label>
                            
                            @php $logoKey = 'hero_logo_' . $i; @endphp
                            @if(isset($settings[$logoKey]) && $settings[$logoKey])
                                <div class="mb-4 h-24 flex items-center justify-center bg-white rounded-lg border border-slate-200 overflow-hidden p-2">
                                    <img src="{{ \Str::startsWith($settings[$logoKey], 'settings') ? asset('storage/' . $settings[$logoKey]) : asset($settings[$logoKey]) }}" alt="Logo {{ $i }}" class="max-h-full max-w-full object-contain">
                                </div>
                            @endif
                            
                            <input type="file" name="hero_logo_{{ $i }}" accept="image/*" class="w-full text-xs text-slate-500 file:mr-4 file:py-2 file:px-4 file:rounded-full file:border-0 file:text-xs file:font-semibold file:bg-indigo-50 file:text-indigo-700 hover:file:bg-indigo-100">
                        </div>
                        @endfor
                    </div>
                </div>

                <!-- SECTION: LAINNYA -->
                <div>
                    <h2 class="text-xl font-black text-slate-800 uppercase tracking-tight mb-4 border-b pb-2">3. Halaman Lainnya</h2>
                    
                    <div class="space-y-4">
                        <div>
                            <label class="block text-xs font-bold text-slate-500 uppercase tracking-widest mb-1">About Text</label>
                            <textarea name="about_text" rows="4" class="w-full bg-slate-50 border border-slate-200 p-3 rounded-lg focus:ring-2 focus:ring-indigo-500 outline-none transition-all text-sm font-medium">{{ $settings['about_text'] ?? '' }}</textarea>
                        </div>
                        
                        <div>
                            <label class="block text-xs font-bold text-slate-500 uppercase tracking-widest mb-1">Contact Info (Address / Detail)</label>
                            <textarea name="contact_info" rows="3" class="w-full bg-slate-50 border border-slate-200 p-3 rounded-lg focus:ring-2 focus:ring-indigo-500 outline-none transition-all text-sm font-medium">{{ $settings['contact_info'] ?? '' }}</textarea>
                        </div>
                    </div>
                </div>

                <div class="pt-6 border-t border-slate-100 flex justify-end">
                    <button type="submit" class="bg-indigo-600 text-white px-8 py-4 rounded-xl font-bold text-sm uppercase tracking-widest hover:bg-indigo-700 shadow-xl active:scale-95 transition-all">
                        Simpan Perubahan
                    </button>
                </div>
            </form>
        </div>

    </main>
</body>
</html>
