<header class="flex justify-between align-center sticky default-offset py-27 px-70 my-20 mx-0 radius-10">
  <a href="<?= BASEURL; ?>" class="logo fs-22">
    PilihanKu
  </a>

  <nav class="navbar">
    <?php if (!str_contains($_SERVER['REQUEST_URI'], 'user') && !str_contains($_SERVER['REQUEST_URI'], 'voting')) : ?>
      <a class="nav-link me-35" href="<?= ('http://localhost:8080' . $_SERVER['REQUEST_URI'] != BASEURL . '/') ? BASEURL : ''; ?>#features">Fitur Aplikasi</a>
    <?php endif; ?>
    <?php if (!isset($_SESSION['isLogin'])) : ?>
      <a href="<?= BASEURL . '/auth/register'; ?>" class="btn btn-register btn-secondary">Daftar&nbsp; <i class="fas fa-user-alt"></i></a>
      <a href="<?= BASEURL . '/auth/login'; ?>" class="btn btn-login btn-primary">Masuk&nbsp; <i class="fas fa-sign-in-alt"></i></a>
    <?php else : ?>
      <?php if (!str_contains($_SERVER['REQUEST_URI'], 'user') && !str_contains($_SERVER['REQUEST_URI'], 'voting')) : ?>
        <a class="nav-link me-35" href="<?= BASEURL . '/user/' . $_SESSION['user_auth']['code']; ?>">Dashboard</a>
      <?php endif; ?>
      <a href="<?= BASEURL . '/auth/logout'; ?>" class="btn btn-logout btn-red">Keluar&nbsp; <i class="fas fa-sign-out-alt"></i></a>
    <?php endif; ?>
  </nav>
</header>