# Sistem Perpustakaan - CodeIgniter 4

Aplikasi Sistem Perpustakaan adalah aplikasi berbasis web yang digunakan untuk mengelola proses administrasi perpustakaan secara digital. Website ini memudahkan pengelolaan data buku, anggota, peminjaman, pengembalian, serta denda secara terpusat dan efisien.

---

## Fitur Utama

- **Manajemen Buku**
  - Tambah, edit, hapus, dan lihat detail buku
  - Pencarian buku berdasarkan judul, ISBN, atau status
  - Manajemen status buku (tersedia, dipinjam, hilang, rusak)
- **Manajemen Anggota**
  - Tambah, edit, hapus, dan lihat detail anggota
  - Profil anggota
- **Manajemen Staff**
  - Tambah, edit, hapus, dan lihat detail staff/petugas
- **Peminjaman Buku**
  - Proses peminjaman buku oleh anggota
  - Riwayat peminjaman
- **Pengembalian Buku**
  - Proses pengembalian buku
  - Pengecekan keterlambatan dan status buku
- **Manajemen Denda**
  - Perhitungan denda otomatis jika terjadi keterlambatan
  - Pembayaran denda
- **Autentikasi & Hak Akses**
  - Login multi-role (Admin, Petugas, Anggota)
  - Hak akses sesuai peran
- **Dashboard**
  - Statistik ringkas peminjaman, pengembalian, dan koleksi buku
- **Pencarian & Filter Data**
  - Fitur pencarian dan filter pada data buku, anggota, dan transaksi
- **Notifikasi**
  - Notifikasi sukses/gagal pada aksi penting (login, peminjaman, pengembalian, dll)

---

## Cara Menjalankan Aplikasi

1. **Clone repository ini**

2. **Install dependency PHP**

   Pastikan sudah terinstall [Composer](https://getcomposer.org/), lalu jalankan:
   ```bash
   composer install
   ```

3. **Salin file konfigurasi environment**

   Salin file `env` menjadi `.env`:
   ```bash
   cp env .env
   ```
   Atau buat file `.env` baru dan sesuaikan konfigurasi berikut:
   - `app.baseURL` (misal: `http://localhost:8080/`)
   - Konfigurasi database (lihat bagian Database di bawah)

4. **Buat database dan import data**

   - Buat database baru, misal: `perpustakaan`
   - Import file `database.sql` ke database tersebut (bisa via phpMyAdmin atau command line)

5. **Jalankan server lokal**

   ```bash
   php spark serve
   ```
   Akses aplikasi di browser pada `http://localhost:8080/`

6. **Atur folder public sebagai root web server**

   Jika menggunakan XAMPP/LAMPP, pastikan root mengarah ke folder `public/`.

---

## Konfigurasi Database

Edit file `.env` atau `app/Config/Database.php`:

```
database.default.hostname = localhost
database.default.database = perpustakaan
database.default.username = root
database.default.password =
database.default.DBDriver = MySQLi
database.default.port = 3306
```

---

## Akun Default

Setelah import `database.sql`, terdapat 3 akun default yang bisa digunakan untuk login:

| No Anggota | Nama     | Username | Password | Role    |
|-----------|----------|----------|----------|---------|
| 0001      | Admin    | admin    | password | Admin   |
| 0002      | Petugas  | petugas  | password | Petugas |
| 0003      | Anggota  | anggota  | password | Anggota |

**Catatan:**
- Password default untuk semua akun adalah `password`.
- Role:
  - **Admin (0):** Hak akses penuh, mengelola user, buku, transaksi, dll.
  - **Petugas (1):** Mengelola peminjaman, pengembalian, denda, dll.
  - **Anggota (2):** Hanya dapat meminjam dan melihat buku.

---

## Struktur Folder Penting

- `app/Controllers/` : Logic utama aplikasi (controller)
- `app/Models/`      : Model database
- `app/Views/`       : Tampilan (view)
- `public/`          : Akses publik (root web server)
- `database.sql`     : Struktur dan data awal database

---

## Kebutuhan Server

- PHP 8.1 atau lebih baru
- Ekstensi PHP: intl, mbstring, json, mysqli
- MySQL/MariaDB
