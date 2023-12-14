<?php
error_reporting(1);

class Client
{
    private $url;

    public function __construct($url)
    {
        $this->url = $url;
        unset($url);
    }

    public function filter($data)
    {
        $data = preg_replace('/[^a-zA-Z0-9]/', '', $data);
        return $data;
        unset($data);
    }


    // produk
    public function tampil_semua_produk()
    {
        $client = curl_init($this->url . "server_produk.php");
        curl_setopt($client, CURLOPT_RETURNTRANSFER, 1);
        $response = curl_exec($client);
        curl_close($client);
        $data = json_decode($response);
        return $data;

        unset($data, $client, $response);
    }

    public function tampil_produk($id_produk)
    {
        $id_produk = $this->filter($id_produk);
        $client = curl_init($this->url . "server_produk.php?aksi=tampil&id_produk=" . $id_produk);
        curl_setopt($client, CURLOPT_RETURNTRANSFER, 1);
        $response = curl_exec($client);
        curl_close($client);
        $data = json_decode($response);
        return $data;

        unset($id_produk, $client, $response, $data);
    }

    public function tambah_produk($data)
    {
        $data = '{ "id_produk" : "' . $data['id_produk'] . '",
            "id_brand" : "' . $data['id_brand'] . '",
            "nama_produk" : "' . $data['nama_produk'] . '", 
            "kategori_produk" : "' . $data['kategori_produk'] . '", 
            "harga_produk" : "' . $data['harga_produk'] . '", 
            "deskripsi_produk" : "' . $data['deskripsi_produk'] . '", 
            "foto_produk" : "' . $data['foto_produk'] . '", 
            "aksi": "' . $data['aksi'] . '"
        }';

        $c = curl_init();
        curl_setopt($c, CURLOPT_URL, $this->url . "server_produk.php");
        curl_setopt($c, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($c, CURLOPT_POST, true);
        curl_setopt($c, CURLOPT_POSTFIELDS, $data);
        $response = curl_exec($c);
        curl_close($c);
        unset($data, $c, $response);
    }

