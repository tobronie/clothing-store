<?php
include "Client.php";

if ($_POST['aksi'] == 'tambah') {
    $data = array(
        "id_karyawan" => $_POST['id_karyawan'],
        "nama_karyawan" => $_POST['nama_karyawan'],
        "nohp_karyawan" => $_POST['nohp_karyawan'],
        "email_karyawan" => $_POST['email_karyawan'],
        "alamat_karyawan" => $_POST['alamat_karyawan'],
        "password_karyawan" => $_POST['password_karyawan'],
        "aksi" => $_POST['aksi']
    );
    $abc->tambah_karyawan($data);
    header('location:karyawan.php');
} else if ($_POST['aksi'] == 'ubah') {
    $data = array(
        "id_karyawan" => $_POST['id_karyawan'],
        "nama_karyawan" => $_POST['nama_karyawan'],
        "nohp_karyawan" => $_POST['nohp_karyawan'],
        "email_karyawan" => $_POST['email_karyawan'],
        "alamat_karyawan" => $_POST['alamat_karyawan'],
        "password_karyawan" => $_POST['password_karyawan'],
        "aksi" => $_POST['aksi']
    );
    $abc->ubah_karyawan($data);
    header('location: karyawan.php');
} else if ($_GET['aksi'] == 'hapus') {
    $data = array(
        "id_karyawan" => $_GET['id_karyawan'],
        "aksi" => $_GET['aksi']
    );
    $abc->hapus_karyawan($data);
    header('location: karyawan.php');
} else if ($_POST['aksi'] == 'login') {
    $email_karyawan = $_POST['email_karyawan'];
    $password_karyawan = $_POST['password_karyawan'];

    $login_result = $abc->login_karyawan($email_karyawan, $password_karyawan);

    if ($login_result['status'] === 'success') {
        session_start();
        $_SESSION['id_karyawan'] = $login_result['id_karyawan'];
        header('location: produk.php');
        exit();
    } else {
        header('location: login.php?error=Invalid email or password');
        exit();
    }
}

unset($abc, $data);