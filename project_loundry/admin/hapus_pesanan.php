<?php
include '../koneksi.php';

$id = $_GET['id'] ?? null;

// cek apakah id ada
if ($id) {

    // hapus data
    $hapus = mysqli_query(
        $conn,
        "DELETE FROM pesanan WHERE id_pesanan='$id'"
    );

    if ($hapus) {
        echo "
        <script>
            alert('Pesanan berhasil dihapus!');
            window.location='pesanan.php';
        </script>
        ";
    } else {
        echo "
        <script>
            alert('Gagal menghapus pesanan!');
            window.location='pesanan.php';
        </script>
        ";
    }
} else {
    echo "
    <script>
        alert('ID tidak ditemukan!');
        window.location='pesanan.php';
    </script>
    ";
}
