<?php
session_start();

include_once '../koneksi.php';
include_once '../models/Level.php';

// Cek autentikasi
if (!isset($_SESSION['user_id'])) {
    header('Location: ../index.php?hal=login&redirect=level_list');
    exit;
}

$obj    = new Level();
$proses = $_POST['proses'] ?? '';
$nama   = trim($_POST['nama'] ?? '');

switch ($proses) {
    case 'simpan':
        if (!empty($nama)) {
            $obj->simpan([$nama]);
            header('Location: ../index.php?hal=level_list&success=Level+berhasil+ditambahkan');
        } else {
            header('Location: ../index.php?hal=level_form&error=Nama+level+tidak+boleh+kosong');
        }
        break;

    case 'ubah':
        $id = $_POST['idx'] ?? '';
        if (!empty($id) && !empty($nama)) {
            $obj->ubah([$nama, $id]);
            header('Location: ../index.php?hal=level_list&success=Level+berhasil+diperbarui');
        } else {
            header('Location: ../index.php?hal=level_list&error=Gagal+memperbarui+data');
        }
        break;

    case 'hapus':
        $id = $_POST['id'] ?? '';
        if (!empty($id)) {
            $obj->hapus($id);
            header('Location: ../index.php?hal=level_list&success=Level+berhasil+dihapus');
        } else {
            header('Location: ../index.php?hal=level_list&error=Gagal+menghapus+data');
        }
        break;

    default:
        header('Location: ../index.php?hal=level_list');
        break;
}
exit;
?>
