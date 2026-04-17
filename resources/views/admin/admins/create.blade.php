<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah Admin - ArtaOtto</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-slate-50 font-sans text-slate-900">

    <div class="min-h-screen flex items-center justify-center py-12 px-4 sm:px-6 lg:px-8">
        <div class="max-w-xl w-full bg-white rounded-3xl shadow-xl p-10 border border-slate-200">
            <div class="text-center mb-10">
                <span class="text-2xl font-black text-indigo-600 tracking-tighter italic uppercase">ArtaOtto</span>
                <h1 class="text-3xl font-black text-slate-900 mt-4 tracking-tight">Tambah Admin Baru</h1>
                <p class="text-slate-500 mt-2 uppercase tracking-widest text-[10px] font-bold">Pendaftaran Akses Dashboard</p>
            </div>

            @if($errors->any())
                <div class="bg-red-50 border-l-4 border-red-500 p-4 mb-8">
                    <ul class="list-disc pl-5">
                        @foreach($errors->all() as $error)
                            <li class="text-red-700 text-sm font-bold">{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <form action="{{ route('admin.admins.store') }}" method="POST" class="space-y-6">
                @csrf
                
                <div>
                    <label class="block text-xs font-bold text-slate-500 uppercase tracking-widest mb-2">Nama Lengkap</label>
                    <input type="text" name="name" value="{{ old('name') }}" required autofocus
                           class="w-full bg-slate-50 border border-slate-200 p-4 rounded-xl focus:ring-2 focus:ring-indigo-500 outline-none transition-all"
                           placeholder="Contoh: Admin Utama">
                </div>

                <div>
                    <label class="block text-xs font-bold text-slate-500 uppercase tracking-widest mb-2">Alamat Email</label>
                    <input type="email" name="email" value="{{ old('email') }}" required
                           class="w-full bg-slate-50 border border-slate-200 p-4 rounded-xl focus:ring-2 focus:ring-indigo-500 outline-none transition-all"
                           placeholder="email@artaotto.com">
                </div>

                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    <div>
                        <label class="block text-xs font-bold text-slate-500 uppercase tracking-widest mb-2">Password</label>
                        <input type="password" name="password" required
                               class="w-full bg-slate-50 border border-slate-200 p-4 rounded-xl focus:ring-2 focus:ring-indigo-500 outline-none transition-all"
                               placeholder="••••••••">
                    </div>
                    <div>
                        <label class="block text-xs font-bold text-slate-500 uppercase tracking-widest mb-2">Konfirmasi Password</label>
                        <input type="password" name="password_confirmation" required
                               class="w-full bg-slate-50 border border-slate-200 p-4 rounded-xl focus:ring-2 focus:ring-indigo-500 outline-none transition-all"
                               placeholder="••••••••">
                    </div>
                </div>

                <div>
                    <label class="block text-xs font-bold text-slate-500 uppercase tracking-widest mb-2">Role Akses</label>
                    <select name="role" required class="w-full bg-slate-50 border border-slate-200 p-4 rounded-xl focus:ring-2 focus:ring-indigo-500 outline-none transition-all appearance-none">
                        <option value="company" {{ old('role') == 'company' ? 'selected' : '' }}>Company (Admin Harian)</option>
                        <option value="developer" {{ old('role') == 'developer' ? 'selected' : '' }}>Developer (Akses Teknis)</option>
                    </select>
                </div>

                <div class="pt-4 flex items-center justify-between">
                    <a href="{{ route('admin.admins.index') }}" class="text-slate-400 hover:text-slate-600 font-bold uppercase tracking-widest text-[10px]">
                        &larr; Batal
                    </a>
                    <button type="submit" 
                            class="bg-indigo-600 text-white font-bold px-10 py-4 rounded-xl hover:bg-indigo-700 shadow-lg active:scale-95 transition-all text-sm uppercase tracking-widest">
                        Simpan Admin
                    </button>
                </div>
            </form>
        </div>
    </div>

</body>
</html>
