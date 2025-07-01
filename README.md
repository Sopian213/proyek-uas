# Sistem Manajemen Kursus Online

Aplikasi web dinamis berbasis PHP dan MySQL untuk mengelola kursus online secara sederhana. Proyek ini dibuat sebagai tugas UAS untuk mata kuliah Pemrograman Web Dinamis.

## ✨ Fitur Utama

- Login multi-role (Admin, Instruktur, Peserta)
- CRUD Pengguna, Kursus, Materi
- Pendaftaran peserta ke kursus (Enroll)
- Halaman Dashboard dan Layout responsif
- Laporan data (placeholder)
- Tampilan rapi dengan Bootstrap 5

## 🛠 Teknologi yang Digunakan

- PHP (Native, versi 7.4+)
- MySQL (versi 5.7+)
- HTML, CSS, Bootstrap 5
- JavaScript (opsional)

## 📁 Struktur Folder

```
kursus-online/
├── src/
│   ├── admin/
│   ├── auth/
│   ├── config/
│   ├── peserta/
│   └── assets/
├── sql/
├── docs/
└── README.md
```

## 🚀 Cara Instalasi

1. Clone repository ini ke folder `htdocs` di XAMPP:
   ```
   git clone https://github.com/Sopian213/proyek-uas.git
   ```

2. Import database:
   - Buka `phpMyAdmin`
   - Buat database baru: `kursus_online`
   - Import file SQL dari folder `/sql/kursus_online.sql`

3. Jalankan aplikasi via browser:
   ```
   http://localhost/kursus-online/src/auth/login.php
   ```

## 🔐 Akun Login Demo

| Role      | Email               | Password |
|-----------|---------------------|----------|
| Admin     | admin1@mail.com     | admin1   |
| Peserta   | peserta1@mail.com   | peserta1 |

## 📝 Catatan

- Semua data demo sudah disiapkan di file SQL.
- Pastikan folder `src/` dan `sql/` ada di struktur repo sebelum presentasi.

---

© 2025 Muhammad Sopian. Proyek UAS Pemrograman Web Dinamis.
