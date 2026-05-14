<?php
session_start();
include_once '../koneksi.php';
include_once '../models/Studies.php';

// Cek autentikasi
if (!isset($_SESSION['user_id'])) {
    header('Location: ../index.php?hal=login&redirect=studies_list');
    exit;
}

$obj    = new Studies();
$proses = $_POST['proses'] ?? '';

// Proses upload foto
function uploadFoto($fieldName, $uploadDir = '../img/')
{
    if (isset($_FILES[$fieldName]) && $_FILES[$fieldName]['error'] === UPLOAD_ERR_OK) {
        $ext  = strtolower(pathinfo($_FILES[$fieldName]['name'], PATHINFO_EXTENSION));
        $allowed = ['jpg', 'jpeg', 'png'];
        if (in_array($ext, $allowed)) {
            $newName = uniqid('sekolah_') . '.' . $ext;
            if (move_uploaded_file($_FILES[$fieldName]['tmp_name'], $uploadDir . $newName)) {
                return $newName;
            }
        }
    }
    return null;
}

$nama        = trim($_POST['nama'] ?? '');
$idlevel     = $_POST['idlevel'] ?? '';
$keterangan  = trim($_POST['keterangan'] ?? '');
$tahun_lulus = $_POST['tahun_lulus'] ?? '';
$foto        = trim($_POST['foto_sekolah'] ?? '');

// Coba upload file baru; jika ada, gunakan nama file baru
$uploadedFoto = uploadFoto('foto_sekolah_file');
if ($uploadedFoto) {
    $foto = $uploadedFoto;
}

switch ($proses) {
    case 'simpan':
        if (!empty($nama) && !empty($idlevel) && !empty($tahun_lulus)) {
            $data = [$nama, $idlevel, $keterangan, $tahun_lulus, $foto ?: null];
            $obj->simpan($data);
            header('Location: ../index.php?hal=studies_list&success=Data+studi+berhasil+ditambahkan');
        } else {
            header('Location: ../index.php?hal=studies_form&error=Nama,+Level,+dan+Tahun+Lulus+wajib+diisi');
        }
        break;

    case 'ubah':
        $id = $_POST['idx'] ?? '';
        if (!empty($id) && !empty($nama) && !empty($idlevel) && !empty($tahun_lulus)) {
            $data = [$nama, $idlevel, $keterangan, $tahun_lulus, $foto ?: null, $id];
            $obj->ubah($data);
            header('Location: ../index.php?hal=studies_list&success=Data+studi+berhasil+diperbarui');
        } else {
            header('Location: ../index.php?hal=studies_list&error=Gagal+memperbarui+data');
        }
        break;

    case 'hapus':
        $id = $_POST['id'] ?? '';
        if (!empty($id)) {
            $obj->hapus($id);
            header('Location: ../index.php?hal=studies_list&success=Data+studi+berhasil+dihapus');
        } else {
            header('Location: ../index.php?hal=studies_list&error=Gagal+menghapus+data');
        }
        break;

    default:
        header('Location: ../index.php?hal=studies_list');
        break;
}
exit;
?>
