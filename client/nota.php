<?php
error_reporting(1);
include "Client.php";
$id_transaksi = isset($_POST['id_transaksi']) ? $_POST['id_transaksi'] : null;
$data_transaksi = $abc->tampil_transaksi($id_transaksi);
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

    <!-- Start Nota Section -->
    <section class="bg-light py-5">
        <br>
        <div class="container mt-5">
            <div class="row justify-content-center">
                <div class="col-lg-8">
                    <div class="card shadow p-3 mb-5 bg-white rounded">
                        <div class="card-body">
                            <h3 class="card-title text-center mb-4">Nota Pembelian</h3>
                            <?php if ($id_transaksi): ?>
                                <p class="text-center">Detail Transaksi ID: <strong>
                                        <?= $id_transaksi ?>
                                    </strong></p>
                            <?php endif; ?>

                            <div class="table-responsive">
                                <table class="table">
                                    <thead>
                                        <tr>
                                            <th>Produk</th>
                                            <th>Brand</th>
                                            <th>Jumlah</th>
                                            <th>Waktu Transaksi</th>
                                            <th>Total</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php foreach ($data_transaksi as $transaksi): ?>
                                            <tr>
                                                <td>
                                                    <?php
                                                    $produk = $abc->tampil_produk($transaksi->id_produk);
                                                    if (is_object($produk)) {
                                                        echo $produk->nama_produk;
                                                    } else {
                                                        echo "Tidak Ada Produk";
                                                    }
                                                    ?>
                                                </td>
                                                <td>
                                                    <?php
                                                    $brand = $abc->tampil_brand($produk->id_brand);
                                                    if (is_object($brand)) {
                                                        echo $brand->nama_brand;
                                                    } else {
                                                        echo "Tidak Ada Brand";
                                                    }
                                                    ?>
                                                </td>
                                                <td>
                                                    <?= $transaksi->jumlah_transaksi ?>
                                                </td>
                                                <td>
                                                    <?= $transaksi->waktu_transaksi ?>
                                                </td>
                                                <td>Rp.
                                                    <?= number_format($transaksi->total_transaksi, 0, ',', '.') ?>,-
                                                </td>
                                            </tr>
                                        <?php endforeach ?>
                                    </tbody>
                                </table>
                            </div>
                            <p class="text-center mt-4">Terima kasih telah berbelanja di Clothing Store. Semoga Anda
                                puas dengan produk kami. Dan jangan Kapok untuk berbelanja terus di Clothing Store!</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- End Nota Section -->

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

    <script src="assets/js/jquery-1.11.0.min.js"></script>
    <script src="assets/js/jquery-migrate-1.2.1.min.js"></script>
    <script src="assets/js/bootstrap.bundle.min.js"></script>
    <script src="assets/js/templatemo.js"></script>
    <script src="assets/js/custom.js"></script>
</body>

</html>