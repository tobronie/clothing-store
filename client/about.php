<?php
error_reporting(1);
include "Client.php";
$no = 1;

$data_brand = $abc->tampil_semua_brand();
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
    <section class="bg-primary py-5">
        <br>
        <div class="container">
            <div class="row align-items-center py-5">
                <div class="col-md-8 text-white">
                    <h1>About Us</h1>
                    <p>
                        "Cloting Store" adalah toko pakaian yang menawarkan beragam produk fashion,
                        termasuk pakaian dan aksesoris, dari brand lokal maupun internasional.
                        Kami berkomitmen untuk menyediakan pengalaman berbelanja yang memuaskan
                        dengan koleksi pakaian yang trendy dan nyaman. Dengan fokus pada kualitas dan keberagaman,
                        kami mendukung industri fashion lokal dan menyediakan opsi gaya global. Tim "Cloting Store"
                        berusaha memberikan layanan terbaik dengan stok terkini, membantu setiap pelanggan
                        mengekspresikan
                        gaya unik mereka melalui pilihan produk yang sesuai dengan kepribadian dan preferensi.
                        Selamat berbelanja di "Cloting Store"!
                    </p>
                </div>
                <div class="col-md-4">
                    <img src="assets/img/about.gif" alt="About Hero">
                </div>
            </div>
        </div>
    </section>
    <!-- End Banner Hero -->

    <!-- Start Brands -->
    <section class="bg-light py-5">
        <div class="container my-4">
            <div class="row text-center py-3">
                <div class="col-lg-6 m-auto">
                    <h1 class="h1">Brand/s</h1>
                    <p>
                        Macam-macam Brand yang kami sediakan untuk anda
                    </p>
                </div>
                <div class="col-lg-9 m-auto tempaltemo-carousel">
                    <div class="row d-flex flex-row">
                        <!--Controls-->
                        <div class="col-1 align-self-center">
                            <a class="h1" href="#templatemo-slide-brand" role="button" data-bs-slide="prev">
                                <i class="text-light fas fa-chevron-left"></i>
                            </a>
                        </div>
                        <!--End Controls-->

                        <!--Carousel Wrapper-->
                        <div class="col">
                            <div class="carousel slide carousel-multi-item pt-2 pt-md-0" id="templatemo-slide-brand"
                                data-bs-ride="carousel">
                                <!--Slides-->
                                <div class="carousel-inner product-links-wap" role="listbox">
                                    <?php
                                    $totalBrands = count($data_brand);
                                    $itemsPerSlide = 4;
                                    $slideCount = ceil($totalBrands / $itemsPerSlide);

                                    for ($slide = 0; $slide < $slideCount; $slide++) {
                                        $start = $slide * $itemsPerSlide;
                                        $end = min(($slide + 1) * $itemsPerSlide, $totalBrands);
                                        ?>
                                        <div class="carousel-item <?php echo $slide === 0 ? 'active' : ''; ?>">
                                            <div class="row">
                                                <?php for ($i = $start; $i < $end; $i++): ?>
                                                    <div class="col-3 p-md-7">
                                                        <?php
                                                        $brand = $data_brand[$i];
                                                        $imageUrl = $brand->logo_brand;
                                                        $imageData = file_get_contents($imageUrl);
                                                        $base64Image = 'data:image/png;base64,' . base64_encode($imageData);
                                                        echo "<img src='$base64Image' alt='Image from URL' class='img-fluid brand-img' style='object-fit: cover;' alt='Brand Logo'>";
                                                        ?>
                                                    </div>
                                                <?php endfor; ?>
                                            </div>
                                        </div>
                                    <?php } ?>
                                </div>
                                <!--End Slides-->
                            </div>
                        </div>
                        <!--End Carousel Wrapper-->

                        <!--Controls-->
                        <div class="col-1 align-self-center">
                            <a class="h1" href="#templatemo-slide-brand" role="button" data-bs-slide="next">
                                <i class="text-light fas fa-chevron-right"></i>
                            </a>
                        </div>
                        <!--End Controls-->
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--End Brands-->

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
    <!-- End Script -->
</body>

</html>