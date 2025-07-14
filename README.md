# 📝 Jurnal PKL - Journal Book

Aplikasi Laravel sederhana untuk mencatat kegiatan harian siswa selama Praktik Kerja Lapangan (PKL).

---

## 🔧 Fitur

- ✅ CRUD Jurnal Harian (tempat, tanggal, waktu, kegiatan)
- 📤 Export ke PDF & Excel
- 🔍 Filter mingguan / bulanan
- 🔎 Live Search + Pagination
- 🖼️ Upload dokumentasi kegiatan (foto)
- 🖨️ Cetak laporan A4 siap print

---

## 🛠️ Dibuat Dengan

- Laravel 10
- Bootstrap Offline
- DOMPDF (PDF Generator)
- Maatwebsite Excel (Excel Export)

---

## 🚀 Cara Menjalankan Project

Untuk menjalankan project Laravel ini, ikuti langkah-langkah berikut:

1. Clone repository ini ke komputer lokal kamu, lalu masuk ke folder project.
2. Salin file `.env.example` menjadi `.env`, lalu generate `APP_KEY` menggunakan perintah `php artisan key:generate`.
3. Jalankan `composer install` untuk mengunduh semua dependency Laravel.
4. Buka file `.env`, lalu sesuaikan konfigurasi database kamu (nama database, username, dan password).
5. Buat database di phpMyAdmin atau MySQL sesuai dengan nama di `.env`.
6. Jalankan migrasi dengan perintah `php artisan migrate` untuk membuat tabel di database.
7. Jalankan server lokal menggunakan perintah `php artisan serve`.
8. Setelah itu, buka browser dan akses alamat `http://127.0.0.1:8000` untuk melihat aplikasi berjalan.

Pastikan kamu sudah menginstall PHP, Composer, dan MySQL (bisa pakai Laragon atau XAMPP). Jangan lupa untuk tidak mengupload file `.env` ke GitHub. Sebagai gantinya, gunakan `.env.example` untuk referensi konfigurasi.

---

## 👨‍💻 Tentang

> Project ini dibuat untuk keperluan **Praktik Kerja Lapangan (PKL) tahun 2025**  
> oleh **Faqih Arifin Putra** – SMK ICB.

---

