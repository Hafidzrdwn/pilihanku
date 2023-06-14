<div class="auth-container">
  <div class="auth-header">Masuk Aplikasi</div>
  <i class="fas fa-user-lock auth-image"></i>
  <form id="login-form" action="<?= BASEURL . '/auth/doLogin'; ?>" method="POST" class="auth-form">
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
    <button type="submit" class="auth-btn">Masuk</button>
    <p class="auth-small-text">
      Belum punya akun? <a href="<?= BASEURL . '/auth/register'; ?>">Daftar</a>
    </p>
  </form>
</div>