# 📦 Aplikasi Inventaris Laravel 7

Aplikasi web berbasis Laravel 7 untuk mencatat dan mengelola data inventaris barang, lengkap dengan fitur pencarian, filter kategori, dan export data ke PDF/Excel.

---

## 🧩 Fitur Utama

- 🔐 Login & Logout (dengan sistem autentikasi Laravel)
- 🗂 Dashboard responsif menggunakan Tailwind CSS
- 📋 CRUD Barang (Nama, Kategori, Jumlah, Harga)
- 🏷️ CRUD Kategori
- 🔎 Pencarian barang berdasarkan nama
- 🎯 Filter berdasarkan kategori
- 📊 Tampilkan total harga seluruh barang
- 📦 Tampilkan total barang per kategori
- 📤 Export data ke PDF & Excel
- 🛠 Validasi input form (client-side & server-side)
- ✨ Desain rapi & responsif

---

## 🛠️ Tech Stack

- **Laravel 7**
- **Tailwind CSS**
- **MySQL**
- **Blade Template**
- **Laravel DomPDF** (PDF Export)
- **Laravel Excel (Maatwebsite)**

---

## ⚙️ Instalasi

1. **Clone repositori**
   ```bash
   git clone https://github.com/username/inventaris.git
   cd inventaris
   ```

2. **Install dependency PHP**
   ```bash
   composer install
   ```

3. **Salin file konfigurasi**
   ```bash
   cp .env.example .env
   ```

4. **Edit `.env` sesuai koneksi database lokal**

5. **Generate APP_KEY**
   ```bash
   php artisan key:generate
   ```

6. **Migrasi tabel**
   ```bash
   php artisan migrate
   ```

7. **(Opsional) Seed kategori awal**
   ```bash
   php artisan db:seed
   ```

8. **Jalankan server**
   ```bash
   php artisan serve
   ```

---

## 🧪 Akun Login (Contoh)

| Email                       | Password   |
|-----------------------------|------------|
| igentaawaludin@gmail.com    | password   |

> Kamu bisa register akun baru sendiri lewat halaman register.

---

## 📁 Struktur Folder Penting

| Folder/File                  | Deskripsi                           |
|------------------------------|-------------------------------------|
| `app/Http/Controllers/`      | Controller (Barang, Kategori, Home) |
| `app/Models/`                | Model Barang dan Kategori           |
| `resources/views/`           | Halaman blade (UI)                  |
| `routes/web.php`             | Routing aplikasi web                |
| `database/migrations/`       | Struktur tabel MySQL                |
| `public/`                    | Aset publik                         |

---

## 📌 Best Practices

- Middleware: autentikasi melalui `auth` di controller & route
- Validasi: menggunakan `$request->validate()` di controller
- Dokumentasi: menggunakan PHPDoc dan README ini
- Clean code: penamaan variabel jelas dan file rapi
- UI: Tailwind CSS dengan komponen konsisten

---

## 📄 Lisensi

Proyek ini dibuat untuk memenuhi kriteria rekrutment di perusahaan yang saya lamar, tetapi juga
Proyek ini bebas digunakan untuk keperluan pembelajaran. Jika digunakan untuk keperluan komersial, mohon sertakan atribusi kepada pengembang.

---

## 👨‍💻 Pengembang

**Genta Awaludin Ismail**  
📧 igentaawaludin@gmail.com  
🌐 [LinkedIn](https://www.linkedin.com/in/genta-awaludin-ismail-5417b1279/)
