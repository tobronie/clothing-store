<?php
error_reporting(1);
include "Client.php";
$no = 1;

$data_karyawan = $abc->tampil_semua_karyawan();
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
                        <h3 class="mt-1">Karyawan</h1>
                    </div>
                </div>
                <hr>
                <div class="container-fluid px-4">
                    <div class="card mb-4">
                        <div class="card-header">
                            <button type="button" class="btn btn-primary" data-bs-toggle="modal"
                                data-bs-target="#exampleModal">Tambah Data Karyawan</button>
                        </div>
                        <div class="card-body">
                            <table id="datatablesSimple">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>ID Karywan</th>
                                        <th>Nama Karywan</th>
                                        <th>No Handphone</th>
                                        <th>Email</th>
                                        <th>Alamat</th>
                                        <th>Password</th>
                                    </tr>
                                </thead>
                                <tfoot>
                                    <tr>
                                        <th>No</th>
                                        <th>ID Karywan</th>
                                        <th>Nama Karywan</th>
                                        <th>No Handphone</th>
                                        <th>Email</th>
                                        <th>Alamat</th>
                                        <th>Password</th>
                                    </tr>
                                </tfoot>
                                <tbody>
                                    <?php foreach ($data_karyawan as $karyawan): ?>
                                        <tr>
                                            <td>
                                                <?= $no++ ?>
                                            </td>
                                            <td>
                                                <?= $karyawan->id_karyawan ?>
                                            </td>
                                            <td>
                                                <?= $karyawan->nama_karyawan ?>
                                            </td>
                                            <td>
                                                <?= $karyawan->nohp_karyawan ?>
                                            </td>
                                            <td>
                                                <?= $karyawan->email_karyawan ?>
                                            </td>
                                            <td>
                                                <?= $karyawan->alamat_karyawan ?>
                                            </td>
                                            <td>
                                                <?= $karyawan->password_karyawan ?>
                                            </td>
                                        </tr>
                                    <?php endforeach ?>
                                </tbody>

                            </table>
                        </div>
                    </div>
                </div>
                <!-- Modal -->
                <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel"
                    aria-hidden="true">
                    <div class="modal-dialog custom-modal">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">Tambah Data Karyawan</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                    aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                <input type="hidden" name="aksi" value="tambah" />
                                <form class="karyawan" action="proses_karyawan.php" method="post">
                                    <input type="hidden" name="aksi" value="tambah" />
                                    <div class="mb-3">
                                        <label for="id_karyawan" class="form-label">ID Karyawan</label>
                                        <input type="text" class="form-control" name="id_karyawan"
                                            placeholder="Masukkan ID Karyawan" required>
                                    </div>
                                    <div class="mb-3">
                                        <label for="name_karyawan" class="form-label">Nama Karyawan</label>
                                        <input type="text" class="form-control" name="nama_karyawan"
                                            placeholder="Masukkan Nama Karyawan" required>
                                    </div>
                                    <div class="mb-3">
                                        <label for="nohp_karyawan" class="form-label">No Handphone Karyawan</label>
                                        <input type="number" class="form-control" name="nohp_karyawan"
                                            placeholder="Masukkan No Handphone Karyawan" required>
                                    </div>
                                    <div class="mb-3">
                                        <label for="email_karyawan" class="form-label">Email Karyawan</label>
                                        <input type="email" class="form-control" name="email_karyawan"
                                            placeholder="Masukkan Email Karyawan" required>
                                    </div>
                                    <div class="mb-3">
                                        <label for="alamat_karyawan" class="form-label">Alamat Karyawan</label>
                                        <textarea type="text" class="form-control" placeholder="Masukkan Alamat Karyawan" row="4" name="alamat_karyawan" required></textarea>
                                    </div>
                                    <div class="mb-3">
                                        <label for="password_karyawan" class="form-label">Password Karyawan</label>
                                        <input type="text" class="form-control" name="password_karyawan"
                                            placeholder="Masukkan Password Karyawan" required>
                                    </div>
                                    <button type="submit" class="btn btn-success">Save
                                        changes</button>
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