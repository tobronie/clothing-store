<?php
error_reporting(1);
include "Database.php";
$abc = new Database();

// Function untuk menghapus selain huruf dan angka
function filter($data)
{
    $data = preg_replace('/[^a-zA-Z0-9]/', ' ', $data);
    return $data;
    unset($data);
}

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

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $data = json_decode($postdata);
    $id_karyawan = $data->id_karyawan;
    $nama_karyawan = $data->nama_karyawan;
    $nohp_karyawan = $data->nohp_karyawan;
    $email_karyawan = $data->email_karyawan;
    $alamat_karyawan = $data->alamat_karyawan;
    $password_karyawan = $data->password_karyawan;
    $aksi = $data->aksi;

    if ($aksi == 'login') {
        $data2 = $abc->login_karyawan($email_karyawan, $password_karyawan);

        if ($data2) {
            session_start();
            $_SESSION['id_karyawan'] = $data2['id_karyawan'];
            echo json_encode(['status' => 'success', 'message' => 'Login successful', 'id_karyawan' => $data2['id_karyawan']]);
        } else {
            echo json_encode(['status' => 'error', 'message' => 'Invalid email or password']);
        }
    } elseif ($aksi == 'tambah') {
        $data2 = array(
            'id_karyawan' => $id_karyawan,
            'nama_karyawan' => $nama_karyawan,
            'nohp_karyawan' => $nohp_karyawan,
            'email_karyawan' => $email_karyawan,
            'alamat_karyawan' => $alamat_karyawan,
            'password_karyawan' => $password_karyawan,
        );
        $abc->tambah_karyawan($data2);
    } elseif ($aksi == 'ubah') {
        $data2 = array(
            'id_karyawan' => $id_karyawan,
            'nama_karyawan' => $nama_karyawan,
            'nohp_karyawan' => $nohp_karyawan,
            'email_karyawan' => $email_karyawan,
            'alamat_karyawan' => $alamat_karyawan,
            'password_karyawan' => $password_karyawan,
        );
        $abc->ubah_karyawan($data2);
    } elseif ($aksi == 'hapus') {
        $abc->hapus_karyawan($id_karyawan);
    }

    unset($data, $data2, $id_karyawan, $nama_karyawan, $nohp_karyawan, $email_karyawan, $alamat_karyawan, $password_karyawan, $aksi, $abc);
} elseif ($_SERVER['REQUEST_METHOD'] == 'GET') {
    if (($_GET['aksi'] == 'tampil') && (isset($_GET['id_karyawan']))) {
        $id_karyawan = filter($_GET['id_karyawan']);
        $data = $abc->tampil_karyawan($id_karyawan);
        echo json_encode($data);
    } else {
        $data = $abc->tampil_semua_karyawan();
        echo json_encode($data);
    }
    unset($postdata, $data, $id_karyawan, $abc);
}
?>
