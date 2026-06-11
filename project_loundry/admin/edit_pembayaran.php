<?php
include '../koneksi.php';

$id = $_GET['id'];

$query = mysqli_query(
    $conn,
    "SELECT * FROM pembayaran WHERE id_pembayaran='$id'"
);

$data = mysqli_fetch_assoc($query);

if (isset($_POST['update'])) {

    $id_user = $_POST['id_user'];
    $metode = $_POST['metode'];
    $total = $_POST['total_harga'];
    $status = $_POST['status_bayar'];

    mysqli_query(
        $conn,
        "UPDATE pembayaran
        SET id_user='$id_user',
            metode='$metode',
            total_harga='$total',
            status_bayar='$status'
        WHERE id_pembayaran='$id'"
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
    <title>Edit Pembayaran - Dinda Laundry</title>

    <link rel="stylesheet" href="../css/style.css">
</head>

<body>

    <div class="form-container">

        <h2>✏️ Edit Pembayaran</h2>

        <p class="subtitle">
            Perbarui data pembayaran pelanggan
        </p>

        <form method="POST">

            <label>ID User</label>

            <input
                type="number"
                name="id_user"
                value="<?php echo htmlspecialchars($data['id_user']); ?>"
                required>

            <label>Metode Pembayaran</label>

            <select name="metode" required>

                <option value="Cash"
                    <?php if ($data['metode'] == 'Cash') echo 'selected'; ?>>
                    Cash
                </option>

                <option value="Transfer"
                    <?php if ($data['metode'] == 'Transfer') echo 'selected'; ?>>
                    Transfer
                </option>

                <option value="QRIS"
                    <?php if ($data['metode'] == 'QRIS') echo 'selected'; ?>>
                    QRIS
                </option>

            </select>

            <label>Total Harga</label>

            <input
                type="number"
                name="total_harga"
                value="<?php echo htmlspecialchars($data['total_harga']); ?>"
                required>

            <label>Status Pembayaran</label>

            <select name="status_bayar" required>

                <option value="Belum Lunas"
                    <?php if ($data['status_bayar'] == 'Belum Lunas') echo 'selected'; ?>>
                    Belum Lunas
                </option>

                <option value="Lunas"
                    <?php if ($data['status_bayar'] == 'Lunas') echo 'selected'; ?>>
                    Lunas
                </option>

            </select>

            <button type="submit" name="update">
                Simpan Perubahan
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