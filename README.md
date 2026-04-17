# ArtaOtto - Dental Equipment Specialist (Laravel 12)

Website profil perusahaan profesional untuk distribusi alat kesehatan gigi, dilengkapi dengan katalog produk dinamis, sistem administrasi, dan desain korporat modern.

---

## 🚀 Fitur Utama

### 1. Sistem Autentikasi Admin (`/admin/login`)
- **Keamanan**: Area administratif dilindungi oleh sistem login terenkripsi.
- **Roles**: Mendukung dua peran yaitu `company` (admin harian) dan `developer` (akses teknis).
- **Dashboard**: Panel manajemen produk yang efisien dengan pengelompokan per Brand, indikator stok, dan status visibility.

### 2. Katalog Produk Interaktif (`/product`)
- **Smart Slider**: Jika sebuah brand memiliki lebih dari 3 produk, katalog akan otomatis menggunakan slider horizontal yang interaktif.
- **Detailed View**: Halaman detail produk lengkap dengan galeri gambar dan deskripsi.
- **Hidden System**: Admin dapat menyembunyikan produk tertentu tanpa menghapusnya dari database.

### 3. Corporate About Page (`/about`)
- Desain modern menggunakan teknik *color blocking* (Navy & Orange).
- Layout zig-zag untuk menampilkan nilai-nilai utama perusahaan (*Innovation, Quality, Support, Distribution*).

### 4. Search & Filter
- Memudahkan pengunjung mencari produk berdasarkan nama atau filter berdasarkan brand tertentu.

---

## 🛠 Panduan Instalasi (Langkah Detail)

Ikuti langkah-langkah berikut untuk menjalankan project ArtaOtto di lingkungan lokal Anda:

### 1. Persiapan Database (XAMPP)
1. Buka **XAMPP Control Panel**.
2. Nyalakan Service **Apache** dan **MySQL**.
3. Buka **phpMyAdmin** (`localhost/phpmyadmin`).
4. Buat database baru dengan nama `arta_otto` (atau nama lain yang Anda inginkan).

### 2. Kloning & Environment
1. Buka terminal di folder project ini.
2. Salin file environment: `cp .env.example .env` (di Windows: `copy .env.example .env`).
3. Buka file `.env` dan sesuaikan bagian database:
   ```env
   DB_CONNECTION=mysql
   DB_HOST=127.0.0.1
   DB_PORT=3306
   DB_DATABASE=arta_otto
   DB_USERNAME=root
   DB_PASSWORD=
   ```

### 3. Instalasi Dependensi
1. Jalankan `composer install` untuk menginstal framework Laravel dan library lainnya.
2. Jalankan `npm install && npm run build` (opsional jika menggunakan aset lokal, ArtaOtto sudah dikonfigurasi menggunakan Tailwind CDN untuk kemudahan).

### 4. Setup Key & Storage
1. Generate key aplikasi: `php artisan key:generate`.
2. Link storage agar gambar dapat tampil: `php artisan storage:link`.

### 5. Migrasi & Seed Database (PENTING)
Jalankan perintah ini untuk membuat tabel tabel dan mengisi data awal (termasuk akun admin):
```bash
php artisan migrate:fresh --seed
```

### 6. Menjalankan Project
```bash
php artisan serve
```
Akses website di [http://127.0.0.1:8000](http://127.0.0.1:8000).

---

## 🔐 Informasi Akses Admin
Gunakan akun berikut untuk mencoba fitur Dashboard Admin:

| Role | Email | Password |
| :--- | :--- | :--- |
| **Admin Perusahaan** | `admin@artaotto.com` | `password123` |
| **Developer Access** | `dev@artaotto.com` | `devpass123` |

---

## 📁 Struktur Penting
- **Views**: `resources/views/`
- **Controllers**: `app/Http/Controllers/`
- **Models**: `app/Models/`
- **Routes**: `routes/web.php`

---

## 📧 Email Configuration

Cara setting email di `.env`:

```env
MAIL_MAILER=smtp
MAIL_HOST=smtp.gmail.com
MAIL_PORT=587
MAIL_USERNAME=EMAIL_KAMU
MAIL_PASSWORD=APP_PASSWORD
MAIL_ENCRYPTION=tls
MAIL_FROM_ADDRESS=EMAIL_KAMU
MAIL_FROM_NAME="ArtaOtto Website"
```

Untuk mengubah email tujuan saat pesan pada formulir 'Contact Us' dikirim, Anda dapat mengubahnya di dalam file controller: `app/Http/Controllers/ContactController.php`. Cari komentar:
`// Ganti email tujuan di sini jika diperlukan`
lalu ganti alamat email pada baris di bawahnya dengan email yang diinginkan (saat ini tersetting ke `Khususonline78@gmail.com`).
