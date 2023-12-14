<?php
error_reporting(1);
include "Client.php";
session_start();

$id_produk = isset($_GET['id_produk']) ? $_GET['id_produk'] : null;
$id_user = isset($_SESSION['id_user']) ? $_SESSION['id_user'] : null;

if (!$id_produk || !$id_user) {
    header("Location: index.php");
    exit();
}

$produk = $abc->tampil_produk($id_produk);
$data_user = $abc->tampil_user($id_user);
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <title>Clothing Store</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link rel="apple-touch-icon" href="assets/img/apple-icon.png">
    <link rel="shortcut icon" type="image/x-icon" href="assets/img/favicon.ico">

    <link rel="stylesheet" href="assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="assets/css/templatemo.css">
    <link rel="stylesheet" href="assets/css/custom.css">

    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css2?family=Roboto:wght@100;200;300;400;500;700;900&display=swap">
    <link rel="stylesheet" href="assets/css/fontawesome.min.css">
</head>

<body>
    <!-- Header -->
    <nav class="navbar navbar-expand-lg navbar-light bg-light shadow fixed-top">
        <div class="container d-flex justify-content-between align-items-center">
            <a class="navbar-brand text-primary logo h1 align-self-center" href="index.php">
                C/S
            </a>
            <button class="navbar-toggler border-0" type="button" data-bs-toggle="collapse"
                data-bs-target="#templatemo_main_nav" aria-controls="templatemo_main_nav" aria-expanded="false"
                aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="align-self-center collapse d-lg-flex justify-content-lg-end" id="templatemo_main_nav">
                <div class="flex-fill">
                    <ul class="nav navbar-nav d-flex ms-auto">
                        <li class="nav-item ms-3">
                            <a class="nav-link" href="index.php">Home</a>
                        </li>
                        <li class="nav-item ms-3">
                            <a class="nav-link" href="about.php">About</a>
                        </li>
                        <li class="nav-item ms-3">
                            <a class="nav-link ms-3" href="login.php">Logout</a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </nav>
    <!-- Close Header -->

    <!-- Start Product Section -->
    <section class="bg-light py-5">
        <br>
        <br>
        <div class="container mt-5" id="detailContainer">
            <div class="row">
                <div class="col-lg-6" id="detailImageContainer">
                    <?php
                    $imageUrl = $produk->foto_produk;
                    $imageData = file_get_contents($imageUrl);
                    $base64Image = 'data:image/png;base64,' . base64_encode($imageData);
                    echo "<img src='$base64Image' alt='Image from URL' class='card-img-top img-fluid border' style='width: 500px; height: 500px; object-fit: cover;'>";
                    ?>
                </div>
                <div class="col-lg-6">
                    <div class="product-details" id="detailInfoContainer">
                        <h2 class="mb-4">
                            <?= $produk->nama_produk ?>
                        </h2>
                        <h5 class="mb-4" style="color: red;">Rp.
                            <?= $produk->harga_produk ?> ,-
                        </h5>
                        <p class="text-muted">Kategori :
                            <?= $produk->kategori_produk ?>
                        </p>
                        <p class="text-muted">Brand :
                            <?php
                            $brand = $abc->tampil_brand($produk->id_brand);
                            if (is_object($brand)) {
                                echo $brand->nama_brand;
                            } else {
                                echo "Tidak Ada Brand";
                            }
                            ?>
                        </p>
                        <hr>
                        <h5>Deskripsi:</h5>
                        <p>
                            <?= $produk->deskripsi_produk ?>
                        </p>
                        <hr>
                        <form method="post" action="proses_transaksi.php" id="transactionForm">
                            <input type="hidden" name="id_transaksi" value="<?php echo $id_transaksi; ?>">
                            <input type="hidden" name="id_produk" value="<?php echo $id_produk; ?>">
                            <input type="hidden" name="id_user" value="<?php echo $id_user; ?>">
                            <input type="hidden" name="aksi" value="tambah">
                            <input type="hidden" name="jumlah_transaksi" id="jumlah_transaksi" value="1">
                            <input type="hidden" name="waktu_transaksi" id="waktu_transaksi" value="">
                            <input type="hidden" name="total_transaksi" id="total_transaksi" value="">
                            <div class="d-flex">
                                <div class="me-3">
                                    <label for="jumlah_transaksi">Jumlah :</label>
                                    <input type="number" class="form-control" name="jumlah_transaksi"
                                        id="input_jumlah_transaksi" value="1">
                                </div>
                                <button type="submit" class="btn btn-primary">Beli Sekarang</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- End Product Section -->

    <!-- Start Footer -->
    <footer class="bg-dark" id="tempaltemo_footer">
        <div class="w-100 bg-black py-3">
            <div class="container">
                <div class="row pt-2">
                    <div class="col-12">
                        <p class="text-left text-light">
                            UAS - Praktikum Sistem Terdistribusi dan Keamanan
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </footer>
    <!-- End Footer -->

    <!-- Start Script -->
    <script src="assets/js/jquery-1.11.0.min.js"></script>
    <script src="assets/js/jquery-migrate-1.2.1.min.js"></script>
    <script src="assets/js/bootstrap.bundle.min.js"></script>
    <script src="assets/js/templatemo.js"></script>
    <script src="assets/js/custom.js"></script>
    <script>
        function submitForm() {
            var id_transaksi = <?php echo $id_transaksi; ?>;
            document.getElementById('id_transaksi').value = id_transaksi;
            var jumlah_transaksi = document.getElementById('input_jumlah_transaksi').value;
            var harga_produk = <?php echo $produk->harga_produk; ?>;
            var total_transaksi = jumlah_transaksi * harga_produk;
            document.getElementById('jumlah_transaksi').value = jumlah_transaksi;
            document.getElementById('total_transaksi').value = total_transaksi;
            var now = new Date();
            var formattedDateTime = now.toISOString().slice(0, 19).replace("T", " ");
            document.getElementById('waktu_transaksi').value = formattedDateTime;
            document.getElementById('transactionForm').submit();
        }
    </script>
    <!-- End Script -->
</body>

</html>