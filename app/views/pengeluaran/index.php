<div class="container-fluid px-4 mt-4">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <div>
            <h3 class="fw-bold text-dark mb-0">Daftar Kas Keluar JSL</h3>
            <p class="text-muted small">Catat dan pantau seluruh pengeluaran operasional armada.</p>
        </div>
        <button type="button" class="btn btn-danger px-4 shadow-sm" style="border-radius: 10px; z-index: 10;" data-bs-toggle="modal" data-bs-target="#modalKeluar">
            <i class="fas fa-minus-circle me-2"></i> Catat Pengeluaran
        </button>
    </div>

    <div class="card border-0 shadow-sm mb-5" style="border-radius: 15px;">
        <div class="card-body p-4">
            <div class="table-responsive">
                <table class="table table-hover align-middle" id="tableKeluar" style="width:100%">
                    <thead class="table-light">
                        <tr>
                            <th class="py-3 ps-3">NO</th>
                            <th class="py-3">TANGGAL</th>
                            <th class="py-3">JUMLAH KELUAR</th>
                            <th class="py-3 pe-3">KEPERLUAN / ARMADA</th>
                        </tr>
                    </thead>
                    <tbody>
						<?php $i = 1; foreach($data['pengeluaran'] as $row) : ?>
						<tr>
							<td class="ps-3 fw-bold text-muted"><?= $i++; ?></td>
							<td>
								<span class="badge bg-light text-danger border p-2" style="border-radius: 6px;">
									<i class="far fa-calendar-alt me-1"></i> <?= date('d-m-Y', strtotime($row['tgl_pengeluaran'])); ?>
								</span>
							</td>
							<td class="fw-bold text-dark">Rp <?= number_format($row['jumlah'], 0, ',', '.'); ?></td>
							<td class="pe-3 text-secondary">
								<span class="d-inline-block bg-danger rounded-circle me-2" style="width: 8px; height: 8px;"></span>
								<?php 
									// Mencocokkan ID dari gambar ke tampilan tabel
									$sumber_keluar = [
										10 => 'Sewa Armada',
										11 => 'Gaji Supir',
										12 => 'Bongkar Muat',
										13 => 'Gaji Admin',
										14 => 'Listrik',
										15 => 'Internet',
										16 => 'Servis Kendaraan',
										17 => 'Pajak',
										18 => 'Biaya Tambahan Lain'
									];
									// Mengambil nama berdasarkan id_sumber, jika tidak ada tampilkan 'Pengeluaran Lain'
									echo $sumber_keluar[$row['id_sumber']] ?? 'Pengeluaran Lain';
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

<div class="modal fade" id="modalKeluar" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content border-0 shadow-lg" style="border-radius: 20px;">
            <div class="modal-header border-0 pt-4 px-4">
                <h5 class="modal-title fw-bold text-danger">Catat Pengeluaran Baru</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="<?= BASEURL; ?>/pengeluaran/tambah" method="post">
                <div class="modal-body px-4">
                    <div class="mb-4">
                        <label class="form-label small fw-bold text-muted text-uppercase">Tanggal Keluar</label>
                        <input type="date" name="tgl_pengeluaran" class="form-control form-control-lg border-2" value="<?= date('Y-m-d'); ?>" style="border-radius: 12px;" required>
                    </div>
                    <div class="mb-4">
                        <label class="form-label small fw-bold text-muted text-uppercase">Nominal (Rp)</label>
                        <input type="text" id="jumlah_mask_keluar" class="form-control form-control-lg border-2 text-danger fw-bold" placeholder="0" style="border-radius: 12px;" required autocomplete="off">
                        <input type="hidden" name="jumlah" id="jumlah_keluar">
                    </div>
                    <div class="mb-3">
						<label class="form-label small fw-bold text-muted text-uppercase">Kategori Pengeluaran</label>
						<select class="form-select form-select-lg border-2" name="id_sumber" style="border-radius: 12px;" required>
							<option value="">-- Pilih Kategori --</option>
							<option value="10">Sewa Armada</option>
							<option value="11">Gaji Supir</option>
							<option value="12">Bongkar Muat</option>
							<option value="13">Gaji Admin</option>
							<option value="14">Listrik</option>
							<option value="15">Internet</option>
							<option value="16">Servis Kendaraan</option>
							<option value="17">Pajak</option>
							<option value="18">Biaya Tambahan Lain</option>
						</select>
					</div>
                </div>
                <div class="modal-footer border-0 pb-4 px-4">
                    <button type="button" class="btn btn-light fw-bold px-4" data-bs-dismiss="modal">Batal</button>
                    <button type="submit" class="btn btn-danger fw-bold px-4 shadow" style="border-radius: 10px;">Simpan Pengeluaran</button>
                </div>
            </form>
        </div>
    </div>
</div>

<script>
    const inputMaskKeluar = document.getElementById('jumlah_mask_keluar');
    const inputRealKeluar = document.getElementById('jumlah_keluar');

    if(inputMaskKeluar) {
        inputMaskKeluar.addEventListener('keyup', function(e) {
            let value = this.value.replace(/[^0-9]/g, '');
            inputRealKeluar.value = value;
            if (value) {
                this.value = value.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ".");
            }
        });
    }
</script>