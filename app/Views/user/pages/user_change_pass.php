<div class="change-password-board pages-board">
  <h2 class="board-title text-primary fs-27 text-center mb-30">
    Ganti Password
  </h2>
  <form action="<?= BASEURL . '/user/change_pass/' . $user['code']; ?>" method="POST" id="changepass-form" class="form-change-pass pages-form">
    <div class="form-group">
      <label for="password_lama">Password Lama <span class="required-icon">*</span></label>
      <input type="password" id="password_lama" class="form-password" placeholder="Masukkan password lama anda.." name="password_lama">
      <div class="invalid-feedback"></div>
      <i class="fas fa-eye eye-icon"></i>
    </div>
    <div class="form-group">
      <label for="password_baru">Password Baru <span class="required-icon">*</span></label>
      <input type="password" id="password_baru" class="form-password" placeholder="Masukkan password baru anda.." name="password_baru">
      <div class="invalid-feedback"></div>
      <i class="fas fa-eye eye-icon"></i>
    </div>
    <div class="form-group">
      <label for="konfirmasi_password_baru">Konfirmasi Password Baru <span class="required-icon">*</span></label>
      <input type="password" id="konfirmasi_password_baru" class="form-password" placeholder="Konfirmasi password baru anda.." name="konfirmasi_password_baru">
      <div class="invalid-feedback"></div>
      <i class="fas fa-eye eye-icon"></i>
    </div>
    <div class="flex justify-start align-start mt-10">
      <a href="<?= BASEURL . '/user/' . $user['code']; ?>" class="back-btn btn-red me-10">Batal</a>
      <button type="submit" class="change-pass-btn btn-action btn-primary">Ganti</button>
    </div>
  </form>
</div>