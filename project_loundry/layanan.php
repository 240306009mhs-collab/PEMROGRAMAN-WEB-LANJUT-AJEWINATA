<?php
include 'koneksi.php';

$query = mysqli_query($conn, "SELECT * FROM layanan");
?>

<!DOCTYPE html>
<html>

<head>
    <title>Layanan - Dinda Laundry</title>
    <link rel="stylesheet" href="assets/style.css">
</head>

<body>
    <h2>Daftar Layanan Laundry</h2>

    <table border="1" cellpadding="10" cellspacing="0" align="center">
        <tr>
            <th>No</th>
            <th>Nama Layanan</th>
            <th>Harga</th>
        </tr>

        <?php
        $no = 1;
        while ($data = mysqli_fetch_assoc($query)) {
        ?>
            <tr>
                <td><?php echo $no++; ?></td>
                <td><?php echo $data['nama_layanan']; ?></td>
                <td>Rp <?php echo $data['harga']; ?></td>
            </tr>
        <?php } ?>
    </table>
</body>

</html>