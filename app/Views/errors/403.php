<?php
require_once('../app/views/templates/header.php');
?>

<div class="error-container">
  <img src="<?= BASEURL . '/assets/images/403.svg'; ?>" alt="Forbidden Image">
  <div class="error-desc">
    <h1>ERROR <?= $data['judul']; ?>!!</h1>
    <h3>Maaf, Anda tidak memiliki izin untuk mengakses halaman ini.</h3>
    <a href="<?= BASEURL; ?>">Kembali ke halaman utama</a>
  </div>
</div>