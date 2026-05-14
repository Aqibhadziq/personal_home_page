<!-- SIDEBAR: Bootstrap List Group -->
<div class="sidebar-card">

  <!-- Info Singkat -->
  <div class="card mb-3 shadow-sm">
    <div class="card-header bg-primary text-white">
      <i class="bi bi-person-fill me-2"></i><strong>Profil Singkat</strong>
    </div>
    <ul class="list-group list-group-flush">
      <li class="list-group-item d-flex align-items-center gap-2">
        <i class="bi bi-person-badge text-primary"></i>
        <span><strong>Nama:</strong> Muhammad A'qib Hadziq</span>
      </li>
      <li class="list-group-item d-flex align-items-center gap-2">
        <i class="bi bi-mortarboard text-success"></i>
        <span><strong>Prodi:</strong> Teknik Informatika</span>
      </li>
      <li class="list-group-item d-flex align-items-center gap-2">
        <i class="bi bi-calendar-check text-warning"></i>
        <span><strong>Angkatan:</strong> 2025</span>
      </li>
      <li class="list-group-item d-flex align-items-center gap-2">
        <i class="bi bi-geo-alt-fill text-danger"></i>
        <span><strong>Kota:</strong> Bekasi</span>
      </li>
    </ul>
  </div>

  <!-- Navigasi Cepat -->
  <div class="card mb-3 shadow-sm">
    <div class="card-header bg-dark text-white">
      <i class="bi bi-list-ul me-2"></i><strong>Menu Cepat</strong>
    </div>
    <ul class="list-group list-group-flush">
      <li class="list-group-item list-group-item-action">
        <a href="index.php?hal=home" class="text-decoration-none text-dark">
          <i class="bi bi-house me-2 text-primary"></i>Home
        </a>
      </li>
      <li class="list-group-item list-group-item-action">
        <a href="index.php?hal=about" class="text-decoration-none text-dark">
          <i class="bi bi-person me-2 text-success"></i>About Me
        </a>
      </li>
      <li class="list-group-item list-group-item-action">
        <a href="index.php?hal=contact" class="text-decoration-none text-dark">
          <i class="bi bi-envelope me-2 text-warning"></i>Contact Me
        </a>
      </li>
      <li class="list-group-item list-group-item-action">
        <a href="index.php?hal=level_list" class="text-decoration-none text-dark">
          <i class="bi bi-layers me-2 text-info"></i>Level Pendidikan
        </a>
      </li>
      <li class="list-group-item list-group-item-action">
        <a href="index.php?hal=studies_list" class="text-decoration-none text-dark">
          <i class="bi bi-book me-2 text-danger"></i>Riwayat Studi
        </a>
      </li>
    </ul>
  </div>

  <!-- Status Login -->
  <div class="card shadow-sm">
    <div class="card-header bg-secondary text-white">
      <i class="bi bi-shield-lock me-2"></i><strong>Status</strong>
    </div>
    <ul class="list-group list-group-flush">
      <?php if (isset($_SESSION['user_id'])): ?>
        <li class="list-group-item list-group-item-success">
          <i class="bi bi-check-circle-fill text-success me-2"></i>
          Sudah Login
        </li>
        <li class="list-group-item">
          <i class="bi bi-person-fill me-2"></i>
          <?= htmlspecialchars($_SESSION['nama']) ?>
        </li>
        <li class="list-group-item">
          <span class="badge bg-primary"><?= htmlspecialchars($_SESSION['role']) ?></span>
        </li>
        <li class="list-group-item">
          <a href="index.php?hal=logout" class="btn btn-danger btn-sm w-100">
            <i class="bi bi-box-arrow-right me-1"></i>Logout
          </a>
        </li>
      <?php else: ?>
        <li class="list-group-item list-group-item-warning">
          <i class="bi bi-exclamation-circle-fill text-warning me-2"></i>
          Belum Login
        </li>
        <li class="list-group-item">
          <a href="index.php?hal=login" class="btn btn-primary btn-sm w-100">
            <i class="bi bi-box-arrow-in-right me-1"></i>Login Sekarang
          </a>
        </li>
      <?php endif; ?>
    </ul>
  </div>

</div>
