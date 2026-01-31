<?php
include "../../middleware/auth.php";
include "../../config/koneksi.php";

if ($_SESSION['role'] !== 'admin') {
    header("Location: ../dashboard.php");
    exit;
}

$id = $_GET['id'];

// ===== PENGAMBILAN DATA (PDO) =====
$stmt = $koneksi->prepare("
    SELECT s.*, u.nama_lengkap AS nama_user, u.username
    FROM santri s
    JOIN users u ON s.id_user = u.id_user
    WHERE s.id_santri = :id
");
$stmt->execute([
    ':id' => $id
]);

$data = $stmt->fetch();
// ==================================

include "../layouts/header.php";
include "../layouts/navbar.php";
?>


<div class="container py-5">
    <h3 class="fw-semibold mb-4">Detail Data Santri</h3>

    <div class="card shadow border-0 rounded-4 p-4">

        <p><strong>Nama Akun:</strong> <?= $data['nama_user']; ?> (<?= $data['username']; ?>)</p>
        <p><strong>Nama Santri:</strong> <?= $data['nama_santri']; ?></p>
        <p><strong>Jenis Kelamin:</strong> <?= $data['jenis_kelamin']; ?></p>
        <p><strong>Tempat, Tanggal Lahir:</strong> <?= $data['tempat_lahir']; ?>, <?= $data['tanggal_lahir']; ?></p>
        <p><strong>Alamat:</strong> <?= $data['alamat']; ?></p>
        <p><strong>Ayah:</strong> <?= $data['nama_ayah']; ?></p>
        <p><strong>Ibu:</strong> <?= $data['nama_ibu']; ?></p>
        <p><strong>No HP Orang Tua:</strong> <?= $data['no_hp_orang_tua']; ?></p>
        <div class="mb-3">
            <button class="btn btn-primary me-2" data-bs-toggle="modal" data-bs-target="#modalKK">
                Lihat Kartu Keluarga
            </button>

            <button class="btn btn-primary me-2" data-bs-toggle="modal" data-bs-target="#modalAkta">
                Lihat Akta Kelahiran
            </button>

            <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#modalIjazah">
                Lihat Ijazah / SKL
            </button>
        </div>

        <hr>

        <form action="../../controllers/santri/verifikasi.php" method="POST" class="mt-3">
            <input type="hidden" name="id_santri" value="<?= $data['id_santri']; ?>">

            <?php if ($data['status_verifikasi'] === 'verified'): ?>
                <button class="btn btn-success px-4" disabled>
                    ✔ Terverifikasi
                </button>

            <?php elseif ($data['status_verifikasi'] === 'rejected'): ?>
                <button class="btn btn-danger px-4" disabled>
                    ✖ Ditolak
                </button>

            <?php else: ?>
                <button name="status" value="verified" class="btn btn-success px-4">
                    Verifikasi
                </button>

                <button name="status" value="rejected" class="btn btn-danger px-4 ms-2">
                    Tolak
                </button>
            <?php endif; ?>

            <a href="dashboard_admin.php" class="btn btn-secondary ms-2">Kembali</a>
        </form>
    </div>
</div>

<div class="modal fade" id="modalKK" tabindex="-1">
    <div class="modal-dialog modal-lg modal-dialog-centered">
        <div class="modal-content rounded-4">
            <div class="modal-header">
                <h5 class="modal-title">Kartu Keluarga</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
            </div>
            <div class="modal-body text-center">
                <img src="../../uploads/dokumen/<?= $data['kartu_keluarga']; ?>"
                    class="img-fluid rounded"
                    alt="Kartu Keluarga">
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="modalAkta" tabindex="-1">
    <div class="modal-dialog modal-lg modal-dialog-centered">
        <div class="modal-content rounded-4">
            <div class="modal-header">
                <h5 class="modal-title">Akta Kelahiran</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
            </div>
            <div class="modal-body text-center">
                <img src="../../uploads/dokumen/<?= $data['akta_kelahiran']; ?>"
                    class="img-fluid rounded"
                    alt="Akta Kelahiran">
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="modalIjazah" tabindex="-1">
    <div class="modal-dialog modal-lg modal-dialog-centered">
        <div class="modal-content rounded-4">
            <div class="modal-header">
                <h5 class="modal-title">Ijazah / SKL</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
            </div>
            <div class="modal-body text-center">
                <img src="../../uploads/dokumen/<?= $data['ijazah']; ?>"
                    class="img-fluid rounded"
                    alt="Ijazah / SKL">
            </div>
        </div>
    </div>
</div>

<?php include "../layouts/scripts.php"; ?>

<?php include "../layouts/footer.php"; ?>