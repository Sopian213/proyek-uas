<?php
include '../../auth/cek_session.php';
include '../../config/db.php';

$id = $_GET['id'];
mysqli_query($conn, "DELETE FROM courses WHERE id=$id");
header("Location: index.php");
