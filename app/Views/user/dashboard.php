<?php
$page = $data['page'];
$user = $data['user'];
?>
<div class="user-board my-35 mx-auto pt-40 px-70 pb-60 relative radius-10">
  <h1 class="user-board-title text-primary mb-8 ps-7">Dasbor Anda🚀</h1>
  <h4 class="user-board-subtitle fw-medium fs-18">Halo, <?= $user['name']; ?>👋</h4>
  <?php if (isset($_SESSION['alert'])) : ?>
    <?php $alert = $_SESSION['alert']; ?>
    <div class="alert alert-<?= $alert['type']; ?>" style="margin-top: 15px;">
      <?= $alert['message']; ?>
      <button type="button" class="close" onclick="return this.parentElement.remove()">&times;</button>
    </div>
    <?php unset($_SESSION['alert']); ?>
  <?php endif; ?>
  <div class="user-profile flex justify-between align-center mt-40 mb-75">
    <div class="user-profile-left flex flex-column justify-center align-center text-center">
      <img class="clicked-img d-block mt-0 mx-auto mb-10 radius-circle" src="<?= BASEURL; ?>/assets/images/profile-images/<?= $user['profile']; ?>" alt="user avatar">
      <div class="user-profile-desc mb-20">
        <h1 class="mb-7"><?= $user['name']; ?></h1>
        <h4 class="text-dark"><?= $user['email']; ?> | Kode anda : <?= $user['code']; ?></h4>
      </div>
      <div class="user-profile-buttons flex justify-center align-center flex-column">
        <button type="button" class="btn-copy-code btn-default">🔗 Salin kode anda</button>
        <div class="link-actions flex justify-center align-center">
          <a href="?page=change_pass" class="btn-change-pass btn-outline-primary">Ganti password</a>
          <a href="?page=edit_profile" class="btn-edit-profile btn-primary">Edit profil</a>
        </div>
      </div>
    </div>
    <div class="user-profile-right flex justify-start align-start flex-column">
      <?php switch ($page):
        case 'change_pass':
          require_once 'pages/user_change_pass.php';
      ?>
          <?php break; ?>
        <?php
        case 'edit_profile':
          require_once 'pages/user_edit_profile.php';
        ?>
        <?php
          break;
        default: ?>
          <div class="box-top flex justify-between align-center">
            <div class="box-voting-created flex justify-center align-center flex-column text-center bg-primary text-secondary radius-10">
              <h3>Telah membuat</h3>
              <h1>0 Voting</h1>
            </div>
            <div class="box-voting-joined flex justify-center align-center flex-column text-center bg-primary text-secondary radius-10">
              <h3>Bergabung dalam</h3>
              <h1>0 Voting</h1>
            </div>
          </div>
          <div class="box-bottom flex justify-start align-start flex-column">
            <div class="create-voting flex justify-between align-center p-20 bg-secondary text-primary radius-10">
              <h2>Buat Voting</h2>
              <a href="<?= BASEURL . '/voting/create'; ?>" class="btn-create-voting btn-primary">Buat sekarang</a>
            </div>
            <div class="join-voting flex flex-column justify-between align-center p-20 bg-secondary text-primary radius-10">
              <div class="join-voting-text flex justify-between align-center">
                <h2>Gabung Voting</h2>
                <a href="#join-voting" class="btn-join-voting btn-primary">Gabung sekarang</a>
              </div>
              <div class="join-voting-form pt-10 px-0 pb-15 d-none">
                <form action="" method="POST" class="flex justify-between align-center">
                  <input type="text" name="code" id="code" class="fs-17" placeholder="Masukkan kode ruang voting">
                  <button type="submit" class="btn-join-submit btn-primary">Gabung</button>
                </form>
              </div>
            </div>
          </div>
          <?php break; ?>
      <?php endswitch; ?>
    </div>
  </div>
  <div class="user-votings">
    <h1 class="user-board-title text-primary mb-8 ps-7" id="daftar-voting">Daftar Voting🗳️</h1>
    <div class="voting-container flex justify-start align-center mt-35">
      <div class="voting-box p-20 bg-secondary radius-5">
        <h2 class="voting-title text-primary">Ini Judul Voting</h2>
        <p class="voting-date fs-14 text-gray mt-3 mx-0 mb-15">Hari, 12 Juni 2023</p>
        <p class="voting-desc fs-14 text-primary mb-22">Lorem ipsum dolor sit amet consectetur, adipisicing elit. Obcaecati facilis porro temporibus quo cum magni recusandae distinctio dignissimos illo mollitia.</p>
        <a href="" class="btn-detail d-inline-block btn-outline-primary">Detail voting</a>
      </div>
      <div class="voting-box p-20 bg-secondary radius-5">
        <h2 class="voting-title text-primary">Ini Judul Voting</h2>
        <p class="voting-date fs-14 text-gray mt-3 mx-0 mb-15">Hari, 12 Juni 2023</p>
        <p class="voting-desc fs-14 text-primary mb-22">Lorem ipsum dolor sit amet consectetur, adipisicing elit. Obcaecati facilis porro temporibus quo cum magni recusandae distinctio dignissimos illo mollitia.</p>
        <a href="" class="btn-detail d-inline-block btn-outline-primary">Detail voting</a>
      </div>
    </div>
  </div>
</div>