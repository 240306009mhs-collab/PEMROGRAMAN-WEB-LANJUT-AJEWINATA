<?php
include '../koneksi.php';

if (isset($_POST['simpan'])) {

    $nama = $_POST['nama_layanan'];
    $harga = $_POST['harga'];

    mysqli_query(
        $conn,
        "INSERT INTO layanan (nama_layanan, harga)
        VALUES ('$nama', '$harga')"
    );

    header("Location: layanan.php");
    exit;
}
?>

<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah Layanan - Dinda Laundry</title>

    <link rel="stylesheet" href="../css/style.css">
</head>

<body>

    <div class="form-container">

        <h2>➕ Tambah Layanan</h2>

        <p class="subtitle">
            Tambahkan layanan laundry baru
        </p>

        <form method="POST">

            <label>Nama Layanan</label>

            <input
                type="text"
                name="nama_layanan"
                placeholder="Masukkan Nama Layanan"
                required>

            <label>Harga (Rp)</label>

            <input
                type="number"
                name="harga"
                placeholder="Masukkan Harga"
                required>

            <button type="submit" name="simpan">
                Simpan Layanan
            </button>

        </form>

        <div class="register-link">
            <a href="layanan.php">
                ← Kembali ke Kelola Layanan
            </a>
        </div>

    </div>

</body>

</html>