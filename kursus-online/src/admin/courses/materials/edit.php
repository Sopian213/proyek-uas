<?php
include '../../../auth/cek_session.php';
include '../../../config/db.php';

$id = $_GET['id'];
$course_id = $_GET['course_id'];
$materi = mysqli_fetch_assoc(mysqli_query($conn, "SELECT * FROM course_materials WHERE id = $id"));

if (isset($_POST['update'])) {
    $title = $_POST['title'];
    $content = $_POST['content'];
    mysqli_query($conn, "UPDATE course_materials SET title='$title', content='$content' WHERE id=$id");
    header("Location: index.php?course_id=$course_id");
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Edit Materi</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
<div class="container mt-4">
    <h3>Edit Materi</h3>
    <form method="POST">
        <div class="mb-3">
            <label>Judul Materi</label>
            <input type="text" name="title" class="form-control" value="<?= $materi['title'] ?>" required>
        </div>
        <div class="mb-3">
            <label>Konten</label>
            <textarea name="content" rows="5" class="form-control"><?= $materi['content'] ?></textarea>
        </div>
        <button name="update" class="btn btn-primary">Update</button>
        <a href="index.php?course_id=<?= $course_id ?>" class="btn btn-secondary">Batal</a>
    </form>
</div>
</body>
</html>
