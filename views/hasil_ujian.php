<?php
include "../middleware/auth.php";
include "layouts/header.php";
include "layouts/navbar.php";

$skor = $_GET['skor'];
$benar = $_GET['benar'] ?? 0;
$salah = $_GET['salah'] ?? 0;
$status = $_GET['status'];
?>

<div class="container py-5">
    <div class="card shadow-lg p-4 border-0 rounded-4 text-center">
        <h3 class="fw-semibold mb-4">Hasil Ujian Santri Baru</h3>

        <p class="fs-4 fw-bold">Nilai Anda: <?= $skor ?></p>

        <?php if (isset($_GET['benar'], $_GET['salah'])): ?>
            <p>Benar: <?= $benar ?> | Salah: <?= $salah ?></p>
        <?php endif; ?>

        <p class="fs-5 fw-semibold mt-3">
            Status Kelulusan:
            <span class="<?= ($status == 'Lulus') ? 'text-success' : 'text-danger' ?>">
                <?= $status ?>
            </span>
        </p>

        <a href="dashboard.php" class="btn btn-primary rounded-3 px-4 mt-4">Kembali ke Dashboard</a>
    </div>
</div>

<?php include "layouts/footer.php"; ?>