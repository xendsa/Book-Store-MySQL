<?php
session_start();

if (!isset($_SESSION['username'])) {
    header("location: login.php");
}

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
    <link rel="stylesheet" href="styleDashboardAdmin.css">
    <title>Admin Dashboard</title>
</head>

<body>
    <header>
        <h1>Admin Dashboard</h1>
        <nav>
            <ul>
                <li><a href="add_book.php">Tambahkan Buku</a></li>
            </ul>
        </nav>
    </header>
    <section id="book-list">
        <?php
        while ($row = mysqli_fetch_assoc($result)) {
            echo '<article class="book">';
            echo '<img src="' . $row['image_path'] . '" alt="' . $row['title'] . '">';
            echo '<h2>' . $row['title'] . '</h2>';
            echo '<p class="price">Rp ' . number_format($row['harga'], 0, ',', '.') . '</p>';
            echo '<div class="button-container">';
            echo '<a href="editBook.php?id=' . $row['id'] . '" class="edit-button">Edit</a>';
            echo '<a href="delete_book.php?id=' . $row['id'] . '" onclick="return confirm(\'Are you sure?\')" class="delete-button">Delete</a>';
            echo '</div>';
            echo '</article>';
        }
        ?>
    </section>

</body>

</html>
