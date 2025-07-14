# Jurnal PKL - Journal Book

Aplikasi Laravel sederhana untuk mencatat kegiatan harian siswa selama PKL.

## Fitur
- CRUD Jurnal Harian (tempat, tanggal, waktu, kegiatan)
- Export ke PDF & Excel
- Filter mingguan/bulanan
- Live Search & Pagination
- Upload dokumentasi kegiatan (foto)
- Cetak laporan A4 siap print

## Dibuat dengan:
- Laravel 10
- Bootstrap Offline
- DOMPDF & Maatwebsite Excel

## Cara Menjalankan
1. Clone repository
2. Jalankan perintah:

cp .env.example .env
composer install
php artisan key:generate
php artisan migrate
php artisan serve
