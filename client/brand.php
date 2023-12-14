<?php
error_reporting(1);
include "Client.php";
$no = 1;

$data_brand = $abc->tampil_semua_brand();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <title>Clothing Store</title>
    <link href="https://cdn.jsdelivr.net/npm/simple-datatables@7.1.2/dist/style.min.css" rel="stylesheet" />
    <link rel="stylesheet" href="css/styles.css">
    <script src="https://use.fontawesome.com/releases/v6.3.0/js/all.js" crossorigin="anonymous"></script>
</head>

<body>
    <!-- =============== Navigation ================ -->
    <div class="container">
        <div class="navigation">
            <ul>
                <li>
                    <a href="index.php">
                        <span class="icon">
                            <ion-icon name="logo-flickr"></ion-icon>
                        </span>
                        <span class="title">Clothing Store</span>
                    </a>
                </li>

                <li>
                    <a href="karyawan.php">
                        <span class="icon">
                            <ion-icon name="person-outline"></ion-icon>
                        </span>
                        <span class="title">Karyawan</span>
                    </a>
                </li>
                <li>
                    <a href="user.php">
                        <span class="icon">
                            <ion-icon name="person-outline"></ion-icon>
                        </span>
                        <span class="title">User</span>
                    </a>
                </li>

                <li>
                    <a href="produk.php">
                        <span class="icon">
                            <ion-icon name="shirt-outline"></ion-icon>
                        </span>
                        <span class="title">Produk</span>
                    </a>
                </li>

                <li>
                    <a href="brand.php">
                        <span class="icon">
                            <ion-icon name="diamond-outline"></ion-icon>
                        </span>
                        <span class="title">Brand</span>
                    </a>
                </li>

                <li>
                    <a href="transaksi.php">
                        <span class="icon">
                            <ion-icon name="create-outline"></ion-icon>
                        </span>
                        <span class="title">Transaksi</span>
                    </a>
                </li>
                <li>
                    <a href="login.php">
                        <span class="icon">
                            <ion-icon name="exit-outline"></ion-icon>
                        </span>
                        <span class="title">Logout</span>
                    </a>
                </li>
            </ul>
        </div>

        <!-- ========================= Main ==================== -->
        <div id="layoutSidenav_content">
            <div class="main">
                <div class="topbar">
                    <div class="toggle">
                        <ion-icon name="menu-outline"></ion-icon>
                    </div>
                    <div class="header-content">
                        <h3 class="mt-1">Brand</h1>
                    </div>
                </div>
                <hr>
                <div class="container-fluid px-4">
                    <div class="card mb-4">
                        <div class="card-header">
                            <button type="button" class="btn btn-primary" data-bs-toggle="modal"
                                data-bs-target="#exampleModal">Tambah Brand</button>
                        </div>
                        <div class="card-body">
                            <table id="datatablesSimple">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>ID Brand</th>
                                        <th>Nama Brand</th>
                                        <th>Asal Brand</th>
                                        <th>Logo Brand</th>
                                        <th>Aksi</th>
                                    </tr>
                                </thead>
                                <tfoot>
                                    <tr>
                                        <th>No</th>
                                        <th>ID Brand</th>
                                        <th>Nama Brand</th>
                                        <th>Asal Brand</th>
                                        <th>Logo Brand</th>
                                        <th>Aksi</th>
                                    </tr>
                                </tfoot>
                                <tbody>
                                    <?php
                                    foreach ($data_brand as $brand):
                                        ?>
                                        <tr>
                                            <td>
                                                <?= $no++ ?>
                                            </td>
                                            <td>
                                                <?= $brand->id_brand ?>
                                            </td>
                                            <td>
                                                <?= $brand->nama_brand ?>
                                            </td>
                                            <td>
                                                <?= $brand->asal_brand ?>
                                            </td>
                                            <td>
                                                <?php
                                                $imageUrl = $brand->logo_brand;
                                                // https://drive.google.com/uc?export=view&id= ....[id image dari gDrive] ...
                                                $imageData = file_get_contents($imageUrl);
                                                $base64Image = 'data:image/png;base64,' . base64_encode($imageData);
                                                echo "<img src='$base64Image' alt='Image from URL' style='height: 100px; width: auto;'>";
                                                ?>
                                            </td>
                                            <td>
                                                <button type="button" class="btn btn-warning" data-bs-toggle="modal"
                                                    data-bs-target="#confirmEdit<?= $brand->id_brand ?>">
                                                    Ubah
                                                </button>
                                                <!-- Modal Edit -->
                                                <div class="modal fade" id="confirmEdit<?= $brand->id_brand ?>"
                                                    tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                    <div class="modal-dialog custom-modal">
                                                        <div class="modal-content">
                                                            <div class="modal-header">
                                                                <h5 class="modal-title" id="exampleModalLabel">Edit Data
                                                                    Brand</h5>
                                                                <button type="button" class="btn-close"
                                                                    data-bs-dismiss="modal" aria-label="Close"></button>
                                                            </div>
                                                            <div class="modal-body">
                                                                <!-- Formulir untuk Mengubah Data Brand -->
                                                                <form class="brand" action="proses_brand.php" method="post"
                                                                    enctype="multipart/form-data">
                                                                    <input type="hidden" class="form-control"
                                                                        name="id_brand" value="<?= $brand->id_brand ?>">
                                                                    <input type="hidden" name="aksi" value="ubah" />
                                                                    <div class="mb-3">
                                                                        <label for="nama_brand" class="form-label">Nama
                                                                            Brand</label>
                                                                        <input type="text" class="form-control"
                                                                            name="nama_brand"
                                                                            value="<?= $brand->nama_brand ?>" required>
                                                                    </div>
                                                                    <div class="mb-3">
                                                                        <label for="asal_brand" class="form-label">Asal
                                                                            Brand</label>
                                                                        <textarea type="text" class="form-control"
                                                                            name="asal_brand"
                                                                            required><?= $brand->asal_brand ?></textarea>
                                                                    </div>
                                                                    <div class="mb-3">
                                                                        <label for="logo_brand" class="form-label">URL Logo
                                                                            Brand</label>
                                                                        <input type="text" class="form-control"
                                                                            name="logo_brand"
                                                                            value="<?= $brand->logo_brand ?>" required>
                                                                    </div>
                                                                    <button type="submit" class="btn btn-success">Save
                                                                        changes</button>
                                                                </form>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <button type="button" class="btn btn-danger" data-bs-toggle="modal"
                                                    data-bs-target="#confirmDelete<?= $brand->id_brand ?>">
                                                    Hapus
                                                </button>
                                                <!-- Modal Hapus -->
                                                <div class="modal fade" id="confirmDelete<?= $brand->id_brand ?>"
                                                    tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                    <div class="modal-dialog">
                                                        <div class="modal-content">
                                                            <div class="modal-header">
                                                                <h5 class="modal-title" id="exampleModalLabel">Data Brand
                                                                </h5>
                                                            </div>
                                                            <div class="modal-body">
                                                                Apakah Anda ingin menghapus data ini?
                                                            </div>
                                                            <div class="modal-footer">
                                                                <button type="button" class="btn btn-secondary"
                                                                    data-bs-dismiss="modal">Batal</button>
                                                                <a href="proses_brand.php?aksi=hapus&id_brand=<?= $brand->id_brand ?>"
                                                                    class="btn btn-danger">Hapus</a>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </td>
                                        </tr>
                                    <?php endforeach ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                <!-- Modal Tambah -->
                <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel"
                    aria-hidden="true">
                    <div class="modal-dialog custom-modal">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">Tambah Data Brand</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                    aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                <input type="hidden" name="aksi" value="tambah" />
                                <form class="brand" action="proses_brand.php" method="post">
                                    <input type="hidden" name="aksi" value="tambah" />
                                    <div class="mb-3">
                                        <label for="id_brand" class="form-label">ID Brand</label>
                                        <input type="text" class="form-control" name="id_brand"
                                            placeholder="Masukkan ID Brand" required>
                                    </div>
                                    <div class="mb-3">
                                        <label for="nama_brand" class="form-label">Nama Brand</label>
                                        <input type="text" class="form-control" name="nama_brand"
                                            placeholder="Masukkan Nama Barang" required>
                                    </div>
                                    <div class="mb-3">
                                        <label for="asal_brand" class="form-label">Asal Brand</label>
                                        <textarea type="text" class="form-control" placeholder="Masukkan Asal Brand"
                                            row="5" name="asal_brand" required></textarea>
                                    </div>
                                    <div class="mb-3">
                                        <label for="logo_brand" class="form-label">URL Logo Brand</label>
                                        <input type="text" class="form-control" name="logo_brand"
                                            placeholder="Masukkan URL Logo Brand" required>
                                    </div>
                                    <button type="submit" class="btn btn-success">Save changes</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="assets/js/main.js"></script>
    <script src="assets/js/scripts.js"></script>
    <script src="assets/js/datatables-simple-demo.js"></script>
    <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"
        crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.min.js" crossorigin="anonymous"></script>
    <script src="assets/demo/chart-area-demo.js"></script>
    <script src="assets/demo/chart-bar-demo.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/simple-datatables@7.1.2/dist/umd/simple-datatables.min.js"
        crossorigin="anonymous"></script>
</body>

</html>