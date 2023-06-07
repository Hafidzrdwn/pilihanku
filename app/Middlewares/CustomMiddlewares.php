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
}
