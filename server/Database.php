<?php
error_reporting(1);
class Database {
    private $host = "localhost";
    private $dbname = "store";
    private $user = "root";
    private $password = "Sederhana05#";
    private $port = "3306";
    private $conn;

    // koneksi database
    public function __construct() {
        try {
            $this->conn = new PDO("mysql:host=$this->host;port=$this->port; dbname=$this->dbname; charset=utf8", $this->user, $this->password);

        } catch (PDOException $e) {
            echo "Koneksi gagal";
        }
    }


    // Data produk
    public function tampil_produk($id_produk) {
        $query = $this->conn->prepare("select id_produk, id_brand, nama_produk, kategori_produk, harga_produk, deskripsi_produk, foto_produk from produk where id_produk=?");
        $query->execute(array($id_produk));
        $data = $query->fetch(PDO::FETCH_ASSOC);
        return $data;
        $query->closeCursor();
        unset($id_produk, $data);
    }

    public function tampil_semua_produk() {
        $query = $this->conn->prepare("select id_produk, id_brand, nama_produk, kategori_produk, harga_produk, deskripsi_produk, foto_produk from produk order by id_produk");
        $query->execute();
        $data = $query->fetchAll(PDO::FETCH_ASSOC);
        return $data;
        $query->closeCursor();
        unset($data);
    }

    public function tambah_produk($data) {
        $query = $this->conn->prepare("insert ignore into produk (id_produk, id_brand, nama_produk, kategori_produk, harga_produk, deskripsi_produk, foto_produk) values (?,?,?,?,?,?,?)");
        $query->execute(array($data['id_produk'], $data['id_brand'], $data['nama_produk'], $data['kategori_produk'], $data['harga_produk'], $data['deskripsi_produk'], $data['foto_produk'], ));
        $query->closeCursor();
        unset($data);
    }

    public function ubah_produk($data) {
        try {
            $query = $this->conn->prepare("UPDATE produk SET id_produk=?, id_brand=?, nama_produk=?, kategori_produk=?, harga_produk=?, deskripsi_produk=?, foto_produk=? WHERE id_produk=?");
            $query->execute(array($data['id_produk'], $data['id_brand'], $data['nama_produk'], $data['kategori_produk'], $data['harga_produk'], $data['deskripsi_produk'], $data['foto_produk'], $data['id_produk'],));
            $query->closeCursor();
            unset($data);
        } catch (PDOException $e) {
            echo "Database error: ".$e->getMessage();
        }
    }

    public function hapus_produk($id_produk) {
        $query = $this->conn->prepare("delete from produk where id_produk=?");
        $query->execute(array($id_produk));
        $query->closeCursor();
        unset($id_produk);
    }

    // Data brand
    public function tampil_brand($id_brand) {
        $query = $this->conn->prepare("select id_brand, nama_brand, asal_brand, logo_brand from brand where id_brand=?");
        $query->execute(array($id_brand));
        $data = $query->fetch(PDO::FETCH_ASSOC);
        return $data;
        $query->closeCursor();
        unset($id_brand, $data);
    }

    public function tampil_semua_brand() {
        $query = $this->conn->prepare("select id_brand, nama_brand, asal_brand, logo_brand from brand order by id_brand");
        $query->execute();
        $data = $query->fetchAll(PDO::FETCH_ASSOC);
        return $data;
        $query->closeCursor();
        unset($data);
    }

    public function tambah_brand($data) {
        $query = $this->conn->prepare("insert ignore into brand (id_brand, nama_brand, asal_brand, logo_brand) values (?,?,?,?)");
        $query->execute(array($data['id_brand'], $data['nama_brand'], $data['asal_brand'], $data['logo_brand']));
        $query->closeCursor();
        unset($data);
    }

    public function ubah_brand($data) {
        try {
            $query = $this->conn->prepare("UPDATE brand SET id_brand=?, nama_brand=?, asal_brand=?, logo_brand=? WHERE id_brand=?");
            $query->execute(array($data['id_brand'], $data['nama_brand'], $data['asal_brand'], $data['logo_brand'], $data['id_brand'],));
            $query->closeCursor();
            unset($data);
        } catch (PDOException $e) {
            echo "Database error: ".$e->getMessage();
        }
    }

    public function hapus_brand($id_brand) {
        $query = $this->conn->prepare("delete from brand where id_brand=?");
        $query->execute(array($id_brand));
        $query->closeCursor();
        unset($id_brand);
    }


    // Data Karyawan
    public function login_karyawan($email_karyawan, $password_karyawan) {
        $query = $this->conn->prepare("select id_karyawan from karyawan where email_karyawan=? and password_karyawan=?");
        $query->execute(array($email_karyawan, $password_karyawan));
        $data = $query->fetch(PDO::FETCH_ASSOC);
        $query->closeCursor();
        return $data;
    }
    public function tampil_karyawan($id_karyawan) {
        $query = $this->conn->prepare("select id_karyawan, nama_karyawan, nohp_karyawan, email_karyawan, alamat_karyawan, password_karyawan from karyawan where id_karyawan=?");
        $query->execute(array($id_karyawan));
        $data = $query->fetch(PDO::FETCH_ASSOC);
        return $data;
        $query->closeCursor();
        unset($id_karyawan, $data);
    }

    public function tampil_semua_karyawan() {
        $query = $this->conn->prepare("select id_karyawan, nama_karyawan, nohp_karyawan, email_karyawan, alamat_karyawan, password_karyawan from karyawan order by id_karyawan");
        $query->execute();
        $data = $query->fetchAll(PDO::FETCH_ASSOC);
        return $data;
        $query->closeCursor();
        unset($data);
    }

