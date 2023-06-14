<div class="change-password-board pages-board">
  <h2 class="board-title">
    Ganti Password
  </h2>
  <form action="<?= BASEURL . '/user/change_pass/' . $user['code']; ?>" method="POST" id="changepass-form" class="form-change-pass pages-form">
    <div class="form-group">
      <label for="password_lama">Password Lama</label>
      <input type="password" id="password_lama" class="form-password" placeholder="Masukkan password lama anda.." name="password_lama">
      <div class="invalid-feedback"></div>
      <i class="fas fa-eye eye-icon"></i>
    </div>
    <div class="form-group">
      <label for="password_baru">Password Baru</label>
      <input type="password" id="password_baru" class="form-password" placeholder="Masukkan password baru anda.." name="password_baru">
      <div class="invalid-feedback"></div>
      <i class="fas fa-eye eye-icon"></i>
    </div>
    <div class="form-group">
      <label for="konfirmasi_password_baru">Konfirmasi Password Baru</label>
      <input type="password" id="konfirmasi_password_baru" class="form-password" placeholder="Konfirmasi password baru anda.." name="konfirmasi_password_baru">
      <div class="invalid-feedback"></div>
      <i class="fas fa-eye eye-icon"></i>
    </div>
    <a href="<?= BASEURL . '/user/' . $user['code']; ?>" class="back-btn">Batal</a>
    <button type="submit" class="change-pass-btn btn-action">Ganti</button>
  </form>
</div>