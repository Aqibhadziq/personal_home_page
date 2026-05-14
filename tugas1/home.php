<!-- HOME: Profil dengan Card Horizontal Bootstrap -->
<div class="mb-4">
  <h3 class="border-bottom pb-2 mb-3">
    <i class="bi bi-house-fill text-primary me-2"></i>Home
  </h3>

  <!-- Card Horizontal: Profil Utama -->
  <div class="card mb-4 shadow-sm" style="max-width: 100%;">
    <div class="row g-0">
      <!-- Gambar Profil (area image) -->
      <div class="col-md-4 d-flex align-items-center justify-content-center bg-primary rounded-start"
        style="min-height: 220px;">
       <div class="text-center text-white p-3">
  <img src="img/gantenks2.jpeg"
       alt="Foto Muhammad A'qib Hadziq"
       class="rounded-circle shadow mb-3 border border-3 border-white"
       style="width: 140px; height: 140px; object-fit: cover;">

  <h5 class="mt-2 mb-0">Muhammad A'qib Hadziq</h5>

  <span class="badge bg-light text-primary mt-1">
    Mahasiswa TI
  </span>
</div>
      </div>
      <!-- Konten Profil -->
      <div class="col-md-8">
        <div class="card-body">
          <h4 class="card-title">Halo, Saya <span class="text-primary">Muhammad A'qib Hadziq</span>! 👋</h4>
          <p class="card-text text-muted">
            Mahasiswa Teknik Informatika semester 2 yang passionate dalam dunia teknologi,
            khususnya pengembangan web. Saya menikmati belajar hal baru dan memecahkan
            masalah dengan solusi teknologi yang kreatif.
          </p>
          <hr>
          <div class="row">
            <div class="col-6">
              <ul class="list-unstyled mb-0">
                <li class="mb-1">
                  <i class="bi bi-calendar-event text-primary me-2"></i>
                  <strong>Lahir:</strong> 29 Oktober 2007
                </li>
                <li class="mb-1">
                  <i class="bi bi-geo-alt text-danger me-2"></i>
                  <strong>Kota:</strong> Bekasi
                </li>
                <li class="mb-1">
                  <i class="bi bi-envelope text-success me-2"></i>
                  <strong>Email:</strong> maqih2910@email.com
                </li>
              </ul>
            </div>
            <div class="col-6">
              <ul class="list-unstyled mb-0">
                <li class="mb-1">
                  <i class="bi bi-mortarboard text-warning me-2"></i>
                  <strong>Prodi:</strong> Teknik Informatika
                </li>
                <li class="mb-1">
                  <i class="bi bi-building text-info me-2"></i>
                  <strong>Kampus:</strong> STT Nurul Fikri
                </li>
                <li class="mb-1">
                  <i class="bi bi-star-fill text-warning me-2"></i>
                  <strong>IPK:</strong> 4.00
                </li>
              </ul>
            </div>
          </div>
          <div class="mt-3">
            <a href="index.php?hal=about" class="btn btn-primary btn-sm me-2">
              <i class="bi bi-person me-1"></i>About Me
            </a>
            <a href="index.php?hal=contact" class="btn btn-outline-primary btn-sm">
              <i class="bi bi-envelope me-1"></i>Hubungi Saya
            </a>
          </div>
        </div>
      </div>
    </div>
  </div>

  <!-- Card Skills Horizontal -->
  <h5 class="mb-3"><i class="bi bi-lightning-fill text-warning me-2"></i>Skills</h5>
  <div class="row g-3 mb-3">
    <?php
      $skills = [
        ['icon' => 'bi-filetype-php', 'color' => 'text-primary', 'nama' => 'PHP', 'level' => 50],
        ['icon' => 'bi-filetype-html', 'color' => 'text-danger', 'nama' => 'HTML/CSS', 'level' => 70],
        ['icon' => 'bi-filetype-js', 'color' => 'text-warning', 'nama' => 'JavaScript', 'level' => 40],
        ['icon' => 'bi-database-fill', 'color' => 'text-success', 'nama' => 'MySQL', 'level' => 65],
      ];
      foreach ($skills as $sk):
    ?>
    <div class="col-md-6">
      <div class="card border-0 shadow-sm h-100">
        <div class="row g-0 align-items-center">
          <div class="col-3 text-center py-3">
            <i class="bi <?= $sk['icon'] ?> <?= $sk['color'] ?>" style="font-size: 2.5rem;"></i>
          </div>
          <div class="col-9 pe-3 py-2">
            <div class="d-flex justify-content-between align-items-center mb-1">
              <strong><?= $sk['nama'] ?></strong>
              <small class="text-muted"><?= $sk['level'] ?>%</small>
            </div>
            <div class="progress" style="height: 8px;">
              <div class="progress-bar bg-primary" role="progressbar"
                style="width: <?= $sk['level'] ?>%"></div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <?php endforeach; ?>
  </div>

</div>
