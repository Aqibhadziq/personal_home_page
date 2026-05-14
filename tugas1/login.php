<?php
// Jika sudah login, redirect ke home
if (isset($_SESSION['user_id'])) {
    header('Location: index.php?hal=home');
    exit;
}

// Proses login
$error = '';
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $username = trim($_POST['username'] ?? '');
    $password = $_POST['password'] ?? '';

    if (empty($username) || empty($password)) {
        $error = 'Username dan password wajib diisi!';
    } else {
        $obj_user = new User();
        $user = $obj_user->login($username, $password);

        if ($user) {
            $_SESSION['user_id']  = $user['id'];
            $_SESSION['nama']     = $user['nama'];
            $_SESSION['username'] = $user['username'];
            $_SESSION['role']     = $user['role'];

            header('Location: index.php?hal=home');
            exit;
        } else {
            $error = 'Username atau password salah!';
        }
    }
}
?>

<div class="mb-4">
  <h3 class="border-bottom pb-2 mb-4">
    <i class="bi bi-box-arrow-in-right text-primary me-2"></i>Login
  </h3>

  <div class="row justify-content-center">
    <div class="col-md-8">

      <?php if (!empty($error)): ?>
        <div class="alert alert-danger d-flex align-items-center">
          <i class="bi bi-exclamation-triangle-fill me-2"></i>
          <?= htmlspecialchars($error) ?>
        </div>
      <?php endif; ?>

      <?php if (isset($_GET['redirect'])): ?>
        <div class="alert alert-warning d-flex align-items-center">
          <i class="bi bi-lock-fill me-2"></i>
          Anda harus login terlebih dahulu untuk mengakses fitur edit.
        </div>
      <?php endif; ?>

      <div class="card shadow">
        <div class="card-header bg-primary text-white text-center py-3">
          <i class="bi bi-person-circle" style="font-size: 3rem;"></i>
          <h5 class="mb-0 mt-2">Masuk ke Akun Anda</h5>
        </div>

        <div class="card-body p-4">
          <form method="POST" action="index.php?hal=login">

            <div class="mb-3">
              <label class="form-label fw-bold">
                <i class="bi bi-person me-1"></i>Username
              </label>
              <input type="text" name="username"
                class="form-control form-control-lg"
                placeholder="Masukkan username"
                required>
            </div>

            <div class="mb-4">
              <label class="form-label fw-bold">
                <i class="bi bi-lock me-1"></i>Password
              </label>
              <input type="password" name="password"
                class="form-control form-control-lg"
                placeholder="Masukkan password"
                required>
            </div>

            <div class="d-grid">
              <button class="btn btn-primary btn-lg">
                <i class="bi bi-box-arrow-in-right me-2"></i>Login
              </button>
            </div>

          </form>
        </div>

      </div>

    </div>
  </div>
</div>