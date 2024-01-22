<?php
session_start();

if (!isset($_SESSION['username'])) {
    header("location: login.php");
}

$username = $_SESSION['username'];
$koneksi = mysqli_connect("localhost", "root", "", "login");

if (mysqli_connect_errno()) {
    echo "Koneksi database gagal: " . mysqli_connect_error();
}

$query = "SELECT * FROM books";
$result = mysqli_query($koneksi, $query);
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Jual Beli Buku</title>
</head>

<body>
    <header>
        <h1>Toko Buku Online</h1>
    </header>
    <section id="products">
        <?php
        while ($row = mysqli_fetch_assoc($result)) {
            echo '<a href="detail.php?bookId=' . $row['id'] . '" class="detail.php">';
            echo '<article class="product">';
            echo '<img src="' . $row['image_path'] . '" alt="' . $row['title'] . '">';
            echo '<h2>' . $row['title'] . '</h2>';
            echo '<p class="price">Rp ' . number_format($row['harga'], 0, ',', '.') . '</p>';
            echo '<button onclick="handleBuy(\'' . $row['title'] . '\', \'' . $row['harga'] . '\')">Beli</button>';
            echo '</article>';
            echo '</a>';
        }
        ?>
    </section>
</body>

</html>