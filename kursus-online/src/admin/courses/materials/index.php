<?php
include '../../../auth/cek_session.php';
include '../../../config/db.php';

$course_id = $_GET['course_id'];
$course = mysqli_fetch_assoc(mysqli_query($conn, "SELECT title FROM courses WHERE id = $course_id"));
$materials = mysqli_query($conn, "SELECT * FROM course_materials WHERE course_id = $course_id");
?>

<!DOCTYPE html>
<html>
<head>
    <title>Materi Kursus</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
<div class="container mt-4">
    <h3>Materi Kursus: <?= $course['title'] ?></h3>
    <a href="create.php?course_id=<?= $course_id ?>" class="btn btn-primary mb-3">+ Tambah Materi</a>
    <a href="../index.php" class="btn btn-secondary mb-3">← Kembali</a>
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>#</th>
                <th>Judul Materi</th>
                <th>Konten</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            <?php $no=1; while ($row = mysqli_fetch_assoc($materials)): ?>
            <tr>
                <td><?= $no++ ?></td>
                <td><?= $row['title'] ?></td>
                <td><?= substr(strip_tags($row['content']), 0, 60) ?>...</td>
                <td>
                    <a href="edit.php?id=<?= $row['id'] ?>&course_id=<?= $course_id ?>" class="btn btn-sm btn-warning">Edit</a>
                    <a href="delete.php?id=<?= $row['id'] ?>&course_id=<?= $course_id ?>" onclick="return confirm('Yakin hapus materi ini?')" class="btn btn-sm btn-danger">Hapus</a>
                </td>
            </tr>
            <?php endwhile ?>
        </tbody>
    </table>
</div>
</body>
</html>
