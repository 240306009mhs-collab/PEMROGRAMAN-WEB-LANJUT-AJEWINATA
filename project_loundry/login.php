<?php
session_start();
require_once 'koneksi.php';

if (isset($_POST['login'])) {

    $username = $_POST['username'];
    $password = $_POST['password'];

    $sql = "SELECT * FROM users 
            WHERE username='$username' 
            AND password='$password'";

    $query = mysqli_query($conn, $sql);

    if (mysqli_num_rows($query) > 0) {

        $data = mysqli_fetch_assoc($query);

        $_SESSION['id_user'] = $data['id_user'];
        $_SESSION['username'] = $data['username'];

        header("Location: dashboard.php");
        exit;
    } else {

        $_SESSION['error'] = "Username atau password salah!";
        header("Location: login.php");
        exit;
    }
}
?>

<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login - Dinda Laundry</title>

    <!-- CSS -->
    <link rel="stylesheet" href="css/style.css">
</head>

<body>

    <div class="login-box">

        <h2>🫧 Dinda Laundry</h2>
        <p class="subtitle">
            Bersih, Cepat, dan Terpercaya
        </p>
        <?php if (isset($_SESSION['error'])) : ?>

            <div class="error-message">
                <?php
                echo $_SESSION['error'];
                unset($_SESSION['error']);
                ?>
            </div>

        <?php endif; ?>

        <form method="POST">

            <label>Username</label>

            <input
                type="text"
                name="username"
                placeholder="Masukkan Username"
                required>

            <label>Password</label>

            <input
                type="password"
                name="password"
                placeholder="Masukkan Password"
                required>

            <button type="submit" name="login">
                Login
            </button>

        </form>

        <div class="register-link">
            Belum punya akun?
            <a href="register.php">Daftar Sekarang</a>
        </div>

    </div>

</body>

</html>