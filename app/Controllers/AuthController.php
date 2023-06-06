<?php


class AuthController extends Controller
{
  public function login()
  {
    $data['judul'] = 'Masuk Aplikasi';
    $this->render('auth/login', $data);
  }

  public function register()
  {
    $data['judul'] = 'Daftar Akun Baru';
    $this->render('auth/register', $data);
  }

  public function registration()
  {
  }

  public function doLogin()
  {
  }

  public function logout()
  {
  }
}
