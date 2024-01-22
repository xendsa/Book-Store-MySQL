<?php
session_start();

if (isset($_SESSION['user_role']) && $_SESSION['user_role'] == 'admin') {
} else {
    header('Location: dashboardAdmin.php');
    exit();
}

$koneksi = mysqli_connect("localhost", "root", "", "login");

if (mysqli_connect_errno()) {
    echo "Koneksi database gagal: " . mysqli_connect_error();
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $bookId = mysqli_real_escape_string($koneksi, $_POST['id']);
    $title = mysqli_real_escape_string($koneksi, $_POST['title']);
    $description = mysqli_real_escape_string($koneksi, $_POST['description']);
    $harga = $_POST['harga']; 

    if ($_FILES['gambar']['name'] != "") {
        $gambarFileName = $_FILES['gambar']['name'];
        $gambarTempName = $_FILES['gambar']['tmp_name'];
        $gambarPath = "uploads/" . $gambarFileName;

        move_uploaded_file($gambarTempName, $gambarPath);

        $query = "UPDATE books SET title='$title', description='$description', image_path='$gambarPath', harga=$harga WHERE id=$bookId";
    } else {
        $query = "UPDATE books SET title='$title', description='$description', harga=$harga WHERE id=$bookId";
    }

    mysqli_query($koneksi, $query);

    header('Location: dashboardAdmin.php');
    exit();
}
?>
