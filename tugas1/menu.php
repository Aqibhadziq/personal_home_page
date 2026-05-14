<!-- MENU: Bootstrap Navbar -->
<nav class="navbar navbar-expand-lg navbar-dark bg-primary shadow">
  <div class="container-fluid">
    <a class="navbar-brand d-flex align-items-center gap-2" href="index.php">
      <i class="bi bi-person-badge-fill fs-4"></i>
      <span>My Portfolio</span>
    </a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
      data-bs-target="#mainNavbar" aria-controls="mainNavbar"
      aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="mainNavbar">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">

        <!-- Home -->
        <li class="nav-item">
          <a class="nav-link <?= (!isset($_GET['hal']) || $_GET['hal']=='home') ? 'active' : '' ?>"
            href="index.php?hal=home">
            <i class="bi bi-house-fill me-1"></i>Home
          </a>
        </li>

        <!-- About Me -->
        <li class="nav-item">
          <a class="nav-link <?= (($_GET['hal'] ?? '') == 'about') ? 'active' : '' ?>"
            href="index.php?hal=about">
            <i class="bi bi-person-fill me-1"></i>About Me
          </a>
        </li>

        <!-- Contact Me -->
        <li class="nav-item">
          <a class="nav-link <?= (($_GET['hal'] ?? '') == 'contact') ? 'active' : '' ?>"
            href="index.php?hal=contact">
            <i class="bi bi-envelope-fill me-1"></i>Contact Me
          </a>
        </li>

        <!-- My Studies (Dropdown) -->
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle <?= in_array(($_GET['hal'] ?? ''), ['level_list','level_form','studies_list','studies_form']) ? 'active' : '' ?>"
            href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
            <i class="bi bi-mortarboard-fill me-1"></i>My Studies
          </a>
          <ul class="dropdown-menu dropdown-menu-dark">
            <li>
              <a class="dropdown-item" href="index.php?hal=level_list">
                <i class="bi bi-layers-fill me-2"></i>Level
              </a>
            </li>
            <li>
              <a class="dropdown-item" href="index.php?hal=studies_list">
                <i class="bi bi-book-fill me-2"></i>Studies
              </a>
            </li>
          </ul>
        </li>

        <!-- LOGIN atau USER INFO -->
        <?php if (!isset($_SESSION['user_id'])): ?>
          <!-- Belum login: tampilkan menu Login -->
          <li class="nav-item">
            <a class="nav-link <?= (($_GET['hal'] ?? '') == 'login') ? 'active' : '' ?>"
              href="index.php?hal=login">
              <i class="bi bi-box-arrow-in-right me-1"></i>Login
            </a>
          </li>
        <?php else: ?>
          <!-- Sudah login: tampilkan nama user + role + submenu Logout -->
          <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle text-warning" href="#"
              role="button" data-bs-toggle="dropdown" aria-expanded="false">
              <i class="bi bi-person-circle me-1"></i>
              <?= htmlspecialchars($_SESSION['nama']) ?>
              <span class="badge bg-warning text-dark ms-1"><?= htmlspecialchars($_SESSION['role']) ?></span>
            </a>
            <ul class="dropdown-menu dropdown-menu-dark">
              <li>
                <span class="dropdown-item-text text-muted small">
                  <i class="bi bi-shield-check me-1"></i>
                  Login sebagai: <strong><?= htmlspecialchars($_SESSION['role']) ?></strong>
                </span>
              </li>
              <li><hr class="dropdown-divider"></li>
              <li>
                <a class="dropdown-item text-danger" href="index.php?hal=logout">
                  <i class="bi bi-box-arrow-right me-2"></i>Logout
                </a>
              </li>
            </ul>
          </li>
        <?php endif; ?>

      </ul>
    </div>
  </div>
</nav>
