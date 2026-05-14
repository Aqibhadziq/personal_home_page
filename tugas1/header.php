<!-- HEADER: Bootstrap Carousel -->
<div id="headerCarousel" class="carousel slide shadow-sm border-bottom" data-bs-ride="carousel">

  <!-- INDICATORS -->
  <div class="carousel-indicators">
    <button type="button" data-bs-target="#headerCarousel" data-bs-slide-to="0"
      class="active" aria-current="true" aria-label="Slide 1"></button>
    <button type="button" data-bs-target="#headerCarousel" data-bs-slide-to="1"
      aria-label="Slide 2"></button>
    <button type="button" data-bs-target="#headerCarousel" data-bs-slide-to="2"
      aria-label="Slide 3"></button>
  </div>

  <!-- SLIDES -->
  <div class="carousel-inner">

    <!-- Slide 1 -->
    <div class="carousel-item active">
      <div class="slide-1 carousel-placeholder text-center">
        <div>
          <i class="bi bi-person-circle"
            style="font-size: 4rem; color: #6c757d; display:block; margin-bottom:1rem;"></i>
          <h2><strong>Selamat Datang</strong> di Personal Home Page</h2>
          <p>Temukan semua tentang saya di sini</p>
        </div>
      </div>
    </div>

    <!-- Slide 2 -->
    <div class="carousel-item">
      <div class="slide-2 carousel-placeholder text-center">
        <div>
          <i class="bi bi-mortarboard-fill"
            style="font-size: 4rem; color: #6c757d; display:block; margin-bottom:1rem;"></i>
          <h2><strong>Riwayat Pendidikan</strong></h2>
          <p>Perjalanan akademik dari TK hingga Perguruan Tinggi</p>
        </div>
      </div>
    </div>

    <!-- Slide 3 -->
    <div class="carousel-item">
      <div class="slide-3 carousel-placeholder text-center">
        <div>
          <i class="bi bi-laptop-fill"
            style="font-size: 4rem; color: #6c757d; display:block; margin-bottom:1rem;"></i>
          <h2><strong>Pemrograman Web</strong></h2>
          <p>Belajar, berkarya, dan berkembang bersama teknologi</p>
        </div>
      </div>
    </div>

  </div>

  <!-- CONTROLS -->
  <button class="carousel-control-prev" type="button"
    data-bs-target="#headerCarousel" data-bs-slide="prev">
    <span class="carousel-control-prev-icon"></span>
  </button>

  <button class="carousel-control-next" type="button"
    data-bs-target="#headerCarousel" data-bs-slide="next">
    <span class="carousel-control-next-icon"></span>
  </button>

</div>

<!-- STYLE -->
<style>
/* background slide */
.slide-1 {
  background: linear-gradient(135deg, #f8f9fa, #e9ecef);
}

.slide-2 {
  background: linear-gradient(135deg, #e9ecef, #f8f9fa);
}

.slide-3 {
  background: linear-gradient(135deg, #f1f3f5, #ffffff);
}

/* area carousel */
.carousel-placeholder {
  height: 300px;
  display: flex;
  align-items: center;
  justify-content: center;
  color: #212529;
}

/* teks */
.carousel-placeholder h2 {
  font-size: 2rem;
}

.carousel-placeholder p {
  font-size: 1.1rem;
  opacity: 0.8;
}

/* tombol prev/next jadi hitam */
.carousel-control-prev-icon,
.carousel-control-next-icon {
  filter: invert(1);
}

.carousel-control-prev,
.carousel-control-next {
  opacity: 0.7;
}

.carousel-control-prev:hover,
.carousel-control-next:hover {
  opacity: 1;
}

/* indikator jadi hitam */
.carousel-indicators [data-bs-target] {
  background-color: #000;
  opacity: 0.4;
}

.carousel-indicators .active {
  background-color: #000;
  opacity: 1;
}
</style>