<?php
include "../../middleware/auth.php";
include "../../config/koneksi.php";

// cek role
if ($_SESSION['role'] !== 'admin') {
    header("Location: ../dashboard.php");
    exit;
}

// ambil semua santri (PDO)
$stmt = $koneksi->query("
    SELECT 
        u.username,
        u.nama_lengkap AS nama_user,
        s.id_santri,
        s.nama_santri,
        s.status_verifikasi,
        s.status_kelulusan,
        s.bukti_pembayaran
    FROM users u
    LEFT JOIN santri s ON u.id_user = s.id_user
    WHERE u.role = 'santri'
");

$result = $stmt->fetchAll();

include "../layouts/header.php";
include "../layouts/navbar.php";
?>


<div class="container py-5">
    <h3 class="fw-semibold mb-4">Dashboard Admin - Data Santri</h3>

    <div class="card shadow border-0 rounded-4 p-4">
        <table id="tabelSantri" class="table table-bordered table-striped">
            <thead class="table-primary">
                <tr>
                    <th>Username</th>
                    <th>Nama User</th>
                    <th>Nama Santri</th>
                    <th>Status Data Lengkap</th>
                    <th>Status Verifikasi</th>
                    <th>Status Kelulusan</th>
                    <th>Status Pembayaran</th>
                    <th>Aksi Pembayaran</th>
                    <th>Aksi</th>
                </tr>
            </thead>

            <tbody>
                <?php foreach ($result as $row): ?>
                    <tr>
                        <td><?= $row['username']; ?></td>
                        <td><?= $row['nama_user']; ?></td>

                        <td>
                            <?= $row['nama_santri'] ? $row['nama_santri'] : '<span class="text-danger">Belum diisi</span>'; ?>
                        </td>

                        <td>
                            <?= $row['id_santri'] ?
                                '<span class="badge bg-success">Lengkap</span>' :
                                '<span class="badge bg-warning text-dark">Belum Lengkap</span>'; ?>
                        </td>

                        <td>
                            <?php
                            if (!$row['id_santri']) {
                                echo "-";
                            } else {
                                if ($row['status_verifikasi'] == 'pending') {
                                    echo '<span class="badge bg-secondary">Pending</span>';
                                } elseif ($row['status_verifikasi'] == 'verified') {
                                    echo '<span class="badge bg-success">Terverifikasi</span>';
                                } else {
                                    echo '<span class="badge bg-danger">Ditolak</span>';
                                }
                            }
                            ?>
                        </td>

                        <td>
                            <?php
                            if (!$row['id_santri']) {
                                echo "-";
                            } else {
                                if ($row['status_kelulusan'] == 'Belum Ujian') {
                                    echo '<span class="badge bg-secondary">Belum Ujian</span>';
                                } elseif ($row['status_kelulusan'] == 'Lulus') {
                                    echo '<span class="badge bg-success">Lulus</span>';
                                } else {
                                    echo '<span class="badge bg-danger">Tidak Lulus</span>';
                                }
                            }
                            ?>
                        </td>

                        <td>
                            <?php
                            if ($row['bukti_pembayaran'] == null) {
                                echo '<span class="badge bg-danger">Belum Bayar</span>';
                            } else {
                                echo '<span class="badge bg-success">Sudah Lunas</span>';
                            }
                            ?>
                        </td>

                        <td>
                            <?php if ($row['bukti_pembayaran']): ?>
                                <button class="btn btn-sm btn-info"
                                    data-bs-toggle="modal"
                                    data-bs-target="#modalBukti<?= $row['id_santri']; ?>">
                                    Lihat Bukti
                                </button>
                            <?php else: ?>
                                <span class="text-muted">Tidak Ada</span>
                            <?php endif; ?>
                        </td>

                        <td>
                            <?php if ($row['id_santri']): ?>
                                <a href="santri_detail.php?id=<?= $row['id_santri']; ?>"
                                    class="btn btn-sm btn-primary">
                                    Lihat Detail
                                </a>
                            <?php else: ?>
                                <span class="text-muted small">Tidak ada data</span>
                            <?php endif; ?>
                        </td>
                    </tr>

                    <div class="modal fade" id="modalBukti<?= $row['id_santri']; ?>" tabindex="-1">
                        <div class="modal-dialog modal-dialog-centered modal-lg">
                            <div class="modal-content rounded-4 shadow">
                                <div class="modal-header">
                                    <h5 class="modal-title">
                                        Bukti Pembayaran - <?= $row['nama_santri']; ?>
                                    </h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                                </div>

                                <div class="modal-body text-center">
                                    <img src="../../uploads/bukti/<?= $row['bukti_pembayaran']; ?>"
                                        class="img-fluid rounded"
                                        alt="Bukti Pembayaran">
                                </div>

                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">
                                        Tutup
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                <?php endforeach; ?>
            </tbody>


        </table>
    </div>
</div>

<?php include "../layouts/scripts.php"; ?>

<script>
    $(document).ready(function() {
        $('#tabelSantri').DataTable({
            responsive: true,
            pageLength: 10,
            lengthMenu: [5, 10, 20, 50, 100],
            ordering: true,
            autoWidth: false
        });
    });
</script>

<?php include "../layouts/footer.php"; ?>