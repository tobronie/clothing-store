<?php
error_reporting(1);
include "Client.php";
$no = 1;

$data_user = $abc->tampil_semua_user();
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
                        <h3 class="mt-1">User</h1>
                    </div>
                </div>
                <hr>
                <div class="container-fluid px-4">
                    <div class="card mb-4">
                        <div class="card-body">
                            <table id="datatablesSimple">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>ID User</th>
                                        <th>Nama User</th>
                                        <th>No Handphone</th>
                                        <th>Email</th>
                                        <th>Alamat</th>
                                        <th>Password</th>
                                        <th>Aksi</th>
                                    </tr>
                                </thead>
                                <tfoot>
                                    <tr>
                                        <th>No</th>
                                        <th>ID User</th>
                                        <th>Nama User</th>
                                        <th>No Handphone</th>
                                        <th>Email</th>
                                        <th>Alamat</th>
                                        <th>Password</th>
                                        <th>Aksi</th>
                                    </tr>
                                </tfoot>
                                <tbody>
                                    <?php
                                    foreach ($data_user as $user):
                                        ?>
                                        <tr>
                                            <td>
                                                <?= $no++ ?>
                                            </td>
                                            <td>
                                                <?= $user->id_user ?>
                                            </td>
                                            <td>
                                                <?= $user->nama_user ?>
                                            </td>
                                            <td>
                                                <?= $user->nohp_user ?>
                                            </td>
                                            <td>
                                                <?= $user->email_user ?>
                                            </td>
                                            <td>
                                                <?= $user->alamat_user ?>
                                            </td>
                                            <td>
                                                <?= $user->password_user ?>
                                            </td>
                                            <td>
                                                <button type="button" class="btn btn-danger" data-bs-toggle="modal"
                                                    data-bs-target="#confirmDelete<?= $user->id_user ?>">
                                                    Hapus
                                                </button>
                                                <!-- Modal -->
                                                <div class="modal fade" id="confirmDelete<?= $user->id_user ?>"
                                                    tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                    <div class="modal-dialog">
                                                        <div class="modal-content">
                                                            <div class="modal-header">
                                                                <h5 class="modal-title" id="exampleModalLabel">Data User
                                                                </h5>
                                                            </div>
                                                            <div class="modal-body">
                                                                Apakah Anda ingin menghapus data ini?
                                                            </div>
                                                            <div class="modal-footer">
                                                                <button type="button" class="btn btn-secondary"
                                                                    data-bs-dismiss="modal">Batal</button>
                                                                <a href="proses_user.php?aksi=hapus&id_user=<?= $user->id_user ?>"
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