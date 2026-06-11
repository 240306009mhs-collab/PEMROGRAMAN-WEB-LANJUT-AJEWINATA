<?php
include '../koneksi.php';

// cek id agar tidak error kalau kosong
$id = isset($_GET['id']) ? $_GET['id'] : null;

if (!$id) {
    echo "<script>
        alert('ID tidak ditemukan!');
        window.location='pesanan.php';
    </script>";
    exit;
}

// ambil data pesanan (lebih aman pakai casting sederhana)
$id = mysqli_real_escape_string($conn, $id);

$query = mysqli_query(
    $conn,
    "SELECT * FROM pesanan WHERE id_pesanan='$id'"
);

$data = mysqli_fetch_assoc($query);

// kalau data tidak ditemukan
if (!$data) {
    echo "<script>
        alert('Data pesanan tidak ditemukan!');
        window.location='pesanan.php';
    </script>";
    exit;
}

// proses update
if (isset($_POST['update'])) {

    $status = mysqli_real_escape_string($conn, $_POST['status']);

    $update = mysqli_query(
        $conn,
        "UPDATE pesanan 
         SET status='$status' 
         WHERE id_pesanan='$id'"
    );

    if ($update) {
        echo "<script>
            alert('Status berhasil diupdate!');
            window.location='pesanan.php';
        </script>";
    } else {
        echo "<script>
            alert('Gagal mengupdate status!');
        </script>";
    }
}
?>

<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Update Status Laundry - Dinda Laundry</title>

    <link rel="stylesheet" href="../css/style.css">
</head>

<body>

    <div class="form-container">

        <h2>📦 Update Status Laundry</h2>

        <p class="subtitle">
            Perbarui status proses laundry pelanggan
        </p>

        <form method="POST">

            <label>Status Laundry</label>

            <select name="status" required>

                <option value="Menunggu" <?= ($data['status'] == 'Menunggu') ? 'selected' : '' ?>>
                    Menunggu
                </option>

                <option value="Sedang Dicuci" <?= ($data['status'] == 'Sedang Dicuci') ? 'selected' : '' ?>>
                    Sedang Dicuci
                </option>

                <option value="Sedang Disetrika" <?= ($data['status'] == 'Sedang Disetrika') ? 'selected' : '' ?>>
                    Sedang Disetrika
                </option>

                <option value="Selesai" <?= ($data['status'] == 'Selesai') ? 'selected' : '' ?>>
                    Selesai
                </option>

            </select>

            <button type="submit" name="update">
                Simpan Status
            </button>

        </form>

        <div class="register-link">
            <a href="pesanan.php">
                ← Kembali ke Kelola Pesanan
            </a>
        </div>

    </div>

</body>

</html>