<div class="auth-container">
  <div class="auth-header">Masuk Aplikasi</div>
  <i class="fas fa-user-lock auth-image"></i>
  <form action="" class="auth-form">
    <div class="form-group">
      <label for="email">Email</label>
      <input type="email" id="email" placeholder="Masukkan email anda.." name="email">
    </div>
    <div class="form-group">
      <label for="password">Password</label>
      <input type="password" id="password" placeholder="Masukkan password anda.." name="password">
    </div>
    <button class="auth-btn">Masuk</button>
    <p class="auth-small-text">
      Belum punya akun? <a href="<?= BASEURL . '/auth/register'; ?>">Daftar</a>
    </p>
  </form>
</div>