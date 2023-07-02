<div class="auth-container bg-white my-50 mx-auto radius-10 text-center">
  <div class="auth-header text-start py-15 px-20 bg-secondary text-primary">Daftar Akun Baru</div>
  <i class="fas fa-address-card auth-image fs-72 mt-20 mb-25 mx-auto text-primary"></i>
  <form id="register-form" action="<?= BASEURL . '/auth/registration'; ?>" method="POST" class="auth-form flex justify-center align-start flex-column my-0 mx-auto pt-0 pb-30 px-30">
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
      <input type="password" id="password" class="form-password" placeholder="Masukkan password anda.." name="password">
      <div class="invalid-feedback"></div>
      <i class="fas fa-eye eye-icon"></i>
    </div>
    <div class="form-group">
      <label for="konfirmasi_password">Konfirmasi Password</label>
      <input type="password" id="konfirmasi_password" class="form-password" placeholder="Konfirmasi password anda.." name="konfirmasi_password">
      <div class="invalid-feedback"></div>
      <i class="fas fa-eye eye-icon"></i>
    </div>
    <button type="submit" class="auth-btn btn-primary mt-5">Daftar akun</button>
    <div class="auth-small-text mt-12 fs-14 text-center">Sudah punya akun? <a class="text-primary" href="<?= BASEURL . '/auth/login'; ?>">Masuk</a></div>
  </form>
</div>