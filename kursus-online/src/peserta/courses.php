<?php
include '../auth/cek_session.php';
include '../config/db.php';

// Cek apakah user peserta
if ($_SESSION['role_id'] != 3) {
    echo "<script>alert('Akses ditolak!');location.href='../index.php';</script>";
    exit;
}

$user_id = $_SESSION['user_id'];
echo "<p><strong>DEBUG:</strong> User ID yang sedang login = $user_id</p>";

// Ambil semua kursus yang belum diikuti user
$query = "SELECT c.*, u.name AS instructor_name, cat.name AS category_name
          FROM courses c
          LEFT JOIN users u ON c.instructor_id = u.id
          LEFT JOIN categories cat ON c.category_id = cat.id
          WHERE c.id NOT IN (
              SELECT course_id FROM enrollments WHERE user_id = $user_id
          )";

$result = mysqli_query($conn, $query);
?>
if (mysqli_num_rows($result) == 0) {
    echo "<div class='alert alert-warning'>Tidak ada kursus tersedia untuk didaftarkan.</div>";
}


<!DOCTYPE html>
<html>
<head>
    <title>Daftar Kursus</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
<div class="container mt-4">
    <h3>Daftar Kursus Tersedia</h3>
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>Judul</th>
                <th>Kategori</th>
                <th>Instruktur</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            <?php while ($row = mysqli_fetch_assoc($result)): ?>
            <tr>
                <td><?= $row['title'] ?></td>
                <td><?= $row['category_name'] ?></td>
                <td><?= $row['instructor_name'] ?></td>
                <td>
                    <a href="enroll.php?course_id=<?= $row['id'] ?>" class="btn btn-sm btn-success">Daftar</a>
                </td>
            </tr>
            <?php endwhile ?>
        </tbody>
    </table>
    <a href="my_courses.php" class="btn btn-primary">📚 Kursus Saya</a>
</div>
</body>
</html>
