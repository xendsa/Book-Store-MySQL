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
    $title = mysqli_real_escape_string($koneksi, $_POST['title']);
    $description = mysqli_real_escape_string($koneksi, $_POST['description']);
    $harga = $_POST['harga'];
    $gambarFileName = $_FILES['gambar']['name'];
    $gambarTempName = $_FILES['gambar']['tmp_name'];
    $gambarPath = "uploads/" . $gambarFileName;

    move_uploaded_file($gambarTempName, $gambarPath);

    $query = "INSERT INTO books (title, description, image_path, harga) VALUES ('$title', '$description', '$gambarPath', $harga)";
    mysqli_query($koneksi, $query);

    header('Location: dashboardAdmin.php');
    exit();
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <title>Admin</title>
    <link rel="stylesheet" href="styleAddBook.css">
</head>

<body>
    <header>
        <h1>Tambah Buku</h1>
    </header>
    <section id="add-book-form">
        <form action="add_book.php" method="post" enctype="multipart/form-data">
            <label for="title">Judul Buku:</label>
            <input type="text" id="title" name="title" required>

            <label for="description">Deskripsi Buku:</label>
            <textarea id="description" name="description" required></textarea>

            <label for="gambar">Gambar Buku:</label>
            <input type="file" id="gambar" name="gambar" accept="image/*" required>

            <label for="harga">Harga Buku (Rp):</label>
            <input type="number" id="harga" name="harga" required>

            <button type="submit">Tambahkan Buku</button>
        </form>

    </section>
</body>

</html>