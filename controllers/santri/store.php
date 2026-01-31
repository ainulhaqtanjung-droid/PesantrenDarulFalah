<?php
include "../../config/koneksi.php";
session_start();

/**
 * =========================
 * VALIDASI SESSION
 * =========================
 */
if (!isset($_SESSION['user_id'])) {
    die("Akses tidak valid.");
}

$id_user = $_SESSION['user_id'];

/**
 * =========================
 * AMBIL DATA FORM
 * =========================
 */
$nama_santri        = $_POST['nama_santri'];
$jenis_kelamin      = $_POST['jenis_kelamin'];
$tempat_lahir       = $_POST['tempat_lahir'];
$tanggal_lahir      = $_POST['tanggal_lahir'];
$alamat             = $_POST['alamat'];
$nama_ayah          = $_POST['nama_ayah'];
$nama_ibu           = $_POST['nama_ibu'];
$no_hp_orang_tua    = $_POST['no_hp_orang_tua'];

/**
 * =========================
 * FUNGSI UPLOAD FILE
 * =========================
 */
function uploadFile($file)
{
    if (!isset($file) || $file['error'] !== UPLOAD_ERR_OK) {
        die("File wajib diupload. Kode error: " . ($file['error'] ?? 'unknown'));
    }

    $allowedExt = ['jpg', 'jpeg', 'png', 'pdf'];
    $maxSize    = 2 * 1024 * 1024; // 2MB

    $ext = strtolower(pathinfo($file['name'], PATHINFO_EXTENSION));

    if (!in_array($ext, $allowedExt)) {
        die("Format file tidak diizinkan.");
    }

    if ($file['size'] > $maxSize) {
        die("Ukuran file maksimal 2MB.");
    }

    // ===== PATH ABSOLUT (INI KUNCI UTAMA) =====
    $rootPath = dirname(__DIR__, 2);

    $folder = $rootPath . '/uploads/dokumen/';

    if (!is_dir($folder)) {
        mkdir($folder, 0755, true);
    }

    if (!is_writable($folder)) {
        die("Folder uploads/dokumen tidak writable.");
    }

    $namaFile = time() . '_' . uniqid() . '.' . $ext;
    $tujuan   = $folder . $namaFile;

    if (!move_uploaded_file($file['tmp_name'], $tujuan)) {
        die("move_uploaded_file gagal. Path: " . $tujuan);
    }

    return $namaFile;
}


/**
 * =========================
 * PROSES UPLOAD DOKUMEN
 * =========================
 */
$kartu_keluarga = uploadFile($_FILES['kartu_keluarga']);
$akta_kelahiran = uploadFile($_FILES['akta_kelahiran']);
$ijazah         = uploadFile($_FILES['ijazah']);


/**
 * =========================
 * INSERT DATABASE
 * =========================
 */
$stmt = $koneksi->prepare("
    INSERT INTO santri (
        id_user,
        nama_santri,
        jenis_kelamin,
        tempat_lahir,
        tanggal_lahir,
        alamat,
        nama_ayah,
        nama_ibu,
        no_hp_orang_tua,
        kartu_keluarga,
        akta_kelahiran,
        ijazah
    ) VALUES (
        :id_user,
        :nama_santri,
        :jenis_kelamin,
        :tempat_lahir,
        :tanggal_lahir,
        :alamat,
        :nama_ayah,
        :nama_ibu,
        :no_hp_orang_tua,
        :kartu_keluarga,
        :akta_kelahiran,
        :ijazah
    )
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
    ':no_hp_orang_tua'  => $no_hp_orang_tua,
    ':kartu_keluarga'   => $kartu_keluarga,
    ':akta_kelahiran'   => $akta_kelahiran,
    ':ijazah'           => $ijazah
]);

/**
 * =========================
 * RESPONSE
 * =========================
 */
if ($success) {
    header("Location: ../../views/dashboard.php?santri=success");
    exit;
} else {
    die("Gagal menyimpan data santri.");
}
