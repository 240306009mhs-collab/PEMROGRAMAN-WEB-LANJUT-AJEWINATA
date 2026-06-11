<?php
session_start();
include '../koneksi.php';

if (isset($_POST['login'])) {

    $username = $_POST['username'];
    $password = $_POST['password'];

    $query = mysqli_query(
        $conn,
        "SELECT * FROM admin 
        WHERE nama_admin='$username'
        AND password='$password'"
    );

    if (mysqli_num_rows($query) > 0) {

        $_SESSION['admin'] = $username;

        header("Location: dashboard.php");
        exit;
    } else {

        echo "<script>alert('Login admin gagal!');</script>";
    }
}
?>

<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Admin - Dinda Laundry</title>

    <link rel="stylesheet" href="../css/style.css">
</head>

<body>

    <div class="login-box">

        <h2>🫧 Admin Dinda Laundry</h2>

        <p class="subtitle">
            Silakan login sebagai administrator
        </p>

        <form method="POST">

            <label>Username</label>

            <input
                type="text"
                name="username"
                placeholder="Masukkan Username Admin"
                required>

            <label>Password</label>

            <input
                type="password"
                name="password"
                placeholder="Masukkan Password"
                required>

            <button type="submit" name="login">
                Login Admin
            </button>

        </form>

    </div>

</body>

</html>