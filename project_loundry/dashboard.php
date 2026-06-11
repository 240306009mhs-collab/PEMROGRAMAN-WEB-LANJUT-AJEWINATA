<?php
session_start();

// cek user login
if (!isset($_SESSION['username'])) {
    header("Location: login.php");
    exit;
}
?>

<!DOCTYPE html>

<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard User - Dinda Laundry</title>


    <link rel="stylesheet" href="css/style.css">


</head>

<body>


    <div class="dashboard-container">

        <div class="navbar">
            <h1>🫧 Dinda Laundry</h1>

            <h3>
                Halo, <?php echo $_SESSION['username']; ?>
            </h3>
        </div>
        <div class="welcome-card">

            <h2>Selamat Datang di Dinda Laundry</h2>

            <p>
                Silakan pilih menu yang tersedia untuk melakukan pemesanan
                atau melihat status laundry Anda.
            </p>

        </div>


        <div class="stats">

        </div>

        <div class="menu-dashboard">

            <a href="pesan.php" class="menu-btn">
                🧺 Pesan Laundry
            </a>

            <a href="tracking.php" class="menu-btn">
                📦 Tracking Laundry
            </a>

            <a href="logout.php" class="menu-btn logout">
                🚪 Logout
            </a>

        </div>

    </div>
    <script>
        function tampilJam() {

            let sekarang = new Date();

            let jam = sekarang.getHours()
                .toString()
                .padStart(2, '0');

            let menit = sekarang.getMinutes()
                .toString()
                .padStart(2, '0');

            let detik = sekarang.getSeconds()
                .toString()
                .padStart(2, '0');

            document.getElementById("jam-digital").innerHTML =
                "🕒 " + jam + ":" + menit + ":" + detik;
        }

        setInterval(tampilJam, 1000);

        tampilJam();
    </script>


</body>

</html>