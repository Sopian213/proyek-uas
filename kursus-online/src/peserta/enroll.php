<?php
include '../auth/cek_session.php';
include '../config/db.php';

if ($_SESSION['role_id'] != 3) {
    echo "<script>alert('Akses ditolak!');location.href='../index.php';</script>";
    exit;
}

$course_id = $_GET['course_id'];
$user_id = $_SESSION['user_id'];

// Cek apakah sudah pernah daftar
$cek = mysqli_query($conn, "SELECT * FROM enrollments WHERE course_id=$course_id AND user_id=$user_id");
if (mysqli_num_rows($cek) == 0) {
    mysqli_query($conn, "INSERT INTO enrollments (user_id, course_id, enrolled_at) VALUES ($user_id, $course_id, NOW())");
    echo "<script>alert('Berhasil mendaftar kursus!');location.href='my_courses.php';</script>";
} else {
    echo "<script>alert('Kamu sudah terdaftar di kursus ini.');location.href='courses.php';</script>";
}
