<?php
session_start();
include "Client.php";

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $loginType = $_POST['loginType'];

    if ($loginType === "user") {
        $email_user = $_POST['email_user'];
        $password_user = $_POST['password_user'];
        $login_result = $abc->login_user($email_user, $password_user);
        if ($login_result['status'] === 'success') {
            $_SESSION['id_user'] = $login_result['id_user'];
            header('location: index.php');
            exit();
        } else {
            header('location: login.php?error=Invalid email or password');
            exit();
        }
    } elseif ($loginType === "karyawan") {
        $email_karyawan = $_POST['email_karyawan'];
        $password_karyawan = $_POST['password_karyawan'];
        $login_result = $abc->login_karyawan($email_karyawan, $password_karyawan);
        if ($login_result['status'] === 'success') {
            $_SESSION['id_karyawan'] = $login_result['id_karyawan'];
            header('location: produk.php');
            exit();
        } else {
            header('location: login.php?error=Invalid email or password');
            exit();
        }
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <title>Login</title>
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
                                    <h3 class="text-center font-weight-light my-4">Login</h3>
                                    <select id="loginType" class="form-select" onchange="toggleLoginType()"
                                        name="loginType">
                                        <option value="user">Login sebagai User</option>
                                        <option value="karyawan">Login sebagai Karyawan</option>
                                    </select>
                                </div>
                                <!-- Formulir Login User -->
                                <div class="card-body user">
                                    <form class="user" action="login.php" method="POST">
                                        <input type="hidden" name="aksi" value="login">
                                        <input type="hidden" name="loginType" value="user">
                                        <div class="form-floating mb-3">
                                            <input required name="email_user" class="form-control" type="email">
                                            <label for="email_user">Email User</label>
                                        </div>
                                        <div class="form-floating mb-3">
                                            <input name="password_user" class="form-control" type="password" required>
                                            <label for="password_user">Password User</label>
                                        </div>
                                        <div class="d-flex align-items-center justify-content-between mt-4 mb-0">
                                            <button class="btn btn-primary" type="submit" name="login">Login</button>
                                        </div>
                                    </form>
                                    <div class="card-footer d-flex align-items-center justify-content-end mt-4 mb-0">
                                        <a class="btn btn-secondary ml-auto mr-2" href="register.php">Register</a>
                                    </div>
                                </div>
                                <!-- Formulir Login Karyawan -->
                                <div class="card-body karyawan" style="display: none;">
                                <form class="karyawan" action="login.php" method="POST">
                                        <input type="hidden" name="aksi" value="login">
                                        <input type="hidden" name="loginType" value="karyawan">
                                        <div class="form-floating mb-3">
                                            <input required name="email_karyawan" class="form-control" type="email"
                                                required>
                                            <label for="email_karyawan">Email Karyawan</label>
                                        </div>
                                        <div class="form-floating mb-3">
                                            <input name="password_karyawan" class="form-control" type="password"
                                                required>
                                            <label for="password_karyawan">Password Karyawan</label>
                                        </div>
                                        <div class="d-flex align-items-center justify-content-between mt-4 mb-0">
                                            <button class="btn btn-primary" type="submit" name="login">Login</button>
                                        </div>
                                    </form>
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
    <script>
        function toggleLoginType() {
            var loginType = document.getElementById("loginType").value;
            var userLoginForm = document.querySelector(".user");
            var karyawanLoginForm = document.querySelector(".karyawan");

            if (loginType === "user") {
                userLoginForm.style.display = "block";
                karyawanLoginForm.style.display = "none";
            } else if (loginType === "karyawan") {
                userLoginForm.style.display = "none";
                karyawanLoginForm.style.display = "block";
            }
        }
    </script>
</body>

</html>