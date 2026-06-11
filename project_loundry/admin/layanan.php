<?php
include '../koneksi.php';
$query = mysqli_query($conn, "SELECT * FROM layanan");
?>

<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Kelola Layanan - Dinda Laundry</title>

    <link rel="stylesheet" href="../css/style.css">
</head>

<body>

    <div class="tracking-container">

        <h2>🧺 Kelola Layanan</h2>

        <p class="subtitle">
            Daftar layanan laundry yang tersedia
        </p>

        <a href="tambah_layanan.php" class="tambah-btn">
            + Tambah Layanan
        </a>

        <table class="tracking-table">

            <tr>
                <th>No</th>
                <th>Nama Layanan</th>
                <th>Harga</th>
                <th>Aksi</th>
            </tr>

            <?php
            $no = 1;
            while ($data = mysqli_fetch_assoc($query)) {
            ?>

                <tr>

                    <td><?php echo $no++; ?></td>

                    <td><?php echo $data['nama_layanan']; ?></td>

                    <td>Rp <?php echo number_format($data['harga']); ?></td>

                    <td>

                        <a
                            href="edit_layanan.php?id=<?php echo $data['id_layanan']; ?>"
                            class="edit-btn">

                            Edit

                        </a>

                        <a
                            href="hapus_layanan.php?id=<?php echo $data['id_layanan']; ?>"
                            class="hapus-btn"
                            onclick="return confirm('Yakin ingin menghapus layanan ini?')">

                            Hapus

                        </a>

                    </td>

                </tr>

            <?php } ?>

        </table>

        <br>

        <div class="register-link">
            <a href="dashboard.php">← Kembali ke Dashboard</a>
        </div>

    </div>

</body>

</html>