<?php
$host     = "localhost";
$username = "tiuinmtr_dindalaundry";
$password = "dindalaundry123#";
$database = "tiuinmtr_dindalaundry";

$conn = mysqli_connect($host, $username, $password, $database);

if (!$conn) {
    die("Koneksi gagal: " . mysqli_connect_error());
}
