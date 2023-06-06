<div class="auth-container">
  <div class="auth-header">Daftar Akun Baru</div>
  <i class="fas fa-address-card auth-image"></i>
  <form action="" class="auth-form">
    <div class="form-group">
      <label for="name">Nama</label>
      <input type="text" id="name" placeholder="Masukkan nama anda.." name="name">
    </div>
    <div class="form-group">
      <label for="email">Email</label>
      <input type="email" id="email" placeholder="Masukkan email anda.." name="email">
    </div>
    <div class="form-group pw">
      <div class="col-1">
        <label for="password">Password</label>
        <input type="password" id="password" placeholder="Masukkan password anda.." name="password">
      </div>
      <div class="col-2">
        <label for="confirm_password">Konfirmasi Password</label>
        <input type="password" id="confirm_password" placeholder="Konfirmasi password anda.." name="confirm_password">
      </div>
    </div>
    <button class="auth-btn">Daftar akun</button>
    <div class="auth-small-text">Sudah punya akun? <a href="<?= BASEURL . '/auth/login'; ?>">Masuk</a></div>
  </form>
</div>