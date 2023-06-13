<header>
  <a href="<?= BASEURL; ?>" class="logo">
    PilihanKu
  </a>

  <nav class="navbar">
    <?php if (!str_contains($_SERVER['REQUEST_URI'], 'user')) : ?>
      <a class="nav-link" href="<?= ('http://localhost:8080' . $_SERVER['REQUEST_URI'] != BASEURL . '/') ? BASEURL : ''; ?>#features">Fitur Aplikasi</a>
    <?php endif; ?>
    <?php if (!isset($_SESSION['isLogin'])) : ?>
      <a href="<?= BASEURL . '/auth/register'; ?>" class="btn btn-register">Daftar&nbsp; <i class="fas fa-user-alt"></i></a>
      <a href="<?= BASEURL . '/auth/login'; ?>" class="btn btn-login">Masuk&nbsp; <i class="fas fa-sign-in-alt"></i></a>
    <?php else : ?>
      <?php if (!str_contains($_SERVER['REQUEST_URI'], 'user')) : ?>
        <a class="nav-link" href="<?= BASEURL . '/user/' . $_SESSION['user_auth']['code']; ?>">Dashboard</a>
      <?php endif; ?>
      <a href="<?= BASEURL . '/auth/logout'; ?>" class="btn btn-logout">Keluar&nbsp; <i class="fas fa-sign-out-alt"></i></a>
    <?php endif; ?>
  </nav>
</header>