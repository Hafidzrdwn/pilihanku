<?php

class CustomMiddlewares
{
  public function protect_post_url()
  {
    if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
      $data['judul'] = '403 Forbidden';
      require_once('../app/views/errors/403.php');
      exit();
    }
  }

  public function auth()
  {
    if (!isset($_SESSION['isLogin'])) {
      header('Location: ' . BASEURL . '/auth/login');
      exit();
    }
  }
  public function guest()
  {
    if (isset($_SESSION['isLogin'])) {
      header('Location: ' . BASEURL . '/user/' . $_SESSION['user_auth']['code']);
      exit();
    }
  }
}
