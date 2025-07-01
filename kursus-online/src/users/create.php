<?php
include '../../auth/cek_session.php';
include '../../config/db.php';

$roles = mysqli_query($conn, "SELECT * FROM roles");

if (isset($_POST['simpan'])) {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $password = md5($_POST['password']);
    $role_id = $_POST['role_id'];

    mysqli_query($conn, "INSERT INTO users (name, email, password, role_id) 
                         VALUES ('$name', '$email', '$password', '$role_id')");
    header("Location: index.php");
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Tambah User</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
<div class="container mt-4">
    <h3>Tambah Pengguna</h3>
    <form method="POST">
        <div class="mb-3">
            <label>Nama</label>
            <input type="text" name="name" class="form-control" required>
        </div>
        <div class="mb-3">
            <label>Email</label>
            <input type="email" name="email" class="form-control" required>
        </div>
        <div class="mb-3">
            <label>Password</label>
            <input type="password" name="password" class="form-control" required>
        </div>
        <div class="mb-3">
            <label>Role</label>
            <select name="role_id" class="form-select" required>
                <option value="">-- Pilih Role --</option>
                <?php while ($r = mysqli_fetch_assoc($roles)): ?>
                    <option value="<?= $r['id'] ?>"><?= $r['name'] ?></option>
                <?php endwhile ?>
            </select>
        </div>
        <button name="simpan" class="btn btn-success">Simpan</button>
        <a href="index.php" class="btn btn-secondary">Kembali</a>
    </form>
</div>
</body>
</html>
