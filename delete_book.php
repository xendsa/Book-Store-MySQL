<?php
session_start();

if (!isset($_SESSION['username'])) {
    header("location: login.php");
}

if ($_SESSION['user_role'] !== 'admin') {
    header("location: dashboard.php");
}

$koneksi = mysqli_connect("localhost", "root", "", "login");

if (mysqli_connect_errno()) {
    echo "Koneksi database gagal: " . mysqli_connect_error();
}

if ($_SERVER['REQUEST_METHOD'] === 'GET' && isset($_GET['id'])) {
    $id = $_GET['id'];
    $deleteQuery = "DELETE FROM books WHERE id = $id";
    $result = mysqli_query($koneksi, $deleteQuery);

    if ($result) {
        echo "Book deleted successfully.";
    } else {
        echo "Error deleting book. Please try again.";
    }
} else {
    echo "Invalid request.";
}

header("location: dashboardAdmin.php");
exit();
?>
