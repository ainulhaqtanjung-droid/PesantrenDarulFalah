<?php
include "../middleware/auth.php";
include "layouts/header.php";
include "layouts/navbar.php";
include "../config/koneksi.php";

$id_user = $_SESSION['user_id'];

// PDO query
$stmt = $koneksi->prepare("
    SELECT nilai_ujian, status_kelulusan, status_verifikasi, bukti_pembayaran
    FROM santri
    WHERE id_user = :id_user
");
$stmt->execute([
    ':id_user' => $id_user
]);

$santri = $stmt->fetch();
?>

<div class="container py-5">
    <div class="card shadow border-0 rounded-4 p-4">
        <h3 class="fw-semibold mb-3">Dashboard Santri</h3>

        <p>Selamat datang, <strong><?= $_SESSION['nama_lengkap']; ?></strong></p>

        <hr>

        <?php if (!$santri) : ?>

            <a href="santri_create.php" class="btn btn-primary rounded-3 px-4 fw-semibold">
                Isi Data Lengkap Santri
            </a>

        <?php else : ?>

            <?php if ($santri['status_verifikasi'] !== null) : ?>

                <?php if ($santri['status_verifikasi'] === 'verified') : ?>

                    <?php if ($santri['nilai_ujian'] === null) : ?>

                        <p class="mb-3">Anda belum mengikuti ujian seleksi.</p>

                        <a href="ujian.php" class="btn btn-primary rounded-3 px-4 fw-semibold">
                            Mulai Ujian Seleksi
                        </a>

                    <?php else : ?>

                        <p class="fs-5">Nilai Ujian: <strong><?= $santri['nilai_ujian'] ?></strong></p>

                        <p class="fs-5">
                            Status Kelulusan:
                            <strong class="<?= ($santri['status_kelulusan'] == 'Lulus') ? 'text-success' : 'text-danger' ?>">
                                <?= $santri['status_kelulusan'] ?>
                            </strong>
                        </p>

                        <a href="hasil_ujian.php?skor=<?= $santri['nilai_ujian'] ?>&status=<?= $santri['status_kelulusan'] ?>"
                            class="btn btn-secondary rounded-3 px-4 fw-semibold">
                            Lihat Hasil Ujian
                        </a>

                        <hr class="mt-4">

                        <?php if ($santri['bukti_pembayaran'] == null && $santri['status_kelulusan'] == 'Lulus') : ?>

                            <button class="btn btn-warning px-4 fw-semibold" data-bs-toggle="modal" data-bs-target="#modalPembayaran">
                                Pembayaran Uang Masuk
                            </button>

                        <?php elseif ($santri['bukti_pembayaran'] !== null && $santri['status_kelulusan'] == 'Lulus') : ?>

                            <button class="btn btn-success px-4 fw-semibold" data-bs-toggle="modal" data-bs-target="#modalBukti">
                                Lihat Bukti Pembayaran
                            </button>

                        <?php endif; ?>

                    <?php endif; ?>

                <?php else : ?>

                    <p class="fs-5">
                        Status Verifikasi Data:
                        <strong class="<?= ($santri['status_verifikasi'] == 'verified') ? 'text-success' : 'text-danger' ?>">
                            <?= ucfirst($santri['status_verifikasi']) ?>
                        </strong>
                    </p>

                <?php endif; ?>

            <?php endif; ?>

        <?php endif; ?>
    </div>
</div>

<div class="modal fade" id="modalPembayaran" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content rounded-4">

            <div class="modal-header">
                <h5 class="modal-title fw-semibold">Pembayaran Uang Masuk</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
            </div>

            <div class="modal-body">
                <p class="mb-3 fs-5">
                    Total Pembayaran: <strong class="text-primary">Rp 3.500.000</strong>
                </p>

                <form action="../controllers/pembayaran.php" method="POST" enctype="multipart/form-data">
                    <input type="hidden" name="id_user" value="<?= $_SESSION['user_id']; ?>">

                    <label class="fw-semibold">Upload Bukti Pembayaran:</label>
                    <input type="file" name="bukti" class="form-control mt-2" accept="image/*" required>

                    <button type="submit" class="btn btn-success w-100 mt-4">
                        Upload Pembayaran
                    </button>
                </form>
            </div>

        </div>
    </div>
</div>

<div class="modal fade" id="modalBukti" tabindex="-1">
    <div class="modal-dialog modal-dialog-centered modal-lg">
        <div class="modal-content rounded-4 shadow">
            <div class="modal-header">
                <h5 class="modal-title">
                    Bukti Pembayaran
                </h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
            </div>

            <div class="modal-body text-center">
                <img src="../uploads/bukti/<?= $santri['bukti_pembayaran']; ?>"
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

<?php include "layouts/scripts.php"; ?>

<?php include "layouts/footer.php"; ?>
