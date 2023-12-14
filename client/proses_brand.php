<?php
include "Client.php";

if ($_POST['aksi'] == 'tambah') {
    $data = array(
        "id_brand" => $_POST['id_brand'],
        "nama_brand" => $_POST['nama_brand'],
        "asal_brand" => $_POST['asal_brand'],
        "logo_brand" => $_POST['logo_brand'],
        "aksi" => $_POST['aksi']
    );
    $abc->tambah_brand($data);
    header('location:brand.php');
} else if ($_POST['aksi'] == 'ubah') {
    $data = array(
        "id_brand" => $_POST['id_brand'],
        "nama_brand" => $_POST['nama_brand'],
        "asal_brand" => $_POST['asal_brand'],
        "logo_brand" => $_POST['logo_brand'],
        "aksi" => $_POST['aksi']
    );
    $abc->ubah_brand($data);
    header('location: brand.php');
} else if ($_GET['aksi'] == 'hapus') {
    $data = array(
        "id_brand" => $_GET['id_brand'],
        "aksi" => $_GET['aksi']
    );
    $abc->hapus_brand($data);
    header('location: brand.php');
}

unset($abc, $data);