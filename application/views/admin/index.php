<div class="container-fluid bg-white min-vh-100 d-flex align-items-center justify-content-center">
    <div class="container py-5">
        <h1 class="text-center mb-5 fw-bold text-warning">Dashboard Admin</h1>

        <div class="row justify-content-center g-4">
            <div class="col-md-4">
                <div class="card border-0 rounded-4 shadow-sm h-100 text-center bg-light">
                    <div class="card-body d-flex flex-column justify-content-center">
                        <h5 class="card-title fw-semibold text-black mb-4">Kelola Data Alat</h5>
                        <a href="<?= site_url('kelola') ?>"
                            class="btn btn-warning text-white shadow-sm px-4 rounded-pill">
                            Lihat
                        </a>
                    </div>
                </div>
            </div>

            <div class="col-md-4">
                <div class="card border-0 rounded-4 shadow-sm h-100 text-center bg-light">
                    <div class="card-body d-flex flex-column justify-content-center">
                        <h5 class="card-title fw-semibold text-black mb-4">Verifikasi Permintaan Peminjaman</h5>
                        <a href="<?= site_url('verifikasi') ?>"
                            class="btn btn-warning text-white shadow-sm px-4 rounded-pill">
                            Lihat
                        </a>
                    </div>
                </div>
            </div>
        </div>

        <div class="text-center mt-5">
            <a href="<?= base_url('auth/logout') ?>" class="text-danger text-decoration-none fw-semibold">
                <i class="bi bi-box-arrow-right me-2"></i>Log Out
            </a>
        </div>
    </div>
</div>