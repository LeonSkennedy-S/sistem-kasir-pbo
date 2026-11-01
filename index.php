<?php
include 'database.php';
$db = new Database();
$data_barang = $db->tampil_data();

// Hitung Statistik
$total_jenis = count($data_barang);
$total_stok = 0;
$total_potensi_keuntungan = 0;

if (!empty($data_barang)) {
    foreach ($data_barang as $item) {
        $total_stok += $item['stok'];
        $keuntungan_per_unit = $item['harga_jual'] - $item['harga_beli'];
        $total_potensi_keuntungan += ($keuntungan_per_unit * $item['stok']);
    }
}
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard Toko Ardi</title>
    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;500;600;700&display=swap" rel="stylesheet">
    <!-- Bootstrap 5 CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Bootstrap Icons -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
    
    <style>
        body {
            font-family: 'Plus Jakarta Sans', sans-serif;
            background-color: #f4f6f9;
            color: #2d3748;
        }
        .navbar-custom {
            background: linear-gradient(135deg, #4f46e5 0%, #3b82f6 100%);
        }
        .card-stat {
            border: none;
            border-radius: 16px;
            transition: transform 0.2s, box-shadow 0.2s;
        }
        .card-stat:hover {
            transform: translateY(-3px);
            box-shadow: 0 10px 20px rgba(0,0,0,0.08) !important;
        }
        .icon-box {
            width: 48px;
            height: 48px;
            border-radius: 12px;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 1.4rem;
        }
        .main-card {
            border: none;
            border-radius: 16px;
            box-shadow: 0 4px 12px rgba(0,0,0,0.03);
        }
        .table thead th {
            background-color: #f8fafc;
            color: #64748b;
            font-size: 0.825rem;
            text-transform: uppercase;
            letter-spacing: 0.5px;
            border-bottom: 1px solid #e2e8f0;
            padding: 14px 16px;
        }
        .table tbody td {
            padding: 16px;
            border-bottom: 1px solid #f1f5f9;
        }
        .badge-soft-primary { background-color: #e0e7ff; color: #4338ca; }
        .badge-soft-success { background-color: #dcfce7; color: #15803d; }
        .badge-soft-danger  { background-color: #fee2e2; color: #b91c1c; }
        .btn-action {
            width: 34px;
            height: 34px;
            padding: 0;
            display: inline-flex;
            align-items: center;
            justify-content: center;
            border-radius: 8px;
        }
    </style>
</head>
<body>

    <!-- Header Navbar -->
    <nav class="navbar navbar-expand-lg navbar-dark navbar-custom shadow-sm py-3">
        <div class="container">
            <a class="navbar-brand fw-bold d-flex align-items-center gap-2" href="index.php">
                <div class="bg-white text-primary rounded-3 p-1 d-flex align-items-center justify-content-center" style="width: 32px; height: 32px;">
                    <i class="bi bi-shop-window"></i>
                </div>
                <span>Toko Ardi <span class="fw-normal opacity-75"></span></span>
            </a>
        </div>
    </nav>

    <div class="container py-4">
        
        <!-- Row Ringkasan Stat Cards -->
        <div class="row g-3 mb-4">
            <div class="col-md-4">
                <div class="card card-stat shadow-sm p-3 bg-white">
                    <div class="d-flex align-items-center justify-content-between">
                        <div>
                            <span class="text-muted small fw-semibold">Total Jenis Barang</span>
                            <h3 class="fw-bold m-0 mt-1"><?php echo $total_jenis; ?> <span class="fs-6 text-muted font-normal">item</span></h3>
                        </div>
                        <div class="icon-box bg-primary-subtle text-primary">
                            <i class="bi bi-box-seam-fill"></i>
                        </div>
                    </div>
                </div>
            </div>
            
            <div class="col-md-4">
                <div class="card card-stat shadow-sm p-3 bg-white">
                    <div class="d-flex align-items-center justify-content-between">
                        <div>
                            <span class="text-muted small fw-semibold">Total Unit Stok</span>
                            <h3 class="fw-bold m-0 mt-1"><?php echo number_format($total_stok, 0, ',', '.'); ?> <span class="fs-6 text-muted font-normal">pcs</span></h3>
                        </div>
                        <div class="icon-box bg-info-subtle text-info">
                            <i class="bi bi-layers-fill"></i>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-md-4">
                <div class="card card-stat shadow-sm p-3 bg-white">
                    <div class="d-flex align-items-center justify-content-between">
                        <div>
                            <span class="text-muted small fw-semibold">Potensi Keuntungan</span>
                            <h3 class="fw-bold m-0 mt-1 text-success">Rp <?php echo number_format($total_potensi_keuntungan, 0, ',', '.'); ?></h3>
                        </div>
                        <div class="icon-box bg-success-subtle text-success">
                            <i class="bi bi-graph-up-arrow"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Card Tabel utama -->
        <div class="card main-card bg-white">
            <div class="card-header bg-white py-3 px-4 border-0 d-flex flex-wrap align-items-center justify-content-between gap-3">
                <div>
                    <h5 class="fw-bold m-0">Daftar Inventaris Barang</h5>
                    <small class="text-muted">Kelola stok dan harga produk Toko Ardi secara terpusat</small>
                </div>
                
                <div class="d-flex align-items-center gap-2">
                    <!-- Input Pencarian Realtime -->
                    <div class="input-group input-group-sm" style="width: 220px;">
                        <span class="input-group-text bg-light border-end-0"><i class="bi bi-search text-muted"></i></span>
                        <input type="text" id="searchInput" class="form-control bg-light border-start-0" placeholder="Cari barang...">
                    </div>
                    
                    <a href="tambah.php" class="btn btn-primary btn-sm px-3 py-2 fw-semibold rounded-2 d-flex align-items-center gap-1">
                        <i class="bi bi-plus-lg"></i> Tambah Barang
                    </a>
                </div>
            </div>

            <div class="card-body p-0">
                <div class="table-responsive">
                    <table class="table align-middle mb-0" id="barangTable">
                        <thead>
                            <tr>
                                <th class="text-center" style="width: 60px;">No</th>
                                <th>Nama Barang</th>
                                <th class="text-center">Stok</th>
                                <th>Harga Beli</th>
                                <th>Harga Jual</th>
                                <th>Margin/Unit</th>
                                <th class="text-center" style="width: 120px;">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $no = 1;
                            if(!empty($data_barang)){
                                foreach($data_barang as $x){
                                    $margin = $x['harga_jual'] - $x['harga_beli'];
                            ?>
                            <tr>
                                <td class="text-center fw-semibold text-muted"><?php echo $no++; ?></td>
                                <td>
                                    <span class="fw-bold text-dark d-block"><?php echo $x['nama_barang']; ?></span>
                                </td>
                                <td class="text-center">
                                    <span class="badge badge-soft-primary px-3 py-2 rounded-pill fw-semibold">
                                        <?php echo $x['stok']; ?> pcs
                                    </span>
                                </td>
                                <td>
                                    <span class="badge badge-soft-danger px-2 py-1 rounded">
                                        Rp <?php echo number_format($x['harga_beli'],0,',','.'); ?>
                                    </span>
                                </td>
                                <td>
                                    <span class="badge badge-soft-success px-2 py-1 rounded">
                                        Rp <?php echo number_format($x['harga_jual'],0,',','.'); ?>
                                    </span>
                                </td>
                                <td>
                                    <small class="text-muted fw-semibold">+Rp <?php echo number_format($margin,0,',','.'); ?></small>
                                </td>
                                <td class="text-center">
                                    <div class="d-flex justify-content-center gap-2">
                                        <a href="edit.php?id=<?php echo $x['id_barang']; ?>" class="btn btn-warning btn-action text-white" title="Edit Barang">
                                            <i class="bi bi-pencil-fill"></i>
                                        </a>
                                        <a href="hapus.php?id=<?php echo $x['id_barang']; ?>" class="btn btn-danger btn-action" onclick="return confirm('Apakah Anda yakin ingin menghapus data ini?')" title="Hapus Barang">
                                            <i class="bi bi-trash-fill"></i>
                                        </a>
                                    </div>
                                </td>
                            </tr>
                            <?php 
                                }
                            } else {
                                echo "<tr><td colspan='7' class='text-center py-5 text-muted'><i class='bi bi-inbox fs-1 d-block mb-2'></i>Belum ada data barang tersedia</td></tr>";
                            }
                            ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

    <!-- Script Search Real-time -->
    <script>
        document.getElementById('searchInput').addEventListener('keyup', function() {
            let filter = this.value.toLowerCase();
            let rows = document.querySelectorAll('#barangTable tbody tr');
            
            rows.forEach(row => {
                let text = row.textContent.toLowerCase();
                row.style.display = text.includes(filter) ? '' : 'none';
            });
        });
    </script>
</body>
</html>