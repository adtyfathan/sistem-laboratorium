<div class="container py-5">
    <div class="card shadow-lg border-0 rounded-4">
        <div class="card-body">
            <h1 class="mb-4 text-warning fw-bold text-center">Data Verifikasi</h1>

            <div class="table-responsive">
                <table id="verifikasiTable" class="table table-hover align-middle">
                    <thead class="table-warning text-black">
                        <tr>
                            <th class="text-center">ID</th>
                            <th class="text-center">Status</th>
                            <th class="text-center">Tanggal Verifikasi</th>
                            <th class="text-center">NIM</th>
                            <th class="text-center">Id Peminjaman</th>
                            <th class="text-center">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php if (!empty($verifikasi)) : ?>
                        <?php foreach ($verifikasi as $row) : ?>
                        <tr>
                            <td class="text-center"><?= htmlspecialchars($row->id_verifikasi) ?></td>
                            <td class="text-center">
                                <span
                                    class="badge bg-<?= $row->status === 'pending' ? 'warning text-dark' : ($row->status === 'disetujui' ? 'success' : 'danger') ?>">
                                    <?= htmlspecialchars($row->status) ?>
                                </span>
                            </td>
                            <td class="text-center"><?= htmlspecialchars($row->tanggal_verifikasi) ?></td>
                            <td class="text-center"><?= htmlspecialchars($row->nim) ?></td>
                            <td class="text-center"><?= htmlspecialchars($row->id_peminjaman) ?></td>
                            <td class="text-center">
                                <?php if ($row->status === "pending") : ?>
                                <a href="<?= base_url('verifikasi/acc/' . $row->id_verifikasi) ?>"
                                    class="btn btn-success btn-sm rounded-pill px-3 mb-1">
                                    <i class="bi bi-check-circle me-1"></i>Setujui
                                </a>
                                <a href="<?= base_url('verifikasi/decline/' . $row->id_verifikasi) ?>"
                                    class="btn btn-danger btn-sm rounded-pill px-3">
                                    <i class="bi bi-x-circle me-1"></i>Tolak
                                </a>
                                <?php else : ?>
                                <p class="mb-0"><?= htmlspecialchars($row->status) ?></p>
                                <?php endif; ?>
                            </td>
                        </tr>
                        <?php endforeach; ?>
                        <?php else : ?>
                        <tr>
                            <td colspan="6" class="text-center">Tidak ada data verifikasi.</td>
                        </tr>
                        <?php endif; ?>
                    </tbody>
                </table>
            </div>

            <div class="mt-4">
                <a href="<?= base_url('admin') ?>" class="btn btn-danger rounded-pill px-4">
                    <i class="bi bi-arrow-left-circle me-1"></i> Kembali
                </a>
            </div>
        </div>
    </div>
</div>

<!-- DataTables Scripts -->
<script src="https://code.jquery.com/jquery-3.7.0.min.js"></script>
<script src="https://cdn.datatables.net/1.13.6/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.13.6/js/dataTables.bootstrap5.min.js"></script>
<script>
$(document).ready(function() {
    $('#verifikasiTable').DataTable({
        language: {
            search: "Cari:",
            lengthMenu: "Tampilkan _MENU_ entri",
            info: "Menampilkan _START_ sampai _END_ dari _TOTAL_ entri",
            paginate: {
                previous: "Sebelumnya",
                next: "Berikutnya"
            }
        }
    });
});
</script>