<?php
include "../config/koneksi.php";

$id_user = $_POST['id_user'];
$file = $_FILES['bukti'];

// validasi sederhana
if (!isset($file) || $file['error'] !== UPLOAD_ERR_OK) {
    die("File tidak valid.");
}

$namaFile = time() . "_" . basename($file['name']);
$tujuan = "../uploads/bukti/" . $namaFile;

// upload file
if (!move_uploaded_file($file['tmp_name'], $tujuan)) {
    die("Gagal upload file.");
}

// update database (PDO)
$stmt = $koneksi->prepare("
    UPDATE santri 
    SET bukti_pembayaran = :bukti
    WHERE id_user = :id_user
");

$stmt->execute([
    ':bukti'   => $namaFile,
    ':id_user'=> $id_user
]);

header("Location: ../views/dashboard.php?payment=success");
exit;
