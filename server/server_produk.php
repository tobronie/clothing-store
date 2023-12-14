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

// Server produk
$postdata = file_get_contents("php://input");
function filter($data)
{
    $data = preg_replace('/[^a-zA-Z0-9]/', ' ', $data);
    return $data;
    unset($data);
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $data = json_decode($postdata);
    $id_produk = $data->id_produk;
    $id_brand = $data->id_brand;
    $nama_produk = $data->nama_produk;
    $kategori_produk = $data->kategori_produk;
    $harga_produk = $data->harga_produk;
    $deskripsi_produk = $data->deskripsi_produk;
    $foto_produk = $data->foto_produk;
    $aksi = $data->aksi;

    if ($aksi == 'tambah') {
        $data2 = array(
            'id_produk' => $id_produk,
            'id_brand' => $id_brand,
            'nama_produk' => $nama_produk,
            'kategori_produk' => $kategori_produk,
            'harga_produk' => $harga_produk,
            'deskripsi_produk' => $deskripsi_produk,
            'foto_produk' => $foto_produk,
        );
        $abc->tambah_produk($data2);
    } elseif ($aksi == 'ubah') {
        $data2 = array(
            'id_produk' => $id_produk,
            'id_brand' => $id_brand,
            'nama_produk' => $nama_produk,
            'kategori_produk' => $kategori_produk,
            'harga_produk' => $harga_produk,
            'deskripsi_produk' => $deskripsi_produk,
            'foto_produk' => $foto_produk,
        );  
        $abc->ubah_produk($data2);
    } elseif ($aksi == 'hapus') {
        $abc->hapus_produk($id_produk);
    }

    unset($input, $data, $data2, $id_produk, $id_brand, $nama_produk, $kategori_produk, $harga_produk, $deskripsi_produk, $foto_produk, $aksi, $abc);
} elseif ($_SERVER['REQUEST_METHOD'] == 'GET') {
    if (($_GET['aksi'] == 'tampil') and (isset($_GET['id_produk']))) {
        $id_produk = filter($_GET['id_produk']);
        $data = $abc->tampil_produk($id_produk);
        echo json_encode($data);
    } else {
        $data = $abc->tampil_semua_produk();
        echo json_encode($data);
    }
    unset($postdata, $data, $id_produk, $abc);
}
?>