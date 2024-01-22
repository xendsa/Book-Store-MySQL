<?php
session_start();
include("koneksi.php");

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $username = mysqli_real_escape_string($koneksi, $_POST['username']);
    $password = mysqli_real_escape_string($koneksi, $_POST['password']);
    $query = "SELECT * FROM users WHERE username='$username'";
    $result = mysqli_query($koneksi, $query);

    if ($result && mysqli_num_rows($result) > 0) {
        $row = mysqli_fetch_assoc($result);
        if (password_verify($password, $row['password'])) {
            $_SESSION['username'] = $username;
            $_SESSION['user_role'] = $row['role'];
            if ($row['role'] == 'admin') {
                header("location: dashboardAdmin.php");
            } else {
                header("location: dashboard.php");
            }
            exit();
        } else {
            $login_error = "Login failed, username or password is incorrect.";
        }
    } else {
        $login_error = "Login failed, username or password is incorrect.";
    }
}

mysqli_close($koneksi);
?>
