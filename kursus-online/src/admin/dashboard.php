<?php
include '../auth/cek_session.php';
include 'layout/header.php';
include 'layout/sidebar.php';
?>

<div class="content">
    <h2>Dashboard Admin</h2>
    <p>Selamat datang, <?= $_SESSION['name'] ?>!</p>
</div>

<?php include 'layout/footer.php'; ?>
