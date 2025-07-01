<?php
include '../auth/cek_session.php';
include '../config/db.php';

if ($_SESSION['role_id'] != 3) {
    echo "<script>alert('Akses ditolak!');location.href='../index.php';</script>";
    exit;
}

$user_id = $_SESSION['user_id'];

$query = "SELECT c.*, cat.name AS category_name, u.name AS instructor_name
          FROM enrollments e
          JOIN courses c ON e.course_id = c.id
          LEFT JOIN categories cat ON c.category_id = cat.id
          LEFT JOIN users u ON c.instructor_id = u.id
          WHERE e.user_id = $user_id";

$result = mysqli_query($conn, $query);
?>

<!DOCTYPE html>
<html>
<head>
    <title>Kursus Saya</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
<div class="container mt-4">
    <h3>Kursus yang Kamu Ikuti</h3>
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>Judul Kursus</th>
                <th>Kategori</th>
                <th>Instruktur</th>
                <th>Status</th>
            </tr>
        </thead>
        <tbody>
            <?php while ($row = mysqli_fetch_assoc($result)): ?>
            <tr>
                <td><?= $row['title'] ?></td>
                <td><?= $row['category_name'] ?></td>
                <td><?= $row['instructor_name'] ?></td>
                <td><span class="badge bg-success">Terdaftar</span></td>
            </tr>
            <?php endwhile ?>
        </tbody>
    </table>
    <a href="courses.php" class="btn btn-secondary">← Kembali ke Daftar Kursus</a>
</div>
</body>
</html>
