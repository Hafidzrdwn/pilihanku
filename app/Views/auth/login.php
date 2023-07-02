<div class="auth-container bg-white my-50 mx-auto radius-10 text-center">
  <div class="auth-header text-start py-15 px-20 bg-secondary text-primary">Masuk Aplikasi</div>
  <i class="fas fa-user-lock auth-image fs-72 mt-20 mb-25 mx-auto text-primary"></i>
  <form id="login-form" action="<?= BASEURL . '/auth/doLogin'; ?>" method="POST" class="auth-form flex justify-center align-start flex-column my-0 mx-auto pt-0 pb-30 px-30">
    <?php if (isset($_SESSION['alert'])) : ?>
      <?php $alert = $_SESSION['alert']; ?>
      <div class="alert alert-<?= $alert['type']; ?>" style="margin-top: 15px;">
        <?= $alert['message']; ?>
        <button type="button" class="close" onclick="return this.parentElement.remove()">&times;</button>
      </div>
      <?php unset($_SESSION['alert']); ?>
    <?php endif; ?>
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
    <button type="submit" class="auth-btn btn-primary mt-5">Masuk</button>
    <p class="auth-small-text mt-12 fs-14 text-center">
      Belum punya akun? <a class="text-primary" href="<?= BASEURL . '/auth/register'; ?>">Daftar</a>
    </p>
  </form>
</div>