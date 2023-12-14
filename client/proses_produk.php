<?php
include "Client.php";

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    if ($_POST['aksi'] == 'tambah') {
        $data = array(
            "id_produk" => $_POST['id_produk'],
            "id_brand" => $_POST['id_brand'],
            "nama_produk" => $_POST['nama_produk'],
            "kategori_produk" => $_POST['kategori_produk'],
            "harga_produk" => $_POST['harga_produk'],
            "deskripsi_produk" => $_POST['deskripsi_produk'],
            "foto_produk" => $_POST['foto_produk'],
            "aksi" => $_POST['aksi']
        );
        $abc->tambah_produk($data);
        header('location:produk.php');
    } else if ($_POST['aksi'] == 'ubah') {
        $data = array(
            "id_produk" => $_POST['id_produk'],
            "id_brand" => $_POST['id_brand'],
            "nama_produk" => $_POST['nama_produk'],
            "kategori_produk" => $_POST['kategori_produk'],
            "harga_produk" => $_POST['harga_produk'],
            "deskripsi_produk" => $_POST['deskripsi_produk'],
            "foto_produk" => $_POST['foto_produk'],
            "aksi" => $_POST['aksi']
        );
        $abc->ubah_produk($data);
        header('location:produk.php');
    }
} else if ($_GET['aksi'] == 'hapus') {
    $data = array(
        "id_produk" => $_GET['id_produk'],
        "aksi" => $_GET['aksi']
    );
    $abc->hapus_produk($data);
    header('location: produk.php');
}

unset($abc, $data);
