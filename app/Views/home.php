<div class="hero-container flex justify-center align-start p-50 radius-10 relative">

  <div class="hero-content text-center">
    <div class="hero-logo mt-50 mb-20 d-inline-block fs-40">PilihanKu</div>
    <h1 class="hero-headline fs-47 fw-bold text-white mb-20">"Voting Online"<br>Wujudkan Hak Pilih dengan Mudah</h1>
    <p class="hero-text fs-17 text-secondary">PilihanKu menghadirkan Voting Modern demi Masa Depan yang Lebih Baik.<br>Pilih secara online dan nikmati kemudahan serta kecepatan dalam memberikan suara Anda.</p>
  </div>

  <div class="hero-form radius-7 px-30 pt-20 pb-30 bg-white">
    <h2 class="form-question text-primary fs-20 fw-semibold mb-15">
      Mau berlibur kemana nih?
    </h2>
    <div class="form-radios flex justify-start align-center mb-32">
      <div class="form-radio">
        <input type="radio" name="destination" id="destination-1" class="me-4" value="beach" checked>
        <label for="destination-1">Pantai</label>
      </div>
      <div class="form-radio">
        <input type="radio" name="destination" id="destination-2" class="me-4" value="mountain">
        <label for="destination-2">Gunung</label>
      </div>
      <div class="form-radio">
        <input type="radio" name="destination" id="destination-3" class="me-4" value="city">
        <label for="destination-3">Taman Kota</label>
      </div>
    </div>
    <a href="<?= (isset($_SESSION['isLogin'])) ? BASEURL . '/user/' . $_SESSION['user_auth']['code'] : BASEURL . '/user/not-login-state'; ?>" class="form-button btn-primary">Kirim</a>
  </div>

</div>

<section class="features mt-100 mb-75" id="features">
  <div class="feature-header mb-25">
    <h3 class="mb-5 text-logo">Fitur PilihanKu</h3>
    <h1 class="fs-32 text-secondary">Pengaplikasian Web yang cepat dan mudah</h1>
  </div>
  <div class="feature-cards flex justify-between align-start">
    <div class="card">
      <h1 class="card-title">Buat Voting</h1>
      <p class="card-text">Buat ruang voting anda, ketik pertanyaan, buat option pilih dengan cepat tanpa ribet.</p>
      <a href="<?= BASEURL . '/voting/create'; ?>" class="btn-feature btn-primary">Buat voting baru</a>
    </div>
    <div class="card">
      <h1 class="card-title">Undang Peserta</h1>
      <p class="card-text">Undang teman atau siapapun ke ruang voting anda untuk segera mengisi atau memilih option voting.</p>
      <a href="<?= (isset($_SESSION['isLogin'])) ? BASEURL . '/user/' . $_SESSION['user_auth']['code'] . '#daftar-voting' : BASEURL . '/user/not-login-state'; ?>" class="btn-feature btn-primary">Undang teman</a>
    </div>
    <div class="card">
      <h1 class="card-title">Gabung Voting</h1>
      <p class="card-text">Masuk ke ruang voting dengan kode yang telah diberikan oleh pemilik voting.</p>
      <a href="<?= (isset($_SESSION['isLogin'])) ? BASEURL . '/user/' . $_SESSION['user_auth']['code'] . '#join-voting' : BASEURL . '/user/not-login-state'; ?>" class="btn-feature btn-primary">Gabung voting</a>
    </div>
  </div>
</section>