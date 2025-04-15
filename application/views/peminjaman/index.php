<div class="container py-5">
    <div class="card shadow-lg border-0 rounded-4">
        <div class="card-body">
            <h1 class="mb-4 text-warning fw-bold text-center">Data Peminjaman</h1>

            <div class="table-responsive">
                <table id="peminjamanTable" class="table table-hover align-middle">
                    <thead class="table-warning text-black">
                        <tr>
                            <th>ID</th>
                            <th>Tanggal Peminjaman</th>
                            <th>Tanggal Pengembalian</th>
                            <th>Kuantitas</th>
                            <th>Status</th>
                            <th>Peminjam</th>
                            <th>Alat</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php if (!empty($peminjaman)) : ?>
                        <?php foreach ($peminjaman as $row) : ?>
                        <tr>
                            <td><?= htmlspecialchars($row->id_peminjaman) ?></td>
                            <td><?= htmlspecialchars($row->tanggal_peminjaman) ?></td>
                            <td><?= htmlspecialchars($row->tanggal_pengembalian) ?></td>
                            <td><?= htmlspecialchars($row->kuantitas) ?></td>
                            <td>
                                <span
                                    class="badge bg-<?= $row->status === 'ditolak' ? 'danger' : ($row->status === 'dipinjam' ? 'success' : 'secondary') ?>">
                                    <?= htmlspecialchars($row->status) ?>
                                </span>
                            </td>
                            <td><?= htmlspecialchars($row->nim) ?></td>
                            <td><?= htmlspecialchars($row->nama_alat) ?></td>
                        </tr>
                        <?php endforeach; ?>
                        <?php else : ?>
                        <tr>
                            <td colspan="7" class="text-center">Tidak ada data peminjaman.</td>
                        </tr>
                        <?php endif; ?>
                    </tbody>
                </table>
            </div>

            <div class="mt-4">
                <a href="<?= base_url('dashboard') ?>" class="btn btn-danger rounded-pill px-4">
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
    $('#peminjamanTable').DataTable({
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