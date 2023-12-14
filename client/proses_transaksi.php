<?php
include "Client.php";

if ($_POST['aksi'] == 'tambah') {
    $id_produk = $_POST['id_produk'];
    $id_user = $_POST['id_user'];
    $jumlah_transaksi = (int) $_POST['jumlah_transaksi'];
    $waktu_transaksi = date('Y-m-d H:i:s');
    $produk_data = $abc->tampil_produk($id_produk);

    if ($produk_data) {
        $harga_produk = $produk_data->harga_produk;
        $total_transaksi = $jumlah_transaksi * $harga_produk;
        $aksi = $_POST['aksi'];

        $data = array(
            "id_produk" => $id_produk,
            "id_user" => $id_user,
            "jumlah_transaksi" => $jumlah_transaksi,
            "waktu_transaksi" => $waktu_transaksi,
            "total_transaksi" => $total_transaksi,
            "aksi" => $aksi
        );
        
        $abc->tambah_transaksi($data);
        header("location: index.php");
        // header("location: nota.php?id_transaksi=$id_transaksi");
    } else {
        echo "Produk tidak ditemukan.";
    }
} else if ($_POST['aksi'] == 'ubah') {
    $data = array(
        "id_transaksi" => $_POST['id_transaksi'],
        "id_produk" => $_POST['id_produk'],
        "id_user" => $_POST['id_user'],
        "jumlah_transaksi" => $_POST['jumlah_transaksi'],
        "waktu_transaksi" => $_POST['waktu_transaksi'],
        "total_transaksi" => $_POST['total_transaksi'],
        "aksi" => $_POST['aksi']
    );
    $abc->ubah_transaksi($data);
    header('location: transaksi.php');
} else if ($_GET['aksi'] == 'hapus') {
    $data = array(
        "id_transaksi" => $_GET['id_transaksi'],
        "aksi" => $_GET['aksi']
    );
    $abc->hapus_transaksi($data);
    header('location: transaksi.php');
}

unset($abc, $data);
?>