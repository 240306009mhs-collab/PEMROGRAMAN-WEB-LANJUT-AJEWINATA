<?php
include 'koneksi.php';

if (isset($_POST['register'])) {

    $username = $_POST['username'];
    $password = $_POST['password'];

    // cek username sudah ada atau belum
    $cek = mysqli_query($conn, "SELECT * FROM users WHERE username='$username'");

    if (mysqli_num_rows($cek) > 0) {

        echo "<script>
                alert('Username sudah digunakan!');
              </script>";
    } else {

        mysqli_query($conn, "INSERT INTO users(username, password)
                             VALUES('$username', '$password')");

        echo "<script>
                alert('Registrasi berhasil!');
                window.location='login.php';
              </script>";
    }
}
?>

<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register - Dinda Laundry</title>


    <link rel="stylesheet" href="css/style.css">


</head>


<body>

    <body>

        <div class="login-box">


            <h2>🫧 Dinda Laundry</h2>

            <p class="subtitle">
                Buat akun baru untuk menggunakan layanan laundry
            </p>

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

                <button type="submit" name="register">
                    Register
                </button>

            </form>

            <div class="register-link">
                Sudah punya akun?
                <a href="login.php">Login Sekarang</a>
            </div>


        </div>

    </body>


</html>