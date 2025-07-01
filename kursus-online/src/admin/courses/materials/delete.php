<?php
include '../../../auth/cek_session.php';
include '../../../config/db.php';

$id = $_GET['id'];
$course_id = $_GET['course_id'];

mysqli_query($conn, "DELETE FROM course_materials WHERE id=$id");
header("Location: index.php?course_id=$course_id");
