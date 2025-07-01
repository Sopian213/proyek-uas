<?php
include '../../auth/cek_session.php';
include '../../config/db.php';

$id = $_GET['id'];
$course = mysqli_fetch_assoc(mysqli_query($conn, "SELECT * FROM courses WHERE id=$id"));
$categories = mysqli_query($conn, "SELECT * FROM categories");
$instructors = mysqli_query($conn, "SELECT * FROM users WHERE role_id = 2");

if (isset($_POST['update'])) {
    $title = $_POST['title'];
    $description = $_POST['description'];
    $category_id = $_POST['category_id'];
    $instructor_id = $_POST['instructor_id'];

    mysqli_query($conn, "UPDATE courses SET 
        title='$title', description='$description', category_id='$category_id', instructor_id='$instructor_id'
        WHERE id=$id");
    header("Location: index.php");
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Edit Kursus</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
<div class="container mt-4">
    <h3>Edit Kursus</h3>
    <form method="POST">
        <div class="mb-3">
            <label>Judul</label>
            <input type="text" name="title" class="form-control" value="<?= $course['title'] ?>" required>
        </div>
        <div class="mb-3">
            <label>Deskripsi</label>
            <textarea name="description" class="form-control"><?= $course['description'] ?></textarea>
        </div>
        <div class="mb-3">
            <label>Kategori</label>
            <select name="category_id" class="form-select" required>
                <?php while ($cat = mysqli_fetch_assoc($categories)): ?>
                    <option value="<?= $cat['id'] ?>" <?= $cat['id'] == $course['category_id'] ? 'selected' : '' ?>>
                        <?= $cat['name'] ?>
                    </option>
                <?php endwhile ?>
            </select>
        </div>
        <div class="mb-3">
            <label>Instruktur</label>
            <select name="instructor_id" class="form-select" required>
                <?php while ($ins = mysqli_fetch_assoc($instructors)): ?>
                    <option value="<?= $ins['id'] ?>" <?= $ins['id'] == $course['instructor_id'] ? 'selected' : '' ?>>
                        <?= $ins['name'] ?>
                    </option>
                <?php endwhile ?>
            </select>
        </div>
        <button name="update" class="btn btn-primary">Update</button>
        <a href="index.php" class="btn btn-secondary">Batal</a>
    </form>
</div>
</body>
</html>
