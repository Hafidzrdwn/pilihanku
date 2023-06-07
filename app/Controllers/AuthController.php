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
    $this->middleware->protect_post_url();
    $dt = FormValidation::make($_POST, [
      'nama' => 'required|min:3|max:50',
      'email' => 'required|email',
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
      $_SESSION['user_auth'] = $insert;
      exit();
    }
  }

  public function doLogin()
  {
    $this->middleware->protect_post_url();
  }

  public function logout()
  {
  }
}
