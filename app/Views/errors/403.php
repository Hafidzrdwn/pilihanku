<?php
require_once('../app/views/templates/header.php');

$redirect_url = (isset($_SESSION['isLogin'])) ? BASEURL . '/user/' . $_SESSION['user_auth']['code'] : BASEURL;

?>

<div class="error-container flex justify-center align-center mt-35">
  <img src="<?= BASEURL . '/assets/images/403.svg'; ?>" alt="Forbidden Image">
  <div class="error-desc">
    <h1 class="py-0 px-20 fs-38 bg-secondary text-primary d-inline-block">ERROR <?= $data['judul']; ?>!!</h1>
    <h3 class="text-secondary mt-12 mx-0 mb-30">Maaf, Anda tidak memiliki izin untuk mengakses halaman ini.</h3>
    <a class="btn-secondary" href="<?= $redirect_url; ?>">Kembali ke halaman utama</a>
  </div>
</div>