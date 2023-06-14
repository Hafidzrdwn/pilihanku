<?php


class UserController extends Controller
{
  public function __construct()
  {
    parent::__construct();
    $this->middleware->auth();
  }

  public function index($code)
  {
    $data['user'] = $this->model('User')->getBy(['code' => $code]);
    $data['judul'] = $data['user']['name'];
    $params = UrlParser::find_query_params($_SERVER['REQUEST_URI']);
    $data['page'] = ($params && array_key_exists('page', $params)) ? $params['page'] : "";

    $this->render('user/dashboard', $data);
  }

  function change_pass($code)
  {
    $this->middleware->protect_post_url();

    $dt = FormValidation::make($_POST, [
      'password_lama' => 'required|min:5',
      'password_baru' => 'required|min:5',
      'konfirmasi_password_baru' => 'required|matches:password_baru'
    ]);

    if ($dt['fails']) {
      // save errors
      echo json_encode([
        'status' => false,
        'errors' => $dt['errors']
      ]);
      return;
    }

    $dt = $dt['data'];
    $user = $this->model('User')->getBy(['code' => $code]);

    if (!password_verify($dt['password_lama'], $user['password'])) {
      echo json_encode([
        'status' => false,
        'message' => 'Password lama anda salah!',
        'data' => 'password_lama'
      ]);
      return;
    } else if (password_verify($dt['password_baru'], $user['password'])) {
      echo json_encode([
        'status' => false,
        'message' => 'Password baru tidak boleh sama dengan password lama!',
        'data' => 'password_baru'
      ]);
      return;
    }

    $dt['password'] = password_hash($dt['password_baru'], PASSWORD_DEFAULT);
    unset($dt['password_lama']);
    unset($dt['password_baru']);
    unset($dt['konfirmasi_password_baru']);

    $this->model('User')->edit(['code' => $code], $dt);
    $_SESSION['alert'] = [
      'type' => 'success',
      'message' => 'Password anda berhasil diubah!'
    ];
    echo json_encode([
      'status' => true,
      'data' => $user['code']
    ]);
    exit();
  }
}