    public function ubah_produk($data)
    {
        $data_json = json_encode(array(
            "id_produk" => $data['id_produk'],
            "id_brand" => $data['id_brand'],
            "nama_produk" => $data['nama_produk'],
            "kategori_produk" => $data['kategori_produk'],
            "harga_produk" => $data['harga_produk'],
            "deskripsi_produk" => $data['deskripsi_produk'],
            "foto_produk" => $data['foto_produk'],
            "aksi" => $data['aksi']
        ));

        $c = curl_init();
        curl_setopt($c, CURLOPT_URL, $this->url . "server_produk.php");
        curl_setopt($c, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($c, CURLOPT_POST, true);
        curl_setopt($c, CURLOPT_POSTFIELDS, $data_json); // Kirim data JSON
        $response = curl_exec($c);
        curl_close($c);
        unset($data, $c, $response);
    }


    public function hapus_produk($data)
    {
        $id_produk = $this->filter($data['id_produk']);
        $data = '{ "id_produk" : "' . $id_produk . '",
            "aksi": "' . $data['aksi'] . '"
        }';
        $c = curl_init();
        curl_setopt($c, CURLOPT_URL, $this->url . "server_produk.php");
        curl_setopt($c, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($c, CURLOPT_POST, true);
        curl_setopt($c, CURLOPT_POSTFIELDS, $data);
        $response = curl_exec($c);
        curl_close($c);
        unset($data, $c, $response);
    }


    // brand
    public function tampil_semua_brand()
    {
        $client = curl_init($this->url . "server_brand.php");
        curl_setopt($client, CURLOPT_RETURNTRANSFER, 1);
        $response = curl_exec($client);
        curl_close($client);
        $data = json_decode($response);
        return $data;

        unset($data, $client, $response);
    }

    public function tampil_brand($id_brand)
    {
        $id_brand = $this->filter($id_brand);
        $client = curl_init($this->url . "server_brand.php?aksi=tampil&id_brand=" . $id_brand);
        curl_setopt($client, CURLOPT_RETURNTRANSFER, 1);
        $response = curl_exec($client);
        curl_close($client);
        $data = json_decode($response);
        return $data;

        unset($id_brand, $client, $response, $data);
    }

    public function tambah_brand($data)
    {
        $data = '{ "id_brand" : "' . $data['id_brand'] . '",
            "nama_brand" : "' . $data['nama_brand'] . '", 
            "asal_brand" : "' . $data['asal_brand'] . '", 
            "logo_brand" : "' . $data['logo_brand'] . '", 
            "aksi": "' . $data['aksi'] . '"
        }';

        $c = curl_init();
        curl_setopt($c, CURLOPT_URL, $this->url . "server_brand.php");
        curl_setopt($c, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($c, CURLOPT_POST, true);
        curl_setopt($c, CURLOPT_POSTFIELDS, $data);
        $response = curl_exec($c);
        curl_close($c);
        unset($data, $c, $response);
    }

    public function ubah_brand($data)
    {
        $data = '{ "id_brand" : "' . $data['id_brand'] . '",
            "nama_brand" : "' . $data['nama_brand'] . '", 
            "asal_brand" : "' . $data['asal_brand'] . '", 
            "logo_brand" : "' . $data['logo_brand'] . '", 
            "aksi": "' . $data['aksi'] . '"
        }';

        $c = curl_init();
        curl_setopt($c, CURLOPT_URL, $this->url . "server_brand.php");
        curl_setopt($c, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($c, CURLOPT_POST, true);
        curl_setopt($c, CURLOPT_POSTFIELDS, $data);
        $response = curl_exec($c);
        curl_close($c);
        unset($data, $c, $response);
    }

    public function hapus_brand($data)
    {
        $id_brand = $this->filter($data['id_brand']);
        $data = '{ "id_brand" : "' . $id_brand . '",
            "aksi": "' . $data['aksi'] . '"
        }';
        $c = curl_init();
        curl_setopt($c, CURLOPT_URL, $this->url . "server_brand.php");
        curl_setopt($c, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($c, CURLOPT_POST, true);
        curl_setopt($c, CURLOPT_POSTFIELDS, $data);
        $response = curl_exec($c);
        curl_close($c);
        unset($data, $c, $response);
    }


    // karyawan
    public function login_karyawan($email_karyawan, $password_karyawan)
    {
        $data = '{
            "email_karyawan" : "' . $email_karyawan . '",
            "password_karyawan" : "' . $password_karyawan . '",
            "aksi": "login"
        }';

        $c = curl_init();
        curl_setopt($c, CURLOPT_URL, $this->url . "server_karyawan.php");
        curl_setopt($c, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($c, CURLOPT_POST, true);
        curl_setopt($c, CURLOPT_POSTFIELDS, $data);
        $response = curl_exec($c);
        curl_close($c);

        $data = json_decode($response, true);

        if ($data && isset($data['status']) && $data['status'] === 'success') {
            session_start();
            $_SESSION['id_karyawan'] = $data['id_karyawan'];
            return ['status' => 'success', 'message' => 'Login successful', 'id_karyawan' => $data['id_karyawan']];
        } else {
            return ['status' => 'error', 'message' => 'Invalid email or password'];
        }
    }
    public function tampil_semua_karyawan()
    {
        $client = curl_init($this->url . "server_karyawan.php");
        curl_setopt($client, CURLOPT_RETURNTRANSFER, 1);
        $response = curl_exec($client);
        curl_close($client);
        $data = json_decode($response);
        return $data;

        unset($data, $client, $response);
    }

    public function tampil_karyawan($id_karyawan)
    {
        $id_karyawan = $this->filter($id_karyawan);
        $client = curl_init($this->url . "server_karyawan.php?aksi=tampil&id_karyawan=" . $id_karyawan);
        curl_setopt($client, CURLOPT_RETURNTRANSFER, 1);
        $response = curl_exec($client);
        curl_close($client);
        $data = json_decode($response);
        return $data;

        unset($id_karyawan, $client, $response, $data);
    }

    public function tambah_karyawan($data)
    {
        $data = '{ "id_karyawan" : "' . $data['id_karyawan'] . '",
            "nama_karyawan" : "' . $data['nama_karyawan'] . '", 
            "nohp_karyawan" : "' . $data['nohp_karyawan'] . '", 
            "email_karyawan" : "' . $data['email_karyawan'] . '", 
            "alamat_karyawan" : "' . $data['alamat_karyawan'] . '",
            "password_karyawan" : "' . $data['password_karyawan'] . '", 
            "aksi": "' . $data['aksi'] . '"
        }';

        $c = curl_init();
        curl_setopt($c, CURLOPT_URL, $this->url . "server_karyawan.php");
        curl_setopt($c, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($c, CURLOPT_POST, true);
        curl_setopt($c, CURLOPT_POSTFIELDS, $data);
        $response = curl_exec($c);
        curl_close($c);
        unset($data, $c, $response);
    }

    public function ubah_karyawan($data)
    {
        $data = '{ "id_karyawan" : "' . $data['id_karyawan'] . '",
            "nama_karyawan" : "' . $data['nama_karyawan'] . '", 
            "nohp_karyawan" : "' . $data['nohp_karyawan'] . '", 
            "email_karyawan" : "' . $data['email_karyawan'] . '", 
            "alamat_karyawan" : "' . $data['alamat_karyawan'] . '",
            "password_karyawan" : "' . $data['password_karyawan'] . '",
            "aksi": "' . $data['aksi'] . '"
        }';

        $c = curl_init();
        curl_setopt($c, CURLOPT_URL, $this->url . "server_karyawan.php");
        curl_setopt($c, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($c, CURLOPT_POST, true);
        curl_setopt($c, CURLOPT_POSTFIELDS, $data);
        $response = curl_exec($c);
        curl_close($c);
        unset($data, $c, $response);
    }

    public function hapus_karyawan($data)
    {
        $id_karyawan = $this->filter($data['id_karyawan']);
        $data = '{ "id_karyawan" : "' . $id_karyawan . '",
            "aksi": "' . $data['aksi'] . '"
        }';
        $c = curl_init();
        curl_setopt($c, CURLOPT_URL, $this->url . "server_karyawan.php");
        curl_setopt($c, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($c, CURLOPT_POST, true);
        curl_setopt($c, CURLOPT_POSTFIELDS, $data);
        $response = curl_exec($c);
        curl_close($c);
        unset($data, $c, $response);
    }


    // user
    public function login_user($email_user, $password_user)
    {
        $data = '{
            "email_user" : "' . $email_user . '",
            "password_user" : "' . $password_user . '",
            "aksi": "login"
        }';

        $c = curl_init();
        curl_setopt($c, CURLOPT_URL, $this->url . "server_user.php");
        curl_setopt($c, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($c, CURLOPT_POST, true);
        curl_setopt($c, CURLOPT_POSTFIELDS, $data);
        $response = curl_exec($c);
        curl_close($c);

        $data = json_decode($response, true);

        if ($data && isset($data['status']) && $data['status'] === 'success') {
            session_start();
            $_SESSION['id_user'] = $data['id_user'];
            return ['status' => 'success', 'message' => 'Login successful', 'id_user' => $data['id_user']];
        } else {
            return ['status' => 'error', 'message' => 'Invalid email or password'];
        }
    }
    public function tampil_semua_user()
    {
        $client = curl_init($this->url . "server_user.php");
        curl_setopt($client, CURLOPT_RETURNTRANSFER, 1);
        $response = curl_exec($client);
        curl_close($client);
        $data = json_decode($response);
        return $data;

        unset($data, $client, $response);
    }

    public function tampil_user($id_user)
    {
        $id_user = $this->filter($id_user);
        $client = curl_init($this->url . "server_user.php?aksi=tampil&id_user=" . $id_user);
        curl_setopt($client, CURLOPT_RETURNTRANSFER, 1);
        $response = curl_exec($client);
        curl_close($client);
        $data = json_decode($response);
        return $data;

        unset($id_user, $client, $response, $data);
    }

    public function tambah_user($data)
    {
        $data = '{ "id_user" : "' . $data['id_user'] . '",
            "nama_user" : "' . $data['nama_user'] . '", 
            "nohp_user" : "' . $data['nohp_user'] . '", 
            "email_user" : "' . $data['email_user'] . '", 
            "alamat_user" : "' . $data['alamat_user'] . '",
            "password_user" : "' . $data['password_user'] . '",
            "aksi": "' . $data['aksi'] . '"
        }';

        $c = curl_init();
        curl_setopt($c, CURLOPT_URL, $this->url . "server_user.php");
        curl_setopt($c, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($c, CURLOPT_POST, true);
        curl_setopt($c, CURLOPT_POSTFIELDS, $data);
        $response = curl_exec($c);
        curl_close($c);
        unset($data, $c, $response);
    }

    public function ubah_user($data)
    {
        $data = '{ "id_user" : "' . $data['id_user'] . '",
            "nama_user" : "' . $data['nama_user'] . '", 
            "nohp_user" : "' . $data['nohp_user'] . '", 
            "email_user" : "' . $data['email_user'] . '", 
            "alamat_user" : "' . $data['alamat_user'] . '",
            "password_user" : "' . $data['password_user'] . '",
            "aksi": "' . $data['aksi'] . '"
        }';

        $c = curl_init();
        curl_setopt($c, CURLOPT_URL, $this->url . "server_user.php");
        curl_setopt($c, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($c, CURLOPT_POST, true);
        curl_setopt($c, CURLOPT_POSTFIELDS, $data);
        $response = curl_exec($c);
        curl_close($c);
        unset($data, $c, $response);
    }

    public function hapus_user($data)
    {
        $id_user = $this->filter($data['id_user']);
        $data = '{ "id_user" : "' . $id_user . '",
            "aksi": "' . $data['aksi'] . '"
        }';
        $c = curl_init();
        curl_setopt($c, CURLOPT_URL, $this->url . "server_user.php");
        curl_setopt($c, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($c, CURLOPT_POST, true);
        curl_setopt($c, CURLOPT_POSTFIELDS, $data);
        $response = curl_exec($c);
        curl_close($c);
        unset($data, $c, $response);
    }


    // transaksi
    public function tampil_semua_transaksi()
    {
        $client = curl_init($this->url . "server_transaksi.php");
        curl_setopt($client, CURLOPT_RETURNTRANSFER, 1);
        $response = curl_exec($client);
        curl_close($client);
        $data = json_decode($response);
        return $data;

        unset($data, $client, $response);
    }

    public function tampil_transaksi($id_transaksi)
    {
        $id_transaksi = $this->filter($id_transaksi);
        $client = curl_init($this->url . "server_transaksi.php?aksi=tampil&id_transaksi=" . $id_transaksi);
        curl_setopt($client, CURLOPT_RETURNTRANSFER, 1);
        $response = curl_exec($client);
        curl_close($client);
        $data = json_decode($response);
        return $data;

        unset($id_transaksi, $client, $response, $data);
    }

    public function tambah_transaksi($data)
    {
        $data['waktu_transaksi'] = date('Y-m-d H:i:s');
        
        $data = '{ "id_transaksi" : "' . $data['id_transaksi'] . '",
            "id_produk" : "' . $data['id_produk'] . '", 
            "id_user" : "' . $data['id_user'] . '", 
            "jumlah_transaksi" : "' . $data['jumlah_transaksi'] . '", 
            "waktu_transaksi" : "' . $data['waktu_transaksi'] . '", 
            "total_transaksi" : "' . $data['total_transaksi'] . '", 
            "aksi": "' . $data['aksi'] . '"
        }';

        $c = curl_init();
        curl_setopt($c, CURLOPT_URL, $this->url . "server_transaksi.php");
        curl_setopt($c, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($c, CURLOPT_POST, true);
        curl_setopt($c, CURLOPT_POSTFIELDS, $data);
        $response = curl_exec($c);
        curl_close($c);
        unset($data, $c, $response);
    }

    public function ubah_transaksi($data)
    {
        $data = '{ "id_transaksi" : "' . $data['id_transaksi'] . '",
            "id_produk" : "' . $data['id_produk'] . '", 
            "id_user" : "' . $data['id_user'] . '", 
            "jumlah_transaksi" : "' . $data['jumlah_transaksi'] . '", 
            "waktu_transaksi" : "' . $data['waktu_transaksi'] . '", 
            "total_transaksi" : "' . $data['total_transaksi'] . '", 
            "aksi": "' . $data['aksi'] . '"
        }';

        $c = curl_init();
        curl_setopt($c, CURLOPT_URL, $this->url . 'server_transaksi.php');
        curl_setopt($c, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($c, CURLOPT_POST, true);
        curl_setopt($c, CURLOPT_POSTFIELDS, $data);
        $response = curl_exec($c);
        curl_close($c);
        unset($data, $c, $response);
    }

    public function hapus_transaksi($data)
    {
        $id_transaksi = $this->filter($data['id_transaksi']);
        $data = '{ "id_transaksi" : "' . $id_transaksi . '",
            "aksi": "' . $data['aksi'] . '"
        }';
        $c = curl_init();
        curl_setopt($c, CURLOPT_URL, $this->url . "server_transaksi.php");
        curl_setopt($c, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($c, CURLOPT_POST, true);
        curl_setopt($c, CURLOPT_POSTFIELDS, $data);
        $response = curl_exec($c);
        curl_close($c);
        unset($data, $c, $response);
    }

    public function __destruct()
    {
        unset($this->url);
    }
}

$url = 'http://192.168.137.1/store/server/';
$abc = new Client($url);
?>