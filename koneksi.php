<?php
$koneksi = mysqli_connect("localhost", "root", "", "login");

if (mysqli_connect_errno()) {
    echo "Koneksi database gagal: " . mysqli_connect_error();
}

$username = $_POST['username'];
$password = $_POST['password'];
$query = "SELECT * FROM users WHERE username='$username' AND password='$password'";
$result = mysqli_query($koneksi, $query);

if (mysqli_num_rows($result) == 1) {
    $row = mysqli_fetch_assoc($result);

    session_start();
    $_SESSION['username'] = $username;
    $_SESSION['user_role'] = $row['role'];

    if ($row['role'] == 'admin') {
        header("location: dashboardAdmin.php");
    } else {
        header("location: dashboard.php");
    }
} else {
    echo "Login Failed, Username or Password wrong. Please try again <a href='index.php'>here</a>";
}

mysqli_close($koneksi);
?>
