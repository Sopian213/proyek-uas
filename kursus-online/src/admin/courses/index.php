<?php
include '../../auth/cek_session.php';
include '../../config/db.php';

$query = "SELECT courses.*, categories.name AS category_name, users.name AS instructor_name
          FROM courses 
          LEFT JOIN categories ON courses.category_id = categories.id
          LEFT JOIN users ON courses.instructor_id = users.id";
$result = mysqli_query($conn, $query);
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Manajemen Kursus</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
<div class="container mt-4">
    <h3>Daftar Kursus</h3>
    <a href="create.php" class="btn btn-primary mb-3">+ Tambah Kursus</a>
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>#</th>
                <th>Judul Kursus</th>
                <th>Kategori</th>
                <th>Instruktur</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            <?php $no=1; while ($row = mysqli_fetch_assoc($result)): ?>
            <tr>
                <td><?= $no++ ?></td>
                <td><?= $row['title'] ?></td>
                <td><?= $row['category_name'] ?></td>
                <td><?= $row['instructor_name'] ?></td>
                <td>
                    <a href="edit.php?id=<?= $row['id'] ?>" class="btn btn-sm btn-warning">Edit</a>
                    <a href="delete.php?id=<?= $row['id'] ?>" onclick="return confirm('Hapus kursus ini?')" class="btn btn-sm btn-danger">Hapus</a>
                    <a href="materials.php?course_id=<?= $row['id'] ?>" class="btn btn-sm btn-info">Materi</a>
                </td>
            </tr>
            <?php endwhile ?>
        </tbody>
    </table>
</div>
</body>
</html>
