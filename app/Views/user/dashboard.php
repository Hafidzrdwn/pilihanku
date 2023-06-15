<?php
$page = $data['page'];
$user = $data['user'];
?>
<div class="user-board">
  <h1 class="user-board-title">Dasbor Anda🚀</h1>
  <h4 class="user-board-subtitle">Halo, <?= $user['name']; ?>👋</h4>
  <?php if (isset($_SESSION['alert'])) : ?>
    <?php $alert = $_SESSION['alert']; ?>
    <div class="alert alert-<?= $alert['type']; ?>" style="margin-top: 15px;">
      <?= $alert['message']; ?>
      <button type="button" class="close" onclick="return this.parentElement.remove()">&times;</button>
    </div>
    <?php unset($_SESSION['alert']); ?>
  <?php endif; ?>
  <div class="user-profile">
    <div class="user-profile-left">
      <img class="clicked-img" src="<?= BASEURL; ?>/assets/images/profile-images/<?= $user['profile']; ?>" alt="user avatar">
      <div class="user-profile-desc">
        <h1><?= $user['name']; ?></h1>
        <h4><?= $user['email']; ?> | Kode anda : <?= $user['code']; ?></h4>
      </div>
      <a href="?page=change_pass" class="btn-change-pass">Ganti password</a>
      <a href="?page=edit_profile" class="btn-edit-profile">Edit profil</a>
    </div>
    <div class="user-profile-right">
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
          <div class="box-top">
            <div class="box-voting-created">
              <h3>Telah membuat</h3>
              <h1>0 Voting</h1>
            </div>
            <div class="box-voting-joined">
              <h3>Bergabung dalam</h3>
              <h1>0 Voting</h1>
            </div>
          </div>
          <div class="box-bottom">
            <div class="create-voting">
              <h2>Buat Voting</h2>
              <button class="btn-create">Buat sekarang</button>
            </div>
            <div class="join-voting">
              <h2>Gabung Voting</h2>
              <button class="btn-join">Gabung sekarang</button>
            </div>
          </div>
          <?php break; ?>
      <?php endswitch; ?>
    </div>
  </div>
  <div class="user-votings">
    <h1 class="user-board-title">Daftar Voting🗳️</h1>
    <div class="voting-container">
      <div class="voting-box">
        <h2 class="voting-title">Ini Judul Voting</h2>
        <p class="voting-date">Hari, 12 Juni 2023</p>
        <p class="voting-desc">Lorem ipsum dolor sit amet consectetur, adipisicing elit. Obcaecati facilis porro temporibus quo cum magni recusandae distinctio dignissimos illo mollitia.</p>
        <a href="" class="btn-detail">Detail voting</a>
      </div>
      <div class="voting-box">
        <h2 class="voting-title">Ini Judul Voting</h2>
        <p class="voting-date">Hari, 12 Juni 2023</p>
        <p class="voting-desc">Lorem ipsum dolor sit amet consectetur, adipisicing elit. Obcaecati facilis porro temporibus quo cum magni recusandae distinctio dignissimos illo mollitia.</p>
        <a href="" class="btn-detail">Detail voting</a>
      </div>
      <div class="voting-box">
        <h2 class="voting-title">Ini Judul Voting</h2>
        <p class="voting-date">Hari, 12 Juni 2023</p>
        <p class="voting-desc">Lorem ipsum dolor sit amet consectetur, adipisicing elit. Obcaecati facilis porro temporibus quo cum magni recusandae distinctio dignissimos illo mollitia.</p>
        <a href="" class="btn-detail">Detail voting</a>
      </div>
      <div class="voting-box">
        <h2 class="voting-title">Ini Judul Voting</h2>
        <p class="voting-date">Hari, 12 Juni 2023</p>
        <p class="voting-desc">Lorem ipsum dolor sit amet consectetur, adipisicing elit. Obcaecati facilis porro temporibus quo cum magni recusandae distinctio dignissimos illo mollitia.</p>
        <a href="" class="btn-detail">Detail voting</a>
      </div>
      <div class="voting-box">
        <h2 class="voting-title">Ini Judul Voting</h2>
        <p class="voting-date">Hari, 12 Juni 2023</p>
        <p class="voting-desc">Lorem ipsum dolor sit amet consectetur, adipisicing elit. Obcaecati facilis porro temporibus quo cum magni recusandae distinctio dignissimos illo mollitia.</p>
        <a href="" class="btn-detail">Detail voting</a>
      </div>
    </div>
  </div>
</div>