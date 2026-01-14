<?php
session_start();
include "../../config/koneksi.php";

$id_user = $_SESSION['user_id'];

$jawaban_user = $_POST['jawaban'] ?? [];

// ambil soal & kunci jawaban (PDO)
$stmt = $koneksi->query("SELECT id_soal, jawaban FROM soal_ujian");
$soal = $stmt->fetchAll();

$benar = 0;
$salah = 0;

foreach ($soal as $row) {
    $id    = $row['id_soal'];
    $kunci = strtolower($row['jawaban']);

    if (isset($jawaban_user[$id]) && strtolower($jawaban_user[$id]) === $kunci) {
        $benar++;
    } else {
        $salah++;
    }
}

$skor = $benar * 10;
$status = ($skor > 70) ? 'Lulus' : 'Tidak Lulus';

// update nilai ujian santri (PDO)
$stmtUpdate = $koneksi->prepare("
    UPDATE santri
    SET nilai_ujian = :nilai,
        status_kelulusan = :status
    WHERE id_user = :id_user
");

$stmtUpdate->execute([
    ':nilai'   => $skor,
    ':status'  => $status,
    ':id_user' => $id_user
]);

header("Location: ../../views/hasil_ujian.php?skor=$skor&benar=$benar&salah=$salah&status=$status");
exit;
