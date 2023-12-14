<?php
if (isset($_POST['email_user']) && isset($_POST['password_user'])) {
    $email = $_POST['email_user'];
    $psw = $_POST['password_user'];

    $sql = "SELECT * FROM pengguna WHERE email_user='$email' AND password_user='$psw'";
    $query = $koneksi->query($sql);

    if ($query->num_rows == 1) {
        $data = $query->fetch_array();
        $_SESSION['email_user'] = $data['email_user'];
            header("location: index.php");
    } else {
        echo '<script>alert("Email atau password salah");</script>';
        echo '<script>window.location.href = "javascript:history.back()";</script>';
        exit;
    }
}
?>