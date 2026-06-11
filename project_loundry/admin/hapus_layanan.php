<?php
include '../koneksi.php';

$id = $_GET['id'];
mysqli_query($conn, "DELETE FROM layanan WHERE id_layanan='$id'");

header("Location: layanan.php");
