<?php
include '../../../auth/cek_session.php';
include '../../../config/db.php';

$course_id = $_GET['course_id'];

if (isset($_POST['simpan'])) {
    $title = $_POST['title'];
    $content = $_POST['content'];
    mysqli_query($conn, "INSERT INTO course_materials (course_id, title, content) 
                         VALUES ('$course_id', '$title', '$content')");
    header("Location: index.php?course_id=$course_id");
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Tambah Materi</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
<div class="container mt-4">
    <h3>Tambah Materi</h3>
    <form method="POST">
        <div class="mb-3">
            <label>Judul Materi</label>
            <input type="text" name="title" class="form-control" required>
        </div>
        <div class="mb-3">
            <label>Konten</label>
            <textarea name="content" rows="5" class="form-control" required></textarea>
        </div>
        <button name="simpan" class="btn btn-success">Simpan</button>
        <a href="index.php?course_id=<?= $course_id ?>" class="btn btn-secondary">Kembali</a>
    </form>
</div>
</body>
</html>
