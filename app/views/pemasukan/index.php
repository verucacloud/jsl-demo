<div class="container-fluid px-4 mt-4">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <div>
            <h3 class="fw-bold text-dark mb-0">Daftar Kas Masuk JSL</h3>
            <p class="text-muted small">Kelola data keuangan logistik dengan tampilan modern.</p>
        </div>
        <button type="button" class="btn btn-primary px-4 shadow-sm" style="border-radius: 10px; z-index: 10;" data-bs-toggle="modal" data-bs-target="#modalTambah">
            <i class="fas fa-plus-circle me-2"></i> Tambah Kas
        </button>
    </div>

    <div class="card border-0 shadow-sm mb-5" style="border-radius: 15px;">
        <div class="card-body p-4">
            <div class="table-responsive">
                <table class="table table-hover align-middle" id="table1" style="width:100%">
                    <thead class="table-light">
                        <tr>
                            <th class="py-3 ps-3">NO</th>
                            <th class="py-3">TANGGAL</th>
                            <th class="py-3">JUMLAH NOMINAL</th>
                            <th class="py-3 pe-3">KATEGORI SUMBER</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $i = 1; foreach($data['pemasukan'] as $row) : ?>
                        <tr>
                            <td class="ps-3 fw-bold text-muted"><?= $i++; ?></td>
                            <td>
                                <span class="badge bg-light text-primary border p-2" style="border-radius: 6px;">
                                    <i class="far fa-calendar-alt me-1"></i> <?= date('d-m-Y', strtotime($row['tgl_pemasukan'])); ?>
                                </span>
                            </td>
                            <td class="fw-bold text-dark">Rp <?= number_format($row['jumlah'], 0, ',', '.'); ?></td>
                            <td class="pe-3 text-secondary">
                                <span class="d-inline-block bg-primary rounded-circle me-2" style="width: 8px; height: 8px;"></span>
                                <?php 
                                    $sumber = [
                                        1 => 'Jasa Pengiriman', 2 => 'Biaya Pengiriman', 
                                        3 => 'Handling Fee', 4 => 'Biaya Administrasi Dokumen',
                                        5 => 'Jasa Pengurusan Bea Cukai', 6 => 'Asuransi', 7 => 'Biaya Tambahan Lain'
                                    ];
                                    echo $sumber[$row['id_sumber']] ?? 'Lainnya';
                                ?>
                            </td>
                        </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="modalTambah" tabindex="-1" aria-labelledby="judulModal" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content border-0 shadow-lg" style="border-radius: 20px;">
            <div class="modal-header border-0 pt-4 px-4">
                <h5 class="modal-title fw-bold">Tambah Transaksi Baru</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="<?= BASEURL; ?>/pemasukan/tambah" method="post">
                <div class="modal-body px-4">
                    <div class="mb-4">
                        <label class="form-label small fw-bold text-muted text-uppercase">Tanggal</label>
                        <input type="date" name="tgl_pemasukan" class="form-control form-control-lg border-2" value="<?= date('Y-m-d'); ?>" style="border-radius: 12px;" required>
                    </div>
                    <div class="mb-4">
                        <label class="form-label small fw-bold text-muted text-uppercase">Jumlah (Rp)</label>
                        <input type="text" id="jumlah_mask" class="form-control form-control-lg border-2" placeholder="Contoh: 1.000.000" style="border-radius: 12px;" required autocomplete="off">
                        <input type="hidden" name="jumlah" id="jumlah">
                    </div>
                    <div class="mb-3">
                        <label class="form-label small fw-bold text-muted text-uppercase">Sumber Pendapatan</label>
                        <select class="form-select form-select-lg border-2" name="id_sumber" style="border-radius: 12px;" required>
                            <option value="">-- Pilih Sumber --</option>
                            <option value="1">Jasa Pengiriman</option>
							<option value="2">Biaya Pengiriman</option>
                            <option value="3">Handling Fee</option>
                            <option value="4">Biaya Administrasi Dokumen</option>
                            <option value="5">Jasa Pengurusan Bea Cukai</option>
                            <option value="6">Asuransi</option>
                            <option value="7">Biaya Tambahan Lain</option>
                        </select>
                    </div>
                </div>
                <div class="modal-footer border-0 pb-4 px-4">
                    <button type="button" class="btn btn-light fw-bold px-4" data-bs-dismiss="modal">Batal</button>
                    <button type="submit" class="btn btn-primary fw-bold px-4 shadow" style="border-radius: 10px;">Simpan Data</button>
                </div>
            </form>
        </div>
    </div>
</div>

<script>
    // Pastikan ID elemen sesuai dengan yang ada di HTML
    const inputMask = document.getElementById('jumlah_mask');
    const inputReal = document.getElementById('jumlah');

    if(inputMask) {
        inputMask.addEventListener('keyup', function(e) {
            let value = this.value.replace(/[^0-9]/g, '');
            inputReal.value = value;
            if (value) {
                this.value = value.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ".");
            }
        });
    }
</script>