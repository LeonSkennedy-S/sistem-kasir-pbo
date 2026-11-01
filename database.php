<?php
// Class Induk untuk Koneksi & Operasi Database (Encapsulation)
class Database {
    // Encapsulation: Membatasi akses atribut menggunakan private & protected
    private $host = "localhost";
    private $uname = "root";
    private $pass = "";
    private $db = "toko ardi 5023"; 
    protected $koneksi;

    public function __construct(){
        $this->koneksi = mysqli_connect($this->host,$this->uname, $this->pass,$this->db);
        if (mysqli_connect_errno()){
            echo "Koneksi database gagal : " . mysqli_connect_error();
        }
    }

    // Menampilkan data barang
    public function tampil_data(){
        $data = mysqli_query($this->koneksi, "SELECT * FROM `tabel id barang`");
        $hasil = [];
        while($d = mysqli_fetch_array($data)){
            $hasil[] =$d;
        }
        return $hasil;
    }

    // Menambah data barang
    public function tambah_data($nama_barang,$stok, $harga_beli,$harga_jual){
        mysqli_query($this->koneksi, "INSERT INTO `tabel id barang` (nama_barang, stok, harga_beli, harga_jual) VALUES ('$nama_barang', '$stok', '$harga_beli', '$harga_jual')");
    }

    // Mengambil data barang berdasarkan ID
    public function edit_data($id_barang){
        $data = mysqli_query($this->koneksi, "SELECT * FROM `tabel id barang` WHERE id_barang='$id_barang'");
        $hasil = [];
        while($d = mysqli_fetch_array($data)){
            $hasil[] =$d;
        }
        return $hasil;
    }

    // Mengubah / Update data barang
    public function update_data($id_barang, $nama_barang,$stok, $harga_beli,$harga_jual){
        mysqli_query($this->koneksi, "UPDATE `tabel id barang` SET nama_barang='$nama_barang', stok='$stok', harga_beli='$harga_beli', harga_jual='$harga_jual' WHERE id_barang='$id_barang'");
    }

    // Menghapus data barang
    public function hapus_data($id_barang){
        mysqli_query($this->koneksi, "DELETE FROM `tabel id barang` WHERE id_barang='$id_barang'");
    }
}

// Inheritance & Polymorphism: Class turunan untuk pengelolaan data khusus
class ManajerBarang extends Database {
    
    // Polymorphism (Method Overriding): Mengubah perilaku method tampil_data 
    // dengan menambahkan fungsionalitas tambahan dari class induk
    public function tampil_data() {
        // Memanggil method asli dari class induk menggunakan parent::
        $dataInduk = parent::tampil_data();
        
        // Bisa disesuaikan atau langsung dikembalikan
        return $dataInduk;
    }
}
?>