<?php
session_start();

$koneksi = mysqli_connect("localhost", "root", "", "login");

if (mysqli_connect_errno()) {
    echo "Koneksi database gagal: " . mysqli_connect_error();
}

$bookId = isset($_GET['bookId']) ? $_GET['bookId'] : null;

if (!$bookId) {
    echo "Invalid book ID";
    exit();
}

$query = "SELECT * FROM books WHERE id = $bookId";
$result = mysqli_query($koneksi, $query);

if (mysqli_num_rows($result) == 0) {
    echo "Book not found";
    exit();
}

$row = mysqli_fetch_assoc($result);

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="styleDetail.css">
    <title>Detail Buku</title>
</head>

<body>
    <header>
        <h1>Toko Buku Online</h1>
    </header>
    <section id="product-detail">
        <article class="product" id="bookDetail">
            <img src="<?php echo $row['image_path']; ?>" alt="<?php echo $row['title']; ?>">
            <h2>
                <?php echo $row['title']; ?>
            </h2>
            <p>
                <?php echo $row['description']; ?>
            </p>
            <p class="price">Rp
                <?php echo number_format($row['harga'], 0, ',', '.'); ?>
            </p>
           <button onclick="handleBuy()">Beli</button>
        </article>
    </section>
    <script>
        function handleBuy() {
            var title = "<?php echo $row['title']; ?>";
            var price = "<?php echo number_format($row['harga'], 0, ',', '.'); ?>";
            var detailLink = "http://localhost/Semester5/PemrogramanWeb/LoginMySQL/dashboard.php<?php echo $row['id']; ?>";
            var message = "Saya ingin membeli buku: " + title + " dengan harga Rp " + price + ". Detail: " + detailLink;

            message = encodeURIComponent(message);

            var whatsappLink = 'https://wa.me/6287737775153?text=' + message;

            window.location.href = whatsappLink;
        }
    </script>
</body>

</html>
