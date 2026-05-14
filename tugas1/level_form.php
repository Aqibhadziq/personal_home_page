<?php
// Cek autentikasi
if (!isset($_SESSION['user_id'])) {
    header('Location: index.php?hal=login&redirect=level_form');
    exit;
}

$id  = $_GET['id'] ?? null;
$obj = new Level();
$row = [];

if ($id) {
    $row = $obj->getLevel($id);
    if (!$row) {
        header('Location: index.php?hal=level_list&error=Data+tidak+ditemukan');
        exit;
    }
}

function val($r, $k) { return isset($r[$k]) ? htmlspecialchars($r[$k]) : ''; }
?>

<div class="mb-4">
  <div class="d-flex align-items-center border-bottom pb-2 mb-3">
    <h3 class="mb-0">
      <i class="bi bi-layers-fill text-primary me-2"></i>
      <?= $id ? 'Edit' : 'Tambah' ?> Level Pendidikan
    </h3>
  </div>

  <!-- Breadcrumb -->
  <nav aria-label="breadcrumb" class="mb-3">
    <ol class="breadcrumb">
      <li class="breadcrumb-item"><a href="index.php?hal=home">Home</a></li>
      <li class="breadcrumb-item"><a href="index.php?hal=level_list">Level Pendidikan</a></li>
      <li class="breadcrumb-item active"><?= $id ? 'Edit' : 'Tambah' ?></li>
    </ol>
  </nav>

  <div class="row justify-content-center">
    <div class="col-md-8">
      <div class="card shadow-sm">
        <div class="card-header bg-primary text-white">
          <i class="bi bi-<?= $id ? 'pencil' : 'plus-circle' ?> me-2"></i>
          Form <?= $id ? 'Edit' : 'Tambah' ?> Level
        </div>
        <div class="card-body">
          <form method="POST" action="controller/levelController.php">
            <div class="mb-3">
              <label class="form-label fw-bold">
                <i class="bi bi-award me-1"></i>Nama Level
              </label>
              <input type="text" name="nama" class="form-control form-control-lg"
                value="<?= val($row, 'nama') ?>"
                placeholder="Contoh: TK, SD, SMP, SMA, S1, dst."
                required>
              <div class="form-text">Masukkan nama jenjang pendidikan.</div>
            </div>

            <?php if ($id): ?>
              <input type="hidden" name="idx" value="<?= $id ?>">
            <?php endif; ?>

            <div class="d-flex gap-2">
              <?php if (!$id): ?>
                <button type="submit" name="proses" value="simpan" class="btn btn-primary">
                  <i class="bi bi-save me-1"></i>Simpan
                </button>
              <?php else: ?>
                <button type="submit" name="proses" value="ubah" class="btn btn-success">
                  <i class="bi bi-check-circle me-1"></i>Update
                </button>
              <?php endif; ?>
              <a href="index.php?hal=level_list" class="btn btn-secondary">
                <i class="bi bi-arrow-left me-1"></i>Kembali
              </a>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
</div>
