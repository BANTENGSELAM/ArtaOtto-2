@extends('layouts.app')

@section('content')
    <!-- 1. Hero Section (Fitur 3) -->
    <!-- 1. Hero Section (FULL SCREEN) -->
    <section class="min-h-screen bg-white flex items-center overflow-hidden">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 w-full">
            <div class="grid grid-cols-1 lg:grid-cols-2 gap-12 items-center">
                
                <!-- Kiri: Text -->
                <div class="z-10 text-center lg:text-left">
                    <h1 class="text-5xl lg:text-7xl font-extrabold text-[#262A6A] leading-tight mb-6 tracking-tighter">
                        {!! getSetting('hero_title', 'Welcome to <span class="text-[#F47C21]">ArtaOtto</span>') !!}
                    </h1>

                    <p class="text-xl text-gray-600 mb-10 max-w-2xl mx-auto lg:mx-0 leading-relaxed">
                        {{ getSetting('hero_desc', 'Kami adalah mitra strategis Anda dalam menyediakan peralatan kedokteran gigi tercanggih. Dengan fokus pada kualitas dan inovasi, kami memastikan setiap klinik memiliki instrumen terbaik.') }}
                    </p>

                    <div class="flex flex-col sm:flex-row justify-center lg:justify-start gap-4">
                        <a href="{{ route('products.index') }}" 
                        class="bg-indigo-600 text-white px-8 py-4 rounded-full font-bold text-lg hover:bg-indigo-700 transition-all shadow-xl hover:-translate-y-1">
                            Explore Products
                        </a>

                        <a href="#contact" 
                        class="bg-gray-100 text-gray-900 px-8 py-4 rounded-full font-bold text-lg hover:bg-gray-200 transition-all">
                            Contact Us
                        </a>
                    </div>
                </div>

                <!-- Kanan: Dynamic Full-Frame Logo Slider -->
                <div class="flex justify-center lg:justify-end relative">
                    <div class="absolute -inset-10 bg-indigo-50 rounded-full blur-3xl opacity-60"></div>

                    @php
                        $sliderImages = \App\Models\SliderImage::orderBy('created_at', 'asc')->get();
                        // Provide default dummy array if empty
                        if($sliderImages->count() === 0){
                            $sliderImages = collect([
                                (object)['image_path' => 'images/logo1.png', 'is_default' => true],
                                (object)['image_path' => 'images/logo2.png', 'is_default' => true],
                                (object)['image_path' => 'images/logo3.png', 'is_default' => true]
                            ]);
                        }
                        $totalSlides = $sliderImages->count();
                    @endphp

                    <!-- Dynamic JS Slider Container (No Frame/Padding) -->
                    <div class="relative bg-white rounded-[3rem] shadow-2xl flex flex-col items-center justify-center aspect-square w-full max-w-md overflow-hidden">
                        
                        <!-- 1. Struktur HTML card slider -->
                        <!-- Slider Track Container -->
                        <div class="w-full h-full relative overflow-hidden flex items-center justify-center">
                            <!-- Horizontal Track untuk Smooth Transition -->
                            <div class="flex w-full h-full transition-transform duration-500 ease-in-out items-center" id="logoSliderTrack">
                                
                                @foreach($sliderImages as $slider)
                                <div class="w-full h-full flex-shrink-0 flex items-center justify-center">
                                    <img src="{{ isset($slider->is_default) ? asset($slider->image_path) : asset('storage/' . $slider->image_path) }}" alt="Slider Image {{ $loop->iteration }}" class="w-full h-full object-cover">
                                </div>
                                @endforeach

                            </div>
                        </div>
                        
                        <!-- Indicator dot -->
                        <div class="absolute bottom-6 flex space-x-3">
                            @foreach($sliderImages as $index => $slider)
                            <button onclick="changeSlide({{ $index }})" class="slider-dot w-3 h-3 rounded-full transition-colors duration-300 {{ $index === 0 ? 'bg-blue-600' : 'bg-gray-300' }}" aria-label="Slide {{ $index + 1 }}"></button>
                            @endforeach
                        </div>
                    </div>
                </div>

                    <!-- JavaScript sederhana untuk Slider Logic & Auto Slide -->
                    <script>
                        let currentSlide = 0;
                        const totalSlides = {{ $totalSlides }};
                    
                    function changeSlide(index) {
                        currentSlide = index;
                        updateSlider();
                    }

                    function updateSlider() {
                        // Geser track secara horizontal
                        const track = document.getElementById('logoSliderTrack');
                        if (track) {
                            track.style.transform = `translateX(-${currentSlide * 100}%)`;
                        }

                        // Update interaksi warna pada indicator dots (Aktif -> Biru, Tidak Aktif -> Abu)
                        const dots = document.querySelectorAll('.slider-dot');
                        dots.forEach((dot, idx) => {
                            if (idx === currentSlide) {
                                dot.classList.replace('bg-gray-300', 'bg-blue-600');
                            } else {
                                dot.classList.replace('bg-blue-600', 'bg-gray-300');
                            }
                        });
                    }

                    // 5. Auto slide function (setiap 3 detik / 3000ms)
                    setInterval(() => {
                        currentSlide = (currentSlide + 1) % totalSlides;
                        updateSlider();
                    }, 3000);
                </script>

            </div>
        </div>
    </section>

    <!-- 2. Company Introduction (Fitur 4) -->
    <section class="relative py-24 bg-orange-500 overflow-hidden">
        <!-- Background Decor (Simulating medical theme) -->
        <div class="absolute inset-0 opacity-10 pointer-events-none">
            <svg class="w-full h-full" viewBox="0 0 100 100" preserveAspectRatio="none">
                <path d="M0,50 Q25,30 50,50 T100,50" fill="none" stroke="currentColor" stroke-width="0.5" />
                <path d="M0,70 Q25,50 50,70 T100,70" fill="none" stroke="currentColor" stroke-width="0.5" />
            </svg>
        </div>

        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 relative">
            <div class="text-center mb-16">
                <h2 class="text-4xl font-black text-white uppercase tracking-tighter mb-4">Kenapa pilih kami?</h2>
                <div class="h-1.5 w-24 bg-white mx-auto rounded-full"></div>
            </div>

            <!-- Floating Feature Cards (2x2 Grid) -->
            <div class="grid grid-cols-1 sm:grid-cols-2 gap-8 max-w-4xl mx-auto">
                <!-- Card 1 -->
                <div class="bg-white p-10 rounded-3xl shadow-lg border border-gray-100 flex flex-col items-center text-center hover:shadow-2xl transition-all hover:-translate-y-2">
                    <div class="w-16 h-16 bg-indigo-100 rounded-2xl flex items-center justify-center text-indigo-600 mb-6">
                        <svg class="w-8 h-8" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z" /></svg>
                    </div>
                    <h3 class="text-2xl font-bold mb-3 text-gray-800">10+ Experience</h3>
                    <p class="text-gray-500">Lebih dari satu dekade melayani kebutuhan dental di Indonesia.</p>
                </div>
                <!-- Card 2 -->
                <div class="bg-white p-10 rounded-3xl shadow-lg border border-gray-100 flex flex-col items-center text-center hover:shadow-2xl transition-all hover:-translate-y-2 lg:translate-y-8">
                    <div class="w-16 h-16 bg-green-100 rounded-2xl flex items-center justify-center text-green-600 mb-6">
                        <svg class="w-8 h-8" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" /></svg>
                    </div>
                    <h3 class="text-2xl font-bold mb-3 text-gray-800">Quality Product</h3>
                    <p class="text-gray-500">Hanya menyediakan produk dengan standar kualitas internasional terbaik.</p>
                </div>
                <!-- Card 3 -->
                <div class="bg-white p-10 rounded-3xl shadow-lg border border-gray-100 flex flex-col items-center text-center hover:shadow-2xl transition-all hover:-translate-y-2">
                    <div class="w-16 h-16 bg-yellow-100 rounded-2xl flex items-center justify-center text-yellow-600 mb-6">
                        <svg class="w-8 h-8" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z" /></svg>
                    </div>
                    <h3 class="text-2xl font-bold mb-3 text-gray-800">ISO Certified</h3>
                    <p class="text-gray-500">Seluruh operasional kami telah tersertifikasi standar manajemen mutu.</p>
                </div>
                <!-- Card 4 -->
                <div class="bg-white p-10 rounded-3xl shadow-lg border border-gray-100 flex flex-col items-center text-center hover:shadow-2xl transition-all hover:-translate-y-2 lg:translate-y-8">
                    <div class="w-16 h-16 bg-red-100 rounded-2xl flex items-center justify-center text-red-600 mb-6">
                        <svg class="w-8 h-8" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z" /></svg>
                    </div>
                    <h3 class="text-2xl font-bold mb-3 text-gray-800">Expert Team</h3>
                    <p class="text-gray-500">Dukungan tim teknisi dan konsultan yang ahli di bidang kedokteran gigi.</p>
                </div>
            </div>
        </div>
    </section>

    <!-- 3. Product Preview (Fitur 5) -->
    <section class="py-24 bg-white">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex flex-col md:flex-row justify-between items-end mb-16 space-y-4 md:space-y-0 text-center md:text-left">
                <div>
                    <h2 class="text-4xl font-black text-gray-900 uppercase tracking-tighter">Line Up Product</h2>
                    <p class="text-gray-500 mt-2">Preview koleksi alat dental terbaru dari ArtaOtto.</p>
                </div>
                <a href="{{ route('products.index') }}" class="text-indigo-600 font-bold hover:underline flex items-center group">
                    View All Products 
                    <svg class="ml-1 w-5 h-5 transition-transform group-hover:translate-x-1" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8l4 4m0 0l-4 4m4-4H3" /></svg>
                </a>
            </div>

            <!-- Grid 6 Produk -->
            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-10 mb-16">
                @foreach($products as $product)
                    <x-product-card :product="$product" />
                @endforeach
            </div>

            <div class="text-center">
                <a href="{{ route('products.index') }}" class="inline-block border-2 border-indigo-600 text-indigo-600 px-10 py-4 rounded-full font-bold text-lg hover:bg-indigo-600 hover:text-white transition-all shadow-lg active:scale-95">
                    More Products
                </a>
            </div>
        </div>
    </section>

    <!-- 4. Contact Us (Fitur 7) -->
    <section id="contact" class="py-24 bg-orange-500 text-white overflow-hidden relative">
        <!-- Decor Circle -->
        <div class="absolute top-0 right-0 -mr-20 -mt-20 w-80 h-80 bg-orange-400 rounded-full opacity-50"></div>
        
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 relative">
            <div class="grid grid-cols-1 lg:grid-cols-2 gap-16 items-center">
                <!-- Kolom Kiri: Contact Info -->
                <div>
                    <h2 class="text-5xl font-black mb-8 uppercase tracking-tighter">Get In Touch</h2>
                    <p class="text-orange-100 text-lg mb-12 leading-relaxed">
                        {{ getSetting('contact_info', 'Punya pertanyaan mengenai produk atau butuh penawaran khusus untuk klinik Anda? Tim kami siap memberikan solusi terbaik. Hubungi kami melalui detail di bawah atau isi formulir pesan.') }}
                    </p>
                    
                    <div class="space-y-8">
                        <div class="flex items-start space-x-4">
                            <div class="bg-orange-600 p-3 rounded-xl mt-1">
                                <svg class="w-6 h-6" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z" /><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z" /></svg>
                            </div>
                            <div>
                                <h4 class="font-bold text-xl uppercase mb-1">Office Address</h4>
                                <p class="text-orange-100">Jl. Dental Raya No. 123, Jakarta Selatan, Indonesia</p>
                            </div>
                        </div>
                        <div class="flex items-start space-x-4">
                            <div class="bg-orange-600 p-3 rounded-xl mt-1">
                                <svg class="w-6 h-6" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z" /></svg>
                            </div>
                            <div>
                                <h4 class="font-bold text-xl uppercase mb-1">Email Inquiry</h4>
                                <p class="text-orange-100">info@artaotto.com</p>
                            </div>
                        </div>
                        <div class="flex items-start space-x-4">
                            <div class="bg-orange-600 p-3 rounded-xl mt-1">
                                <svg class="w-6 h-6" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z" /></svg>
                            </div>
                            <div>
                                <h4 class="font-bold text-xl uppercase mb-1">Call Center</h4>
                                <p class="text-orange-100">(021) 1234567 / +62 812 3456 7890</p>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Kolom Kanan: Contact Form -->
                <div class="bg-white p-8 lg:p-12 rounded-[2rem] shadow-2xl text-gray-900 border border-orange-100">
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
                            <label class="block text-sm font-bold text-gray-600 uppercase mb-2">Name</label>
                            <input type="text" name="name" value="{{ old('name') }}" placeholder="Your Full Name" class="w-full bg-gray-50 border {{ $errors->has('name') ? 'border-red-400' : 'border-gray-200' }} p-4 rounded-xl focus:ring-2 focus:ring-orange-500 outline-none transition-all">
                            @error('name') <p class="text-red-500 text-xs mt-1">{{ $message }}</p> @enderror
                        </div>
                        <div>
                            <label class="block text-sm font-bold text-gray-600 uppercase mb-2">Email</label>
                            <input type="email" name="email" value="{{ old('email') }}" placeholder="email@address.com" class="w-full bg-gray-50 border {{ $errors->has('email') ? 'border-red-400' : 'border-gray-200' }} p-4 rounded-xl focus:ring-2 focus:ring-orange-500 outline-none transition-all">
                            @error('email') <p class="text-red-500 text-xs mt-1">{{ $message }}</p> @enderror
                        </div>
                        <div>
                            <label class="block text-sm font-bold text-gray-600 uppercase mb-2">Message</label>
                            <textarea rows="4" name="message" placeholder="Tell us about your needs..." class="w-full bg-gray-50 border {{ $errors->has('message') ? 'border-red-400' : 'border-gray-200' }} p-4 rounded-xl focus:ring-2 focus:ring-orange-500 outline-none transition-all resize-none">{{ old('message') }}</textarea>
                            @error('message') <p class="text-red-500 text-xs mt-1">{{ $message }}</p> @enderror
                        </div>
                        <button type="submit" class="w-full bg-orange-600 text-white font-bold py-4 rounded-xl hover:bg-orange-700 shadow-lg active:scale-95 transition-all text-lg">
                            Send Message
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </section>
@endsection
