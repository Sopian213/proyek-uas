<?php
include '../../auth/cek_session.php';
include '../../config/db.php';

$categories = mysqli_query($conn, "SELECT * FROM categories");
$instructors = mysqli_query($conn, "SELECT * FROM users WHERE role_id = 2");

if (isset($_POST['simpan'])) {
    $title = $_POST['title'];
    $description = $_POST['description'];
    $category_id = $_POST['category_id'];
    $instructor_id = $_POST['instructor_id'];

    mysqli_query($conn, "INSERT INTO courses (title, description, category_id, instructor_id) 
                         VALUES ('$title', '$description', '$category_id', '$instructor_id')");
    header("Location: index.php");
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Tambah Kursus</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
<div class="container mt-4">
    <h3>Tambah Kursus</h3>
    <form method="POST">
        <div class="mb-3">
            <label>Judul</label>
            <input type="text" name="title" class="form-control" required>
        </div>
        <div class="mb-3">
            <label>Deskripsi</label>
            <textarea name="description" class="form-control"></textarea>
        </div>
        <div class="mb-3">
            <label>Kategori</label>
            <select name="category_id" class="form-select" required>
                <option value="">-- Pilih Kategori --</option>
                <?php while ($cat = mysqli_fetch_assoc($categories)): ?>
                    <option value="<?= $cat['id'] ?>"><?= $cat['name'] ?></option>
                <?php endwhile ?>
            </select>
        </div>
        <div class="mb-3">
            <label>Instruktur</label>
            <select name="instructor_id" class="form-select" required>
                <option value="">-- Pilih Instruktur --</option>
                <?php while ($ins = mysqli_fetch_assoc($instructors)): ?>
                    <option value="<?= $ins['id'] ?>"><?= $ins['name'] ?></option>
                <?php endwhile ?>
            </select>
        </div>
        <button name="simpan" class="btn btn-success">Simpan</button>
        <a href="index.php" class="btn btn-secondary">Kembali</a>
    </form>
</div>
</body>
</html>
