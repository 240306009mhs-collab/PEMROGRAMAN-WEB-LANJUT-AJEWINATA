<?php
include '../koneksi.php';

// ambil semua data pesanan
$query = mysqli_query(
    $conn,
    "SELECT pesanan.*, users.username, layanan.nama_layanan
    FROM pesanan
    JOIN users ON pesanan.id_user = users.id_user
    JOIN layanan ON pesanan.id_layanan = layanan.id_layanan
    ORDER BY id_pesanan DESC"
);
?>

<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Kelola Pesanan - Dinda Laundry</title>

    <link rel="stylesheet" href="../css/style.css">
</head>

<body>

    <div class="tracking-container">

        <h2>📦 Kelola Pesanan Laundry</h2>

        <p class="subtitle">
            Daftar seluruh pesanan pelanggan
        </p>

        <table class="tracking-table">

            <tr>
                <th>No</th>
                <th>User</th>
                <th>Layanan</th>
                <th>Berat</th>
                <th>Total</th>
                <th>Pembayaran</th>
                <th>Status</th>
                <th>Tanggal</th>
                <th>Aksi</th>
            </tr>

            <?php
            $no = 1;

            while ($data = mysqli_fetch_assoc($query)) {
            ?>

                <tr>

                    <td><?php echo $no++; ?></td>

                    <td><?php echo $data['username']; ?></td>

                    <td><?php echo $data['nama_layanan']; ?></td>

                    <td><?php echo $data['berat']; ?> Kg</td>

                    <td>
                        Rp <?php echo number_format($data['total_harga']); ?>
                    </td>

                    <td>
                        <?php echo $data['metode_pembayaran']; ?>
                    </td>

                    <td>
                        <?php echo $data['status']; ?>
                    </td>

                    <td>
                        <?php echo $data['tanggal']; ?>
                    </td>

                    <td>

                        <a
                            href="edit_status.php?id=<?php echo $data['id_pesanan']; ?>"
                            class="edit-btn">

                            Update Status

                        </a>

                        <a
                            href="hapus_pesanan.php?id=<?php echo $data['id_pesanan']; ?>"
                            class="hapus-btn"
                            onclick="return confirm('Yakin ingin menghapus pesanan ini?')">

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