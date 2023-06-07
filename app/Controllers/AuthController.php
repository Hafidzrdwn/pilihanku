<?php


class AuthController extends Controller
{
  public function __construct()
  {
    parent::__construct();
  }

  public function login()
  {
    $this->middleware->guest();
    $data['judul'] = 'Masuk Aplikasi';
    $this->render('auth/login', $data);
  }

  public function register()
  {
    $this->middleware->guest();
    $data['judul'] = 'Daftar Akun Baru';
    $this->render('auth/register', $data);
  }

  public function registration()
  {
    $this->middleware->protect_post_url();
    $this->middleware->guest();
    $dt = FormValidation::make($_POST, [
      'nama' => 'required|min:3|max:50',
      'email' => 'required|email|unique:users',
      'password' => 'required|min:5',
      'konfirmasi_password' => 'required|matches:password'
    ]);

    if ($dt['fails']) {
      // save errors
      echo json_encode(['errors' => $dt['errors']]);
      return;
    }

    $dt = $dt['data'];
    $dt['name'] = trim($dt['nama']);
    $dt['password'] = password_hash($dt['password'], PASSWORD_DEFAULT);
    $dt['avatar'] = 'default.jpg';
    $dt['code'] = substr(md5(rand()), 0, 8);

    unset($dt['nama']);
    unset($dt['konfirmasi_password']);

    if ($insert = $this->model('User')->create($dt)) {
      echo json_encode(['data' => 'Registrasi Akun Berhasil!', 'code' => $insert['code']]);
      $_SESSION['isLogin'] = true;
      unset($insert['id']);
      unset($insert['password']);
      $_SESSION['user_auth'] = $insert;
      exit();
    }
  }

  public function doLogin()
  {
    $this->middleware->protect_post_url();
    $this->middleware->guest();
  }

  public function logout()
  {
    $this->middleware->auth();
    // Clear all session variables
    session_unset();
    // Destroy the session
    session_destroy();

    header('Location: ' . BASEURL);
    exit();
  }
}
