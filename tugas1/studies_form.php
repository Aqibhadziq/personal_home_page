<?php
// Cek autentikasi
if (!isset($_SESSION['user_id'])) {
    header('Location: index.php?hal=login&redirect=studies_form');
    exit;
}

$id     = $_GET['id'] ?? null;
$obj    = new Studies();
$objLvl = new Level();
$rs_lvl = $objLvl->index();
$row    = [];

if ($id) {
    $row = $obj->getStudy($id);
    if (!$row) {
        header('Location: index.php?hal=studies_list&error=Data+tidak+ditemukan');
        exit;
    }
}

function val($r, $k) { return isset($r[$k]) ? htmlspecialchars($r[$k]) : ''; }
?>

<div class="mb-4">
  <div class="d-flex align-items-center border-bottom pb-2 mb-3">
    <h3 class="mb-0">
      <i class="bi bi-book-fill text-primary me-2"></i>
      <?= $id ? 'Edit' : 'Tambah' ?> Riwayat Pendidikan
    </h3>
  </div>

  <!-- Breadcrumb -->
  <nav aria-label="breadcrumb" class="mb-3">
    <ol class="breadcrumb">
      <li class="breadcrumb-item"><a href="index.php?hal=home">Home</a></li>
      <li class="breadcrumb-item"><a href="index.php?hal=studies_list">Riwayat Pendidikan</a></li>
      <li class="breadcrumb-item active"><?= $id ? 'Edit' : 'Tambah' ?></li>
    </ol>
  </nav>

  <div class="card shadow-sm">
    <div class="card-header bg-primary text-white">
      <i class="bi bi-<?= $id ? 'pencil' : 'plus-circle' ?> me-2"></i>
      Form <?= $id ? 'Edit' : 'Tambah' ?> Studi
    </div>
    <div class="card-body">
      <form method="POST" action="controller/studiesController.php"
        enctype="multipart/form-data">

        <!-- Nama Sekolah/Kampus -->
        <div class="mb-3">
          <label class="form-label fw-bold">
            <i class="bi bi-building me-1"></i>Nama Sekolah / Kampus <span class="text-danger">*</span>
          </label>
          <input type="text" name="nama" class="form-control"
            value="<?= val($row, 'nama') ?>"
            placeholder="Contoh: SMAN 1 Jakarta, Universitas Indonesia"
            required>
        </div>

        <!-- Level Pendidikan -->
        <div class="mb-3">
          <label class="form-label fw-bold">
            <i class="bi bi-layers me-1"></i>Level Pendidikan <span class="text-danger">*</span>
          </label>
          <select name="idlevel" class="form-select" required>
            <option value="">-- Pilih Level Pendidikan --</option>
            <?php foreach ($rs_lvl as $lvl): ?>
              <option value="<?= $lvl['id'] ?>"
                <?= (val($row, 'idlevel') == $lvl['id']) ? 'selected' : '' ?>>
                <?= htmlspecialchars($lvl['nama']) ?>
              </option>
            <?php endforeach; ?>
          </select>
        </div>

        <!-- Keterangan -->
        <div class="mb-3">
          <label class="form-label fw-bold">
            <i class="bi bi-card-text me-1"></i>Keterangan
          </label>
          <textarea name="keterangan" class="form-control" rows="3"
            placeholder="Ceritakan pengalaman di sini..."><?= val($row, 'keterangan') ?></textarea>
        </div>

        <!-- Tahun Lulus -->
        <div class="mb-3">
          <label class="form-label fw-bold">
            <i class="bi bi-calendar-check me-1"></i>Tahun Lulus <span class="text-danger">*</span>
          </label>
          <input type="number" name="tahun_lulus" class="form-control"
            value="<?= val($row, 'tahun_lulus') ?>"
            min="1990" max="<?= date('Y') + 5 ?>"
            placeholder="Contoh: 2022" required>
        </div>

        <!-- Foto Sekolah -->
        <div class="mb-3">
          <label class="form-label fw-bold">
            <i class="bi bi-image me-1"></i>Foto Sekolah
          </label>
          <div class="input-group">
            <input type="file" name="foto_sekolah_file" class="form-control"
              accept="image/jpeg,image/png,image/jpg">
            <span class="input-group-text">atau</span>
            <input type="text" name="foto_sekolah" class="form-control"
              value="<?= val($row, 'foto_sekolah') ?>"
              placeholder="Nama file yang sudah ada, misal: sekolah.jpg">
          </div>
          <?php if (!empty($row['foto_sekolah'])): ?>
            <div class="mt-2">
              <small class="text-muted">Foto saat ini:</small><br>
              <img src="img/<?= htmlspecialchars($row['foto_sekolah']) ?>"
                alt="Foto" width="100" class="mt-1 rounded border"
                onerror="this.src='img/nophoto.jpg'">
            </div>
          <?php endif; ?>
          <div class="form-text">Upload file baru atau masukkan nama file yang sudah ada di folder img/.</div>
        </div>

        <?php if ($id): ?>
          <input type="hidden" name="idx" value="<?= $id ?>">
        <?php endif; ?>

        <div class="d-flex gap-2 pt-2">
          <?php if (!$id): ?>
            <button type="submit" name="proses" value="simpan" class="btn btn-primary">
              <i class="bi bi-save me-1"></i>Simpan
            </button>
          <?php else: ?>
            <button type="submit" name="proses" value="ubah" class="btn btn-success">
              <i class="bi bi-check-circle me-1"></i>Update
            </button>
          <?php endif; ?>
          <a href="index.php?hal=studies_list" class="btn btn-secondary">
            <i class="bi bi-arrow-left me-1"></i>Kembali
          </a>
        </div>

      </form>
    </div>
  </div>
</div>
