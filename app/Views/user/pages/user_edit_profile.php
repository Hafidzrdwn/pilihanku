<div class="edit-profile-board pages-board">
  <h2 class="board-title">
    Edit Profil
  </h2>
  <form action="<?= BASEURL . '/user/edit_profile/' . $user['code']; ?>" method="POST" id="editprofile-form" class="form-edit-profile pages-form" enctype="multipart/form-data">
    <div class="form-group">
      <label for="nama">Nama</label>
      <input type="text" id="nama" placeholder="Masukkan nama anda.." name="nama" value="<?= $user['name']; ?>">
      <div class="invalid-feedback"></div>
    </div>
    <div class="form-group">
      <div class="preview-img">
        <img src="<?= BASEURL . '/assets/images/profile-images/' . $user['profile']; ?>" alt="<?= $user['profile']; ?>" class="clicked-img">
        <?php if ($user['profile'] != 'default.jpg') : ?>
          <span class="btn-delete-profile">Hapus Foto Profil</span>
        <?php endif; ?>
      </div>
      <label for="profile">Foto Profil</label>
      <input type="file" id="profile" name="profile">
      <div class="invalid-feedback"></div>
    </div>
    <a href="<?= BASEURL . '/user/' . $user['code']; ?>" class="back-btn">Batal</a>
    <button type="submit" class="edit-profile-btn btn-action">Edit</button>
  </form>
</div>