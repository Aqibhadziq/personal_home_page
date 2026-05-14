<!-- ABOUT ME: Accordion Bootstrap -->
<div class="mb-4">
  <h3 class="border-bottom pb-2 mb-3">
    <i class="bi bi-person-fill text-primary me-2"></i>About Me
  </h3>

  <div class="card mb-3 shadow-sm">
    <div class="card-body text-center">
    <img src="img/gantenks.jpeg"
     alt="Foto Muhammad A'qib Hadziq"
     class="rounded-circle shadow mb-3"
     style="width: 150px; height: 150px; object-fit: cover;">
      <h4 class="mt-2">Muhammad A'qib Hadziq</h4>
      <p class="text-muted">
        Mahasiswa Teknik Informatika | Web Developer | Tech Enthusiast
      </p>
      <p class="lead">
        Saya adalah mahasiswa semester 2 Teknik Informatika yang memiliki minat dalam bidang teknologi dan pengembangan web. 
        Saat ini saya sedang mempelajari dasar-dasar pemrograman, database, serta pembuatan website menggunakan PHP dan Bootstrap.  
      </p>
    </div>
  </div>

  <!-- Accordion: Hobby, Favorite Menu, Pengalaman Organisasi -->
  <div class="accordion shadow-sm" id="aboutAccordion">

    <!-- 1. Hobby -->
    <div class="accordion-item">
      <h2 class="accordion-header">
        <button class="accordion-button" type="button"
          data-bs-toggle="collapse" data-bs-target="#collapseHobby"
          aria-expanded="true" aria-controls="collapseHobby">
          <i class="bi bi-controller me-2 text-primary"></i>
          <strong>Hobi Saya</strong>
        </button>
      </h2>
      <div id="collapseHobby" class="accordion-collapse collapse"
        data-bs-parent="#aboutAccordion">
        <div class="accordion-body">
          <div class="row g-3">
            <?php
              $hobbies = [
                ['icon' => 'bi-controller', 'color' => 'bg-success', 'nama' => 'Game', 
                  'desc' => 'Suka bermain game untuk hiburan dan mengisi waktu luang bersama teman.'],
                ['icon' => 'bi-code-slash', 'color' => 'bg-primary', 'nama' => 'Coding', 
                 'desc' => 'Suka membuat aplikasi web dan eksperimen dengan teknologi baru.'],
                ['icon' => 'bi-book-fill', 'color' => 'bg-warning', 'nama' => 'Membaca', 
                 'desc' => 'Gemar membaca buku teknologi, fiksi ilmiah, dan self-improvement.'],
                ['icon' => 'bi-bicycle', 'color' => 'bg-danger', 'nama' => 'Bersepeda', 
                 'desc' => 'Bersepeda keliling kota setiap weekend untuk menjaga kesehatan.'],
              ];
              foreach ($hobbies as $h):
            ?>
            <div class="col-md-6">
              <div class="d-flex align-items-start gap-3 p-3 border rounded bg-light">
                <div class="rounded-circle <?= $h['color'] ?> text-white p-2 d-flex align-items-center justify-content-center"
                  style="width:50px; height:50px; flex-shrink:0;">
                  <i class="bi <?= $h['icon'] ?> fs-5"></i>
                </div>
                <div>
                  <h6 class="mb-1 fw-bold"><?= $h['nama'] ?></h6>
                  <p class="mb-0 small text-muted"><?= $h['desc'] ?></p>
                </div>
              </div>
            </div>
            <?php endforeach; ?>
          </div>
        </div>
      </div>
    </div>

    <!-- 2. Favorite Menu (Makanan) -->
    <div class="accordion-item">
      <h2 class="accordion-header">
        <button class="accordion-button collapsed" type="button"
          data-bs-toggle="collapse" data-bs-target="#collapseFood"
          aria-expanded="false" aria-controls="collapseFood">
          <i class="bi bi-egg-fried me-2 text-warning"></i>
          <strong>Favorite Menu Makanan</strong>
        </button>
      </h2>
      <div id="collapseFood" class="accordion-collapse collapse"
        data-bs-parent="#aboutAccordion">
        <div class="accordion-body">
          <div class="row g-3">
            <?php
              $foods = [
                ['emoji' => '🍜', 'nama' => 'Bakso', 'asal' => 'Jawa Tengah', 
                 'desc' => 'Bakso kuah dengan mie, bihun, dan topping lengkap. Favorit sepanjang masa!'],
                ['emoji' => '🍛', 'nama' => 'Nasi Padang', 'asal' => 'Sumatera Barat', 
                 'desc' => 'Nasi dengan lauk rendang, ayam pop, dan sayur nangka yang lezat.'],
                ['emoji' => '🍣', 'nama' => 'Sushi', 'asal' => 'Jepang', 
                 'desc' => 'Makanan Jepang yang menjadi favorit saat makan di restoran bersama pasangan.'],
                ['emoji' => '🌮', 'nama' => 'Nasi Goreng', 'asal' => 'Indonesia', 
                 'desc' => 'Nasi goreng spesial dengan telur mata sapi, ayam, dan kerupuk.'],
              ];
              foreach ($foods as $f):
            ?>
            <div class="col-md-6">
              <div class="card h-100 border-0 shadow-sm">
                <div class="card-body">
                  <div class="d-flex align-items-center gap-2 mb-2">
                    <span style="font-size: 2rem;"><?= $f['emoji'] ?></span>
                    <div>
                      <h6 class="mb-0 fw-bold"><?= $f['nama'] ?></h6>
                      <small class="text-muted"><i class="bi bi-geo-alt me-1"></i><?= $f['asal'] ?></small>
                    </div>
                  </div>
                  <p class="mb-0 small"><?= $f['desc'] ?></p>
                </div>
              </div>
            </div>
            <?php endforeach; ?>
          </div>
        </div>
      </div>
    </div>

    <!-- 3. Pengalaman Organisasi -->
    <div class="accordion-item">
      <h2 class="accordion-header">
        <button class="accordion-button collapsed" type="button"
          data-bs-toggle="collapse" data-bs-target="#collapseOrg"
          aria-expanded="false" aria-controls="collapseOrg">
          <i class="bi bi-people-fill me-2 text-success"></i>
          <strong>Pengalaman Organisasi</strong>
        </button>
      </h2>
      <div id="collapseOrg" class="accordion-collapse collapse"
        data-bs-parent="#aboutAccordion">
        <div class="accordion-body">
          <div class="timeline">
            <?php
              $orgs = [
                ['periode' => '2022 – 2024', 'nama' => 'ROHIS MAN 9 Jakarta',
                'jabatan' => 'Anggota Rohis', 'color' => 'success',
                'desc' => 'Aktif mengikuti kegiatan keagamaan sekolah, membantu pelaksanaan acara Rohis, serta berpartisipasi dalam kegiatan sosial dan kajian rutin.'],
                ['periode' => '2020 – 2022', 'nama' => 'ROHIS MTsN 42 Jakarta',
                'jabatan' => 'Bendahara', 'color' => 'warning',
                'desc' => 'Mengelola keuangan organisasi, mencatat pemasukan dan pengeluaran kegiatan, serta membantu penyusunan anggaran acara sekolah.'],
                ['periode' => '2019 – 2020', 'nama' => 'Pramuka Sekolah',
                'jabatan' => 'Anggota Aktif', 'color' => 'info',
                'desc' => 'Mengikuti kegiatan pramuka rutin, kerja sama tim, serta kegiatan kemah untuk meningkatkan disiplin dan tanggung jawab.'], ];
              foreach ($orgs as $o):
            ?>
            <div class="d-flex gap-3 mb-3">
              <div class="d-flex flex-column align-items-center">
                <div class="rounded-circle bg-<?= $o['color'] ?> text-white d-flex align-items-center justify-content-center"
                  style="width:42px; height:42px; flex-shrink:0;">
                  <i class="bi bi-building"></i>
                </div>
                <div class="border-start border-2 border-<?= $o['color'] ?> flex-grow-1 ms-auto me-auto mt-1"
                  style="width:2px; min-height:30px;"></div>
              </div>
              <div class="pb-3 w-100">
                <div class="d-flex justify-content-between align-items-start flex-wrap">
                  <h6 class="mb-0 fw-bold"><?= $o['nama'] ?></h6>
                  <span class="badge bg-<?= $o['color'] ?> ms-2"><?= $o['periode'] ?></span>
                </div>
                <small class="text-muted"><i class="bi bi-briefcase me-1"></i><?= $o['jabatan'] ?></small>
                <p class="mt-1 mb-0 small"><?= $o['desc'] ?></p>
              </div>
            </div>
            <?php endforeach; ?>
          </div>
        </div>
      </div>
    </div>

  </div><!-- end accordion -->
</div>
