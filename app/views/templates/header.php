<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= $data['judul']; ?></title>
    <link rel="stylesheet" href="<?= BASEURL; ?>/css/bootstrap.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/mazer-admin/dist/assets/css/main/app.css">
	<link rel="stylesheet" href="https://cdn.datatables.net/1.13.4/css/dataTables.bootstrap5.min.css">
    <style>
    /* 1. Reset Dasar */
    body { 
        background-color: #f4f7fe; 
        font-family: 'Poppins', sans-serif; 
        margin: 0;
        overflow-x: hidden; 
        display: flex; /* Menggunakan flexbox untuk layout utama */
    }
    
    /* 2. Sidebar Perbaikan */
    .sidebar { 
        background: linear-gradient(180deg, #1d2671 0%, #3f6ad8 100%); 
        height: 100vh; 
        color: white; 
        width: 260px; 
        position: fixed; /* Tetap fixed agar tidak ikut scroll */
        top: 0;
        left: 0;
        box-shadow: 4px 0 10px rgba(0,0,0,0.1);
        z-index: 100; /* Turunkan sedikit agar dropdown navbar bisa di atasnya */
        overflow-y: auto; 
        display: flex;
        flex-direction: column;
    }

    /* 3. Area Konten Utama (Kunci Perbaikan) */
    .main-content { 
        flex: 1; /* Mengambil sisa ruang secara otomatis */
        margin-left: 260px; /* Jarak wajib setebal sidebar */
        padding: 30px; 
        min-height: 100vh;
        width: calc(100% - 260px); /* Memastikan lebar tetap presisi */
        box-sizing: border-box; /* Mencegah padding menambah lebar elemen */
    }
    
    /* Navbar styling agar terlihat mengapung rapi */
    .navbar { 
        background: #ffffff;
        border-radius: 15px !important; 
        margin-bottom: 30px;
        padding: 15px 25px;
        box-shadow: 0 4px 12px rgba(0,0,0,0.03);
    }

    /* Penyesuaian Nav Link agar tidak rapat */
    .sidebar .nav-link { 
        color: rgba(255,255,255,0.7); 
        margin: 4px 15px; 
        padding: 10px 15px;
        border-radius: 10px;
        font-size: 0.85rem;
        transition: all 0.3s ease;
    }
    
    .sidebar .nav-link:hover, 
    .sidebar .nav-link.active { 
        background: rgba(255,255,255,0.15); 
        color: white;
        font-weight: 500;
    }

    .nav-category {
        padding: 20px 25px 8px;
        font-size: 0.65rem;
        font-weight: 700;
        text-transform: uppercase;
        letter-spacing: 1.5px;
        color: rgba(255,255,255,0.4);
    }

    /* Mencegah elemen table atau card karyawan melebar berlebihan */
    .container-fluid {
        padding: 0;
    }
</style>
</head>
<body>

<div class="sidebar d-none d-md-block">
    <div class="text-center py-4 mb-2">
        <h4 class="fw-bold tracking-wider"><i class="fas fa-truck-fast me-2"></i> JSL LOGISTIK</h4>
        <hr class="mx-4 opacity-25">
    </div>
    
    <ul class="nav flex-column">
        <li class="nav-item">
            <a href="<?= BASEURL; ?>/home" class="nav-link <?= $data['judul'] == 'Dashboard' ? 'active' : ''; ?>">
                <i class="fas fa-grid-2 me-2"></i> Dashboard
            </a>
        </li>

        <div class="nav-category">Keuangan Kas</div>
        <li class="nav-item">
            <a href="<?= BASEURL; ?>/pemasukan" class="nav-link">
                <i class="fas fa-money-bill-trend-up me-2"></i> Kas Masuk
            </a>
        </li>
        <li class="nav-item">
            <a href="<?= BASEURL; ?>/pengeluaran" class="nav-link">
                <i class="fas fa-money-bill-transfer me-2"></i> Kas Keluar
            </a>
        </li>

        <div class="nav-category">Hutang & Piutang</div>
        <li class="nav-item">
            <a href="<?= BASEURL; ?>/hutang" class="nav-link">
                <i class="fas fa-file-invoice-dollar me-2"></i> Monitoring Hutang
            </a>
        </li>
        <li class="nav-item">
            <a href="<?= BASEURL; ?>/piutang" class="nav-link">
                <i class="fas fa-hand-holding-dollar me-2"></i> Monitoring Piutang
            </a>
        </li>

        <div class="nav-category">Operasional</div>
        <li class="nav-item">
            <a href="<?= BASEURL; ?>/armada" class="nav-link">
                <i class="fas fa-truck-moving me-2"></i> Biaya Armada
            </a>
        </li>
        <li class="nav-item">
            <a href="<?= BASEURL; ?>/proyek" class="nav-link">
                <i class="fas fa-chart-pie me-2"></i> Profit Proyek
            </a>
        </li>

        <div class="nav-category">Laporan Berkas</div>
        <li class="nav-item">
            <a href="<?= BASEURL; ?>/laporan/labarugi" class="nav-link">
                <i class="fas fa-file-lines me-2"></i> Laba Rugi
            </a>
        </li>
        <li class="nav-item">
            <a href="<?= BASEURL; ?>/laporan/neraca" class="nav-link">
                <i class="fas fa-scale-balanced me-2"></i> Neraca
            </a>
        </li>

        <div class="nav-category">Master Data</div>
        <li class="nav-item">
            <a href="<?= BASEURL; ?>/karyawan" class="nav-link">
                <i class="fas fa-user-gear me-2"></i> Data Karyawan
            </a>
        </li>
    </ul>
</div>

<div class="main-content">
    <nav class="navbar navbar-expand navbar-light bg-white shadow-sm mb-4">
        <div class="container-fluid">
            <div class="d-flex align-items-center">
                <i class="fas fa-bars me-3 text-muted"></i>
                <span class="navbar-brand mb-0 h1 fs-6 fw-bold text-dark">Sistem Keuangan JSL</span>
            </div>
            <div class="ms-auto d-flex align-items-center">
                <div class="text-end me-3 d-none d-sm-block">
                    <p class="mb-0 small fw-bold text-dark"><?= $_SESSION['nama']; ?></p>
                    <p class="mb-0 text-muted" style="font-size: 0.65rem;">Administrator</p>
                </div>
                <img src="https://ui-avatars.com/api/?name=<?= $_SESSION['nama']; ?>&background=1d2671&color=fff" class="rounded-circle shadow-sm" width="38">
            </div>
        </div>
    </nav>