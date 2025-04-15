<div class="container py-5">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card shadow-lg border-0 rounded-4">
                <div class="card-body">
                    <h1 class="mb-4 text-warning fw-bold text-center">Edit Alat</h1>
                    <form action="<?= base_url('kelola/update/' . $alat->id_alat) ?>" method="post">
                        <div class="mb-3">
                            <label for="nama_alat" class="form-label fw-semibold">Nama Alat</label>
                            <input type="text" class="form-control rounded-3" id="nama_alat" name="nama_alat"
                                value="<?= htmlspecialchars($alat->nama_alat) ?>" placeholder="Masukkan nama alat"
                                required>
                        </div>

                        <div class="mb-3">
                            <label for="stok" class="form-label fw-semibold">Stok</label>
                            <input type="number" class="form-control rounded-3" id="stok" name="stok"
                                value="<?= htmlspecialchars($alat->stok) ?>" placeholder="Masukkan stok" required>
                        </div>

                        <div class="d-flex justify-content-between mt-4">
                            <a href="<?= base_url('kelola') ?>" class="btn btn-secondary rounded-pill px-4">
                                <i class="bi bi-arrow-left-circle me-1"></i> Kembali
                            </a>
                            <button type="submit" class="btn btn-primary rounded-pill px-4">
                                <i class="bi bi-save2 me-1"></i> Update
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>