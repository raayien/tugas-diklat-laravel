# Tugas Diklat Laravel — CRUD Karyawan

Aplikasi CRUD data karyawan menggunakan **Laravel** dan **Filament** sebagai panel admin.
Dibuat untuk tugas Diklat PHP Advance: Laravel oleh **Hadi Prayitno**.

## Teknologi

- PHP 8.4+
- Laravel 13
- Filament 5
- SQLite

## Fitur

- Daftar, tambah, detail, edit, dan hapus karyawan
- Form: NIK, Nama, Nama Lengkap, Alamat, No. Rekening, Departemen (combobox), Keahlian (checkbox)
- Halaman daftar dan detail menampilkan rekening, departemen, dan keahlian
- Pencarian dan pengurutan berdasarkan NIK dan Nama
- Hapus massal (bulk delete)

## Struktur Tabel

| Tabel | Kolom |
|---|---|
| karyawan | id, id_departemen, nik, name, long_name, alamat |
| departemen | id, nama_departemen |
| rekening | id_karyawan (PK, FK), no_rekening |
| keahlian | id, nama_keahlian |
| keahlian_karyawan | id_karyawan, id_keahlian (pivot) |

## Relasi

| Jenis | Tabel |
|---|---|
| One to one | Karyawan – Rekening |
| One to many | Departemen – Karyawan |
| Many to many | Karyawan – Keahlian |

Saat karyawan dihapus, data rekening dan keahliannya di tabel pivot ikut terhapus (`cascadeOnDelete`).

## Validasi

| Field | Aturan |
|---|---|
| nik | wajib, 5 karakter, unik |
| name | wajib, maks 50 karakter |
| long_name | wajib, maks 100 karakter |
| no_rekening | wajib, hanya angka |

## Cara Menjalankan

```bash
git clone https://github.com/raayien/tugas-diklat-laravel.git
cd tugas-diklat-laravel
composer install
cp .env.example .env        # Windows: copy .env.example .env
php artisan key:generate
php artisan migrate --seed
php artisan serve
```

Buka `http://127.0.0.1:8000`. Halaman utama akan diarahkan ke panel admin.

Perintah `migrate --seed` membuat semua tabel lalu mengisi data awal: 5 departemen, 15 keahlian, 5 karyawan contoh, dan 1 akun admin.

## Akun Login

| Email | Password |
|---|---|
| admin123@gmail.com | password |

## Lokasi File Penting

| File | Isi |
|---|---|
| `database/migrations/` | Struktur tabel |
| `database/seeders/` | Data awal |
| `app/Models/` | Model dan relasi |
| `app/Filament/Resources/Karyawans/Schemas/KaryawanForm.php` | Form tambah/edit dan validasi |
| `app/Filament/Resources/Karyawans/Tables/KaryawansTable.php` | Tabel daftar karyawan |
| `app/Filament/Resources/Karyawans/Schemas/KaryawanInfolist.php` | Halaman detail karyawan |
