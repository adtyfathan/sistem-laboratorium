<div class="container py-5">
    <div class="card shadow-lg border-0 rounded-4 p-4">
        <h1 class="mb-4 text-warning fw-bold text-center">Lakukan Peminjaman</h1>

        <?php if ($this->session->flashdata('error')): ?>
        <div class="alert alert-danger rounded-3">
            <?= $this->session->flashdata('error'); ?>
        </div>
        <?php endif; ?>

        <form action="<?= base_url('alat/store/' . $alat->id_alat) ?>" method="post">

            <div class="mb-3">
                <label for="tanggal_peminjaman" class="form-label text-dark">Tanggal Peminjaman</label>
                <input type="date" class="form-control shadow-sm rounded-3" id="tanggal_peminjaman"
                    name="tanggal_peminjaman" placeholder="Masukkan tanggal peminjaman" required>
            </div>

            <div class="mb-3">
                <label for="tanggal_pengembalian" class="form-label text-dark">Tanggal Pengembalian</label>
                <input type="date" class="form-control shadow-sm rounded-3" id="tanggal_pengembalian"
                    name="tanggal_pengembalian" placeholder="Masukkan tanggal pengembalian" required>
            </div>

            <div class="mb-3">
                <label for="kuantitas" class="form-label text-dark">Kuantitas</label>
                <input type="number" class="form-control shadow-sm rounded-3" id="kuantitas" name="kuantitas"
                    placeholder="Masukkan kuantitas" required>
            </div>

            <input type="hidden" name="id_user" value="<?= $this->session->userdata('id_user'); ?>">

            <div class="d-flex justify-content-between mt-4">
                <a href="<?= base_url('alat') ?>" class="btn btn-outline-secondary px-4 rounded-pill">
                    <i class="bi bi-arrow-left-circle me-1"></i> Kembali
                </a>
                <button type="submit" class="btn btn-warning text-white px-4 rounded-pill shadow-sm">
                    <i class="bi bi-check-circle me-1"></i> Simpan
                </button>
            </div>
        </form>
    </div>
</div>