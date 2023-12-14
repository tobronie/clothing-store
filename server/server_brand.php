<?php
error_reporting(1);


include "Database.php";
$abc = new Database();

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

$postdata = file_get_contents("php://input");
function filter($data)
{
    $data = preg_replace('/[^a-zA-Z0-9]/', ' ', $data);
    return $data;
    unset($data);
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $data = json_decode($postdata);
    $id_brand = $data->id_brand;
    $nama_brand = $data->nama_brand;
    $asal_brand = $data->asal_brand;
    $logo_brand = $data->logo_brand;
    $aksi = $data->aksi;

    if ($aksi == 'tambah') {
        $data2 = array(
            'id_brand' => $id_brand,
            'nama_brand' => $nama_brand,
            'asal_brand' => $asal_brand,
            'logo_brand' => $logo_brand,
        );
        $abc->tambah_brand($data2);
    } elseif ($aksi == 'ubah') {
        $data2 = array(
            'id_brand' => $id_brand,
            'nama_brand' => $nama_brand,
            'asal_brand' => $asal_brand,
            'logo_brand' => $logo_brand,
        );
        $abc->ubah_brand($data2);
    } elseif ($aksi == 'hapus') {
        $abc->hapus_brand($id_brand);
    }

    unset($input, $data, $data2, $id_brand, $nama_brand, $asal_brand, $logo_brand, $aksi, $abc);
} elseif ($_SERVER['REQUEST_METHOD'] == 'GET') {
    if (($_GET['aksi'] == 'tampil') and (isset($_GET['id_brand']))) {
        $id_brand = filter($_GET['id_brand']);
        $data = $abc->tampil_brand($id_brand);
        echo json_encode($data);
    } else {
        $data = $abc->tampil_semua_brand();
        echo json_encode($data);
    }
    unset($postdata, $data, $id_brand, $abc);
}

?>