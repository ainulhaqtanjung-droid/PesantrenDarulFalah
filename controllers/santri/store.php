<?php
include "../../config/koneksi.php";
session_start();

$id_user = $_SESSION['user_id'];

$nama_santri        = $_POST['nama_santri'];
$jenis_kelamin      = $_POST['jenis_kelamin'];
$tempat_lahir       = $_POST['tempat_lahir'];
$tanggal_lahir      = $_POST['tanggal_lahir'];
$alamat              = $_POST['alamat'];
$nama_ayah          = $_POST['nama_ayah'];
$nama_ibu           = $_POST['nama_ibu'];
$no_hp_orang_tua     = $_POST['no_hp_orang_tua'];

$stmt = $koneksi->prepare("
    INSERT INTO santri
    (id_user, nama_santri, jenis_kelamin, tempat_lahir, tanggal_lahir, alamat, nama_ayah, nama_ibu, no_hp_orang_tua)
    VALUES
    (:id_user, :nama_santri, :jenis_kelamin, :tempat_lahir, :tanggal_lahir, :alamat, :nama_ayah, :nama_ibu, :no_hp_orang_tua)
");

$success = $stmt->execute([
    ':id_user'          => $id_user,
    ':nama_santri'      => $nama_santri,
    ':jenis_kelamin'    => $jenis_kelamin,
    ':tempat_lahir'     => $tempat_lahir,
    ':tanggal_lahir'    => $tanggal_lahir,
    ':alamat'           => $alamat,
    ':nama_ayah'        => $nama_ayah,
    ':nama_ibu'         => $nama_ibu,
    ':no_hp_orang_tua'  => $no_hp_orang_tua
]);

if ($success) {
    header("Location: ../../views/dashboard.php?success=1");
    exit;
} else {
    die("Gagal menyimpan data santri.");
}
