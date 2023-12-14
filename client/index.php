<?php
error_reporting(1);
include "Client.php";
$no = 1;

$data_produk = $abc->tampil_semua_produk();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <title>Cloting Store</title>
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

    <!-- Start Banner Hero -->
    <div id="template-mo-zay-hero-carousel" class="carousel slide" data-bs-ride="carousel">
        <br>
        <ol class="carousel-indicators">
            <li data-bs-target="#template-mo-zay-hero-carousel" data-bs-slide-to="0" class="active"></li>
            <li data-bs-target="#template-mo-zay-hero-carousel" data-bs-slide-to="1"></li>
            <li data-bs-target="#template-mo-zay-hero-carousel" data-bs-slide-to="2"></li>
        </ol>
        <div class="carousel-inner">
            <div class="carousel-item active">
                <div class="container">
                    <div class="row p-5">
                        <div class="mx-auto col-md-8 col-lg-6 order-lg-last">
                            <img class="img-fluid" src="./assets/img/01.jpg" alt="">
                        </div>
                        <div class="col-lg-6 mb-0 d-flex align-items-center">
                            <div class="text-align-left align-self-center">
                                <h1 class="h1 text-primary"><b>Cloting</b> Store</h1>
                                <h3 class="h2">Tempat Merubah Penampilan</h3>
                                <p>
                                    Rubahlah kebutuhan gayamu, karena style adalah yang nomer satu,<br>
                                    Dan kami menjamin akan gayamu pasti membuat orang disekelilingmu terpesona akan
                                    pakaian dan aksesoris yang kamu pakai.
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="carousel-item">
                <div class="container">
                    <div class="row p-5">
                        <div class="mx-auto col-md-8 col-lg-6 order-lg-last">
                            <img class="img-fluid" src="./assets/img/02.jpg" alt="">
                        </div>
                        <div class="col-lg-6 mb-0 d-flex align-items-center">
                            <div class="text-align-left align-self-center">
                                <h1 class="h1 text-primary"><b>Cloting</b> Store</h1>
                                <h3 class="h2">Tempat Segala Brand</h3>
                                <p>
                                    Kami memberikan akses mudah bagimu, dengan Brand-brand yang kamu sukai.
                                    Maka, jangan Lupa untuk menjadi langganan dikami.
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="carousel-item">
                <div class="container">
                    <div class="row p-5">
                        <div class="mx-auto col-md-8 col-lg-6 order-lg-last">
                            <img class="img-fluid" src="./assets/img/03.jpg" alt="">
                        </div>
                        <div class="col-lg-6 mb-0 d-flex align-items-center">
                            <div class="text-align-left align-self-center">
                                <h1 class="h1 text-primary"><b>Cloting</b> Store</h1>
                                <h3 class="h2">Tempat Menghabiskan Uang</h3>
                                <p>
                                    habiskan uangmu dengan memanjakan mata dan penampilan,<br>
                                    karena harta dunia tiada habisnya.
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <a class="carousel-control-prev text-decoration-none w-auto ps-3" href="#template-mo-zay-hero-carousel"
            role="button" data-bs-slide="prev">
            <i class="fas fa-chevron-left"></i>
        </a>
        <a class="carousel-control-next text-decoration-none w-auto pe-3" href="#template-mo-zay-hero-carousel"
            role="button" data-bs-slide="next">
            <i class="fas fa-chevron-right"></i>
        </a>
    </div>
    <!-- End Banner Hero -->

    <!-- Start Product Section -->
    <div class="container mt-5">
        <h2 class="text-center mb-4">Produk Untukmu</h2>
        <div class="row row-cols-1 row-cols-md-5 g-4">
            <?php foreach ($data_produk as $produk): ?>
                <div class="col">
                    <div class="card h-100" style="box-shadow: 0 4px 8px rgba(0, 0, 0, 0.5);">
                        <?php
                        $imageUrl = $produk->foto_produk;
                        $imageData = file_get_contents($imageUrl);
                        $base64Image = 'data:image/png;base64,' . base64_encode($imageData);
                        $productDetailUrl = "detail_produk.php?id_produk=" . $produk->id_produk;
                        ?>
                        <a href="<?= $productDetailUrl ?>">
                            <img src="<?= $base64Image ?>" alt="Image from URL" class="card-img-top img-fluid border"
                                style="width: 240px; height: 240px; object-fit: cover;">
                        </a>
                        <div class="card-body">
                            <div class="product-info mt-auto">
                                <h5 class="card-title">
                                    <?= $produk->nama_produk ?>
                                </h5>
                                <div class="card-text">
                                    <p class="mb-1" style="color: red; font-weight: bold;">
                                        Rp.
                                        <?= $produk->harga_produk ?>,-
                                    </p>
                                    <p class="mb-0">
                                        <span class="me-1 small">
                                            Brand:
                                        </span>
                                        <?php
                                        $brand = $abc->tampil_brand($produk->id_brand);
                                        if (is_object($brand)) {
                                            echo $brand->nama_brand;
                                        } else {
                                            echo "Tidak Ada Brand";
                                        }
                                        ?>
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            <?php endforeach ?>
        </div>
    </div>
    <br>
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
        function showProductDetail(id_produk) {
            console.log("Clicked on product with ID: " + id_produk);
            window.location.href = "detail_produk.php?id_produk=" + id_produk;
        }
    </script>
    <!-- End Script -->
</body>

</html>