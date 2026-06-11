<?php
include '../koneksi.php';

$id = $_GET['id'];

// ambil data berdasarkan id
$query = mysqli_query($conn, "SELECT * FROM layanan WHERE id_layanan='$id'");
$data = mysqli_fetch_assoc($query);

// proses update
if (isset($_POST['update'])) {
    $nama = $_POST['nama_layanan'];
    $harga = $_POST['harga'];

    mysqli_query($conn, "UPDATE layanan 
                         SET nama_layanan='$nama', harga='$harga' 
                         WHERE id_layanan='$id'");

    header("Location: layanan.php");
    exit;
}
?>

<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Layanan - Dinda Laundry</title>

    <link rel="stylesheet" href="../css/style.css">
</head>

<body>

    <div class="form-container">

        <h2>✏️ Edit Layanan</h2>

        <p class="subtitle">
            Perbarui data layanan laundry
        </p>

        <form method="POST">

            <label>Nama Layanan</label>

            <input
                type="text"
                name="nama_layanan"
                value="<?php echo htmlspecialchars($data['nama_layanan']); ?>"
                required>

            <label>Harga (Rp)</label>

            <input
                type="number"
                name="harga"
                value="<?php echo htmlspecialchars($data['harga']); ?>"
                required>

            <button type="submit" name="update">
                Simpan Perubahan
            </button>

        </form>

        <div class="register-link">
            <a href="layanan.php">← Kembali ke Kelola Layanan</a>
        </div>

    </div>

</body>

</html>