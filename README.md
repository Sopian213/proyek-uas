# 📚 Kursus Online

Aplikasi web dinamis berbasis PHP & MySQL untuk pengelolaan kursus online.  
Dibuat sebagai tugas akhir mata kuliah Pemrograman Web.

## 🔗 Demo & Dokumentasi

- 🔥 [Link Video Presentasi YouTube](menyusul)
- 💻 [Repository GitHub](menyusul)

---

## 🚀 Fitur Utama

- 🔐 Login dan logout dengan session PHP
- 📚 Manajemen kursus dan materi
- 🧑‍🏫 Role user: admin, instruktur, peserta
- 📝 Enroll peserta ke kursus
- 🗂️ Upload materi dan tugas
- ✅ Penilaian dan feedback peserta
- 📈 Laporan pendaftaran
- 📄 ERD dan dokumentasi database

---

## 🗂️ Struktur Folder

```
/src         → kode utama aplikasi
/docs        → dokumentasi tambahan (opsional)
/sql         → file dump database (.sql)
```

---

## ⚙️ Cara Instalasi

1. Clone repo ini:
   ```
   git clone https://github.com/your-username/kursus-online.git
   ```
2. Import database `kursus_online.sql` ke phpMyAdmin
3. Atur koneksi di `src/config/db.php`
4. Jalankan aplikasi di browser:
   ```
   http://localhost/kursus-online/src/
   ```

---

## 🧠 Struktur Database

| Tabel             | Fungsi                                                                 |
|-------------------|------------------------------------------------------------------------|
| `users`           | Menyimpan data akun (admin, instruktur, peserta)                       |
| `roles`           | Menentukan peran user (1=Admin, 2=Instruktur, 3=Peserta)               |
| `courses`         | Menyimpan informasi kursus                                             |
| `categories`      | Kategori untuk mengelompokkan kursus                                   |
| `course_materials`| Materi pembelajaran yang terkait dengan kursus                         |
| `enrollments`     | Pendaftaran peserta terhadap kursus tertentu                           |
| `assignments`     | Tugas yang diberikan instruktur di setiap kursus                       |
| `submissions`     | Jawaban tugas dari peserta                                             |
| `feedback`        | Ulasan dan rating dari peserta terhadap kursus                         |
| `activity_logs`   | Mencatat aktivitas user (login, melihat materi, mendaftar kursus, dll) |
| `settings`        | Pengaturan umum sistem (opsional)                                      |

### 🔍 Diagram ERD:
![ERD Sistem Kursus Online](menyusul)

---

## 👨‍💻 Author

> Dibuat oleh: Muhammad Sopian (202312076) 
> Untuk memenuhi tugas akhir matkul Pemrograman Web 2025.
