<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}
$isLogin = isset($_SESSION['user_id']);

$obj = new Studies();
$rs  = $obj->index();

$success = $_GET['success'] ?? '';
$error   = $_GET['error'] ?? '';
?>

<div class="mb-4">

  <!-- HEADER -->
  <div class="d-flex justify-content-between align-items-center border-bottom pb-2 mb-3">
    <h3 class="mb-0">
      <i class="bi bi-book-fill text-primary me-2"></i>
      Riwayat Pendidikan (Studies)
    </h3>

    <!-- tombol hanya muncul kalau login -->
    <?php if ($isLogin): ?>
      <a href="index.php?hal=studies_form" class="btn btn-primary">
        <i class="bi bi-plus-circle me-1"></i>Tambah Studi
      </a>
    <?php endif; ?>
  </div>

  <!-- ALERT -->
  <?php if ($success): ?>
    <div class="alert alert-success alert-dismissible fade show">
      <i class="bi bi-check-circle-fill me-2"></i>
      <?= htmlspecialchars($success) ?>
      <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
    </div>
  <?php endif; ?>

  <?php if ($error): ?>
    <div class="alert alert-danger alert-dismissible fade show">
      <i class="bi bi-exclamation-triangle-fill me-2"></i>
      <?= htmlspecialchars($error) ?>
      <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
    </div>
  <?php endif; ?>

  <!-- BREADCRUMB -->
  <nav class="mb-3">
    <ol class="breadcrumb">
      <li class="breadcrumb-item"><a href="index.php?hal=home">Home</a></li>
      <li class="breadcrumb-item active">Studies</li>
    </ol>
  </nav>

  <!-- TABLE -->
  <div class="card shadow-sm">
    <div class="card-body p-0">

      <div class="table-responsive">
        <table class="table table-striped table-hover mb-0 align-middle">

          <thead class="table-dark">
            <tr>
              <th width="5%" class="text-center">No</th>
              <th>Sekolah / Kampus</th>
              <th width="12%">Level</th>
              <th width="10%">Lulus</th>
              <th>Keterangan</th>
              <th width="8%">Foto</th>
              <th width="15%" class="text-center">Aksi</th>
            </tr>
          </thead>

          <tbody>
            <?php if ($rs && $rs->rowCount() > 0): ?>
              <?php $no = 1; foreach ($rs as $row): ?>
                <tr>
                  <td class="text-center"><?= $no++ ?></td>

                  <td>
                    <i class="bi bi-building text-primary me-1"></i>
                    <strong><?= htmlspecialchars($row['nama']) ?></strong>
                  </td>

                  <td>
                    <span class="badge bg-primary">
                      <?= htmlspecialchars($row['nama_level']) ?>
                    </span>
                  </td>

                  <td class="text-center">
                    <span class="badge bg-success">
                      <?= htmlspecialchars($row['tahun_lulus']) ?>
                    </span>
                  </td>

                  <td>
                    <small class="text-muted">
                      <?= htmlspecialchars(mb_strimwidth($row['keterangan'] ?? '', 0, 60, '...')) ?>
                    </small>
                  </td>

                  <td class="text-center">
                    <?php if (!empty($row['foto_sekolah'])): ?>
                      <img src="img/<?= htmlspecialchars($row['foto_sekolah']) ?>"
                        width="45" height="40"
                        style="object-fit:cover;border-radius:5px;">
                    <?php else: ?>
                      <span class="text-muted">-</span>
                    <?php endif; ?>
                  </td>

                  <!-- ACTION -->
                  <td class="text-center">

                    <?php if ($isLogin): ?>
                      <a href="index.php?hal=studies_form&id=<?= $row['id'] ?>"
                        class="btn btn-warning btn-sm">
                        <i class="bi bi-pencil-fill"></i>
                      </a>

                      <form method="POST"
                        action="controller/studiesController.php"
                        class="d-inline"
                        onsubmit="return confirm('Yakin hapus data ini?')">

                        <input type="hidden" name="id" value="<?= $row['id'] ?>">
                        <input type="hidden" name="proses" value="hapus">

                        <button class="btn btn-danger btn-sm">
                          <i class="bi bi-trash-fill"></i>
                        </button>
                      </form>

                    <?php else: ?>
                      <span class="text-muted small">Login untuk edit</span>
                    <?php endif; ?>

                  </td>

                </tr>
              <?php endforeach; ?>
            <?php else: ?>
              <tr>
                <td colspan="7" class="text-center text-muted py-4">
                  <i class="bi bi-inbox fs-2 d-block mb-2"></i>
                  Belum ada data riwayat pendidikan
                </td>
              </tr>
            <?php endif; ?>
          </tbody>

        </table>
      </div>

    </div>
  </div>

</div>