    public function tambah_karyawan($data) {
        $query = $this->conn->prepare("insert ignore into karyawan (id_karyawan, nama_karyawan, nohp_karyawan, email_karyawan, alamat_karyawan, password_karyawan) values (?,?,?,?,?,?)");
        $query->execute(array($data['id_karyawan'], $data['nama_karyawan'], $data['nohp_karyawan'], $data['email_karyawan'], $data['alamat_karyawan'], $data['password_karyawan'],));
        $query->closeCursor();
        unset($data);
    }

    public function ubah_karyawan($data) {
        try {
            $query = $this->conn->prepare("UPDATE karyawan SET id_karyawan=?, nama_karyawan=?, nohp_karyawan=?, email_karyawan=?, alamat_karyawan=?, password_karyawan=? WHERE id_karyawan=?");
            $query->execute(array($data['id_karyawan'], $data['nama_karyawan'], $data['nohp_karyawan'], $data['email_karyawan'], $data['alamat_karyawan'], $data['password_karyawan'],));
            $query->closeCursor();
            unset($data);
        } catch (PDOException $e) {
            echo "Database error: ".$e->getMessage();
        }
    }

    public function hapus_karyawan($id_karyawan) {
        $query = $this->conn->prepare("delete from karyawan where id_karyawan=?");
        $query->execute(array($id_karyawan));
        $query->closeCursor();
        unset($id_karyawan);
    }


    // Data Transaksi
    public function tampil_transaksi($id_transaksi) {
        $query = $this->conn->prepare("select id_transaksi, id_produk, id_user, jumlah_transaksi, waktu_transaksi, total_transaksi from transaksi where id_transaksi=?");
        $query->execute(array($id_transaksi));
        $data = $query->fetch(PDO::FETCH_ASSOC);
        return $data;
        $query->closeCursor();
        unset($id_transaksi, $data);
    }

    public function tampil_semua_transaksi() {
        $query = $this->conn->prepare("select id_transaksi, id_produk, id_user, jumlah_transaksi, waktu_transaksi, total_transaksi from transaksi order by id_transaksi");
        $query->execute();
        $data = $query->fetchAll(PDO::FETCH_ASSOC);
        return $data;
        $query->closeCursor();
        unset($data);
    }

    public function tambah_transaksi($data) {
        $query = $this->conn->prepare("insert ignore into transaksi (id_transaksi, id_produk, id_user, jumlah_transaksi, waktu_transaksi, total_transaksi) values (?,?,?,?,?,?)");
        $query->execute(array($data['id_transaksi'], $data['id_produk'], $data['id_user'], $data['jumlah_transaksi'], $data['waktu_transaksi'], $data['total_transaksi'], ));
        $query->closeCursor();
        unset($data);
    }

    public function ubah_transaksi($data) {
        try {
            $query = $this->conn->prepare("UPDATE transaksi SET id_transaksi=?, id_produk=?, id_user=?, jumlah_transaksi=?, waktu_transaksi=?, total_transaksi=? WHERE id_transaksi=?");
            $query->execute(array($data['id_transaksi'], $data['id_produk'], $data['id_user'], $data['jumlah_transaksi'], $data['waktu_transaksi'], $data['total_transaksi'], ));
            $query->closeCursor();
            unset($data);
        } catch (PDOException $e) {
            echo "Database error: ".$e->getMessage();
        }
    }

    public function hapus_transaksi($id_transaksi) {
        $query = $this->conn->prepare("delete from transaksi where id_transaksi=?");
        $query->execute(array($id_transaksi));
        $query->closeCursor();
        unset($id_transaksi);
    }


    // Data User
    public function login_user($email_user, $password_user) {
        $query = $this->conn->prepare("select id_user from user where email_user=? and password_user=?");
        $query->execute(array($email_user, $password_user));
        $data = $query->fetch(PDO::FETCH_ASSOC);
        $query->closeCursor();
        return $data;
    }
    
    public function tampil_user($id_user) {
        $query = $this->conn->prepare("select id_user, nama_user, nohp_user, email_user, alamat_user, password_user from user where id_user=?");
        $query->execute(array($id_user));
        $data = $query->fetch(PDO::FETCH_ASSOC);
        return $data;
        $query->closeCursor();
        unset($id_user, $data);
    }

    public function tampil_semua_user() {
        $query = $this->conn->prepare("select id_user, nama_user, nohp_user, email_user, alamat_user, password_user from user order by id_user");
        $query->execute();
        $data = $query->fetchAll(PDO::FETCH_ASSOC);
        return $data;
        $query->closeCursor();
        unset($data);
    }

    public function tambah_user($data) {
        $query = $this->conn->prepare("insert ignore into user (id_user, nama_user, nohp_user, email_user, alamat_user, password_user) values (?,?,?,?,?,?)");
        $query->execute(array($data['id_user'], $data['nama_user'], $data['nohp_user'], $data['email_user'], $data['alamat_user'], $data['password_user']));
        $query->closeCursor();
        unset($data);
    }

    public function ubah_user($data) {
        try {
            $query = $this->conn->prepare("UPDATE user SET id_user=?, nama_user=?, nohp_user=?, email_user=?, alamat_user=?, password_user=? WHERE id_user=?");
            $query->execute(array($data['id_user'], $data['nama_user'], $data['nohp_user'], $data['email_user'], $data['alamat_user'], $data['password_user']));
            $query->closeCursor();
            unset($data);
        } catch (PDOException $e) {
            echo "Database error: ".$e->getMessage();
        }
    }

    public function hapus_user($id_user) {
        $query = $this->conn->prepare("delete from user where id_user=?");
        $query->execute(array($id_user));
        $query->closeCursor();
        unset($id_user);
    }
}
