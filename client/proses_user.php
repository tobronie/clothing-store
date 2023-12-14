<?php
include "Client.php";

if ($_POST['aksi'] == 'tambah') {
    $data = array(
        "id_user" => $_POST['id_user'],
        "nama_user" => $_POST['nama_user'],
        "nohp_user" => $_POST['nohp_user'],
        "email_user" => $_POST['email_user'],
        "alamat_user" => $_POST['alamat_user'],
        "password_user" => $_POST['password_user'],
        "aksi" => $_POST['aksi']
    );
    $abc->tambah_user($data);
    header('location: login.php');
    exit();
} else if ($_POST['aksi'] == 'ubah') {
    $data = array(
        "id_user" => $_POST['id_user'],
        "nama_user" => $_POST['nama_user'],
        "nohp_user" => $_POST['nohp_user'],
        "email_user" => $_POST['email_user'],
        "alamat_user" => $_POST['alamat_user'],
        "password_user" => $_POST['password_user'],
        "aksi" => $_POST['aksi']
    );
    $abc->ubah_user($data);
    header('location: user.php');
} else if ($_GET['aksi'] == 'hapus') {
    $data = array(
        "id_user" => $_GET['id_user'],
        "aksi" => $_GET['aksi']
    );
    $abc->hapus_user($data);
    header('location: user.php');
} else if ($_POST['aksi'] == 'login') {
    $email_user = $_POST['email_user'];
    $password_user = $_POST['password_user'];

    $login_result = $abc->login_user($email_user, $password_user);

    if ($login_result['status'] === 'success') {
        session_start();
        $_SESSION['id_user'] = $login_result['id_user'];
        header('location: index.php');
        exit();
    } else {
        header('location: login.php?error=Invalid email or password');
        exit();
    }
}

unset($abc, $data);
?>