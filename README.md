
* Nama: Septian Ardi Nugroho
* NIM: 42425023
* Kelas: Informatika (Semester 3)
* Tema Aplikasi: Sistem Kasir Toko Ardi

## 📖 Deskripsi Ringkas Aplikasi
Aplikasi berbasis web ini dikembangkan untuk mengelola inventaris data barang, stok, harga beli, dan harga jual pada toko secara terpusat. Aplikasi ini dibangun menggunakan bahasa PHP dengan menerapkan konsep Pemrograman Berorientasi Objek (OOP) serta antarmuka yang responsif menggunakan framework Bootstrap 5 dan fitur pencarian real-time.

## 🧩 Penerapan Konsep OOP
Aplikasi ini dirancang dengan menerapkan pilar-pilar utama Pemrograman Berorientasi Objek, yaitu:
1. Class & Object: 
   * Terdapat class `Database` yang merangkum seluruh atribut koneksi dan fungsi manipulasi data. Objek diinstansiasi pada setiap halaman untuk menjalankan fungsi CRUD.
2. Encapsulation (Enkapsulasi): 
   * Variabel kredensial database (`$host`, `$uname`, `$pass`, `$db`) diatur dengan access modifier `private` dan `protected` di dalam class `Database` agar data terlindungi dari akses luar yang tidak sah.
3. Inheritance (Pewarisan): 
   * Diterapkan pada class `ManajerBarang` yang mewarisi (extends) seluruh properti dan method dari class induk `Database`, sehingga kode menjadi lebih modular dan terstruktur.
4. Polymorphism (Polimorfisme): 
   * Diterapkan melalui teknik method overriding pada class `ManajerBarang` yang memodifikasi atau memperluas fungsi `tampil_data()` dari class induknya.

## 🚀 Alur & Fitur Utama Program
* Dashboard Utama (`index.php`): Menampilkan ringkasan statistik (total jenis barang, total unit stok, dan potensi keuntungan), tabel inventaris lengkap dengan margin keuntungan per unit, serta fitur Live Search untuk mencari barang secara instan.
* Tambah Data (`tambah.php`): Formulir untuk menambahkan produk baru ke database toko.
* Edit Data (`tambah.php` / `edit.php`): Formulir untuk memperbarui informasi nama barang, jumlah stok, harga beli, dan harga jual.
* Hapus Data (`hapus.php`): Fitur untuk menghapus data produk dari sistem dengan konfirmasi keamanan.

## ⚙️ Cara Menjalankan Program (How to Run)
1. Pastikan server lokal seperti **XAMPP** (sudah termasuk PHP dan MySQL) terinstal di komputer.
2. Clone repository ini atau download sebagai ZIP, lalu letakkan folder project ke dalam direktori `htdocs` di folder XAMPP (`C:\xampp\htdocs\`).
3. Nyalakan layanan Apache dan MySQL melalui XAMPP Control Panel.
4. Buka browser dan akses `http://localhost/phpmyadmin`.
5. Buat database baru dengan nama `toko ardi 5023`.
6. Pilih database tersebut, lalu pilih menu Import dan masukkan file `tabel_id_barang.sql` yang tersedia di repository ini.
7. Jalankan aplikasi melalui browser dengan mengakses:
   ```text
   http://localhost/nama-folder-project/index.php# sistem-kasir-pbo
