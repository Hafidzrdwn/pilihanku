<header>
  <a href="<?= BASEURL; ?>" class="logo">
    PilihanKu
  </a>

  <nav class="navbar">
    <?php if (!str_contains($_SERVER['REQUEST_URI'], 'user')) : ?>
      <a class="nav-link" href="<?= ('http://localhost:8080' . $_SERVER['REQUEST_URI'] != BASEURL . '/') ? BASEURL : ''; ?>#features">Fitur Aplikasi</a>
    <?php endif; ?>
    <?php if (!isset($_SESSION['isLogin'])) : ?>
      <a href="<?= BASEURL . '/auth/register'; ?>" class="btn btn-register">Daftar</a>
      <a href="<?= BASEURL . '/auth/login'; ?>" class="btn btn-login">Masuk</a>
    <?php else : ?>
      <a href="<?= BASEURL . '/auth/logout'; ?>" class="btn btn-logout">Keluar</a>
    <?php endif; ?>
  </nav>
</header>