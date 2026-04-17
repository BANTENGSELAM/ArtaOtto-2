<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Kelola Admin - ArtaOtto</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-slate-50 font-sans text-slate-900">

    <nav class="bg-white border-b border-slate-200 sticky top-0 z-50">
        <div class="max-w-[1400px] mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex justify-between h-20">
                <div class="flex items-center">
                    <span class="text-2xl font-black text-indigo-600 tracking-tighter italic uppercase">ArtaOtto</span>
                </div>
                <div class="flex items-center space-x-4">
                    <a href="{{ route('admin.dashboard') }}" class="text-slate-500 hover:text-indigo-600 text-sm font-bold uppercase tracking-widest transition-all">
                        Kembali ke Dashboard
                    </a>
                </div>
            </div>
        </div>
    </nav>

    <main class="max-w-[1400px] mx-auto py-10 px-4 sm:px-6 lg:px-8">
        <div class="flex justify-between items-center mb-10">
            <div>
                <h1 class="text-4xl font-black text-slate-900 tracking-tight">Kelola Admin</h1>
                <p class="text-slate-500 mt-1">Daftar akun yang memiliki akses ke dashboard ArtaOtto.</p>
            </div>
            <a href="{{ route('admin.admins.create') }}" class="bg-indigo-600 text-white px-6 py-3 rounded-xl font-bold text-sm uppercase tracking-widest hover:bg-indigo-700 shadow-lg active:scale-95 transition-all">
                + Tambah Admin
            </a>
        </div>

        @if(session('success'))
            <div class="bg-emerald-50 border-l-4 border-emerald-500 p-6 rounded-r-xl mb-8 flex items-center shadow-sm">
                <svg class="w-6 h-6 text-emerald-500 mr-4" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="3" d="M5 13l4 4L19 7" /></svg>
                <p class="text-emerald-800 font-bold uppercase tracking-widest text-sm">{{ session('success') }}</p>
            </div>
        @endif

        <div class="bg-white rounded-2xl shadow-sm border border-slate-200 overflow-hidden">
            <div class="overflow-x-auto">
                <table class="min-w-full divide-y divide-slate-100">
                    <thead class="bg-slate-50">
                        <tr>
                            <th class="px-8 py-5 text-left text-xs font-bold text-slate-400 uppercase tracking-widest">Nama</th>
                            <th class="px-8 py-5 text-left text-xs font-bold text-slate-400 uppercase tracking-widest">Email</th>
                            <th class="px-8 py-5 text-left text-xs font-bold text-slate-400 uppercase tracking-widest">Role</th>
                            <th class="px-8 py-5 text-left text-xs font-bold text-slate-400 uppercase tracking-widest">Terdaftar Pada</th>
                        </tr>
                    </thead>
                    <tbody class="bg-white divide-y divide-slate-50">
                        @foreach($admins as $admin)
                            <tr class="hover:bg-slate-50/50 transition-colors">
                                <td class="px-8 py-6 whitespace-nowrap">
                                    <div class="text-sm font-bold text-slate-900">{{ $admin->name }}</div>
                                </td>
                                <td class="px-8 py-6 whitespace-nowrap">
                                    <div class="text-sm text-slate-600">{{ $admin->email }}</div>
                                </td>
                                <td class="px-8 py-6 whitespace-nowrap">
                                    <span class="px-3 py-1 rounded-md text-[10px] font-black uppercase tracking-widest {{ $admin->role === 'developer' ? 'bg-amber-100 text-amber-700' : 'bg-indigo-100 text-indigo-700' }}">
                                        {{ $admin->role }}
                                    </span>
                                </td>
                                <td class="px-8 py-6 whitespace-nowrap text-sm text-slate-400">
                                    {{ $admin->created_at->format('d M Y, H:i') }}
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </main>

</body>
</html>
