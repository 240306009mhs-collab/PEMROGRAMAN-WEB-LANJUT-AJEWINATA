<?php
session_start();
include 'koneksi.php';

// cek user login
if (!isset($_SESSION['id_user'])) {
    header("Location: login.php");
    exit;
}

// ambil data layanan
$layanan = mysqli_query($conn, "SELECT * FROM layanan");

// proses simpan pesanan
if (isset($_POST['pesan'])) {

    $id_user = $_SESSION['id_user'];
    $id_layanan = $_POST['id_layanan'];
    $berat = $_POST['berat'];
    $metode = $_POST['metode_pembayaran'];

    // ambil harga layanan
    $queryHarga = mysqli_query(
        $conn,
        "SELECT * FROM layanan WHERE id_layanan='$id_layanan'"
    );

    $dataHarga = mysqli_fetch_assoc($queryHarga);

    $harga = $dataHarga['harga'];

    // hitung total harga
    $total = $harga * $berat;

    // simpan ke tabel pesanan
    mysqli_query(
        $conn,
        "INSERT INTO pesanan
        (id_user, id_layanan, berat, total_harga, metode_pembayaran)
        VALUES
        ('$id_user','$id_layanan','$berat','$total','$metode')"
    );

    echo "
    <script>
        alert('Pesanan berhasil dibuat!');
        window.location='dashboard.php';
    </script>
    ";
}
?>

<!DOCTYPE html>
<html>

<head>
    <title>Pesan Laundry</title>
</head>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pesan Laundry - Dinda Laundry</title>

    <link rel="stylesheet" href="css/style.css">


</head>

<body>

    <body>

        <div class="form-container">


            <h2>🧺 Pesan Laundry</h2>
            <p class="subtitle">
                Silakan isi data pesanan laundry Anda
            </p>

            <form method="POST" onsubmit="return validasiPesanan()">

                <label>Pilih Layanan</label>

                <select name="id_layanan" required>

                    <option value="">-- Pilih Layanan --</option>

                    <?php while ($data = mysqli_fetch_assoc($layanan)) { ?>

                        <option
                            value="<?php echo $data['id_layanan']; ?>"
                            data-harga="<?php echo $data['harga']; ?>">

                            <?php echo $data['nama_layanan']; ?>
                            - Rp <?php echo number_format($data['harga']); ?>/kg

                        </option>

                    <?php } ?>

                </select>

                <label>Berat Laundry (Kg)</label>

                <input
                    type="number"
                    name="berat"
                    placeholder="Masukkan Berat Laundry"
                    required>
                <div id="total-harga">
                    Total Harga: Rp 0
                </div>

                <label>Metode Pembayaran</label>

                <select name="metode_pembayaran" required>
                    <option value="">-- Pilih Pembayaran --</option>
                    <option value="Cash">Cash</option>
                    <option value="Transfer">Transfer</option>
                    <option value="QRIS">QRIS</option>
                </select>

                <button type="submit" name="pesan">
                    Pesan Sekarang
                </button>

            </form>

            <div class="register-link">
                <a href="dashboard.php">← Kembali ke Dashboard</a>
            </div>


        </div>
        <script>
            const layanan =
                document.querySelector(
                    'select[name="id_layanan"]'
                );

            const berat =
                document.querySelector(
                    'input[name="berat"]'
                );

            function hitungTotal() {

                let harga =
                    layanan.options[
                        layanan.selectedIndex
                    ]?.dataset.harga || 0;

                let kg =
                    berat.value || 0;

                let total =
                    harga * kg;

                document.getElementById(
                        "total-harga"
                    ).innerHTML =
                    "💰 Total Harga: Rp " +
                    Number(total).toLocaleString(
                        "id-ID"
                    );
            }

            layanan.addEventListener(
                "change",
                hitungTotal
            );

            berat.addEventListener(
                "input",
                hitungTotal
            );

            function validasiPesanan() {

                let berat =
                    document.querySelector(
                        'input[name="berat"]'
                    ).value;

                if (berat <= 0) {

                    alert(
                        "Berat laundry harus lebih dari 0 kg!"
                    );

                    return false;
                }

                return true;
            }
        </script>

    </body>


</html>