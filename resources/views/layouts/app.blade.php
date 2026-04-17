<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ArtaOtto - Dental Product Specialist</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <style>
        .nav-link { @apply text-gray-600 hover:text-indigo-600 font-medium transition-colors; }
        .footer-link { @apply text-gray-400 hover:text-white transition-colors; }
    </style>
</head>
<body class="bg-white text-gray-900 pt-20"> <!-- pt-20 for fixed navbar -->

    <!-- Navbar (Fitur 1) -->
    <nav class="fixed top-0 left-0 right-0 bg-white/80 backdrop-blur-md border-b z-50">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex justify-between items-center h-20">
                <!-- Logo -->
                <div class="flex-shrink-0 flex items-center">
                    <a href="{{ route('home') }}">
                        <img src="{{ asset('images/LogoArtaWarna.png') }}" alt="Logo" class="h-40">
                    </a>
                </div>

                <!-- Menu Tengah (Desktop) -->
                <div class="hidden md:flex space-x-8 items-center">
                    <a href="{{ route('home') }}" class="text-gray-600 hover:text-indigo-600 font-medium transition-colors">Home</a>
                    <a href="{{ route('pages.about') }}" class="text-gray-600 hover:text-indigo-600 font-medium transition-colors">About</a>
                        <!-- Product Dropdown (TANPA UBAH DESAIN) -->
                        <div class="relative group">
                            <a href="{{ route('products.index') }}" 
                            class="text-gray-600 hover:text-indigo-600 font-medium transition-colors">
                            Product
                            </a>

                            <!-- Dropdown -->
                            <div class="absolute left-0 mt-2 w-48 bg-white rounded-md shadow-md 
                                        opacity-0 invisible group-hover:opacity-100 group-hover:visible 
                                        transition-all duration-200 z-50">

                                @forelse($brands as $brand)
                                    <a href="{{ route('brands.public.show', $brand->id) }}" 
                                    class="block px-4 py-2 text-gray-600 hover:text-indigo-600 hover:bg-gray-50">
                                    {{ $brand->name }}
                                    </a>
                                @empty
                                    <span class="block px-4 py-2 text-gray-400">No brand</span>
                                @endforelse

                                <a href="{{ route('products.index') }}" 
                                class="block px-4 py-2 text-gray-600 hover:text-indigo-600 hover:bg-gray-50">
                                All Product
                                </a>
                            </div>
                        </div>

                        <a href="{{ route('pages.customer_service') }}" class="text-gray-600 hover:text-indigo-600 font-medium transition-colors">Contact us</a>
                </div>

                <!-- Right Side (Contact Us) -->
                <div class="hidden md:block">
                    <a href="{{ route('pages.customer_service') }}" 
                    class="bg-indigo-600 text-white px-6 py-2.5 rounded-full font-bold hover:bg-indigo-700 transition-all shadow-md active:scale-95">
                    Contact Us
                    </a>
                </div>

                <!-- Mobile Menu Button -->
                <div class="md:hidden flex items-center">
                    <button class="text-gray-600 p-2">
                        <svg class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16m-7 6h7" />
                        </svg>
                    </button>
                </div>
            </div>
        </div>
    </nav>

    <!-- Content -->
    <main class="min-h-screen">
        @yield('content')
    </main>

    <!-- Footer (Fitur 6) -->
    <footer class="bg-indigo-950 text-white py-16 mt-0"> <!-- Fitur 8: Footer Blue Dark Background -->
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="grid grid-cols-1 md:grid-cols-3 gap-12">
                <!-- Bagian 1: Logo & Alamat -->
                <div>
                    <h2 class="text-3xl font-black text-indigo-400 mb-6 tracking-tighter italic uppercase">ArtaOtto</h2>
                    <p class="text-gray-400 leading-relaxed mb-4">
                        Spesialis penyedia alat dan produk kedokteran gigi berkualitas tinggi untuk klinik dan profesional.
                    </p>
                    <p class="text-gray-400">
                        Jl. Dental Raya No. 123, Jakarta Selatan<br>
                        Indonesia
                    </p>
                </div>

                <!-- Bagian 2: Menu -->
                <div>
                    <h3 class="text-lg font-bold mb-6 uppercase tracking-widest text-indigo-200">Menu Utama</h3>
                    <ul class="space-y-4">
                        <li><a href="{{ route('pages.about') }}" class="text-gray-400 hover:text-white transition-colors">About Us</a></li>
                        <li><a href="{{ route('products.index') }}" class="text-gray-400 hover:text-white transition-colors">Product lineup</a></li>
                        <li><a href="{{ route('pages.customer_service') }}" class="text-gray-400 hover:text-white transition-colors">Customer Service</a></li>
                    </ul>
                </div>

                <!-- Bagian 3: Contact -->
                <div>
                    <h3 class="text-lg font-bold mb-6 uppercase tracking-widest text-indigo-200">Get In Touch</h3>
                    <div class="mb-6">
                        <a href="{{ generateWhatsappLink('Inquiry Umum') }}" target="_blank" 
                       class="inline-block bg-indigo-600 text-white px-8 py-3 rounded-full font-bold hover:bg-indigo-700 transition-all shadow-md">
                       Contact Us
                    </a>
                    </div>
                    <ul class="space-y-4">
                        <li class="flex items-center space-x-3 text-gray-400">
                             Email: info@artaotto.com
                        </li>
                        <li class="flex items-center space-x-3 text-gray-400">
                             Phone: (021) 1234567
                        </li>
                    </ul>
                </div>
            </div>
            
            <div class="border-t border-gray-800 mt-12 pt-8 text-center text-gray-500 text-sm">
                &copy; {{ date('Y') }} ArtaOtto. All rights reserved.
            </div>
        </div>
    </footer>

</body>
</html>
