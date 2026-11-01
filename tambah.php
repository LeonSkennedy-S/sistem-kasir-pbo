<?php
include 'database.php';
$db = new Database();

if(isset($_POST['simpan'])){
    $db->tambah_data($_POST['nama_barang'], $_POST['stok'], $_POST['harga_beli'], $_POST['harga_jual']);
    header("location:index.php");
}
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah Data Barang</title>
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;500;600;700&display=swap" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
    <style>
        body { font-family: 'Plus Jakarta Sans', sans-serif; background-color: #f4f6f9; }
        .card-custom { border: none; border-radius: 16px; box-shadow: 0 4px 20px rgba(0,0,0,0.05); }
    </style>
</head>
<body>

    <div class="container py-5">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <div class="card card-custom bg-white">
                    <div class="card-header bg-white py-3 border-0 d-flex align-items-center gap-2">
                        <div class="bg-primary-subtle text-primary rounded-3 p-2">
                            <i class="bi bi-box-seam-fill fs-5"></i>
                        </div>
                        <div>
                            <h5 class="fw-bold m-0">Tambah Barang Baru</h5>
                            <small class="text-muted">Lengkapi rincian data stok di bawah ini</small>
                        </div>
                    </div>
                    <div class="card-body p-4">
                        <form action="" method="post">
                            <div class="mb-3">
                                <label class="form-label fw-semibold small text-muted">NAMA BARANG</label>
                                <input type="text" class="form-control form-control-lg fs-6" name="nama_barang" placeholder="Contoh: Koyo Cabe" required autocomplete="off">
                            </div>
                            <div class="mb-3">
                                <label class="form-label fw-semibold small text-muted">JUMLAH STOK</label>
                                <div class="input-group input-group-lg">
                                    <input type="number" class="form-control fs-6" name="stok" placeholder="0" required>
                                    <span class="input-group-text fs-6 bg-light text-muted">pcs</span>
                                </div>
                            </div>
                            <div class="row g-3 mb-4">
                                <div class="col-md-6">
                                    <label class="form-label fw-semibold small text-muted">HARGA BELI</label>
                                    <div class="input-group input-group-lg">
                                        <span class="input-group-text fs-6 bg-light text-muted">Rp</span>
                                        <input type="number" class="form-control fs-6" name="harga_beli" placeholder="0" required>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <label class="form-label fw-semibold small text-muted">HARGA JUAL</label>
                                    <div class="input-group input-group-lg">
                                        <span class="input-group-text fs-6 bg-light text-muted">Rp</span>
                                        <input type="number" class="form-control fs-6" name="harga_jual" placeholder="0" required>
                                    </div>
                                </div>
                            </div>
                            <div class="d-flex justify-content-between align-items-center pt-2 border-top">
                                <a href="index.php" class="btn btn-light px-4 fw-semibold text-muted">Batal</a>
                                <button type="submit" name="simpan" class="btn btn-primary px-4 fw-semibold">
                                    <i class="bi bi-check-lg me-1"></i> Simpan Barang
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

</body>
</html>