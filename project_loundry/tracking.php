<?php
session_start();
include 'koneksi.php';

// cek user login
if (!isset($_SESSION['id_user'])) {
    header("Location: login.php");
    exit;
}

$id_user = $_SESSION['id_user'];

// ambil data pesanan user
$query = mysqli_query(
    $conn,
    "SELECT pesanan.*, layanan.nama_layanan
    FROM pesanan
    JOIN layanan ON pesanan.id_layanan = layanan.id_layanan
    WHERE pesanan.id_user='$id_user'
    ORDER BY id_pesanan DESC"
);
?>

<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tracking Laundry - Dinda Laundry</title>


    <link rel="stylesheet" href="css/style.css">


</head>


<body>

    <body>

        <div class="tracking-container">

            <h2>📦 Tracking Laundry</h2>

            <p class="subtitle">
                Riwayat dan status laundry Anda
            </p>

            <table class="tracking-table">

                <tr>
                    <th>No</th>
                    <th>Layanan</th>
                    <th>Berat</th>
                    <th>Total Harga</th>
                    <th>Pembayaran</th>
                    <th>Status</th>
                    <th>Tanggal</th>
                </tr>

                <?php
                $no = 1;

                while ($data = mysqli_fetch_assoc($query)) {
                ?>

                    <tr>

                        <td><?php echo $no++; ?></td>

                        <td><?php echo $data['nama_layanan']; ?></td>

                        <td><?php echo $data['berat']; ?> Kg</td>

                        <td>Rp <?php echo $data['total_harga']; ?></td>

                        <td><?php echo $data['metode_pembayaran']; ?></td>

                        <td><?php echo $data['status']; ?></td>

                        <td><?php echo $data['tanggal']; ?></td>

                    </tr>

                <?php } ?>

            </table>

            <div class="register-link">
                <a href="dashboard.php">← Kembali ke Dashboard</a>
            </div>


        </div>

    </body>


</html>