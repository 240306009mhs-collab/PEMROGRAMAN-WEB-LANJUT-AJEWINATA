<?php
include '../koneksi.php';
$query = mysqli_query($conn, "SELECT * FROM pembayaran");
?>

<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Kelola Pembayaran - Dinda Laundry</title>

    <link rel="stylesheet" href="../css/style.css">
</head>

<body>

    <div class="tracking-container">

        <h2>💳 Kelola Pembayaran</h2>

        <p class="subtitle">
            Daftar pembayaran pelanggan
        </p>

        <a href="tambah_pembayaran.php" class="tambah-btn">
            + Tambah Pembayaran
        </a>

        <table class="tracking-table">

            <tr>
                <th>No</th>
                <th>ID User</th>
                <th>Metode</th>
                <th>Total Harga</th>
                <th>Status Bayar</th>
                <th>Aksi</th>
            </tr>

            <?php
            $no = 1;
            while ($data = mysqli_fetch_assoc($query)) {
            ?>

                <tr>

                    <td><?php echo $no++; ?></td>

                    <td><?php echo $data['id_user']; ?></td>

                    <td><?php echo $data['metode']; ?></td>

                    <td>
                        Rp <?php echo number_format($data['total_harga']); ?>
                    </td>

                    <td>
                        <?php echo $data['status_bayar']; ?>
                    </td>

                    <td>

                        <a
                            href="edit_pembayaran.php?id=<?php echo $data['id_pembayaran']; ?>"
                            class="edit-btn">

                            Edit

                        </a>

                        <a
                            href="hapus_pembayaran.php?id=<?php echo $data['id_pembayaran']; ?>"
                            class="hapus-btn"
                            onclick="return confirm('Yakin ingin menghapus data pembayaran ini?')">

                            Hapus

                        </a>

                    </td>

                </tr>

            <?php } ?>

        </table>

        <div class="register-link">
            <a href="dashboard.php">
                ← Kembali ke Dashboard
            </a>
        </div>

    </div>

</body>

</html>