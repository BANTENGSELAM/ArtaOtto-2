@extends('layouts.app')

@section('content')
<div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-20">
    <div class="text-center mb-16">
        <h1 class="text-4xl font-extrabold text-gray-900">Customer Service</h1>
        <p class="text-xl text-gray-600 mt-4">Kami siap membantu Anda kapan saja.</p>
    </div>

    <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
        <!-- Layanan 1 -->
        <div class="bg-white p-8 rounded-2xl shadow-sm border hover:shadow-md transition-shadow">
            <h3 class="text-xl font-bold mb-4 text-indigo-600">Panduan Pemesanan</h3>
            <p class="text-gray-600 mb-4">Pilih produk favorit Anda melalui katalog kami, lalu klik tombol "Contact Us" untuk terhubung dengan tim sales kami via WhatsApp.</p>
        </div>

        <!-- Layanan 2 -->
        <div class="bg-white p-8 rounded-2xl shadow-sm border hover:shadow-md transition-shadow">
            <h3 class="text-xl font-bold mb-4 text-indigo-600">Dukungan Teknis</h3>
            <p class="text-gray-600 mb-4">Butuh bantuan pemasangan atau *maintenance* alat dental? Tim teknisi kami siap memberikan panduan melalui *video call* atau kunjungan langsung.</p>
        </div>

        <!-- Layanan 3 -->
        <div class="bg-white p-8 rounded-2xl shadow-sm border hover:shadow-md transition-shadow">
            <h3 class="text-xl font-bold mb-4 text-indigo-600">Informasi Pengiriman</h3>
            <p class="text-gray-600 mb-4">Kami melayani pengiriman ke seluruh pelosok Nusantara dengan asuransi pengiriman penuh untuk menjamin keamanan produk Anda.</p>
        </div>
    </div>

    <div class="mt-20 bg-indigo-50 rounded-3xl p-12 text-center">
        <h2 class="text-2xl font-bold mb-4">Butuh bantuan cepat?</h2>
        <p class="text-gray-600 mb-8">Hubungi Customer Service kami sekarang juga.</p>
        <a href="{{ generateWhatsappLink('Bantuan Customer Service') }}" target="_blank" class="bg-indigo-600 text-white px-8 py-3 rounded-full font-bold hover:bg-indigo-700 transition-all shadow-lg active:scale-95 inline-block">
            Hubungi Lewat WhatsApp
        </a>
    </div>
</div>
@endsection
