<div class="container py-5">
    <div class="card shadow-lg border-0 rounded-4">
        <div class="card-body">
            <h1 class="mb-4 text-warning fw-bold text-center">Data Alat</h1>

            <div class="table-responsive">
                <table id="alatTable" class="table table-hover align-middle">
                    <thead class="table-warning text-black">
                        <tr>
                            <th class="text-center">ID</th>
                            <th class="text-center">Nama Alat</th>
                            <th class="text-center">Stok</th>
                            <th class="text-center">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php if (!empty($alat)) : ?>
                        <?php foreach ($alat as $row) : ?>
                        <tr>
                            <td class="text-center"><?= htmlspecialchars($row->id_alat) ?></td>
                            <td class="text-center"><?= htmlspecialchars($row->nama_alat) ?></td>
                            <td class="text-center"><?= htmlspecialchars($row->stok) ?></td>
                            <td class="text-center">
                                <a href="<?= base_url('alat/create/' . $row->id_alat) ?>"
                                    class="btn btn-sm btn-warning text-white rounded-pill">
                                    Ajukan Peminjaman
                                </a>
                            </td>
                        </tr>
                        <?php endforeach; ?>
                        <?php else : ?>
                        <tr>
                            <td colspan="4" class="text-center">Tidak ada data alat.</td>
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

<script src="https://code.jquery.com/jquery-3.7.0.min.js"></script>
<script src="https://cdn.datatables.net/1.13.6/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.13.6/js/dataTables.bootstrap5.min.js"></script>
<script>
$(document).ready(function() {
    $('#alatTable').DataTable({
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