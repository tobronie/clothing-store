<?php
error_reporting(1);
include "Database.php";
$abc = new Database();

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
    $id_user = $data->id_user;
    $nama_user = $data->nama_user;
    $nohp_user = $data->nohp_user;
    $email_user = $data->email_user;
    $alamat_user = $data->alamat_user;
    $password_user = $data->password_user;
    $aksi = $data->aksi;

    if ($aksi == 'login') {
        $data2 = $abc->login_user($email_user, $password_user);

        if ($data2) {
            session_start();
            $_SESSION['id_user'] = $data2['id_user'];
            echo json_encode(['status' => 'success', 'message' => 'Login successful', 'id_user' => $data2['id_user']]);
        } else {
            echo json_encode(['status' => 'error', 'message' => 'Invalid email or password']);
        }
    } elseif ($aksi == 'tambah') {
        $data2 = array(
            'id_user' => $id_user,
            'nama_user' => $nama_user,
            'nohp_user' => $nohp_user,
            'email_user' => $email_user,
            'alamat_user' => $alamat_user,
            'password_user' => $password_user,
        );
        $abc->tambah_user($data2);
    } elseif ($aksi == 'ubah') {
        $data2 = array(
            'id_user' => $id_user,
            'nama_user' => $nama_user,
            'nohp_user' => $nohp_user,
            'email_user' => $email_user,
            'alamat_user' => $alamat_user,
            'password_user' => $password_user,
        );
        $abc->ubah_user($data2);
    } elseif ($aksi == 'hapus') {
        $abc->hapus_user($id_user);
    }

    unset($data, $data2, $id_user, $nama_user, $nohp_user, $email_user, $alamat_user, $password_user, $aksi, $abc);
} elseif ($_SERVER['REQUEST_METHOD'] == 'GET') {
    if (($_GET['aksi'] == 'tampil') && (isset($_GET['id_user']))) {
        $id_user = filter($_GET['id_user']);
        $data = $abc->tampil_user($id_user);
        echo json_encode($data);
    } else {
        $data = $abc->tampil_semua_user();
        echo json_encode($data);
    }
    unset($postdata, $data, $id_user, $abc);
}
?>
