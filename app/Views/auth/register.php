<div class="auth-container">
  <div class="auth-header">Daftar Akun Baru</div>
  <i class="fas fa-address-card auth-image"></i>
  <form id="register-form" action="<?= BASEURL . '/auth/registration'; ?>" method="POST" class="auth-form">
    <div class="form-group">
      <label for="nama">Nama</label>
      <input type="text" id="nama" placeholder="Masukkan nama anda.." name="nama">
      <div class="invalid-feedback"></div>
    </div>
    <div class="form-group">
      <label for="email">Email</label>
      <input type="text" id="email" placeholder="Masukkan email anda.." name="email">
      <div class="invalid-feedback"></div>
    </div>
    <div class="form-group">
      <label for="password">Password</label>
      <input type="password" id="password" placeholder="Masukkan password anda.." name="password">
      <div class="invalid-feedback"></div>
    </div>
    <div class="form-group">
      <label for="konfirmasi_password">Konfirmasi Password</label>
      <input type="password" id="konfirmasi_password" placeholder="Konfirmasi password anda.." name="konfirmasi_password">
      <div class="invalid-feedback"></div>
    </div>
    <button type="submit" class="auth-btn">Daftar akun</button>
    <div class="auth-small-text">Sudah punya akun? <a href="<?= BASEURL . '/auth/login'; ?>">Masuk</a></div>
  </form>
</div>