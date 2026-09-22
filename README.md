# ANIMERCH - Merchandise Event Management System

## 📋 Informasi Project

- **Nama Project**: AniMerch
- **Database**: db_animerch
- **Framework**: Laravel 12 + Bootstrap 5
- **Fitur**: CRUD, Authentication, Export PDF, DataTables

## Preview

<img width="1921" height="2603" alt="screencapture-localhost-8000-2026-03-05-13_32_56" src="https://github.com/user-attachments/assets/a2b7c954-e567-4aac-a65a-4923fbdd9da8" /><img width="1921" height="1973" alt="screencapture-localhost-8000-catalog-2026-03-05-13_34_19" src="https://github.com/user-attachments/assets/eb74aa97-1afa-4633-9ee9-768d0ef23aa9" /><img width="1921" height="1176" alt="screencapture-localhost-8000-catalog-37-2026-03-05-13_34_52" src="https://github.com/user-attachments/assets/95d0aa23-4355-49b5-ab68-bba22580e55d" />
<img width="1921" height="1089" alt="screencapture-localhost-8000-merchandise-2026-03-05-13_44_28" src="https://github.com/user-attachments/assets/26f9a767-f692-4485-81ba-4c8d330bddb8" />

## 🚀 Cara Menjalankan Aplikasi

### Persyaratan

- PHP 8.2 atau lebih baru
- Composer
- Node.js dan npm
- MySQL

### Instalasi

1. Clone repository dan masuk ke folder project.
2. Install dependency PHP dan frontend:

```bash
composer install
npm install
```

3. Buat file `.env` dari `.env.example`, lalu pastikan konfigurasi database mengarah ke `db_animerch`.
4. Buat database `db_animerch` di MySQL. Gunakan `db_animerch.sql` untuk mengimpor data yang tersedia, atau jalankan migrasi dan seeder:

```bash
php artisan migrate --seed
```

5. Buat symbolic link untuk file upload dan build asset frontend:

```bash
php artisan storage:link
npm run build
```

6. Jalankan aplikasi:

```bash
php artisan serve
```

Aplikasi tersedia di http://127.0.0.1:8000.

### Login Demo

```
Email: admin@animerch.com
Password: password
```

## ✨ Fitur Lengkap

### 1. CRUD (Create, Read, Update, Delete) ✅

- Tambah, Lihat, Edit, Hapus data merchandise
- Upload gambar produk
- Validasi input lengkap

### 2. Authentication ✅

- Login/Logout dengan Laravel Breeze
- Proteksi halaman admin

### 3. Export PDF ✅

- Laporan merchandise dalam PDF
- Ringkasan total stok dan nilai

### 4. DataTables ✅

- Search, Sort, Pagination
- Bahasa Indonesia

### 5. Bootstrap 5 ✅

- Responsive design
- Custom color theme

## 🎯 Cara Penggunaan

1. **Login**: Email: admin@animerch.com, Password: password
2. **Tambah Data**: Klik "Tambah Data" → Isi form → Simpan
3. **Edit**: Klik tombol kuning di tabel
4. **Hapus**: Klik tombol merah di tabel
5. **Export PDF**: Klik tombol "Export PDF"

## 📦 Data Sample

Sudah tersedia 10 data merchandise anime untuk testing!

---

**© 2026 Animerch**
