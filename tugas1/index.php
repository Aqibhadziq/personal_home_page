<?php
ob_start();
session_start();
?>
<!doctype html>
<html lang="id">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Personal Home Page</title>

  <!-- Bootswatch Lux theme -->
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootswatch@5.3.2/dist/lux/bootstrap.min.css">

  <!-- Bootstrap Icons -->
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css">

  <style>
    body { background-color: #f8f9fa; }
    .navbar-brand { font-weight: 700; font-size: 1.3rem; }
    .sidebar-card { position: sticky; top: 80px; }
    .carousel-img-wrapper { height: 300px; overflow: hidden; }
    .carousel-img-wrapper img { width: 100%; height: 100%; object-fit: cover; }
    .footer-section { margin-top: 20px; }
    .main-content { min-height: 400px; }

    /* Fallback gradient backgrounds for carousel when no images */
    .slide-1 {
      background: linear-gradient(135deg, #1a1a2e 0%, #16213e 50%, #0f3460 100%);
    }

    .slide-2 {
      background: linear-gradient(135deg, #0f3460 0%, #533483 50%, #e94560 100%);
    }

    .slide-3 {
      background: linear-gradient(135deg, #2d6a4f 0%, #40916c 50%, #74c69d 100%);
    }

    .carousel-placeholder {
      height: 300px;
      display: flex;
      align-items: center;
      justify-content: center;
      color: white;
    }

    .carousel-placeholder h2 {
      font-size: 2rem;
      text-shadow: 2px 2px 4px rgba(0,0,0,0.5);
    }

    .carousel-placeholder p {
      font-size: 1.1rem;
      opacity: 0.9;
    }
  </style>
</head>

<body>

<?php
  include_once 'koneksi.php';
  include_once 'models/User.php';
  include_once 'models/Level.php';
  include_once 'models/Studies.php';
?>

<div class="container-fluid px-0">

  <!-- HEADER (12 grid) -->
  <div class="row g-0">
    <div class="col-md-12">
      <?php include_once 'header.php'; ?>
    </div>
  </div>

  <!-- MENU (12 grid) -->
  <div class="row g-0">
    <div class="col-md-12">
      <?php include_once 'menu.php'; ?>
    </div>
  </div>

  <div class="container-fluid mt-4 px-0">

    <div class="row">

      <!-- SIDEBAR (3 grid) -->
      <div class="col-md-3">
        <?php include_once 'sidebar.php'; ?>
      </div>

      <!-- MAIN CONTENT (9 grid) -->
      <div class="col-md-9 main-content">

        <?php
          $hal = $_GET['hal'] ?? 'home';

          $allowed = [
            'home',
            'about',
            'contact',
            'level_list',
            'level_form',
            'studies_list',
            'studies_form',
            'login',
            'logout'
          ];

          if (in_array($hal, $allowed)) {

              if ($hal === 'logout') {

                  include_once 'logout.php';

              } elseif ($hal === 'login') {

                  include_once 'login.php';

              } else {

                  $file = $hal . '.php';

                  if (file_exists($file)) {

                      include_once $file;

                  } else {

                      echo '<div class="alert alert-warning">Halaman tidak ditemukan.</div>';
                  }
              }

          } else {

              include_once 'home.php';
          }
        ?>

      </div>

    </div>

  </div>

  <!-- FOOTER (12 grid) -->
  <div class="row mt-4">
    <div class="col-md-12">
      <?php include_once 'footer.php'; ?>
    </div>
  </div>

</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>

</body>
</html>