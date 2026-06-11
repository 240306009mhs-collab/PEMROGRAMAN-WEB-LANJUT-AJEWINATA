<?php
include '../koneksi.php';

if (isset($_POST['simpan'])) {

    $id_user = $_POST['id_user'];
    $metode = $_POST['metode'];
    $total = $_POST['total_harga'];
    $status = $_POST['status_bayar'];

    mysqli_query(
        $conn,
        "INSERT INTO pembayaran
        (id_user, metode, total_harga, status_bayar)
        VALUES
        ('$id_user', '$metode', '$total', '$status')"
    );

    header("Location: pembayaran.php");
    exit;
}
?>

<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah Pembayaran - Dinda Laundry</title>

    <link rel="stylesheet" href="../css/style.css">
</head>

<body>

    <div class="form-container">

        <h2>💳 Tambah Pembayaran</h2>

        <p class="subtitle">
            Tambahkan data pembayaran pelanggan
        </p>

        <form method="POST">

            <label>ID User</label>

            <input
                type="number"
                name="id_user"
                placeholder="Masukkan ID User"
                required>

            <label>Metode Pembayaran</label>

            <select name="metode" required>
                <option value="">-- Pilih Metode --</option>
                <option value="Cash">Cash</option>
                <option value="Transfer">Transfer</option>
                <option value="QRIS">QRIS</option>
            </select>

            <label>Total Harga</label>

            <input
                type="number"
                name="total_harga"
                placeholder="Masukkan Total Harga"
                required>

            <label>Status Pembayaran</label>

            <select name="status_bayar" required>
                <option value="">-- Pilih Status --</option>
                <option value="Belum Lunas">Belum Lunas</option>
                <option value="Lunas">Lunas</option>
            </select>

            <button type="submit" name="simpan">
                Simpan Pembayaran
            </button>

        </form>

        <div class="register-link">
            <a href="pembayaran.php">
                ← Kembali ke Kelola Pembayaran
            </a>
        </div>

    </div>

</body>

</html>