<?php
session_start();

if (!isset($_SESSION['admin'])) {
    header("Location: login.php");
    exit;
}
?>

<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard Admin - Dinda Laundry</title>

    <link rel="stylesheet" href="../css/style.css">
</head>

<body>

    <div class="dashboard-container">

        <div class="navbar">
            <h1>🫧 Admin Dinda Laundry</h1>

            <h3>
                Halo, <?php echo $_SESSION['admin']; ?>
            </h3>
        </div>

        <div class="welcome-card">

            <h2>Dashboard Administrator</h2>

            <p>
                Kelola layanan, pembayaran, dan pesanan laundry
                melalui menu di bawah ini.
            </p>

        </div>

        <div class="menu-dashboard">

            <a href="layanan.php" class="menu-btn">
                🧺 Kelola Layanan
            </a>

            <a href="pembayaran.php" class="menu-btn">
                💳 Kelola Pembayaran
            </a>

            <a href="pesanan.php" class="menu-btn">
                📦 Kelola Pesanan
            </a>

            <a href="logout.php" class="menu-btn logout">
                🚪 Logout
            </a>

        </div>

    </div>

</body>

</html>