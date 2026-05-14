<?php

$obj = new Level();
$rs = $obj->index();

$success = $_GET['success'] ?? '';
$error   = $_GET['error'] ?? '';
?>

<div class="mb-4">
  <div class="d-flex justify-content-between align-items-center border-bottom pb-2 mb-3">
    <h3 class="mb-0">
      <i class="bi bi-layers-fill text-primary me-2"></i>Level Pendidikan
    </h3>
    <a href="index.php?hal=level_form" class="btn btn-primary">
      <i class="bi bi-plus-circle me-1"></i>Tambah Level
    </a>
  </div>

  <?php if ($success): ?>
    <div class="alert alert-success alert-dismissible fade show" role="alert">
      <i class="bi bi-check-circle-fill me-2"></i>
      <?= htmlspecialchars($success) ?>
      <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
    </div>
  <?php endif; ?>
  <?php if ($error): ?>
    <div class="alert alert-danger alert-dismissible fade show" role="alert">
      <i class="bi bi-exclamation-triangle-fill me-2"></i>
      <?= htmlspecialchars($error) ?>
      <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
    </div>
  <?php endif; ?>

  <!-- Breadcrumb -->
  <nav aria-label="breadcrumb" class="mb-3">
    <ol class="breadcrumb">
      <li class="breadcrumb-item"><a href="index.php?hal=home">Home</a></li>
      <li class="breadcrumb-item active">Level Pendidikan</li>
    </ol>
  </nav>

  <div class="card shadow-sm">
    <div class="card-body p-0">
      <table class="table table-striped table-hover mb-0">
        <thead class="table-dark">
          <tr>
            <th width="8%" class="text-center">No</th>
            <th>Nama Level</th>
            <th width="20%" class="text-center">Aksi</th>
          </tr>
        </thead>
        <tbody>
          <?php
          if ($rs && $rs->rowCount() > 0):
              $no = 1;
              foreach ($rs as $row):
          ?>
          <tr>
            <td class="text-center"><?= $no++ ?></td>
            <td>
              <i class="bi bi-award-fill text-warning me-2"></i>
              <?= htmlspecialchars($row['nama']) ?>
            </td>
            <td class="text-center">
              <!-- Edit -->
              <a href="index.php?hal=level_form&id=<?= $row['id'] ?>"
                class="btn btn-warning btn-sm" title="Edit">
                <i class="bi bi-pencil-fill"></i>
              </a>
              <!-- Hapus -->
              <form method="POST" action="controller/levelController.php"
                class="d-inline"
                onsubmit="return confirm('Yakin ingin menghapus level ini?')">
                <input type="hidden" name="id" value="<?= $row['id'] ?>">
                <input type="hidden" name="proses" value="hapus">
                <button type="submit" class="btn btn-danger btn-sm" title="Hapus">
                  <i class="bi bi-trash-fill"></i>
                </button>
              </form>
            </td>
          </tr>
          <?php
              endforeach;
          else:
          ?>
          <tr>
            <td colspan="3" class="text-center text-muted py-4">
              <i class="bi bi-inbox fs-2 d-block mb-2"></i>
              Belum ada data level pendidikan.
            </td>
          </tr>
          <?php endif; ?>
        </tbody>
      </table>
    </div>
  </div>
</div>
