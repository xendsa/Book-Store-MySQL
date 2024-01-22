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
    $id = $_POST['id'];
    $title = mysqli_real_escape_string($koneksi, $_POST['title']);
    $description = mysqli_real_escape_string($koneksi, $_POST['description']);
    $harga = $_POST['harga'];

    if (!empty($_FILES['gambar']['name'])) {
        $gambarFileName = $_FILES['gambar']['name'];
        $gambarTempName = $_FILES['gambar']['tmp_name'];
        $gambarPath = "uploads/" . $gambarFileName;

        move_uploaded_file($gambarTempName, $gambarPath);

        $query = "UPDATE books SET title='$title', description='$description', harga=$harga, image_path='$gambarPath' WHERE id=$id";
    } else {
        $query = "UPDATE books SET title='$title', description='$description', harga=$harga WHERE id=$id";
    }

    mysqli_query($koneksi, $query);

    header('Location: dashboardAdmin.php');
    exit();
}

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $query = "SELECT * FROM books WHERE id=$id";
    $result = mysqli_query($koneksi, $query);
    $book = mysqli_fetch_assoc($result);
} else {
    header('Location: dashboardAdmin.php');
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <link rel="stylesheet" href="styleEditDelete.css">
    <title>Edit Buku</title>
</head>
<body>
    <header>
        <h1>Edit Buku</h1>
    </header>
    <section id="edit-book-form">
        <form action="edit_book.php" method="post" enctype="multipart/form-data">
            <input type="hidden" name="id" value="<?php echo $book['id']; ?>">

            <label for="title">Judul Buku:</label>
            <input type="text" id="title" name="title" value="<?php echo $book['title']; ?>" required>

            <label for="description">Deskripsi Buku:</label>
            <textarea id="description" name="description" required><?php echo $book['description']; ?></textarea>

            <label for="gambar">Gambar Buku:</label>
            <input type="file" id="gambar" name="gambar" accept="image/*">

            <label for="harga">Harga Buku (Rp):</label>
            <input type="number" id="harga" name="harga" value="<?php echo $book['harga']; ?>" required>

            <button type="submit">Update Buku</button>
        </form>
    </section>
</body>
</html>

