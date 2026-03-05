<div class="row g-3 mb-4">
    <div class="col-md-3">
        <div class="card card-stats border-0 shadow-sm p-3 border-success">
            <div class="d-flex justify-content-between align-items-center">
                <div>
                    <p class="text-muted small mb-1">PENDAPATAN (HARI INI)</p>
                    <h5 class="fw-bold mb-0">Rp <?= number_format($data['pemasukan_hari_ini'] ?? 0, 0, ',', '.'); ?></h5>
                </div>
                <i class="fas fa-calendar-day fa-2x text-light"></i>
            </div>
            <div class="mt-3 small text-muted">Mingguan : Rp <?= number_format($data['pemasukan_mingguan'] ?? 0, 0, ',', '.'); ?></div>
        </div>
    </div>
    
    <div class="col-md-3">
        <div class="card card-stats border-0 shadow-sm p-3 border-danger">
            <div class="d-flex justify-content-between align-items-center">
                <div>
                    <p class="text-muted small mb-1">PENGELUARAN (HARI INI)</p>
                    <h5 class="fw-bold mb-0">Rp <?= number_format($data['pengeluaran_hari_ini'] ?? 0, 0, ',', '.'); ?></h5>
                </div>
                <i class="fas fa-dollar-sign fa-2x text-light"></i>
            </div>
            <div class="mt-3 small text-muted">Mingguan : Rp <?= number_format($data['pengeluaran_mingguan'] ?? 0, 0, ',', '.'); ?></div>
        </div>
    </div>

    <div class="col-md-3">
        <div class="card card-stats border-0 shadow-sm p-3 border-info">
            <div class="d-flex justify-content-between align-items-center">
                <div>
                    <p class="text-muted small mb-1">SISA UANG</p>
                    <h5 class="fw-bold mb-0 text-info">Rp <?= number_format($data['sisa_saldo'] ?? 0, 0, ',', '.'); ?></h5>
                </div>
                <i class="fas fa-wallet fa-2x text-light"></i>
            </div>
            <div class="progress mt-3" style="height: 5px;">
                <?php 
                    $persen = ($data['total_pemasukan'] > 0) ? ($data['sisa_saldo'] / $data['total_pemasukan']) * 100 : 0;
                ?>
                <div class="progress-bar bg-info" style="width: <?= $persen ?>%"></div>
            </div>
        </div>
    </div>

    <div class="col-md-3">
        <div class="card card-stats border-0 shadow-sm p-3 border-primary">
            <div class="d-flex justify-content-between align-items-center">
                <div>
                    <p class="text-muted small mb-1">KARYAWAN</p>
                    <h5 class="fw-bold mb-0"><?= $data['jumlah_karyawan'] ?? 0 ?></h5>
                </div>
                <i class="fas fa-user-friends fa-2x text-light"></i>
            </div>
        </div>
    </div>
</div>

<div class="row">
    <div class="col-md-8">
        <div class="card border-0 shadow-sm p-4 h-100">
            <h6 class="fw-bold mb-4">Pendapatan Minggu Ini</h6>
            <div style="height: 300px; position: relative;">
                <canvas id="lineChart"></canvas>
            </div>
        </div>
    </div>
    <div class="col-md-4">
        <div class="card border-0 shadow-sm p-4 h-100">
            <h6 class="fw-bold mb-4">Perbandingan</h6>
            <div style="height: 300px; position: relative;">
                <canvas id="pieChart"></canvas>
            </div>
        </div>
    </div>
</div>