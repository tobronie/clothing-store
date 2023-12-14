<?php
error_reporting(1);
include "Client.php";
$no = 1;
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <title>Register</title>
    <link href="css/styles.css" rel="stylesheet" />
    <script src="https://use.fontawesome.com/releases/v6.3.0/js/all.js" crossorigin="anonymous"></script>
</head>

<body class="bg-primary">
    <div id="layoutAuthentication">
        <div id="layoutAuthentication_content">
            <main>
                <div class="container mx-auto">
                    <div class="row justify-content-center">
                        <div class="col-lg-5">
                            <div class="card shadow-lg border-0 rounded-lg mt-5">
                                <div class="card-header">
                                    <h3 class="text-center font-weight-light my-4">Register</h3>
                                </div>
                                <div class="card-body">
                                    <input type="hidden" name="aksi" value="tambah" />
                                    <form class="user" action="proses_user.php" method="post">
                                        <input type="hidden" name="aksi" value="tambah" />
                                        <div class="row mb-3">
                                            <div class="col">
                                                <div class="form-floating">
                                                    <input name="id_user" class="form-control" type="text" required />
                                                    <label for="id_user">ID User</label>
                                                </div>
                                            </div>
                                            <div class="col">
                                                <div class="form-floating">
                                                    <input name="nama_user" class="form-control" type="text" required />
                                                    <label for="nama_user">Nama Lengkap</label>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row mb-3">
                                            <div class="col">
                                                <div class="form-floating">
                                                    <input name="nohp_user" class="form-control" type="number"
                                                        required />
                                                    <label for="nohp_user">No Handphone</label>
                                                </div>
                                            </div>
                                            <div class="col">
                                                <div class="form-floating">
                                                    <input name="email_user" class="form-control" type="email"
                                                        required />
                                                    <label for="email_user">Email Address</label>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row mb-3">
                                            <div class="col">
                                                <div class="form-floating">
                                                    <input name="alamat_user" class="form-control" type="text"
                                                        required />
                                                    <label for="alamat_user">Alamat</label>
                                                </div>
                                            </div>
                                            <div class="col">
                                                <div class="form-floating">
                                                    <input name="password_user" class="form-control" type="password"
                                                        required />
                                                    <label for="password_user">Password</label>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="d-flex align-items-center justify-content-between mt-4 mb-0">
                                            <button class="btn btn-success" type="submit">Kirim Data</button>
                                        </div>
                                    </form>
                                    <div class="card-footer d-flex align-items-center justify-content-end mt-4 mb-0">
                                        <a class="btn btn-danger ml-auto mr-2" href="login.php">Kembali</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </main>
        </div>
        <div id="layoutAuthentication_footer">
            <footer class="py-4 bg-light mt-auto">
                <div class="container-fluid px-4">
                    <div class="d-flex align-items-center justify-content-between small">
                        <div class="text-muted"><i>UAS - Praktikum Sistem Terdistribusi dan Keamanan</i></div>
                    </div>
                </div>
            </footer>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"
        crossorigin="anonymous"></script>
    <script src="js/scripts.js"></script>
</body>

</html>