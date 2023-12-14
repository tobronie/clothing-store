<?php
error_reporting(1);

include "Database.php";
$abc = new Database();

// function untuk menghapus selain huruf dan angka 
if (isset($_SERVER['HTTP_ORIGIN'])) {
    header("Access-Control-Allow-Origin:{$_SERVER['HTTP_ORIGIN']}");
    header('Access-Control-Allow-Credentials:true');
    header('Access-Control-Max-Age:86400');
}
if ($_SERVER['REQUEST_METHOD'] == 'OPTIONS') {
    if (isset($_SERVER['HTTP_ACCESS_CONTROL_REQUEST_METHOD']))
        header('Access-Control-Allow-Method:OPTIONS GET, POST, OPTIONS');
    if (isset($_SERVER['HTTP_ACCESS_CONTROL_REQUEST_HEADERS']))
        header("Access-Control-Allow-Headers: {$_SERVER['HTTP_ACCESS_CONTROL_REQUEST_HEADERS']}");
    exit(0);
}

// Server Transaksi
$postdata = file_get_contents("php://input");
function filter($data)
{
    $data = preg_replace('/[^a-zA-Z0-9]/', ' ', $data);
    return $data;
    unset($data);
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $data = json_decode($postdata);
    $id_transaksi = $data->id_transaksi;
    $id_produk = $data->id_produk;
    $id_user = $data->id_user;
    $jumlah_transaksi = $data->jumlah_transaksi;
    $waktu_transaksi = date('Y-m-d H:i:s');
    $total_transaksi = $data->total_transaksi;
    $aksi = $data->aksi;

    if ($aksi == 'tambah') {
        $data2 = array(
            'id_transaksi' => $id_transaksi,
            'id_produk' => $id_produk,
            'id_user' => $id_user,
            'jumlah_transaksi' => $jumlah_transaksi,
            'waktu_transaksi' => $waktu_transaksi,
            'total_transaksi' => $total_transaksi,
        );
        $abc->tambah_transaksi($data2);
    } elseif ($aksi == 'ubah') {
        $data2 = array(
            'id_transaksi' => $id_transaksi,
            'id_produk' => $id_produk,
            'id_user' => $id_user,
            'jumlah_transaksi' => $jumlah_transaksi,
            'waktu_transaksi' => $waktu_transaksi,
            'total_transaksi' => $total_transaksi,
        );
        $abc->ubah_transaksi($data2);
    } elseif ($aksi == 'hapus') {
        $abc->hapus_transaksi($id_transaksi);
    }

    unset($input, $data, $data2, $id_transaksi, $id_produk, $id_user, $jumlah_transaksi, $waktu_transaksi, $total_transaksi, $aksi, $abc);
} elseif ($_SERVER['REQUEST_METHOD'] == 'GET') {
    if (($_GET['aksi'] == 'tampil') and (isset($_GET['id_transaksi']))) {
        $id_transaksi = filter($_GET['id_transaksi']);
        $data = $abc->tampil_transaksi($id_transaksi);
        echo json_encode($data);
    } else {
        $data = $abc->tampil_semua_transaksi();
        echo json_encode($data);
    }
    unset($postdata, $data, $id_transaksi, $abc);
}
?>
