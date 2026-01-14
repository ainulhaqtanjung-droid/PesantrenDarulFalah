<?php
include "../../config/koneksi.php";
session_start();

if ($_SESSION['role'] !== 'admin') {
    header("Location: ../../views/dashboard.php");
    exit;
}

$id_santri = $_POST['id_santri'];
$status    = $_POST['status'];

$stmt = $koneksi->prepare("
    UPDATE santri 
    SET status_verifikasi = :status
    WHERE id_santri = :id_santri
");

$success = $stmt->execute([
    ':status'     => $status,
    ':id_santri'  => $id_santri
]);

if ($success) {
    header("Location: ../../views/admin/dashboard_admin.php");
    exit;
} else {
    die("Gagal memperbarui status verifikasi.");
}
