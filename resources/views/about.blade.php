@extends('layouts.app')

@section('content')
    <!-- 1. HERO ABOUT SECTION (Fitur 1) -->
    <section class="relative h-[60vh] min-h-[500px] flex items-center overflow-hidden bg-slate-900">
        <!-- Background Image with Overlay -->
        <div class="absolute inset-0 z-0">
            <img src="https://images.unsplash.com/photo-1629909613654-28e377c37b09?q=80&w=2070&auto=format&fit=crop" 
                 alt="Clinic Background" 
                 class="w-full h-full object-cover">
            <div class="absolute inset-0 bg-slate-900/70"></div>
        </div>

        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 relative z-20 w-full">
            <div class="grid grid-cols-1 lg:grid-cols-2 gap-12 items-center">
                <!-- Kiri: Text Content -->
                <div class="text-white">
                    <span class="inline-block bg-orange-500 text-white px-4 py-1 rounded-full text-sm font-bold uppercase tracking-widest mb-4">PROFILE</span>
                    <h1 class="text-6xl lg:text-8xl font-black mb-8 tracking-tighter uppercase">ArtaOtto</h1>
                    <div class="space-y-6 max-w-xl">
                        <p class="text-xl text-slate-200 leading-relaxed font-light">
                            ArtaOtto adalah perusahaan distribusi alat kesehatan gigi yang berdedikasi untuk memberikan solusi terbaik bagi para praktisi dental di seluruh Indonesia.
                        </p>
                        <p class="text-lg text-slate-300 leading-relaxed">
                            Kami percaya bahwa kesehatan mulut yang baik dimulai dari peralatan yang tepat. Inilah sebabnya kami hanya bermitra dengan brand-brand global yang mengutamakan inovasi dan kualitas tanpa kompromi.
                        </p>
                    </div>
                </div>

                <!-- Kanan: Orange Circle Decor -->
                <div class="hidden lg:flex justify-end pr-0">
                    <div class="w-96 h-96 bg-white rounded-full flex items-center justify-center translate-x-32 shadow-2xl relative">
                        <!-- Abstract Logo Placeholder -->
                        <img src="{{ asset('images/LogoArtaWarna.png') }}" alt="Logo">
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- 2. CORE VALUES SECTION (Fitur 2 - Zig-Zag Layout) -->
    <section class="py-0">
        <!-- Row 1: Innovation (Navy) -->
        <div class="grid grid-cols-1 lg:grid-cols-2 bg-slate-900 items-stretch">
            <div class="p-16 lg:p-24 flex items-center justify-center">
                <div class="text-white text-center flex flex-col items-center">
                    <div class="w-24 h-24 bg-indigo-500/20 rounded-full flex items-center justify-center mb-8 border border-indigo-400">
                        <svg class="w-12 h-12 text-indigo-400" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9.663 17h4.673M12 3v1m6.364 1.636l-.707.707M21 12h-1M4 12H3m3.343-5.657l-.707-.707m2.828 9.9a5 5 0 117.072 0l-.548.547A3.374 3.374 0 0014 18.469V19a2 2 0 11-4 0v-.531c0-.895-.356-1.754-.988-2.386l-.548-.547z" /></svg>
                    </div>
                    <h2 class="text-4xl font-black uppercase tracking-tighter mb-4">Innovation</h2>
                    <p class="text-lg text-slate-300 leading-relaxed max-w-md mx-auto">
                        Kami terus mencari terobosan teknologi terbaru dalam dunia kedokteran gigi untuk menghadirkan efisiensi maksimal bagi klinik Anda.
                    </p>
                </div>
            </div>
            <div class="hidden lg:block bg-indigo-600">
                <img src="https://images.unsplash.com/photo-1579684385127-1ef15d508118?q=80&w=1780&auto=format&fit=crop" class="w-full h-full object-cover grayscale opacity-50" alt="Innovation">
            </div>
        </div>

        <!-- Row 2: Quality (Orange) -->
        <div class="grid grid-cols-1 lg:grid-cols-2 bg-orange-500 items-stretch">
            <div class="hidden lg:block bg-orange-600 order-1">
                <img src="https://images.unsplash.com/photo-1588776814546-1ffcf47267a5?q=80&w=1770&auto=format&fit=crop" class="w-full h-full object-cover grayscale opacity-50" alt="Quality">
            </div>
            <div class="p-16 lg:p-24 flex items-center justify-center order-2">
                <div class="text-white text-center flex flex-col items-center">
                    <div class="w-24 h-24 bg-white/20 rounded-full flex items-center justify-center mb-8 border border-white/40 text-white">
                        <svg class="w-12 h-12" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z" /></svg>
                    </div>
                    <h2 class="text-4xl font-black uppercase tracking-tighter mb-4">Quality</h2>
                    <p class="text-xl text-orange-50 leading-relaxed max-w-md mx-auto">
                        Setiap produk telah melalui seleksi ketat untuk memastikan durabilitas dan performa medis yang sesuai dengan standar internasional.
                    </p>
                </div>
            </div>
        </div>

        <!-- Row 3: Support (Navy) -->
        <div class="grid grid-cols-1 lg:grid-cols-2 bg-slate-900 items-stretch">
            <div class="p-16 lg:p-24 flex items-center justify-center">
                <div class="text-white text-center flex flex-col items-center">
                    <div class="w-24 h-24 bg-indigo-500/20 rounded-full flex items-center justify-center mb-8 border border-indigo-400">
                        <svg class="w-12 h-12 text-indigo-400" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z" /></svg>
                    </div>
                    <h2 class="text-4xl font-black uppercase tracking-tighter mb-4">Support</h2>
                    <p class="text-lg text-slate-300 leading-relaxed max-w-md mx-auto">
                        Layanan purna jual kami menjamin ketenangan pikiran Anda dengan dukungan teknis dan garansi menyeluruh untuk setiap alat.
                    </p>
                </div>
            </div>
            <div class="hidden lg:block bg-indigo-700">
                <img src="https://images.unsplash.com/photo-1544005313-94ddf0286df2?q=80&w=1888&auto=format&fit=crop" class="w-full h-full object-cover grayscale opacity-50" alt="Support">
            </div>
        </div>

        <!-- Row 4: Distribution (Orange) -->
        <div class="grid grid-cols-1 lg:grid-cols-2 bg-orange-500 items-stretch">
            <div class="hidden lg:block bg-orange-600 order-1">
                <img src="https://images.unsplash.com/photo-1586528116311-ad8dd3c8310d?q=80&w=1770&auto=format&fit=crop" class="w-full h-full object-cover grayscale opacity-50" alt="Distribution">
            </div>
            <div class="p-16 lg:p-24 flex items-center justify-center order-2">
                <div class="text-white text-center flex flex-col items-center">
                    <div class="w-24 h-24 bg-white/20 rounded-full flex items-center justify-center mb-8 border border-white/40 text-white">
                        <svg class="w-12 h-12" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3.055 11H5a2 2 0 012 2v1a2 2 0 002 2 2 2 0 012 2v2.945M8 3.935V5.5A2.5 2.5 0 0010.5 8h.5a2 2 0 012 2 2 2 0 002 2h1.064M15 20.488V18a2 2 0 012-2h3.064M21 12a9 9 0 11-18 0 9 9 0 0118 0z" /></svg>
                    </div>
                    <h2 class="text-4xl font-black uppercase tracking-tighter mb-4">Distribution</h2>
                    <p class="text-xl text-orange-50 leading-relaxed max-w-md mx-auto">
                        Jejaring logistik kami yang luas memastikan pengiriman peralatan berkualitas tinggi tepat waktu ke seluruh penjuru Nusantara.
                    </p>
                </div>
            </div>
        </div>
    </section>

    <!-- 3. CONTACT SECTION (Fitur 3) -->
    <section id="contact" class="py-24 bg-orange-500">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center mb-16 text-white">
                <h2 class="text-5xl font-black uppercase tracking-tighter mb-4">Contact Us</h2>
                <div class="h-1.5 w-24 bg-white mx-auto rounded-full"></div>
            </div>

            <div class="grid grid-cols-1 lg:grid-cols-2 gap-16">
                <!-- Kiri: Logo & Info -->
                <div class="flex flex-col justify-center">
                    <div class="text-6xl font-black text-white italic tracking-tighter uppercase mb-6">ArtaOtto</div>
                    <p class="text-xl text-orange-50 leading-relaxed">
                        Siap untuk meningkatkan kualitas pelayanan klinik Anda? Hubungi tim profesional kami sekarang juga untuk konsultasi dan penawaran terbaik.
                    </p>
                </div>

                <!-- Kanan: Contact Form -->
                <div class="bg-white p-12 rounded-[2rem] shadow-2xl">
                    {{-- Success/Error Messages --}}
                    @if(session('success'))
                        <div class="mb-6 bg-green-50 border border-green-200 text-green-700 px-4 py-3 rounded-xl text-sm font-medium">
                            {{ session('success') }}
                        </div>
                    @endif
                    @if(session('error'))
                        <div class="mb-6 bg-red-50 border border-red-200 text-red-700 px-4 py-3 rounded-xl text-sm font-medium">
                            {{ session('error') }}
                        </div>
                    @endif

                    <form action="{{ route('contact.send') }}" method="POST" class="space-y-6">
                        @csrf
                        <div>
                            <label class="block text-sm font-bold text-gray-700 uppercase mb-2 tracking-widest">Full Name</label>
                            <input type="text" name="name" value="{{ old('name') }}" placeholder="John Doe" class="w-full bg-slate-50 border {{ $errors->has('name') ? 'border-red-400' : 'border-slate-200' }} p-4 rounded-xl focus:ring-2 focus:ring-orange-500 outline-none transition-all">
                            @error('name') <p class="text-red-500 text-xs mt-1">{{ $message }}</p> @enderror
                        </div>
                        <div>
                            <label class="block text-sm font-bold text-gray-700 uppercase mb-2 tracking-widest">Email Address</label>
                            <input type="email" name="email" value="{{ old('email') }}" placeholder="john@example.com" class="w-full bg-slate-50 border {{ $errors->has('email') ? 'border-red-400' : 'border-slate-200' }} p-4 rounded-xl focus:ring-2 focus:ring-orange-500 outline-none transition-all">
                            @error('email') <p class="text-red-500 text-xs mt-1">{{ $message }}</p> @enderror
                        </div>
                        <div>
                            <label class="block text-sm font-bold text-gray-700 uppercase mb-2 tracking-widest">Message</label>
                            <textarea rows="4" name="message" placeholder="How can we help you?" class="w-full bg-slate-50 border {{ $errors->has('message') ? 'border-red-400' : 'border-slate-200' }} p-4 rounded-xl focus:ring-2 focus:ring-orange-500 outline-none transition-all resize-none">{{ old('message') }}</textarea>
                            @error('message') <p class="text-red-500 text-xs mt-1">{{ $message }}</p> @enderror
                        </div>
                        <button type="submit" class="w-full bg-slate-900 text-white font-bold py-4 rounded-xl hover:bg-slate-800 transition-all text-lg shadow-lg active:scale-95 uppercase tracking-widest">
                            Send Message
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </section>
@endsection
