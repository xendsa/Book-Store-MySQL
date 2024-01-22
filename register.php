<?php
session_start();
$koneksi = mysqli_connect("localhost", "root", "", "login");

if (mysqli_connect_errno()) {
    echo "Koneksi database gagal: " . mysqli_connect_error();
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $username = mysqli_real_escape_string($koneksi, $_POST['username']);
    $password = mysqli_real_escape_string($koneksi, $_POST['password']);
    $confirmPassword = mysqli_real_escape_string($koneksi, $_POST['confirmPassword']);
    $errors = array();

    if (empty($username)) {
        $errors[] = "Username harus diisi";
    }

    if (empty($password)) {
        $errors[] = "Password harus diisi";
    }

    if ($password !== $confirmPassword) {
        $errors[] = "Konfirmasi password tidak sesuai";
    }
    if (empty($errors)) {
        $query = "INSERT INTO users (username, password) VALUES ('$username', '$password')";
        $result = mysqli_query($koneksi, $query);

        if ($result) {
            echo "Registrasi berhasil. Silakan tunggu...";
            header("Refresh: 2; URL=index.php");
            exit();
        } else {
            echo "Registrasi gagal. Silakan coba lagi.";
        }
    }

}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="styleRegister.css">
    <title>Register</title>
</head>

<body>
    <header>
    </header>
    <section id="register-form">
        <form action="register.php" method="post">
            <?php
            if (!empty($errors)) {
                echo '<div class="error-container">';
                foreach ($errors as $error) {
                    echo '<p class="error">' . $error . '</p>';
                }
                echo '</div>';
            }
            ?>
            		<h1 class="title">Register</h1>
            <label for="password">Username</label>
            <input type="text" id="username" name="username" placeholder="username..." required>

            <label for="password">Password:</label>
            <input type="password" id="password" name="password" placeholder="password..." required>
            <input type="password" id="confirmPassword" name="confirmPassword" placeholder="konfirmasi..." required>

            <button type="submit">Register</button>
        </form>
        <p>Sudah memiliki akun? <a href="index.php">Login</a></p>
    </section>
</body>

</html>