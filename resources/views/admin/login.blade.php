<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Login - ArtaOtto</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-slate-100 h-screen flex items-center justify-center">

    <div class="max-w-md w-full bg-white rounded-2xl shadow-xl p-10 border border-slate-200">
        <div class="text-center mb-10">
            <h1 class="text-3xl font-black text-indigo-600 tracking-tighter italic uppercase">ArtaOtto</h1>
            <p class="text-slate-500 font-bold uppercase tracking-widest text-xs mt-2">Admin Control Panel</p>
        </div>

        @if($errors->any())
            <div class="bg-red-50 border-l-4 border-red-500 p-4 mb-6">
                <p class="text-red-700 text-sm font-bold">{{ $errors->first() }}</p>
            </div>
        @endif

        <form action="{{ route('admin.login.submit') }}" method="POST" class="space-y-6">
            @csrf
            <div>
                <label class="block text-xs font-bold text-slate-500 uppercase tracking-widest mb-2">Email Address</label>
                <input type="email" name="email" value="{{ old('email') }}" required autofocus
                       class="w-full bg-slate-50 border border-slate-200 p-4 rounded-xl focus:ring-2 focus:ring-indigo-500 outline-none transition-all"
                       placeholder="admin@artaotto.com">
            </div>

            <div>
                <label class="block text-xs font-bold text-slate-500 uppercase tracking-widest mb-2">Password</label>
                <input type="password" name="password" required
                       class="w-full bg-slate-50 border border-slate-200 p-4 rounded-xl focus:ring-2 focus:ring-indigo-500 outline-none transition-all"
                       placeholder="••••••••">
            </div>

            <button type="submit" 
                    class="w-full bg-indigo-600 text-white font-bold py-4 rounded-xl hover:bg-indigo-700 shadow-lg active:scale-95 transition-all text-sm uppercase tracking-widest">
                Login to Dashboard
            </button>
        </form>

        <div class="mt-8 text-center">
            <a href="{{ route('home') }}" class="text-slate-400 hover:text-indigo-600 text-xs font-bold uppercase tracking-widest transition-colors">
                &larr; Back to Website
            </a>
        </div>
    </div>

</body>
</html>
